-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Wrz 2021, 16:39
-- Wersja serwera: 10.1.19-MariaDB
-- Wersja PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `stadnina`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nazwa_uzytkownika` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `data_aktualizacji` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`id`, `nazwa_uzytkownika`, `haslo`, `data_aktualizacji`) VALUES
(1, 'admin', 'Chmielowiec.M4', '01-09-2021 08:18:54 AM');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `instruktorzy`
--

CREATE TABLE `instruktorzy` (
  `id` int(11) NOT NULL,
  `specjalizacja` varchar(255) NOT NULL,
  `imie_nazwisko_instruktora` varchar(255) NOT NULL,
  `adres` longtext NOT NULL,
  `cena` int(11) NOT NULL,
  `nr_telefonu` bigint(11) NOT NULL,
  `email_instruktora` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `data_utworzenia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_aktualizacji` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `instruktorzy`
--

INSERT INTO `instruktorzy` (`id`, `specjalizacja`, `imie_nazwisko_instruktora`, `adres`, `cena`, `nr_telefonu`, `email_instruktora`, `haslo`, `data_utworzenia`, `data_aktualizacji`) VALUES
(9, 'DoroÅ›li_', 'Adam Morawski', 'Makowskiego 155, KrakÃ³w', 180, 345234869, 'adam.morawski@gmail.com', '1e0be6294b7870ff0a463fb944eb9ec5', '2021-08-31 14:05:55', ''),
(10, 'Dzieci do lat 13', 'Wojciech Bulka', 'Jaworowa 5, KrakÃ³w', 240, 123234345, 'wojciech.bulka@gmail.com', 'b16135a659c3aa25e98eaa05cf1df5e8', '2021-08-31 14:06:52', ''),
(11, 'MÅ‚odzieÅ¼ 13-15', 'Karolina Marzec', 'Wolbromska 14, WrocÅ‚aw', 230, 984732789, 'karolina.marzec@gmail.com', '2291817f502b5593aa1cbfed867e784c', '2021-08-31 14:08:23', ''),
(12, 'MÅ‚odzieÅ¼ 15-18', 'Karol Olszewski', 'Sobieskiego 12, SkaÅ‚a', 190, 123567234, 'karol.olszewski@gmail.com', '2124d707468f361c86240c38b041bfde', '2021-08-31 14:09:59', ''),
(13, 'Przygotowania do  turniejÃ³w specjalistycznych', 'Aleksandra Bogacka', 'Warszawska 25, Koszalin', 230, 123643289, 'aleksandra.bagacka@gmail.com', '7f58dcfed8818f879673655ad3911fa0', '2021-08-31 14:11:24', ''),
(14, 'Przygotowania do  turniejÃ³w specjalistycznych', 'Zofia Kaszowska', 'Polna 122, Wolbrom', 240, 758432984, 'zofia.kaszowska@gmail.com', 'dc669a3a985b5fdd2f8998df01f5508d', '2021-09-01 06:15:45', '01-09-2021 08:15:45 AM'),
(15, 'DoroÅ›li_', 'Krzysztof Matkowski', 'Lipowa 142, Olkusz', 200, 234123456, 'matkowski.krzysztof@gmail.com', '61703852834cb71553bb52846ecdfd85', '2021-09-01 06:21:43', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kursanci`
--

