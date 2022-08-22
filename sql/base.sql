-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 50.63.234.76
-- Generation Time: Apr 19, 2013 at 09:54 AM
-- Server version: 5.0.96
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `clientid` int(10) unsigned default NULL,
  `deleted` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `recordtype` int(10) unsigned default NULL,
  `data` mediumtext,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `activity`
--


-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `clientid` int(10) unsigned default NULL,
  `deleted` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `recordtype` int(10) unsigned default NULL,
  `data` mediumtext,
  `ip` mediumtext,
  `url` mediumtext,
  `dns` mediumtext,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `deleted` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `ip` varchar(32) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `block`
--


-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `authorid` int(10) unsigned default NULL,
  `deleted` int(10) unsigned default '0',
  `download` int(10) unsigned default '0',
  `active` int(10) unsigned default '0',
  `uuid` mediumtext,
  `groups` mediumtext,
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `current_status` int(10) NOT NULL default '1',
  `first_name` varchar(35) default NULL,
  `last_name` varchar(35) default NULL,
  `company_name` varchar(35) default NULL,
  `address` varchar(35) default NULL,
  `address2` varchar(35) default NULL,
  `city` varchar(35) default NULL,
  `state` varchar(35) default NULL,
  `zip` varchar(15) default NULL,
  `country` varchar(20) NOT NULL default 'US',
  `phone` varchar(35) default NULL,
  `phone2` varchar(35) default NULL,
  `phone3` varchar(35) default NULL,
  `email` varchar(50) default NULL,
  `email2` varchar(50) default NULL,
  `charge_type` varchar(35) default NULL,
  `card_type` varchar(10) default NULL,
  `card_number` varchar(25) default NULL,
  `card_exp_date` varchar(25) default NULL,
  `card_code` varchar(10) default NULL,
  `username` varchar(55) default NULL,
  `password` varchar(55) default NULL,
  `bank_type` enum('Checking','Savings') default NULL,
  `bank_name` varchar(50) default NULL,
  `bank_name_on_account` varchar(50) default NULL,
  `bank_routing_number` varchar(20) default NULL,
  `bank_account_number` varchar(20) default NULL,
  `bank_check_number` varchar(20) default NULL,
  `dbhost` mediumtext,
  `dbname` mediumtext,
  `dbuser` mediumtext,
  `dbpass` mediumtext,
  `dbtable` mediumtext,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `clients`
--

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `deleted` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `active` int(10) unsigned default '0',
  `name` mediumtext,
  `filename` mediumtext,
  `category` mediumtext,
  `tag` mediumtext,
  `url` mediumtext,
  `target` mediumtext,
  `targetlist` mediumtext,
  `description` mediumtext,
  `recordtype` int(10) unsigned default NULL,
  `filedata` longblob,
  `filesize` int(10) unsigned default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `download`
--


-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `deleted` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `username` text,
  `ip` varchar(16) default NULL,
  `method` text,
  `uri` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `general`
--


-- --------------------------------------------------------

--
-- Table structure for table `item_table`
--

