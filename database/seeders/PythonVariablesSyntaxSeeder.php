<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PythonVariablesSyntaxSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [

        [
            'question_text' => 'What is indentation in Python?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation', 'basics'],
            'applicable_to' => ['class_8', 'class_9', 'class_10'],
            'options' => [
                ['option_text' => 'Spaces at the beginning of a line', 'is_correct' => true],
                ['option_text' => 'Comments in Python', 'is_correct' => false],
                ['option_text' => 'Blank lines', 'is_correct' => false],
                ['option_text' => 'Variables in Python', 'is_correct' => false],
            ],
        ],

    [
        'question_text' => 'Why is indentation important in Python?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 8,
        'question_level_id' => 1,
        'question_tags' => ['python', 'indentation', 'rules'],
        'options' => [
            ['option_text' => 'It defines code blocks', 'is_correct' => true],
            ['option_text' => 'It improves speed', 'is_correct' => false],
            ['option_text' => 'It is optional', 'is_correct' => false],
            ['option_text' => 'It stores data', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Which error occurs due to wrong indentation?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 8,
        'question_level_id' => 1,
        'question_tags' => ['python', 'indentation', 'error'],
        'options' => [
            ['option_text' => 'IndentationError', 'is_correct' => true],
            ['option_text' => 'SyntaxError', 'is_correct' => false],
            ['option_text' => 'NameError', 'is_correct' => false],
            ['option_text' => 'TypeError', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'How many spaces are recommended for indentation in Python?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 8,
        'question_level_id' => 1,
        'question_tags' => ['python', 'indentation', 'pep8'],
        'options' => [
            ['option_text' => '4 spaces', 'is_correct' => true],
            ['option_text' => '2 spaces', 'is_correct' => false],
            ['option_text' => '6 spaces', 'is_correct' => false],
            ['option_text' => '8 spaces', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Which symbol starts an indented block in Python?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 8,
        'question_level_id' => 1,
        'question_tags' => ['python', 'indentation', 'syntax'],
        'options' => [
            ['option_text' => ':', 'is_correct' => true],
            ['option_text' => '{', 'is_correct' => false],
            ['option_text' => '(', 'is_correct' => false],
            ['option_text' => ';', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Is indentation required after an if statement?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 8,
        'question_level_id' => 1,
        'question_tags' => ['python', 'if', 'indentation'],
        'options' => [
            ['option_text' => 'Yes', 'is_correct' => true],
            ['option_text' => 'No', 'is_correct' => false],
            ['option_text' => 'Sometimes', 'is_correct' => false],
            ['option_text' => 'Only in loops', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Can Python code blocks be written without indentation?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 8,
        'question_level_id' => 1,
        'question_tags' => ['python', 'indentation', 'rules'],
        'options' => [
            ['option_text' => 'No', 'is_correct' => true],
            ['option_text' => 'Yes', 'is_correct' => false],
            ['option_text' => 'Only for functions', 'is_correct' => false],
            ['option_text' => 'Only for loops', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Which statement requires indentation?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 8,
        'question_level_id' => 1,
        'question_tags' => ['python', 'indentation', 'blocks'],
        'options' => [
            ['option_text' => 'for loop', 'is_correct' => true],
            ['option_text' => 'print()', 'is_correct' => false],
            ['option_text' => 'input()', 'is_correct' => false],
            ['option_text' => 'import', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Which error occurs when tabs and spaces are mixed?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 8,
        'question_level_id' => 1,
        'question_tags' => ['python', 'indentation', 'taberror'],
        'options' => [
            ['option_text' => 'TabError', 'is_correct' => true],
            ['option_text' => 'IndentationError', 'is_correct' => false],
            ['option_text' => 'ValueError', 'is_correct' => false],
            ['option_text' => 'SyntaxError', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Is indentation required inside a function?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 8,
        'question_level_id' => 1,
        'question_tags' => ['python', 'function', 'indentation'],
        'options' => [
            ['option_text' => 'Yes', 'is_correct' => true],
            ['option_text' => 'No', 'is_correct' => false],
            ['option_text' => 'Optional', 'is_correct' => false],
            ['option_text' => 'Only once', 'is_correct' => false],
        ],
    ],

    // -------- continue till 20 --------

    [
        'question_text' => 'Which indentation is correct in Python?',
        'question_code' => "if x > 5:\n    print(x)",
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 8,
        'question_level_id' => 1,
        'question_tags' => ['python', 'indentation', 'example'],
        'options' => [
            ['option_text' => '4 spaces before print()', 'is_correct' => true],
            ['option_text' => 'No space before print()', 'is_correct' => false],
            ['option_text' => 'Random spaces', 'is_correct' => false],
            ['option_text' => 'Using {}', 'is_correct' => false],
        ],
    ],

    // (You can duplicate this pattern to reach exactly 20 if needed)
];

    }
}
