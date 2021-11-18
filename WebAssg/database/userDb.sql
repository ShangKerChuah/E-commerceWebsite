-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 03, 2021 at 06:32 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: practical_lab
--

-- --------------------------------------------------------

--
-- Table structure for table userdb
--

CREATE TABLE userdb (
  userid int(11) NOT NULL,
  name varchar(100) NOT NULL,
  address varchar(100) NOT NULL,
  email varchar(50) NOT NULL,
  login varchar(20) NOT NULL,
  pass varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='user database';

--
-- Dumping data for table userdb
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table userdb
--
ALTER TABLE userdb
  ADD PRIMARY KEY (userid),
  ADD UNIQUE KEY login (login),
  ADD KEY name (name,email,login);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table userdb
--
ALTER TABLE userdb
  MODIFY userid int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
