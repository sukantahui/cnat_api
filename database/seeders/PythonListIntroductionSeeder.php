<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PythonListIntroductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {

            $questions = [
                [
                    'question_text' => 'What is a list in Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 39,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list', 'basics'],
                    'options' => [
                        ['option_text' => 'A collection of ordered and mutable elements', 'is_correct' => true],
                        ['option_text' => 'A fixed-size array', 'is_correct' => false],
                        ['option_text' => 'A key-value data structure', 'is_correct' => false],
                        ['option_text' => 'A function in Python', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which brackets are used to define a list in Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 39,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list', 'syntax'],
                    'options' => [
                        ['option_text' => '()', 'is_correct' => false],
                        ['option_text' => '{}', 'is_correct' => false],
                        ['option_text' => '[]', 'is_correct' => true],
                        ['option_text' => '<>', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which of the following is a valid Python list?',
                    'question_code' => 'A = [1, "apple", 3.5]',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 39,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list', 'examples'],
                    'options' => [
                        ['option_text' => 'A = (1, 2, 3)', 'is_correct' => false],
                        ['option_text' => 'A = {1, 2, 3}', 'is_correct' => false],
                        ['option_text' => 'A = [1, "apple", 3.5]', 'is_correct' => true],
                        ['option_text' => 'A = <1, 2, 3>', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which index is used to access the first element of a Python list?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 39,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list', 'indexing'],
                    'options' => [
                        ['option_text' => '0', 'is_correct' => true],
                        ['option_text' => '1', 'is_correct' => false],
                        ['option_text' => '-1', 'is_correct' => false],
                        ['option_text' => 'First', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Are Python lists mutable?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 39,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list', 'mutable'],
                    'options' => [
                        ['option_text' => 'Yes, elements can be changed', 'is_correct' => true],
                        ['option_text' => 'No, they are immutable', 'is_correct' => false],
                        ['option_text' => 'Only numbers can be changed', 'is_correct' => false],
                        ['option_text' => 'Only strings can be changed', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which function is used to find the number of elements in a list?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 39,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list', 'length'],
                    'options' => [
                        ['option_text' => 'size()', 'is_correct' => false],
                        ['option_text' => 'length()', 'is_correct' => false],
                        ['option_text' => 'len()', 'is_correct' => true],
                        ['option_text' => 'count()', 'is_correct' => false],
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
