-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 01:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tallyqms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminEmail` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `adminName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminEmail`, `password`, `adminName`) VALUES
('mohdnasir@gmail.com', '123', 'Mohd Nasir');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `quizName` varchar(255) NOT NULL,
  `quizStartTime` datetime NOT NULL,
  `quizEndTime` datetime NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `adminEmail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `quizName`, `quizStartTime`, `quizEndTime`, `duration`, `adminEmail`) VALUES
(82, 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 30, 'mohdnasir@gmail.com'),
(83, 'DEMO', '2023-07-16 12:55:00', '2023-07-18 12:55:00', 30, 'mohdnasir@gmail.com'),
(81, 'General Knowledge ', '2023-07-12 21:58:00', '2023-07-14 21:53:00', 30, 'mohdnasir@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `isquizdone`
--

CREATE TABLE `isquizdone` (
  `quizId` varchar(255) NOT NULL,
  `uniqueId` varchar(255) NOT NULL,
  `studentEmailId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `isquizdone`
--

INSERT INTO `isquizdone` (`quizId`, `uniqueId`, `studentEmailId`) VALUES
('82', '3298', 'mohdnasir4257@gmail.com'),
('82', '6483', 'mohdnasir4257@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `ques` varchar(255) DEFAULT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) DEFAULT NULL,
  `correctOption` varchar(255) DEFAULT NULL,
  `quizName` varchar(255) DEFAULT NULL,
  `quizStartTime` datetime DEFAULT NULL,
  `quizEndTime` datetime DEFAULT NULL,
  `adminEmail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `ques`, `option1`, `option2`, `option3`, `option4`, `correctOption`, `quizName`, `quizStartTime`, `quizEndTime`, `adminEmail`) VALUES
(161, 'What is your profession.', 'Doctor', 'HR', 'Engineer', 'Teacher', 'C', 'General Knowledge ', '2023-07-12 21:58:00', '2023-07-14 21:53:00', 'mohdnasir@gmail.com'),
(162, 'Which concept do we use for the implementation of late binding?', 'Static Functions', 'Constant Functions', 'Operator Functions', 'Virtual Functions', 'D', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(163, '__________ is an ability of grouping certain lines of code that we need to include in our program?', 'Macros ', 'Modularization', 'Program Control ', 'Specific Task', 'B', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(164, ' Which of these keywords do we use for the declaration of the friend function?', 'my friend', 'class friend', 'friend', 'fiend', 'C', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(165, ' What is used for dereferencing?', 'pointer with asterix', 'pointer without asterix', 'value with asterix', 'value without asterix', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(166, 'what does polymorphism stand for?', 'a class that has many forms', 'a class  that has four forms', 'a class that has two forms', 'a class that has only single form', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(167, 'Which of these components are used in a Java program for compilation, debugging, and execution?', 'JDK', 'JVM', 'JRE', 'JIT', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(168, 'Out of these packages, which one contains an abstract keyword?', 'java.lang', 'java.util', 'java.system', 'java.io', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(169, 'When an expression consists of int, double, long, float, then the entire expression will get promoted into a data type that is:', 'float', 'double', 'int ', 'char', 'B', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(170, 'Which among these is not Web Browser?', 'Chrome', 'Opera', 'NetSurf', 'Brave', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(171, 'At which port number, Simple Network Management Protocol (SNMP) operates', '161', '165', '164', '162', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(172, 'Evaluate the postfix Expression : 3 5 7 * + 8 2 / -', '48', '30', '34', '25', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(173, 'Identify the correct extension of the user-defined header file in c++', '.cpp', '.hg', '.h', '.hf', 'C', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(174, 'Identify the incorrect constructor type.', 'Friend Constructor ', 'Default Constructor ', 'Parameterized Constructor ', 'Copy Constructor ', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(175, 'C++ use which approach?', 'right-left', 'Top-down', 'right-left', 'bottom-up', 'D', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(176, 'Identify the correct syntax for declaring arrays in c++', 'arr arr[10]', 'array{10}', 'int arr[10]', 'int arr', 'C', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(177, 'size of wchat_t is ....', '2', '4', '2 or 4', 'Depends on number of bits in system', 'D', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(178, 'Identify the correct example for a pre-increment operator.', '++n', 'n++', '- -n', '+n', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(179, 'Identify the scope resolution operator.', ':', '::', '?', 'None', 'B', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(180, '0', 'Address of operator', 'value of address operator', 'Multiplication operator', 'All of the above', 'B', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(181, 'choose the correct default return value of function.', 'int ', 'void ', 'char', ' float', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(182, 'When can an inline function can expanded?', 'Runtime ', 'Compile time ', 'Never gets expanded ', 'All the above', 'B', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(183, 'Identify the correct function from which the execution of C++ program starts?', 'new()', 'start()', 'pow()', 'main()', 'D', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(184, 'The constants in c++ are also known as ?', 'pre-processor ', 'literals ', 'const', 'none', 'B', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(185, 'Using which of the following keywords can an exception be generated ?', 'threw ', 'throws', 'throw', 'catch', 'C', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(186, 'Identify the size of int datatype in C++ ?', '1 byte', '2 bytes', '4 bytes', 'Depends on compiler', 'D', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(187, 'choose the size of the below struct. Struct { int a; charb; float c; }', '2', '4', '7', '10', 'C', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(188, 'Identify the logical AND operator.      ', '||', '&&', '&', '!', 'B', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(189, 'Choose the correct subscript operator.', '[]', '{}', '&', '()', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(190, 'Choose the type of loop which is guaranteed to execute at-least once?', 'for loop', 'do-while', 'while ', 'None', 'B', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(191, '  How much bytes of memory does void occupy?', '1', '0', '2', '4', 'B', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(192, ' Why are comments used?', 'Make the program run faster', 'To help others read & understand program', 'increase the size of the program', 'make a program compiler easier', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(193, 'Total types of errors in C++.', '1', '2', '3', '4', 'C', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(194, ' Identify the storage classes that have global visibility.', 'extern', 'auto ', 'register', 'static', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(195, 'Total types of constructors in C++ are?', '1', '2', '3', '4', 'C', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(196, 'What is the number of parameters that a default constructor requires?', '3', '2', '1', '0', 'D', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(197, ' What does a C++ class hold?', 'Function', 'Data ', 'Arrays', 'Both A and B', 'D', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(198, '  Data members and member functions of a class are private by.default. True or False?', 'true', 'false ', 'Depends on code', 'None', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(199, ' Under which pillar of OOPS does base class and derived class relationship come?', 'Polymorphism', 'Inheritance', 'Encapsulation', 'Abstraction', 'B', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(200, 'Which of the following functions can be inherited from base class?', 'Constructor ', 'Destructor ', 'Static', 'None', 'D', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(201, 'Identify the correct escape sequence used for the new line.', 'slace t', 'slace n', 'slace a', 'None', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(202, 'Which of the following is not a type of inheritance?', 'Multiple ', 'Multilevel', 'Distributed', 'Heirrarchical', 'C', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(203, '  What is an object in c++?', 'it is function of class', 'it is instance of class', 'it is Datatype  of class', 'it is part of the syntax of class.', 'B', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(204, 'Choose the correct option which is mandatory in a function.', 'return_type', 'parameters', 'function_name', 'Both a and c', 'D', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(205, 'C++ language was developed by ___.', 'Dennis Rechard', 'Dennis M. Ritchie', 'Bjarne Stroustrup', 'Anders Hejlsberg', 'C', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(206, 'In which year, the name of the language was changed from \"C with Classes\" to C++?', '1983', '1986', '1989', '1976', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(207, 'C++ language is a successor to which language?', 'B', 'C', 'Java', 'python', 'B', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(208, 'C++ language is a ___.', 'Object Oriented Language', 'Procedural Oriented Language', 'Structural Oriented Language', 'None of the above', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(209, 'C++ is a ___.', 'High-level language', 'Medium level language', 'Low-level language', 'None of the Above', 'B', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(210, 'How many keywords are in C++?', '32', '45', '35', '54', 'A', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(211, 'Which of the following language translator is used in C++?', 'Assembler ', 'Interpreter', 'Compiler', 'Both Interpreter and Compiler', 'C', 'CodingExam', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 'mohdnasir@gmail.com'),
(212, 'DEMO1', 'a', 'b', 'c', 'd', 'A', 'DEMO', '2023-07-16 12:55:00', '2023-07-18 12:55:00', 'mohdnasir@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `quizuniquenumber`
--

CREATE TABLE `quizuniquenumber` (
  `quizId` varchar(255) NOT NULL,
  `uniqueId` varchar(255) NOT NULL,
  `studentEmailId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizuniquenumber`
--

INSERT INTO `quizuniquenumber` (`quizId`, `uniqueId`, `studentEmailId`) VALUES
('82', '3298', 'mohdnasir4257@gmail.com'),
('82', '6483', 'mohdnasir4257@gmail.com'),
('82', '7595', 'mohdnasir4257@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `resId` int(11) NOT NULL,
  `studentEmail` varchar(255) DEFAULT NULL,
  `quizName` varchar(255) DEFAULT NULL,
  `quizStartTime` datetime DEFAULT NULL,
  `quizEndTime` datetime DEFAULT NULL,
  `totalQues` int(11) DEFAULT NULL,
  `correctQues` int(11) DEFAULT NULL,
  `wrongQues` int(11) DEFAULT NULL,
  `examTime` datetime DEFAULT NULL,
  `studentName` varchar(255) DEFAULT NULL,
  `adminEmail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`resId`, `studentEmail`, `quizName`, `quizStartTime`, `quizEndTime`, `totalQues`, `correctQues`, `wrongQues`, `examTime`, `studentName`, `adminEmail`) VALUES
(29, 'mohdnasir4257@gmail.com', 'CodingExam ', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 50, 0, 50, '2023-07-17 09:46:51', 'Mohd Nasir', 'mohdnasir@gmail.com'),
(30, 'mohdnasir4257@gmail.com', 'CodingExam ', '2023-07-22 08:25:00', '2023-07-23 08:25:00', 50, 0, 50, '2023-07-17 09:46:51', 'Mohd Nasir', 'mohdnasir@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentEmail` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentEmail`, `name`, `password`) VALUES
('mohdnasir4257@gmail.com', 'Mohd Nasir', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminEmail`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`quizName`,`quizStartTime`,`quizEndTime`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `adminEmail` (`adminEmail`);

--
-- Indexes for table `isquizdone`
--
ALTER TABLE `isquizdone`
  ADD PRIMARY KEY (`quizId`,`uniqueId`,`studentEmailId`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `questions_ibfk_1` (`quizName`,`quizStartTime`,`quizEndTime`);

--
-- Indexes for table `quizuniquenumber`
--
ALTER TABLE `quizuniquenumber`
  ADD PRIMARY KEY (`quizId`,`uniqueId`,`studentEmailId`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`resId`),
  ADD UNIQUE KEY `resId` (`resId`),
  ADD KEY `studentEmail` (`studentEmail`),
  ADD KEY `quizName` (`quizName`,`quizStartTime`,`quizEndTime`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `resId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`adminEmail`) REFERENCES `admin` (`adminEmail`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`studentEmail`) REFERENCES `student` (`studentEmail`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`quizName`,`quizStartTime`,`quizEndTime`) REFERENCES `category` (`quizName`, `quizStartTime`, `quizEndTime`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
