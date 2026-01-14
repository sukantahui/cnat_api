<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Question;

class TuplesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {

            $questions = [

                /*
                |--------------------------------------------------------------------------
                | Topic ID 44 : Tuple Packing & Unpacking
                |--------------------------------------------------------------------------
                */

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
                /*
                |--------------------------------------------------------------------------
                | Topic ID 44 : Tuple Packing & Unpacking (Additional 9)
                |--------------------------------------------------------------------------
                */

                [
                    'question_text' => 'Which of the following creates a tuple using packing?',
                    'question_code' => 'data = "a", 5, True',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'packing'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'data = "a", 5, True', 'is_correct' => true],
                        ['option_text' => 'data = ["a", 5, True]', 'is_correct' => false],
                        ['option_text' => 'data = {"a", 5, True}', 'is_correct' => false],
                        ['option_text' => 'data = ("a")', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which keyword is required for tuple unpacking?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'unpacking'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'No keyword is required', 'is_correct' => true],
                        ['option_text' => 'unpack', 'is_correct' => false],
                        ['option_text' => 'tuple', 'is_correct' => false],
                        ['option_text' => 'assign', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'How many variables are required to unpack a tuple of length 3?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'unpacking'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '3 variables', 'is_correct' => true],
                        ['option_text' => '2 variables', 'is_correct' => false],
                        ['option_text' => '1 variable', 'is_correct' => false],
                        ['option_text' => 'Any number', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What does the starred variable store during unpacking?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'unpacking'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Remaining values as a list', 'is_correct' => true],
                        ['option_text' => 'Only one value', 'is_correct' => false],
                        ['option_text' => 'A tuple', 'is_correct' => false],
                        ['option_text' => 'An integer', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which unpacking is valid?',
                    'question_code' => 'a, *b, c = (1, 2, 3, 4)',
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'unpacking'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'a, *b, c = (1, 2, 3, 4)', 'is_correct' => true],
                        ['option_text' => '*a, b = (1, 2)', 'is_correct' => false],
                        ['option_text' => 'a, b* = (1, 2)', 'is_correct' => false],
                        ['option_text' => 'a*, b = (1, 2)', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What type is created after tuple packing?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Tuple', 'is_correct' => true],
                        ['option_text' => 'List', 'is_correct' => false],
                        ['option_text' => 'Set', 'is_correct' => false],
                        ['option_text' => 'Dictionary', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which operator is used internally during tuple packing?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Comma (,)', 'is_correct' => true],
                        ['option_text' => 'Colon (:)', 'is_correct' => false],
                        ['option_text' => 'Dot (.)', 'is_correct' => false],
                        ['option_text' => 'Equals (=)', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Is parentheses mandatory for tuple packing?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'No', 'is_correct' => true],
                        ['option_text' => 'Yes', 'is_correct' => false],
                        ['option_text' => 'Only for strings', 'is_correct' => false],
                        ['option_text' => 'Only for numbers', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What is returned after unpacking completes?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Assigned variables', 'is_correct' => true],
                        ['option_text' => 'A new tuple', 'is_correct' => false],
                        ['option_text' => 'A list', 'is_correct' => false],
                        ['option_text' => 'None', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'What will be the output type of the variable after tuple unpacking?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 44,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'unpacking'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Individual variables', 'is_correct' => true],
                        ['option_text' => 'A single tuple', 'is_correct' => false],
                        ['option_text' => 'A list', 'is_correct' => false],
                        ['option_text' => 'A dictionary', 'is_correct' => false],
                    ],
                ],



                /*
                |--------------------------------------------------------------------------
                | Topic ID 45 : Tuple Immutability
                |--------------------------------------------------------------------------
                */

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

                /*
                    |--------------------------------------------------------------------------
                    | Topic ID 45 : Tuple Immutability (Additional 10)
                    |--------------------------------------------------------------------------
                    */

                [
                    'question_text' => 'Which property makes tuples safer than lists?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'immutability'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Immutability', 'is_correct' => true],
                        ['option_text' => 'Speed', 'is_correct' => false],
                        ['option_text' => 'Size', 'is_correct' => false],
                        ['option_text' => 'Sorting', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Can a tuple contain mutable objects?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Yes', 'is_correct' => true],
                        ['option_text' => 'No', 'is_correct' => false],
                        ['option_text' => 'Only integers', 'is_correct' => false],
                        ['option_text' => 'Only strings', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'What happens if a tuple contains a list?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'List inside tuple can be modified', 'is_correct' => true],
                        ['option_text' => 'Tuple becomes mutable', 'is_correct' => false],
                        ['option_text' => 'Error occurs', 'is_correct' => false],
                        ['option_text' => 'Tuple breaks', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which method cannot be used on tuples?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'append()', 'is_correct' => true],
                        ['option_text' => 'count()', 'is_correct' => false],
                        ['option_text' => 'index()', 'is_correct' => false],
                        ['option_text' => 'len()', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Can tuple length be changed?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'No', 'is_correct' => true],
                        ['option_text' => 'Yes', 'is_correct' => false],
                        ['option_text' => 'Only once', 'is_correct' => false],
                        ['option_text' => 'Only using loops', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which error occurs when modifying tuple?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'error'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'TypeError', 'is_correct' => true],
                        ['option_text' => 'IndexError', 'is_correct' => false],
                        ['option_text' => 'KeyError', 'is_correct' => false],
                        ['option_text' => 'ValueError', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Why are tuples hashable?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'They are immutable', 'is_correct' => true],
                        ['option_text' => 'They are ordered', 'is_correct' => false],
                        ['option_text' => 'They are indexed', 'is_correct' => false],
                        ['option_text' => 'They are fast', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which use case prefers tuples?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Fixed data collection', 'is_correct' => true],
                        ['option_text' => 'Dynamic data', 'is_correct' => false],
                        ['option_text' => 'Frequent updates', 'is_correct' => false],
                        ['option_text' => 'Sorting data', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which operation creates a new tuple?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Concatenation', 'is_correct' => true],
                        ['option_text' => 'Assignment', 'is_correct' => false],
                        ['option_text' => 'Replacement', 'is_correct' => false],
                        ['option_text' => 'Deletion', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which statement best explains tuple immutability?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 45,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'immutability'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Tuple elements cannot be reassigned', 'is_correct' => true],
                        ['option_text' => 'Tuple elements can be rearranged', 'is_correct' => false],
                        ['option_text' => 'Tuple supports item insertion', 'is_correct' => false],
                        ['option_text' => 'Tuple allows deletion of elements', 'is_correct' => false],
                    ],
                ],



                /*|--------------------------------------------------------------------------
                | Topic ID 46 : Tuple vs List
                |--------------------------------------------------------------------------*/
                [
                    'question_text' => 'What is the main difference between a tuple and a list in Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'list'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Tuples are immutable, lists are mutable', 'is_correct' => true],
                        ['option_text' => 'Lists are immutable, tuples are mutable', 'is_correct' => false],
                        ['option_text' => 'Both are immutable', 'is_correct' => false],
                        ['option_text' => 'Both are mutable', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which brackets are used to create a list?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '[]', 'is_correct' => true],
                        ['option_text' => '()', 'is_correct' => false],
                        ['option_text' => '{}', 'is_correct' => false],
                        ['option_text' => '<>', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which brackets are used to create a tuple?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '()', 'is_correct' => true],
                        ['option_text' => '[]', 'is_correct' => false],
                        ['option_text' => '{}', 'is_correct' => false],
                        ['option_text' => '<>', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which data structure is faster for iteration?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'list'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Tuple', 'is_correct' => true],
                        ['option_text' => 'List', 'is_correct' => false],
                        ['option_text' => 'Both same', 'is_correct' => false],
                        ['option_text' => 'Depends on values', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which data structure consumes less memory?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'list'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Tuple', 'is_correct' => true],
                        ['option_text' => 'List', 'is_correct' => false],
                        ['option_text' => 'Both same', 'is_correct' => false],
                        ['option_text' => 'Depends on size', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which of the following allows item modification?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'List', 'is_correct' => true],
                        ['option_text' => 'Tuple', 'is_correct' => false],
                        ['option_text' => 'Both', 'is_correct' => false],
                        ['option_text' => 'None', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which one can be used as a dictionary key?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'list'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Tuple', 'is_correct' => true],
                        ['option_text' => 'List', 'is_correct' => false],
                        ['option_text' => 'Both', 'is_correct' => false],
                        ['option_text' => 'None', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which operation is NOT allowed on tuples?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Item assignment', 'is_correct' => true],
                        ['option_text' => 'Indexing', 'is_correct' => false],
                        ['option_text' => 'Slicing', 'is_correct' => false],
                        ['option_text' => 'Concatenation', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which operation is allowed on both list and tuple?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'list'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Indexing', 'is_correct' => true],
                        ['option_text' => 'Appending', 'is_correct' => false],
                        ['option_text' => 'Removing items', 'is_correct' => false],
                        ['option_text' => 'Replacing values', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which data type should be used for fixed data?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'list'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Tuple', 'is_correct' => true],
                        ['option_text' => 'List', 'is_correct' => false],
                        ['option_text' => 'Set', 'is_correct' => false],
                        ['option_text' => 'Dictionary', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which data type should be used for frequently changing data?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'list'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'List', 'is_correct' => true],
                        ['option_text' => 'Tuple', 'is_correct' => false],
                        ['option_text' => 'Set', 'is_correct' => false],
                        ['option_text' => 'String', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which method exists only for lists?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'append()', 'is_correct' => true],
                        ['option_text' => 'count()', 'is_correct' => false],
                        ['option_text' => 'index()', 'is_correct' => false],
                        ['option_text' => 'len()', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which one supports slicing?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'list'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Both list and tuple', 'is_correct' => true],
                        ['option_text' => 'Only list', 'is_correct' => false],
                        ['option_text' => 'Only tuple', 'is_correct' => false],
                        ['option_text' => 'None', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which one is mutable?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'List', 'is_correct' => true],
                        ['option_text' => 'Tuple', 'is_correct' => false],
                        ['option_text' => 'String', 'is_correct' => false],
                        ['option_text' => 'Integer', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which one is immutable?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Tuple', 'is_correct' => true],
                        ['option_text' => 'List', 'is_correct' => false],
                        ['option_text' => 'Set', 'is_correct' => false],
                        ['option_text' => 'Dictionary', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which one is preferred for data integrity?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Tuple', 'is_correct' => true],
                        ['option_text' => 'List', 'is_correct' => false],
                        ['option_text' => 'Set', 'is_correct' => false],
                        ['option_text' => 'Dictionary', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which data structure allows duplicate elements?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple', 'list'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Both list and tuple', 'is_correct' => true],
                        ['option_text' => 'Only list', 'is_correct' => false],
                        ['option_text' => 'Only tuple', 'is_correct' => false],
                        ['option_text' => 'None', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which one is suitable for returning multiple values from a function?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'tuple'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Tuple', 'is_correct' => true],
                        ['option_text' => 'List', 'is_correct' => false],
                        ['option_text' => 'Set', 'is_correct' => false],
                        ['option_text' => 'Dictionary', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which one supports item insertion and deletion?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 46,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'list'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'List', 'is_correct' => true],
                        ['option_text' => 'Tuple', 'is_correct' => false],
                        ['option_text' => 'Both', 'is_correct' => false],
                        ['option_text' => 'None', 'is_correct' => false],
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
