<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Question;

class PythonOperatorsExpressionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {

            $questions = [

                [
                    'question_text' => 'Which operator is used for addition in Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'operators', 'arithmetic'],
                    'applicable_to' => ['class_8', 'class_9', 'class_10', 'all'],
                    'options' => [
                        ['option_text' => '+', 'is_correct' => true],
                        ['option_text' => '-', 'is_correct' => false],
                        ['option_text' => '*', 'is_correct' => false],
                        ['option_text' => '/', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which operator is used for subtraction in Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'operators', 'arithmetic'],
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '+', 'is_correct' => false],
                        ['option_text' => '-', 'is_correct' => true],
                        ['option_text' => '*', 'is_correct' => false],
                        ['option_text' => '%', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which operator is used for multiplication in Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'operators', 'arithmetic'],
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '*', 'is_correct' => true],
                        ['option_text' => 'x', 'is_correct' => false],
                        ['option_text' => '/', 'is_correct' => false],
                        ['option_text' => '+', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which operator is used for division in Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'operators', 'division'],
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '/', 'is_correct' => true],
                        ['option_text' => '//', 'is_correct' => false],
                        ['option_text' => '%', 'is_correct' => false],
                        ['option_text' => '*', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What does the % operator do in Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'operators', 'modulus'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Returns remainder', 'is_correct' => true],
                        ['option_text' => 'Performs division', 'is_correct' => false],
                        ['option_text' => 'Performs multiplication', 'is_correct' => false],
                        ['option_text' => 'Rounds result', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which operator performs floor division in Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'operators', 'floor-division'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '//', 'is_correct' => true],
                        ['option_text' => '/', 'is_correct' => false],
                        ['option_text' => '%', 'is_correct' => false],
                        ['option_text' => '**', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which operator is used for exponentiation in Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'operators', 'power'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '**', 'is_correct' => true],
                        ['option_text' => '^', 'is_correct' => false],
                        ['option_text' => '*', 'is_correct' => false],
                        ['option_text' => '//', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of: 10 + 5 * 2?',
                    'question_code' => '10 + 5 * 2',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'operators', 'precedence'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '20', 'is_correct' => true],
                        ['option_text' => '30', 'is_correct' => false],
                        ['option_text' => '15', 'is_correct' => false],
                        ['option_text' => '25', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of: 20 // 3?',
                    'question_code' => '20 // 3',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'operators', 'floor-division'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '6', 'is_correct' => true],
                        ['option_text' => '6.66', 'is_correct' => false],
                        ['option_text' => '7', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of: 7 % 3?',
                    'question_code' => '7 % 3',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'operators', 'modulus'],
                    'applicable_to' => ['class_8', 'class_9'],
                    'options' => [
                        ['option_text' => '1', 'is_correct' => true],
                        ['option_text' => '2', 'is_correct' => false],
                        ['option_text' => '3', 'is_correct' => false],
                        ['option_text' => '0', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which operator has the highest precedence?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'operators', 'precedence'],
                    'applicable_to' => ['class_10'],
                    'options' => [
                        ['option_text' => '**', 'is_correct' => true],
                        ['option_text' => '*', 'is_correct' => false],
                        ['option_text' => '+', 'is_correct' => false],
                        ['option_text' => '-', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of: 2 ** 3 ** 2?',
                    'question_code' => '2 ** 3 ** 2',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'operators', 'power'],
                    'applicable_to' => ['class_10'],
                    'options' => [
                        ['option_text' => '512', 'is_correct' => true],
                        ['option_text' => '64', 'is_correct' => false],
                        ['option_text' => '36', 'is_correct' => false],
                        ['option_text' => '16', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which arithmetic operator can be used with strings?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'operators', 'string'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '+', 'is_correct' => true],
                        ['option_text' => '/', 'is_correct' => false],
                        ['option_text' => '%', 'is_correct' => false],
                        ['option_text' => '//', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of: "Hi" * 3?',
                    'question_code' => '"Hi" * 3',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'operators', 'string'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'HiHiHi', 'is_correct' => true],
                        ['option_text' => 'Hi*3', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                        ['option_text' => 'Hi Hi Hi', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which arithmetic operator cannot be used with strings?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'operators', 'string'],
                    'applicable_to' => ['class_10'],
                    'options' => [
                        ['option_text' => '-', 'is_correct' => true],
                        ['option_text' => '+', 'is_correct' => false],
                        ['option_text' => '*', 'is_correct' => false],
                        ['option_text' => '**', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'print(8 + 4 / 2)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'operators', 'precedence'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '10.0', 'is_correct' => true],
                        ['option_text' => '6', 'is_correct' => false],
                        ['option_text' => '12', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'print((8 + 4) / 2)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'operators', 'precedence'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '6.0', 'is_correct' => true],
                        ['option_text' => '10', 'is_correct' => false],
                        ['option_text' => '12', 'is_correct' => false],
                        ['option_text' => '4', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'print(15 % 4 + 2)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'operators', 'modulus'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '5', 'is_correct' => true],
                        ['option_text' => '3', 'is_correct' => false],
                        ['option_text' => '6', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'print(2 * 3 ** 2)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'operators', 'power'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '18', 'is_correct' => true],
                        ['option_text' => '36', 'is_correct' => false],
                        ['option_text' => '12', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'print(9 // 2 + 1)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 15,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'operators', 'floor-division'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '5', 'is_correct' => true],
                        ['option_text' => '4.5', 'is_correct' => false],
                        ['option_text' => '6', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which operator is used for simple assignment in Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 16,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'assignment', 'operators'],
                    'applicable_to' => ['class_8', 'class_9'],
                    'options' => [
                        ['option_text' => '=', 'is_correct' => true],
                        ['option_text' => '==', 'is_correct' => false],
                        ['option_text' => '+=', 'is_correct' => false],
                        ['option_text' => '=>', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which of the following is a compound assignment operator?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 16,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'assignment', 'compound'],
                    'applicable_to' => ['class_8', 'class_9'],
                    'options' => [
                        ['option_text' => '+=', 'is_correct' => true],
                        ['option_text' => '==', 'is_correct' => false],
                        ['option_text' => '=', 'is_correct' => false],
                        ['option_text' => '!=', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'x = 5\nx += 3\nprint(x)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 16,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'assignment', 'compound'],
                    'applicable_to' => ['class_8', 'class_9'],
                    'options' => [
                        ['option_text' => '8', 'is_correct' => true],
                        ['option_text' => '5', 'is_correct' => false],
                        ['option_text' => '3', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'x = 10\nx -= 4\nprint(x)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 16,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'assignment', 'compound'],
                    'applicable_to' => ['class_8', 'class_9'],
                    'options' => [
                        ['option_text' => '6', 'is_correct' => true],
                        ['option_text' => '14', 'is_correct' => false],
                        ['option_text' => '10', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'x = 4\nx *= 2\nprint(x)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 16,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'assignment', 'compound'],
                    'applicable_to' => ['class_8', 'class_9'],
                    'options' => [
                        ['option_text' => '8', 'is_correct' => true],
                        ['option_text' => '6', 'is_correct' => false],
                        ['option_text' => '4', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'x = 10\nx /= 4\nprint(x)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 16,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'assignment', 'division'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '2.5', 'is_correct' => true],
                        ['option_text' => '2', 'is_correct' => false],
                        ['option_text' => '3', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'x = 10\nx //= 3\nprint(x)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 16,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'assignment', 'floor-division'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '3', 'is_correct' => true],
                        ['option_text' => '3.33', 'is_correct' => false],
                        ['option_text' => '4', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'x = 5\nx **= 2\nprint(x)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 16,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'assignment', 'power'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '25', 'is_correct' => true],
                        ['option_text' => '10', 'is_correct' => false],
                        ['option_text' => '7', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'x = 7\nx %= 3\nprint(x)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 16,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'assignment', 'modulus'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '1', 'is_correct' => true],
                        ['option_text' => '2', 'is_correct' => false],
                        ['option_text' => '3', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which statement is equivalent to: x += 5 ?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 16, 
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'assignment', 'compound'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'x = x + 5', 'is_correct' => true],
                        ['option_text' => 'x == x + 5', 'is_correct' => false],
                        ['option_text' => 'x =+ 5', 'is_correct' => false],
                        ['option_text' => 'x = 5 + x only', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'x = 5\ny = x\nx += 2\nprint(y)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 16,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'assignment', 'reference'],
                    'applicable_to' => ['class_10'],
                    'options' => [
                        ['option_text' => '5', 'is_correct' => true],
                        ['option_text' => '7', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                        ['option_text' => 'None', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'x = 10\nx += x * 2\nprint(x)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 16,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'assignment', 'precedence'],
                    'applicable_to' => ['class_10'],
                    'options' => [
                        ['option_text' => '30', 'is_correct' => true],
                        ['option_text' => '40', 'is_correct' => false],
                        ['option_text' => '20', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'x = 8\nx //= 3 + 1\nprint(x)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 16,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'assignment', 'floor-division'],
                    'applicable_to' => ['class_10'],
                    'options' => [
                        ['option_text' => '2', 'is_correct' => true],
                        ['option_text' => '1', 'is_correct' => false],
                        ['option_text' => '3', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'x = 2\nx **= 3 ** 2\nprint(x)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 16,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'assignment', 'power'],
                    'applicable_to' => ['class_10'],
                    'options' => [
                        ['option_text' => '512', 'is_correct' => true],
                        ['option_text' => '64', 'is_correct' => false],
                        ['option_text' => '16', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What will be the output of the following Python code?',
                    'question_code' => 'x = 5\nx =+ 3\nprint(x)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 16,
                    'question_level_id' => 2,
                    'question_tags' => ['python', 'assignment', 'trap'],
                    'applicable_to' => ['class_10'],
                    'options' => [
                        ['option_text' => '3', 'is_correct' => true],
                        ['option_text' => '8', 'is_correct' => false],
                        ['option_text' => '5', 'is_correct' => false],
                        ['option_text' => 'Error', 'is_correct' => false],
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
