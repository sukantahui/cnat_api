<?php

namespace Database\Seeders;
use App\Models\Course;
use App\Models\CourseDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseWithDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //adding courses
        $course = Course::create(['course_code' => 'RDBMS', 'course_name' => 'Relational Database Management System']);
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Database Systems',
                'topic_description' => 'Understanding data, information, and database concepts. Overview of file-based systems and their limitations.',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Database Architecture & Data Models',
                'topic_description' => 'Three-level database architecture, data abstraction, data independence, ER model, and relational model overview.',
                'theory_duration' => 3.0,
                'practical_duration' => 1.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Entity Relationship (ER) Modeling',
                'topic_description' => 'ER diagrams, entities, attributes, relationships, keys, cardinality, and conversion to relational schema.',
                'theory_duration' => 2.5,
                'practical_duration' => 1.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Relational Algebra and Calculus',
                'topic_description' => 'Operations like select, project, join, union, difference, and division. Introduction to tuple and domain relational calculus.',
                'theory_duration' => 3.0,
                'practical_duration' => 1.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'SQL – Structured Query Language',
                'topic_description' => 'DDL, DML, DCL, TCL commands; constraints; joins; nested queries; aggregate functions; and views.',
                'theory_duration' => 4.0,
                'practical_duration' => 4.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Normalization and Functional Dependencies',
                'topic_description' => 'Concepts of normalization, 1NF to 5NF, BCNF, and identifying anomalies and dependencies.',
                'theory_duration' => 3.0,
                'practical_duration' => 1.0,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Transaction Management and Concurrency Control',
                'topic_description' => 'ACID properties, transaction states, serializability, locking, and deadlock handling.',
                'theory_duration' => 3.0,
                'practical_duration' => 1.0,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Database Recovery and Backup Techniques',
                'topic_description' => 'Recovery techniques, checkpoints, log-based recovery, and backup strategies.',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Database Security and Authorization',
                'topic_description' => 'User authentication, privileges, roles, encryption, and SQL injection prevention.',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'PL/SQL and Stored Procedures',
                'topic_description' => 'Procedural extensions in SQL: variables, cursors, loops, triggers, and stored procedures.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Indexing and Query Optimization',
                'topic_description' => 'B-trees, hashing, cost-based optimization, and use of indexes for performance tuning.',
                'theory_duration' => 2.0,
                'practical_duration' => 1.0,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'NoSQL Overview (Optional)',
                'topic_description' => 'Brief comparison between relational and NoSQL databases, document and key-value stores.',
                'theory_duration' => 1.5,
                'practical_duration' => 0.5,
                'sequence' => 12,
            ],
        ]);

        $course = Course::create(['course_code' => 'JAVA', 'course_name' => 'JAVA Web Technologies']);
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Advanced Java',
                'topic_description' => 'Overview of Core vs Advanced Java, JDK structure, and setup for development with IDEs.',
                'theory_duration' => 1.5,
                'practical_duration' => 0.5,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Java Database Connectivity (JDBC)',
                'topic_description' => 'JDBC architecture, connection interface, statements, prepared statements, result sets, and transactions.',
                'theory_duration' => 3.0,
                'practical_duration' => 3.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Servlets and Web Applications',
                'topic_description' => 'Servlet lifecycle, request/response handling, session management, cookies, and deployment in Tomcat.',
                'theory_duration' => 3.0,
                'practical_duration' => 4.0,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'JavaServer Pages (JSP)',
                'topic_description' => 'JSP lifecycle, implicit objects, directives, JSTL, and JSP-Servlet integration.',
                'theory_duration' => 2.5,
                'practical_duration' => 3.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'JavaBeans and Custom Tags',
                'topic_description' => 'Creating reusable components using JavaBeans and using custom tag libraries in JSP.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Java Networking',
                'topic_description' => 'Working with sockets, URL and InetAddress classes, client-server communication, and multithreading with sockets.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Remote Method Invocation (RMI)',
                'topic_description' => 'Distributed programming with RMI: remote interfaces, stubs, skeletons, and registry.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Java Message Service (JMS)',
                'topic_description' => 'Messaging concepts, point-to-point vs publish-subscribe models, and message-driven beans.',
                'theory_duration' => 2.5,
                'practical_duration' => 1.5,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Spring Framework Basics',
                'topic_description' => 'Introduction to IoC, dependency injection, and using annotations in Spring Core.',
                'theory_duration' => 3.0,
                'practical_duration' => 3.0,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Hibernate ORM Framework',
                'topic_description' => 'Object-relational mapping, configuration, session management, CRUD operations, and relationships.',
                'theory_duration' => 3.0,
                'practical_duration' => 3.0,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Spring MVC Architecture',
                'topic_description' => 'Model-View-Controller architecture, form handling, validation, and integration with Hibernate.',
                'theory_duration' => 3.0,
                'practical_duration' => 3.0,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'RESTful Web Services in Java',
                'topic_description' => 'Creating REST APIs using Spring Boot, JSON handling, and HTTP methods.',
                'theory_duration' => 2.5,
                'practical_duration' => 3.0,
                'sequence' => 12,
            ],
            [
                'topic_title' => 'Java Security and Authentication',
                'topic_description' => 'User authentication, encryption, SSL, and secure coding practices in Java applications.',
                'theory_duration' => 2.0,
                'practical_duration' => 1.5,
                'sequence' => 13,
            ],
            [
                'topic_title' => 'Project Work',
                'topic_description' => 'Building a full-stack Java web application integrating Servlets, JSP, JDBC, and Spring Boot.',
                'theory_duration' => 1.0,
                'practical_duration' => 6.0,
                'sequence' => 14,
            ],
        ]);
        $course = Course::create(['course_code' => 'Tally01', 'course_name' => 'Tally Prime']);
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Accounting and Tally Prime',
                'topic_description' => 'Overview of accounting principles, need for computerised accounting, introduction to Tally Prime interface and features.',
                'theory_duration' => 1.5,
                'practical_duration' => 1.0,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Company Creation and Configuration',
                'topic_description' => 'Creating, selecting, altering and deleting companies; managing data directories; security and user management.',
                'theory_duration' => 1.0,
                'practical_duration' => 2.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Fundamentals of Accounting in Tally',
                'topic_description' => 'Understanding Groups, Ledgers, Vouchers, and Double Entry System; creating and managing ledger accounts.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Voucher Entries',
                'topic_description' => 'Recording transactions using different voucher types — Payment, Receipt, Contra, Journal, Sales, and Purchase.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Inventory Management in Tally Prime',
                'topic_description' => 'Stock groups, stock categories, stock items, units of measure, and stock valuation methods.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Bill-wise and Outstanding Management',
                'topic_description' => 'Managing bills receivable and payable, maintaining party balances, and ageing analysis reports.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Banking Features and Reconciliation',
                'topic_description' => 'Bank reconciliation, cheque management, post-dated cheques, and online banking features.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.5,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'GST in Tally Prime',
                'topic_description' => 'Introduction to Goods and Services Tax, GST configuration, creating GST ledgers, and filing GST returns using Tally.',
                'theory_duration' => 2.5,
                'practical_duration' => 3.0,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'TDS and TCS Management',
                'topic_description' => 'Configuring and calculating Tax Deducted at Source (TDS) and Tax Collected at Source (TCS) in Tally.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Payroll Management in Tally Prime',
                'topic_description' => 'Enabling payroll, creating employee masters, salary structures, attendance, and payslips.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Budgeting and Scenario Management',
                'topic_description' => 'Creating budgets, defining controls, variance analysis, and using scenarios for forecasting.',
                'theory_duration' => 1.5,
                'practical_duration' => 1.5,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Generating Financial Statements',
                'topic_description' => 'Viewing and customizing Balance Sheet, Profit & Loss Account, Cash Flow, and Ratio Analysis reports.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 12,
            ],
            [
                'topic_title' => 'Data Management and Security',
                'topic_description' => 'Backup and restore, data migration, password protection, user roles, and audit features.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 13,
            ],
            [
                'topic_title' => 'Tally Prime Reports and Printing',
                'topic_description' => 'Customizing report views, printing invoices, exporting data, and emailing reports.',
                'theory_duration' => 1.0,
                'practical_duration' => 2.0,
                'sequence' => 14,
            ],
            [
                'topic_title' => 'Practical Project: Full Business Cycle',
                'topic_description' => 'Recording transactions from company creation to final reports for a sample trading business.',
                'theory_duration' => 0.5,
                'practical_duration' => 5.0,
                'sequence' => 15,
            ],
        ]);
        $course = Course::create(['course_code' => 'Excel-01', 'course_name' => 'Advance Excel']);
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Excel Environment',
                'topic_description' => 'Overview of Excel interface, ribbons, workbooks, worksheets, and data entry basics.',
                'theory_duration' => 1.0,
                'practical_duration' => 1.5,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Cell Referencing and Data Formatting',
                'topic_description' => 'Understanding relative, absolute, and mixed references; number formats; conditional formatting.',
                'theory_duration' => 1.0,
                'practical_duration' => 2.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Data Validation and Drop-down Lists',
                'topic_description' => 'Restricting and validating data inputs; creating dependent lists and error alerts.',
                'theory_duration' => 1.0,
                'practical_duration' => 1.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Advanced Formulas and Functions',
                'topic_description' => 'In-depth use of text, date, logical, and statistical functions like IF, SUMIF, COUNTIF, and nested formulas.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Lookup and Reference Functions',
                'topic_description' => 'Using VLOOKUP, HLOOKUP, XLOOKUP, INDEX, and MATCH for data retrieval and dynamic referencing.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Working with Tables and Named Ranges',
                'topic_description' => 'Creating and formatting tables, structured references, and using named ranges in formulas.',
                'theory_duration' => 1.0,
                'practical_duration' => 2.0,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Data Sorting, Filtering and Subtotals',
                'topic_description' => 'Custom sorting, multiple-level filters, advanced filter options, and using subtotals.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Pivot Tables and Pivot Charts',
                'topic_description' => 'Creating pivot tables, grouping data, using slicers, and generating pivot charts for summaries.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'What-If Analysis and Data Tools',
                'topic_description' => 'Goal Seek, Scenario Manager, Data Tables, and consolidation of data across workbooks.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.5,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Charts and Visualization Techniques',
                'topic_description' => 'Creating and customizing various charts, combo charts, and using Sparklines and conditional visuals.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Macros and Automation (VBA Introduction)',
                'topic_description' => 'Recording, editing, and running macros; basic introduction to VBA editor and automation tasks.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Protection, Security and Collaboration',
                'topic_description' => 'Protecting worksheets, sharing workbooks, tracking changes, and password protection.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 12,
            ],
            [
                'topic_title' => 'Importing and Cleaning Data',
                'topic_description' => 'Using Power Query, Text-to-Columns, Flash Fill, and data cleaning techniques.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.5,
                'sequence' => 13,
            ],
            [
                'topic_title' => 'Dashboards and Reports',
                'topic_description' => 'Creating interactive dashboards using pivot tables, charts, slicers, and form controls.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 14,
            ],
            [
                'topic_title' => 'Project: Business Data Analysis in Excel',
                'topic_description' => 'Practical case study involving report generation, analysis, and dashboard presentation.',
                'theory_duration' => 1.0,
                'practical_duration' => 4.0,
                'sequence' => 15,
            ],
        ]);

        $course = Course::create(['course_code' => 'GST', 'course_name' => 'GST']);
        // 📘 Add detailed topics for the course
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to GST',
                'topic_description' => 'Overview of Goods and Services Tax system, history, and structure in India.',
                'theory_duration' => 2.00,
                'practical_duration' => 0.00,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'GST Registration',
                'topic_description' => 'Process and requirements for GST registration for businesses and professionals.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Filing GST Returns',
                'topic_description' => 'Step-by-step guide to filing monthly, quarterly, and annual GST returns using GST portal.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Input Tax Credit (ITC)',
                'topic_description' => 'Understanding ITC claims, restrictions, and reconciliation procedures.',
                'theory_duration' => 1.50,
                'practical_duration' => 0.50,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'GST Compliance & Audit',
                'topic_description' => 'Compliance checklist, audit procedures, and common errors to avoid in GST.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.00,
                'sequence' => 5,
            ],
        ]);

        $course = Course::create(['course_code' => 'C01', 'course_name' => 'C Programming']);
        // 📘 Add topic details for this course
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to C Programming',
                'topic_description' => 'Overview of C language history, features, and structure of a C program.',
                'theory_duration' => 1.50,
                'practical_duration' => 0.50,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Data Types, Variables, and Operators',
                'topic_description' => 'Understanding data types, constants, variables, and use of arithmetic, logical, and relational operators.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.00,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Control Statements',
                'topic_description' => 'Conditional and looping constructs like if-else, switch, for, while, and do-while loops.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Functions and Recursion',
                'topic_description' => 'Creating functions, function prototypes, passing parameters, and recursive calls.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Arrays and Strings',
                'topic_description' => 'Single and multi-dimensional arrays, string handling, and common string functions.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Pointers',
                'topic_description' => 'Pointer basics, pointer arithmetic, and dynamic memory allocation concepts.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Structures and File Handling',
                'topic_description' => 'Defining structures, nested structures, file operations such as reading, writing, and appending files.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 7,
            ],
        ]);

        // 🐍 Create the main course
        $course = Course::create([
            'course_code' => 'P01',
            'course_name' => 'Python Programming',
        ]);

        // 📘 Add topic details for Python Programming
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Python',
                'topic_description' => 'Overview of Python language, its features, installation, and first program execution.',
                'theory_duration' => 1.50,
                'practical_duration' => 0.50,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Data Types, Variables, and Operators',
                'topic_description' => 'Understanding Python data types, variables, constants, and different types of operators.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.00,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Conditional Statements and Loops',
                'topic_description' => 'Implementing decision-making with if-else, nested if, and loops like for and while.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Functions and Modules',
                'topic_description' => 'Creating reusable functions, understanding scope, and working with Python modules.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Lists, Tuples, and Dictionaries',
                'topic_description' => 'Working with Python’s key data structures for storing and accessing collections of data.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'File Handling',
                'topic_description' => 'Reading from and writing to files, handling file exceptions, and working with CSV files.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Object-Oriented Programming in Python',
                'topic_description' => 'Classes, objects, inheritance, polymorphism, and encapsulation in Python.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Exception Handling and Libraries',
                'topic_description' => 'Understanding try-except blocks and exploring common libraries like math, datetime, and os.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 8,
            ],
        ]);
        // ☕ Create the main course
        $course = Course::create([
            'course_code' => 'J01',
            'course_name' => 'Basic Java Programming',
        ]);

        // 📘 Add topic details for this course
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Java',
                'topic_description' => 'Overview of Java, its features, JDK installation, and structure of a Java program.',
                'theory_duration' => 1.50,
                'practical_duration' => 0.50,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Data Types, Variables, and Operators',
                'topic_description' => 'Understanding Java data types, variables, literals, and different types of operators.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.00,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Control Statements',
                'topic_description' => 'Decision-making with if, if-else, switch, and looping constructs like for, while, and do-while.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Arrays and Strings',
                'topic_description' => 'Single and multi-dimensional arrays, string handling, and use of String class methods.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Methods and Recursion',
                'topic_description' => 'Creating methods, parameter passing, return values, and understanding recursion.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Object-Oriented Programming Concepts',
                'topic_description' => 'Classes, objects, constructors, method overloading, and encapsulation principles.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Inheritance and Polymorphism',
                'topic_description' => 'Extending classes, using super keyword, overriding methods, and runtime polymorphism.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Exception Handling and File I/O',
                'topic_description' => 'Working with try-catch blocks, custom exceptions, and basic file input/output operations in Java.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 8,
            ],
        ]);
        // ☕ Create the main course
        $course = Course::create([
            'course_code' => 'J02',
            'course_name' => 'Advance Java',
        ]);

        // 📘 Add topic details for this course
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Core Java',
                'topic_description' => 'Overview of Java language, JVM architecture, features, and difference between JDK, JRE, and JVM.',
                'theory_duration' => 1.50,
                'practical_duration' => 0.50,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Data Types, Variables, and Operators',
                'topic_description' => 'Understanding primitive and non-primitive data types, variables, constants, and different operators in Java.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.00,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Control Flow and Loops',
                'topic_description' => 'Working with if-else, switch, for, while, and do-while loops; using break and continue statements.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Arrays and String Handling',
                'topic_description' => 'Understanding arrays (1D & 2D), String class, StringBuffer, and StringBuilder operations.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Methods and Constructors',
                'topic_description' => 'Defining methods, method overloading, parameter passing, recursion, and different types of constructors.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Object-Oriented Programming Basics',
                'topic_description' => 'Core OOP concepts — classes, objects, encapsulation, and the “this” keyword.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Inheritance in Java',
                'topic_description' => 'Single and multilevel inheritance, use of super keyword, constructor chaining, and method overriding.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Abstract Classes and Methods',
                'topic_description' => 'Understanding abstraction, abstract methods, and real-world examples of abstract classes in Java.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Interfaces and Multiple Inheritance',
                'topic_description' => 'Creating and implementing interfaces, default and static methods in interfaces, and multiple inheritance via interfaces.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Packages and Access Modifiers',
                'topic_description' => 'Organizing code using packages and understanding public, private, protected, and default access levels.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Exception Handling in Java',
                'topic_description' => 'Using try-catch-finally blocks, throw and throws keywords, custom exceptions, and handling multiple exceptions.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Generics in Java',
                'topic_description' => 'Understanding type safety, generic classes, methods, and collections framework with generics.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 12,
            ],
            [
                'topic_title' => 'Wrapper Classes and Autoboxing',
                'topic_description' => 'Concept of wrapper classes, conversion between primitives and objects, and autoboxing/unboxing.',
                'theory_duration' => 1.00,
                'practical_duration' => 1.00,
                'sequence' => 13,
            ],
            [
                'topic_title' => 'Collection Framework Overview',
                'topic_description' => 'Introduction to List, Set, Map interfaces and common implementations like ArrayList and HashMap.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 14,
            ],
        ]);
        // 💻 Create the main course
        $course = Course::create([
            'course_code' => 'O01',
            'course_name' => 'Office Procedure and Computer Fundamentals',
        ]);

        // 📘 Add detailed topics for this course
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Office Procedure',
                'topic_description' => 'Understanding office setup, official communication, filing system, record keeping, and basic administrative workflow.',
                'theory_duration' => 2.00,
                'practical_duration' => 0.50,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Fundamentals of Computer',
                'topic_description' => 'Basics of computer hardware, software, input-output devices, storage units, and computer generations.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Operating System and Windows 11 Interface',
                'topic_description' => 'Introduction to operating systems, Windows 11 features, desktop customization, file and folder management, and system tools.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'MS Word — Document Creation and Formatting',
                'topic_description' => 'Creating and editing documents, formatting text, using styles, inserting tables, images, headers, and footers.',
                'theory_duration' => 1.50,
                'practical_duration' => 2.00,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'MS Word — Advanced Features',
                'topic_description' => 'Mail merge, templates, track changes, comments, table of contents, and printing options.',
                'theory_duration' => 1.00,
                'practical_duration' => 1.50,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'MS Excel — Basics and Data Entry',
                'topic_description' => 'Introduction to spreadsheets, data entry, cell referencing, formulas, and basic formatting.',
                'theory_duration' => 1.50,
                'practical_duration' => 2.00,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'MS Excel — Formulas, Charts, and Data Analysis',
                'topic_description' => 'Using functions, creating charts, conditional formatting, and basic data analysis tools like sorting and filtering.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'MS PowerPoint — Presentation Basics',
                'topic_description' => 'Creating slides, themes, text and image insertion, transitions, and animation effects.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'MS PowerPoint — Advanced Presentation Design',
                'topic_description' => 'Slide master, custom animations, multimedia integration, and preparing for live presentations.',
                'theory_duration' => 1.00,
                'practical_duration' => 1.50,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Basic Internet and Email Usage',
                'topic_description' => 'Using web browsers, searching information, downloading files, creating and managing email accounts, and internet safety.',
                'theory_duration' => 1.00,
                'practical_duration' => 1.00,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Introduction to HTML',
                'topic_description' => 'Basics of web development, understanding HTML structure, tags, attributes, and creating a simple webpage.',
                'theory_duration' => 1.50,
                'practical_duration' => 2.00,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'HTML Formatting and Links',
                'topic_description' => 'Formatting text, inserting images, hyperlinks, tables, and basic page layout design.',
                'theory_duration' => 1.50,
                'practical_duration' => 2.00,
                'sequence' => 12,
            ],
        ]);

        // 🧠 Create the main course
        $course = Course::create([
            'course_code' => 'DS01',
            'course_name' => 'Data Structure and Algorithm',
        ]);

        // 📘 Add detailed topics for this course
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Data Structures and Algorithms',
                'topic_description' => 'Understanding what data structures and algorithms are, their importance, and types of data structures.',
                'theory_duration' => 1.50,
                'practical_duration' => 0.50,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Algorithm Analysis and Big O Notation',
                'topic_description' => 'Time and space complexity, Big O, Big Theta, and Big Omega notations, and analyzing algorithm efficiency.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.00,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Arrays and Strings',
                'topic_description' => 'Introduction to arrays, operations like insertion, deletion, traversal, and string manipulation.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Linked Lists',
                'topic_description' => 'Singly, doubly, and circular linked lists with operations such as insertion, deletion, and traversal.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Stacks',
                'topic_description' => 'Concept of LIFO, stack operations using arrays and linked lists, and applications such as expression evaluation.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Queues',
                'topic_description' => 'FIFO principle, types of queues (simple, circular, priority, and deque), and real-life applications.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Recursion and Divide & Conquer Algorithms',
                'topic_description' => 'Concept of recursion, stack frame management, and examples like factorial, Fibonacci, and binary search.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Searching and Sorting Algorithms',
                'topic_description' => 'Linear and binary search; sorting algorithms such as bubble sort, selection sort, insertion sort, merge sort, and quick sort.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Trees and Binary Search Trees',
                'topic_description' => 'Tree terminology, binary trees, traversals (inorder, preorder, postorder), and binary search tree operations.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Heaps and Priority Queues',
                'topic_description' => 'Understanding heap structure, heapify process, insertion and deletion in heaps, and heap sort.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Graphs and Graph Traversals',
                'topic_description' => 'Graph representation (adjacency matrix/list), BFS, DFS, and shortest path algorithms (Dijkstra, Floyd-Warshall).',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Hashing and Hash Tables',
                'topic_description' => 'Concept of hash functions, collision resolution techniques (chaining, open addressing), and load factor.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 12,
            ],
            [
                'topic_title' => 'Greedy, Dynamic Programming, and Backtracking',
                'topic_description' => 'Introduction to problem-solving techniques — greedy algorithms, dynamic programming, and backtracking concepts.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 13,
            ],
        ]);
        $course = Course::create([
            'course_code' => 'C06',
            'course_name' => 'Full Stack Development'
        ]);

        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Full Stack Development',
                'topic_description' => 'Overview of front-end, back-end, and database layers. Understanding client-server architecture and developer roles.',
                'theory_duration' => 1.5,
                'practical_duration' => 0.5,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Basic HTML',
                'topic_description' => 'Learning HTML structure, elements, tags, and document formatting. Creating static web pages.',
                'theory_duration' => 2,
                'practical_duration' => 3,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'CSS Fundamentals',
                'topic_description' => 'Styling web pages using CSS, selectors, colors, layouts, and responsive design.',
                'theory_duration' => 2,
                'practical_duration' => 3,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Bootstrap Framework',
                'topic_description' => 'Building responsive websites quickly using Bootstrap classes and components.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.5,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Tailwind CSS',
                'topic_description' => 'Learning utility-first CSS with Tailwind for rapid UI development.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.5,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'JavaScript Basics',
                'topic_description' => 'Variables, functions, events, DOM manipulation, and loops in JavaScript.',
                'theory_duration' => 3,
                'practical_duration' => 4,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'jQuery Essentials',
                'topic_description' => 'Simplifying JavaScript with jQuery for DOM traversal, effects, and AJAX.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.5,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'PHP Programming',
                'topic_description' => 'Server-side scripting using PHP. Form handling, sessions, and file operations.',
                'theory_duration' => 3,
                'practical_duration' => 5,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'MySQL Database',
                'topic_description' => 'Database design, CRUD operations, joins, and relationships using MySQL.',
                'theory_duration' => 2,
                'practical_duration' => 3,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Laravel Framework',
                'topic_description' => 'MVC structure, routing, controllers, models, migrations, and authentication using Laravel.',
                'theory_duration' => 3,
                'practical_duration' => 5,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'API Development with Laravel',
                'topic_description' => 'Creating and consuming RESTful APIs using Laravel.',
                'theory_duration' => 2,
                'practical_duration' => 3,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Node.js Fundamentals',
                'topic_description' => 'Introduction to Node.js environment, npm packages, and backend scripting.',
                'theory_duration' => 2,
                'practical_duration' => 3,
                'sequence' => 12,
            ],
            [
                'topic_title' => 'Angular Basics',
                'topic_description' => 'Learning Angular components, directives, and data binding concepts.',
                'theory_duration' => 2,
                'practical_duration' => 3,
                'sequence' => 13,
            ],
            [
                'topic_title' => 'React.js Fundamentals',
                'topic_description' => 'Component-based architecture, state management, and hooks in React.',
                'theory_duration' => 2,
                'practical_duration' => 3,
                'sequence' => 14,
            ],
            [
                'topic_title' => 'Version Control with Git & GitHub',
                'topic_description' => 'Working with Git commands, repositories, branches, and collaboration on GitHub.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.5,
                'sequence' => 15,
            ],
            [
                'topic_title' => 'Live Project Development',
                'topic_description' => 'Building and deploying a full-stack project integrating all learned technologies.',
                'theory_duration' => 2,
                'practical_duration' => 8,
                'sequence' => 16,
            ],
        ]);

        //Diploma in Computer Application
        $course = Course::create(['course_code' => 'DCA', 'course_name' => 'Diploma in Computer Application']);
        $course->details()->createMany([
            [
                'topic_title' => 'Computer Fundamentals',
                'topic_description' => 'Introduction to computers, hardware, software, input/output devices, and basic operating concepts.',
                'theory_duration' => 2.0,
                'practical_duration' => 1.0,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Operating System Basics',
                'topic_description' => 'Understanding Windows OS, file management, control panel, system tools, and shortcuts.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Microsoft Word',
                'topic_description' => 'Creating documents, formatting text, tables, mail merge, and printing documents.',
                'theory_duration' => 1.5,
                'practical_duration' => 3.0,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Microsoft Excel',
                'topic_description' => 'Working with spreadsheets, formulas, charts, sorting, and filtering data.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Microsoft PowerPoint',
                'topic_description' => 'Creating presentations, animations, slide transitions, and presentation techniques.',
                'theory_duration' => 1.0,
                'practical_duration' => 2.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Internet and Email',
                'topic_description' => 'Using browsers, search engines, email communication, and online collaboration tools.',
                'theory_duration' => 1.5,
                'practical_duration' => 1.5,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Basic HTML',
                'topic_description' => 'Introduction to HTML, creating web pages, tags, attributes, and hyperlinks.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Computer Security',
                'topic_description' => 'Understanding viruses, malware, antivirus tools, and safe internet practices.',
                'theory_duration' => 1.0,
                'practical_duration' => 0.5,
                'sequence' => 8,
            ],
        ]);

        $course = Course::create(['course_code' => 'DFA', 'course_name' => 'Diploma in Financial Accounting']);

        $course->details()->createMany([
            [
                'topic_title' => 'Fundamentals of Accounting',
                'topic_description' => 'Basic accounting principles, accounting equation, and double-entry system.',
                'theory_duration' => 2.0,
                'practical_duration' => 1.0,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Journal and Ledger',
                'topic_description' => 'Recording transactions in journals and posting them to ledger accounts.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Trial Balance',
                'topic_description' => 'Preparing and understanding trial balance and detecting accounting errors.',
                'theory_duration' => 1.5,
                'practical_duration' => 1.0,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Final Accounts',
                'topic_description' => 'Preparing trading account, profit and loss account, and balance sheet.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Computerised Accounting with Tally',
                'topic_description' => 'Creating companies, ledger accounts, voucher entries, and generating reports.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'GST Basics',
                'topic_description' => 'GST structure, tax types, GST returns, and compliance requirements.',
                'theory_duration' => 2.0,
                'practical_duration' => 1.5,
                'sequence' => 6,
            ],
        ]);

        $course = Course::create(['course_code' => 'AI01', 'course_name' => 'AI and Automation']);

        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Artificial Intelligence',
                'topic_description' => 'Overview of AI, machine learning, and real-world AI applications.',
                'theory_duration' => 2.0,
                'practical_duration' => 1.0,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Python for AI',
                'topic_description' => 'Python basics, libraries, and scripting for automation tasks.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Machine Learning Basics',
                'topic_description' => 'Supervised vs unsupervised learning, training models, and evaluation.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.0,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'AI Tools and Platforms',
                'topic_description' => 'Using tools like ChatGPT, Midjourney, automation platforms, and AI APIs.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Business Automation',
                'topic_description' => 'Automating workflows, chatbots, and integrating APIs for productivity.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.5,
                'sequence' => 5,
            ],
        ]);

        $course = Course::create(['course_code' => 'REACT01', 'course_name' => 'React Development']);

        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to React',
                'topic_description' => 'Understanding React ecosystem, components, and JSX.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'React Components and Props',
                'topic_description' => 'Creating reusable components and passing data using props.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'State and Events',
                'topic_description' => 'Managing state, handling events, and building interactive UI.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'React Hooks',
                'topic_description' => 'Using useState, useEffect, useRef, and custom hooks.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'React Router',
                'topic_description' => 'Implementing routing and navigation in single page applications.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Project: React Application',
                'topic_description' => 'Building a complete React application with API integration.',
                'theory_duration' => 1.0,
                'practical_duration' => 4.0,
                'sequence' => 6,
            ],
        ]);

        $course = Course::create(['course_code' => 'WEBBOOT', 'course_name' => 'Web Development Bootcamp']);

        $course->details()->createMany([
            [
                'topic_title' => 'HTML Fundamentals',
                'topic_description' => 'Structure of web pages, tags, forms, and multimedia.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'CSS and Layouts',
                'topic_description' => 'Styling web pages, flexbox, grid, and responsive design.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'JavaScript Basics',
                'topic_description' => 'Variables, functions, loops, events, and DOM manipulation.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Backend Development',
                'topic_description' => 'Introduction to server-side development using Node or PHP.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Database Integration',
                'topic_description' => 'Connecting applications to databases and CRUD operations.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Full Stack Project',
                'topic_description' => 'Building and deploying a complete full-stack web application.',
                'theory_duration' => 1.0,
                'practical_duration' => 5.0,
                'sequence' => 6,
            ],
        ]);

        $course = Course::create(['course_code' => 'JS01', 'course_name' => 'JavaScript Basic']);

        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to JavaScript',
                'topic_description' => 'History, features, and role of JavaScript in web development.',
                'theory_duration' => 1.5,
                'practical_duration' => 1.0,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Variables and Data Types',
                'topic_description' => 'Working with numbers, strings, booleans, arrays, and objects.',
                'theory_duration' => 1.5,
                'practical_duration' => 1.5,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Operators and Expressions',
                'topic_description' => 'Arithmetic, comparison, logical operators, and expressions.',
                'theory_duration' => 1.5,
                'practical_duration' => 1.0,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Control Structures',
                'topic_description' => 'if, switch, loops, and decision-making statements.',
                'theory_duration' => 2.0,
                'practical_duration' => 1.5,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Functions and Scope',
                'topic_description' => 'Creating functions, parameters, return values, and scope.',
                'theory_duration' => 2.0,
                'practical_duration' => 1.5,
                'sequence' => 5,
            ],
        ]);

        $course = Course::create(['course_code' => 'JS02', 'course_name' => 'JavaScript Advance']);

        $course->details()->createMany([
            [
                'topic_title' => 'ES6 Features',
                'topic_description' => 'Arrow functions, template literals, destructuring, and modules.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'DOM Manipulation',
                'topic_description' => 'Selecting elements, event handling, and dynamic UI updates.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Asynchronous JavaScript',
                'topic_description' => 'Callbacks, promises, async/await, and API calls.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Working with APIs',
                'topic_description' => 'Fetching data from REST APIs and displaying results.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.5,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'JavaScript Project',
                'topic_description' => 'Building a real-world project using advanced JavaScript concepts.',
                'theory_duration' => 1.0,
                'practical_duration' => 4.0,
                'sequence' => 5,
            ],
        ]);

        $course = Course::create([
            'course_code' => 'ICSE_VIII_CS',
            'course_name' => 'ICSE Class VIII Computer Studies'
        ]);

        $course->details()->createMany([
            [
                'topic_title' => 'Computer System Overview',
                'topic_description' => 'Basic components of a computer system, hardware vs software, types of computers, and memory units.',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Number System',
                'topic_description' => 'Decimal, Binary, Octal, and Hexadecimal number systems. Conversion between number systems.',
                'theory_duration' => 3.0,
                'practical_duration' => 1.5,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Boolean Algebra',
                'topic_description' => 'Basic logic gates (AND, OR, NOT), truth tables, Boolean expressions, and simplification.',
                'theory_duration' => 3.0,
                'practical_duration' => 1.0,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Computer Languages',
                'topic_description' => 'Machine language, assembly language, high-level languages, translators (compiler, interpreter, assembler).',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Introduction to Java Programming',
                'topic_description' => 'Basic structure of a Java program, keywords, identifiers, variables, and data types.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Operators in Java',
                'topic_description' => 'Arithmetic, relational, logical, and assignment operators with examples.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Input and Output in Java',
                'topic_description' => 'Using Scanner class, taking user input, displaying output using System.out.print and println.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Conditional Statements',
                'topic_description' => 'if, if-else, nested if, switch statements with practical examples.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.0,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Iterative Statements (Loops)',
                'topic_description' => 'for, while, do-while loops and their applications in solving problems.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Practical Programs',
                'topic_description' => 'Simple programs using conditions and loops such as sum of numbers, factorial, palindrome, etc.',
                'theory_duration' => 1.5,
                'practical_duration' => 3.0,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Ethics and Computer Safety',
                'topic_description' => 'Computer ethics, cyber safety, viruses, malware, and safe internet practices.',
                'theory_duration' => 1.5,
                'practical_duration' => 0.5,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Project Work',
                'topic_description' => 'Small project involving Java programming concepts learned during the course.',
                'theory_duration' => 1.0,
                'practical_duration' => 3.0,
                'sequence' => 12,
            ],
        ]);

        $course = Course::create([
            'course_code' => 'ICSE_IX_CA',
            'course_name' => 'ICSE Class IX Computer Applications'
        ]);

        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Object-Oriented Programming',
                'topic_description' => 'Basic concepts of OOP: objects, classes, methods, data abstraction, and encapsulation.',
                'theory_duration' => 2.0,
                'practical_duration' => 1.0,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Elements of Java Programming',
                'topic_description' => 'Java program structure, tokens, keywords, identifiers, literals, and data types.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Operators in Java',
                'topic_description' => 'Arithmetic, relational, logical, assignment, unary operators, and precedence of operators.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.0,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Input and Output in Java',
                'topic_description' => 'Using Scanner class for input, output using System.out.print and println, formatted output.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Conditional Constructs',
                'topic_description' => 'if, if-else, nested if, switch-case statements and their practical implementation.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Iterative Constructs (Loops)',
                'topic_description' => 'for, while, do-while loops, nested loops, and loop control statements.',
                'theory_duration' => 3.5,
                'practical_duration' => 3.0,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Mathematical Library Functions',
                'topic_description' => 'Use of Math class methods such as sqrt(), pow(), abs(), random(), etc.',
                'theory_duration' => 1.5,
                'practical_duration' => 1.5,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Simple Programs and Problem Solving',
                'topic_description' => 'Programs based on number manipulation, series, patterns, and logical problem solving.',
                'theory_duration' => 1.5,
                'practical_duration' => 3.0,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Introduction to Arrays',
                'topic_description' => 'Concept of arrays, declaration, initialization, traversal, and basic operations.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'String Handling',
                'topic_description' => 'String class methods, string manipulation, and common string-based programs.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Ethics and Computer Applications',
                'topic_description' => 'Cyber ethics, security, privacy, digital footprint, and responsible use of technology.',
                'theory_duration' => 1.5,
                'practical_duration' => 0.5,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Project Work and Revision',
                'topic_description' => 'Comprehensive project using Java concepts along with revision of key topics.',
                'theory_duration' => 1.0,
                'practical_duration' => 3.0,
                'sequence' => 12,
            ],
        ]);



        $course = Course::create([
            'course_code' => 'ICSE_X_CA',
            'course_name' => 'ICSE Class X Computer Applications'
        ]);

        $course->details()->createMany([
            [
                'topic_title' => 'Revision of Class IX Fundamentals',
                'topic_description' => 'Recap of variables, data types, operators, input/output, conditionals, loops, arrays, and strings.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Classes and Objects',
                'topic_description' => 'Definition of class and object, data members, member functions, encapsulation, and basic class design.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Functions / Methods',
                'topic_description' => 'User-defined methods, types of methods, parameter passing, return values, and function overloading.',
                'theory_duration' => 3.0,
                'practical_duration' => 3.0,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Constructors',
                'topic_description' => 'Default and parameterized constructors, constructor overloading, and object initialization.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Arrays (One-Dimensional)',
                'topic_description' => 'Declaration, initialization, traversal, searching (linear, binary), sorting (bubble, selection), and applications.',
                'theory_duration' => 3.5,
                'practical_duration' => 3.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'String Handling',
                'topic_description' => 'String class methods, string manipulation, palindrome, substring, case conversion, and character-based operations.',
                'theory_duration' => 3.0,
                'practical_duration' => 3.0,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Recursion',
                'topic_description' => 'Concept of recursion, recursive methods, tracing recursive calls, comparison with iteration.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Library Classes',
                'topic_description' => 'Use of predefined classes such as Math and String methods for problem solving.',
                'theory_duration' => 1.5,
                'practical_duration' => 1.5,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Boolean Algebra',
                'topic_description' => 'Boolean laws, simplification, truth tables, logic gates, and basic Karnaugh maps.',
                'theory_duration' => 2.5,
                'practical_duration' => 1.5,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Computer Networks',
                'topic_description' => 'Types of networks (LAN, WAN), internet basics, network devices, protocols, and communication.',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Project Work (Internal Assessment)',
                'topic_description' => 'Application-based Java project using classes, methods, arrays, and logical constructs.',
                'theory_duration' => 1.0,
                'practical_duration' => 4.0,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Exam Preparation and Mock Tests',
                'topic_description' => 'ICSE board pattern papers, previous year questions, and full-length practice tests.',
                'theory_duration' => 1.5,
                'practical_duration' => 3.0,
                'sequence' => 12,
            ],
        ]);

        $course = Course::create([
            'course_code' => 'ISC_XI_CS',
            'course_name' => 'ISC Class XI Computer Science'
        ]);

        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Computer Systems',
                'topic_description' => 'Basic organization of computer systems, hardware, software, memory units, input/output devices.',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Number System and Data Representation',
                'topic_description' => 'Binary, octal, hexadecimal systems, conversions, binary arithmetic, complements (1’s and 2’s).',
                'theory_duration' => 3.0,
                'practical_duration' => 1.5,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Boolean Algebra and Logic Gates',
                'topic_description' => 'Basic Boolean operations, laws, simplification, truth tables, logic gates, and Karnaugh maps.',
                'theory_duration' => 3.0,
                'practical_duration' => 1.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Introduction to Java Programming',
                'topic_description' => 'Basic structure of Java program, tokens, data types, variables, and type conversion.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Operators and Expressions in Java',
                'topic_description' => 'Arithmetic, relational, logical, assignment operators, precedence, and evaluation of expressions.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Conditional Statements',
                'topic_description' => 'if, if-else, nested if, switch-case constructs and logical flow control.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Iterative Constructs (Loops)',
                'topic_description' => 'for, while, do-while loops, nested loops, and loop control statements.',
                'theory_duration' => 3.5,
                'practical_duration' => 3.0,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Functions / Methods',
                'topic_description' => 'User-defined methods, parameter passing, return values, recursion basics.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Arrays (One-Dimensional)',
                'topic_description' => 'Declaration, initialization, traversal, searching, sorting, and applications.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'String Handling',
                'topic_description' => 'String class methods, string manipulation, pattern-based programs, and character operations.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Computer Ethics and Cyber Security',
                'topic_description' => 'Ethical issues, cyber crimes, data privacy, security measures, and safe computing practices.',
                'theory_duration' => 1.5,
                'practical_duration' => 0.5,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Project Work and Practical Programs',
                'topic_description' => 'Application-based programs using Java covering loops, arrays, methods, and logic building.',
                'theory_duration' => 1.0,
                'practical_duration' => 4.0,
                'sequence' => 12,
            ],
        ]);

        $course = Course::create([
            'course_code' => 'ISC_XII_CS',
            'course_name' => 'ISC Class XII Computer Science'
        ]);

        $course->details()->createMany([
            [
                'topic_title' => 'Review of Java Fundamentals',
                'topic_description' => 'Revision of Class XI topics: data types, operators, control structures, arrays, strings, and methods.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Object-Oriented Programming Concepts',
                'topic_description' => 'Classes, objects, encapsulation, inheritance, polymorphism, abstraction, and method overriding.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Wrapper Classes and Java Packages',
                'topic_description' => 'Wrapper classes (Integer, Double, Character), auto-boxing, packages, and access specifiers.',
                'theory_duration' => 2.0,
                'practical_duration' => 1.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Data Structures: Stack',
                'topic_description' => 'Concept of stack, operations (push, pop, peek), implementation using arrays and applications.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Data Structures: Queue',
                'topic_description' => 'Concept of queue, operations (enqueue, dequeue), linear and circular queue implementation.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Arrays (Advanced Concepts)',
                'topic_description' => 'Searching, sorting (bubble, selection, insertion), merging arrays, and applications.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Recursion',
                'topic_description' => 'Recursive methods, tracing recursion, comparison with iteration, and applications.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'File Handling in Java',
                'topic_description' => 'Concept of files, text files, file input/output streams, reading and writing data.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Exception Handling',
                'topic_description' => 'Types of errors, try-catch-finally, throw and throws, and user-defined exceptions.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Computer Hardware and Boolean Logic',
                'topic_description' => 'Logic gates, Boolean expressions, simplification, and basic computer hardware concepts.',
                'theory_duration' => 2.0,
                'practical_duration' => 1.0,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Project Work (Internal Assessment)',
                'topic_description' => 'Comprehensive Java project using data structures, file handling, and OOP concepts.',
                'theory_duration' => 1.0,
                'practical_duration' => 5.0,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Board Exam Preparation and Practice',
                'topic_description' => 'Previous year ISC papers, sample papers, and full-length mock tests with solutions.',
                'theory_duration' => 1.5,
                'practical_duration' => 3.0,
                'sequence' => 12,
            ],
        ]);

        $course = Course::create([
            'course_code' => 'CBSE_XI_CS',
            'course_name' => 'CBSE Class XI Computer Science (Python)'
        ]);

        $course->details()->createMany([
            [
                'topic_title' => 'Computer System Overview',
                'topic_description' => 'Basic computer organization, hardware, software, input/output devices, memory units, and types of computers.',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Introduction to Python',
                'topic_description' => 'History of Python, features, setting up environment, writing first program, tokens, keywords, identifiers.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Data Types and Variables',
                'topic_description' => 'Built-in data types, variables, type conversion, operators, and expressions in Python.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Input and Output in Python',
                'topic_description' => 'Using input(), print(), formatted output, type casting, and basic user interaction programs.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Conditional Statements',
                'topic_description' => 'if, if-else, nested if, elif statements and logical decision making.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Iterative Statements (Loops)',
                'topic_description' => 'for loop, while loop, nested loops, break and continue statements.',
                'theory_duration' => 3.5,
                'practical_duration' => 3.0,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Strings in Python',
                'topic_description' => 'String operations, slicing, methods, and string manipulation programs.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Lists in Python',
                'topic_description' => 'List operations, indexing, slicing, list methods, and applications.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Tuples and Dictionaries',
                'topic_description' => 'Tuple operations, dictionary concepts, key-value pairs, and basic operations.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.0,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Functions',
                'topic_description' => 'User-defined functions, parameters, return values, built-in functions, and scope of variables.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Computer Ethics and Cyber Safety',
                'topic_description' => 'Cyber ethics, cyber crimes, digital footprint, privacy, and safe use of technology.',
                'theory_duration' => 1.5,
                'practical_duration' => 0.5,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Project Work and Practical Programs',
                'topic_description' => 'Application-based Python programs covering loops, lists, functions, and problem solving.',
                'theory_duration' => 1.0,
                'practical_duration' => 4.0,
                'sequence' => 12,
            ],
        ]);

        $course = Course::create([
            'course_code' => 'CBSE_XII_CS',
            'course_name' => 'CBSE Class XII Computer Science (Python + SQL)'
        ]);

        $course->details()->createMany([
            [
                'topic_title' => 'Revision of Python Basics',
                'topic_description' => 'Recap of data types, operators, control structures, functions, lists, tuples, and dictionaries.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Functions (Advanced)',
                'topic_description' => 'Types of functions, recursion, lambda functions, scope, and modules.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'File Handling in Python',
                'topic_description' => 'Text files, binary files, file modes, reading/writing, file operations using Python.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Exception Handling',
                'topic_description' => 'Errors and exceptions, try-except blocks, finally, raising exceptions.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Data Structures: Stack',
                'topic_description' => 'Stack operations (push, pop), implementation using lists, applications.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Data Structures: Queue',
                'topic_description' => 'Queue operations (enqueue, dequeue), implementation using lists, applications.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Structured Query Language (SQL)',
                'topic_description' => 'Introduction to databases, tables, keys, SQL commands (DDL, DML), constraints.',
                'theory_duration' => 3.5,
                'practical_duration' => 3.0,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Database Queries and Functions',
                'topic_description' => 'SELECT queries, WHERE clause, ORDER BY, GROUP BY, aggregate functions, joins.',
                'theory_duration' => 3.5,
                'practical_duration' => 3.0,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Computer Networks',
                'topic_description' => 'Types of networks, topology, protocols, internet basics, IP addressing, network devices.',
                'theory_duration' => 2.5,
                'practical_duration' => 0.5,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Boolean Logic',
                'topic_description' => 'Basic Boolean operations, truth tables, logical expressions used in programming and SQL.',
                'theory_duration' => 1.5,
                'practical_duration' => 1.0,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Project Work (Internal Assessment)',
                'topic_description' => 'Python + SQL based project integrating file handling, database operations, and logic building.',
                'theory_duration' => 1.0,
                'practical_duration' => 5.0,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Board Exam Preparation and Practice',
                'topic_description' => 'CBSE sample papers, previous year questions, and full-length mock tests with solutions.',
                'theory_duration' => 1.5,
                'practical_duration' => 3.0,
                'sequence' => 12,
            ],
        ]);

        $course = Course::create([
            'course_code' => 'WBCHSE_XI_CS',
            'course_name' => 'WBCHSE Class XI Computer Science'
        ]);

        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Computer System',
                'topic_description' => 'Basic components of computer system, hardware, software, memory units, input/output devices.',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Number System',
                'topic_description' => 'Decimal, Binary, Octal, Hexadecimal systems, conversions, binary arithmetic, complements.',
                'theory_duration' => 3.0,
                'practical_duration' => 1.5,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Boolean Algebra and Logic Gates',
                'topic_description' => 'Boolean laws, simplification, truth tables, logic gates, Karnaugh maps.',
                'theory_duration' => 3.0,
                'practical_duration' => 1.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Computer Languages and Translators',
                'topic_description' => 'Machine, assembly, high-level languages, compiler, interpreter, assembler.',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Introduction to C Programming',
                'topic_description' => 'Structure of C program, tokens, keywords, variables, constants, and data types.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Operators and Expressions in C',
                'topic_description' => 'Arithmetic, relational, logical, assignment operators, precedence and associativity.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.0,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Input and Output in C',
                'topic_description' => 'Use of printf() and scanf(), formatted input/output, escape sequences.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Decision Making Statements',
                'topic_description' => 'if, if-else, nested if, switch-case statements in C programming.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Looping Constructs',
                'topic_description' => 'for, while, do-while loops, nested loops, break and continue statements.',
                'theory_duration' => 3.5,
                'practical_duration' => 3.0,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Functions in C',
                'topic_description' => 'User-defined functions, parameters, return values, recursion basics.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Arrays and Strings in C',
                'topic_description' => 'One-dimensional arrays, string handling, and basic array operations.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Computer Ethics and Cyber Safety',
                'topic_description' => 'Ethical issues, cyber crimes, data privacy, and safe use of internet.',
                'theory_duration' => 1.5,
                'practical_duration' => 0.5,
                'sequence' => 12,
            ],
        ]);

        $course = Course::create([
            'course_code' => 'WBCHSE_XII_CS',
            'course_name' => 'WBCHSE Class XII Computer Science'
        ]);

        $course->details()->createMany([
            [
                'topic_title' => 'Revision of Class XI (C Basics)',
                'topic_description' => 'Recap of data types, operators, input/output, control structures, arrays, and functions in C.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Pointers in C',
                'topic_description' => 'Concept of pointers, pointer arithmetic, pointers with arrays, call by reference.',
                'theory_duration' => 3.5,
                'practical_duration' => 3.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Structures and Unions',
                'topic_description' => 'User-defined data types, structures, unions, nested structures, and arrays of structures.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'File Handling in C',
                'topic_description' => 'File operations (open, close, read, write), file modes, text and binary files.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Data Structures: Stack',
                'topic_description' => 'Stack operations (push, pop), implementation using arrays, applications.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Data Structures: Queue',
                'topic_description' => 'Queue operations (enqueue, dequeue), linear and circular queues, applications.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Linked Lists',
                'topic_description' => 'Concept of linked list, types (singly, doubly), operations (insertion, deletion, traversal).',
                'theory_duration' => 3.5,
                'practical_duration' => 3.0,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Searching and Sorting Techniques',
                'topic_description' => 'Linear search, binary search, bubble sort, selection sort, and their efficiency.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Introduction to Database Management System',
                'topic_description' => 'Concept of DBMS, advantages, data models, relational database basics.',
                'theory_duration' => 2.5,
                'practical_duration' => 1.0,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Structured Query Language (SQL)',
                'topic_description' => 'DDL, DML commands, table creation, queries, conditions, aggregate functions.',
                'theory_duration' => 3.5,
                'practical_duration' => 3.0,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Computer Networking',
                'topic_description' => 'Types of networks, topology, protocols, internet basics, network devices.',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Project Work and Practical Examination',
                'topic_description' => 'Application-based project using C, data structures, and database concepts.',
                'theory_duration' => 1.0,
                'practical_duration' => 5.0,
                'sequence' => 12,
            ],
        ]);

        $course = Course::create([
            'course_code' => 'SCHOOL_CS',
            'course_name' => 'School Computer'
        ]);

        $course->details()->createMany([
            [
                'topic_title' => 'Fundamentals of Computer',
                'topic_description' => 'Basic components, hardware, software, input/output devices, memory and storage.',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Number System',
                'topic_description' => 'Decimal, Binary, Octal, Hexadecimal systems, conversions and binary arithmetic.',
                'theory_duration' => 3.0,
                'practical_duration' => 1.5,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Boolean Algebra and Logic Gates',
                'topic_description' => 'Boolean laws, simplification, truth tables, logic gates and basic K-map concepts.',
                'theory_duration' => 3.0,
                'practical_duration' => 1.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Computer Languages',
                'topic_description' => 'Machine, assembly, high-level languages, compiler, interpreter, assembler.',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Introduction to Programming',
                'topic_description' => 'Basic programming concepts using Java/Python/C: variables, data types, syntax.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Operators and Expressions',
                'topic_description' => 'Arithmetic, relational, logical operators and expression evaluation.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.0,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Input and Output',
                'topic_description' => 'Taking input and displaying output using programming languages.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Decision Making',
                'topic_description' => 'Conditional statements: if, if-else, nested conditions, switch-case.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Loops and Iteration',
                'topic_description' => 'for, while, do-while loops, nested loops, break and continue.',
                'theory_duration' => 3.5,
                'practical_duration' => 3.0,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Functions / Methods',
                'topic_description' => 'User-defined functions, parameters, return values, recursion basics.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Arrays and Strings',
                'topic_description' => 'Array concepts, string manipulation, searching, sorting basics.',
                'theory_duration' => 3.0,
                'practical_duration' => 2.5,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Data Structures (Basic)',
                'topic_description' => 'Introduction to stack, queue, and simple data organization techniques.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.0,
                'sequence' => 12,
            ],
            [
                'topic_title' => 'Database Concepts',
                'topic_description' => 'Introduction to DBMS, tables, keys, and basic SQL queries.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.0,
                'sequence' => 13,
            ],
            [
                'topic_title' => 'Computer Networks',
                'topic_description' => 'Types of networks, topology, internet basics, and communication.',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 14,
            ],
            [
                'topic_title' => 'Cyber Safety and Ethics',
                'topic_description' => 'Cyber security, digital footprint, ethical issues, and safe computing.',
                'theory_duration' => 1.5,
                'practical_duration' => 0.5,
                'sequence' => 15,
            ],
            [
                'topic_title' => 'Project Work',
                'topic_description' => 'Application-based project integrating programming, logic, and database concepts.',
                'theory_duration' => 1.0,
                'practical_duration' => 4.0,
                'sequence' => 16,
            ],
        ]);

        $course = Course::create([
            'course_code' => 'FSD_101',
            'course_name' => 'Full Stack Web Development (Beginner to Advanced)'
        ]);

        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Web Development',
                'topic_description' => 'How the web works, client-server model, browsers, HTTP/HTTPS, frontend vs backend.',
                'theory_duration' => 2.0,
                'practical_duration' => 1.0,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'HTML Fundamentals',
                'topic_description' => 'HTML structure, tags, forms, tables, semantic elements.',
                'theory_duration' => 2.5,
                'practical_duration' => 3.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'CSS and Responsive Design',
                'topic_description' => 'CSS basics, Flexbox, Grid, responsive design, media queries.',
                'theory_duration' => 3.0,
                'practical_duration' => 3.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'JavaScript Basics',
                'topic_description' => 'Variables, data types, operators, functions, DOM manipulation.',
                'theory_duration' => 3.5,
                'practical_duration' => 3.5,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Advanced JavaScript',
                'topic_description' => 'ES6+, promises, async/await, closures, event loop.',
                'theory_duration' => 3.0,
                'practical_duration' => 3.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Version Control with Git & GitHub',
                'topic_description' => 'Git basics, repositories, commits, branches, collaboration using GitHub.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Frontend Framework (React)',
                'topic_description' => 'Components, props, state, hooks, routing, API integration.',
                'theory_duration' => 4.0,
                'practical_duration' => 4.0,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'TypeScript Basics',
                'topic_description' => 'Static typing, interfaces, types, using TypeScript with React.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Backend Development (Node.js)',
                'topic_description' => 'Node.js basics, modules, building server, REST APIs.',
                'theory_duration' => 3.5,
                'practical_duration' => 3.5,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Backend Framework (Express.js)',
                'topic_description' => 'Routing, middleware, REST API design, error handling.',
                'theory_duration' => 3.0,
                'practical_duration' => 3.0,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Database (SQL - MySQL/PostgreSQL)',
                'topic_description' => 'Relational databases, tables, queries, joins, normalization.',
                'theory_duration' => 3.0,
                'practical_duration' => 3.0,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'NoSQL Database (MongoDB)',
                'topic_description' => 'Document-based database, CRUD operations, schema design.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 12,
            ],
            [
                'topic_title' => 'Authentication & Authorization',
                'topic_description' => 'JWT, sessions, login systems, role-based access control.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 13,
            ],
            [
                'topic_title' => 'API Integration and Testing',
                'topic_description' => 'Fetching APIs, Axios, testing APIs using Postman.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.5,
                'sequence' => 14,
            ],
            [
                'topic_title' => 'Deployment and DevOps Basics',
                'topic_description' => 'Hosting, domain, CI/CD basics, deploying frontend and backend apps.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 15,
            ],
            [
                'topic_title' => 'Final Project (Full Stack Application)',
                'topic_description' => 'Build a complete project integrating frontend, backend, database, and authentication.',
                'theory_duration' => 1.5,
                'practical_duration' => 6.0,
                'sequence' => 16,
            ],
        ]);

        //office procedure
        $course = Course::create([
            'course_code' => 'OP01',
            'course_name' => 'Office Procedure'
        ]);

        $course->details()->createMany([
            [
                'topic_title' => 'Computer Fundamentals and Windows',
                'topic_description' => 'Introduction to computer hardware, software, Windows 11 interface, file and folder management, keyboard shortcuts, and system settings.',
                'theory_duration' => 1.5,
                'practical_duration' => 1.5,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Microsoft Word',
                'topic_description' => 'Creating professional documents, formatting, tables, images, page layout, headers, footers, mail merge, templates, and printing.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Microsoft Excel',
                'topic_description' => 'Data entry, formulas, functions, formatting, sorting, filtering, charts, basic calculations, and worksheet management.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Microsoft PowerPoint',
                'topic_description' => 'Creating professional presentations, themes, animations, transitions, SmartArt, charts, multimedia, and slideshow presentation.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Microsoft Outlook',
                'topic_description' => 'Email management, contacts, calendars, appointments, tasks, meeting requests, and professional email etiquette.',
                'theory_duration' => 1.0,
                'practical_duration' => 1.5,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Internet and Online Services',
                'topic_description' => 'Web browsing, search engines, Google Workspace, online forms, downloads, uploads, cloud storage, video conferencing, and cyber safety.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Scanning, Printing and Document Management',
                'topic_description' => 'Scanner operation, printer setup, duplex printing, PDF creation, document scanning, OCR basics, photocopying, and document organization.',
                'theory_duration' => 1.0,
                'practical_duration' => 2.0,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Office Administration and Communication',
                'topic_description' => 'Office etiquette, official correspondence, file management, record keeping, scheduling meetings, and communication skills.',
                'theory_duration' => 1.5,
                'practical_duration' => 1.0,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Project Work',
                'topic_description' => 'Prepare business letters, Excel reports, PowerPoint presentations, email communication, scanning, PDF generation, and printing for a complete office workflow.',
                'theory_duration' => 0.5,
                'practical_duration' => 4.5,
                'sequence' => 9,
            ],
        ]);

    }
}
