<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Question;

class PythonTuplePackingUnpackingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {

            $questions = [

                [
                    'question_text' => 'What is tuple packing in Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'packing'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Assigning multiple values to a single tuple', 'is_correct' => true],
                        ['option_text' => 'Splitting a tuple into values', 'is_correct' => false],
                        ['option_text' => 'Sorting tuple elements', 'is_correct' => false],
                        ['option_text' => 'Deleting tuple values', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which of the following is an example of tuple packing?',
                    'question_code' => 't = 1, 2, 3',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'packing'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 't = (1, 2, 3)', 'is_correct' => true],
                        ['option_text' => 't = [1, 2, 3]', 'is_correct' => false],
                        ['option_text' => 't = {1, 2, 3}', 'is_correct' => false],
                        ['option_text' => 't = 1 + 2 + 3', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What is tuple unpacking in Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'unpacking'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Assigning tuple values to multiple variables', 'is_correct' => true],
                        ['option_text' => 'Creating a tuple', 'is_correct' => false],
                        ['option_text' => 'Deleting tuple elements', 'is_correct' => false],
                        ['option_text' => 'Converting tuple to list', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which of the following shows correct tuple unpacking?',
                    'question_code' => 'a, b = (10, 20)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'unpacking'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'a = 10, b = 20', 'is_correct' => true],
                        ['option_text' => 'a = (10,20)', 'is_correct' => false],
                        ['option_text' => 'a, b = 10', 'is_correct' => false],
                        ['option_text' => 'a = b = (10,20)', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following code?',
                    'question_code' => 'x, y = (5, 8)\nprint(x)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'unpacking', 'output'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '5', 'is_correct' => true],
                        ['option_text' => '8', 'is_correct' => false],
                        ['option_text' => '(5, 8)', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'How many variables are required to unpack a tuple of 3 elements?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'unpacking'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '3', 'is_correct' => true],
                        ['option_text' => '2', 'is_correct' => false],
                        ['option_text' => '1', 'is_correct' => false],
                        ['option_text' => 'Any number', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What happens if the number of variables does not match tuple elements during unpacking?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'unpacking', 'error'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'ValueError occurs', 'is_correct' => true],
                        ['option_text' => 'Program runs normally', 'is_correct' => false],
                        ['option_text' => 'Extra values are ignored', 'is_correct' => false],
                        ['option_text' => 'Tuple gets modified', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which symbol is used for packing and unpacking tuples?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'syntax'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => ',', 'is_correct' => true],
                        ['option_text' => ':', 'is_correct' => false],
                        ['option_text' => '*', 'is_correct' => false],
                        ['option_text' => '=', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which feature allows swapping two variables easily using tuples?',
                    'question_code' => 'a, b = b, a',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'unpacking', 'swap'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Tuple unpacking', 'is_correct' => true],
                        ['option_text' => 'Tuple slicing', 'is_correct' => false],
                        ['option_text' => 'Tuple indexing', 'is_correct' => false],
                        ['option_text' => 'Tuple repetition', 'is_correct' => false],
                    ],
                ],

            ];

            foreach ($questions as $data) {

                $options = $data['options'];
                unset($data['options']);

                $question = Question::create([
                    ...$data,
                    'inforce' => true,
                ]);

                $question->options()->createMany(
                    collect($options)->map(function ($opt) {
                        return [
                            'option_text' => $opt['option_text'],
                            'option_code' => null,
                            'option_image' => null,
                            'is_correct' => $opt['is_correct'],
                            'inforce' => true,
                        ];
                    })->toArray()
                );
            }

        });
    }
}
