# create necessary tables and initializes them
-- ---

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
-- ---
-- Database:ExaminationDB
-- --------------------------------------------------------

--
-- Table structure 'users'
--

CREATE TABLE IF NOT EXISTS users (
  emailid varchar(100) NOT NULL,
  password varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO users (emailid, password) VALUES
('vinod.jammala@gmail.com', '123'),
('jullie@gmail.com','12345');

-- --------------------------------------------------------

--
-- Table structure 'admins'
--

CREATE TABLE IF NOT EXISTS admins (
  emailid varchar(100) NOT NULL,
  password varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO admins (emailid, password) VALUES
('vinod.jammala@gmail.com', '123');

-- --------------------------------------------------------



-- --------------------------------------------------------

--
-- Table structure 'userDetails'
--

CREATE TABLE IF NOT EXISTS userDetails (
  	name varchar(100) NOT NULL,
  	roll_no varchar(20) NOT NULL,
  	ph_no varchar(20) NOT NULL,
  	branch varchar(50) NOT NULL,
  	CGPA float(6,5) NOT NULL,
  	emailid varchar(100) NOT NULL,
  	password varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table 'userDetails'
--

INSERT INTO userDetails (name,roll_no,ph_no,branch,CGPA,emailid, password) VALUES
('vinod','B160769CS','7994311789','cse',8.5,'vinod.jammala@gmail.com', '123'),
('jullie','B200769CS','1234567890','cse',8.0,'jullie@gmail.com','12345');

-- --------------------------------------------------------



-- --------------------------------------------------------

--
-- Table structure 'questions'
--

CREATE TABLE IF NOT EXISTS questions (
  qid int(10) NOT NULL,
  question varchar(200) NOT NULL,
  option1 varchar(100) NOT NULL,
  option2 varchar(100) NOT NULL,
  option3 varchar(100) NOT NULL,
  option4 varchar(100) NOT NULL,
  answer varchar(100) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO questions (qid,question,option1,option2,option3,option4,answer) VALUES
('1','Which is not in Cloud deployment models?','Platform as a Service','Infrastructure as a Service','Software as a Service','Product as a Service','option4'),
('2','Which among these is not VM placement method?','first fit','Best fit','Second fit','Worst fit','option3'),
('3','Which of the following is most refined and restrictive service model?','IaaS','PaaS','SaaS','All of the above','option2'),
('4','Which of the following is best known service model?','IaaS','SaaS','PaaS','All the above','option4'),
('5','Which of the following is related to service provided by Cloud?','Sourcing','Ownership','Reliability','AaaS','option1'),
('6','Which of the following cloud concept is related to pooling and sharing of resources?','Polymorphism','Abstraction','Virtualization','None of Above','option3');


-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS history(
	name varchar(100) NOT NULL,
 	roll_no varchar(20) NOT NULL,
  	ph_no varchar(20) NOT NULL,
  	branch varchar(50) NOT NULL,
  	emailid varchar(100) NOT NULL,
  	marks int(20) NOT NULL,
  	test_time TIMESTAMP

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO history VALUES
('vinod','b160769cs','7994311789','cse','vinod.jammala@gmail.com',5,'2019-11-01 08:00:01');