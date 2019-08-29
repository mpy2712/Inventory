-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2019 at 10:32 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `catCode` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catName`, `catCode`, `status`) VALUES
(1, 'Sales', 'Sale', 'N'),
(2, 'PURCHASE', 'Purchase', 'N'),
(3, 'INVENTORY', 'inventory', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone_no`, `email`, `address`, `created_date`, `updated_date`, `created_by`) VALUES
(1, 'Alexander Nicoll', '7027619427', 'jasonwarner59@yahoo.com', '748 CANFIELD POINT AVE', '2019-08-29 05:55:44', '2019-08-29 09:25:44', 1),
(2, 'Munish Pandey', '8545855555', 'manoj.pandey@g1g.com', '192 St Enclave', '2019-08-29 05:55:50', '2019-08-29 09:25:50', 1),
(3, 'laura lee femino', '8632688464', 'femino@comcast.net', '4320 heath land lane', '2019-08-29 05:55:55', '2019-08-29 09:25:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `financialyear`
--

CREATE TABLE `financialyear` (
  `id` int(11) NOT NULL,
  `finYear` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financialyear`
--

INSERT INTO `financialyear` (`id`, `finYear`, `status`) VALUES
(1, '2018-2019', 'InActive'),
(2, '2019-2020', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `issue_slips`
--

CREATE TABLE `issue_slips` (
  `id` int(11) NOT NULL,
  `slip_no` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `issue_date` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_slips`
--

INSERT INTO `issue_slips` (`id`, `slip_no`, `employee_id`, `issue_date`, `created_by`, `created_date`, `updated_date`) VALUES
(1, 'ISSUE-F86AA7WJ4K', 2, 1567116000, 1, '2019-08-29 05:56:56', '2019-08-29 09:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `issue_slip_item_details`
--

CREATE TABLE `issue_slip_item_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `batch_no` varchar(255) NOT NULL,
  `issue_qty` int(11) NOT NULL,
  `issue_date` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_slip_item_details`
--

INSERT INTO `issue_slip_item_details` (`id`, `item_id`, `batch_no`, `issue_qty`, `issue_date`, `issue_id`, `created_date`, `updated_date`) VALUES
(1, 1, 'N', 400, 1567116000, 1, '2019-08-29 05:56:56', '2019-08-29 09:26:56'),
(2, 6, 'N', 200, 1567116000, 1, '2019-08-29 05:56:56', '2019-08-29 09:26:56'),
(3, 10, 'N', 100, 1567116000, 1, '2019-08-29 05:56:56', '2019-08-29 09:26:56'),
(4, 13, 'N', 50, 1567116000, 1, '2019-08-29 05:56:56', '2019-08-29 09:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `itembasket`
--

CREATE TABLE `itembasket` (
  `id` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `ItemCode` varchar(10) NOT NULL,
  `itemDesc` text NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `creationDate` int(11) NOT NULL,
  `batch_no` varchar(2) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itembasket`
--

INSERT INTO `itembasket` (`id`, `unit`, `ItemCode`, `itemDesc`, `itemName`, `creationDate`, `batch_no`) VALUES
(1, 0, 'LFYNYJQ5QF', 'Celling Fans', 'Fan', 1566490899, 'N'),
(2, 0, '4TXGHQNMKQ', 'Computer', 'Computer', 1566490912, 'N'),
(3, 0, 'WUAUICG5KS', 'Invertor', 'Invertor', 1566491012, 'N'),
(4, 0, 'AFWAC5MJRG', 'Books', 'Books', 1566491027, 'N'),
(5, 0, 'PEKD4RC4IX', 'Pens', 'Pen', 1566491039, 'N'),
(6, 0, 'ATUWVCZYLP', 'Pencils', 'Pencil', 1566491053, 'N'),
(7, 0, 'QUUGNBFTXA', 'knife', 'Knife', 1566491065, 'N'),
(8, 0, 'RVLLDDBCOZ', 'TV', 'TV', 1566491085, 'N'),
(9, 0, '4FDFAT9QXS', 'Fridge', 'Fridge', 1566491096, 'N'),
(10, 0, 'NBJSWWT7AL', 'Apple', 'Apple', 1566491111, 'N'),
(11, 0, 'G9G0UNNAWZ', 'Mango', 'Mango', 1566491123, 'N'),
(12, 0, 'G8HSFQKB0C', 'Mobile', 'Mobile', 1566491640, 'Y'),
(13, 0, 'FSTBRP3JGN', 'Khushi Pandey', 'Khushi', 1566494772, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `material_receive_note`
--

CREATE TABLE `material_receive_note` (
  `id` int(10) NOT NULL,
  `mrn_no` varchar(255) NOT NULL,
  `mrn_date` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_receive_note`
--

INSERT INTO `material_receive_note` (`id`, `mrn_no`, `mrn_date`, `vendor_id`, `created_by`, `created_date`, `updated_date`) VALUES
(1, 'MRNTVKO1I41SO', 1567029600, 1, 1, '2019-08-29 05:54:25', '2019-08-29 09:24:25'),
(2, 'MRN0LYCMSHGK6', 1567116000, 2, 1, '2019-08-29 07:32:20', '2019-08-29 11:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `mrn_items_details`
--

CREATE TABLE `mrn_items_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `batch_no` varchar(255) NOT NULL,
  `required_qty` int(11) NOT NULL,
  `received_qty` int(11) NOT NULL,
  `mrn_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mrn_items_details`
--

INSERT INTO `mrn_items_details` (`id`, `item_id`, `batch_no`, `required_qty`, `received_qty`, `mrn_id`, `created_date`, `updated_date`) VALUES
(1, 1, 'N', 1500, 1500, 1, '2019-08-29 05:54:25', '2019-08-29 09:24:25'),
(2, 6, 'N', 2000, 2000, 1, '2019-08-29 05:54:25', '2019-08-29 09:24:25'),
(3, 10, 'N', 4000, 4000, 1, '2019-08-29 05:54:25', '2019-08-29 09:24:25'),
(4, 13, 'N', 2500, 2500, 1, '2019-08-29 05:54:25', '2019-08-29 09:24:25'),
(5, 1, 'N', 200, 200, 2, '2019-08-29 07:32:20', '2019-08-29 11:02:20'),
(6, 12, 'Y', 400, 400, 2, '2019-08-29 07:32:20', '2019-08-29 11:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `openingstock`
--

CREATE TABLE `openingstock` (
  `id` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `qty` float NOT NULL,
  `openingDate` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `openingstock`
--

INSERT INTO `openingstock` (`id`, `itemID`, `qty`, `openingDate`) VALUES
(1, 1, 40, 1566424800),
(2, 2, 50, 1566424800),
(3, 3, 50, 1565820000);

-- --------------------------------------------------------

--
-- Table structure for table `randaomhash`
--

CREATE TABLE `randaomhash` (
  `id` int(11) NOT NULL,
  `hash` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `randaomhash`
--

INSERT INTO `randaomhash` (`id`, `hash`) VALUES
(1, 'LFYNYJQ5QF'),
(2, '4TXGHQNMKQ'),
(3, 'WUAUICG5KS'),
(4, 'AFWAC5MJRG'),
(5, 'PEKD4RC4IX'),
(6, 'ATUWVCZYLP'),
(7, 'QUUGNBFTXA'),
(8, 'RVLLDDBCOZ'),
(9, '4FDFAT9QXS'),
(10, 'NBJSWWT7AL'),
(11, 'G9G0UNNAWZ'),
(12, 'G8HSFQKB0C'),
(13, 'FSTBRP3JGN');

-- --------------------------------------------------------

--
-- Table structure for table `return_item_details`
--

CREATE TABLE `return_item_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `return_slip_id` int(11) NOT NULL,
  `issue_qty` int(11) NOT NULL,
  `return_qty` int(11) NOT NULL,
  `return_date` int(11) NOT NULL,
  `created_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `return_slip`
--

CREATE TABLE `return_slip` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `return_date` int(11) NOT NULL,
  `issue_slip_id` int(11) NOT NULL,
  `return_no` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `roleName` text NOT NULL,
  `category_allowed` varchar(50) DEFAULT NULL,
  `companyID` int(11) DEFAULT NULL,
  `roleStatus` enum('Y','N') DEFAULT 'Y',
  `created_date` date DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role_details`
--

CREATE TABLE `role_details` (
  `id` int(11) NOT NULL,
  `catID` int(11) DEFAULT NULL,
  `subCatID` int(11) DEFAULT NULL,
  `rollID` int(11) DEFAULT NULL,
  `Permission` varchar(20) DEFAULT NULL,
  `PerAdd` varchar(5) DEFAULT NULL,
  `PerEdit` varchar(5) DEFAULT NULL,
  `PerDelete` varchar(5) DEFAULT NULL,
  `PerView` varchar(5) DEFAULT NULL,
  `PerApprove` varchar(5) DEFAULT NULL,
  `FormStatus` varchar(2) DEFAULT '1',
  `profilestatus` char(10) DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `modified_by` int(10) DEFAULT NULL,
  `modified_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_evaluation`
--

CREATE TABLE `stock_evaluation` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `transaction_detail_id` int(11) NOT NULL,
  `stock_in` int(11) NOT NULL,
  `stock_out` int(11) NOT NULL,
  `transaction_type` enum('mrn','issue','return') NOT NULL,
  `created_date` int(11) NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_evaluation`
--

INSERT INTO `stock_evaluation` (`id`, `item_id`, `transaction_id`, `transaction_detail_id`, `stock_in`, `stock_out`, `transaction_type`, `created_date`, `updated_date`) VALUES
(1, 1, 1, 1, 1500, 0, 'mrn', 1567050865, '2019-08-29 09:24:25'),
(2, 6, 1, 2, 2000, 0, 'mrn', 1567050865, '2019-08-29 09:24:25'),
(3, 10, 1, 3, 4000, 0, 'mrn', 1567050865, '2019-08-29 09:24:25'),
(4, 13, 1, 4, 2500, 0, 'mrn', 1567050866, '2019-08-29 09:24:26'),
(5, 1, 1, 1, 0, 400, 'issue', 1567051016, '2019-08-29 09:26:56'),
(6, 6, 1, 2, 0, 200, 'issue', 1567051016, '2019-08-29 09:26:56'),
(7, 10, 1, 3, 0, 100, 'issue', 1567051016, '2019-08-29 09:26:56'),
(8, 13, 1, 4, 0, 50, 'issue', 1567051016, '2019-08-29 09:26:56'),
(9, 1, 2, 5, 200, 0, 'mrn', 1567056740, '2019-08-29 11:02:20'),
(10, 12, 2, 6, 400, 0, 'mrn', 1567056740, '2019-08-29 11:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  `subCatName` varchar(255) NOT NULL,
  `subCatCode` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `catID`, `subCatName`, `subCatCode`, `status`) VALUES
(1, 1, 'Transaction', 'tsale', 'N'),
(2, 1, 'Masters', 'mSales', 'N'),
(3, 3, 'Transaction', 'TInventory', 'Y'),
(4, 3, 'Masters', 'MInventory', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `userform`
--

CREATE TABLE `userform` (
  `id` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  `subCatID` int(11) NOT NULL,
  `formName` varchar(255) NOT NULL,
  `formUrl` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userform`
--

INSERT INTO `userform` (`id`, `catID`, `subCatID`, `formName`, `formUrl`, `status`) VALUES
(1, 3, 3, 'Direct MRN', 'materialRecieptNote/view_MRN', 1),
(2, 3, 3, 'Issue Slip', 'issueSlip/issue_details', 1),
(3, 3, 3, 'Return Slip', 'returnSlip/return_details', 1),
(4, 3, 4, 'Item Basket', 'itemMaster/itemBasket_details', 1),
(5, 3, 4, 'Vendor ', 'vendor/vendor_details', 1),
(6, 3, 4, 'Item Creation', 'inventory/masterSetup/itemCreation.php', 1),
(7, 3, 4, 'Manage Opening Stock', 'inventory/masterSetup/openingStock.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `locked` varchar(11) NOT NULL DEFAULT '1',
  `userName` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT '1' COMMENT '0-user 1-admin',
  `finYearID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `locked`, `userName`, `name`, `email`, `dob`, `isAdmin`, `finYearID`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0', 'manoj', 'Manoj pandey', 'mpy2712@gmail.com', '1981-12-27', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `phone_no`, `address`, `email`, `created_date`, `updated_date`) VALUES
(1, 'Ajay Singh', '9898989898', '748 CANFIELD POINT AVE', 'ajay@gmail.com', '2019-08-29 05:53:08', '2019-08-29 09:23:08'),
(2, 'Pankaj', '789978799', '1921 East McDowell Road', 'pankaj@gmail.com', '2019-08-29 05:53:35', '2019-08-29 09:23:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financialyear`
--
ALTER TABLE `financialyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_slips`
--
ALTER TABLE `issue_slips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_slip_item_details`
--
ALTER TABLE `issue_slip_item_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itembasket`
--
ALTER TABLE `itembasket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_receive_note`
--
ALTER TABLE `material_receive_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mrn_items_details`
--
ALTER TABLE `mrn_items_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `openingstock`
--
ALTER TABLE `openingstock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `randaomhash`
--
ALTER TABLE `randaomhash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_item_details`
--
ALTER TABLE `return_item_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_slip`
--
ALTER TABLE `return_slip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_evaluation`
--
ALTER TABLE `stock_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userform`
--
ALTER TABLE `userform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `financialyear`
--
ALTER TABLE `financialyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `issue_slips`
--
ALTER TABLE `issue_slips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `issue_slip_item_details`
--
ALTER TABLE `issue_slip_item_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `itembasket`
--
ALTER TABLE `itembasket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `material_receive_note`
--
ALTER TABLE `material_receive_note`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mrn_items_details`
--
ALTER TABLE `mrn_items_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `openingstock`
--
ALTER TABLE `openingstock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `randaomhash`
--
ALTER TABLE `randaomhash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `return_item_details`
--
ALTER TABLE `return_item_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_slip`
--
ALTER TABLE `return_slip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_evaluation`
--
ALTER TABLE `stock_evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userform`
--
ALTER TABLE `userform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
