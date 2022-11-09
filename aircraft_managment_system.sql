-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 06:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


create schema aircraft_managment_system;

use aircraft_managment_system;
--
-- Database: `aircraft_managment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircraft`
--

CREATE TABLE `aircraft` (
  `Aircraft_registration` varchar(10) NOT NULL,
  `Aircraft_manufacturer` varchar(20) NOT NULL,
  `Aircraft_type` varchar(45) NOT NULL,
  `Aircraft_seatconfig` varchar(35) DEFAULT NULL,
  `Aircraft_age` float NOT NULL,
  `Aircraft_MSN` int(11) NOT NULL,
  `Aircraft_hexcode` varchar(15) DEFAULT NULL,
  `Aircraft_deliverydate` date DEFAULT NULL,
  `Aircraft_loc` varchar(3) NOT NULL,
  `Aircraft_engineering_team` char(1) NOT NULL,
  `Aircraft_range` int(11) NOT NULL,
  `Aircraft_lessor_owner` varchar(40) NOT NULL,
  `Aircraft_airworthy` tinyint(4) NOT NULL,
  `Aircraft_purchaseprice` int(11) DEFAULT NULL,
  `Aircraft_sellingprice` int(11) DEFAULT NULL,
  `Aircraft_route` varchar(7) DEFAULT NULL,
  `Aircraft_engine` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aircraft`
--

INSERT INTO `aircraft` (`Aircraft_registration`, `Aircraft_manufacturer`, `Aircraft_type`, `Aircraft_seatconfig`, `Aircraft_age`, `Aircraft_MSN`, `Aircraft_hexcode`, `Aircraft_deliverydate`, `Aircraft_loc`, `Aircraft_engineering_team`, `Aircraft_range`, `Aircraft_lessor_owner`, `Aircraft_airworthy`, `Aircraft_purchaseprice`, `Aircraft_sellingprice`, `Aircraft_route`, `Aircraft_engine`) VALUES
('AP-BID', 'BOEING', '777-300ER', 'C0-W45-Y440', 14.1, 33780, '760924', '2008-03-28', 'ISB', 'A', 7370, 'PIA', 0, 322000000, 300000000, 'ISB-DXB', 'GEN-90'),
('AP-BMX', 'AIRBUS', 'A320', 'C8-Y162', 12, 4392, '7609B8', '2019-11-20', 'KHI', 'B', 3300, 'ALAFCO', 1, 122000000, 0, 'KHI-ISB', 'CFM-56');

-- --------------------------------------------------------
--
-- Table structure for table `bulletins`
--
create table bulletins(id int auto_increment primary key, Manufacturer varchar(30) not null
, type varchar(25) not null, imptill date, details varchar(150));

--
-- Dumping data for table `bulletins`
--
insert into bulletins(Manufacturer,type,imptill,details) values(
"Boeing","777","2022-06-23","https://www.federalregister.gov/documents/2022/03/11/2022-05309/airworthiness-dir
ectives-the-boeing-company-airplanes");

--
-- Table structure for table `CV's`
--
create table cv(id int primary key auto_increment, fname varchar(50)not null ,
lname varchar(50), email varchar(150) not null );


--
-- Table structure for table `aircraft_accounts`
--

CREATE TABLE `aircraft_accounts` (
  `aircraft_account_number` int(11) NOT NULL,
  `aircraft_account_balance` int(11) NOT NULL,
  `aircraft_account_owner` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aircraft_accounts`
--

INSERT INTO `aircraft_accounts` (`aircraft_account_number`, `aircraft_account_balance`, `aircraft_account_owner`) VALUES
(5147825, 120000000, 'PIA'),
(5542368, 10000000, 'PIA'),
(7854252, 82000000, 'PIA');

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `Airport_code` varchar(3) NOT NULL,
  `airport_name` varchar(75) DEFAULT NULL,
  `airport_runways` int(11) DEFAULT NULL,
  `airport_handling_charges` int(11) DEFAULT NULL,
  `airport_location` varchar(35) DEFAULT NULL,
  `ILS_availability` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`Airport_code`, `airport_name`, `airport_runways`, `airport_handling_charges`, `airport_location`, `ILS_availability`) VALUES
('ABF', 'asd', 3, 1700, 'Pakistan', 1),
('ISB', 'ISLAMABAD INT\'L AIRPORT', 2, 1900, 'ISLAMABAD, ICT', 1),
('KDU', 'SKARDU INT\'L AIRPORT', 2, 900, 'SKARDU, GB', 0),
('KHI', 'JINNAH INT\'L AIRPORT', 1, 2100, 'KARACHI', 1),
('LHE', 'ALLAMA IQBAL INTL\'L AIRPORT', 1, 2000, 'LAHORE', 1),
('UET', 'QUETTA INT\'L AIRPORT', 1, 900, 'KARACHI', 0);

-- --------------------------------------------------------

--
-- Table structure for table `check_booking`
--

CREATE TABLE `check_booking` (
  `maintainance_facility_id` int(11) NOT NULL,
  `Aircraft_registration` varchar(10) DEFAULT NULL,
  `check_stardate` date NOT NULL,
  `check_enddate` date NOT NULL,
  `check_type` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `check_booking`
--

INSERT INTO `check_booking` (`maintainance_facility_id`, `Aircraft_registration`, `check_stardate`, `check_enddate`, `check_type`) VALUES
(1, 'AP-BID', '2022-01-17', '2022-07-28', 'C'),
(3, 'AP-BMX', '2022-04-20', '2022-06-24', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `engineering_team`
--

CREATE TABLE `engineering_team` (
  `engineering_team_id` char(1) NOT NULL,
  `engineering_check_capability` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `engineering_team`
--

INSERT INTO `engineering_team` (`engineering_team_id`, `engineering_check_capability`) VALUES
('A', 'B'),
('B', 'B'),
('C', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `engineers`
--

CREATE TABLE `engineers` (
  `Engineers_id` int(11) NOT NULL,
  `engineers_Fname` varchar(35) NOT NULL,
  `engineers_Lname` varchar(45) DEFAULT NULL,
  `engineers_address` varchar(45) DEFAULT NULL,
  `engineers_CNIC` varchar(16) NOT NULL,
  `engineers_salary` int(11) DEFAULT NULL,
  `engineers_DOB` date DEFAULT NULL,
  `engineering_team_id` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `engineers`
--

INSERT INTO `engineers` (`Engineers_id`, `engineers_Fname`, `engineers_Lname`, `engineers_address`, `engineers_CNIC`, `engineers_salary`, `engineers_DOB`, `engineering_team_id`) VALUES
(1, 'Asif', 'Ali', 'H.no 275 , street 6, G-10, Islamabad', '15105-1382954-9', 88000, '1995-06-26', 'A'),
(2, 'Ghazan', 'khan', 'House 112 Islamabad', '13492-5629304-1', 90000, '1996-06-20', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `fuel_lot_id` int(11) NOT NULL,
  `fuel_pricepergallon` float NOT NULL,
  `fuel_quantity` int(11) NOT NULL,
  `fuel_totalprice` int(11) NOT NULL,
  `fuel_companies_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`fuel_lot_id`, `fuel_pricepergallon`, `fuel_quantity`, `fuel_totalprice`, `fuel_companies_id`) VALUES
(1, 3.52, 1421, 4311, 1),
(2, 3.2, 2000, 6400, 3),
(3, 3.25, 2500, 8125, 1),
(4, 3.17, 3100, 9827, 5),
(5, 3.28, 1200, 3936, 4);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_companies`
--

CREATE TABLE `fuel_companies` (
  `fuel_companies_id` int(11) NOT NULL,
  `fuel_companies_name` varchar(45) DEFAULT NULL,
  `fuel_companies_location` varchar(25) NOT NULL,
  `fuel_companies_overdueamount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuel_companies`
--

INSERT INTO `fuel_companies` (`fuel_companies_id`, `fuel_companies_name`, `fuel_companies_location`, `fuel_companies_overdueamount`) VALUES
(1, 'PSO', 'Karachi, Pakistan', 2000000),
(2, 'Kerosine Colonial', 'Moskow, Russia', 1000000),
(3, 'Aramco', 'Dharan, Saudi Arabia', 12000000),
(4, 'Exxon Mobil', 'Irving,TX', 850000),
(5, 'LESTER B. PEARSON \nINTERNATIONAL', 'Torronto, Canada', 8000000);

-- --------------------------------------------------------

--
-- Table structure for table `lessor_owners`
--

CREATE TABLE `lessor_owners` (
  `lessor_name` varchar(40) NOT NULL,
  `lessor_loaction` varchar(45) DEFAULT NULL,
  `lessor_outstadingamount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessor_owners`
--

INSERT INTO `lessor_owners` (`lessor_name`, `lessor_loaction`, `lessor_outstadingamount`) VALUES
('AERCAP', 'CINNCINATI,USA', 12000000),
('ALAFCO', 'KUWAIT', 3000000),
('GECAS', 'DUBLIN, IRELAND', 1200000),
('Macquarie Airfinance', 'DUBLIN, IRELAND', 6000000),
('PIA', 'KARACHI', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`) VALUES
(1, 'hamzaqureshi16', 'mandalorian2020', 'admin'),
(2, 'john', 'john12', 'user'),
(3, 'Asif', 'asif12', 'engineer'),
(4, 'Ghazan', 'ghazan12', 'engineer');

