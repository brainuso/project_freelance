-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2017 at 01:42 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_freelance`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `story` varchar(255) NOT NULL,
  `authorid` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `storyline` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `storyline`, `description`, `name`) VALUES
(1, 'Programming & Tech', 'Its All about Objects', NULL, 'programming-tech'),
(2, 'Graphics & Design', 'The Most Creative Minds', NULL, 'graphics-design'),
(3, 'Writing & Translation', 'Shakespeare''s Mic', NULL, 'writing-translation'),
(4, 'Business', 'It''s All Busyness Here', NULL, 'business'),
(5, 'Advertising', 'The Megaphones', NULL, 'advertising'),
(6, 'Online Marketing', 'The Pitchers', NULL, 'online-marketing'),
(7, 'Video & Animation', NULL, NULL, 'video-animation'),
(8, 'Music & Audio', 'Music on the Beat', NULL, 'music-audio'),
(9, 'Arts & Crafts', NULL, NULL, 'arts-crafts'),
(10, 'Others', NULL, NULL, 'others');

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE `duration` (
  `id` int(11) NOT NULL,
  `gigid` varchar(32) NOT NULL,
  `standard` int(5) NOT NULL,
  `extra1` int(5) DEFAULT NULL,
  `extra2` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`id`, `gigid`, `standard`, `extra1`, `extra2`) VALUES
(1, '242625821', 3, 5, 7),
(10, '2543452237e61c2659d217502921', 2, 2, 0),
(11, '6508086354f1449a71417550471', 5, 0, 0),
(12, '315350102509c6d5c1e', 3, 3, 0),
(13, '111313232332649b2ce', 2, 3, 0),
(14, '3124431437870d6d952', 3, 3, 0),
(15, '86783741041836c72b7', 6, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `earnings`
--

CREATE TABLE `earnings` (
  `id` int(11) NOT NULL,
  `userid` varchar(32) NOT NULL,
  `gigid` varchar(32) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `earnings`
--

INSERT INTO `earnings` (`id`, `userid`, `gigid`, `amount`) VALUES
(1, '2147483647', '242625821', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `filestore`
--

CREATE TABLE `filestore` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `mimetype` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `authorid` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filestore`
--

