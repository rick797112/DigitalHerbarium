-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2022 at 02:17 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herbarium`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `createdon` date NOT NULL,
  `updatedon` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `createdon`, `updatedon`) VALUES
('Admin', '0e7517141fb53f21ee439b355b5a1d0a', '2022-10-29', '2022-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `slno` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gmail` varchar(80) NOT NULL,
  `contact` bigint(100) NOT NULL,
  `feedback` varchar(5000) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `herbariumcontect`
--

DROP TABLE IF EXISTS `herbariumcontect`;
CREATE TABLE IF NOT EXISTS `herbariumcontect` (
  `slno` int(10) NOT NULL AUTO_INCREMENT,
  `udate` date DEFAULT NULL,
  `cname` varchar(200) DEFAULT NULL,
  `sname` varchar(30) DEFAULT NULL,
  `kingdom` varchar(30) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `rlink` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `herbariumcontect`
--

INSERT INTO `herbariumcontect` (`slno`, `udate`, `cname`, `sname`, `kingdom`, `description`, `img`, `rlink`) VALUES
(1, '2022-10-29', 'Ashwagandha', 'Withania somnifera', 'Solanaceae', 'This species is a short, tender shrub growing 35â€“75 cm (14â€“30 in) tall. Tomentose branches extend radially from a central stem. Leaves are dull green, elliptic, usually up to 10â€“12 cm (3.9â€“4.7 in) long. The flowers are small, green and bell-shaped. The ripe fruit is orange-red.', 'Image/AshwagandhaPlant.jpg', 'Studies on leaf spot disease of Withania Somnifera and its impact on secondary metabolites https://www.ncbi.nlm.nih.gov/pmc/articles/PMC3476785'),
(2, '2022-10-29', 'Tulsi', 'Ocimum tenuiflorum', 'Lamiaceae', 'Ocimum tenuiflorum, commonly known as holy basil, tulsi or tulasi, is an aromatic perennial plant in the family Lamiaceae. It is native to the Indian subcontinent and widespread as a cultivated plant throughout the Southeast Asian tropics.\r\nTulsi is cultivated for religious and traditional medicine purposes, and also for its essential oil. It is widely used as a herbal tea, commonly used in Ayurveda, and has a place within the Vaishnava tradition of Hinduism, in which devotees perform worship involving holy basil plants or leaves.\r\nThe variety of Ocimum tenuiflorum used in Thai cuisine is referred to as Thai holy basil (Thai:kaphrao) and is the key herb in phat kaphrao, a stir-fry dish; it is not the same as Thai basil, which is a variety of Ocimum basilicum. In Cambodia, it is known as mreah-prov', 'Image/tulasi.jpg', 'Chloroplast DNA Phylogeography of Holy Basil (Ocimum tenuiflorum) in Indian Subcontinent\r\nhttps://www.ncbi.nlm.nih.gov/pmc/articles/PMC3910118/'),
(3, '2022-10-29', 'Ghritokumari', 'Aloe vera', 'Asphodelaceae', 'Aloe vera is a stemless or very short-stemmed plant growing to 60â€“100 centimetres (24â€“39 inches) tall, spreading by offsets. The leaves are thick and fleshy, green to grey-green, with some varieties showing white flecks on their upper and lower stem surfaces. The margin of the leaf is serrated and has small white teeth. The flowers are produced in summer on a spike up to 90 cm (35 in) tall, each flower being pendulous, with a yellow tubular corolla 2â€“3 cm (3â„4â€“1+1â„4 in) long.Like other Aloe species, Aloe vera forms arbuscular mycorrhiza, a symbiosis that allows the plant better access to mineral nutrients in soil.\r\n\r\nAloe vera leaves contain phytochemicals under study for possible bioactivity, such as acetylated mannans, polymannans, anthraquinone C-glycosides, anthrones, and other anthraquinones, such as emodin and various lectins.', 'Image/Aloe.jpg', 'Harnessing the potential of our aloe\r\nhttp://www.jamaica-gleaner.com/gleaner/20080117/eyes/eyes1.html'),
(4, '2022-10-29', 'Neem Tree, Nim Tree, Indian Lilac, Margosa Tree.', 'Azadirachta indica', 'Meliaceae', 'Neem is a fast-growing tree that can reach a height of 15â€“20 metres (49â€“66 ft), and rarely 35â€“40 m (115â€“131 ft). It is deciduous, shedding many of its leaves during the dry winter months. The branches are wide and spreading. The fairly dense crown is roundish and may reach a diameter of 20â€“25 m (66â€“82 ft). The neem tree is similar in appearance to its relative, the chinaberry (Melia azedarach).\r\nThe opposite, pinnate leaves are 20â€“40 cm (8â€“16 in) long, with 20 to 30 medium to dark green leaflets about 3â€“8 cm (1+1â„4â€“3+1â„4 in) long. The terminal leaflet often is missing. The petioles are short.\r\nWhite and fragrant flowers are arranged in more-or-less drooping axillary panicles which are up to 25 cm (10 in) long. The inflorescences, which branch up to the third degree, bear from 250 to 300 flowers. An individual flower is 5â€“6 mm (3â„16â€“1â„4 in) long and 8â€“11 mm (5â„16â€“7â„16 in) wide. Protandrous, bisexual flowers and male flowers exist on the same individual tree.\r\n\r\nThe fruit is a smooth (glabrous), olive-like drupe which varies in shape from elongate oval to nearly roundish, and when ripe is 14â€“28 mm (1â„2â€“1+1â„8 in) by 10â€“15 mm (3â„8â€“5â„8 in). The fruit skin (exocarp) is thin and the bitter-sweet pulp (mesocarp) is yellowish-white and very fibrous. The mesocarp is 3â€“5 mm (1â„8â€“1â„4 in) thick. The white, hard inner shell (endocarp) of the fruit encloses one, rarely two, or three, elongated seeds (kernels) having a brown seed coat.\r\nPollen grains of Azadirachta indica\r\nThe neem tree is often confused with a similar looking tree called bakain. Bakain also has toothed leaflets and similar looking fruit. One difference is that neem leaves are pinnate but bakain leaves are twice- and thrice-pinnate.', 'Image/Neem_Tree.jpg', 'Neem Tree Risk Assessment Download Pdf https://www.daf.qld.gov.au/__data/assets/pdf_file/0006/63168/IPA-Neem-Tree-Risk-Assessment.pdf'),
(5, '2022-10-29', 'Moonflowers, Thorn-apple', 'Datura wrightii', 'Solanaceae', 'Datura species are herbaceous, leafy annuals and short-lived perennials, which can reach up to 2 m in height. The leaves are alternate, 10â€“20 cm long, and 5â€“18 cm broad, with a lobed or toothed margin. The flowers are erect or spreading (not pendulous like those of Brugmansia), trumpet-shaped, 5â€“20 cm long, and 4â€“12 cm broad at the mouth; colours vary from white to yellow and pale purple. The fruit is a spiny capsule, 4â€“10 cm long and 2â€“6 cm broad, splitting open when ripe to release the numerous seeds. The seeds disperse freely over pastures, fields, and even wasteland locations.\r\nIn India, D. metel has long been regarded as a poison and aphrodisiac, having been used in Ayurveda as a medicine since ancient times. It features in rituals and prayers to Shiva and also in Ganesh Chaturthi, a festival devoted to the deity Ganesha. The larvae of some Lepidoptera (butterfly and moth) species, including Hypercompe indecisa, eat some Datura species. It has been observed that while insects may prefer to feed on Datura leaves, other animals such as cows will generally avoid consuming them.', 'Image/DATURA.jpg', 'Peculiar plants and fantastic fungi\r\nhttps://www.ncbi.nlm.nih.gov/pmc/articles/PMC7790546');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
