-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2016 at 01:32 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safeo`
--

-- --------------------------------------------------------

--
-- Table structure for table `sport_met`
--

CREATE TABLE `sport_met` (
  `activity_id` int(11) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `met` float NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sport_met`
--

INSERT INTO `sport_met` (`activity_id`, `activity`, `met`, `category`) VALUES
(1, 'Bicycling', 14, 'bicycling- mountain- uphill'),
(2, 'Bicycling', 16, 'bicycling- mountain- competitive- racing'),
(3, 'Bicycling', 8.5, 'bicycling- mountain- general'),
(4, 'Bicycling', 7.5, 'bicycling- general'),
(5, 'Bicycling', 3.5, 'bicycling- leisure- 5.5 mph'),
(6, 'Bicycling', 6.8, 'bicycling- to/from work- self selected pace'),
(7, 'Bicycling', 5.8, 'bicycling- on dirt or farm road- moderate pace'),
(8, 'Bicycling', 5, 'unicycling'),
(9, 'Running', 5, 'jogging- general'),
(10, 'Running', 6, 'jog/walk combination'),
(11, 'Running', 6, 'Running- 4 mph (13 min/mile)'),
(12, 'Running', 8.3, 'running- 5 mph (12 min/mile)'),
(13, 'Running', 9, 'running- 5.2 mph (11.5 min/mile)'),
(14, 'Running', 9.8, 'running- 6 mph (10 min/mile)'),
(15, 'Running', 10.5, 'running- 6.7 mph (9 min/mile)'),
(16, 'Running', 11, 'running- 7 mph (8.5 min/mile)'),
(17, 'Running', 11.5, 'running- 7.5 mph (8 min/mile)'),
(18, 'Running', 11.8, 'running- 8 mph (7.5 min/mile)'),
(19, 'Running', 12.3, 'running- 8.6 mph (7 min/mile)'),
(20, 'Running', 12.8, 'running- 9 mph (6.5 min/mile)'),
(21, 'Running', 14.5, 'running- 10 mph (6 min/mile)'),
(22, 'Running', 16, 'running- 11 mph (5.5 min/mile)'),
(23, 'Running', 19, 'running- 12 mph (5 min/mile)'),
(24, 'Running', 19.8, 'running- 13 mph (4.6 min/mile)'),
(25, 'Running', 23, 'running- 14 mph (4.3 min/mile)'),
(26, 'Running', 13.3, 'running- marathon'),
(27, 'Running', 15, 'running- stairs- up'),
(28, 'Badminton', 7, 'badminton- competitive'),
(29, 'Badminton', 5.5, 'badminton- social singles and doubles- general'),
(30, 'Basketball', 8, 'basketball- game'),
(31, 'Basketball', 6, 'basketball- non-game- general'),
(32, 'Basketball', 6.5, 'basketball- general'),
(33, 'Basketball', 7, 'basketball- officiating'),
(34, 'Basketball', 4.5, 'basketball- shooting baskets'),
(35, 'Basketball', 7.8, 'basketball- wheelchair'),
(36, 'Bowling', 3, 'bowling'),
(37, 'Bowling', 3.8, 'bowling- indoor- Bowlingalley'),
(38, 'Boxing', 12.8, 'boxing- in ring- general'),
(39, 'Boxing', 5.5, 'boxing- punching bag'),
(40, 'Boxing', 7.8, 'boxing- sparring'),
(41, 'Football', 8, 'football- competitive'),
(42, 'Football', 8, 'football- touch- flag- general'),
(43, 'Football', 4, 'football- touch- flag- light effort'),
(44, 'Football', 2.5, 'Footballor baseball- playing catch'),
(45, 'Golf', 4.8, 'golf- general'),
(46, 'Golf', 4.3, 'golf- walking- carrying clubs'),
(47, 'Handball', 12, 'handball- general'),
(48, 'Handball', 8, 'handball- team'),
(49, 'Hockey', 7.8, 'hockey- field'),
(50, 'Hockey', 8, 'hockey- ice- general'),
(51, 'Hockey', 10, 'hockey- ice- competitive'),
(52, 'Horseback riding', 5.8, 'horseback riding- trotting'),
(53, 'Horseback riding', 7.3, 'horseback riding- canter or gallop'),
(54, 'Horseback riding', 3.8, 'horseback riding-walking'),
(55, 'Horseback riding', 9, 'horseback riding- jumping'),
(56, 'Climbing', 8, 'rock or mountain climbing'),
(57, 'Climbing', 7.5, 'rock climbing- ascending rock- high difficulty'),
(58, 'Climbing', 5.8, 'rock climbing- ascending or traversing rock- low-to-moderate difficulty'),
(59, 'Climbing', 5, 'rock climbing- rappelling'),
(60, 'Rodeo', 4, 'rodeo sports- general- light effort'),
(61, 'Rodeo', 5.5, 'rodeo sports- general- moderate effort'),
(62, 'Rodeo', 7, 'rodeo sports- general- vigorous effort'),
(63, 'Rope jumping', 12.3, 'rope jumping- fast pace- 120-160 skips/min'),
(64, 'Rope jumping', 11.8, 'rope jumping- moderate pace- 100-120 skips/min- general- 2 foot skip- plain bounce'),
(65, 'Rope jumping', 8.8, 'rope jumping- slow pace- < 100 skips/min- 2 foot skip- rhythm bounce'),
(66, 'Rugby', 8.3, 'rugby- union- team- competitive'),
(67, 'Rugby', 6.3, 'rugby- touch- non-competitive'),
(68, 'Skateboarding', 5, 'skateboarding- general- moderate effort'),
(69, 'Skateboarding', 6, 'skateboarding- competitive- vigorous effort'),
(70, 'Rollerblading', 7.5, 'rollerblading- in-line skating- 14.4 km/h (9.0 mph)- recreational pace'),
(71, 'Rollerblading', 9.8, 'rollerblading- in-line skating- 17.7 km/h (11.0 mph)- moderate pace- exercise training'),
(72, 'Rollerblading', 12.3, 'rollerblading- in-line skating- 21.0 to 21.7 km/h (13.0 to 13.6 mph)- fast pace- exercise training'),
(73, 'Rollerblading', 14, 'rollerblading- in-line skating- 24.0 km/h (15.0 mph)- maximal effort'),
(74, 'Scoccer', 10, 'soccer- competitive'),
(75, 'Scoccer', 7, 'soccer- casual- general'),
(76, 'Softball', 5, 'softball or baseball- fast or slow pitch- general'),
(77, 'Softball', 4, 'softball- practice'),
(78, 'Softball', 4, 'softball- officiating'),
(79, 'Softball', 6, 'softball-pitching'),
(80, 'Tai chi', 3, 'tai chi- qi gong- general'),
(81, 'Tai chi', 1.5, 'tai chi- qi gong- sitting- light effort'),
(82, 'Ping Pong ', 4, 'ping pong'),
(83, 'Tennis', 4, 'tennis- general'),
(84, 'Tennis', 6, 'tennis- doubles'),
(85, 'Tennis', 4.5, 'tennis- doubles'),
(86, 'Tennis', 8, 'tennis- singles'),
(87, 'Tennis', 5, 'tennis- hitting balls- non-game play- moderate effort'),
(88, 'Volleyball', 4, 'volleyball'),
(89, 'Volleyball', 6, 'volleyball- competitive- in gymnasium'),
(90, 'Volleyball', 3, 'volleyball- non-competitive- 6 - 9 member team- general'),
(91, 'Volleyball', 8, 'volleyball- beach- in sand'),
(92, 'Walking', 7, 'backpacking'),
(93, 'Walking', 8.3, 'carrying load upstairs- general'),
(94, 'Walking', 5, 'carrying 1 to 15 lb load- upstairs'),
(95, 'Walking', 6, 'carrying 16 to 24 lb load- upstairs'),
(96, 'Walking', 8, 'carrying 25 to 49 lb load- upstairs'),
(97, 'Walking', 10, 'carrying 50 to 74 lb load- upstairs'),
(98, 'Walking', 12, 'carrying > 74 lb load- upstairs'),
(99, 'Walking', 6.3, 'climbing hills- no load'),
(100, 'Walking', 6.5, 'climbing hills with 0 to 9 lb load'),
(101, 'Walking', 7.3, 'climbing hills with 10 to 20 lb load'),
(102, 'Walking', 8.3, 'climbing hills with 21 to 42 lb load'),
(103, 'Walking', 9, 'climbing hills with 42+ lb load'),
(104, 'Walking', 8, 'stair climbing- using or climbing up ladder'),
(105, 'Walking', 4, 'stair climbing- slow pace'),
(106, 'Walking', 8.8, 'stair climbing- fast pace'),
(107, 'Walking', 3, 'Walkingthe dog'),
(108, 'Walking', 3, 'walking- 2.5 mph- level- firm surface'),
(109, 'Walking', 3.3, 'walking- 2.5 mph- downhill'),
(110, 'Walking', 3.5, 'walking- 2.8 to 3.2 mph- level- moderate pace- firm surface'),
(111, 'Walking', 4.3, 'walking- 3.5 mph- level- brisk- firm surface- Walkingfor exercise'),
(112, 'Walking', 5.3, 'walking- 2.9 to 3.5 mph- uphill- 1 to 5% grade'),
(113, 'Walking', 8, 'walking- 2.9 to 3.5 mph- uphill- 6% to 15% grade'),
(114, 'Walking', 5, 'walking- 4.0 mph- level- firm surface- very brisk pace'),
(115, 'Walking', 7, 'walking- 4.5 mph- level- firm surface- very- very brisk'),
(116, 'Walking', 8.3, 'walking- 5.0 mph- level- firm surface'),
(117, 'Walking', 9.8, 'walking- 5.0 mph- uphill- 3% grade'),
(118, 'Walking', 3.5, 'walking- for pleasure- work break'),
(119, 'Walking', 4.8, 'walking- grass track'),
(120, 'Walking', 4.5, 'walking- normal pace- plowed field or sand'),
(121, 'Walking', 4, 'walking- to work or class (Taylor Code 015)'),
(122, 'Walking', 2.5, 'walking- to and from an outhouse'),
(123, 'Walking', 4.8, 'walking- for exercise- 3.5 to 4 mph- with ski poles- Nordic walking- level- moderate pace'),
(124, 'Walking', 9.5, 'walking- for exercise- 5.0 mph- with ski poles- Nordic walking- level- fast pace'),
(125, 'Walking', 6.8, 'walking- for exercise- with ski poles- Nordic walking- uphill'),
(126, 'Walking', 6, 'walking- backwards- 3.5 mph- level'),
(127, 'Walking', 8, 'walking- backwards- 3.5 mph- uphill- 5% grade'),
(128, 'Swimming', 9.8, 'Swimminglaps- freestyle- fast- vigorous effort'),
(129, 'Swimming', 5.8, 'Swimminglaps- freestyle- front crawl- slow- light or moderate effort'),
(130, 'Swimming', 9.5, 'swimming- backstroke- general- training or competition'),
(131, 'Swimming', 4.8, 'swimming- backstroke- recreational'),
(132, 'Swimming', 10.3, 'swimming- breaststroke- general- training or competition'),
(133, 'Swimming', 5.3, 'swimming- breaststroke- recreational'),
(134, 'Swimming', 13.8, 'swimming- butterfly- general'),
(135, 'Swimming', 10, 'swimming- crawl- fast speed- ~75 yards/minute- vigorous effort'),
(136, 'Swimming', 8.3, 'swimming- crawl- medium speed- ~50 yards/minute- vigorous effort'),
(137, 'Swimming', 6, 'swimming- lake- ocean- river'),
(138, 'Swimming', 6, 'swimming- leisurely- not lap swimming- general'),
(139, 'Swimming', 7, 'swimming- sidestroke- general'),
(140, 'Swimming', 8, 'swimming- synchronized'),
(141, 'Swimming', 9.8, 'swimming- treading water- fast- vigorous effort'),
(142, 'Swimming', 3.5, 'swimming- treading water- moderate effort- general'),
(143, 'Skating', 7, 'skating- ice- general'),
(144, 'Skating', 9, 'skating- ice- rapidly- more than 9 mph- not competitive'),
(145, 'Skating', 13.3, 'skating- speed- competitive'),
(146, 'Skiing', 7, 'skiing- general');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sport_met`
--
ALTER TABLE `sport_met`
  ADD PRIMARY KEY (`activity_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sport_met`
--
ALTER TABLE `sport_met`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
