-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 01, 2017 at 11:22 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `dhcpd`
--
CREATE DATABASE IF NOT EXISTS `dhcpd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dhcpd`;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` text NOT NULL,
  `mac` text NOT NULL,
  `subnet_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dhcp_log`
--

DROP TABLE IF EXISTS `dhcp_log`;
CREATE TABLE IF NOT EXISTS `dhcp_log` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ips`
--

DROP TABLE IF EXISTS `pools`;
CREATE TABLE IF NOT EXISTS `pools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `mac` varchar(17) DEFAULT NULL,
  `subnet_id` int(11) NOT NULL,
  `lease_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`),
  KEY `subnet_id` (`subnet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

DROP TABLE IF EXISTS `routes`;
CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subnet_id` int(11) NOT NULL,
  `destination` text NOT NULL,
  `mask` text NOT NULL,
  `gateway` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subnets`
--

DROP TABLE IF EXISTS `subnets`;
CREATE TABLE IF NOT EXISTS `subnets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dhcp_lease_time` int(32) NOT NULL,
  `dhcp_renewal` int(32) NOT NULL,
  `dhcp_rebind_time` int(32) NOT NULL,
  `mask` text NOT NULL,
  `gateway` text NOT NULL,
  `dns1` text NOT NULL,
  `dns2` text NOT NULL,
  `domain` varchar(255) NOT NULL,
  `vlan_id` int(4) NOT NULL,
  `type` varchar(32) NOT NULL DEFAULT 'guest',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;
