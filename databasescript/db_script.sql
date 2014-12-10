-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2014 at 09:00 PM
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
    `end_time` varchar(100) NOT NULL
  ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_event_calendar`
  --

  INSERT INTO `tbl_event_calendar` (`id`, `title`, `body`, `start_time`, `end_time`) VALUES
  (1, 'f', 's', '2014-12-10T13:00:00+01:00', '2014-12-10T13:30:00+01:00'),
  (2, 'h', 'n', '2014-12-10T13:59:00+01:00', '2014-12-10T14:29:00+01:00'),
  (3, 'd', 'p', '2014-12-08T02:00:00+01:00', '2014-12-08T02:30:00+01:00'),
  (4, 'morngin', 'eight am', '2014-12-10T14:00:00+01:00', '2014-12-10T14:30:00+01:00'),
  (5, 'God', 'plz', '2014-12-10T09:00:00+01:00', '2014-12-10T09:30:00+01:00'),
  (6, 'Yes', 'Got it working', '2014-12-10T08:00:00+01:00', '2014-12-10T08:30:00+01:00');

  --
  -- Indexes for dumped tables
  --

  --
  -- Indexes for table `tbl_event_calendar`
  --
  ALTER TABLE `tbl_event_calendar`
  ADD PRIMARY KEY (`id`);

  --
  -- AUTO_INCREMENT for dumped tables
  --

  --
  -- AUTO_INCREMENT for table `tbl_event_calendar`
  --
  ALTER TABLE `tbl_event_calendar`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