CREATE TABLE `kursanci` (
  `id` int(11) NOT NULL,
  `imie_nazwisko_kursanta` varchar(255) NOT NULL,
  `adres` longtext NOT NULL,
  `miasto` varchar(255) NOT NULL,
  `plec` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `data_rejestracji` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_aktualizacji` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `kursanci`
--

INSERT INTO `kursanci` (`id`, `imie_nazwisko_kursanta`, `adres`, `miasto`, `plec`, `email`, `haslo`, `data_rejestracji`, `data_aktualizacji`) VALUES
(10, 'Adam Kowalski', 'Makowskiego 12', 'SkaÅ‚a', 'M', 'adam.kowalski@gmail.com', '93f1b848953a8a693afbb7c9e38e4be2', '2021-08-31 14:19:28', ''),
(11, 'Wojciech Zaborski', 'Wiejska 23', 'Wolbrom', 'M', 'wojciech.zaborski@gmail.com', '012eb45714351fdb21beebff1bdceacc', '2021-08-31 14:21:05', ''),
(12, 'Klaudia Morawska', 'SÅ‚oneczna 126', 'KrakÃ³w', 'K', 'klaudia.morawska@gmail.com', '01710bbaa2e8cd6e2a7a53efc4c453b9', '2021-09-01 14:33:38', '01-09-2021 04:33:38 PM');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logi_instruktorow`
--

CREATE TABLE `logi_instruktorow` (
  `id` int(11) NOT NULL,
  `id_instruktora` int(11) NOT NULL,
  `nazwa_uzytkownika` varchar(255) NOT NULL,
  `ip_uzytkownika` binary(16) NOT NULL,
  `data_logowania` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `wylogowanie` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `logi_instruktorow`
--

INSERT INTO `logi_instruktorow` (`id`, `id_instruktora`, `nazwa_uzytkownika`, `ip_uzytkownika`, `data_logowania`, `wylogowanie`, `status`) VALUES
(1, 8, 'gorski@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 09:43:48', '31-08-2021 11:43:48 AM', 1),
(2, 8, 'gorski@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 09:43:55', '', 1),
(3, 0, 'gorski@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 10:32:39', '', 0),
(4, 8, 'gorski@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 10:45:47', '31-08-2021 12:45:47 PM', 1),
(5, 0, 'aleksandra.bogacka@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 14:25:25', '', 0),
(6, 0, 'aleksandra.bogacka@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 14:25:36', '', 0),
(7, 0, 'aleksandra.bogacka@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 14:25:54', '', 0),
(8, 0, 'aleksandra.bogacka@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 14:26:56', '', 0),
(9, 0, 'aleksandra.bogacka@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 14:27:05', '', 0),
(10, 0, 'aleksandra.bogacka@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 14:28:15', '', 0),
(11, 0, 'aleksandra.bogacka@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 14:28:21', '', 0),
(12, 11, 'karolina.marzec@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 14:29:37', '', 1),
(13, 11, 'karolina.marzec@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 14:53:31', '31-08-2021 04:53:31 PM', 1),
(14, 0, 'aleksandra.bogacka@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 15:00:02', '', 0),
(15, 12, 'karol.olszewski@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 15:00:50', '31-08-2021 05:00:50 PM', 1),
(16, 11, 'karolina.marzec@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 17:34:44', '31-08-2021 07:34:44 PM', 1),
(17, 14, 'zofia.kaszowska@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 06:15:52', '01-09-2021 08:15:52 AM', 1),
(18, 14, 'zofia.kaszowska@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 06:17:12', '01-09-2021 08:17:12 AM', 1),
(19, 12, 'karol.olszewski@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 11:41:00', '01-09-2021 01:41:00 PM', 1),
(20, 12, 'karol.olszewski@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 12:58:14', '01-09-2021 02:58:14 PM', 1),
(21, 14, 'zofia.kaszowska@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 14:37:29', '', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logi_kursantow`
--

CREATE TABLE `logi_kursantow` (
  `id` int(11) NOT NULL,
  `id_kursanta` int(11) NOT NULL,
  `nazwa_uzytkownika` varchar(255) NOT NULL,
  `ip_uzytkownika` binary(16) NOT NULL,
  `data_logowania` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `wylogowanie` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `logi_kursantow`
--

INSERT INTO `logi_kursantow` (`id`, `id_kursanta`, `nazwa_uzytkownika`, `ip_uzytkownika`, `data_logowania`, `wylogowanie`, `status`) VALUES
(1, 1, 'dawid@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-29 21:02:55', '', 1),
(2, 2, 'sk@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-29 21:08:40', '', 1),
(3, 3, 'abc@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-29 21:11:25', '', 1),
(4, 4, 'ad@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-29 21:31:20', '', 1),
(5, 0, 'abc@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-30 09:13:32', '', 0),
(6, 5, 'adi@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-30 10:16:27', '', 1),
(7, 6, 'szwed@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-30 12:08:30', '', 1),
(8, 7, 'adiod@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-30 14:35:14', '', 1),
(9, 8, 'franek@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-30 14:47:25', '', 1),
(10, 0, 'dawid.skalski@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 10:47:31', '', 0),
(11, 9, 'dawid.skalski@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 10:47:38', '', 1),
(12, 0, 'dawid.skalski@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 13:27:34', '', 0),
(13, 9, 'dawid.skalski@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 13:27:43', '', 1),
(14, 11, 'wojciech.zaborski@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 14:21:23', '', 1),
(15, 12, 'klaudia.morawska@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 14:23:33', '', 1),
(16, 12, 'klaudia.morawska@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 14:28:42', '', 1),
(17, 12, 'klaudia.morawska@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 14:30:39', '', 1),
(18, 12, 'klaudia.morawska@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 14:58:19', '', 1),
(19, 12, 'klaudia.morawska@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 06:12:59', '', 1),
(20, 12, 'klaudia.morawska@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 06:16:08', '', 1),
(21, 12, 'klaudia.morawska@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 11:39:43', '', 1),
(22, 12, 'klaudia.morawska@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 12:57:26', '', 1),
(23, 12, 'klaudia.morawska@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 14:33:28', '', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacje`
--

CREATE TABLE `rezerwacje` (
  `id` int(11) NOT NULL,
  `specjalizacja_instruktora` varchar(255) NOT NULL,
  `id_instruktora` int(11) NOT NULL,
  `id_kursanta` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `data_rezerwacji` varchar(255) NOT NULL,
  `czas_rezerwacji` varchar(255) NOT NULL,
  `data_rezerwowania` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_kursanta` int(11) NOT NULL,
  `status_instruktora` int(11) NOT NULL,
  `data_aktualizacji` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `rezerwacje`
--

INSERT INTO `rezerwacje` (`id`, `specjalizacja_instruktora`, `id_instruktora`, `id_kursanta`, `cena`, `data_rezerwacji`, `czas_rezerwacji`, `data_rezerwowania`, `status_kursanta`, `status_instruktora`, `data_aktualizacji`) VALUES
(5, 'Przygotowania do  turniejÃ³w specjalistycznych', 13, 12, 230, '2021-09-03', '17:30', '2021-08-31 14:29:15', 0, 1, ''),
(6, 'MÅ‚odzieÅ¼ 13-15', 11, 12, 230, '2021-09-15', '19:30', '2021-08-31 17:33:27', 1, 0, ''),
(7, 'Przygotowania do  turniejÃ³w specjalistycznych', 13, 12, 230, '2021-09-15', '17:00', '2021-09-01 06:42:18', 1, 0, ''),
(8, 'Przygotowania do  turniejÃ³w specjalistycznych', 14, 12, 240, '2021-09-15', '10:30', '2021-09-01 06:15:10', 1, 0, ''),
(9, 'Przygotowania do  turniejÃ³w specjalistycznych', 14, 12, 240, '2021-09-23', '10:30', '2021-09-01 06:16:47', 0, 1, ''),
(10, 'MÅ‚odzieÅ¼ 15-18', 12, 12, 190, '2021-09-23', '17:00', '2021-09-01 11:40:10', 1, 1, ''),
(11, 'Przygotowania do  turniejÃ³w specjalistycznych', 13, 12, 230, '2021-09-23', '17:30', '2021-09-01 14:34:28', 0, 1, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `specjalizacje_instruktorow`
--

CREATE TABLE `specjalizacje_instruktorow` (
  `id` int(11) NOT NULL,
  `specjalizacja` varchar(255) NOT NULL,
  `data_utworzenia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_aktualizacji` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `specjalizacje_instruktorow`
--

INSERT INTO `specjalizacje_instruktorow` (`id`, `specjalizacja`, `data_utworzenia`, `data_aktualizacji`) VALUES
(1, 'Dzieci do lat 13', '2021-08-29 21:18:15', ''),
(2, 'MÅ‚odzieÅ¼ 13-15', '2021-08-29 21:18:32', ''),
(3, 'MÅ‚odzieÅ¼ 15-18', '2021-08-29 21:18:46', ''),
(4, 'DoroÅ›li_', '2021-08-31 14:02:58', '31-08-2021 04:02:58 PM'),
(6, 'Przygotowania do  turniejÃ³w specjalistycznych', '2021-08-31 09:24:52', '31-08-2021 11:24:52 AM'),
(7, 'Przygotowania do  turniejÃ³w dla dzieci', '2021-08-31 14:05:27', '31-08-2021 04:05:27 PM');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instruktorzy`
--
ALTER TABLE `instruktorzy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursanci`
--
ALTER TABLE `kursanci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logi_instruktorow`
--
ALTER TABLE `logi_instruktorow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logi_kursantow`
--
ALTER TABLE `logi_kursantow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specjalizacje_instruktorow`
--
ALTER TABLE `specjalizacje_instruktorow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `instruktorzy`
--
ALTER TABLE `instruktorzy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT dla tabeli `kursanci`
--
ALTER TABLE `kursanci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `logi_instruktorow`
--
ALTER TABLE `logi_instruktorow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT dla tabeli `logi_kursantow`
--
ALTER TABLE `logi_kursantow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT dla tabeli `specjalizacje_instruktorow`
--
ALTER TABLE `specjalizacje_instruktorow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
