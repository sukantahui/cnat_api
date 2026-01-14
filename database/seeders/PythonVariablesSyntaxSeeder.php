<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Question;

class PythonVariablesSyntaxSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {

            $questions = [

                // ---------- INDENTATION QUESTIONS ----------

                

        [
            'question_text' => 'What is indentation in Python?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => 'Spaces at the beginning of a line', 'is_correct' => true],
                ['option_text' => 'Blank lines', 'is_correct' => false],
                ['option_text' => 'Comments', 'is_correct' => false],
                ['option_text' => 'Variables', 'is_correct' => false],
            ],
        ],

        [
            'question_text' => 'Why is indentation important in Python?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => 'It defines code blocks', 'is_correct' => true],
                ['option_text' => 'It increases speed', 'is_correct' => false],
                ['option_text' => 'It stores data', 'is_correct' => false],
                ['option_text' => 'It is optional', 'is_correct' => false],
            ],
        ],

        [
            'question_text' => 'Which error occurs due to incorrect indentation?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => 'IndentationError', 'is_correct' => true],
                ['option_text' => 'TypeError', 'is_correct' => false],
                ['option_text' => 'NameError', 'is_correct' => false],
                ['option_text' => 'ValueError', 'is_correct' => false],
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
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => ':', 'is_correct' => true],
                ['option_text' => '{', 'is_correct' => false],
                ['option_text' => ';', 'is_correct' => false],
                ['option_text' => '()', 'is_correct' => false],
            ],
        ],

        [
            'question_text' => 'Is indentation mandatory in Python?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => 'Yes', 'is_correct' => true],
                ['option_text' => 'No', 'is_correct' => false],
                ['option_text' => 'Only for loops', 'is_correct' => false],
                ['option_text' => 'Only for functions', 'is_correct' => false],
            ],
        ],

        [
            'question_text' => 'Which error occurs when tabs and spaces are mixed?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => 'TabError', 'is_correct' => true],
                ['option_text' => 'IndexError', 'is_correct' => false],
                ['option_text' => 'ValueError', 'is_correct' => false],
                ['option_text' => 'NameError', 'is_correct' => false],
            ],
        ],

        [
            'question_text' => 'Which statements require indentation?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => 'if, for, while, def', 'is_correct' => true],
                ['option_text' => 'print only', 'is_correct' => false],
                ['option_text' => 'import only', 'is_correct' => false],
                ['option_text' => 'comments only', 'is_correct' => false],
            ],
        ],

        [
            'question_text' => 'Does Python use curly braces {} for code blocks?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => 'No', 'is_correct' => true],
                ['option_text' => 'Yes', 'is_correct' => false],
                ['option_text' => 'Sometimes', 'is_correct' => false],
                ['option_text' => 'Only in classes', 'is_correct' => false],
            ],
        ],

        [
            'question_text' => 'Which indentation style improves readability?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => 'Consistent indentation', 'is_correct' => true],
                ['option_text' => 'Random spaces', 'is_correct' => false],
                ['option_text' => 'No spaces', 'is_correct' => false],
                ['option_text' => 'Mixed tabs and spaces', 'is_correct' => false],
            ],
        ],

        [
            'question_text' => 'Is indentation required inside functions?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => 'Yes', 'is_correct' => true],
                ['option_text' => 'No', 'is_correct' => false],
                ['option_text' => 'Optional', 'is_correct' => false],
                ['option_text' => 'Only once', 'is_correct' => false],
            ],
        ],

        [
            'question_text' => 'Is indentation required inside loops?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => 'Yes', 'is_correct' => true],
                ['option_text' => 'No', 'is_correct' => false],
                ['option_text' => 'Only for for-loop', 'is_correct' => false],
                ['option_text' => 'Only for while-loop', 'is_correct' => false],
            ],
        ],

        [
            'question_text' => 'What happens if indentation levels are inconsistent?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => 'An error is raised', 'is_correct' => true],
                ['option_text' => 'Code runs normally', 'is_correct' => false],
                ['option_text' => 'Python ignores it', 'is_correct' => false],
                ['option_text' => 'Output changes only', 'is_correct' => false],
            ],
        ],

        [
            'question_text' => 'Which indentation is correct?',
            'question_code' => "if x > 5:\n    print(x)",
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => '4 spaces before print()', 'is_correct' => true],
                ['option_text' => 'No indentation', 'is_correct' => false],
                ['option_text' => 'Random spaces', 'is_correct' => false],
                ['option_text' => 'Using {}', 'is_correct' => false],
            ],
        ],

        [
            'question_text' => 'Indentation in Python replaces which feature of other languages?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => 'Braces {}', 'is_correct' => true],
                ['option_text' => 'Semicolons', 'is_correct' => false],
                ['option_text' => 'Variables', 'is_correct' => false],
                ['option_text' => 'Functions', 'is_correct' => false],
            ],
        ],

        [
            'question_text' => 'Which block does NOT require indentation?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => 'print()', 'is_correct' => true],
                ['option_text' => 'if', 'is_correct' => false],
                ['option_text' => 'for', 'is_correct' => false],
                ['option_text' => 'while', 'is_correct' => false],
            ],
        ],

        [
            'question_text' => 'Indentation is checked by Python at which time?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => 'At runtime', 'is_correct' => true],
                ['option_text' => 'After execution', 'is_correct' => false],
                ['option_text' => 'Never', 'is_correct' => false],
                ['option_text' => 'Only in IDE', 'is_correct' => false],
            ],
        ],

        [
            'question_text' => 'What does correct indentation mainly improve?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => 'Readability', 'is_correct' => true],
                ['option_text' => 'Execution speed', 'is_correct' => false],
                ['option_text' => 'Memory usage', 'is_correct' => false],
                ['option_text' => 'Compilation time', 'is_correct' => false],
            ],
        ],

        [
            'question_text' => 'Which indentation practice is recommended?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation'],
            'options' => [
                ['option_text' => 'Use spaces consistently', 'is_correct' => true],
                ['option_text' => 'Mix tabs and spaces', 'is_correct' => false],
                ['option_text' => 'Avoid indentation', 'is_correct' => false],
                ['option_text' => 'Indent randomly', 'is_correct' => false],
            ],
        ],
        [
            'question_text' => 'What will happen if a block of code is not properly indented in Python?',
            'question_code' => null,
            'question_image' => null,
            'question_type_id' => 1,
            'topic_id' => 8,
            'question_level_id' => 1,
            'question_tags' => ['python', 'indentation', 'error'],
            'options' => [
                ['option_text' => 'Python raises an IndentationError', 'is_correct' => true],
                ['option_text' => 'The program runs normally', 'is_correct' => false],
                ['option_text' => 'Only a warning is shown', 'is_correct' => false],
                ['option_text' => 'Python ignores indentation', 'is_correct' => false],
            ],
        ],
       
    //comments questions
    [
        'question_text' => 'What are comments in Python?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => 'Text ignored by the Python interpreter', 'is_correct' => true],
            ['option_text' => 'Executable Python code', 'is_correct' => false],
            ['option_text' => 'Input statements', 'is_correct' => false],
            ['option_text' => 'Error messages', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Which symbol is used to write a single-line comment in Python?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => '#', 'is_correct' => true],
            ['option_text' => '//', 'is_correct' => false],
            ['option_text' => '/* */', 'is_correct' => false],
            ['option_text' => '--', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'What is the main purpose of comments?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => 'To explain and document code', 'is_correct' => true],
            ['option_text' => 'To increase execution speed', 'is_correct' => false],
            ['option_text' => 'To declare variables', 'is_correct' => false],
            ['option_text' => 'To fix runtime errors', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'How does Python treat comments during program execution?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => 'They are ignored', 'is_correct' => true],
            ['option_text' => 'They are executed', 'is_correct' => false],
            ['option_text' => 'They cause an error', 'is_correct' => false],
            ['option_text' => 'They are printed', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Can comments be written at the end of a line of code?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => 'Yes, using #', 'is_correct' => true],
            ['option_text' => 'No, only on separate lines', 'is_correct' => false],
            ['option_text' => 'Only inside loops', 'is_correct' => false],
            ['option_text' => 'Only inside functions', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Which of the following is a correct comment?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => '# This is a comment', 'is_correct' => true],
            ['option_text' => '// This is a comment', 'is_correct' => false],
            ['option_text' => '/* This is a comment */', 'is_correct' => false],
            ['option_text' => '<!-- comment -->', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Which style is commonly used for multi-line comments in Python?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => 'Triple-quoted strings', 'is_correct' => true],
            ['option_text' => 'Double slashes', 'is_correct' => false],
            ['option_text' => 'Angle brackets', 'is_correct' => false],
            ['option_text' => 'Semicolons', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'What are docstrings in Python?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => 'Documentation strings for modules, classes, or functions', 'is_correct' => true],
            ['option_text' => 'Error messages', 'is_correct' => false],
            ['option_text' => 'Variable names', 'is_correct' => false],
            ['option_text' => 'Loop statements', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Which of the following is NOT a comment in Python?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => 'print("Hello")', 'is_correct' => true],
            ['option_text' => '# Hello', 'is_correct' => false],
            ['option_text' => '"""Hello"""', 'is_correct' => false],
            ['option_text' => '#print Hello', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Do comments affect the output of a Python program?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => 'No', 'is_correct' => true],
            ['option_text' => 'Yes', 'is_correct' => false],
            ['option_text' => 'Only multiline comments', 'is_correct' => false],
            ['option_text' => 'Only inline comments', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Can comments be used to disable code temporarily?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => 'Yes', 'is_correct' => true],
            ['option_text' => 'No', 'is_correct' => false],
            ['option_text' => 'Only in loops', 'is_correct' => false],
            ['option_text' => 'Only in classes', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Which comment improves code readability?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => 'Descriptive comments', 'is_correct' => true],
            ['option_text' => 'Random comments', 'is_correct' => false],
            ['option_text' => 'Long comments only', 'is_correct' => false],
            ['option_text' => 'Inline code', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Which symbol can start a comment anywhere in a line?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => '#', 'is_correct' => true],
            ['option_text' => '//', 'is_correct' => false],
            ['option_text' => '/*', 'is_correct' => false],
            ['option_text' => '<!--', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Are comments mandatory in Python programs?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => 'No', 'is_correct' => true],
            ['option_text' => 'Yes', 'is_correct' => false],
            ['option_text' => 'Only for large programs', 'is_correct' => false],
            ['option_text' => 'Only for functions', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Which comment style is recommended for explaining functions?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => 'Docstrings', 'is_correct' => true],
            ['option_text' => 'Inline comments', 'is_correct' => false],
            ['option_text' => 'Print statements', 'is_correct' => false],
            ['option_text' => 'Variables', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Can comments span multiple lines using #?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => 'Yes, by using # on each line', 'is_correct' => true],
            ['option_text' => 'No, it is not possible', 'is_correct' => false],
            ['option_text' => 'Only in loops', 'is_correct' => false],
            ['option_text' => 'Only in classes', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Which of the following best describes an inline comment?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => 'A comment written after a statement', 'is_correct' => true],
            ['option_text' => 'A comment on multiple lines', 'is_correct' => false],
            ['option_text' => 'A comment inside a loop only', 'is_correct' => false],
            ['option_text' => 'A comment inside a function only', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Which practice is recommended while writing comments?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => 'Keep comments clear and relevant', 'is_correct' => true],
            ['option_text' => 'Comment every line', 'is_correct' => false],
            ['option_text' => 'Avoid comments completely', 'is_correct' => false],
            ['option_text' => 'Use comments instead of code', 'is_correct' => false],
        ],
    ],

    [
        'question_text' => 'Which comment helps other programmers understand the code?',
        'question_code' => null,
        'question_image' => null,
        'question_type_id' => 1,
        'topic_id' => 9,
        'question_level_id' => 1,
        'question_tags' => ['python', 'comments'],
        'options' => [
            ['option_text' => 'Descriptive comments', 'is_correct' => true],
            ['option_text' => 'Short comments only', 'is_correct' => false],
            ['option_text' => 'Random comments', 'is_correct' => false],
            ['option_text' => 'Inline code', 'is_correct' => false],
        ],
    ],
    [
    'question_text' => 'Which of the following variable names is NOT valid in Python?',
    'question_code' => null,
    'question_image' => null,
    'question_type_id' => 1,
    'topic_id' => 9,
    'question_level_id' => 1,
    'question_tags' => ['python', 'variables', 'naming'],
    'options' => [
        ['option_text' => 'user_name', 'is_correct' => false],
        ['option_text' => '_userName', 'is_correct' => false],
        ['option_text' => 'userName', 'is_correct' => false],
        ['option_text' => 'user-name', 'is_correct' => true],
    ],
],
[
    'question_text' => 'Which of the following variable names is NOT valid in Python?',
    'question_code' => null,
    'question_image' => null,
    'question_type_id' => 1,
    'topic_id' => 9,
    'question_level_id' => 1,
    'question_tags' => ['python', 'variables', 'naming'],
    'options' => [
        ['option_text' => 'user_name', 'is_correct' => false],
        ['option_text' => '_userName', 'is_correct' => false],
        ['option_text' => 'userName', 'is_correct' => false],
        ['option_text' => 'user-name', 'is_correct' => true],
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
                    collect($options)->map(fn ($opt) => [
                        'option_text' => $opt['option_text'],
                        'option_code' => null,
                        'option_image' => null,
                        'is_correct' => $opt['is_correct'],
                        'inforce' => true,
                    ])->toArray()
                );
            }

        });
    }
}
