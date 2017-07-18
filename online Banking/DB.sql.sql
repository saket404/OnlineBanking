-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2016 at 06:42 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evil`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Accountnumber` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `CustomerID` int(20) NOT NULL,
  `Accountstatus` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `AccountInitializeDate` date NOT NULL,
  `Accounttype` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Accountbalance` float NOT NULL,
  `Branchcode` varchar(20) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Accountnumber`, `CustomerID`, `Accountstatus`, `AccountInitializeDate`, `Accounttype`, `Accountbalance`, `Branchcode`) VALUES
('G1111', 17, '', '2016-12-07', 'SAVINGS', 77233, 'NY'),
('G1112', 17, '', '2016-12-07', 'SAVINGS ', 9900, 'SF'),
('G2222', 18, '', '2016-12-07', 'SAVINGS ', 10100, 'GOT');

-- --------------------------------------------------------

--
-- Table structure for table `accounttype`
--

CREATE TABLE `accounttype` (
  `Accounttype` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Abbreviation` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Minbalance` float NOT NULL,
  `Interest` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `accounttype`
--

INSERT INTO `accounttype` (`Accounttype`, `Abbreviation`, `Minbalance`, `Interest`) VALUES
('CURRENT', 'CUR', 0, 0),
('SAVINGS', 'SAV', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `accounttypeother`
--

CREATE TABLE `accounttypeother` (
  `Accounttype` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Abbreviation` varchar(20) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `accounttypeother`
--

INSERT INTO `accounttypeother` (`Accounttype`, `Abbreviation`) VALUES
('CURRENT', 'CUR'),
('SAVINGS', 'SAV');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `Branchcode` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Branchname` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `City` tinytext COLLATE utf32_unicode_ci NOT NULL,
  `Branchaddress` tinytext COLLATE utf32_unicode_ci NOT NULL,
  `State` tinytext COLLATE utf32_unicode_ci NOT NULL,
  `Country` tinytext COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`Branchcode`, `Branchname`, `City`, `Branchaddress`, `State`, `Country`) VALUES
('GOT', 'Gotham', 'Bangkok', '2222 bbbb', 'sss', 'THailand'),
('NY', 'Newyork', 'Newyork', '2121122 2 2 22 mooss ss', 'ss', 'ss'),
('SF', 'Sanfrans', 'San francisco', '222 sanfaran why do you care', 'America', 'THailand');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(20) NOT NULL,
  `Branchcode` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Firstname` tinytext COLLATE utf32_unicode_ci NOT NULL,
  `Lastname` tinytext COLLATE utf32_unicode_ci NOT NULL,
  `BirthDate` date NOT NULL,
  `Phonenumber` decimal(20,0) NOT NULL,
  `LoginID` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Transactionpassword` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `AccountStatus` tinytext COLLATE utf32_unicode_ci NOT NULL,
  `City` tinytext COLLATE utf32_unicode_ci NOT NULL,
  `State` tinytext COLLATE utf32_unicode_ci NOT NULL,
  `AccountinitializeDate` date NOT NULL,
  `Lastlogin` datetime NOT NULL,
  `Country` tinytext COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `Branchcode`, `Firstname`, `Lastname`, `BirthDate`, `Phonenumber`, `LoginID`, `Password`, `Transactionpassword`, `AccountStatus`, `City`, `State`, `AccountinitializeDate`, `Lastlogin`, `Country`) VALUES
(17, 'NY', 'Saket', 'Khandelwal', '1996-10-07', '931392252', 'ee', 'ee', 'ee', '', 'Bangkok', 'Yo', '2016-12-07', '2016-12-08 00:05:29', 'Man'),
(18, 'GOT', 'Naruethep', 'Sripumra', '1993-11-06', '944492252', 'ee1', 'ee1', 'ee1', '', 'Bangkok', 'Yo', '2016-12-07', '2016-12-07 23:44:31', 'Man');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(20) NOT NULL,
  `Employeename` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `LoginID` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `EmailID` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Contactnumber` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `CreateDate` date NOT NULL,
  `lastlogin` datetime NOT NULL,
  `AdminCheck` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeID`, `Employeename`, `LoginID`, `Password`, `EmailID`, `Contactnumber`, `CreateDate`, `lastlogin`, `AdminCheck`) VALUES