INSERT INTO `filestore` (`id`, `filename`, `mimetype`, `description`, `filepath`, `authorid`) VALUES
(1, 'IMG_20160219_172420.jpg', 'image/jpeg', 'user-profile', 'http://localhost/myskilldomain/users/profile/img/1459475976_90607358132e_2147483647.jpg', '2147483647'),
(2, 'IMAG0107.jpg', 'image/jpeg', 'user-profile', 'http://localhost/myskilldomain/users/profile/img/1459625515_419868479260_5394072252bbb6bc4fff6581151.jpg', '5394072252bbb6bc4fff6581151'),
(3, 'IMG_20160205_015825.png', 'image/png', 'user-profile', 'http://myskilldomain.com/users/profile/img/1460503373_283904497cb3_128383748.png', '128383748'),
(4, 'IMG_20140814_171202.jpg', 'image/jpeg', 'user-profile', 'http://localhost/myskilldomain/users/profile/img/1460617081_650926222063_3818273862d8001354d07530292.jpg', '3818273862d8001354d07530292'),
(10, 'Screenshot (71).png', 'image/png', 'gig-profile', 'http://localhost/myskilldomain/gigs/profile/img/1460853078_348527188581c2659d217579651_2543452237e61c2659d217502921.png', '2543452237e61c2659d217502921'),
(12, 'IMAG0495.jpg', 'image/jpeg', 'gig-profile', 'http://localhost/myskilldomain/gigs/profile/img/1460933955_952904458462893451417524421_574465952e12893451417531621.jpg', '574465952e12893451417531621'),
(13, 'IMAG0495.jpg', 'image/jpeg', 'gig-profile', 'http://localhost/myskilldomain/gigs/profile/img/1460934102_813133274736396d51417555613_960117348a16396d51417526451.jpg', '960117348a16396d51417526451'),
(14, 'Screenshot (1).png', 'image/png', 'gig-profile', 'http://myskilldomain.com/gigs/profile/img/1460934569_086367749312449a71417587541_6508086354f1449a71417550471.png', '6508086354f1449a71417550471'),
(16, 'IMG_20140814_144854.jpg', 'image/jpeg', 'user-profile', 'http://localhost/myskilldomain/users/profile/img/1461020200_17524182379ac48266517586171_251227078f7c18de6d207550431.jpg', '251227078f7c18de6d207550431'),
(17, 'Screenshot (67).png', 'image/png', 'gig-profile', 'http://localhost/myskilldomain/gigs/profile/img/1461021351_372747099b8d787aa651758352_52920846417d787aa6517512042.png', '52920846417d787aa6517512042'),
(19, 'Screenshot (26).png', 'image/png', 'gig-profile', 'http://localhost/myskilldomain/gigs/profile/img/1461025258_878677400ebe_1621795713969e.png', '1621795713969e'),
(20, 'Screenshot (28).png', 'image/png', 'gig-profile-2', 'http://localhost/myskilldomain/gigs/profile/img/1461025258_438554179f37_1621795713969e.png', '1621795713969e'),
(21, 'Screenshot (2).png', 'image/png', 'gig-profile', 'http://projectname.com/gigs/profile/img/1461161305_9350318884d8_242625821.png', '242625821'),
(22, 'nacoss logo.png', 'image/png', 'gig-profile-2', 'http://projectname.com/gigs/profile/img/1461161305_4741882935cd_242625821.png', '242625821'),
(24, 'vlcsnap-2012-08-21-21h17m43s50.png', 'image/png', 'gig-profile-2', 'http://myskilldomain.com/gigs/profile/img/1461194090_215201048649_6508086354f1449a71417550471.png', '6508086354f1449a71417550471'),
(25, 'DSC00712.JPG', 'image/jpeg', 'gig-profile', 'http://myskilldomain.com/gigs/profile/img/1461927356_1773893873e5_1101584112828b588cb.JPG', '1101584112828b588cb'),
(26, 'DSC00729.JPG', 'image/jpeg', 'gig-profile-2', 'http://myskilldomain.com/gigs/profile/img/1461927356_468127958b2f_1101584112828b588cb.JPG', '1101584112828b588cb'),
(27, 'DSC00711.JPG', 'image/jpeg', 'gig-profile', 'http://myskilldomain.com/gigs/profile/img/1461930065_17921961757d_110979217230b5d5815.JPG', '110979217230b5d5815'),
(28, 'DSC00712.JPG', 'image/jpeg', 'gig-profile-2', 'http://myskilldomain.com/gigs/profile/img/1461930065_6889985778ab_110979217230b5d5815.JPG', '110979217230b5d5815'),
(30, 'DSC00712.JPG', 'image/jpeg', 'gig-profile-2', 'http://myskilldomain.com/gigs/profile/img/1462475119_0580423480ed_16582472949e2456f6.JPG', '16582472949e2456f6'),
(32, 'DSC00737.JPG', 'image/jpeg', 'user-profile', 'http://localhost/www.myskilldomain.com/users/profile/img/1462557391_447422938a393efcadc2752937_1277655556744d439dc2759742.JPG', '1277655556744d439dc2759742'),
(33, '12002604_904038632964783_638813489232623309_o.jpg', 'image/jpeg', 'user-profile', 'http://myskilldomain.com/users/profile/img/1462633245_450925260d71f4d130e2755948701851_575358984967ce435fd2758227443802.jpg', '575358984967ce435fd2758227443802'),
(34, 'dt.jpg', 'image/jpeg', 'user-profile', 'http://myskilldomain.com/users/profile/img/1462653843_44344923797bf93935e2755864868261_468148635ab7ec2425e275011455327.jpg', '468148635ab7ec2425e275011455327'),
(35, 'Bitoz_652442.jpeg', 'image/jpeg', 'gig-profile', 'http://myskilldomain.com/gigs/profile/img/1462662881_9691086615ad_315350102509c6d5c1e.jpeg', '315350102509c6d5c1e'),
(36, 'IMG-20160330-074223.jpg', 'image/jpeg', 'gig-profile-2', 'http://myskilldomain.com/gigs/profile/img/1462662881_646581064f0c_315350102509c6d5c1e.jpg', '315350102509c6d5c1e'),
(37, 'na wa o.jpg', 'image/jpeg', 'user-profile', 'http://myskilldomain.com/users/profile/img/1463351382_7380334967f1d6658f83752452987502_4307480167c80bec8e83758833864331.jpg', '4307480167c80bec8e83758833864331'),
(38, 'IMG-20160418-WA002.jpg', 'image/jpeg', 'user-profile', 'http://myskilldomain.com/users/profile/img/1463733680_9726430345494b0bdce375191564817_3008606854c9193ccce3751848787902.jpg', '3008606854c9193ccce3751848787902'),
(39, 'IMG_20160617_145155.jpg', 'image/jpeg', 'gig-profile', 'http://myskilldomain.com/gigs/profile/img/1467241452_339712836379_111313232332649b2ce.jpg', '111313232332649b2ce'),
(40, 'android-evolution-300x100.jpg', 'image/jpeg', 'gig-profile-2', 'http://myskilldomain.com/gigs/profile/img/1467241452_1815505846f4_111313232332649b2ce.jpg', '111313232332649b2ce'),
(41, 'Snapshot_20140408_8.JPG', 'image/jpeg', 'user-profile', 'http://myskilldomain.com/users/profile/img/1469383882_659185347dff75ac4059755250106221_540754683189c6984059757150990681.JPG', '540754683189c6984059757150990681'),
(42, 'Cat_Eyes-wallpaper-10284635.jpg', 'image/jpeg', 'gig-profile', 'http://myskilldomain.com/gigs/profile/img/1469403429_5193719540f6_3124431437870d6d952.jpg', '3124431437870d6d952'),
(43, '5686228.jpg', 'image/jpeg', 'gig-profile-2', 'http://myskilldomain.com/gigs/profile/img/1469403429_8510572404bb_3124431437870d6d952.jpg', '3124431437870d6d952'),
(44, 'IMG-20160724-WA0018.jpg', 'image/jpeg', 'user-profile', 'http://myskilldomain.com/users/profile/img/1469434515_9525526101311739ac59756436691002_379507800ad2f3237259759089931101.jpg', '379507800ad2f3237259759089931101'),
(45, 'IMG_20160802_092705.jpg', 'image/jpeg', 'user-profile', 'http://myskilldomain.com/users/profile/img/1470155749_342652401eb6f95ebc0a752595115202_938256933c099cdcbc0a751040061631.jpg', '938256933c099cdcbc0a751040061631'),
(46, 'IMG_20160810_000413.jpg', 'image/jpeg', 'user-profile', 'http://myskilldomain.com/users/profile/img/1471895035_9877157631a7d8bf55bb75405963403_198645082ab67e13445975857575299.jpg', '198645082ab67e13445975857575299'),
(47, 'IMG_20160826_075007.jpg', 'image/jpeg', 'user-profile', 'http://myskilldomain.com/users/profile/img/1477230998_919291601631f7691cc0850348182771_7866599626e866d90cc085552824463.jpg', '7866599626e866d90cc085552824463'),
(48, 'facebook-20150419-091930.png', 'image/png', 'user-profile', 'http://myskilldomain.com/users/profile/img/1484509350_665374015830336a0db7859299557402_2774896170a78897fcb7856546981751.png', '2774896170a78897fcb7856546981751'),
(49, 'Screenshot (105).png', 'image/png', 'gig-profile', 'http://localhost/www.choiceworker.com/gigs/profile/img/1490112635_1420052253dc_86783741041836c72b7.png', '86783741041836c72b7'),
(50, 'Screenshot (74).png', 'image/png', 'gig-profile-2', 'http://localhost/www.choiceworker.com/gigs/profile/img/1490112635_12036141927e_86783741041836c72b7.png', '86783741041836c72b7');

