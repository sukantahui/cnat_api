<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Option;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Traits\HandlesTransactions;
use App\Helper\ResponseHelper;
use App\Http\Resources\QuestionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    use HandlesTransactions;

    /**
     * Display a listing of the resource with filters.
     */
    public function index(Request $request)
    {
        $query = Question::with([
            'options',
            'topic.chapter.subject',
            'questionType',
            'questionLevel'
        ]);

        // Filter by Subject
        if ($request->filled('subject_id')) {
            $subjectId = $request->input('subject_id');
            $query->whereHas('topic.chapter', function ($q) use ($subjectId) {
                $q->where('subject_id', $subjectId);
            });
        }

        // Filter by Chapter
        if ($request->filled('chapter_id')) {
            $chapterId = $request->input('chapter_id');
            $query->whereHas('topic', function ($q) use ($chapterId) {
                $q->where('chapter_id', $chapterId);
            });
        }

        // Filter by Topic
        if ($request->filled('topic_id')) {
            $query->where('topic_id', $request->input('topic_id'));
        }

        // Filter by Level
        if ($request->filled('question_level_id') || $request->filled('level_id')) {
            $levelId = $request->input('question_level_id') ?? $request->input('level_id');
            $query->where('question_level_id', $levelId);
        }

        // Filter by Type
        if ($request->filled('question_type_id') || $request->filled('type_id')) {
            $typeId = $request->input('question_type_id') ?? $request->input('type_id');
            $query->where('question_type_id', $typeId);
        }

        // Search text
        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('question_text', 'like', "%{$search}%")
                  ->orWhere('question_code', 'like', "%{$search}%");
            });
        }

        $questions = $query->latestFirst()->get();
        return ResponseHelper::success("Questions fetched successfully", QuestionResource::collection($questions));
    }

    /**
     * Store a newly created question along with its options atomically.
     */
    public function store(StoreQuestionRequest $request)
    {
        $question = DB::transaction(function () use ($request) {
            $validated = $request->validated();
            $optionsData = $validated['options'] ?? null;
            unset($validated['options']);

            $question = Question::create($validated);

            if (!empty($optionsData) && is_array($optionsData)) {
                foreach ($optionsData as $opt) {
                    $question->options()->create([
                        'option_text' => $opt['option_text'],
                        'option_code' => $opt['option_code'] ?? null,
                        'option_image' => $opt['option_image'] ?? null,
                        'is_correct' => !empty($opt['is_correct']),
                        'inforce' => isset($opt['inforce']) ? (int)$opt['inforce'] : 1,
                    ]);
                }
            }

            return $question->load(['options', 'topic.chapter.subject', 'questionType', 'questionLevel']);
        });

        return ResponseHelper::success("Question created successfully", new QuestionResource($question));
    }

    /**
     * Display the specified question.
     */
    public function show(Question $question)
    {
        $question->load(['options', 'topic.chapter.subject', 'questionType', 'questionLevel']);
        return ResponseHelper::success("Question fetched successfully", new QuestionResource($question));
    }

    /**
     * Update the specified question and its options.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $updatedQuestion = DB::transaction(function () use ($request, $question) {
            $validated = $request->validated();
            $optionsData = $validated['options'] ?? null;
            unset($validated['options']);

            $question->update($validated);

            if ($optionsData !== null && is_array($optionsData)) {
                // Delete old options and recreate for clean atomic sync
                $question->options()->delete();
                foreach ($optionsData as $opt) {
                    $question->options()->create([
                        'option_text' => $opt['option_text'],
                        'option_code' => $opt['option_code'] ?? null,
                        'option_image' => $opt['option_image'] ?? null,
                        'is_correct' => !empty($opt['is_correct']),
                        'inforce' => isset($opt['inforce']) ? (int)$opt['inforce'] : 1,
                    ]);
                }
            }

            return $question->load(['options', 'topic.chapter.subject', 'questionType', 'questionLevel']);
        });

        return ResponseHelper::success("Question updated successfully", new QuestionResource($updatedQuestion));
    }

    /**
     * Remove the specified question from storage.
     */
    public function destroy(Question $question)
    {
        DB::transaction(function () use ($question) {
            $question->options()->delete();
            $question->delete();
        });

        return ResponseHelper::success("Question deleted successfully");
    }
}
