<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Question;

class TuplePackingUnpackingSeeder extends Seeder
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
                        ['option_text' => 'Assigning tuple values to variables', 'is_correct' => false],
                        ['option_text' => 'Deleting tuple elements', 'is_correct' => false],
                        ['option_text' => 'Sorting a tuple', 'is_correct' => false],
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
                        ['option_text' => 't = 1, 2, 3', 'is_correct' => true],
                        ['option_text' => 't = [1, 2, 3]', 'is_correct' => false],
                        ['option_text' => 't = {1, 2, 3}', 'is_correct' => false],
                        ['option_text' => 't = (1)', 'is_correct' => false],
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
                        ['option_text' => 'Assigning tuple elements to multiple variables', 'is_correct' => true],
                        ['option_text' => 'Combining two tuples', 'is_correct' => false],
                        ['option_text' => 'Deleting tuple elements', 'is_correct' => false],
                        ['option_text' => 'Sorting tuple values', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which statement correctly demonstrates tuple unpacking?',
                    'question_code' => 'a, b = (10, 20)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'unpacking'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'a, b = (10, 20)', 'is_correct' => true],
                        ['option_text' => 'a = (10, 20)', 'is_correct' => false],
                        ['option_text' => 'a = 10, 20', 'is_correct' => false],
                        ['option_text' => '(a, b) = 10', 'is_correct' => false],
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
                    'question_text' => 'What will be the output of the following code?',
                    'question_code' => "x, y = (5, 10)\nprint(x)",
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'unpacking', 'output'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '5', 'is_correct' => true],
                        ['option_text' => '10', 'is_correct' => false],
                        ['option_text' => '(5, 10)', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What happens if the number of variables does not match during tuple unpacking?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'unpacking', 'error'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'ValueError occurs', 'is_correct' => true],
                        ['option_text' => 'Extra values are ignored', 'is_correct' => false],
                        ['option_text' => 'Values are merged automatically', 'is_correct' => false],
                        ['option_text' => 'Returns None', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which symbol is used to unpack remaining values in a tuple?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'unpacking'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '*', 'is_correct' => true],
                        ['option_text' => '&', 'is_correct' => false],
                        ['option_text' => '#', 'is_correct' => false],
                        ['option_text' => '@', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which of the following uses tuple unpacking correctly?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'packing', 'unpacking'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'a, b, *c = (1, 2, 3, 4)', 'is_correct' => true],
                        ['option_text' => 'a = b, c = (1,2)', 'is_correct' => false],
                        ['option_text' => '*a = (1,2,3)', 'is_correct' => false],
                        ['option_text' => 'a, b = 1', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Tuple packing and unpacking is mainly used to:',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'packing', 'unpacking'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Handle multiple values efficiently', 'is_correct' => true],
                        ['option_text' => 'Modify tuple elements', 'is_correct' => false],
                        ['option_text' => 'Delete tuples', 'is_correct' => false],
                        ['option_text' => 'Sort tuple data', 'is_correct' => false],
                    ],
                ],
                [
                'question_text' => 'Which of the following correctly describes tuple packing in Python?',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 44,
                'question_level_id' => 1,
                'question_tags' => ['python', 'tuple', 'packing'],
                'applicable_to' => ['class_9', 'class_10'],
                'options' => [
                    ['option_text' => 'Combining multiple values into a single tuple', 'is_correct' => true],
                    ['option_text' => 'Breaking a tuple into variables', 'is_correct' => false],
                    ['option_text' => 'Converting tuple to list', 'is_correct' => false],
                    ['option_text' => 'Sorting tuple elements', 'is_correct' => false],
                ],
            ],

            [
                'question_text' => 'Tuple packing happens when:',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 44,
                'question_level_id' => 1,
                'question_tags' => ['python', 'tuple', 'packing'],
                'applicable_to' => ['class_9', 'class_10'],
                'options' => [
                    ['option_text' => 'Multiple values are assigned to one variable', 'is_correct' => true],
                    ['option_text' => 'One value is assigned to multiple variables', 'is_correct' => false],
                    ['option_text' => 'Tuple is converted to list', 'is_correct' => false],
                    ['option_text' => 'Tuple elements are modified', 'is_correct' => false],
                ],
            ],

            [
                'question_text' => 'Which of the following causes an error during tuple unpacking?',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 44,
                'question_level_id' => 1,
                'question_tags' => ['python', 'tuple', 'unpacking', 'error'],
                'applicable_to' => ['class_9', 'class_10'],
                'options' => [
                    ['option_text' => 'a, b = (1, 2)', 'is_correct' => false],
                    ['option_text' => 'a, b = (1, 2, 3)', 'is_correct' => true],
                    ['option_text' => 'a, b = [1, 2]', 'is_correct' => false],
                    ['option_text' => 'a, b = (10, 20)', 'is_correct' => false],
                ],
            ],

            [
                'question_text' => 'What will be the value of b?',
                'question_code' => 'a, *b = (1, 2, 3, 4)',
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 44,
                'question_level_id' => 1,
                'question_tags' => ['python', 'tuple', 'unpacking'],
                'applicable_to' => ['class_9', 'class_10'],
                'options' => [
                    ['option_text' => '[2, 3, 4]', 'is_correct' => true],
                    ['option_text' => '2', 'is_correct' => false],
                    ['option_text' => '(2, 3, 4)', 'is_correct' => false],
                    ['option_text' => 'Error', 'is_correct' => false],
                ],
            ],

            [
                'question_text' => 'Which symbol allows unpacking multiple values into one variable?',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 44,
                'question_level_id' => 1,
                'question_tags' => ['python', 'tuple', 'unpacking'],
                'applicable_to' => ['class_9', 'class_10'],
                'options' => [
                    ['option_text' => '*', 'is_correct' => true],
                    ['option_text' => '#', 'is_correct' => false],
                    ['option_text' => '&', 'is_correct' => false],
                    ['option_text' => '@', 'is_correct' => false],
                ],
            ],

            [
                'question_text' => 'What will be the output?',
                'question_code' => 'x, y, z = (5, 6, 7)
            print(y)',
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 44,
                'question_level_id' => 1,
                'question_tags' => ['python', 'tuple', 'unpacking', 'output'],
                'applicable_to' => ['class_9', 'class_10'],
                'options' => [
                    ['option_text' => '5', 'is_correct' => false],
                    ['option_text' => '6', 'is_correct' => true],
                    ['option_text' => '7', 'is_correct' => false],
                    ['option_text' => 'Error', 'is_correct' => false],
                ],
            ],

            [
                'question_text' => 'Which statement is TRUE about tuple unpacking?',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 44,
                'question_level_id' => 1,
                'question_tags' => ['python', 'tuple', 'unpacking'],
                'applicable_to' => ['class_9', 'class_10'],
                'options' => [
                    ['option_text' => 'Number of variables must match tuple elements', 'is_correct' => true],
                    ['option_text' => 'Tuple must be mutable', 'is_correct' => false],
                    ['option_text' => 'Tuple must be sorted', 'is_correct' => false],
                    ['option_text' => 'Variables can exceed elements', 'is_correct' => false],
                ],
            ],

            [
                'question_text' => 'What will be stored in variable a?',
                'question_code' => 'a = (1,)',
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 44,
                'question_level_id' => 1,
                'question_tags' => ['python', 'tuple'],
                'applicable_to' => ['class_9', 'class_10'],
                'options' => [
                    ['option_text' => 'Tuple with one element', 'is_correct' => true],
                    ['option_text' => 'Integer', 'is_correct' => false],
                    ['option_text' => 'List', 'is_correct' => false],
                    ['option_text' => 'Error', 'is_correct' => false],
                ],
            ],

            [
                'question_text' => 'Tuple unpacking is commonly used for:',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 44,
                'question_level_id' => 1,
                'question_tags' => ['python', 'tuple', 'unpacking'],
                'applicable_to' => ['class_9', 'class_10'],
                'options' => [
                    ['option_text' => 'Swapping variables', 'is_correct' => true],
                    ['option_text' => 'Deleting tuples', 'is_correct' => false],
                    ['option_text' => 'Sorting tuples', 'is_correct' => false],
                    ['option_text' => 'Modifying tuple values', 'is_correct' => false],
                ],
            ],

            [
                'question_text' => 'Which statement swaps values using tuple unpacking?',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 44,
                'question_level_id' => 1,
                'question_tags' => ['python', 'tuple', 'unpacking'],
                'applicable_to' => ['class_9', 'class_10'],
                'options' => [
                    ['option_text' => 'a, b = b, a', 'is_correct' => true],
                    ['option_text' => 'a = b; b = a', 'is_correct' => false],
                    ['option_text' => 'swap(a, b)', 'is_correct' => false],
                    ['option_text' => 'a == b', 'is_correct' => false],
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
