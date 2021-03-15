use DB1;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DB1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE IF NOT EXISTS `Book` (
  `BookID` int(5) unsigned NOT NULL,
  `authorName` varchar(100) NOT NULL,
  `bookName` varchar(100) NOT NULL,
  `imageLink` varchar(2083) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`BookID`, `authorName`, `bookName`, `imageLink`) VALUES
(1, 'L. S. B. Leakey', 'Olduvai Gorge 1951-1961 Volume 1 : Fauna and Background', 'https://b-ok.cc/covers/books/c4/db/cb/c4dbcb51dcf83c2f94c521579e68893f.jpg'),
(2, 'Frantz Fanon', 'The Wretched of the Earth', 'https://b-ok.cc/covers/books/d2/a7/d1/d2a7d155578d59565375286ba995a79d.jpg'),
(3, 'Carl G.Jung', 'Man and His Symbols', 'https://b-ok.cc/covers/books/47/2f/0b/472f0b270e61c127d16f9f33d2b072cc.jpg'),
(4, 'Simone de Beauvoir', 'The Second Sex', 'https://b-ok.cc/covers/books/87/b9/8c/87b98cdfddeb01c91adb19e5678df750.jpg'),
(5, 'Joseph Campbell', 'The Masks of God, Vol. 1: Primitive Mythology', 'https://b-ok.cc/covers/books/c5/f2/d9/c5f2d919438e3bd8c0687aa37149db13.jpg'),
(6, 'Friedrich Nietzsche', 'The Will to Power', 'https://b-ok.cc/covers/books/ee/42/7e/ee427e7c8cfe898dc7b3a5826853359f.gif'),
(7, 'Dr. Seuss', 'Green Eggs and Ham', 'https://b-ok.cc/covers/books/75/c2/9c/75c29c215ea04af6ee9260ac01b09f50.jpg'),
(8, 'Max Weber', 'Theory of Social and Economic Organization', 'https://b-ok.cc/covers/books/7f/94/25/7f942584afb720c926fbd65b150e76c7.jpg'),
(9, 'Ralph Waldo. Emerson', 'The Complete Essays and other Writings of Ralph Waldo Emerson', 'https://b-ok.cc/covers/books/a4/d9/ad/a4d9ad96d7016212f3fea8911d3f35b0.jpg'),
(10, 'Robert T. Kiyosaki', 'You Can Choose to be Rich', 'https://b-ok.cc/covers/books/b8/01/f0/b801f0b702df26a66b17ea07679c2406.jpg'),
(11, 'Gabriel Garcia Marquez', 'One Hundred Years of Solitude', 'https://b-ok.cc/covers/books/6e/90/a7/6e90a7577796191b509382463d6bf28a.jpg'),
(12, 'Martin Heidegger', 'Being and time', 'https://b-ok.cc/covers/books/16/bb/6f/16bb6f6ea15d2213b79ec1f8ebd6b29b.jpg'),
(13, 'B.F Skinner', 'Science And Human Behavior', 'https://b-ok.cc/covers/books/d1/49/8d/d1498d0cd2cb443a98b62e01c304651f.jpg'),
(14, 'Noam Chomsky', 'Aspects of the Theory of Syntax', 'https://b-ok.cc/covers/books/37/90/27/379027deff476cd54dd7d140eba9b117.jpg'),
(15, 'Norman Lewis', 'How to Read Better and Faster', 'http://93.174.95.29/covers/2284000/fda6ebb1b27b94ced6effaac648ce712-d.jpg'),
(16, 'Andrew Loomis', 'Figure Drawing for All It''s Worth', 'https://b-ok.cc/covers/books/ed/99/52/ed99521937cc349e128c0508c72eead9.jpg'),
(17, 'Hannah Arendt, Jerome Kohn', 'Between Past and Future', 'https://b-ok.cc/covers/books/46/4e/de/464edeae17593ca28e15edc72f187151.jpg'),
(18, 'Hannah Arendt', 'On violence', 'https://b-ok.cc/covers/books/a4/85/d8/a485d8d62a0796747af3f43b2a594273.jpg'),
(19, 'Neville Goddard', 'The Power of Awareness', 'https://b-ok.cc/covers/books/f9/34/fb/f934fbda5e3b2ce8f24eaa70613a37f3.jpg'),
(20, 'Hart, Liddell', 'Strategy', 'https://b-ok.cc/covers/books/f5/79/fe/f579fe1a5e8d31bbc288ad9318018516.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`BookID`);

ALTER TABLE `Book` 
	ADD FULLTEXT(authorName,bookName);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Book`
--
ALTER TABLE `Book`
  MODIFY `BookID` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
