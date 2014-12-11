-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2014 at 01:43 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_event_calendar`
--
drop database if exists db_event_calendar;
create database db_event_calendar;
  use db_event_calendar;
  -- --------------------------------------------------------

  --
  -- Table structure for table `tbl_event_calendar`
  --

  CREATE TABLE `tbl_event_calendar` (
    `id` bigint(20) NOT NULL,
    `title` varchar(255) NOT NULL,
    `body` text NOT NULL,
    `start_time` varchar(100) NOT NULL,
    `end_time` varchar(100) NOT NULL,
    `modified_by` int(11) NOT NULL,
    `modification_date` datetime NOT NULL
  ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_event_calendar`
  --

  INSERT INTO `tbl_event_calendar` (`id`, `title`, `body`, `start_time`, `end_time`, `modified_by`, `modification_date`) VALUES
  (8, 'Interview', 'There is interview today at the specified time.', '2014-12-11T08:00:00+01:00', '2014-12-11T08:30:00+01:00', 0, '0000-00-00 00:00:00'),
  (9, 'This is the last event', 'This is the body of the text that I want to play with', '2014-12-11T15:15:00+01:00', '2014-12-11T15:45:00+01:00', 0, '0000-00-00 00:00:00'),
  (10, 'Perfect', 'This is working very much and I am loving it', '2014-12-11T09:00:00+01:00', '2014-12-11T09:30:00+01:00', 0, '0000-00-00 00:00:00');

  --
  -- Indexes for dumped tables
  --

  --
  -- Indexes for table `tbl_event_calendar`
  --
  ALTER TABLE `tbl_event_calendar`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `title` (`title`,`start_time`,`end_time`);

  --
  -- AUTO_INCREMENT for dumped tables
  --

  --
  -- AUTO_INCREMENT for table `tbl_event_calendar`
  --
  ALTER TABLE `tbl_event_calendar`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
