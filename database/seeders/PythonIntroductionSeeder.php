<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Question;

class PythonIntroductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {

            $questions = [

                /* topic_id = 1 -> What is Python and where it is used */

                [
                    'question_text' => 'What is Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'introduction', 'basics'],
                    'applicable_to' => ['class_8', 'class_9', 'class_10', 'all'],
                    'options' => [
                        ['option_text' => 'A high-level programming language', 'is_correct' => true],
                        ['option_text' => 'An operating system', 'is_correct' => false],
                        ['option_text' => 'A web browser', 'is_correct' => false],
                        ['option_text' => 'A database software', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Who developed the Python programming language?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'history'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Guido van Rossum', 'is_correct' => true],
                        ['option_text' => 'Dennis Ritchie', 'is_correct' => false],
                        ['option_text' => 'James Gosling', 'is_correct' => false],
                        ['option_text' => 'Bjarne Stroustrup', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'In which year was Python first released?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'history'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => '1991', 'is_correct' => true],
                        ['option_text' => '1985', 'is_correct' => false],
                        ['option_text' => '2000', 'is_correct' => false],
                        ['option_text' => '2010', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Python is which type of programming language?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'features'],
                    'applicable_to' => ['class_8', 'class_9'],
                    'options' => [
                        ['option_text' => 'Interpreted', 'is_correct' => true],
                        ['option_text' => 'Compiled only', 'is_correct' => false],
                        ['option_text' => 'Machine language', 'is_correct' => false],
                        ['option_text' => 'Assembly language', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which of the following is a key feature of Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'features'],
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Easy to read and write syntax', 'is_correct' => true],
                        ['option_text' => 'Complex syntax', 'is_correct' => false],
                        ['option_text' => 'Platform dependent', 'is_correct' => false],
                        ['option_text' => 'Low-level memory handling', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Python is mainly used for which of the following?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'uses'],
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Web development, data science, AI', 'is_correct' => true],
                        ['option_text' => 'Only game development', 'is_correct' => false],
                        ['option_text' => 'Only hardware programming', 'is_correct' => false],
                        ['option_text' => 'Only mobile calling apps', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which company uses Python extensively?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'industry'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Google', 'is_correct' => true],
                        ['option_text' => 'Microsoft Paint', 'is_correct' => false],
                        ['option_text' => 'Notepad', 'is_correct' => false],
                        ['option_text' => 'Calculator', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Python is best suited for beginners because:',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'beginners'],
                    'applicable_to' => ['class_8', 'class_9'],
                    'options' => [
                        ['option_text' => 'It has simple and readable syntax', 'is_correct' => true],
                        ['option_text' => 'It requires complex setup', 'is_correct' => false],
                        ['option_text' => 'It has no libraries', 'is_correct' => false],
                        ['option_text' => 'It is hardware dependent', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which domain uses Python for data analysis?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'data-science'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Data Science', 'is_correct' => true],
                        ['option_text' => 'Mechanical Engineering only', 'is_correct' => false],
                        ['option_text' => 'Civil Construction', 'is_correct' => false],
                        ['option_text' => 'Electrical Wiring', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Python can be used for Artificial Intelligence?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'ai'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Yes', 'is_correct' => true],
                        ['option_text' => 'No', 'is_correct' => false],
                        ['option_text' => 'Only with C language', 'is_correct' => false],
                        ['option_text' => 'Only for games', 'is_correct' => false],
                    ],
                ],

                // ---- 10 more to complete 20 ----

                [
                    'question_text' => 'Python supports which programming style?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'paradigm'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Object-Oriented Programming', 'is_correct' => true],
                        ['option_text' => 'Only procedural', 'is_correct' => false],
                        ['option_text' => 'Only functional', 'is_correct' => false],
                        ['option_text' => 'Machine code', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which of the following is NOT a use of Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'uses'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Web development', 'is_correct' => false],
                        ['option_text' => 'Game development', 'is_correct' => false],
                        ['option_text' => 'Operating system kernel design', 'is_correct' => true],
                        ['option_text' => 'Machine learning', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Python is an open-source language. What does it mean?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'open-source'],
                    'applicable_to' => ['class_8', 'class_9'],
                    'options' => [
                        ['option_text' => 'Its source code is freely available', 'is_correct' => true],
                        ['option_text' => 'It is paid software', 'is_correct' => false],
                        ['option_text' => 'It works only online', 'is_correct' => false],
                        ['option_text' => 'It cannot be modified', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which field uses Python for automation?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'automation'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'IT and Software Testing', 'is_correct' => true],
                        ['option_text' => 'Painting', 'is_correct' => false],
                        ['option_text' => 'Cooking', 'is_correct' => false],
                        ['option_text' => 'Singing', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Python is platform independent. What does it mean?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'platform'],
                    'applicable_to' => ['class_8', 'class_9'],
                    'options' => [
                        ['option_text' => 'It runs on Windows, Linux, and Mac', 'is_correct' => true],
                        ['option_text' => 'It runs only on Windows', 'is_correct' => false],
                        ['option_text' => 'It runs only on Linux', 'is_correct' => false],
                        ['option_text' => 'It runs only on Mac', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which library is commonly used in Python for machine learning?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'ml'],
                    'applicable_to' => ['class_10'],
                    'options' => [
                        ['option_text' => 'TensorFlow', 'is_correct' => true],
                        ['option_text' => 'Bootstrap', 'is_correct' => false],
                        ['option_text' => 'Laravel', 'is_correct' => false],
                        ['option_text' => 'React', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Python is widely used in which sector?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'industry'],
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Education and Research', 'is_correct' => true],
                        ['option_text' => 'Only agriculture', 'is_correct' => false],
                        ['option_text' => 'Only banking hardware', 'is_correct' => false],
                        ['option_text' => 'Only civil engineering', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Python is commonly used for which of the following?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'applications'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Web applications', 'is_correct' => true],
                        ['option_text' => 'Only mobile calling', 'is_correct' => false],
                        ['option_text' => 'Only calculators', 'is_correct' => false],
                        ['option_text' => 'Only hardware chips', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Why is Python popular today?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'popularity'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Because of simplicity and wide usage', 'is_correct' => true],
                        ['option_text' => 'Because it is very difficult', 'is_correct' => false],
                        ['option_text' => 'Because it has no libraries', 'is_correct' => false],
                        ['option_text' => 'Because it is outdated', 'is_correct' => false],
                    ],
                ],
                [
                    'question_text' => 'Which of the following best describes Python?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 1,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'basics', 'definition'],
                    'applicable_to' => ['class_8', 'class_9', 'class_10', 'all'],
                    'options' => [
                        ['option_text' => 'A general-purpose high-level programming language', 'is_correct' => true],
                        ['option_text' => 'A computer hardware device', 'is_correct' => false],
                        ['option_text' => 'An internet protocol', 'is_correct' => false],
                        ['option_text' => 'A text editor', 'is_correct' => false],
                    ],
                ],
                /* topic_id = 2 -> Features of Python */

                [
                    'question_text' => 'Python is known for which type of syntax?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 2,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'features', 'syntax'],
                    'applicable_to' => ['class_8', 'class_9'],
                    'options' => [
                        ['option_text' => 'Simple and readable', 'is_correct' => true],
                        ['option_text' => 'Very complex', 'is_correct' => false],
                        ['option_text' => 'Machine-level', 'is_correct' => false],
                        ['option_text' => 'Binary-based', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Python is an interpreted language. What does this mean?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 2,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'features', 'interpreted'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Code is executed line by line', 'is_correct' => true],
                        ['option_text' => 'Code is converted to machine code first', 'is_correct' => false],
                        ['option_text' => 'Code runs only once', 'is_correct' => false],
                        ['option_text' => 'Code needs no execution', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which feature of Python helps it run on different operating systems?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 2,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'features', 'platform-independent'],
                    'applicable_to' => ['class_8', 'class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Platform independence', 'is_correct' => true],
                        ['option_text' => 'Low-level design', 'is_correct' => false],
                        ['option_text' => 'Hardware binding', 'is_correct' => false],
                        ['option_text' => 'Manual memory control', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Python supports which programming paradigm?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 2,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'features', 'paradigm'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Object-Oriented Programming', 'is_correct' => true],
                        ['option_text' => 'Only assembly programming', 'is_correct' => false],
                        ['option_text' => 'Only machine programming', 'is_correct' => false],
                        ['option_text' => 'Only hardware programming', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which feature allows Python to have a large collection of libraries?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 2,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'features', 'libraries'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Rich standard library', 'is_correct' => true],
                        ['option_text' => 'Limited framework support', 'is_correct' => false],
                        ['option_text' => 'Manual coding only', 'is_correct' => false],
                        ['option_text' => 'Hardware dependency', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Python is dynamically typed. What does it mean?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 2,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'features', 'dynamic-typing'],
                    'applicable_to' => ['class_10'],
                    'options' => [
                        ['option_text' => 'No need to declare variable data types', 'is_correct' => true],
                        ['option_text' => 'Variables never change', 'is_correct' => false],
                        ['option_text' => 'Data types are fixed', 'is_correct' => false],
                        ['option_text' => 'Variables store only numbers', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which feature of Python makes debugging easier?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 2,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'features', 'debugging'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'Clear and readable code', 'is_correct' => true],
                        ['option_text' => 'Binary execution', 'is_correct' => false],
                        ['option_text' => 'Complex syntax rules', 'is_correct' => false],
                        ['option_text' => 'Manual memory allocation', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Python manages memory automatically. Which feature enables this?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 2,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'features', 'memory'],
                    'applicable_to' => ['class_10'],
                    'options' => [
                        ['option_text' => 'Automatic memory management', 'is_correct' => true],
                        ['option_text' => 'Manual pointer usage', 'is_correct' => false],
                        ['option_text' => 'Direct hardware access', 'is_correct' => false],
                        ['option_text' => 'Assembly instructions', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which feature makes Python suitable for rapid application development?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 2,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'features', 'development'],
                    'applicable_to' => ['class_9', 'class_10'],
                    'options' => [
                        ['option_text' => 'High-level language structure', 'is_correct' => true],
                        ['option_text' => 'Low-level hardware access', 'is_correct' => false],
                        ['option_text' => 'Complex compilation steps', 'is_correct' => false],
                        ['option_text' => 'Machine language dependency', 'is_correct' => false],
                    ],
                ],

                [
                    'question_text' => 'Which feature of Python helps beginners learn programming easily?',
                    'question_code' => null,
                    'question_image' => null,
                    'question_type_id' => 1,
                    'topic_id' => 2,
                    'question_level_id' => 1,
                    'question_tags' => ['python', 'features', 'beginner-friendly'],
                    'applicable_to' => ['class_8', 'class_9'],
                    'options' => [
                        ['option_text' => 'Simple and English-like syntax', 'is_correct' => true],
                        ['option_text' => 'Strict hardware rules', 'is_correct' => false],
                        ['option_text' => 'Complex memory handling', 'is_correct' => false],
                        ['option_text' => 'Binary-level coding', 'is_correct' => false],
                    ],
                ]



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
