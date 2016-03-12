-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2016 at 05:57 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yiieneo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_videos`
--

CREATE TABLE `ad_videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `vid_cat_id` varchar(255) NOT NULL,
  `biz_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_videos`
--

INSERT INTO `ad_videos` (`id`, `title`, `des`, `url`, `vid_cat_id`, `biz_id`, `user_id`) VALUES
(2, 'zZ', 'zZ', 'kdzGB1j0qXE', 'Za', '5', 0),
(3, 'zxvzxc', 'vzvzxv', '27764', 'zvxv', 'zvzxvzxv', 0),
(4, 'aasxc', 'cascascasc', '11793', 'ascas', 'casc', 0),
(5, 'Kobe Luminarire', 'Tristique minus illo rutrum doloremque, arcu? Purus eum suspendisse habitant blandit assumenda tellus praesent? Dolorum! Adipiscing, blandit nonummy id suscipit.', 'kdzGB1j0qXE', '4', '5', 0),
(6, 'Honest Trailers - The Divergent Series: Insurgent', 'Published on 8 Mar 2016\r\nSign up for ScreenJunkies Plus Now! ?? http://sj.plus/GoPlus\r\n\r\nStrap in for two hours of teenage wish fulfillment in a movie that is doing a really terrible job of convincing us it''s not the Maze Runner - The Divergent Series: Insurgent. \r\n\r\nGot a tip? Email us ? tips@screenjunkies.com\r\nFollow us on Twitter ? http://twitter.com/screenjunkies\r\nLike us on Facebook ? http://www.fb.com/screenjunkies\r\nGet Screen Junkies Gear! ?? http://bit.ly/SJMerch\r\n\r\nVoiceover Narration by Jon Bailey ? http://youtube.com/jon3pnt0\r\n\r\nTitle design by Robert Holtby \r\n\r\nSeries Created by Andy Signore - http://twitter.com/andysignore & Brett Weiner\r\nWritten by Spencer Gilbert, Dan Murrell, Joe Starr, and Andy Signore\r\nEdited by Anthony Falleroni, Cristian Ramirez, and Dan Murrell\r\n\r\nAlso while we have you, why not check out more HONEST TRAILERS!\r\n\r\nHonest Trailers - The Oscars \r\nhttp://sj.plus/1YswSyv\r\n\r\nHonest Trailers - The Walking Dead: Seasons 4-6\r\nhttp://sj.plus/1UbrMGc\r\n\r\nHonest Trailers - Scott Pilgrim vs. The World\r\nhttp://sj.plus/1pvPotV\r\n\r\nHonest Trailers - Spectre\r\nhttp://sj.plus/1QS7lLY\r\n\r\nHonest Trailers - Agents of SHIELD\r\nhttp://sj.plus/1lXsSYq\r\n\r\nHonest Trailers - Labyrinth\r\nhttp://sj.plus/1nRBilQ\r\n\r\nHonest Trailers - Pearl Harbor \r\nhttp://sj.plus/1PNTvH8\r\n\r\nHonest Trailers - The Martian \r\nhttp://sj.plus/1WPWrZo\r\n\r\nHonest Trailers - Die Hard\r\nhttp://sj.plus/1SlLqyf\r\n\r\nHonest Trailers - Star Wars Ep III: Revenge of the Sith\r\nhttp://sj.plus/1Tq1IXE\r\n\r\nHonest Trailers - Ant-Man\r\nhttp://sj.plus/1NmfAym\r\n\r\nHonest Trailers - Minions\r\nhttp://sj.plus/1NtSKTc\r\n\r\nHonest Trailers - Fantastic Four (2015)\r\nhttp://sj.plus/1jxfiKd\r\n\r\nHonest Trailers - Star Wars\r\nhttp://bit.ly/1Ys1noj\r\n\r\nHonest Trailers - TERMINATOR GENISYS\r\nhttp://bit.ly/1PMm5xE\r\n\r\nHonest Teaser - STAR WARS: THE FORCE AWAKENS\r\nhttp://bit.ly/1NHU7lf\r\n\r\nHonest Trailers – INSIDE OUT\r\nhttp://brk.cm/1MkOHXY\r\n\r\nHonest Trailers - BACK TO THE FUTURE\r\nhttp://brk.cm/1WfXG7C\r\n\r\nHonest Trailers - JURASSIC WORLD\r\nhttp://bit.ly/1MTptom\r\n\r\nHonest Trailers - ALADDIN\r\nhttp://brk.cm/1LJ6rfb\r\n\r\nHonest Trailers - AVENGERS: AGE OF ULTRON\r\nhttp://brk.cm/1McSkPK\r\n\r\nHonest Trailers- PETER PAN (1953)\r\nhttp://brk.cm/1KIIhUV\r\n\r\nHonest Trailers - FURIOUS 7\r\nhttp://brk.cm/1KxTJPX\r\n\r\nHonest Trailers - THE HAPPENING\r\nhttp://brk.cm/1VYY1rO\r\n\r\nHonest Trailers - FROZEN FEVER\r\nhttp://brk.cm/1OvnrsM\r\n\r\nHonest Trailers - MAD MAX: FURY ROAD\r\nhttp://brk.cm/1UktfMB\r\n\r\nHonest Trailers - KINGSMAN: THE SECRET SERVICE\r\nhttp://brk.cm/1NGWlRd\r\n\r\nHonest Trailers - 8 MILE\r\nhttp://brk.cm/1NhvprS\r\n\r\nHonest Trailers - FANTASTIC FOUR (2005)\r\nhttp://brk.cm/1L36Vzq\r\n\r\nHonest Trailers - MISSION:IMPOSSIBLE\r\nhttp://brk.cm/1SO1Exl\r\n\r\nHonest Trailers - SUPER MARIO BROS\r\nhttp://brk.cm/1DyyAD2\r\n\r\nHonest Trailers - IRON MAN\r\nhttp://brk.cm/1gModqj\r\n\r\nHonest Trailers - MAGIC MIKE\r\nhttp://brk.cm/1IbYWM0\r\n\r\nHonest Trailers - TERMINATOR 2: JUDGMENT DAY\r\nhttp://brk.cm/1Hfh5yg\r\n\r\nHonest Trailers - TOY STORY\r\nhttp://bit.ly/1GDNGdF\r\n\r\nHonest Trailers - THE LOST WORLD: JURASSIC PARK\r\nhttp://bit.ly/1edUZ2x\r\n\r\nHonest Trailers - ENTOURAGE (TV)\r\nhttp://bit.ly/1IAo6K3\r\n\r\nHonest Trailers - ARMAGEDDON\r\nhttp://brk.cm/1cvIBJr\r\n\r\nHonest Trailers - JUPITER ASCENDING\r\nhttp://brk.cm/1HwhL1J\r\n\r\nHonest Trailers - PITCH PERFECT\r\nhttp://brk.cm/1e3wk0f\r\n\r\nHonest Trailers - FIFTY SHADES OF GREY (100th Episode)\r\nhttp://brk.cm/1H47dH1\r\n\r\nHonest Trailers - HULK (2003)\r\nhttp://bit.ly/1Kb4qJI\r\n\r\nHonest Teaser - BATMAN V SUPERMAN: DAWN OF JUSTICE\r\nhttp://bit.ly/1DvwS3A\r\n\r\nHonest Trailers - DAREDEVIL (2003)\r\nhttp://brk.cm/1NftULG\r\n\r\nHonest Trailers - INTERSTELLAR\r\nhttp://bit.ly/1CeZnC7\r\n\r\nHonest Trailers - THE HOBBIT: THE BATTLE OF THE FIVE ARMIES (feat. HISHE)\r\nhttp://bit.ly/1IzpGIN\r\n\r\nHonest Trailers - LEPRECHAUN\r\nhttp://bit.ly/1NdvsCE\r\n\r\nHonest Trailers - CINDERELLA (1950)\r\nhttp://bit.ly/1CakOdV\r\n\r\nHonest Trailers - THE HUNGER GAMES: MOCKINGJAY, PART 1\r\nhttp://brk.cm/HT-MJay1\r\n\r\nHonest Trailers - DUMB AND DUMBER TO\r\nhttp://brk.cm/HT-Dumb2\r\n\r\nHonest Trailers - BOYHOOD\r\nhttp://bit.ly/HonestBoyhood\r\n\r\nHonest Trailers - The LEGO Movie\r\nhttp://brk.cm/HonestLego\r\n\r\nHonest Trailers - THE MAZE RUNNER\r\nhttp://bit.ly/HTMazeRunner\r\n\r\nHonest Trailers - PIRATES OF THE CARIBBEAN\r\nhttp://bit.ly/HTPirates\r\n\r\nHonest Trailers - GONE GIRL\r\nhttp://brk.cm/HTGoneGirl\r\n\r\nHonest Trailers - TAKEN\r\nhttp://bit.ly/HTTaken\r\n\r\nHonest Trailers - TEENAGE MUTANT NINJA TURTLES (2014):\r\nhttp://brk.cm/TMNT14', 'qDrShJ_ItNk', '1', '7', 0),
(7, 'Will Ghoast busters suck?', 'Published on 3 Mar 2016\r\nIt''s the moment you''ve all been waiting for.. you now officially have a reason to hate the new Ghostbusters movie because the trailer is out! So tell us what you think of the trailer in the comments.\r\n\r\nGhostbusters trailer - https://www.youtube.com/watch?v=w3ugH...\r\n-- \r\nSubscribe to our subreddit:\r\nhttp://reddit.com/r/ETCshow\r\n', '_Ei-rZVTVIE', '1', '7', 1),
(8, 'DIY Tumblr Inspired School Clothes!', 'Published on 25 Jul 2014\r\nToday Im showing you how to make cute, expensive clothes for LESS!\r\nLETS GET THIS VIDEO TO 50,000 LIKES! \r\ntwitter: https://twitter.com/lifeaseva', '4KKdcIBl5QM', '2', '1', 1),
(9, '20 Simple Style Tips For Men', 'People are always asking Alpha about how he has come up with 1,600 videos! Content is not his issue as he has a list of 400+ topics that he wants to cover. Time is the issue, not content!\r\nWhen Aaron Marino of alpha m. gets an idea, he jots them into a notebook. Some of the ideas are small-- too small for a full video. But now Alpha wants to share some of those small ideas with you.\r\n', '6_oVJP3dteM', '2', '1', 1),
(10, 'MEnas clothes the best', 'Eleifend provident, sapiente, explicabo quibusdam luctus justo expedita sit quisquam quam veritatis! Mollitia. Tellus phasellus esse dapibus aenean? Eos, praesent.', 'Vzw6j2waYaE', '1', '6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `backendusers`
--

CREATE TABLE `backendusers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backendusers`
--

INSERT INTO `backendusers` (`id`, `username`, `password`, `gender`, `country`, `email`, `role`) VALUES
(1, 'vic', '123', '123', '123', '', 'admin'),
(2, 'sdc', 'sdcdc', '', 'sdcsdc', 'sdcsdc', ''),
(3, 'cdsc', '123', '', 'AU', 'sdcsdc', ''),
(4, 'tree of life', '$2y$13$2hi72u/iiPM8p31DGcN1zO1Hj6rOsdhbTwwCwJ8SqZsRHgfjEGnTu', 'female', 'AW', 'v@gmail.com', 'normal'),
(5, 'tree of life2', '$2y$13$uePkB3sM0s9AGXnJahofY.XfbntcZgk4nqwgt/s7PnD9NLINHOpuu', 'male', 'AW', 'd@gmail.com', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descrption` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `descrption`, `img_path`) VALUES
(5, 'Cleaning', 'Businesses that can give cleaning services', '1525316247.png'),
(6, 'Food catering Services', 'Foods for all types of situations', '1508896021.png'),
(7, 'Clothes', 'Come and see the latest trends', '1909030656.png'),
(10, 'Electronics & Computers', 'Within this list of businesses , you''ll be able to find televisions & video information for all your needs', '1656808409.png');

-- --------------------------------------------------------

--
-- Table structure for table `eneobizinfo`
--

CREATE TABLE `eneobizinfo` (
  `id` int(11) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `highlights` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cat_list_img_path` varchar(255) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `geocode` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eneobizinfo`
--

INSERT INTO `eneobizinfo` (`id`, `tel`, `website`, `name`, `des`, `highlights`, `address`, `cat_list_img_path`, `cat_id`, `geocode`, `user_id`) VALUES
(4, '24534636', 'www.amina.com', 'Nguo za ofisi ', 'cascascascasccacascac\r\nBei ya chini', 'Uta furahi sana', 'karibu na mama boi', '6.jpg', '5', '-1.259711, 36.802012', 1),
(5, '345634666335', 'www.monstortrucks.com', 'Cars are us', 'svgsdvbg', 'sbsb', 'sdbsbsb', '5.jpg', '8', '', 1),
(6, '0722546186', 'www.cars.com', 'Mens wear', 'Dolores quidem eveniet natoque, soluta aute doloribus quia! Vivamus hymenaeos, accusamus incididunt? Ornare dui, mi corporis. Ridiculus, dicta, rutrum donec.', 'n/a', 'n/a', '1929554195.jpg', '7', '-1.292969, 36.787808', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video_cat`
--

CREATE TABLE `video_cat` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_cat`
--

INSERT INTO `video_cat` (`id`, `cat_name`, `user_id`) VALUES
(1, 'Education', 1),
(2, 'Fashion', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_videos`
--
ALTER TABLE `ad_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backendusers`
--
ALTER TABLE `backendusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eneobizinfo`
--
ALTER TABLE `eneobizinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_cat`
--
ALTER TABLE `video_cat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_videos`
--
ALTER TABLE `ad_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `backendusers`
--
ALTER TABLE `backendusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `eneobizinfo`
--
ALTER TABLE `eneobizinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `video_cat`
--
ALTER TABLE `video_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
