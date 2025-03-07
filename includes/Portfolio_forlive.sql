-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 07, 2025 at 08:44 PM
-- Server version: 8.0.35
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: nub53937_portfolio
--

-- --------------------------------------------------------

--
-- Table structure for table case_studies
--

CREATE TABLE case_studies (
  case_id int UNSIGNED NOT NULL,
  project_name varchar(255) NOT NULL,
  client_url varchar(255) NOT NULL,
  description text NOT NULL,
  image varchar(255) NOT NULL,
  gallery_images text NOT NULL,
  project_id int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table case_studies
--

INSERT INTO case_studies (case_id, project_name, client_url, description, image, gallery_images, project_id) VALUES
(1, 'MedPark', 'https://www.medparkhospital.com/en-US/', 'The hospital operates under medical professionals and executive teams with over 30 years of experience in the health care industry. MedPark Hospital is led by Pongpat Patanavanich M.D, who holds the position of Managing Director at Mahachai Hospital Public Company Limited.', '/dynamic/MedPark/MedPark4.png', '/dynamic/MedPark/MedPark1.png, /dynamic/MedPark/MedPark2.png, /dynamic/MedPark/MedPark3.png', 0),
(2, 'NPD', 'https://www.npddrinks.com/', 'We are driven by a steadfast commitment to promoting better health for our consumers while delivering delightful flavors. With a vision to become the leader in vitamin C innovations, we strive to seamlessly blend wellness and enjoyment in every product we offer. Explore our journey and discover how we are shaping a healthier, tastier future for everyone.', '/dynamic/NPD/NPD3.png', '/dynamic/NPD/NPD2.png,/dynamic/NPD/NPD6.png,/dynamic/NPD/NPD2.png', 0),
(3, 'Thailand Halal', 'https://www.thailandhalalassembly.com/', 'Thailand Halal Assembly (THA) is an academic conference focusing on the field of Halal consisted of various activities such as the International Halal Science and Technology Conference (IHSATEC); the Halal Science, Industry, and Business International Conference (HASIB); the International Halal Standards and Certification Convention (IHSACC); the Thailand\'s International Halal Expo (TIHEX).', '/dynamic/THA/THA2.png', '/dynamic/THA/THA5.png,/dynamic/THA/THA3.png,/dynamic/THA/THA1.png', 0),
(4, 'Chongjaroen APP', 'https://www.chongjaroen.com/', 'We are a restaurant and bar that maintains the concept of The Lost Chinatown with a contemporary Chinese decoration. We serve fun with beautiful music from DJs and live bands of various genres, focusing mainly on Thai music. Special by inviting famous artists to add color regularly. Known as a bar and restaurant, the delicious menu served is diverse and spicy. Focusing on Thai-Chinese fusion food, both snacks and main dishes are available. As for the drink menu, there is a full selection to choose from, from tea and coffee to signature cocktails, including whiskey, brandy, vodka, beer and various soft drinks.', '/dynamic/chongjaroen/chongjaroen5.jpg', '/dynamic/chongjaroen/chongjaroen1.jpg,/dynamic/chongjaroen/chongjaroen3.jpg,/dynamic/chongjaroen/chongjaroen4.jpg', 0),
(5, 'Samsung Life', 'https://samsunglife.co.th/', 'Samsung Life\'s principal products include life, health insurance and annuities. Samsung Life was a private company from its foundation in 1957 until it went public in May 2010. The IPO was the largest in South Korean history and made Samsung Life one of the country\'s most valuable companies measured by market capitalization. Its headquarters are situated across from Namdaemun, a historic gate located in the heart of Seoul.', '/dynamic/SLI/SLI1.png', '/dynamic/SLI/SLI3.png,/dynamic/SLI/SLI5.png,/dynamic/SLI/SLI6.png', 0),
(6, 'SKY Ict.', 'https://www.skyict.co.th/', 'We are the Professional Solution Integrator providing IT enabled business solutions with direct support coverage across the country and all boundary areas.\n\nOur team combines Expertise and Multi-Vendor skilled People with a mix of Core Competencies, Key Strategic Partnerships and alliances, Broad experience in managing projects from largo to small, Proven ability to minimize Technical, Operational and Financial risks in complex projects, Multi-Skilled and Business-Critical Technology Solutions.', '/dynamic/SKY/SKY3.png', '/dynamic/SKY/SKY2.png,/dynamic/SKY/News and Event.png,macbook-16-pro-mockup-on-concrete-background-front-view.jpg', 0),
(7, 'Welter SEA', 'https://welter-sea.com/', 'With 40 years  of experience in industry gears and gearboxs\nwe have worked and dealed with professional clients and organization since 1984.With 40 years  of experience in industry gears and gearboxs we have worked and dealed with professional\nclients and organization since 1984.', '/dynamic/Welter/Welter2.png', '/dynamic/Welter/Welter6.png,/dynamic/Welter/Welter3.png,/dynamic/Welter/Welter1.png', 0),
(8, 'Nagase', 'https://group.nagase.com/th/', 'Is the Middle East and south East Asia leader in innovative products and solutions through our expertise in chemicals, plastics, electronics, automotive and Life & Healthcare.', '/dynamic/Nagase/Nagase5.png', '/dynamic/Nagase/Nagase1.png,/dynamic/Nagase/Nagase2.png,/dynamic/Nagase/Nagase3.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table clients
--

CREATE TABLE clients (
  clients_id int UNSIGNED NOT NULL,
  company_name varchar(255) NOT NULL,
  industry varchar(255) NOT NULL,
  campaign_name varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table clients
--

INSERT INTO clients (clients_id, company_name, industry, campaign_name) VALUES
(3, 'Medpark', 'Hospital', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table contact
--

CREATE TABLE contact (
  contact_id int UNSIGNED NOT NULL,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  message text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table media
--

CREATE TABLE media (
  media_id int UNSIGNED NOT NULL,
  file_type varchar(255) NOT NULL,
  file_url varchar(255) NOT NULL,
  project_id int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table media
--

INSERT INTO media (media_id, file_type, file_url, project_id) VALUES
(1, 'image', '/dynamic/MedPark/MedPark4.png', 1),
(2, 'image', '/dynamic/NPD/NPD3.png', 2),
(3, 'image', '/dynamic/THA/THA2.png', 3),
(4, 'image', '/dynamic/chongjaroen/chongjaroen5.jpg', 4),
(5, 'image', '/dynamic/SLI/SLI1.png', 5),
(6, 'image', '/dynamic/SKY/SKY3.png', 6),
(7, 'image', '/dynamic/Welter/Welter2.png', 7),
(8, 'image', '/dynamic/Nagase/Nagase5.png', 8);

-- --------------------------------------------------------

--
-- Table structure for table projects
--

CREATE TABLE projects (
  project_id int UNSIGNED NOT NULL,
  project_title varchar(255) NOT NULL,
  project_description text NOT NULL,
  description_type varchar(255) NOT NULL,
  project_type varchar(255) NOT NULL,
  clients_id int UNSIGNED NOT NULL,
  cover_image int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table projects
--

INSERT INTO projects (project_id, project_title, project_description, description_type, project_type, clients_id, cover_image) VALUES
(1, 'MedPark', 'The hospital operates under medical professionals and executive teams with over 30 years of experience in the health care industry. MedPark Hospital is led by Pongpat Patanavanich M.D, who holds the position of Managing Director at Mahachai', 'Test', 'UI Design', 0, 0),
(2, 'NPD', 'We are driven by a steadfast commitment to promoting better health for our consumers while delivering delightful ', 'Test', 'UI Design', 0, 0),
(3, 'Thailand Halal Essembly', 'Thailand Halal Assembly (THA) is an academic conference focusing on the field of Halal consisted of various activities such as the International Halal Science and Technology Conference (IHSATEC); the Halal Science', 'Test', 'UI Design', 0, 0),
(4, 'Chongjaroen', 'We are a restaurant and bar that maintains the concept of The Lost Chinatown with a contemporary Chinese decoration.', 'Test', 'UI Design', 0, 0),
(5, 'Samsung Life', 'Samsung Life\'s principal products include life, health insurance and annuities. Samsung Life was a private company from its foundation in 1957 ', 'Test', 'UI Design', 0, 0),
(6, 'SKY Ict.', 'We are the Professional Solution Integrator providing IT enabled business solutions with direct support coverage across the country and all boundary areas.\n\nOur team combines Expertise ', 'Test', 'UI Design', 0, 0),
(7, 'Welter SEA', 'With 40 years  of experience in industry gears and gearboxs. We have worked and dealed with professional clients and organization since 1984. With 40 years  of experience in industry gears and gearboxs we have worked and dealed with professional clients and organization since 1984.', 'Test', 'UI Design', 0, 1),
(8, 'Nagase', 'Is the Middle East and south East Asia leader in innovative products and solutions through our expertise ', 'Test', 'UI Design', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table case_studies
--
ALTER TABLE case_studies
  ADD PRIMARY KEY (case_id);

--
-- Indexes for table clients
--
ALTER TABLE clients
  ADD PRIMARY KEY (clients_id);

--
-- Indexes for table contact
--
ALTER TABLE contact
  ADD PRIMARY KEY (contact_id);

--
-- Indexes for table media
--
ALTER TABLE media
  ADD PRIMARY KEY (media_id),
  ADD KEY fk_media_project_id (project_id);

--
-- Indexes for table projects
--
ALTER TABLE projects
  ADD PRIMARY KEY (project_id);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table case_studies
--
ALTER TABLE case_studies
  MODIFY case_id int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table clients
--
ALTER TABLE clients
  MODIFY clients_id int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table contact
--
ALTER TABLE contact
  MODIFY contact_id int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table media
--
ALTER TABLE media
  MODIFY media_id int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table projects
--
ALTER TABLE projects
  MODIFY project_id int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table media
--
ALTER TABLE media
  ADD CONSTRAINT fk_media_project_id FOREIGN KEY (project_id) REFERENCES projects (project_id) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;