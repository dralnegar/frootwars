-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 11:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `slug`, `title`, `excerpt`, `body`, `created_at`, `updated_at`, `published_at`) VALUES
(1, 1, 1, 'fugiat-delectus-laborum-magnam-voluptatem-dolor-nam-temporibus', 'Itaque non molestias autem odit incidunt id.', 'Deleniti omnis unde officia numquam.', 'Illum nam explicabo sit laudantium. Quam rerum officiis asperiores labore animi. Officiis unde cumque expedita quis eius est quae. Voluptatem quia iusto dicta voluptatibus.', '2023-01-27 12:14:18', '2023-01-27 12:14:18', NULL),
(2, 2, 2, 'qui-nobis-nobis-libero-ipsum-quia', 'Et in natus deserunt quidem.', 'Et cupiditate aut similique at esse.', 'Voluptas odio eius in molestias quae unde. Dolore quibusdam aut et aut quaerat.', '2023-01-27 12:14:18', '2023-01-27 12:14:18', NULL),
(3, 3, 3, 'asperiores-numquam-vero-ut-sit-sint-incidunt-cupiditate', 'Id velit mollitia sit officia totam sed.', 'Eum repellat ut sunt ex distinctio velit dolores.', 'Nemo nisi laboriosam voluptatum dolores. Quae molestiae minus aliquam labore occaecati sunt aut. Quia sunt quia harum nulla qui consectetur.', '2023-01-27 12:14:18', '2023-01-27 12:14:18', NULL),
(4, 4, 4, 'in-quo-at-fugit-laboriosam-ipsa-officia', 'Et omnis magnam est voluptas perspiciatis.', 'Autem quam quis aut ipsa officiis aliquid quis.', 'Magni et architecto odit quaerat. Quasi qui unde repellat. In deleniti qui nesciunt placeat.', '2023-01-27 12:14:18', '2023-01-27 12:14:18', NULL),
(5, 5, 5, 'repellat-quia-quis-assumenda-aperiam-omnis', 'Odio eos consequatur quidem qui voluptas sunt.', 'Atque laboriosam consectetur perspiciatis possimus debitis et beatae ut.', 'Adipisci magni voluptas aut. Suscipit suscipit architecto reprehenderit possimus non. Vitae velit et magni placeat sint modi. Et debitis provident maiores illum impedit.', '2023-01-27 12:14:18', '2023-01-27 12:14:18', NULL),
(6, 16, 1, 'ab-unde-amet-in-molestias-sit', 'Dolorum tenetur illo pariatur.', 'Nihil veniam placeat nam qui odio.', 'Sit quia quaerat quidem molestiae suscipit deserunt ut. Odio ea voluptatem aut dolores. Et voluptatem adipisci cupiditate error. Accusamus deleniti dolore repellat aut aperiam.', '2023-01-27 12:20:31', '2023-01-27 12:20:31', NULL),
(7, 17, 1, 'voluptatibus-ad-voluptatem-ea-reiciendis-sed-illum', 'Excepturi non id ut distinctio praesentium itaque et illum.', 'Rerum aliquam accusantium repellat odio.', 'Error voluptatum ab alias voluptatem velit ad. Quasi repellat enim labore deleniti est aut dolorem voluptatem. Consequatur quo error et ullam. Et aspernatur perspiciatis ex itaque. Eos qui sed ipsa voluptatem.', '2023-01-27 12:20:31', '2023-01-27 12:20:31', NULL),
(8, 18, 1, 'quo-odio-modi-enim-ex-provident-tenetur', 'Atque occaecati et tempore eveniet.', 'Sunt iusto optio sit harum.', 'Maxime veniam quia modi impedit error consectetur accusamus. Et consequatur quos totam tenetur repellat accusantium. Id quia placeat reiciendis. Quo pariatur omnis laborum quisquam iure qui nostrum.', '2023-01-27 12:20:31', '2023-01-27 12:20:31', NULL),
(9, 19, 1, 'sit-earum-aliquam-aut-amet-asperiores-perferendis-qui-quibusdam', 'Magnam quia id nobis dolore rem nemo.', 'Omnis occaecati quod et porro et sed quis.', 'Debitis vitae aperiam sapiente ratione est ad vitae. Repudiandae pariatur voluptas beatae nisi rerum enim. Unde dolorum exercitationem eaque maxime suscipit id a. Reprehenderit omnis error architecto sunt consequatur quaerat.', '2023-01-27 12:20:31', '2023-01-27 12:20:31', NULL),
(10, 20, 1, 'molestias-exercitationem-nostrum-veritatis-et-non-et', 'Fugit ab doloribus qui tempora.', 'Omnis culpa illum aut pariatur.', 'Totam et sunt optio ratione ullam voluptatum. Sed esse labore aut reprehenderit. Qui deserunt et necessitatibus saepe. Harum molestias alias sed aut repellendus totam ratione.', '2023-01-27 12:20:31', '2023-01-27 12:20:31', NULL),
(11, 21, 1, 'at-veniam-quam-cupiditate', 'Incidunt expedita quasi distinctio quos.', 'Quis et distinctio aut.', 'Quia nihil delectus esse autem voluptatem qui. Accusantium eligendi maxime exercitationem iure voluptatem. Earum temporibus nihil sit. Placeat dolorem ab inventore rem ut aut ut.', '2023-01-27 12:20:31', '2023-01-27 12:20:31', NULL),
(12, 22, 1, 'aspernatur-voluptas-debitis-autem-perspiciatis-eos-dicta', 'Ut at at blanditiis modi adipisci adipisci.', 'Consequuntur repellendus ut sit eos voluptas minima iure.', 'Numquam aut a possimus. Nihil dolor fugiat voluptas natus rerum molestiae. Et eaque et quia quam distinctio nulla ipsam.', '2023-01-27 12:20:31', '2023-01-27 12:20:31', NULL),
(13, 23, 1, 'quia-quis-aut-accusantium-doloremque', 'Dolorem omnis libero rerum.', 'Est quo nesciunt molestiae sed mollitia.', 'Modi non voluptas ipsam pariatur dicta modi. Consectetur perspiciatis nemo aut omnis quo id. Sequi aut cum maxime sed quibusdam illum voluptatem architecto.', '2023-01-27 12:20:31', '2023-01-27 12:20:31', NULL),
(14, 24, 1, 'enim-mollitia-ut-velit-similique-inventore-tempore-facilis-consequatur', 'Enim sunt ad deserunt quidem.', 'Sit accusantium qui qui quae.', 'Explicabo molestiae rerum natus aut ea labore dolores. Hic perferendis maxime rem minus accusamus dicta. Quidem cupiditate magnam rerum eligendi nisi quia officia cum. Blanditiis dignissimos quisquam est in cum.', '2023-01-27 12:20:31', '2023-01-27 12:20:31', NULL),
(15, 25, 1, 'et-et-non-quo-perferendis-quia', 'Porro dolorum optio itaque laudantium quod deleniti.', 'Neque aliquid totam non veritatis laborum et ipsum.', 'Rem nisi quia molestiae velit. Autem omnis sed quis rem veritatis optio.', '2023-01-27 12:20:31', '2023-01-27 12:20:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
