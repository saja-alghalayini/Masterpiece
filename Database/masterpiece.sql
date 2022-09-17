-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2022 at 04:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masterpiece`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `user_id`, `date`, `total`) VALUES
(1, 2, '2022-09-17 14:13:58', 49200);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Impressionism Art'),
(2, 'Pop-Up Art'),
(3, 'Abstract Art'),
(4, 'category 4');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `product_id`, `user_id`) VALUES
(1, 'My favourite painting, I really love the view and Van Gogh.', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `namee` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subjectt` varchar(255) NOT NULL,
  `messagee` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `product_id`, `quantity`, `bill_id`) VALUES
(65, 1, 1, 1),
(66, 3, 1, 1),
(67, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `name` text NOT NULL,
  `price` decimal(22,2) NOT NULL,
  `sale_status` tinyint(1) NOT NULL,
  `sale_pre` decimal(6,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `sale_status`, `sale_pre`, `description`, `image`, `status`) VALUES
(1, 1, 'Enclosed Field With Peasant', '3400.00', 1, '20.00', 'This painting is hand-painted in oil on canvas. We try to get as close as possible to the original painting by Van Gogh in terms of detail, color and brushstroke. Just like Van Gogh painted in 1880 – 1890.', './Images/ProductsImages/p1cat1.jpg', 'on stock'),
(2, 1, 'Portrait of Pere', '45000.00', 0, '0.00', 'This extraordinary man, Pere Tanguy, was a colour grinder with an art supply shop in Montmartre who took the avant-garde artists of the day under his wing, often trading their works for art supplies. By accounts he was extremely kind with a socialist leaning and was sympathetic to the struggles that emerging artists had. He also collected a huge number of works, especially those by Cezanne as well as Van Gogh, Pissarro, Gauguin, Monet, Manet and others. He bought and traded the paintings, selling them on for little profit and only just making a living himself.', './Images/ProductsImages/p2cat1.jpg', 'on stock'),
(3, 1, 'Road with Cypress and Star', '800.00', 1, '60.00', 'The painting is also known as “Country Road in Provence by Night”. Van Gogh painted Road with Cypress and Star in Provence, his last before he left the asylum he was in. He was very fascinated by Cypress trees and wanted to use them in his art. He thought them beautiful with regard to lines and proportions, like an Egyptian obelisk. He also thought the green had a distinguished quality. The painting is divided in half by a Cypress tree that is so tall, it extends out of the painting.', './Images/ProductsImages/p3cat1.png', 'on stock'),
(5, 1, 'SELF-PORTRAIT VINCENT', '2000.00', 1, '30.00', 'This painting is considered a particularly important work in Van Gogh’s oeuvre, given that many historians believe it to be his final self-portrait.\nIt was painted towards the end of his self-imposed defection to an asylum in Saint-Rémy-de-Provence. He’d sought refuge there after his mental struggles had come to a head with his notorious ear cutting episode. The relative calm and order of his stay resulted in some of his greatest masterpieces, of which Self-Portrait is certainly one.', '.\\Images\\ProductsImages\\p5cat1.jpg', 'on stock'),
(6, 1, 'Sun Flower', '900000.00', 1, '60.00', 'Van Gogh’s paintings of sunflowers have reconstructed mankind’s view of art and life. The painting dates back to 1888, when Van Gogh left Paris to paint in the gleaming sunshine of the South of France, requesting Paul Gauguin to join him.', '.\\Images\\ProductsImages\\p4cat1.jpg', 'on stock'),
(8, 1, 'The Starry Night', '890000.00', 0, '0.00', 'The Starry Night is an oil-on-canvas painting by the Dutch Post-Impressionist painter Vincent van Gogh. Painted in June 1889, it depicts the view from the east-facing window of his asylum room at Saint-Rémy-de-Provence, just before sunrise, with the addition of an imaginary village.', '.\\Images\\ProductsImages\\p6cat1.jpg', 'on stock'),
(9, 1, 'Vincent Van Gogh', '60.00', 0, '0.00', 'Vincent van Gogh : The Yellow House (The Street) (1888) Canvas Gallery Wrapped Giclee Wall Art Print (D4560)Canvas Print, gallery wrapped (mirrored edges) on 2cm depth pine wooden frame.', '.\\Images\\ProductsImages\\p7cat1.jpg', 'on stock');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(22) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `datee` date NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `user_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `mobile`, `pass`, `datee`, `is_admin`, `is_delete`, `user_img`) VALUES
(1, 'Multicolor', 'Admin', 'support@multicolor.com', 778089121, 'a8b2906a4d0c5d5bc6d41e7feff7b846', '2002-03-14', 1, 0, './Images/usersImages/logo.png'),
(2, 'Saja', 'Al Ghalayini', 'saja@gmail.com', 779458790, 'a8b2906a4d0c5d5bc6d41e7feff7b846', '2002-03-14', 0, 0, './Images/usersImages/pexels-valeriia-miller-3547625.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