(1, 'admin', 'admin', 'admin', 'yo@you.com', '09333333333', '2016-12-03', '2016-12-07 23:42:43', 1),
(10, 'John', 'tt', 'tt', 'why@gmail.com', '0934424454', '2016-12-07', '2016-12-08 00:06:34', 0),
(11, 'Lucky', 'tt1', 'tt1', 'lucky@you.com', '0893678', '2016-12-07', '2016-12-07 21:46:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `LoanID` int(20) NOT NULL,
  `Loantype` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Loanamount` float NOT NULL,
  `Interest` int(20) NOT NULL,
  `StartDate` date NOT NULL,
  `LastDate` date DEFAULT NULL,
  `CustomerID` int(20) NOT NULL,
  `CurrentAmount` float NOT NULL,
  `TotalInterest` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`LoanID`, `Loantype`, `Loanamount`, `Interest`, `StartDate`, `LastDate`, `CustomerID`, `CurrentAmount`, `TotalInterest`) VALUES
(8, 'STUDENT', 200000, 3, '2016-12-07', '2016-12-07', 17, 183333, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `loanpayment`
--

CREATE TABLE `loanpayment` (
  `PaymentID` int(20) NOT NULL,
  `Datepay` date NOT NULL,
  `Amount` float NOT NULL,
  `LoanID` int(20) NOT NULL,
  `Accountpay` varchar(20) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `loanpayment`
--

INSERT INTO `loanpayment` (`PaymentID`, `Datepay`, `Amount`, `LoanID`, `Accountpay`) VALUES
(8, '2016-12-07', 22667, 8, 'G1111');

-- --------------------------------------------------------

--
-- Table structure for table `loantype`
--

CREATE TABLE `loantype` (
  `Loantype` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Interest1` int(20) NOT NULL,
  `Abbreviation` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `MaximumAmount` float NOT NULL,
  `MinimumAmount` float NOT NULL,
  `Status` varchar(20) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `loantype`
--

INSERT INTO `loantype` (`Loantype`, `Interest1`, `Abbreviation`, `MaximumAmount`, `MinimumAmount`, `Status`) VALUES
('CAR', 2, 'CAR', 100000000, 2000, 'ACTIVE'),
('HOUSE', 4, 'HOUSE', 10000000, 1000000, ''),
('STUDENT', 3, 'STUD', 10000000, 100000, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `MailID` int(20) NOT NULL,
  `Subject` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Message` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `MailDateTime` datetime NOT NULL,
  `CustomerID` int(20) NOT NULL,
  `EmployeeID` int(20) NOT NULL,
  `sendtype` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`MailID`, `Subject`, `Message`, `MailDateTime`, `CustomerID`, `EmployeeID`, `sendtype`) VALUES
(5, 'Welcome', 'Welcome to evil bank online system.', '2016-12-07 21:23:42', 17, 1, 1),
(6, 'Welcome', 'Welcome to Evil online Banking System.', '2016-12-07 21:25:05', 18, 1, 1),
(7, 'Loan', 'I see you have requested a loan. Have you?', '2016-12-07 23:39:16', 17, 10, 1),
(8, 'Loan', 'Yes i have requested a loan.', '2016-12-07 23:39:59', 17, 10, 0),
(9, 'Loan', 'Thanks for the reply.', '2016-12-08 00:06:20', 17, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `otherbank`
--

CREATE TABLE `otherbank` (
  `Bankname` char(20) COLLATE utf32_unicode_ci NOT NULL,
  `Address` char(20) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `otherbank`
--

INSERT INTO `otherbank` (`Bankname`, `Address`) VALUES
('Butter', 'ssss fff 333'),
('Hitler', '222 msss your own');

-- --------------------------------------------------------

--
-- Table structure for table `payee`
--

CREATE TABLE `payee` (
  `CustomerOtherID` int(20) NOT NULL,
  `Payeename` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Accountnumber` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Accounttype` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Bankname` char(20) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `payee`
--

INSERT INTO `payee` (`CustomerOtherID`, `Payeename`, `Accountnumber`, `Accounttype`, `Bankname`) VALUES
(4, 'Build', 'P1111', 'SAVINGS', 'Hitler');

-- --------------------------------------------------------

--
-- Table structure for table `preloan`
--

CREATE TABLE `preloan` (
  `PreloanID` int(20) NOT NULL,
  `Loantype` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Interest` int(20) NOT NULL,
  `Loanamount` float NOT NULL,
  `CustomerID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pretransaction`
--

CREATE TABLE `pretransaction` (
  `PreTransactionID` int(20) NOT NULL,
  `TransactionDate` date NOT NULL,
  `PaymentDate` date NOT NULL,
  `Accountnumber` varchar(20) COLLATE utf32_unicode_ci DEFAULT NULL,
  `CustomerOtherID` varchar(20) COLLATE utf32_unicode_ci DEFAULT NULL,
  `Amount` float NOT NULL,
  `Paymentstatus` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `sendtype` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(20) NOT NULL,
  `TransactionDate` date NOT NULL,
  `PaymentDate` date NOT NULL,
  `Accountnumber` varchar(20) COLLATE utf32_unicode_ci DEFAULT NULL,
  `CustomerOtherID` varchar(20) COLLATE utf32_unicode_ci DEFAULT NULL,
  `Amount` float NOT NULL,
  `sendtype` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionID`, `TransactionDate`, `PaymentDate`, `Accountnumber`, `CustomerOtherID`, `Amount`, `sendtype`) VALUES
(1, '2016-12-07', '2016-12-07', 'G1111', NULL, 100, 0),
(1, '2016-12-07', '2016-12-07', 'G2222', NULL, 100, 1),
(2, '2016-12-07', '2016-12-07', 'G1111', NULL, 100, 0),
(2, '2016-12-07', '2016-12-07', 'G2222', NULL, 100, 1),
(3, '2016-12-07', '2016-12-07', 'G2222', NULL, 100, 0),
(3, '2016-12-07', '2016-12-07', 'G1111', NULL, 100, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Accountnumber`),
  ADD KEY `Branchcode` (`Branchcode`),
  ADD KEY `Accounts_fk0` (`CustomerID`),
  ADD KEY `Accounts_fk1` (`Accounttype`);

--
-- Indexes for table `accounttype`
--
ALTER TABLE `accounttype`
  ADD PRIMARY KEY (`Accounttype`);

--
-- Indexes for table `accounttypeother`
--
ALTER TABLE `accounttypeother`
  ADD PRIMARY KEY (`Accounttype`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`Branchcode`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `Branchcode` (`Branchcode`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`LoanID`),
  ADD KEY `Loantype` (`Loantype`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `Interest` (`Interest`);

--
-- Indexes for table `loanpayment`
--
ALTER TABLE `loanpayment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `LoanID` (`LoanID`),
  ADD KEY `Accountpay` (`Accountpay`);

--
-- Indexes for table `loantype`
--
ALTER TABLE `loantype`
  ADD PRIMARY KEY (`Loantype`,`Interest1`),
  ADD UNIQUE KEY `Interest1` (`Interest1`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`MailID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `otherbank`
--
ALTER TABLE `otherbank`
  ADD PRIMARY KEY (`Bankname`);

--
-- Indexes for table `payee`
--
ALTER TABLE `payee`
  ADD PRIMARY KEY (`CustomerOtherID`),
  ADD KEY `Accounttype` (`Accounttype`),
  ADD KEY `Bankname` (`Bankname`),
  ADD KEY `Accountnumber` (`Accountnumber`);

--
-- Indexes for table `preloan`
--
ALTER TABLE `preloan`
  ADD PRIMARY KEY (`PreloanID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `Loantype` (`Loantype`),
  ADD KEY `Interest` (`Interest`);

--
-- Indexes for table `pretransaction`
--
ALTER TABLE `pretransaction`
  ADD KEY `Accountnumber` (`Accountnumber`),
  ADD KEY `CustomerOtherID` (`CustomerOtherID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD KEY `Accountnumber` (`Accountnumber`),
  ADD KEY `CustomerOtherID` (`CustomerOtherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `LoanID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `loanpayment`
--
ALTER TABLE `loanpayment`
  MODIFY `PaymentID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `MailID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `payee`
--
ALTER TABLE `payee`
  MODIFY `CustomerOtherID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `preloan`
--
ALTER TABLE `preloan`
  MODIFY `PreloanID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `Accounts_fk0` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Accounts_fk1` FOREIGN KEY (`Accounttype`) REFERENCES `accounttype` (`Accounttype`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Accounts_fk2` FOREIGN KEY (`Branchcode`) REFERENCES `branch` (`Branchcode`) ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`Branchcode`) REFERENCES `branch` (`Branchcode`);

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`Loantype`) REFERENCES `loantype` (`Loantype`),
  ADD CONSTRAINT `loan_ibfk_3` FOREIGN KEY (`Interest`) REFERENCES `loantype` (`Interest1`);

--
-- Constraints for table `loanpayment`
--
ALTER TABLE `loanpayment`
  ADD CONSTRAINT `loanpayment_ibfk_1` FOREIGN KEY (`LoanID`) REFERENCES `loan` (`LoanID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `loanpayment_ibfk_2` FOREIGN KEY (`Accountpay`) REFERENCES `accounts` (`Accountnumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mail_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payee`
--
ALTER TABLE `payee`
  ADD CONSTRAINT `payee_ibfk_1` FOREIGN KEY (`Bankname`) REFERENCES `otherbank` (`Bankname`) ON UPDATE CASCADE,
  ADD CONSTRAINT `payee_ibfk_2` FOREIGN KEY (`Accounttype`) REFERENCES `accounttypeother` (`Accounttype`) ON UPDATE CASCADE;

--
-- Constraints for table `preloan`
--
ALTER TABLE `preloan`
  ADD CONSTRAINT `customerforegin` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `loantypefk` FOREIGN KEY (`Loantype`) REFERENCES `loantype` (`Loantype`),
  ADD CONSTRAINT `preloan_ibfk_1` FOREIGN KEY (`Interest`) REFERENCES `loantype` (`Interest1`);

--
-- Constraints for table `pretransaction`
--
ALTER TABLE `pretransaction`
  ADD CONSTRAINT `pretransaction_ibfk_1` FOREIGN KEY (`Accountnumber`) REFERENCES `accounts` (`Accountnumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pretransaction_ibfk_2` FOREIGN KEY (`CustomerOtherID`) REFERENCES `payee` (`Accountnumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`Accountnumber`) REFERENCES `accounts` (`Accountnumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`CustomerOtherID`) REFERENCES `payee` (`Accountnumber`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
