-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 04:22 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `idAppointment` int(11) NOT NULL,
  `idUser` int(20) NOT NULL,
  `idService` int(20) NOT NULL,
  `idItem` int(5) DEFAULT 100,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `idMechanic` int(10) NOT NULL DEFAULT 100,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`idAppointment`, `idUser`, `idService`, `idItem`, `date`, `status`, `idMechanic`, `total`) VALUES
(13, 24, 2, 0, '2019-01-26', '', 0, 0),
(14, 29, 3, 0, '2019-01-24', '', 0, 0),
(15, 24, 3, 7, '2019-01-30', 'In Service', 0, 0),
(16, 24, 1, 0, '0000-00-00', '', 0, 0),
(17, 30, 2, 0, '2019-01-31', 'Collected', 0, 0),
(18, 31, 2, NULL, '2019-01-26', 'booked', 0, 0),
(19, 32, 2, 0, '2019-01-30', 'booked', 0, 0),
(20, 33, 3, 27, '2019-01-30', 'Collected', 0, 0),
(21, 27, 3, 28, '2019-01-26', 'In Service', 0, 0),
(22, 24, 3, 1, '2019-01-31', 'Collected', 0, 0),
(23, 34, 3, 100, '2019-01-31', 'Unrepairable', 0, 0),
(24, 35, 1, 100, '2019-01-24', 'booked', 0, 0),
(25, 36, 3, 29, '2019-01-31', 'In Service', 4, 0),
(26, 36, 3, 29, '2020-01-02', 'booked', 100, 0),
(27, 24, 2, 30, '2020-08-02', 'Fixed', 3, 0),
(31, 24, 1, 100, '2020-06-03', 'booked', 100, 0),
(69, 24, 2, 100, '2019-12-02', 'Fixed', 100, 0),
(70, 24, 2, 100, '2019-12-02', 'booked', 2, 0),
(81, 24, 2, 25, '2020-02-15', 'booked', 9, 0),
(82, 24, 2, 28, '2020-02-15', 'booked', 4, 0),
(83, 24, 2, 29, '1970-01-01', 'booked', 100, 0),
(84, 24, 2, 27, '2020-02-28', 'booked', 7, 0),
(85, 24, 2, 28, '2020-02-22', 'booked', 7, 0),
(86, 37, 3, 25, '2020-02-22', 'booked', 3, 0),
(87, 37, 2, 30, '2020-02-29', 'booked', 6, 0),
(88, 38, 2, 28, '2020-02-29', 'In Service', 6, 0),
(89, 26, 2, 100, '2020-02-29', 'booked', 100, 0),
(90, 39, 2, 100, '2020-02-28', 'booked', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `idInvoice` int(11) NOT NULL,
  `idUser` int(15) NOT NULL,
  `idService` int(15) NOT NULL,
  `idAppointment` int(15) NOT NULL,
  `idItem` int(10) NOT NULL,
  `dateInvoice` date NOT NULL,
  `total` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`idInvoice`, `idUser`, `idService`, `idAppointment`, `idItem`, `dateInvoice`, `total`) VALUES
(1, 20, 3, 25, 10, '0000-00-00', 0),
(2, 123, 123, 123, 123, '0000-00-00', 0),
(3, 12, 321, 123, 321, '0000-00-00', 0),
(4, 12, 321, 123, 321, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `idItem` int(11) NOT NULL,
  `descriptionItem` varchar(20) NOT NULL,
  `costItem` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`idItem`, `descriptionItem`, `costItem`) VALUES
