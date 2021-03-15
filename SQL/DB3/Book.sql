use DB3;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DB3`
--

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE IF NOT EXISTS `Book` (
  `BookID` int(5) unsigned NOT NULL,
  `authorName` varchar(100) NOT NULL,
  `bookName` varchar(100) NOT NULL,
  `publisherName` varchar(30) NOT NULL,
  `bookGenre` varchar(30) NOT NULL,
  `imageLink` varchar(2083) NOT NULL,
  `onlineLink` varchar(2083) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`BookID`, `authorName`, `bookName`, `publisherName`, `bookGenre`, `imageLink`, `onlineLink`) VALUES
(1, 'Aajonus Vonderplanitz', 'We Want to Live', 'Carnelian Bay Castle Press', 'Life, Diet, Survival', 'http://ecx.images-amazon.com/images/I/617NEJ7DN6L._SY291_BO1,204,203,200_QL40_.jpg', 'https://b-ok.cc/book/3603854/7861df'),
(2, 'Aajonus Vonderplanitz', 'The Recipe for Living Without Disease', 'Carnelian Bay Castle Press', 'Life, Diet, Survival', 'https://images-na.ssl-images-amazon.com/images/I/51E3K7RW7KL._SY291_BO1,204,203,200_QL40_.jpg', 'https://b-ok.cc/book/3404756/e36ccf'),
(3, 'Matherly John', 'The Complete Guide to Shodan', 'Leanpub', 'Computers', 'https://images-na.ssl-images-amazon.com/images/I/513BB3HzVtL._SX342_QL70_.jpg', 'https://b-ok.cc/book/3044425/17951a'),
(4, 'John Adair', 'The Art of Creative Thinking', 'Talbot Adair Press', 'Psychology, Creative Thinking', 'https://b-ok.cc/covers/books/7f/5e/2f/7f5e2f8d04ef54a498c52bae280117c7.jpg', 'https://b-ok.cc/book/831613/7bb12b'),
(5, 'Matthew Allen', 'Smart Thinking', 'Oxford University Press', 'Psychology, Creative Thinking', 'https://b-ok.cc/covers/books/a3/45/9c/a3459c403398638208308d220747d6c5.jpg', 'https://b-ok.cc/book/554686/c08ec0'),
(6, 'Professor Stanley K. Ridgley', 'Strategic Thinking Skills', 'The Great Courses', 'Psychology, Creative Thinking', 'https://b-ok.cc/covers/books/a0/fe/eb/a0feeb20f915e245b643381d0740763f.jpg', 'https://b-ok.cc/book/2827630/28652e'),
(7, 'Brandon Royal', 'The Little Blue Reasoning Book', 'Maven', 'Psychology, Creative Thinking', 'https://b-ok.cc/covers/books/c4/65/d7/c465d7d733e34b31dd9aa8ec975221ba.jpg', 'https://b-ok.cc/book/1209366/d9425b'),
(8, 'DK Publishing', 'How to Be a Genius\r\n', 'Dorling Kindersley', 'Housekeeping, Leisure, Games', 'https://b-ok.cc/covers/books/da/b0/d4/dab0d4ba41d541066731da8039a49e30.jpg', 'https://b-ok.cc/book/1114067/5e08df'),
(9, 'Stella Cottrell', 'Critical Thinking Skills', 'Palgrave Macmillan', 'Philosophy, Critical Thinking', 'https://b-ok.cc/covers/books/7c/1c/bd/7c1cbddab014552e3a14add2d8715c42.jpg', 'https://b-ok.cc/book/833724/cf2d7d'),
(10, 'Robert Johansson', 'Numerical Python', 'Robert Johansson', 'Computers, Programming', 'https://b-ok.cc/covers/books/2f/25/24/2f25249c71ab98c720b019fed27de501.jpg','https://b-ok.cc/book/3649126/4409f0'),
(11, 'Catherine, Dr. Dawson', 'Introduction to Research Methods', 'How To Content', 'Research', 'https://b-ok.cc/covers/books/54/98/16/549816a9bb02de3a67609354774ab788.jpg', 'https://b-ok.cc/book/825729/8cc402'),
(12, 'Tony Buzan', 'Mind maps at work', 'Thorsons', 'Education', 'https://b-ok.cc/covers/books/35/21/db/3521db88dc6794a97479a4295b491242.jpg', 'https://b-ok.cc/book/660258/e53d12'),
(13, 'David J. Pine', 'Introduction to Python for Science and Engineering', 'CRC Press', 'Computers, Software Systems', 'https://b-ok.cc/covers/books/4f/a9/b4/4fa9b456523c1ae35379c7eabd787196.jpg', 'https://b-ok.cc/book/3697912/d54b5b'),
(14, 'Lois B. Hart Ed.D., Charlotte S. Waisman Ph.D.', 'The leadership training activity book', 'AMACOM', 'Technique', 'https://b-ok.cc/covers/books/8f/a1/eb/8fa1ebb7ab4b22b9f702e932b74cf260.jpg', 'https://b-ok.cc/book/461532/80bf99'),
(15, 'Napoleon Hill', 'Napoleon Hill''s Keys to Success', 'Penguin Group', 'Jurisprudence, Law', 'https://b-ok.cc/covers/books/8f/a1/eb/8fa1ebb7ab4b22b9f702e932b74cf260.jpg', 'https://b-ok.cc/book/461532/80bf99'),
(16, 'Angela Burch', 'The A-Z of Correct English', 'How To Books', 'Linguistics', 'https://b-ok.cc/covers/books/dc/59/a6/dc59a6132405d3f46c4dd23b5da8ce06.jpg', 'https://b-ok.cc/book/459456/309fab'),
(17, 'Tom Heehler', 'The Well-Spoken Thesaurus', 'Sourcebooks', 'Linguistics', 'https://b-ok.cc/covers/books/36/bd/43/36bd43feb4322e565ddbd4b0cb691612.jpg', 'https://b-ok.cc/book/1227559/9fc22d'),
(18, 'Steven Pinker', 'How the Mind Works', 'Penguin Group', 'Psychology', 'https://b-ok.cc/covers/books/ea/ec/48/eaec483e77f6943ead5b166cadd27871.jpg', 'https://b-ok.cc/book/511612/2df158'),
(19, 'Stephen R. Covey', 'The 7 habits of highly effective people', 'Franklin Covey', 'Business', 'https://b-ok.cc/covers/books/ca/4d/08/ca4d089f399b51ee944426f06c0bd73c.jpg', 'https://b-ok.cc/book/702081/72919f'),
(20, 'Robert T. Kiyosaki, Sharon L. Lechter', 'Rich Dad, Poor Dad', 'Warner Books Ed', 'Psychology', 'https://b-ok.cc/covers/books/5a/7e/a8/5a7ea83700708d752f40ec3997d37241.jpg', 'https://b-ok.cc/book/737533/30768e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`BookID`);

ALTER TABLE `Book` 
  ADD FULLTEXT(authorName,bookName,publisherName, bookGenre);

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
