-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 12, 2019 at 03:09 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discipline`
--

-- --------------------------------------------------------

--
-- Table structure for table `mcq_q`
--

CREATE TABLE `mcq_q` (
  `mcq_id` int(11) NOT NULL,
  `mcq_question` varchar(500) NOT NULL,
  `correct_option` int(11) NOT NULL,
  `option1` varchar(200) NOT NULL,
  `option2` varchar(200) NOT NULL,
  `option3` varchar(200) NOT NULL,
  `option4` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq_q`
--

INSERT INTO `mcq_q` (`mcq_id`, `mcq_question`, `correct_option`, `option1`, `option2`, `option3`, `option4`) VALUES
(2, 'Find Output of the Following:\r\n#include <stdio.h>\r\n    int main()\r\n    {\r\n        for (int i = 0;i < 1; i++)\r\n            printf(\"In for loop\\n\");\r\n    }', 3, 'Compile time error', 'in for loop', 'Depends on the standard compiler Implements', 'Depends on the compiler'),
(2, 'Find output of the following:\r\n#include <stdio.h>\r\n    int main()\r\n    {\r\n        int i = 0;\r\n        char c = \'a\';\r\n        while (i < 2){\r\n            i++;\r\n            switch (c) {\r\n            case \'a\':\r\n                printf(\"%c \", c);\r\n                break;\r\n                break;\r\n            }\r\n        }\r\n        printf(\"after loop\\n\");\r\n    }', 2, 'a after loop', 'a a after loop', 'after loop', 'None of the mentioned'),
(2, 'Find Output of the Following:\r\n#include <stdio.h>\r\n    int main()\r\n    {\r\n        int i = 0;\r\n        for (; ; ;)\r\n            printf(\"In for loop\\n\");\r\n            printf(\"After loop\\n\");\r\n    }', 1, 'Compile time error', 'infinite loop', 'after loop', 'Undefined behaviour'),
(2, 'Find Output of the following:\r\n#include <stdio.h>\r\n    void main()\r\n    {\r\n        double k = 0;\r\n        for (k = 0.0; k < 3.0; k++);\r\n            printf(\"%lf\", k);\r\n    }', 3, '2', '4', '3', 'Run Time Error'),
(2, 'Find Output of the Following:\r\n#include <stdio.h>\r\n    void main()\r\n    {\r\n        int ch;\r\n        printf(\"enter a value between 1 to 2:\");\r\n        scanf(\"%d\", &ch);\r\n        switch (ch, ch + 1)\r\n        {\r\n        case 1:\r\n            printf(\"1\\n\");\r\n            break;\r\n        case 2:\r\n            printf(\"2\");\r\n            break;\r\n        }\r\n    }', 2, '1', '2', '3', 'Run Time Error'),
(2, 'Find Output of the Following:\r\n#include <stdio.h>\r\n    void main()\r\n    {\r\n        int x = 5;\r\n        if (true);\r\n            printf(\"hello\");\r\n    }', 2, 'It will display hello', 'It will throw an error', 'Nothing will be displayed', 'Compiler dependent'),
(2, 'Find Output of the Following:\r\n#include <stdio.h>\r\n    void main()\r\n    {\r\n        int x = 5;\r\n        if (x < 1)\r\n            printf(\"hello\");\r\n        if (x == 5)\r\n            printf(\"hi\");\r\n        else\r\n            printf(\"no\");\r\n    }', 1, 'hi', 'hello', 'no', 'none of the mentioned'),
(2, 'Find Output of the Following:\r\n#include <stdio.h> \r\nint main() \r\n{ \r\n    int a = 5, *b, c; \r\n    b = &a; \r\n    printf(\"%d\", a * *b * a + *b); \r\n    return (0); \r\n}', 1, '130', '103', '100', '310'),
(2, 'Find Output of the Following:\r\n#include <stdio.h> \r\nint main() \r\n{ \r\n    int i, j = 3; \r\n    float k = 7; \r\n    i = k % j; \r\n    printf(\"%d\", i); \r\n    return (0); \r\n}', 2, 'No output', 'compile time error', 'Abnormal termination', '1'),
(2, 'Find Output of the Following:\r\nvoid main() \r\n{ \r\n    int i = 0; \r\n    printf(\"%d %d\", i, i++); \r\n} ', 2, '0 1', '1 0', '0 0', '1 1'),
(2, 'Find Output of the Following: \r\n#include <stdio.h>\r\n    void main()\r\n    {\r\n        char a = \'A\';\r\n        char b = \'B\';\r\n        int c = a + b % 3 - 3 * 2;\r\n        printf(\"%d\\n\", c);\r\n    }', 4, '65', '58', '64', '59'),
(2, 'Is it possible to run program without main() function?', 2, 'Yes', 'No', 'Depend on Compiler', 'Will give run time error'),
(2, 'Which datatype can accept switch statement?', 4, 'int', 'char', 'long', 'all of the mentioned'),
(2, 'Which of the following is not a valid name for a C variable?', 3, 'Examveda', 'Exam_veda', 'Exam veda', 'Both A and B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mcq_q`
--
ALTER TABLE `mcq_q`
  ADD PRIMARY KEY (`mcq_id`,`mcq_question`,`correct_option`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mcq_q`
--
ALTER TABLE `mcq_q`
  ADD CONSTRAINT `mcq_id_foreign_key` FOREIGN KEY (`mcq_id`) REFERENCES `mcq` (`mcq_id`),
  ADD CONSTRAINT `mcq_q_ibfk_1` FOREIGN KEY (`mcq_id`) REFERENCES `mcq` (`mcq_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

