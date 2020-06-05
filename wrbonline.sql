-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2020 at 12:36 AM
-- Server version: 10.4.13-MariaDB-1:10.4.13+maria~bionic
-- PHP Version: 7.0.33-29+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wrbonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'baon@cikadap.com', '922facc3f4e6ca73c7d36ad7640bef968e3692864531b1fa2b3adb234667afa7f3f47c42b2bcdb84472ec99a86e8a48e25d0acbe7c13f76e5d3dee0dd926360d');

-- --------------------------------------------------------

--
-- Table structure for table `cookie`
--

CREATE TABLE `cookie` (
  `cookie` varchar(69) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `ua` text NOT NULL,
  `name` text DEFAULT NULL,
  `nohp` text DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cookie`
--

INSERT INTO `cookie` (`cookie`, `waktu`, `ua`, `name`, `nohp`, `alamat`) VALUES
('0xpn6hz5rv2zctk69kyl2m9ydaqmj93xamnwyvfxmuik5vyo0pp8xgb85dtzo9q67uzkf', '2020-06-05 03:07:21', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '', '', ''),
('0zm91fhts8rf9z87flg6783snl8wru6i3e6vz9ss8x4w872ldnyzuq391pttc44nzsuqg', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', '', '', ''),
('2nh7br925nk5q7d5mnowm3fxs48nj6188sinjj92nrudvpetcf52dhifx2ah8q54addkv', '2020-06-05 03:07:21', 'Go-http-client/1.1', '', '', ''),
('2zmldb4vl1qbik2vqe4x1viszfdep4aqjize5q8r8amyboc7q4o3wbshh25dsk4g56jap', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', '', '', ''),
('30a92yvy20fzdflzpdnx2zv88077qw6mo3rd8n1my1thfqpr1ujw0aaumkasqdvl91ttp', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '', '', ''),
('3utw12isql9zzzgjz9z039uxq48uzh1lh8550fm2hrummsk36k7tud1wvrlmnhxoi3olt', '2020-06-05 03:07:21', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.com', '', '', ''),
('3z81ksbylr8cbsydpebrq7g6zd2pdpyj0tvq35n23yus8pn7o42bkvjvt07p62ycynq2q', '2020-06-05 03:07:21', 'Mozilla/5.0 zgrab/0.x', '', '', ''),
('4pvsascs47gxmdqxgccmkb1oqh3bjo2hoechrqyu92ax4kqfstngla8100u6gq1wuym6d', '2020-06-05 03:07:21', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:76.0) Gecko/20100101 Firefox/76.0', '', '', ''),
('5a9cwzo9l2cmzz6qdr6x5oz0zlihx1ngj6a1mfzexh6ya5vnutmr89n9u4fqycz1dbw2f', '2020-06-05 03:07:21', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:47.0) Gecko/20100101 Firefox/47.0', '', '', ''),
('5d485bakjnmmwheg4i7xqinufmw6kfqf4jz2hnt7o5e6it8y8769698hskftoasknnzfv', '2020-06-05 03:07:21', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '', '', ''),
('5o2tqvdf31dyjetmlztxbgnsunb2dqfgsz0rcyvojw144nx1c11a5qebiwvxtgmurofwd', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', '', '', ''),
('6rq6iv6iqecs90mtonfx26hf7gl24xlq65fezgkyfjw07x21mk7d75p1zkqo6km9j72gf', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '', '', ''),
('90acdzbx8ppwtkr2fysr18wtulrdtotdpizk27hbyx2rerib4swndnjby5nxjugm94lo5', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '', '', ''),
('9n5mb41wcs41lm0pdx3uv49cqloy5l4cq9ir6z27syfy7ul86rwxg6odmgik06706kqbn', '2020-06-05 03:07:21', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '', '', ''),
('9qtco6aqouvw69haszprfuivw0ourntt3sk0u2injx8qcjajb1od74ma68c9ke824nv82', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '', '', ''),
('bwug93lie8lxajzkyaepjt9uycwxkiveoh8hg4dvsw2ckobetjhl0p8zhti4e9hkql5xm', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows; U; Windows NT 6.0;en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6)', '', '', ''),
('cbnf3z9arpoiba6zyka4pp7yu07p2zbmoe4bd19rbzto1ta4tjrsj1ti7qcnyhzc14pvs', '2020-06-05 03:07:21', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '', '', ''),
('dwrbqnrmm41vg9tkfwmdszdba3fx11iw4cxh8hgnvc6dok6v7nsfmswjsxiys7r1pt9m6', '2020-06-05 06:15:22', 'Mozilla/5.0 (Linux; Android 8.0.0; SO-02J) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.96 Mobile Safari/537.36', 'Budi Setiawan', '081223785565', 'Jl bihomo'),
('e7bvo0ttvcqrxeqi9loxjvo3f1xbjple9vjiaeald5450nsykihhy23pbzm0yih5bzwhs', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '', '', ''),
('ec8wt2pimc92quws3sd2limnezuu25img3eyo438dj43uifhvnud557jxm2911p58ayst', '2020-06-05 03:07:21', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '', '', ''),
('ecpghokzeel3adwwpkcqyc8onrzqt0xfqobc3dbqcvhd7yxlgiud5sxu8io5oezmjpf8l', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows; U; Windows NT 6.0;en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6)', '', '', ''),
('etclofjqmqms244ftny1yk04u0d1rkwc9n4bbqoryr7bek4mrio19zwj9kw2irjb9irr2', '2020-06-05 03:07:21', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '', '', ''),
('fdnyw9b70bfs1kuezu5vevqx7uskm2amgzek7egg78i1puhfbyy8iddtgrw8o2fgo8nnr', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '', '', ''),
('fou7wks51rrz4tt5zpky7bfl8rkb6r4uvwiezhdlxrm2p7kk5pq41a0gsthq36tybckjw', '2020-06-05 03:07:21', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/601.7.7 (KHTML, like Gecko) Version/9.1.2 Safari/601.7.7', '', '', ''),
('g6sqlu54yyzmn6c3h0pi7gr3pctebcy047h9skkpq31zve7iwob3mxf6gddc3nsivn24a', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '', '', ''),
('gj9n2rayzdzk8lpadnx1beez23kgup8dbnuvzmjvefrwr6vw278sj7y5w5d80vso4f8q0', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '', '', ''),
('hX5sEC9RXKKXC3SRvwcrEJEbfsDYScLcpOTzSLyegJ3wL920P8lC5nowA3OKjaLtRAKzQ', '2020-06-05 03:07:21', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/81.0.4044.138 Chrome/81.0.4044.138 Safari/537.36', '', '', ''),
('ilzzzot8wswl22767o6ql47n8obxybpe0sqhphva50gm0wt76m1qvyydiu69nhtp1z0cg', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows; U; Windows NT 6.0;en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6)', '', '', ''),
('j8gw37sjfg0nqjqsd4912gt3ms8hf3zojcyw31whml9j6qafbrbbwluuiaiovnmiq9exn', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '', '', ''),
('jq29oia38dsfjavmanxql7uloyh7d66rvbe74vo78udmipai9lqgne65igc36l45haekj', '2020-06-05 03:07:21', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '', '', ''),
('k1fuub7qd740w0sonn3jwymk4vbk1cq57ceamx7n1abef5lk7wbhl8hst22j6ma50lmu3', '2020-06-05 03:07:21', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '', '', ''),
('kc4m10zgnfl1xwo41axnfz83apuys52by0b89x3p0lpxox5z54n3ex9bqbcibodptke3l', '2020-06-05 03:07:21', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3602.2 Safari/537.36', '', '', ''),
('kd1nk5iy9ckkclb27ylh2p7svaibh2isbjccu33xi953kj09htxw3u3qr2wgec7fyp1wq', '2020-06-05 03:07:21', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '', '', ''),
('kybgep4fxnye8dk8ii1x94t60rmu20u5k8rhry51ficpqd444e7su5lr9ogkh3qwnxask', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '', '', ''),
('lg0yt3p478vc1b98at40ex078q89veqk55v9acsourzu2z6kbrbyqqht4uz76dynpt2r7', '2020-06-05 03:07:21', '', '', '', ''),
('lllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll', '2020-06-05 03:07:21', 'andtonying', 'Kucrit Gayming', '086969696969', 'jl asede ulen'),
('m6GyuRlOwgxOB7XTyDmSUBFcxn3jgrVIl45oAaNuVvtktoU08PO8FkKywFzPhaRg6tibf', '2020-06-05 03:07:21', 'Mozilla/5.0 (Linux; Android 8.0.0; SO-02J) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36', '', '', ''),
('mirg5xglqm703wh6avel5k9p6u67lvfqai2o4bo1t7v91xqdcjvwsj4cmx2hd1cx4mwjb', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '', '', ''),
('myan78tdgans9b6bdvlojsbyz86lx3kmonvz9l55zzwgapqt6aj540u70diswkhrogta4', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', '', '', ''),
('o4pyq1zuj7z0itylcu9stgg0sxxry2oey40s0hi8vti13mjhaxzb17nxlsc2mpoirnoz6', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', '', '', ''),
('piyegc7l05fqh73udw0r7i0dntl9cxit9scbxjurz6y5uhhwgy3jo72buuqvqbkxbzszt', '2020-06-05 03:07:21', 'Mozilla/5.0 (compatible; Nimbostratus-Bot/v1.3.2; http://cloudsystemnetworks.com)', '', '', ''),
('pos8i4lijr48x1mbuxan2vy3n1i9bv1z15lpjjzsmmx1ei86tkbree4mt7k4xmmpsq6z6', '2020-06-05 03:07:21', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/83.0.4103.61 Chrome/83.0.4103.61 Safari/537.36', 'ulen tiga kali', '08333333333333', 'jl uli ketan'),
('qadpbogccyb08dniwo5pbep6emyyr2ubieb6mx0o52dp6t1ozp6b4jeqd31fs3bwpwm7z', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '', '', ''),
('r3khbgn9tw3jwaz9yfuf8hq1eum827dyg5o1rtsyp2xyyziepvh0gkdz7vjxcqqprsb23', '2020-06-05 03:07:21', 'HTTP Banner Detection (https://security.ipip.net)', '', '', ''),
('s1zukgtq51t2dwob7yesgtht9ebff5azsjmuvvwje3pwevo7f8iayjm8os2cmo58i54af', '2020-06-05 03:07:21', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '', '', ''),
('t4wamb44xq45dgx738xioc6p3312o32ae3twbng8yp0sks34ta411wt6xicbwhonq84p1', '2020-06-05 03:07:21', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '', '', ''),
('tiok0t2ffrb2dn6b3ophnu3km5igx17q11f375ulas2rajto0xw09ci5ynobczib0ewec', '2020-06-05 03:07:21', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '', '', ''),
('twhx5hbg2l7cned5v58i3hwe0zb35cli24e32fze0n8w85vi8mkqskt7tpe4bei6x0myw', '2020-06-05 03:07:21', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:47.0) Gecko/20100101 Firefox/47.0', '', '', ''),
('wfuissfjeqtzxrgy3p5cze6zs1zgole1rf6miqz3q3xbt4y3yy9mgujvpev3e5gizzru9', '2020-06-05 03:07:21', '', '', '', ''),
('wklqd0cgeac7ul7dw1gtyfqf8t0262ri173sxwwh5rkfjacx36550ak5ceg1q0h6tgkw6', '2020-06-05 03:07:21', 'masscan/1.0 (https://github.com/robertdavidgraham/masscan)', '', '', ''),
('xt5vnyfd3o65r9r08qi2h9e23t7imvu7r19njd00d9vyx85m6g667lwc2bgwv1jtf90o5', '2020-06-05 03:07:21', 'Mozilla/5.0 zgrab/0.x', '', '', ''),
('yv0m11vh8h89w2dy2rlou0b5m6y13wlmk304igvnwzza0zja22jahwai3samr8arujov3', '2020-06-05 03:07:21', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Catering Senin'),
(2, 'Catering Selasa'),
(3, 'Catering Rabu'),
(4, 'Catering Kamis'),
(5, 'Catering Jumat'),
(6, 'Catering Sabtu'),
(7, 'Resto Iga Bakar'),
(8, 'Snack Cake Dessert');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `waktu` datetime NOT NULL,
  `nama` text NOT NULL,
  `gambar` text NOT NULL,
  `harga` int(11) NOT NULL,
  `open` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `kategori_id`, `waktu`, `nama`, `gambar`, `harga`, `open`) VALUES
(5, 1, '2020-06-02 07:17:02', 'Gepuk Bandung', 'gepuk.jpeg', 18000, 1),
(6, 1, '2020-06-02 07:17:02', 'Pepes Tahu (5pcs)', 'pepes.jpeg', 15000, 1),
(7, 1, '2020-06-02 07:17:02', 'Semur Jengkol', 'jengkol.jpeg', 20000, 1),
(8, 2, '2020-06-02 07:17:02', 'Ayam Bakar (4pcs)', 'ayam.jpeg', 55000, 1),
(10, 3, '2020-06-06 00:30:19', 'Ayam Serundeng (5pcs)', 'ysueflqpij022327kyzx0px5drz95gmmr3xif0l5u8lw9rkzqpb9d22uqsah3x9y4kyiqzpc2p702hfohmzew891tnoeevwj2mf46tujtjk92x8iajxvubi7cdd6fm7h.png', 55000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `nama` text NOT NULL,
  `nohp` text NOT NULL,
  `alamat` text NOT NULL,
  `info` text NOT NULL,
  `paid` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `method` int(11) NOT NULL DEFAULT 0,
  `kue` varchar(69) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `waktu`, `nama`, `nohp`, `alamat`, `info`, `paid`, `totalprice`, `method`, `kue`) VALUES
(666, '2020-06-05 05:20:16', 'Muhammad Fatah', '086969696969', 'jl waria berbatang', 'aku cewe = false', 1, 55000, 0, '2nh7br925nk5q7d5mnowm3fxs48nj6188sinjj92nrudvpetcf52dhifx2ah8q54addkv'),
(668, '2020-06-05 06:28:30', 'Ulen', '08143531513513', 'jl optima', 'siang malam makan paku', 0, 93000, 1, 'pos8i4lijr48x1mbuxan2vy3n1i9bv1z15lpjjzsmmx1ei86tkbree4mt7k4xmmpsq6z6'),
(670, '2020-06-05 09:29:58', 'Optima', '08314134133313', 'jl raja tega', '', 0, 15000, 1, 'pos8i4lijr48x1mbuxan2vy3n1i9bv1z15lpjjzsmmx1ei86tkbree4mt7k4xmmpsq6z6'),
(671, '2020-06-05 09:31:12', 'ulen tiga kali', '08333333333333', 'jl uli ketan', '', 1, 15000, 0, 'pos8i4lijr48x1mbuxan2vy3n1i9bv1z15lpjjzsmmx1ei86tkbree4mt7k4xmmpsq6z6');

-- --------------------------------------------------------

--
-- Table structure for table `orders_cart`
--

CREATE TABLE `orders_cart` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `name` text NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_cart`
--

INSERT INTO `orders_cart` (`id`, `menu_id`, `order_id`, `name`, `harga`, `jumlah`) VALUES
(1, 5, 666, 'Imam Supriadi', 55000, 1),
(2, 6, NULL, 'Pepes Tahu (5pcs)', 15000, 1),
(3, 8, NULL, 'Ayam Bakar (4pcs)', 55000, 2),
(4, 7, NULL, 'Semur Jengkol', 20000, 2),
(5, 5, 668, 'Gepuk Bandung', 18000, 1),
(6, 6, 668, 'Pepes Tahu (5pcs)', 15000, 1),
(7, 7, 668, 'Semur Jengkol', 20000, 3),
(8, 6, NULL, 'Pepes Tahu (5pcs)', 15000, 2),
(9, 8, NULL, 'Ayam Bakar (4pcs)', 55000, 1),
(10, 7, NULL, 'Semur Jengkol', 20000, 1),
(11, 6, 670, 'Pepes Tahu (5pcs)', 15000, 1),
(12, 6, 671, 'Pepes Tahu (5pcs)', 15000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int(11) NOT NULL,
  `cookie` varchar(69) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`id`, `cookie`, `menu_id`, `amount`) VALUES
(1, 'm6GyuRlOwgxOB7XTyDmSUBFcxn3jgrVIl45oAaNuVvtktoU08PO8FkKywFzPhaRg6tibf', 5, 4),
(2, 'm6GyuRlOwgxOB7XTyDmSUBFcxn3jgrVIl45oAaNuVvtktoU08PO8FkKywFzPhaRg6tibf', 6, 5),
(3, 'm6GyuRlOwgxOB7XTyDmSUBFcxn3jgrVIl45oAaNuVvtktoU08PO8FkKywFzPhaRg6tibf', 7, 2),
(4, 'hX5sEC9RXKKXC3SRvwcrEJEbfsDYScLcpOTzSLyegJ3wL920P8lC5nowA3OKjaLtRAKzQ', 7, 3),
(18, 'dwrbqnrmm41vg9tkfwmdszdba3fx11iw4cxh8hgnvc6dok6v7nsfmswjsxiys7r1pt9m6', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cookie`
--
ALTER TABLE `cookie`
  ADD PRIMARY KEY (`cookie`),
  ADD UNIQUE KEY `cookie` (`cookie`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kue` (`kue`);

--
-- Indexes for table `orders_cart`
--
ALTER TABLE `orders_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cookie` (`cookie`),
  ADD KEY `user_cart_ibfk_2` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=672;
--
-- AUTO_INCREMENT for table `orders_cart`
--
ALTER TABLE `orders_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`kue`) REFERENCES `cookie` (`cookie`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `orders_cart`
--
ALTER TABLE `orders_cart`
  ADD CONSTRAINT `orders_cart_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_cart_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD CONSTRAINT `user_cart_ibfk_1` FOREIGN KEY (`cookie`) REFERENCES `cookie` (`cookie`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_cart_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
