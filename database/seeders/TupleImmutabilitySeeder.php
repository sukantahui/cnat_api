<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Question;

class TupleImmutabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {

            $questions = [

                [
                    'question_text' => 'What does tuple immutability mean in Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'immutability'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Tuple elements cannot be changed after creation', 'is_correct' => true],
                        ['option_text' => 'Tuple elements can be updated anytime', 'is_correct' => false],
                        ['option_text' => 'Tuples are slower than lists', 'is_correct' => false],
                        ['option_text' => 'Tuples can store only numbers', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which of the following statements is TRUE about tuples?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'immutability'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Tuples are immutable', 'is_correct' => true],
                        ['option_text' => 'Tuples allow item assignment', 'is_correct' => false],
                        ['option_text' => 'Tuples can be resized', 'is_correct' => false],
                        ['option_text' => 'Tuples can delete individual elements', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will happen if you try to modify a tuple element?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'immutability', 'error'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'TypeError is raised', 'is_correct' => true],
                        ['option_text' => 'Value changes successfully', 'is_correct' => false],
                        ['option_text' => 'Tuple becomes a list', 'is_correct' => false],
                        ['option_text' => 'No effect occurs', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following code?',
                    'question_code' => "t = (1, 2, 3)\nt[0] = 10",
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'immutability', 'output'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'TypeError', 'is_correct' => true],
                        ['option_text' => '(10, 2, 3)', 'is_correct' => false],
                        ['option_text' => '(1, 2, 3)', 'is_correct' => false],
                        ['option_text' => 'No output', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which data type is mutable?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'immutability'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'List', 'is_correct' => true],
                        ['option_text' => 'Tuple', 'is_correct' => false],
                        ['option_text' => 'String', 'is_correct' => false],
                        ['option_text' => 'Integer', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Can a tuple contain mutable elements?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'immutability'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Yes, like lists inside a tuple', 'is_correct' => true],
                        ['option_text' => 'No, tuples cannot contain lists', 'is_correct' => false],
                        ['option_text' => 'Only numbers are allowed', 'is_correct' => false],
                        ['option_text' => 'Only strings are allowed', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which operation is allowed on tuples?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'immutability'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Concatenation', 'is_correct' => true],
                        ['option_text' => 'Item assignment', 'is_correct' => false],
                        ['option_text' => 'Item deletion', 'is_correct' => false],
                        ['option_text' => 'Item replacement', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What does the following code do?',
                    'question_code' => "t = (1, 2)\nt = t + (3,)",
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'immutability'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Creates a new tuple', 'is_correct' => true],
                        ['option_text' => 'Modifies the existing tuple', 'is_correct' => false],
                        ['option_text' => 'Raises an error', 'is_correct' => false],
                        ['option_text' => 'Deletes the tuple', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Why are tuples called immutable?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'immutability'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Their elements cannot be changed', 'is_correct' => true],
                        ['option_text' => 'They cannot store values', 'is_correct' => false],
                        ['option_text' => 'They are faster than lists', 'is_correct' => false],
                        ['option_text' => 'They use less memory', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which keyword is used to modify tuple elements?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'immutability'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'None (not possible)', 'is_correct' => true],
                        ['option_text' => 'update', 'is_correct' => false],
                        ['option_text' => 'modify', 'is_correct' => false],
                        ['option_text' => 'change', 'is_correct' => false],
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
