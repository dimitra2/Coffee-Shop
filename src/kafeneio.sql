-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 14 Σεπ 2018 στις 13:45:24
-- Έκδοση διακομιστή: 5.7.14
-- Έκδοση PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `kafeneio`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=greek;

--
-- Άδειασμα δεδομένων του πίνακα `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('adm', 'adm');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `client`
--

CREATE TABLE `client` (
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kwd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=greek;

--
-- Άδειασμα δεδομένων του πίνακα `client`
--

INSERT INTO `client` (`username`, `password`, `name`, `email`, `address`, `phone`, `kwd`) VALUES
('user', '123', 'Σάκης Παυλάτος', 'user@gmail.com', 'Βότση 62,Πάτρα', '2610271711', 1),
('acac', 'acac', 'acac', 'acac@yahoo.com', 'Κανακάρη 230', '6977233212', 2),
('kvrv', 'ncv', 'vjr', 'vjr', 'jbcv', '584', 3),
('ejkbv', 'vbej', 'bekj', 'jvbk', 'bvekj', '855', 4);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `deliv`
--

CREATE TABLE `deliv` (
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kwd` int(128) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `account` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AMKA` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AFM` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `current_adr` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profit` float NOT NULL,
  `time_1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `distance` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=greek;

--
-- Άδειασμα δεδομένων του πίνακα `deliv`
--

INSERT INTO `deliv` (`username`, `password`, `kwd`, `name`, `account`, `AMKA`, `AFM`, `current_adr`, `profit`, `time_1`, `distance`) VALUES
('deliv', 'deliv', 1, 'Ορέστης Μακρής', 'GR4378695142132147896669000', '45142453653', '1425784512', 'Κανακάρη 253, Πάτρα, Ελλάδα', 2.5853, '1536932252', '0');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `efood`
--

