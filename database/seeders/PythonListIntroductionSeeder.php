<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Question;

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
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
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
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
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
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
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
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
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
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
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
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'size()', 'is_correct' => false],
                        ['option_text' => 'length()', 'is_correct' => false],
                        ['option_text' => 'len()', 'is_correct' => true],
                        ['option_text' => 'count()', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which method is used to add an element at the end of a Python list?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 39,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list', 'append'],
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'add()', 'is_correct' => false],
                        ['option_text' => 'append()', 'is_correct' => true],
                        ['option_text' => 'insert()', 'is_correct' => false],
                        ['option_text' => 'extend()', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which method is used to remove the last element from a list?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 39,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list', 'pop'],
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'delete()', 'is_correct' => false],
                        ['option_text' => 'remove()', 'is_correct' => false],
                        ['option_text' => 'pop()', 'is_correct' => true],
                        ['option_text' => 'clear()', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'What will be the output of the following code?',
                    'question_code' => 'A = [10, 20, 30]\nprint(A[1])',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 39,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list', 'index'],
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '10', 'is_correct' => false],
                        ['option_text' => '20', 'is_correct' => true],
                        ['option_text' => '30', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which method removes a specific element from a list?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 39,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list', 'remove'],
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'pop()', 'is_correct' => false],
                        ['option_text' => 'delete()', 'is_correct' => false],
                        ['option_text' => 'remove()', 'is_correct' => true],
                        ['option_text' => 'clear()', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which method is used to add elements of another list to the current list?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 39,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list', 'extend'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'append()', 'is_correct' => false],
                        ['option_text' => 'add()', 'is_correct' => false],
                        ['option_text' => 'extend()', 'is_correct' => true],
                        ['option_text' => 'insert()', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'What does the clear() method do?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 39,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list', 'clear'],
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Deletes the list', 'is_correct' => false],
                        ['option_text' => 'Removes all elements from the list', 'is_correct' => true],
                        ['option_text' => 'Removes last element', 'is_correct' => false],
                        ['option_text' => 'Sorts the list', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which operator is used to repeat a list?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 39,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list', 'operators'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '+', 'is_correct' => false],
                        ['option_text' => '*', 'is_correct' => true],
                        ['option_text' => '/', 'is_correct' => false],
                        ['option_text' => '%', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which of the following creates an empty list?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 39,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list', 'creation'],
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'list()', 'is_correct' => true],
                        ['option_text' => '()', 'is_correct' => false],
                        ['option_text' => '{}', 'is_correct' => false],
                        ['option_text' => '<>', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which function is used to find the maximum value in a list?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 39,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list', 'max'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'maximum()', 'is_correct' => false],
                        ['option_text' => 'max()', 'is_correct' => true],
                        ['option_text' => 'top()', 'is_correct' => false],
                        ['option_text' => 'largest()', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which method is used to sort a list?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 39,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list', 'sort'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'order()', 'is_correct' => false],
                        ['option_text' => 'sort()', 'is_correct' => true],
                        ['option_text' => 'arrange()', 'is_correct' => false],
                        ['option_text' => 'sequence()', 'is_correct' => false],
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