CREATE TABLE `item_table` (
  `id` int(11) NOT NULL auto_increment,
  `clientid` int(10) unsigned default NULL,
  `deleted` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `email` varchar(50) default NULL,
  `item_number` varchar(11) NOT NULL default '0',
  `mc_gross` decimal(9,2) NOT NULL default '0.00',
  `mc_currency` enum('USD','CAD','EUR','GBP','JPY','CAD') NOT NULL default 'USD',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `item_number2` (`item_number`),
  KEY `item_number1` (`item_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `item_table`
--


-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `clientid` int(10) unsigned default NULL,
  `paypalid` int(10) unsigned default NULL,
  `deleted` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `name` text,
  `tag` text,
  `username` text,
  `newuuid` text,
  `seeduuid` text,
  `machinename` text,
  `recordtype` int(10) unsigned default NULL,
  `count` int(10) unsigned default '0',
  `enable` int(10) unsigned default '0',
  `product` int(10) unsigned default '0',
  `seedfile` mediumblob,
  `ssize` int(10) unsigned default '0',
  `clearfile` mediumblob,
  `clearsize` int(10) unsigned default '0',
  `license` mediumblob,
  `lsize` int(10) unsigned default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `license`
--


-- --------------------------------------------------------

--
-- Table structure for table `mailing`
--

CREATE TABLE `mailing` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `clientid` int(10) unsigned default NULL,
  `deleted` int(10) unsigned default '0',
  `enable` int(10) unsigned default '0',
  `digestflag` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `username` text,
  `listname` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mailing`
--

-- --------------------------------------------------------

--
-- Table structure for table `mailto`
--

CREATE TABLE `mailto` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `count` int(10) unsigned default NULL,
  `deleted` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `email` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mailto`
--


-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `clientid` int(10) unsigned default NULL,
  `deleted` int(10) unsigned default '0',
  `isread` int(10) unsigned default '0',
  `opened` int(10) unsigned default '0',
  `resolved` int(10) unsigned default '0',
  `rpmid` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `author` char(255) default NULL,
  `subject` char(255) default NULL,
  `username` text,
  `listname` text,
  `url` text,
  `email` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `body` mediumtext,
  `thread_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `level` int(10) unsigned NOT NULL,
  `thread_pos` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `message`
--


-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `clientid` int(10) unsigned default NULL,
  `deleted` int(10) unsigned default '0',
  `userlist` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `crawl_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `last_modified_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `flags` text,
  `url` text,
  `page` mediumtext,
  `language` text,
  `name` text,
  `username` text,
  `listname` text,
  `meta` mediumtext,
  `img` mediumtext,
  `title` text,
  `pagetext` mediumtext,
  `condensed` mediumtext,
  PRIMARY KEY  (`id`),
  KEY `clientid_index` (`clientid`),
  KEY `title_index` (`title`(333)),
  KEY `url_index` (`url`(333)),
  KEY `meta_index` (`meta`(333)),
  KEY `name_index` (`name`(333)),
  KEY `page_index` (`page`(333)),
  KEY `language_index` (`language`(333)),
  KEY `pagetext_index` (`pagetext`(333)),
  KEY `cond_index` (`condensed`(333)),
  FULLTEXT KEY `pagesearch` (`page`),
  FULLTEXT KEY `textsearch` (`pagetext`),
  FULLTEXT KEY `titlesearch` (`title`),
  FULLTEXT KEY `namesearch` (`name`),
  FULLTEXT KEY `condsearch` (`condensed`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staging`
--

CREATE TABLE `staging` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `clientid` int(10) unsigned default NULL,
  `deleted` int(10) unsigned default '0',
  `userlist` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `crawl_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `last_modified_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `flags` text,
  `url` text,
  `rawurl` text,
  `page` mediumtext,
  `language` text,
  `name` text,
  `username` text,
  `listname` text,
  `meta` mediumtext,
  `img` mediumtext,
  `title` text,
  `pagetext` mediumtext,
  `condensed` mediumtext,
  PRIMARY KEY  (`id`),
  KEY `clientid_index` (`clientid`),
  KEY `title_index` (`title`(333)),
  KEY `url_index` (`url`(333)),
  KEY `rawurl_index` (`rawurl`(333)),
  KEY `meta_index` (`meta`(333)),
  KEY `name_index` (`name`(333)),
  KEY `page_index` (`page`(333)),
  KEY `language_index` (`language`(333)),
  KEY `pagetext_index` (`pagetext`(333)),
  KEY `cond_index` (`condensed`(333)),
  FULLTEXT KEY `pagesearch` (`page`),
  FULLTEXT KEY `textsearch` (`pagetext`),
  FULLTEXT KEY `titlesearch` (`title`),
  FULLTEXT KEY `namesearch` (`name`),
  FULLTEXT KEY `condsearch` (`condensed`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `allurls`
--

CREATE TABLE `allurls` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `complete` int(10) unsigned default '0',
  `deleted` int(10) unsigned default '0',
  `userlist` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `crawl_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `last_modified_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `url` text,
  PRIMARY KEY  (`id`),
  KEY `url_index` (`url`(333))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `targets`
--

CREATE TABLE `targets` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `complete` int(10) unsigned default '0',
  `deleted` int(10) unsigned default '0',
  `userlist` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `crawl_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `last_modified_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `url` text,
  `targets` text,
  PRIMARY KEY  (`id`),
  KEY `url_index` (`url`(333)),
  KEY `targets_index` (`targets`(333)),
  FULLTEXT KEY `urlsearch` (`url`),
  FULLTEXT KEY `targetsearch` (`targets`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_table`
--

CREATE TABLE `paypal_table` (
  `id` int(11) NOT NULL auto_increment,
  `clientid` int(10) unsigned default NULL,
  `deleted` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `paypal_status` text,
  `payment_type` text,
  `payment_date` text,
  `payment_status` text,
  `address_status` text,
  `payer_status` text,
  `first_name` text,
  `last_name` text,
  `payer_email` text,
  `payer_id` text,
  `address_name` text,
  `address_country` text,
  `address_country_code` text,
  `address_zip` text,
  `address_state` text,
  `address_city` text,
  `address_street` text,
  `business` text,
  `receiver_email` text,
  `receiver_id` text,
  `residence_country` text,
  `item_name` text,
  `item_number` text,
  `quantity` text,
  `shipping` text,
  `tax` text,
  `mc_currency` text,
  `mc_fee` text,
  `mc_gross` text,
  `txn_type` text,
  `txn_id` text,
  `notify_version` text,
  `custom` text,
  `invoice` text,
  `charset` text,
  `verify_sign` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `paypal_table`
--


-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `clientid` int(10) unsigned default NULL,
  `deleted` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `recordtype` int(10) unsigned default NULL,
  `data` mediumtext,
  `ip` mediumtext,
  `url` mediumtext,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `post`
--


-- --------------------------------------------------------

--
-- Table structure for table `seedfile`
--

CREATE TABLE `seedfile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `clientid` int(10) unsigned default NULL,
  `deleted` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `name` text,
  `username` text,
  `uuid` text,
  `seeduuid` text,
  `machinename` text,
  `recordtype` int(10) unsigned default NULL,
  `seedfile` mediumblob,
  `ssize` int(10) unsigned default '0',
  `clearfile` mediumblob,
  `clearsize` int(10) unsigned default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `seedfile`
--


-- --------------------------------------------------------

--
-- Table structure for table `spider`
--

CREATE TABLE `spider` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `clientid` int(10) unsigned default NULL,
  `pageid` int(10) unsigned default NULL,
  `deleted` int(10) unsigned default '0',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `crawl_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `url` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `spool`
--

CREATE TABLE `spool` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `clientid` int(10) unsigned default NULL,
  `messageid` int(10) unsigned default NULL,
  `deleted` int(10) unsigned default '0',
  `retries` int(10) unsigned default '0',
  `username` text,
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `send_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `completed_date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `spool`
--