-- --------------------------------------------------------

--
-- Table structure for table `gig_category`
--

CREATE TABLE `gig_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gig_category`
--

INSERT INTO `gig_category` (`id`, `name`, `title`, `catid`) VALUES
(1, 'logo-design', 'Logo Design', 2),
(2, 'cartoons-caricatures', 'Cartoons & Caricatures', 2),
(3, 'photoshop-editing', 'Photoshop Editing', 2),
(4, 'illustration', 'Illustration', 2),
(6, 'website-builders', 'Website Builders & CMS', 1),
(7, 'wordpress', 'Wordpress', 1),
(8, 'web-programming', 'Web Programming', 1),
(9, 'databases', 'Databases', 1),
(10, 'data-analysis', 'Data Analysis & Report', 1),
(11, 'mobile-apps', 'Mobile Apps & Web', 1),
(12, 'creative-writing', 'Creative Writing', 3),
(13, 'proofreading-editing', 'Proofreading & Editing', 3),
(14, 'research-summaries', 'Research & Summaries', 3),
(15, 'articles-blog-post', 'Articles & Blog Posts', 3),
(16, 'translation', 'Translation', 3),
(17, 'resumes-cover-letters', 'Resumes & Cover Letters', 3),
(18, 'flyers-banners', 'Flyers & Banners', 2),
(19, 'social-media-design', 'Social Media Design', 2),
(20, 'domain-research', 'Domain Research', 6),
(21, 'seo', 'SEO', 6),
(22, 'crowd-testing', 'Crowd Testing', 1),
(23, 'desktop-applications', 'Desktop Applications', 1),
(24, 'tech-support', 'Tech Support & IT', 1),
(25, 'file-conversion', 'File Conversion', 1),
(26, 'other', 'Other', 1),
(27, 'presentation-infographics', 'Presentation & Infographics', 2),
(28, '3d-2d-models', '3D & 2D Models', 2),
(29, 'mobile-web-designs', 'Mobile & Web Designs', 2),
(30, 'business-cards', 'Business Cards & Branding', 2),
(31, 'invitations', 'Invitations', 2),
(32, 'brand-designs', 'Brand Designs', 2),
(33, 'clothing-design', 'Clothing Design', 2),
(34, 'other', 'Other', 2),
(35, 'banner-ads', 'Banner Ads', 2),
(36, 'transcription', 'Transcription', 3),
(37, 'business-copywriting', 'Business Copywriting', 3),
(38, 'legal-writing', 'Legal Writing', 3),
(39, 'business-plans', 'Business Plans', 4),
(40, 'legal-consulting', 'Legal Consulting', 4),
(41, 'market-research', 'Market Research', 4),
(42, 'branding-services', 'Branding Services', 4),
(43, 'career-counselling', 'Career Counselling', 4),
(44, 'financial-consultling', 'Financial Consulting', 4),
(45, 'presentations', 'Presentations', 4),
(46, 'social-media', 'Social Media', 6),
(47, 'reviews', 'Reviews', 6),
(48, 'web-analytics', 'Web Analytics', 6),
(49, 'other', 'Other', 4),
(50, 'article-submission', 'Article Submission', 6),
(51, 'banner-ads', 'Banner Advertising', 5),
(52, 'flyers-handbills', 'Flyers & Handbills', 5),
(53, 'music-promotions', 'Music Promotions', 5),
(54, 'video-promotions', 'Video Promotions', 5),
(55, 'domain-research', 'Domain Research', 6),
(56, 'other', 'Other', 5),
(57, 'other', 'Other', 6),
(58, 'keyword-research', 'Keyword Research', 6),
(59, 'commercials', 'Commercials', 7),
(60, 'intros', 'Intros', 7),
(61, 'editing-post-production', 'Editing & Post Production', 7),
(62, 'animation', 'Animation', 7),
(63, 'other', 'Other', 7),
(64, 'jingles', 'Jingles', 8),
(65, 'producers-composers', 'Producers & Composers', 8),
(66, 'singers-songwriters', 'Singers & Songwriters', 8),
(67, 'musicians', 'Musicians', 8),
(68, 'mixing', 'Mixing', 8),
(69, 'sound-effects', 'Sound Effects', 8),
(70, 'voice-overs', 'Voice-overs', 8),
(71, 'other', 'Other', 3),
(72, 'other', 'Other', 8),
(73, 'paintings', 'Paintings', 9),
(74, 'drawings', 'Drawings', 9),
(75, 'sculpture', 'Sculpture', 9),
(76, 'replicas', 'Replicas', 9),
(77, 'carvings', 'Carvings', 9),
(78, 'other', 'Other', 9);

-- --------------------------------------------------------

--
-- Table structure for table `gig_details`
--

