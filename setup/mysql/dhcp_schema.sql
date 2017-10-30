-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2017 at 03:07 PM
-- Server version: 5.6.38
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `dhcp`
--
CREATE DATABASE IF NOT EXISTS `dhcp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dhcp`;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(10) NOT NULL,
  `ip` text NOT NULL,
  `mac` text NOT NULL,
  `subnet_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dhcp_log`
--

CREATE TABLE `dhcp_log` (
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `client_mac` text NOT NULL,
  `client_ip` text NOT NULL,
  `gateway_ip` text NOT NULL,
  `client_ident` text NOT NULL,
  `requested_ip` text NOT NULL,
  `hostname` text NOT NULL,
  `dhcp_vendor_class` text NOT NULL,
  `dhcp_user_class` text NOT NULL,
  `dhcp_opt82_chasis_id` text NOT NULL,
  `dhcp_opt82_unit_id` text NOT NULL,
  `dhcp_opt82_port_id` text NOT NULL,
  `dhcp_opt82_vlan_id` text NOT NULL,
  `dhcp_opt82_subscriber_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ips`
--

CREATE TABLE `ips` (
  `ip` varchar(15) NOT NULL,
  `mac` varchar(17) DEFAULT NULL,
  `subnet_id` int(11) NOT NULL,
  `lease_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subnets`
--

CREATE TABLE `subnets` (
  `subnet_id` int(11) NOT NULL,
  `dhcp_lease_time` int(32) NOT NULL,
  `dhcp_renewal` int(32) NOT NULL,
  `dhcp_rebind_time` int(32) NOT NULL,
  `mask` text NOT NULL,
  `gateway` text NOT NULL,
  `dns1` text NOT NULL,
  `dns2` text NOT NULL,
  `domain` varchar(255) NOT NULL,
  `vlan_id` int(4) NOT NULL,
  `type` varchar(32) NOT NULL DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subnets_routes`
--

CREATE TABLE `subnets_routes` (
  `subnet_id` int(11) NOT NULL,
  `destination` text NOT NULL,
  `mask` text NOT NULL,
  `gateway` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `ips`
--
ALTER TABLE `ips`
  ADD UNIQUE KEY `ip` (`ip`),
  ADD KEY `subnet_id` (`subnet_id`);

--
-- Indexes for table `subnets`
--
ALTER TABLE `subnets`
  ADD PRIMARY KEY (`subnet_id`);

--
-- Indexes for table `subnets_routes`
--
ALTER TABLE `subnets_routes`
  ADD PRIMARY KEY (`subnet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `subnets`
--
ALTER TABLE `subnets`
  MODIFY `subnet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `subnets_routes`
--
ALTER TABLE `subnets_routes`
  MODIFY `subnet_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