CREATE TABLE `efood` (
  `id` int(128) NOT NULL,
  `ell` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `esp` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cap` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fra` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fil` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tir` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xort` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tos` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kou` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kei` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kwd_kat` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `money` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=greek;

--
-- Άδειασμα δεδομένων του πίνακα `efood`
--

INSERT INTO `efood` (`id`, `ell`, `esp`, `cap`, `fra`, `fil`, `tir`, `xort`, `tos`, `kou`, `kei`, `address`, `state`, `kwd_kat`, `money`) VALUES
(1, ' 0', ' 0', ' 0', '1', ' 0', '1', ' 0', ' 0', ' 0', ' 0', 'Θρασύβουλου Τσατσά, Μονοδένδρι, Ελλάδα', 'on_its_way', '1', 3.2),
(2, ' 0', ' 0', ' 0', ' 0', '2', '1', ' 0', ' 0', ' 0', ' 0', 'Κανακάρη 253, Πάτρα, Ελλάδα', 'delivered', '1', 4.3),
(3, ' 0', '1', '1', ' 0', ' 0', '1', ' 0', ' 0', ' 0', ' 0', 'Κορίνθου 232, Πάτρα, Ελλάδα', 'on_its_way', '2', 4.3),
(4, '1', '1', ' 0', ' 0', ' 0', ' 0', '1', '1', ' 0', ' 0', 'Κανακάρη 222, Πάτρα, Ελλάδα', 'on_its_way', '2', 6.1),
(5, ' 0', ' 0', '2', ' 0', ' 0', ' 0', ' 0', ' 0', ' 0', ' 0', 'Αράτου 44, Πάτρα, Ελλάδα', 'on_its_way', '1', 3),
(6, ' 0', ' 0', '2', ' 0', ' 0', ' 0', ' 0', ' 0', ' 0', ' 0', 'Αράτου 44, Πάτρα, Ελλάδα', 'on_its_way', '1', 3),
(7, ' 0', ' 0', '1', ' 0', ' 0', ' 0', ' 0', '1', '2', ' 0', 'Ελευθερίου Βενιζέλου 35, Πάτρα, Ελλάδα', 'on_its_way', '1', 4.5),
(8, ' 0', ' 0', '1', ' 0', ' 0', ' 0', ' 0', ' 0', '2', ' 0', 'Δημητρίου Βότση 28, Πάτρα, Ελλάδα', 'on_its_way', '1', 2.5),
(13, ' 0', ' 0', ' 0', ' 0', ' 0', ' 0', '4', ' 0', ' 0', ' 0', 'Καψάλη 21, Πάτρα, Ελλάδα', 'on_its_way', '2', 7.2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `tiropita` int(11) NOT NULL,
  `xortopita` int(11) NOT NULL,
  `tost` int(11) NOT NULL,
  `koulouri` int(11) NOT NULL,
  `keik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=greek;

--
-- Άδειασμα δεδομένων του πίνακα `items`
--

INSERT INTO `items` (`id`, `tiropita`, `xortopita`, `tost`, `koulouri`, `keik`) VALUES
(1, 150, 152, 152, 152, 153),
(2, 150, 146, 150, 150, 150);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `katastima`
--

CREATE TABLE `katastima` (
  `kwd` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lng` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tziros` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=greek;

--
-- Άδειασμα δεδομένων του πίνακα `katastima`
--

INSERT INTO `katastima` (`kwd`, `name`, `address`, `lat`, `lng`, `tziros`) VALUES
(1, 'Καφενείο_1', 'Ερμού 63,Πάτρα', '38.246710', '21.736210', 30.1),
(2, 'Καφενείο_2', 'Δημ. Γούναρη 106-116,Πάτρα', '38.241704', '21.736900', 17.6);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `manager`
--

CREATE TABLE `manager` (
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AMKA` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AFM` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kwd` int(11) NOT NULL,
  `kwd_kat` int(11) NOT NULL,
  `Account` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=greek;

--
-- Άδειασμα δεδομένων του πίνακα `manager`
--

INSERT INTO `manager` (`username`, `password`, `name`, `AMKA`, `AFM`, `kwd`, `kwd_kat`, `Account`) VALUES
('man1', 'man1', 'Πηνελόπη Κουτρούμπαλη', '58857447912', '2552255263', 1, 1, 'GR4378695587962147896669853'),
('man2', 'man2', 'Φωκίων Μπαρμασιγάλας', '52524879613', '1234567890', 2, 2, 'GR4378695587962147896658774');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `price`
--

CREATE TABLE `price` (
  `ellinikos` float NOT NULL,
  `espresso` float NOT NULL,
  `cappuccino` float NOT NULL,
  `frape` float NOT NULL,
  `filtrou` float NOT NULL,
  `tiropita` float NOT NULL,
  `xortopita` float NOT NULL,
  `tost` float NOT NULL,
  `koulouri` float NOT NULL,
  `keik` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=greek;

--
-- Άδειασμα δεδομένων του πίνακα `price`
--

INSERT INTO `price` (`ellinikos`, `espresso`, `cappuccino`, `frape`, `filtrou`, `tiropita`, `xortopita`, `tost`, `koulouri`, `keik`) VALUES
(1.2, 1.1, 1.5, 1.5, 1.3, 1.7, 1.8, 2, 0.5, 2);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Ευρετήρια για πίνακα `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`kwd`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Ευρετήρια για πίνακα `deliv`
--
ALTER TABLE `deliv`
  ADD PRIMARY KEY (`kwd`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Ευρετήρια για πίνακα `efood`
--
ALTER TABLE `efood`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `katastima`
--
ALTER TABLE `katastima`
  ADD PRIMARY KEY (`kwd`);

--
-- Ευρετήρια για πίνακα `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`kwd`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Ευρετήρια για πίνακα `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`ellinikos`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `client`
--
ALTER TABLE `client`
  MODIFY `kwd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT για πίνακα `deliv`
--
ALTER TABLE `deliv`
  MODIFY `kwd` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT για πίνακα `efood`
--
ALTER TABLE `efood`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT για πίνακα `katastima`
--
ALTER TABLE `katastima`
  MODIFY `kwd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT για πίνακα `manager`
--
ALTER TABLE `manager`
  MODIFY `kwd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