-- --------------------------------------------------------

--
-- Table structure for table `maintaincefacilty`
--

CREATE TABLE `maintaincefacilty` (
  `maintainance_facility_id` int(11) NOT NULL DEFAULT 1,
  `maintanance_facility_name` varchar(45) DEFAULT NULL,
  `maintainanace_facility_location` varchar(45) DEFAULT NULL,
  `maintainance_contract_price` int(11) DEFAULT NULL,
  `maintancance_facility_partsvendor` int(11) NOT NULL,
  `next_check_availability` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintaincefacilty`
--

INSERT INTO `maintaincefacilty` (`maintainance_facility_id`, `maintanance_facility_name`, `maintainanace_facility_location`, `maintainance_contract_price`, `maintancance_facility_partsvendor`, `next_check_availability`) VALUES
(1, 'LUFTHANSA TECHKNIK', 'KARACHI', 13000000, 4, '2022-06-28'),
(2, 'TURKISH', 'INSTANBUL', 5000000, 1, '2023-01-20'),
(3, 'SAPS', 'KARACHI', 800000, 4, '2022-05-11'),
(4, 'EMIRATES', 'DUBAI', 22000000, 1, '2023-08-13'),
(5, 'ETIHAD', 'ABU DHABI', 600000, 4, '2022-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_check`
--

CREATE TABLE `maintenance_check` (
  `maintanance_facility_name` text NOT NULL,
  `Aircraft_Registration` varchar(10) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `Maintenance_Type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance_check`
--

INSERT INTO `maintenance_check` (`maintanance_facility_name`, `Aircraft_Registration`, `from_date`, `to_date`, `Maintenance_Type`) VALUES
('TURKISH', 'AP-BMX', '2022-06-26', '2022-06-30', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `orderparts`
--

CREATE TABLE `orderparts` (
  `parts_id` int(11) NOT NULL,
  `engineering_team_id` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderparts`
--

INSERT INTO `orderparts` (`parts_id`, `engineering_team_id`) VALUES
(4, 'C'),
(1, 'A'),
(4, 'B'),
(3, 'B'),
(2, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `order_aircraft`
--

CREATE TABLE `order_aircraft` (
  `order_aircraft_reg` varchar(10) NOT NULL,
  `order_aircraft_config` varchar(35) DEFAULT NULL,
  `order_aircraft_manufacturer` varchar(35) DEFAULT NULL,
  `order_aircraft_maxage` float DEFAULT NULL,
  `order_aircraft_from` varchar(40) DEFAULT NULL,
  `order_aircraft_budget` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_aircraft`
--

INSERT INTO `order_aircraft` (`order_aircraft_reg`, `order_aircraft_config`, `order_aircraft_manufacturer`, `order_aircraft_maxage`, `order_aircraft_from`, `order_aircraft_budget`) VALUES
('AP-BJT', 'C40-W100-Y200', 'BOEING', 15, 'ALAFCO', 310000000),
('AP-BMZ', 'C0-W120-Y410', 'BOEING', 15, 'AERCAP', 344000000),
('AP-BOB', 'C0-W0-Y200', 'AIRBUS', 15, 'GECAS', 150000000),
('AP-BOE', 'C0-W30-Y160', 'AIRBUS', 15, 'AERCAP', 200000000),
('AP-RDR', 'C12-W0-Y0', 'BOMBARDIER', 15, 'GECAS', 66000000);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `part_id` int(11) NOT NULL,
  `part_name` varchar(45) DEFAULT NULL,
  `part_price` int(11) NOT NULL,
  `part_manufacturer` varchar(35) DEFAULT NULL,
  `part_vendor_id` int(11) NOT NULL,
  `part_aircraft_type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`part_id`, `part_name`, `part_price`, `part_manufacturer`, `part_vendor_id`, `part_aircraft_type`) VALUES
(1, 'RADOME', 120000, 'BAE', 1, '777-300ER'),
(2, 'WINGLETS', 97000, 'AIRBUS', 4, 'A350'),
(3, 'BRAKING PAD', 91000, 'NASCO', 4, 'A320'),
(4, 'ENGINE BLADE', 79000, 'BOEING', 1, '787-8');

-- --------------------------------------------------------

--
-- Table structure for table `part_vendors`
--

CREATE TABLE `part_vendors` (
  `part_vendor_id` int(11) NOT NULL,
  `part_vendor_name` varchar(45) DEFAULT NULL,
  `part_vendor_loc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `part_vendors`
--

INSERT INTO `part_vendors` (`part_vendor_id`, `part_vendor_name`, `part_vendor_loc`) VALUES
(1, 'BOEING', 'SEATTLE'),
(2, 'EMRAER', 'BRASILIA'),
(3, 'BOMBARDIER', 'MONTREAL'),
(4, 'AIRBUS', 'TOLOUSE'),
(5, 'CAC', 'CHENGDU');

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `q_id` int(11) NOT NULL,
  `organization_name` varchar(50) DEFAULT NULL,
  `fleet_size` int(11) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `submission_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`q_id`, `organization_name`, `fleet_size`, `budget`, `submission_date`) VALUES
(1, 'emirates', 44, 65000, '2022-06-13'),
(2, 'hamza airlines', 44, 500000, '2022-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `route_name` varchar(7) NOT NULL,
  `route_distance` int(11) NOT NULL,
  `route_time` time DEFAULT NULL,
  `route_reqfuel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`route_name`, `route_distance`, `route_time`, `route_reqfuel`) VALUES
('ISB-DXB', 5001, '04:12:00', 400),
('KHI-ISB', 596, '02:00:00', 3787),
('KHI-UET', 435, '01:20:00', 2500),
('LHE-YYZ', 6085, '13:15:00', 20020);


--
-- creating views
--


--
-- Indexes for dumped tables
--
create view userview as select Aircraft_registration,Aircraft_manufacturer, Aircraft_type, Aircraft_age,Aircraft_sellingprice from aircraft;
create view userengineer as select engineers_Fname, engineers_Lname, engineering_team_id from engineers;

--
-- Indexes for table `aircraft`
--
ALTER TABLE `aircraft`
  ADD PRIMARY KEY (`Aircraft_registration`),
  ADD KEY `eng_team` (`Aircraft_engineering_team`),
  ADD KEY `lessor_owner` (`Aircraft_lessor_owner`),
  ADD KEY `loc` (`Aircraft_loc`),
  ADD KEY `route` (`Aircraft_route`);

--
-- Indexes for table `aircraft_accounts`
--
ALTER TABLE `aircraft_accounts`
  ADD PRIMARY KEY (`aircraft_account_number`);

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`Airport_code`);

--
-- Indexes for table `check_booking`
--
ALTER TABLE `check_booking`
  ADD PRIMARY KEY (`maintainance_facility_id`),
  ADD KEY `aircraft` (`Aircraft_registration`);

--
-- Indexes for table `engineering_team`
--
ALTER TABLE `engineering_team`
  ADD PRIMARY KEY (`engineering_team_id`);

--
-- Indexes for table `engineers`
--
ALTER TABLE `engineers`
  ADD PRIMARY KEY (`Engineers_id`),
  ADD KEY `egnineering_team` (`engineering_team_id`);

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`fuel_lot_id`),
  ADD KEY `company_id` (`fuel_companies_id`);

--
-- Indexes for table `fuel_companies`
--
ALTER TABLE `fuel_companies`
  ADD PRIMARY KEY (`fuel_companies_id`);

--
-- Indexes for table `lessor_owners`
--
ALTER TABLE `lessor_owners`
  ADD PRIMARY KEY (`lessor_name`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintaincefacilty`
--
ALTER TABLE `maintaincefacilty`
  ADD PRIMARY KEY (`maintainance_facility_id`),
  ADD KEY `vendor` (`maintancance_facility_partsvendor`);

--
-- Indexes for table `maintenance_check`
--
ALTER TABLE `maintenance_check`
  ADD KEY `Aircraft_Registration` (`Aircraft_Registration`);

--
-- Indexes for table `orderparts`
--
ALTER TABLE `orderparts`
  ADD KEY `partid` (`parts_id`),
  ADD KEY `team_id` (`engineering_team_id`);

--
-- Indexes for table `order_aircraft`
--
ALTER TABLE `order_aircraft`
  ADD PRIMARY KEY (`order_aircraft_reg`),
  ADD KEY `lessor` (`order_aircraft_from`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`part_id`),
  ADD KEY `vendorid` (`part_vendor_id`);

--
-- Indexes for table `part_vendors`
--
ALTER TABLE `part_vendors`
  ADD PRIMARY KEY (`part_vendor_id`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`route_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `engineers`
--
ALTER TABLE `engineers`
  MODIFY `Engineers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `fuel_lot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fuel_companies`
--
ALTER TABLE `fuel_companies`
  MODIFY `fuel_companies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aircraft`
--
ALTER TABLE `aircraft`
  ADD CONSTRAINT `eng_team` FOREIGN KEY (`Aircraft_engineering_team`) REFERENCES `engineering_team` (`engineering_team_id`),
  ADD CONSTRAINT `lessor_owner` FOREIGN KEY (`Aircraft_lessor_owner`) REFERENCES `lessor_owners` (`lessor_name`),
  ADD CONSTRAINT `loc` FOREIGN KEY (`Aircraft_loc`) REFERENCES `airports` (`Airport_code`),
  ADD CONSTRAINT `route` FOREIGN KEY (`Aircraft_route`) REFERENCES `routes` (`route_name`);

--
-- Constraints for table `check_booking`
--
ALTER TABLE `check_booking`
  ADD CONSTRAINT `aircraft` FOREIGN KEY (`Aircraft_registration`) REFERENCES `aircraft` (`Aircraft_registration`),
  ADD CONSTRAINT `facility` FOREIGN KEY (`maintainance_facility_id`) REFERENCES `maintaincefacilty` (`maintainance_facility_id`);

--
-- Constraints for table `engineers`
--
ALTER TABLE `engineers`
  ADD CONSTRAINT `egnineering_team` FOREIGN KEY (`engineering_team_id`) REFERENCES `engineering_team` (`engineering_team_id`);

--
-- Constraints for table `fuel`
--
ALTER TABLE `fuel`
  ADD CONSTRAINT `company_id` FOREIGN KEY (`fuel_companies_id`) REFERENCES `fuel_companies` (`fuel_companies_id`);

--
-- Constraints for table `maintaincefacilty`
--
ALTER TABLE `maintaincefacilty`
  ADD CONSTRAINT `vendor` FOREIGN KEY (`maintancance_facility_partsvendor`) REFERENCES `part_vendors` (`part_vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintenance_check`
--
ALTER TABLE `maintenance_check`
  ADD CONSTRAINT `maintenance_check_ibfk_1` FOREIGN KEY (`Aircraft_Registration`) REFERENCES `aircraft` (`Aircraft_registration`);

--
-- Constraints for table `orderparts`
--
ALTER TABLE `orderparts`
  ADD CONSTRAINT `partid` FOREIGN KEY (`parts_id`) REFERENCES `parts` (`part_id`),
  ADD CONSTRAINT `team_id` FOREIGN KEY (`engineering_team_id`) REFERENCES `engineering_team` (`engineering_team_id`);

--
-- Constraints for table `order_aircraft`
--
ALTER TABLE `order_aircraft`
  ADD CONSTRAINT `lessor` FOREIGN KEY (`order_aircraft_from`) REFERENCES `lessor_owners` (`lessor_name`);

--
-- Constraints for table `parts`
--
ALTER TABLE `parts`
  ADD CONSTRAINT `vendorid` FOREIGN KEY (`part_vendor_id`) REFERENCES `part_vendors` (`part_vendor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