CREATE TABLE `gig_details` (
  `id` int(11) NOT NULL,
  `gigid` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sellerid` varchar(32) NOT NULL,
  `subcatid` int(11) NOT NULL,
  `requirement` text NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gig_details`
--

INSERT INTO `gig_details` (`id`, `gigid`, `name`, `description`, `sellerid`, `subcatid`, `requirement`, `entry_date`, `status`) VALUES
(1, '242625821', 'i can paint you a pretty picture', 'I am an artist with good taste can paint for money or drugs which ever gets my mom well\r\n', '2147483647', 4, 'a high quality picture of yourself in .png, .jpg  format', '2016-02-07 23:00:00', 'ACTIVE'),
(11, '6508086354f1449a71417550471', 'i can do domain research for powerful and trademarkable domain names', 'i am  offering a premium chance to get powerful domain names', '128383748', 20, 'What your ideas for the website are. What will the website be doing?', '2016-04-18 22:47:44', 'ACTIVE'),
(12, '5520994229038792e08', 'i selle ice', 'i design ads', '2147483647', 52, 'your colors and styles ', '2016-06-04 11:09:35', 'INACTIVE'),
(13, '111313232332649b2ce', 'I will convert your site to android app ', 'Many business require mobile apps to give users custom experiences. I will take your cool  website and turn it into an even cooler app. Android, iOS, Windows. I will sign a non disclosure agreement to not use the information or files provided for other pu', '2147483647', 11, 'A link to your site or a zipped folder of your site files. ', '2016-06-29 23:32:14', 'INACTIVE'),
(14, '3124431437870d6d952', 'I can write a letter', 'I can write A 300 word business, formal informal letters', '2147483647', 12, 'Details you think necessary', '2016-07-24 23:37:09', 'ACTIVE'),
(15, '86783741041836c72b7', 'I can dance etighi', 'I am a very good dancer with skills like no other\r\n\r\n1. I own a troupe and we travel the world\r\n\r\n2. I eat alot too', '', 67, 'a copy of your document', '2017-03-21 16:10:35', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `gig_extra`
--

CREATE TABLE `gig_extra` (
  `id` int(11) NOT NULL,
  `gigid` varchar(32) NOT NULL,
  `extra1_desc` text NOT NULL,
  `extra2_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gig_extra`
--

INSERT INTO `gig_extra` (`id`, `gigid`, `extra1_desc`, `extra2_desc`) VALUES
(2, '242625821', 'paint with stencils on paper', 'paint on canvas and frame it'),
(11, '2543452237e61c2659d217502921', 'draw', ''),
(12, '315350102509c6d5c1e', '500 words article ', ''),
(13, '111313232332649b2ce', 'The copyright ownership and all files', ''),
(14, '3124431437870d6d952', '500 words', ''),
(15, '86783741041836c72b7', 'home training', 'voicing');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`) VALUES
(1, 'Abuja'),
(2, 'Rivers'),
(3, 'Delta'),
(4, 'Lagos'),
(5, 'Ogun'),
(6, 'Akwa Ibom'),
(7, 'Bayelsa'),
(8, 'Cross River'),
(9, 'Edo'),
(10, 'Abia'),
(11, 'Imo'),
(12, 'Nasarawa'),
(13, 'Gombe'),
(14, 'Plateau'),
(15, 'Sokoto'),
(16, 'Ebonyi'),
(17, 'Enugu'),
(18, 'Adamawa'),
(19, 'Jigawa'),
(20, 'Bauchi'),
(21, 'Taraba'),
(22, 'Yobe'),
(23, 'Kwara'),
(24, 'Kogi'),
(25, 'Borno'),
(26, 'Benue'),
(27, 'Oyo'),
(28, 'Osun'),
(29, 'Ondo'),
(30, 'Ekiti'),
(31, 'Niger'),
(32, 'Anambra'),
(33, 'Kano'),
(34, 'Katsina'),
(35, 'Kebbi'),
(36, 'Kaduna'),
(37, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `fromID` varchar(32) NOT NULL,
  `toID` varchar(32) NOT NULL,
  `time_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `to_read` varchar(4) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `fromID`, `toID`, `time_sent`, `to_read`) VALUES
(3, 'fixed?', '2147483647', '2147483647', '2016-05-02 12:09:42', 'YES'),
(4, 'glisten', '2147483647', '2147483647', '2016-05-02 12:37:18', 'YES'),
(5, 'heavenly huh?', '2147483647', '2147483647', '2016-05-02 15:17:12', 'YES'),
(6, 'peaceful', '2147483647', '2147483647', '2016-05-02 15:17:55', 'YES'),
(7, 'hello', '2147483647', '2147483647', '2016-05-06 09:26:07', 'YES'),
(8, 'please how are youu?', '2147483647', '2147483647', '2016-05-06 09:27:23', 'YES'),
(9, 'hello dusty? how you doing? hope its going great?', '2147483647', '128383748', '2016-05-06 09:27:55', 'YES'),
(12, 'hello gus', '128383748', '2147483647', '2016-05-06 09:31:42', 'YES'),
(13, 'dusty', '2147483647', '128383748', '2016-05-06 09:51:47', 'YES'),
(14, 'its brainus', '2147483647', '128383748', '2016-05-06 09:53:11', 'YES'),
(15, 'to brainus from dusty', '128383748', '2147483647', '2016-05-06 09:56:04', 'YES'),
(16, 'i hear you loud and clear dusty', '2147483647', '128383748', '2016-05-06 10:09:30', 'YES'),
(17, 'this thing isnt showing last message', '128383748', '2147483647', '2016-05-06 14:47:23', 'YES'),
(18, 'dusty hi its brainus', '2147483647', '128383748', '2016-05-06 14:58:33', 'YES'),
(19, 'happy?', '128383748', '2147483647', '2016-05-06 16:12:52', 'YES'),
(20, 'What up', '2147483647', '128383748', '2016-07-14 23:44:31', 'YES'),
(21, 'Nothing much. Just testing ', '128383748', '2147483647', '2016-10-20 00:41:08', 'YES'),
(22, 'Nothing much. Just testing ', '128383748', '2147483647', '2016-10-20 00:41:09', 'YES'),
(23, 'Why sent twice', '128383748', '2147483647', '2016-10-20 00:41:51', 'YES'),
(24, 'Why sent twice', '128383748', '2147483647', '2016-10-20 00:41:51', 'YES'),
(25, 'Why sent twice', '128383748', '2147483647', '2016-10-20 00:41:52', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `senderid` varchar(32) NOT NULL,
  `details` varchar(255) NOT NULL,
  `receiverid` varchar(32) NOT NULL,
  `time_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `senderid`, `details`, `receiverid`, `time_sent`, `seen`) VALUES
(1, '2426258218712151930456d09165aad7', 'Order request', '2147483647', '2016-04-24 18:39:37', 1),
(4, '242625821401978351555708f2a64a96', 'Order request', '2147483647', '2016-04-09 12:31:17', 1),
(5, '242625821866893076b14', 'Order request', '2147483647', '2016-04-21 17:48:15', 1),
(7, '2426258218712151930456d09165aad7', 'Order request has been accepted', '2147483647', '2016-04-24 18:46:35', 1),
(8, '242625821613588890065707232ceff7', 'Order request has been declined', '2147483647', '2016-04-24 23:19:57', 1),
(11, '242625821866893076b14', 'Order request has been declined', '128383748', '2016-04-24 23:30:22', 1),
(16, '2426258218712151930456d09165aad7', 'The seller has started working on your order.', '2147483647', '2016-04-24 23:53:46', 1),
(18, '242625821401978351555708f2a64a96', 'Order request has been accepted.', '251227078f7c18de6d207550431', '2016-04-25 14:29:41', 0),
(19, '242625821401978351555708f2a64a96', 'The seller has started working on your order.', '251227078f7c18de6d207550431', '2016-04-25 14:29:53', 0),
(21, '2147483647', 'New Message', '2147483647', '2016-05-02 11:44:13', 1),
(22, '2147483647', 'New Message', '2147483647', '2016-05-02 12:08:08', 1),
(25, '2147483647', 'New Message', '2147483647', '2016-05-02 15:17:12', 1),
(26, '2147483647', 'New Message', '2147483647', '2016-05-02 15:17:55', 1),
(27, '2147483647', 'New Message', '2147483647', '2016-05-06 09:26:07', 1),
(28, '2147483647', 'New Message', '2147483647', '2016-05-06 09:27:24', 1),
(29, '2147483647', 'New Message', '128383748', '2016-05-06 09:27:55', 1),
(30, '128383748', 'New Message', '2147483647', '2016-05-06 09:29:41', 1),
(31, '128383748', 'New Message', '2147483647', '2016-05-06 09:31:33', 1),
(32, '128383748', 'New Message', '2147483647', '2016-05-06 09:31:43', 1),
(33, '2147483647', 'New Message', '128383748', '2016-05-06 09:51:47', 1),
(34, '2147483647', 'New Message', '128383748', '2016-05-06 09:53:11', 1),
(35, '128383748', 'New Message', '2147483647', '2016-05-06 09:56:04', 1),
(36, '2147483647', 'New Message', '128383748', '2016-05-06 10:09:30', 1),
(37, '128383748', 'New Message', '2147483647', '2016-05-06 14:47:23', 1),
(38, '2147483647', 'New Message', '128383748', '2016-05-06 14:58:33', 1),
(39, '128383748', 'New Message', '2147483647', '2016-05-06 16:12:52', 1),
(40, '2426258213138203393da', 'Order request', '2147483647', '2016-06-15 09:38:24', 1),
(41, '2426258213138203393da', 'Order request has been declined.', '2147483647', '2016-06-15 09:39:29', 1),
(42, '2147483647', 'New Message', '2147483647', '2016-06-15 09:40:07', 1),
(43, '2147483647', 'New Message', '128383748', '2016-07-14 23:44:31', 1),
(44, '128383748', 'New Message', '2147483647', '2016-10-20 00:41:08', 1),
(45, '128383748', 'New Message', '2147483647', '2016-10-20 00:41:09', 1),
(46, '128383748', 'New Message', '2147483647', '2016-10-20 00:41:51', 1),
(47, '128383748', 'New Message', '2147483647', '2016-10-20 00:41:51', 1),
(48, '128383748', 'New Message', '2147483647', '2016-10-20 00:41:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderstore`
--

CREATE TABLE `orderstore` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `mimetype` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `orderid` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderstore`
--

INSERT INTO `orderstore` (`id`, `filename`, `mimetype`, `description`, `filepath`, `orderid`) VALUES
(1, 'IMG_20141220_155543.jpg', 'image/jpeg', 'order-file', 'http://localhost/myskilldomain/gigs/profile/order/img/1460085904_923385445a3a_242625821613588890065707232ceff77.jpg', '242625821613588890065707232ceff7'),
(4, 'IMAG0423.jpg', 'image/jpeg', 'order-file', 'http://localhost/myskilldomain/gigs/profile/order/img/1460205077_147583515ee9_242625821401978351555708f2a64a96b.jpg', '242625821401978351555708f2a64a96'),
(5, 'DSC00725.JPG', 'image/jpeg', 'order-file', 'http://localhost', '242625821866893076b14');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'accepted'),
(3, 'in progress'),
(4, 'completed'),
(5, 'declined');

-- --------------------------------------------------------

--
-- Table structure for table `order_transact`
--

CREATE TABLE `order_transact` (
  `id` int(11) NOT NULL,
  `orderid` varchar(32) NOT NULL,
  `ordertype` varchar(25) NOT NULL,
  `price` int(11) NOT NULL,
  `text` text NOT NULL,
  `gigid` varchar(32) NOT NULL,
  `buyerid` varchar(32) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_transact`
--

INSERT INTO `order_transact` (`id`, `orderid`, `ordertype`, `price`, `text`, `gigid`, `buyerid`, `order_date`, `status`) VALUES
(1, '2426258218712151930456d09165aad7', 'standard', 3000, 'i would like a pretty painting of my wife on canvas', '242625821', '2147483647', '2016-04-24 18:39:19', 3),
(6, '242625821613588890065707232ceff7', 'extra#2', 4000, 'A little green tint would be nice.', '242625821', '2147483647', '2016-04-08 03:25:04', 5),
(9, '242625821401978351555708f2a64a96', 'basic', 3000, 'i want a painting of my mom', '242625821', '251227078f7c18de6d207550431', '2016-04-09 12:31:17', 3),
(10, '242625821866893076b14', 'extra#1', 3500, 'this is a picture of my mum and i would like if it could be framed and delivered. ', '242625821', '128383748', '2016-04-21 17:48:14', 5),
(11, '2426258213138203393da', 'extra#1', 3500, 'Here', '242625821', '2147483647', '2016-06-15 09:38:24', 5);

-- --------------------------------------------------------

--
-- Table structure for table `paid_gigs`
--

CREATE TABLE `paid_gigs` (
  `id` int(10) NOT NULL,
  `order_id` int(20) NOT NULL,
  `buyer_id` int(20) NOT NULL,
  `delivery` varchar(4) NOT NULL DEFAULT 'NO',
  `paid_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `gigid` varchar(32) NOT NULL,
  `standard` int(10) NOT NULL DEFAULT '3000',
  `extra1` int(10) NOT NULL,
  `extra2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `gigid`, `standard`, `extra1`, `extra2`) VALUES
(3, '242625821', 3000, 3500, 4000),
(14, '2543452237e61c2659d217502921', 3000, 3500, 0),
(15, '6508086354f1449a71417550471', 3000, 0, 0),
(16, '315350102509c6d5c1e', 3000, 5000, 0),
(17, '111313232332649b2ce', 3000, 6000, 0),
(18, '3124431437870d6d952', 3000, 5000, 0),
(19, '86783741041836c72b7', 3000, 5000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) NOT NULL,
  `request_id` varchar(20) NOT NULL,
  `sender_id` varchar(32) NOT NULL,
  `request` text NOT NULL,
  `category` varchar(5) NOT NULL,
  `subcategory` varchar(5) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `request_id`, `sender_id`, `request`, `category`, `subcategory`, `budget`, `duration`, `status`, `entry_date`) VALUES
(1, '302248765b64', '2147483647', 'i need a writer', '3', '12', 'Custom', 'less than a day', 'INACTIVE', '2016-07-04 23:46:57'),
(2, '68984140518e', '2147483647', 'i need an android developer', '1', '11', '₦5,001 - ₦10,000', '2days', 'INACTIVE', '2016-07-04 23:46:57'),
(3, '0935566862ef', '128383748', 'jibkmn l', '', '', '₦3,000 maximum', 'less than a day', 'INACTIVE', '2016-07-04 23:46:57'),
(4, '313046149f75', '128383748', 'I need an illustrator for cartoon anime', '2', '4', '₦3,000 maximum', 'less than a day', 'INACTIVE', '2016-07-04 23:46:57'),
(5, '8714433152b3', '128383748', 'i can', '2', '4', '₦3,000 maximum', 'less than a day', 'INACTIVE', '2016-07-04 23:46:57'),
(6, '18230014396d41', '2147483647', 'build a site', '1', '8', '₦3,000 maximum', 'less than a day', 'ACTIVE', '2016-09-16 15:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `request_bids`
--

CREATE TABLE `request_bids` (
  `id` int(11) NOT NULL,
  `bid_id` varchar(32) NOT NULL,
  `request_id` varchar(32) NOT NULL,
  `bidder` varchar(32) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(25) NOT NULL DEFAULT 'REJECTED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_bids`
--

INSERT INTO `request_bids` (`id`, `bid_id`, `request_id`, `bidder`, `entry_date`, `status`) VALUES
(1, '98606943890a', '302248765b64', '128383748', '2016-07-04 23:48:35', 'REJECTED'),
(2, '568467234c85', '68984140518e', '128383748', '2016-07-04 23:48:35', 'REJECTED');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `senderid` varchar(32) NOT NULL,
  `review` text NOT NULL,
  `gigid` varchar(32) NOT NULL,
  `ratings` int(3) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `senderid`, `review`, `gigid`, `ratings`, `entry_date`) VALUES
(1, '2147483647', 'Was an excellent job can''t wait to show my girlfriend what i got her for val. Yipee. Thanks brainuso', '242625821', 4, '2016-02-15 23:00:00'),
(9, '128383748', 'Nice work . it was very professional', '242625821', 3, '2016-02-26 23:00:00'),
(33, '3818273862d8001354d07530292', 'heheheh', '242625821', 1, '2016-04-13 16:36:35'),
(34, '128383748', 'nice gig', '2543452237e61c2659d217502921', 2, '2016-04-17 23:46:41'),
(35, '2147483647', 'magic', '242625821', 2, '2016-05-05 21:51:59'),
(36, '2147483647', 'Testing ', '242625821', 2, '2016-05-06 22:04:10'),
(37, '2147483647', 'Gold', '3124431437870d6d952', 2, '2016-07-25 05:28:21'),
(38, '2147483647', 'hotlegs', '242625821', 2, '2017-03-10 20:44:32'),
(39, '2147483647', 'cool', '242625821', 5, '2017-03-10 21:02:33'),
(40, '2147483647', 'thanks', '6508086354f1449a71417550471', 4, '2017-03-17 17:35:44'),
(41, '2147483647', 'you rock', '6508086354f1449a71417550471', 3, '2017-03-17 17:44:30'),
(42, '2147483647', 'pitch', '6508086354f1449a71417550471', 1, '2017-03-17 17:45:07'),
(43, '2147483647', 'not so good', '6508086354f1449a71417550471', 2, '2017-03-17 17:53:35'),
(44, '2147483647', 'date', '6508086354f1449a71417550471', 1, '2017-03-17 18:26:56'),
(45, '2147483647', 'thanks', '6508086354f1449a71417550471', 1, '2017-03-17 18:28:10'),
(46, '2147483647', 'full', '6508086354f1449a71417550471', 1, '2017-03-17 18:31:59'),
(47, '2147483647', 'glad', '6508086354f1449a71417550471', 2, '2017-03-17 18:34:28'),
(48, '2147483647', 'try', '6508086354f1449a71417550471', 1, '2017-03-17 18:35:51'),
(49, '2147483647', 'flit', '6508086354f1449a71417550471', 3, '2017-03-17 18:45:08'),
(50, '2147483647', 'fish', '6508086354f1449a71417550471', 2, '2017-03-17 18:45:47'),
(51, '2147483647', 'fickle', '6508086354f1449a71417550471', 1, '2017-03-17 19:21:29'),
(52, '2147483647', 'ssj', '6508086354f1449a71417550471', 1, '2017-03-17 19:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tag_list`
--

CREATE TABLE `tag_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `authorid` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `temp_user`
--

CREATE TABLE `temp_user` (
  `id` int(11) NOT NULL,
  `userid` varchar(32) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `confirm_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temp_user`
--

INSERT INTO `temp_user` (`id`, `userid`, `username`, `email`, `password`, `location`, `confirm_code`) VALUES
(2, '170586448', 'kingsley', 'kingsley@yahoomail.com', 'ec2c204b2d0428e3d37617ac1beb4864', 'Abuja', 'dd6388a3ad5667a5d34e90ed07978099'),
(13, '251227078f7c18de6d207550431', 'sheffie', 'sefunmifad@gmail.com', '02ae19b6fc8acebbb13a5659baffecd7', 'Ogun', 'ccf5fb0dcfb421bd3ec611fa1b8e371a'),
(19, '151697952ddc01bcfb2575840927345', 'maximuso05', 'b.rainus05@gmail.com', 'd0312c57a58c2bb70b1fc98b833aaaf1', 'Imo', 'dcab714a16f4b4856fa8fa48f78bc61a'),
(20, '77244962157435233c2575664667581', 'maximuso105', 'erhumuseadeleye@gmail.com', '6b3119dc8d3374c4b6347882faa7fb00', 'Rivers', 'bf1efacc523a5f5ec3197fc1171d2523'),
(21, '8560016781c862cb7529750037060021', 'easyzoe', 'easyzoe@gmail.com', 'f8070330c2e471ebd19121ea5fb95323', 'Abuja', 'd7ba2ac4c6cb98d3ce1b3c5da35e40c0'),
(28, '32791167867011abc53a752289953871', 'patmand', 'pmndifon@gmail.com', 'f08c6dc92e6a4873844a8295db01e2b8', 'Cross River', '184df0787d9226ddc218b005e0cac4f1');

-- --------------------------------------------------------

--
-- Table structure for table `user_biodata`
--

CREATE TABLE `user_biodata` (
  `id` int(11) NOT NULL,
  `userid` varchar(32) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `location` varchar(255) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `storyline` varchar(255) NOT NULL,
  `level` varchar(30) DEFAULT 'Beginner'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_biodata`
--

INSERT INTO `user_biodata` (`id`, `userid`, `username`, `email`, `password`, `location`, `entry_date`, `storyline`, `level`) VALUES
(1, '2147483647', 'brainuso', 'brainus05@gmail.com', 'd9356f77a8e9a868ed5fed1b4e2b205b', 'Lagos', '2016-04-09 22:35:04', 'A geek with a mission', 'Top Level'),
(2, '128383748', 'dusty', 'br.ainus05@gmail.com', '78a2258d0ec7c9149927d3b0bfe0aefb', 'Abuja', '2016-04-12 23:19:36', 'I am GROOT!!!', 'Level 1'),
(5, '3818273862d8001354d07530292', 'erhumuse', 'erhumuse@hotmail.com', 'b3d99e289e2d4d5eb4f064bdf6837a09', 'Akwa Ibom', '2016-04-27 21:25:58', 'Admins brother', 'Beginner'),
(12, '144964291f52d0c34716759368354881', 'YOUNGDREXZ', 'jdaduura@yahoo.co.uk', '40f4ee85bb3adf420f69d31e136808de', 'Rivers', '2016-06-15 15:30:14', 'just a regular student whos quite  impressed', 'Beginner'),
(13, '458605293d20f3569529753136127302', 'clueful', 'clueful@gmail.com', '78a60a6a39873ede81a4267b5c444b65', 'Abuja', '2016-07-22 17:37:23', 'Computer scientist. fix computer gadgets', 'Beginner'),
(14, '540754683189c6984059757150990681', 'JoshLion', 'joshuaekpe87@gmail.com', 'dec8900b188c23b06360da28f34b1e96', 'Lagos', '2016-07-24 18:10:30', '', 'Beginner'),
(15, '379507800ad2f3237259759089931101', 'Carny5', 'favour.carny@gmail.com', 'a6eae2c09f0a08eed44b67546364800d', 'Delta', '2016-07-24 20:38:28', '', 'Beginner'),
(16, '198645082ab67e13445975857575299', 'Straight-from-the-heart', 'eddybest4sure@yahoo.com', '185f969a591aea2ed4f547c09bd91ffd', 'Lagos', '2016-08-09 22:42:16', 'Straight - from - the - heart is concerned with making your day fulfilled with Inspirational talks/quotes, Words of Wisdom n making you have the best out of your Love life by giving you tips,quotes and knowledge on how to make your relationship work', 'Beginner'),
(17, '295926878cc5221c580a75381946294', 'oasis1', 'assamflorence@gmail.com', 'ccb0fd1b11dcbb33310f81158570b90f', 'Lagos', '2016-08-02 11:36:56', '', 'Beginner'),
(18, '742887915d906be7fbc0851981771031', 'OjogbonY', 'olaitan528@gmail.com', 'cec7d6bf2d92480847aa35ef98599b8e', 'Lagos', '2016-10-23 13:48:08', '', 'Beginner'),
(19, '7866599626e866d90cc085552824463', 'OjogbonYRB', 'ojogbonyoruba@gmail.com', '4144b09f9b7ca8ac7b16def58cfb4dbc', 'Lagos', '2016-10-23 13:58:49', 'I do write adverts in Yor&ugrave;b&aacute;, translate tweets, documents and, articles and the likes to Yor&ugrave;b&aacute;. If you need any of these services, please, contact me. ', 'Beginner'),
(20, '5503517787c911612c3185908537876', 'ImmanuelX', 'immanuel_galadima@yahoo.com', 'a823530a334cae4a8aac5c852469e854', 'Ogun', '2016-10-28 21:24:49', '', 'Beginner'),
(21, '2774896170a78897fcb7856546981751', 'gozicool', 'gozicool@gmail.com', 'b21b70f04d8e58fff02d7d4b9d1fe69b', 'Imo', '2017-01-19 18:57:28', 'DEATH AT SEA  LEAD-IN  The storms of life- poverty, war, corruption, Hunger, diseases, crime, death e.t.c are the banes of human existence as we know it. It is estimated that annually, more than 2000 illegal black African immigrants ; especially from sub-', 'Beginner'),
(22, '2258580843d0931889db8507542', 'tayotoro', 'oluwatayo@gmail.com', '095ec47ef5c05b8c6d304ed412d976e9', 'Lagos', '2017-03-06 17:13:34', '', 'Beginner'),
(24, '023782285e33f018efec857088', 'ghosty', 'ghost@gmail.com', '7147a8c53bb57d43dec92abe75d88d0d', 'Jigawa', '2017-03-19 21:57:58', '', 'Beginner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`authorid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duration`
--
ALTER TABLE `duration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gigid` (`gigid`);

--
-- Indexes for table `earnings`
--
ALTER TABLE `earnings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`,`gigid`),
  ADD KEY `gigid` (`gigid`);

--
-- Indexes for table `filestore`
--
ALTER TABLE `filestore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gig_category`
--
ALTER TABLE `gig_category`
  ADD PRIMARY KEY (`id`,`catid`),
  ADD KEY `catid` (`catid`);

--
-- Indexes for table `gig_details`
--
ALTER TABLE `gig_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcatid` (`subcatid`),
  ADD KEY `subcatid_2` (`subcatid`),
  ADD KEY `userid` (`sellerid`),
  ADD KEY `gigid` (`gigid`),
  ADD KEY `gigid_2` (`gigid`);

--
-- Indexes for table `gig_extra`
--
ALTER TABLE `gig_extra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gigid` (`gigid`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recieverid` (`toID`),
  ADD KEY `recieverid_2` (`toID`),
  ADD KEY `senderid` (`fromID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderstore`
--
ALTER TABLE `orderstore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_transact`
--
ALTER TABLE `order_transact`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderid_2` (`orderid`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `status` (`status`),
  ADD KEY `gigid` (`gigid`);

--
-- Indexes for table `paid_gigs`
--
ALTER TABLE `paid_gigs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gigid` (`gigid`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_bids`
--
ALTER TABLE `request_bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `senderid_2` (`senderid`),
  ADD KEY `ratings` (`ratings`),
  ADD KEY `gigid` (`gigid`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_list`
--
ALTER TABLE `tag_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`authorid`);

--
-- Indexes for table `temp_user`
--
ALTER TABLE `temp_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD UNIQUE KEY `confirm_code` (`confirm_code`),
  ADD UNIQUE KEY `confirm_code_2` (`confirm_code`),
  ADD KEY `userid_2` (`userid`);

--
-- Indexes for table `user_biodata`
--
ALTER TABLE `user_biodata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid_4` (`userid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `userid` (`userid`),
  ADD KEY `userid_2` (`userid`),
  ADD KEY `userid_3` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `duration`
--
ALTER TABLE `duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `earnings`
--
ALTER TABLE `earnings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `filestore`
--
ALTER TABLE `filestore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `gig_category`
--
ALTER TABLE `gig_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `gig_details`
--
ALTER TABLE `gig_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `gig_extra`
--
ALTER TABLE `gig_extra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `orderstore`
--
ALTER TABLE `orderstore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_transact`
--
ALTER TABLE `order_transact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `paid_gigs`
--
ALTER TABLE `paid_gigs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `request_bids`
--
ALTER TABLE `request_bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tag_list`
--
ALTER TABLE `tag_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temp_user`
--
ALTER TABLE `temp_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user_biodata`
--
ALTER TABLE `user_biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
