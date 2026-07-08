<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectWithChaptersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subject = Subject::create(['subject_code' => 'SUB001', 'subject_name' => 'Python Programming']);
        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Getting Started with Python']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'What is Python and where it is used'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Features of Python'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Python Installation'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Using IDLE, VS Code and PyCharm'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Running Python Files vs Interactive Shell'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'print() Function'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Basic Debugging using print()']
        ]);
        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Python Syntax, Variables & Data Types']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Python Indentation Rules'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Comments in Python'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Variables and Naming Conventions'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Keywords and Identifiers'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Core Data Types'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Type Casting'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Input and Output Formatting']
        ]);
        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Operators, Expressions & Logic']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Arithmetic Operators'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Assignment and Compound Operators'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Comparison Operators'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Logical Operators'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Operator Precedence'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Evaluating Expressions'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'String Concatenation and f-Strings'],
        ]);

        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Control Flow & Decision Making']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'if, elif, else Statements'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Nested Conditions'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Logical Conditions'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Decision Making Programs']
        ]);
        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Loops & Iteration']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'while Loop'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'for Loop with range()'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'break, continue, pass'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Nested Loops'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Pattern Printing'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Menu-driven Programs']
        ]);
        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Functions & Modular Programming']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Function Definition and Calling'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Parameters and Arguments'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Default Parameters'],
            ['chapter_id' => $chapter->id, 'topic_name' => '*args and **kwargs'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Return Values'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Lambda Functions'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Local and Global Scope']
        ]);
        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Lists & List Operations']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Introduction to Lists'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'List Indexing and Slicing'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'List Methods'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'List Comprehension'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Nested Lists']
        ]);

        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Tuples']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Tuple Packing and Unpacking'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Tuple Immutability'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Tuples vs Lists']
        ]);
        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Dictionaries']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Dictionary Creation and Access'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Dictionary Methods'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Nested Dictionaries'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Dictionary Comprehension']
        ]);
        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Sets']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Set Creation and Access'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Set Methods'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Set Operations'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Set Comprehension']
        ]);

        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'String Processing & Pattern Handling']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Opening Files'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Reading and Writing Files'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Working with CSV Files']
        ]);

        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Modules, Packages & Standard Library']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Classes and Objects'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Constructors (__init__)']

        ]);

        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Object-Oriented Programming in Python']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Inheritance'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Polymorphism'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Abstraction'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Encapsulation'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Static Methods'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Class Methods'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Properties'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Data Descriptors'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Metaclasses'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Abstract Base Classes'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Singletons'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Dataclasses']

        ]);

        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Exception Handling & Debugging']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'try, except, finally Blocks'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Raising Exceptions'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Custom Exception Classes'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Using pdb for Debugging'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Using print for Debugging'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Using logging for Debugging'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Using assert for Debugging'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Using warnings for Debugging']


        ]);

        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Working with JSON & External Data']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'JSON Module'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'APIs and Web Requests'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Parsing XML Data'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Working with CSV Files'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Working with Excel Files'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Working with SQL Databases'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Working with MongoDB Databases'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Working with PostgreSQL Databases'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Working with MySQL Databases'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Working with SQLite Databases']

        ]);

        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Decorators, Generators & Iterators']);
        $topic = Topic::insert([

            ['chapter_id' => $chapter->id, 'topic_name' => 'Decorators'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Generators'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Iterators']
        ]);

        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Advanced Comprehensions & Lambda Expressions']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'List Comprehensions'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Dictionary Comprehensions'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Set Comprehensions'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Lambda Functions'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Using map(), filter(), reduce()']
        ]);

        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Advanced File Operations & OS Module']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'File Handling Modes'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Working with File Paths'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Using os Module'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Using shutil Module'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Using tempfile Module'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Using glob Module'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Using pathlib Module']
        ]);

        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Performance Optimization & Big-O']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Performance Optimization'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Big-O Notation'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Time Complexity Analysis'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Space Complexity Analysis'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Big-O Examples'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Big-O Notation Examples'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Time and Space Complexity Examples']

        ]);
        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Testing & Quality Assurance in Python']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Unit Testing with unittest'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Test-Driven Development (TDD)'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Mocking and Patching'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Code Coverage Analysis'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Continuous Integration (CI) Basics'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Continuous Delivery (CD) Basics'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Quality Assurance (QA) Basics']
        ]);

        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Capstone Projects & Interview Preparation']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Capstone Projects & Interview Preparation']

        ]);

        $this->command->info("Subject table has been seeded for subject: " . $subject->subject_name);


        //subject for Basic Java Programming
        $subject = Subject::create(['subject_code' => 'SUB002', 'subject_name' => 'Basic Java Programming']);
        $chapter = Chapter::create(['subject_id' => $subject->id, 'chapter_name' => 'Getting Started with Java & JVM']);
        $topic = Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'What is Java and where it is used'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'History and evolution of Java'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Key features of Java (platform independent, object-oriented, secure, robust)'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Java editions: Java SE, Java EE, Java ME (overview)'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Java as a platform vs Java as a language'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Introduction to JDK, JRE and JVM'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Role of JVM in platform independence'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Java compilation and execution process'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'How Java source code is converted to bytecode'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Java program structure (class, main method, braces)'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Rules of writing a Java program'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Understanding public static void main(String[] args)'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'First Java program explanation line by line'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Compiling Java programs using javac'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Running Java programs using java command'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Common compilation and runtime errors'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Using System.out.print() and System.out.println()'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Difference between print() and println()'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Basic debugging using output statements'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Introduction to IDEs (BlueJ, IntelliJ IDEA, Eclipse – overview)'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Writing and running Java programs using an IDE'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Good coding practices for beginners']
        ]);

        $chapter = Chapter::create([
            'subject_id' => $subject->id,
            'chapter_name' => 'Java Syntax, Variables & Data Types'
        ]);

        Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Java program structure (class, main method, braces)'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Rules of Java syntax and statement termination (;)'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Variables and naming rules'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Identifiers and Java keywords'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Primitive data types: byte, short, int, long'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Floating-point data types: float, double'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Character data type (char) and Unicode'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Boolean data type'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Size and range of primitive data types'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Default values of instance variables'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Difference between local, instance, and static variables'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Variable declaration vs initialization'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Type casting: implicit (widening) and explicit (narrowing)'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Type promotion in expressions'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'final keyword with variables (constants)'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Using Scanner class for input'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Reading multiple inputs from user'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Escape sequences in output'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Simple input–output based programs'],
        ]);

        $chapter = Chapter::create([
            'subject_id' => $subject->id,
            'chapter_name' => 'Operators & Expressions'
        ]);

        Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'What are operators and operands'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Arithmetic operators (+, -, *, /, %)'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Integer division vs floating-point division'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Relational operators (==, !=, >, <, >=, <=)'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Difference between == and equals()'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Logical operators (&&, ||, !)'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Short-circuit evaluation'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Assignment operators'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Unary operators (++ and --)'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Prefix vs postfix increment/decrement'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Bitwise operators – basics'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Conditional (ternary) operator'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Operator precedence and associativity'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Expression evaluation with examples'],
        ]);

        $chapter = Chapter::create([
            'subject_id' => $subject->id,
            'chapter_name' => 'Decision Making'
        ]);

        Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'if statement'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'if-else statement'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Nested if statements'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'else-if ladder'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'switch-case statement'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'break and default in switch'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'switch vs if-else'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Menu-driven programs'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Real-world decision examples'],
        ]);

        $chapter = Chapter::create([
            'subject_id' => $subject->id,
            'chapter_name' => 'Loops & Iteration'
        ]);

        Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'for loop'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'while loop'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'do-while loop'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Nested loops'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'break and continue'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Infinite loops'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Pattern programs'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Menu-driven loop programs'],
        ]);

        $chapter = Chapter::create([
            'subject_id' => $subject->id,
            'chapter_name' => 'Classes, Objects & Encapsulation'
        ]);

        Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Introduction to OOP'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Class and object'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Object creation using new'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Constructors'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'this keyword'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Encapsulation'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Getters and setters'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Access modifiers'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Real-world class examples'],
        ]);

        $chapter = Chapter::create([
            'subject_id' => $subject->id,
            'chapter_name' => 'Inheritance & Method Overriding'
        ]);

        Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Inheritance concept'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'extends keyword'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Types of inheritance'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Method overriding'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'super keyword'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'final keyword in inheritance'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Real-world inheritance examples'],
        ]);

        $chapter = Chapter::create([
            'subject_id' => $subject->id,
            'chapter_name' => 'Abstract Classes'
        ]);

        Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Abstraction concept'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Abstract class and methods'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Extending abstract classes'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Constructor behavior'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Real-world abstract examples'],
        ]);

        $chapter = Chapter::create([
            'subject_id' => $subject->id,
            'chapter_name' => 'Interfaces in Java'
        ]);

        Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Interface concept'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'implements keyword'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Multiple inheritance using interfaces'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Default methods'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Functional interfaces'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Real-world interface examples'],
        ]);

        $chapter = Chapter::create([
            'subject_id' => $subject->id,
            'chapter_name' => 'Exception Handling'
        ]);

        Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Exception hierarchy'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Checked vs unchecked exceptions'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'try-catch-finally'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'throw and throws'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Custom exceptions'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Exception handling best practices'],
        ]);

        $chapter = Chapter::create([
            'subject_id' => $subject->id,
            'chapter_name' => 'File Handling & I/O Streams'
        ]);

        Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'File class'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Byte streams'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Character streams'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Buffered streams'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Serialization'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Binary file handling'],
        ]);

        $chapter = Chapter::create([
            'subject_id' => $subject->id,
            'chapter_name' => 'Collections Framework'
        ]);

        Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Collection framework overview'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'List interface'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Set interface'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Map interface'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Iterator and ListIterator'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Comparable vs Comparator'],
        ]);

        $chapter = Chapter::create([
            'subject_id' => $subject->id,
            'chapter_name' => 'Multithreading & Java Threads'
        ]);

        Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Thread lifecycle'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Thread vs Runnable'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Synchronization'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Deadlock'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Inter-thread communication'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Thread safety best practices'],
        ]);

        $chapter = Chapter::create([
            'subject_id' => $subject->id,
            'chapter_name' => 'JVM Internals & Memory Management'
        ]);

        Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'JVM architecture'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Class loading mechanism'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Heap vs stack memory'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Garbage collection'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'JVM tuning basics'],
        ]);

        $chapter = Chapter::create([
            'subject_id' => $subject->id,
            'chapter_name' => 'Performance & Best Practices'
        ]);

        Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Time and space complexity'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Efficient data structures'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'String performance'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Memory leak prevention'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Production-ready Java practices'],
        ]);

        $chapter = Chapter::create([
            'subject_id' => $subject->id,
            'chapter_name' => 'Capstone Projects & Interview Preparation'
        ]);

        Topic::insert([
            ['chapter_id' => $chapter->id, 'topic_name' => 'Core Java capstone projects'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'OOP interview questions'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Exception handling interview questions'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Collections & multithreading interviews'],
            ['chapter_id' => $chapter->id, 'topic_name' => 'Resume & portfolio preparation'],
        ]);




        $this->command->info("Subject table has been seeded for subject: " . $subject->subject_name);
        Subject::insert([

            ['subject_code' => 'SUB004', 'subject_name' => 'Office Procedure and Computer Fundamentals'],
            ['subject_code' => 'SUB005', 'subject_name' => 'Data Structure and Algorithm'],
            ['subject_code' => 'SUB006', 'subject_name' => 'Full Stack Development'],
            ['subject_code' => 'SUB007', 'subject_name' => 'Unix']
        ]);
    }
}