(1, 'Oil Filter', '1'),
(2, 'Air Filter', '2'),
(5, 'fuel filter', '3'),
(6, 'Engine Oil ', '4'),
(9, 'shock abosrbers', '5'),
(10, 'coil springs', '6'),
(14, 'power sterring pump', '7'),
(23, 'side rods', '6'),
(24, 'Anti roll bars', '7'),
(25, 'suspension arm', '8'),
(26, 'wheel bearing ', '9'),
(27, 'Headlights', '200'),
(28, 'rear fog lights', '100'),
(29, 'Washer hose valves', '15'),
(30, 'Wiper Blades', '16'),
(31, 'Wing mirrors', '17'),
(32, 'Headlight bulbs', '18'),
(33, 'Clutch Kit', '16'),
(34, 'Cv boots', '17'),
(35, ' Drive Shafts', '18'),
(36, 'Glow Plug', '19'),
(37, 'Spark Plugs', '20'),
(38, 'Ignition Coil', '21'),
(39, 'Timing Belts', '22'),
(40, 'Drive Belt', '21'),
(41, 'Timing Belt Kit', '22'),
(42, 'Electric Window Swit', '23'),
(43, 'Steering Locks', '24'),
(44, 'Fuel Tank Caps,', '25'),
(45, 'Boot Struts', '26'),
(46, 'Bonnet Gas Strut', '27'),
(47, 'Door Handles', '24'),
(48, 'Exhaust End Silencer', '25'),
(49, 'Exhaust Pipes', '26'),
(50, 'Catalytic Converter', '27'),
(51, 'Particulate Filter', '28'),
(52, 'EGR Valve', '29'),
(53, 'Alternator,', '30'),
(54, 'Horn', '31'),
(55, 'Water Pump', '32'),
(56, 'Coolant Expansion Ta', '33'),
(57, 'Car Radiator', '41'),
(58, 'Radiator Fan', '42'),
(59, 'Thermostat Housing', '43'),
(60, 'Coolant Thermostats ', '44'),
(61, 'Cabin Suction Fan', '45'),
(62, 'Car Heaters,', '46'),
(63, 'Air Conditioning Com', '47'),
(100, 'empty', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mechanic`
--

CREATE TABLE `mechanic` (
  `idMechanic` int(11) NOT NULL,
  `nameMechanic` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mechanic`
--

INSERT INTO `mechanic` (`idMechanic`, `nameMechanic`) VALUES
(1, 'Manuel'),
(2, 'Gabriel'),
(3, 'Edmundo'),
(4, 'Felix'),
(5, 'Letizia Cluely'),
(6, 'Idalia Coning'),
(7, 'Kellen Conyers'),
(8, 'Maria Inglesent'),
(9, 'Jamie Aireton'),
(100, 'empty');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `IdService` int(11) NOT NULL,
  `typeService` varchar(20) NOT NULL,
  `price` int(5) NOT NULL,
  `value` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`IdService`, `typeService`, `price`, `value`) VALUES
(1, 'Annual Service', 200, 1),
(2, 'Major Service', 300, 2),
(3, 'Repair', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nameU` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `passwordU` varchar(50) DEFAULT NULL,
  `licence` varchar(20) NOT NULL,
  `vehicleModel` varchar(20) NOT NULL,
  `vehicleEngine` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `email`, `nameU`, `phone`, `passwordU`, `licence`, `vehicleModel`, `vehicleEngine`) VALUES
(24, 'edyrockets@gmail.com', 'felix', '83283823', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'xj1234', 'nissan tsuru', 'Diesel'),
(26, 'iky@gmail.com', 'iky', '123456789', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1234', 'nissan tsuru', 'Diesel'),
(27, 'felix@gmail.com', 'felix', '0838258519', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '12345678', 'SEAT LEON', 'Petrol'),
(28, 'alonso@gmail.com', 'alonso', '12345678', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '123456', 'SEAT LEON', 'Petrol'),
(29, 'felixedmundo@gmail.com', 'felix', '123456', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '123456', 'VW GOLF', 'Diesel'),
(30, 'higuera@gmail.com', 'higuera', '123456', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '123456', 'VW TOURAN', 'Petrol'),
(31, 'puiyee@gmail.com', 'puiyee', '12345678', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '12345678', 'AUDI A6, S6, RS6', 'Diesel'),
(32, 'dario@gmail.com', 'dario', '123456', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1234567', 'MERCEDES E-CLASS', 'Petrol'),
(33, 'ali@gmail.com', 'ali', '12345678', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1234156', 'OPEL MOKKA', 'Diesel'),
(34, 'francisco@gmail.com', 'francisco', '12345678', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '12345678', 'BMW 3 Series', 'Petrol'),
(35, 'refugio@gmail.com', 'refugio', '123456', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '123', 'VW GOLF', 'Diesel'),
(36, 'mauricio@gmail.com', 'mauricio', '123456', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'xj12345', 'nissan tsuru', 'Diesel'),
(37, 'grace@gmail.com', 'grace', '12345678', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'xj12345', 'nissan tsuru', 'Diesel'),
(38, 'blanca@gmail.com', 'blanca', '123456', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'xj12345', 'Leon', 'Petrol'),
(39, 'ana@gmail.com', 'ana', '12345678', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '123456', 'OPEL CORSA', 'Petrol');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`idAppointment`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`idInvoice`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`idItem`);

--
-- Indexes for table `mechanic`
--
ALTER TABLE `mechanic`
  ADD PRIMARY KEY (`idMechanic`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`IdService`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `idAppointment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `idInvoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `idItem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `mechanic`
--
ALTER TABLE `mechanic`
  MODIFY `idMechanic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `IdService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
