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
        $questions = [
            [
                'question_text' => 'What is a list in Python?',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 39,
                'question_level_id' => 1,
                'question_tags' => 'python,list,basics',
                'options' => [
                    ['option_text' => 'A collection of ordered and mutable elements', 'is_correct' => true],
                    ['option_text' => 'A fixed-size array', 'is_correct' => false],
                    ['option_text' => 'A key-value data structure', 'is_correct' => false],
                    ['option_text' => 'A function in Python', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => 'Which brackets are used to define a list in Python?',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 39,
                'question_level_id' => 1,
                'question_tags' => 'python,list,syntax',
                'options' => [
                    ['option_text' => '()', 'is_correct' => false],
                    ['option_text' => '{}', 'is_correct' => false],
                    ['option_text' => '[]', 'is_correct' => true],
                    ['option_text' => '<>', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => 'Which of the following is a valid Python list?',
                'question_code' => 'A = [1, "apple", 3.5]',
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 39,
                'question_level_id' => 1,
                'question_tags' => 'python,list,examples',
                'options' => [
                    ['option_text' => 'A = (1, 2, 3)', 'is_correct' => false],
                    ['option_text' => 'A = {1, 2, 3}', 'is_correct' => false],
                    ['option_text' => 'A = [1, "apple", 3.5]', 'is_correct' => true],
                    ['option_text' => 'A = <1, 2, 3>', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => 'Which index is used to access the first element of a Python list?',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 39,
                'question_level_id' => 1,
                'question_tags' => 'python,list,indexing',
                'options' => [
                    ['option_text' => '0', 'is_correct' => true],
                    ['option_text' => '1', 'is_correct' => false],
                    ['option_text' => '-1', 'is_correct' => false],
                    ['option_text' => 'First', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => 'Are Python lists mutable?',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 39,
                'question_level_id' => 1,
                'question_tags' => 'python,list,mutable',
                'options' => [
                    ['option_text' => 'Yes, elements can be changed', 'is_correct' => true],
                    ['option_text' => 'No, they are immutable', 'is_correct' => false],
                    ['option_text' => 'Only numbers can be changed', 'is_correct' => false],
                    ['option_text' => 'Only strings can be changed', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => 'Which function is used to find the number of elements in a list?',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 39,
                'question_level_id' => 1,
                'question_tags' => 'python,list,length',
                'options' => [
                    ['option_text' => 'size()', 'is_correct' => false],
                    ['option_text' => 'length()', 'is_correct' => false],
                    ['option_text' => 'len()', 'is_correct' => true],
                    ['option_text' => 'count()', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => 'Which of the following allows duplicate values in a list?',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 39,
                'question_level_id' => 1,
                'question_tags' => 'python,list,duplicates',
                'options' => [
                    ['option_text' => '[1, 2, 2, 3]', 'is_correct' => true],
                    ['option_text' => '{1, 2, 2, 3}', 'is_correct' => false],
                    ['option_text' => '(1, 2, 2, 3)', 'is_correct' => false],
                    ['option_text' => 'None', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => 'What is the correct way to create an empty list?',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 39,
                'question_level_id' => 1,
                'question_tags' => 'python,list,empty',
                'options' => [
                    ['option_text' => 'list = []', 'is_correct' => true],
                    ['option_text' => 'list = ()', 'is_correct' => false],
                    ['option_text' => 'list = {}', 'is_correct' => false],
                    ['option_text' => 'list = <>', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => 'Which data types can a Python list store?',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 39,
                'question_level_id' => 1,
                'question_tags' => 'python,list,datatypes',
                'options' => [
                    ['option_text' => 'Only integers', 'is_correct' => false],
                    ['option_text' => 'Only strings', 'is_correct' => false],
                    ['option_text' => 'Only floats', 'is_correct' => false],
                    ['option_text' => 'Mixed data types', 'is_correct' => true],
                ]
            ],
            [
                'question_text' => 'How do you access the last element of a list?',
                'question_code' => 'mylist[-1]',
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 39,
                'question_level_id' => 1,
                'question_tags' => 'python,list,negative-index',
                'options' => [
                    ['option_text' => 'mylist[-1]', 'is_correct' => true],
                    ['option_text' => 'mylist[last]', 'is_correct' => false],
                    ['option_text' => 'mylist[len]', 'is_correct' => false],
                    ['option_text' => 'mylist[end]', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => 'Can a list contain another list?',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 39,
                'question_level_id' => 1,
                'question_tags' => 'python,list,nested',
                'options' => [
                    ['option_text' => 'Yes', 'is_correct' => true],
                    ['option_text' => 'No', 'is_correct' => false],
                    ['option_text' => 'Only tuples', 'is_correct' => false],
                    ['option_text' => 'Only dictionaries', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => 'What will be the output of len([1, 2, 3, 4])?',
                'question_code' => 'len([1,2,3,4])',
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 39,
                'question_level_id' => 1,
                'question_tags' => 'python,list,len',
                'options' => [
                    ['option_text' => '3', 'is_correct' => false],
                    ['option_text' => '4', 'is_correct' => true],
                    ['option_text' => '5', 'is_correct' => false],
                    ['option_text' => 'Error', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => 'Which statement about Python lists is TRUE?',
                'question_code' => null,
                'question_image' => null,
                'question_type_id' => 1,
                'topic_id' => 39,
                'question_level_id' => 1,
                'question_tags' => 'python,list,properties',
                'options' => [
                    ['option_text' => 'Lists are ordered', 'is_correct' => true],
                    ['option_text' => 'Lists are immutable', 'is_correct' => false],
                    ['option_text' => 'Lists do not support indexing', 'is_correct' => false],
                    ['option_text' => 'Lists store only one data type', 'is_correct' => false],
                ]
            ],

        ];

        foreach ($questions as $q) {

            $questionId = DB::table('questions')->insertGetId([
                'question_text' => $q['question_text'],
                'question_code' => $q['question_code'],
                'question_image' => $q['question_image'],
                'question_type_id' => $q['question_type_id'],
                'topic_id' => $q['topic_id'],
                'question_level_id' => $q['question_level_id'],
                'question_tags' => $q['question_tags'],
                'inforce' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($q['options'] as $opt) {
                DB::table('options')->insert([
                    'question_id' => $questionId,
                    'option_text' => $opt['option_text'],
                    'option_code' => null,
                    'option_image' => null,
                    'is_correct' => $opt['is_correct'],
                    'inforce' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
