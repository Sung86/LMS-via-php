use DB2;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DB2`
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
  `imageLink` varchar(2083) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`BookID`, `authorName`, `bookName`, `publisherName`, `bookGenre`, `imageLink`) VALUES
(1, 'Dale Carnegie', 'How to win friends and influence people', 'Simon, Schuster', 'Education', 'https://b-ok.cc/covers/books/cc/df/f3/ccdff34cff5d07c2e340a403ef26ab34.jpg'),
(2, 'Napoleon Hill', 'Think and Grow Rich', 'The Million Dollar Bookshelf', 'Jurisprudence, Law', 'https://b-ok.cc/covers/books/d4/c1/05/d4c1051abc09fa5a46851f613fbe0894.jpg'),
(3, 'Bert Dodson', 'Keys to drawing', 'North Light', 'Art, Graphic Arts', 'https://b-ok.cc/covers/books/05/2d/f4/052df4e4a0a7f28be04780457b0a0dbb.jpg'),
(4, 'David J. Schwartz', 'The Magic of Thinking Big', 'Simon, Schuster', 'Psychology', 'https://b-ok.cc/covers/books/68/90/f2/6890f21a75d476ef281c8aa42f593c6f.jpg'),
(5, 'Mantak Chia, Michael Winn', 'Taoist Secrets of Love: Cultivating Male Sexual Energy', 'Aurora Press', 'Psychology, Love, erotic', 'https://b-ok.cc/covers/books/eb/d3/2f/ebd32ff942a512f8a9c676dba7c06926.jpg'),
(6, 'Roland Barthes, Annette Lavers', 'Mythologies', 'The Noonday Press', 'Literature, Folklore', 'https://b-ok.cc/covers/books/fd/fd/f7/fdfdf765dc151b05499e8789c37d6fbc.jpg'),
(7, 'George Lakoff, Mark Johnson', 'Metaphors We Live By', 'The University of Chicago', 'History', 'https://b-ok.cc/covers/books/f3/f8/b2/f3f8b2927dd6b604cf3675cf4a47f802.jpg'),
(8, 'Michel Foucault, Paul Rabinow', 'The Foucault Reader', 'Pantheon Books', 'Social Sciences, Philosophy', 'https://b-ok.cc/covers/books/41/65/36/41653617d6e4d2ed8bb46cbd1e6f33c1.jpg'),
(9, 'Walter Rudin', 'Solutions Manual to Principles of Mathematical Analysis', 'University of Vermont', 'Mathematics, Analysis', 'http://93.174.95.29/covers/1196000/e1d24a0d164f7355c94aae858551bef9-g.jpg'),
(10, 'J. C. Cirlot', 'Dictionary of Symbols', 'Taylor & Francis e-Library', 'Education, Encyclopedia', 'https://b-ok.cc/covers/books/27/8d/6e/278d6ec6d122b0bb38625c5fbf9a6368.jpg'),
(11, 'Dr. Seuss', 'Oh, the Places You''ll Go!', 'Random House', 'Literature, Children', 'https://b-ok.cc/covers/books/fc/3a/32/fc3a328004587e2bcc60bf542af8caeb.jpg'),
(12, 'Donald A. McGavran, C. Peter Wagner', 'Understanding Church Growth', 'Wm. B. Eerdmans Publishing Co.', 'Religion', 'https://b-ok.cc/covers/books/81/fc/4b/81fc4b27b8ebf986a725ef16daf6f139.jpg'),
(13, 'Robert Anton Wilson', 'The Book Of The Breast', 'Playboy Press', 'Psychology, Love, erotic', 'https://b-ok.cc/covers/books/2e/34/36/2e3436a51d8188a61c3abaf27a176205.jpg'),
(14, 'Roald Dahl', 'Matilda', 'Penguin Group', 'Literature, Children', 'https://b-ok.cc/covers/books/eb/0f/ba/eb0fba35b349129905fa1d39dbff8cd1.jpg'),
(15, 'Kenneth H. Blanchard, Spencer Johnson', 'The One Minute Manager', 'The Berkley Publishing Group', 'Business, Management', 'https://b-ok.cc/covers/books/4a/f0/8c/4af08c822a10d31f283c5a7b242a86ed.jpg'),
(16, 'Edward R. Tufte', 'Envisioning Information', 'Graphics Press', 'Computers', 'https://b-ok.cc/covers/books/66/91/f5/6691f5d43c15daa5f5726cf7546daf0c.jpg'),
(17, 'Neil W. Ashcroft, N. David Mermin', 'Solid State Physics', 'Harcourt College', 'Physics', 'https://b-ok.cc/covers/books/a6/2f/29/a62f295aec9b25bcce1cdb31571f3ea5.jpg'),
(18, 'M. Manus', 'Piano chord dictionary', 'Alfred', 'Linguistics, Dictionaries', 'https://b-ok.cc/covers/books/b1/27/47/b12747b56bd9da4684a1d1594a6ee451.jpg'),
(19, 'Women, fire, and dangerous things', 'George Lakoff', 'The University of Chicago', 'Linguistics', 'https://b-ok.cc/covers/books/81/0a/d7/810ad76ee9a877dcb3588021792fb16b.jpg'),
(20, 'C.S. Lewis', 'The Four Loves', 'Helen Joy Lewis', 'Religion, Orthodoxy', 'https://b-ok.cc/covers/books/7c/5d/f7/7c5df79eccb723128c4fbb8c4519fb19.jpg');

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
