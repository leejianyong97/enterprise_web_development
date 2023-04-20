-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 02:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uog_cwsd5`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `date_created`, `date_updated`) VALUES
(1, 'Painting & Vinyl Wall Covering', 'Sprain of jaw, unspecified side', '2023-04-16 18:24:59', '2023-04-21 00:00:00'),
(2, 'Structural & Misc Steel Erection', 'Unspecified fracture of first thoracic vertebra, sequela', '2023-04-19 07:56:22', '2023-04-21 00:00:00'),
(3, 'Drywall & Acoustical (FED)', 'Sltr-haris Type III physl fx low end r femr, 7thP', '2023-04-15 11:39:22', '2023-04-21 00:00:00'),
(4, 'Fire Protection', 'Hyp hrt & chr kdny dis w hrt fail and w stg 5 chr kdny/ESRD', '2023-04-15 22:26:03', '2023-04-21 00:00:00'),
(5, 'Ornamental Railings', 'Avulsion of right eye, sequela', '2023-04-18 15:55:35', '2023-04-21 00:00:00'),
(6, 'Construction Clean and Final Clean', 'Brown-Sequard syndrome at T7-T10, subs', '2023-04-19 05:42:43', '2023-04-21 00:00:00'),
(7, 'Sitework & Site Utilities', 'Displ apophyseal fx r femur, subs for clos fx w delay heal', '2023-04-15 00:18:08', '2023-04-21 00:00:00'),
(8, 'Hard Tile & Stone', 'Type 4 fracture of sacrum, subs for fx w nonunion', '2023-04-19 12:21:28', '2023-04-21 00:00:00'),
(9, 'Framing (Steel)', 'Corrosion of unsp deg mult sites of left ankle and foot', '2023-04-14 17:54:29', '2023-04-21 00:00:00'),
(10, 'Glass & Glazing', 'Hyperaldosteronism, unspecified', '2023-04-17 04:01:39', '2023-04-21 00:00:00'),
(11, 'Masonry', 'Other specified anomalies of jaw-cranial base relationship', '2023-04-17 17:15:04', '2023-04-21 00:00:00'),
(12, 'Drywall & Acoustical (MOB)', 'Contusion of right ring finger w damage to nail, subs encntr', '2023-04-19 01:22:28', '2023-04-21 00:00:00'),
(13, 'Overhead Doors', 'Oth misadventures during surgical and medical care', '2023-04-18 21:38:01', '2023-04-21 00:00:00'),
(14, 'Framing (Wood)', 'Disp fx of glenoid cav of scapula, unsp shldr, 7thP', '2023-04-16 08:08:20', '2023-04-21 00:00:00'),
(15, 'Soft Flooring and Base', 'Nondisp fx of shaft of 1st MC bone, l hand, init for opn fx', '2023-04-18 01:21:02', '2023-04-21 00:00:00'),
(16, 'Landscaping & Irrigation', 'Stress fracture, right shoulder, subs for fx w routn heal', '2023-04-17 01:19:53', '2023-04-21 00:00:00'),
(17, 'Structural and Misc Steel (Fabrication)', 'Other superficial bite of right little finger', '2023-04-17 14:44:42', '2023-04-21 00:00:00'),
(18, 'Retaining Wall and Brick Pavers', 'Equatorial staphyloma', '2023-04-15 20:55:43', '2023-04-21 00:00:00'),
(19, 'Doors, Frames & Hardware', 'Other fracture of left ilium', '2023-04-19 13:46:16', '2023-04-21 00:00:00'),
(20, 'Doors, Frames & Hardware', 'Abrasion, left foot, sequela', '2023-04-18 11:57:29', '2023-04-21 00:00:00'),
(21, 'Asphalt Paving', 'Nondisp fx of prox phalanx of r idx fngr, 7thP', '2023-04-15 18:05:38', '2023-04-21 00:00:00'),
(22, 'Roofing (Metal)', 'Injury of digital nerve of right little finger, subs encntr', '2023-04-15 04:27:51', '2023-04-21 00:00:00'),
(23, 'Asphalt Paving', 'Underdosing of agents aff the cardiovascular sys, sequela', '2023-04-15 14:53:29', '2023-04-21 00:00:00'),
(24, 'Curb & Gutter', 'Unsp dislocation of unspecified shoulder joint, subs encntr', '2023-04-19 04:38:51', '2023-04-21 00:00:00'),
(25, 'RF Shielding', 'Burn of unspecified degree of right thumb (nail)', '2023-04-15 19:31:49', '2023-04-21 00:00:00'),
(26, 'Glass & Glazing', 'Complete lesion at C2 level of cervical spinal cord, subs', '2023-04-16 04:58:35', '2023-04-21 00:00:00'),
(27, 'Electrical', 'Sprain of oth parts of unsp shoulder girdle, subs encntr', '2023-04-15 15:18:19', '2023-04-21 00:00:00'),
(28, 'Temp Fencing, Decorative Fencing and Gates', 'Pathological fracture, left foot, subs for fx w delay heal', '2023-04-17 03:04:57', '2023-04-21 00:00:00'),
(29, 'Soft Flooring and Base', 'Disp fx of low epiphy (separation) of unsp femr, 7thK', '2023-04-15 08:06:27', '2023-04-21 00:00:00'),
(30, 'Exterior Signage', 'Asphyxiation due to smothering under pillow, accidental', '2023-04-15 00:20:34', '2023-04-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(30) NOT NULL,
  `topic_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `topic_id`, `user_id`, `comment`, `date_created`, `date_updated`) VALUES
(1, 21, 3, 'Drainage of Left Shoulder Muscle, Open Approach', '2023-04-16 07:50:50', '2023-04-22 00:00:00'),
(2, 10, 2, 'Alteration of Left Lower Arm with Nonautologous Tissue Substitute, Open Approach', '2023-04-16 04:08:46', '2023-04-22 00:00:00'),
(3, 22, 1, 'Supplement Left Hypogastric Vein with Synthetic Substitute, Open Approach', '2023-04-18 03:14:34', '2023-04-22 00:00:00'),
(4, 13, 4, 'Restriction of Right Brachial Artery with Extraluminal Device, Percutaneous Approach', '2023-04-15 15:29:32', '2023-04-22 00:00:00'),
(5, 20, 6, 'Revision of Infusion Device in Heart, Percutaneous Endoscopic Approach', '2023-04-19 11:01:02', '2023-04-22 00:00:00'),
(6, 9, 3, 'Drainage of Left Mastoid Sinus, Percutaneous Endoscopic Approach', '2023-04-14 13:39:48', '2023-04-22 00:00:00'),
(7, 22, 6, 'Dilation of Right Hand Artery with Two Intraluminal Devices, Open Approach', '2023-04-19 12:29:01', '2023-04-22 00:00:00'),
(8, 21, 6, 'Drainage of Stomach, Pylorus with Drainage Device, Via Natural or Artificial Opening Endoscopic', '2023-04-15 17:47:51', '2023-04-22 00:00:00'),
(9, 22, 5, 'Dilation of Right Hand Artery, Bifurcation, with Intraluminal Device, Percutaneous Endoscopic Approach', '2023-04-18 11:16:41', '2023-04-22 00:00:00'),
(10, 8, 6, 'Removal of Nonautologous Tissue Substitute from Vas Deferens, Via Natural or Artificial Opening', '2023-04-16 12:07:51', '2023-04-22 00:00:00'),
(11, 11, 5, 'Drainage of Thyroid Gland, Percutaneous Approach, Diagnostic', '2023-04-18 21:09:39', '2023-04-22 00:00:00'),
(12, 7, 1, 'Plain Radiography of Kidneys, Ureters and Bladder', '2023-04-19 03:38:53', '2023-04-22 00:00:00'),
(13, 26, 4, 'Removal of Synthetic Substitute from Upper Vein, Open Approach', '2023-04-14 08:23:34', '2023-04-22 00:00:00'),
(14, 23, 2, 'Excision of Coccygeal Joint, Percutaneous Endoscopic Approach, Diagnostic', '2023-04-18 07:11:54', '2023-04-22 00:00:00'),
(15, 9, 2, 'Introduction of Anti-inflammatory into Eye, Via Natural or Artificial Opening', '2023-04-17 01:12:32', '2023-04-22 00:00:00'),
(16, 29, 3, 'Insertion of Infusion Device into Right Hand Vein, Percutaneous Approach', '2023-04-19 15:55:25', '2023-04-22 00:00:00'),
(17, 14, 4, 'Extirpation of Matter from Lumbar Vertebra, Percutaneous Endoscopic Approach', '2023-04-14 01:27:53', '2023-04-22 00:00:00'),
(18, 2, 6, 'Occlusion of Left Common Iliac Artery, Percutaneous Approach', '2023-04-14 08:51:58', '2023-04-22 00:00:00'),
(19, 20, 5, 'Occlusion of Urethra with Extraluminal Device, Percutaneous Approach', '2023-04-14 15:46:13', '2023-04-22 00:00:00'),
(20, 8, 5, 'Removal of Synthetic Substitute from Left Carpal, Open Approach', '2023-04-16 00:21:35', '2023-04-22 00:00:00'),
(21, 22, 3, 'Removal of Pressure Dressing on Left Lower Leg', '2023-04-18 22:27:57', '2023-04-22 00:00:00'),
(22, 10, 5, 'Reposition Right Zygomatic Bone, Percutaneous Endoscopic Approach', '2023-04-14 16:10:12', '2023-04-22 00:00:00'),
(23, 10, 6, 'Dilation of Left Renal Artery, Bifurcation, Percutaneous Endoscopic Approach', '2023-04-20 20:22:38', '2023-04-22 00:00:00'),
(24, 3, 1, 'Drainage of Right Scapula, Percutaneous Endoscopic Approach', '2023-04-17 22:21:58', '2023-04-22 00:00:00'),
(25, 16, 3, 'Fluoroscopy of Right Renal Vein, Guidance', '2023-04-17 10:01:04', '2023-04-22 00:00:00'),
(26, 5, 6, 'Excision of Left Foot Tendon, Percutaneous Approach, Diagnostic', '2023-04-14 05:25:04', '2023-04-22 00:00:00'),
(27, 18, 3, 'Dilation of Left Vertebral Artery, Bifurcation, with Three Drug-eluting Intraluminal Devices, Percutaneous Endoscopic Approach', '2023-04-20 13:14:56', '2023-04-22 00:00:00'),
(28, 23, 1, 'Inspection of Right Wrist Joint, Percutaneous Approach', '2023-04-20 14:56:18', '2023-04-22 00:00:00'),
(29, 17, 3, 'Removal of Infusion Device from Right Knee Joint, Open Approach', '2023-04-15 16:24:52', '2023-04-22 00:00:00'),
(30, 18, 5, 'Insertion of Infusion Device into Right Wrist Region, Percutaneous Endoscopic Approach', '2023-04-18 16:29:45', '2023-04-22 00:00:00'),
(31, 27, 5, 'Removal of Infusion Device from Brain, Open Approach', '2023-04-17 18:38:37', '2023-04-22 00:00:00'),
(32, 18, 3, 'Extirpation of Matter from Thoracic Vertebral Joint, Open Approach', '2023-04-14 05:45:04', '2023-04-22 00:00:00'),
(33, 5, 3, 'Laser Interstitial Thermal Therapy of Spinal Cord', '2023-04-17 05:06:30', '2023-04-22 00:00:00'),
(34, 6, 3, 'Occlusion of Left Atrial Appendage, Percutaneous Endoscopic Approach', '2023-04-15 03:47:22', '2023-04-22 00:00:00'),
(35, 15, 1, 'Removal of Nonautologous Tissue Substitute from Chest Wall, Percutaneous Endoscopic Approach', '2023-04-15 00:19:34', '2023-04-22 00:00:00'),
(36, 4, 5, 'Measurement of Respiratory Total Activity, Via Natural or Artificial Opening Endoscopic', '2023-04-20 18:52:37', '2023-04-22 00:00:00'),
(37, 4, 4, 'Drainage of Left Upper Leg Subcutaneous Tissue and Fascia, Percutaneous Approach', '2023-04-14 21:02:47', '2023-04-22 00:00:00'),
(38, 19, 2, 'Insertion of Infusion Device into Azygos Vein, Percutaneous Endoscopic Approach', '2023-04-15 20:35:46', '2023-04-22 00:00:00'),
(39, 17, 5, 'Removal of Internal Fixation Device from Right Humeral Head, Open Approach', '2023-04-17 08:40:18', '2023-04-22 00:00:00'),
(40, 11, 6, 'Bypass Cystic Duct to Cystic Duct, Percutaneous Endoscopic Approach', '2023-04-17 15:57:55', '2023-04-22 00:00:00'),
(41, 16, 6, 'Supplement Atrial Septum with Synthetic Substitute, Open Approach', '2023-04-16 03:02:09', '2023-04-22 00:00:00'),
(42, 11, 3, 'Insertion of External Fixation Device into Right Tarsal, Percutaneous Approach', '2023-04-20 04:43:47', '2023-04-22 00:00:00'),
(43, 30, 4, 'Replacement of Left Shoulder Tendon with Autologous Tissue Substitute, Open Approach', '2023-04-18 02:07:21', '2023-04-22 00:00:00'),
(44, 19, 5, 'Transfer Hypoglossal Nerve to Facial Nerve, Open Approach', '2023-04-19 11:28:48', '2023-04-22 00:00:00'),
(45, 26, 3, 'Removal of Nonautologous Tissue Substitute from Lower Jaw, Percutaneous Endoscopic Approach', '2023-04-15 23:11:31', '2023-04-22 00:00:00'),
(46, 23, 2, 'Dilation of Right Internal Iliac Artery with Four or More Drug-eluting Intraluminal Devices, Open Approach', '2023-04-19 23:38:33', '2023-04-22 00:00:00'),
(47, 20, 2, 'Extirpation of Matter from Left Internal Carotid Artery, Open Approach', '2023-04-14 21:58:35', '2023-04-22 00:00:00'),
(48, 12, 4, 'Supplement Esophageal Vein with Nonautologous Tissue Substitute, Percutaneous Approach', '2023-04-14 08:59:37', '2023-04-22 00:00:00'),
(49, 10, 3, 'Dilation of Gastric Artery with Three Drug-eluting Intraluminal Devices, Percutaneous Endoscopic Approach', '2023-04-17 11:16:42', '2023-04-22 00:00:00'),
(50, 12, 3, 'Plain Radiography of Left Testicle using High Osmolar Contrast', '2023-04-14 02:34:49', '2023-04-22 00:00:00'),
(51, 12, 4, 'Supplement Uterine Supporting Structure with Synthetic Substitute, Percutaneous Endoscopic Approach', '2023-04-17 16:18:22', '2023-04-22 00:00:00'),
(52, 6, 5, 'Drainage of Right Inguinal Region, Percutaneous Endoscopic Approach', '2023-04-20 11:35:45', '2023-04-22 00:00:00'),
(53, 6, 5, 'Fusion of Right Wrist Joint with Nonautologous Tissue Substitute, Percutaneous Endoscopic Approach', '2023-04-20 20:48:55', '2023-04-22 00:00:00'),
(54, 25, 6, 'Plain Radiography of Left Optic Foramina', '2023-04-18 01:30:57', '2023-04-22 00:00:00'),
(55, 4, 1, 'Revision of Drainage Device in Right Shoulder Joint, External Approach', '2023-04-14 20:49:09', '2023-04-22 00:00:00'),
(56, 20, 1, 'Excision of Left Ethmoid Sinus, Percutaneous Approach', '2023-04-16 11:00:39', '2023-04-22 00:00:00'),
(57, 30, 1, 'Insertion of Internal Fixation Device into Left Sphenoid Bone, Open Approach', '2023-04-17 09:50:32', '2023-04-22 00:00:00'),
(58, 16, 2, 'Dilation of Right Common Carotid Artery with Drug-eluting Intraluminal Device, Percutaneous Endoscopic Approach', '2023-04-19 19:12:43', '2023-04-22 00:00:00'),
(59, 8, 6, 'Supplement Cervical Vertebra with Nonautologous Tissue Substitute, Percutaneous Approach', '2023-04-20 13:02:52', '2023-04-22 00:00:00'),
(60, 10, 1, 'Revision of Spacer in Thoracic Vertebral Joint, Open Approach', '2023-04-18 22:06:51', '2023-04-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `topic_id`, `date_created`) VALUES
(0, 1, 5, '2023-04-20 12:11:01'),
(0, 1, 26, '2023-04-20 12:11:03'),
(0, 1, 21, '2023-04-20 12:11:04'),
(0, 1, 22, '2023-04-20 12:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(30) NOT NULL,
  `comment_id` int(30) NOT NULL,
  `reply` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(30) NOT NULL,
  `category_ids` text NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `likes` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_ids`, `title`, `content`, `user_id`, `likes`, `date_created`) VALUES
(1, '7', 'Legal Assistant', 'Disseminated due to other mycobacteria', 4, 0, '2023-04-17 17:54:26'),
(2, '21', 'VP Product Management', 'Long-term (current) use of non-steroidal anti-inflammatories (NSAID)', 4, 0, '2023-04-15 23:24:25'),
(3, '20', 'Senior Sales Associate', 'Arthroscopic surgical procedure converted to open procedure', 6, 0, '2023-04-18 08:36:36'),
(4, '1', 'Human Resources Manager', 'Recurrent erosion of cornea', 6, 0, '2023-04-18 21:28:03'),
(5, '24', 'Staff Scientist', 'Hemophthalmos, except current injury', 1, 1, '2023-04-20 23:29:12'),
(6, '14', 'Senior Developer', 'Status of other artificial opening of gastrointestinal tract', 5, 0, '2023-04-14 12:20:19'),
(7, '30', 'Assistant Media Planner', 'Maternal distress complicating labor and delivery, postpartum condition or complication', 2, 0, '2023-04-15 14:56:50'),
(8, '12', 'Recruiting Manager', 'Blisters, epidermal loss [second degree] of single digit [finger (nail)] other than thumb', 5, 0, '2023-04-15 09:59:11'),
(9, '22', 'Software Engineer II', 'Abdominal rigidity, left upper quadrant', 2, 0, '2023-04-15 19:05:32'),
(10, '6', 'Research Assistant III', 'Pedal cyclist hit by rolling stock', 5, 0, '2023-04-14 23:59:14'),
(11, '9', 'Sales Associate', 'Malignant neoplasm of upper lip, inner aspect', 3, 0, '2023-04-20 20:05:21'),
(12, '21', 'Recruiting Manager', 'Perichondritis of pinna, unspecified', 6, 0, '2023-04-15 07:48:53'),
(13, '9', 'Software Consultant', 'Hypotony of eye, unspecified', 5, 0, '2023-04-14 13:19:21'),
(14, '9', 'Professor', 'Nonspecific reaction to tuberculin skin test without active tuberculosis', 6, 0, '2023-04-17 01:16:17'),
(15, '9', 'Chemical Engineer', 'Tuberculosis of ear, tubercle bacilli not found (in sputum) by microscopy, but found by bacterial culture', 2, 0, '2023-04-17 11:04:12'),
(16, '25', 'General Manager', 'Foot and mouth disease', 6, 0, '2023-04-17 13:18:56'),
(17, '18', 'Dental Hygienist', 'Open fracture of mandible, unspecified site', 1, 0, '2023-04-19 01:14:48'),
(18, '26', 'Research Associate', 'Closed fracture of second cervical vertebra', 3, 0, '2023-04-18 14:02:31'),
(19, '4', 'Senior Sales Associate', 'Papanicolaou smear of anus with low grade squamous intraepithelial lesion (LGSIL)', 3, 0, '2023-04-15 04:52:22'),
(20, '11', 'Actuary', 'Traumatic amputation of other finger(s) (complete) (partial), without mention of complication', 6, 0, '2023-04-20 14:37:27'),
(21, '22', 'Accountant III', 'Methemoglobinemia', 1, 1, '2023-04-20 15:12:23'),
(22, '16', 'Analyst Programmer', 'Hypertensive heart and chronic kidney disease, benign, with heart failure and chronic kidney disease stage V or end stage renal disease', 6, 1, '2023-04-19 01:39:38'),
(23, '15', 'Director of Sales', 'Chronic factitious illness with physical symptoms', 4, 0, '2023-04-18 19:56:42'),
(24, '17', 'Financial Analyst', 'Encephalitis, myelitis, and encephalomyelitis in protozoal diseases classified elsewhere', 6, 0, '2023-04-15 20:38:37'),
(25, '28', 'Compensation Analyst', 'Need for prophylactic vaccination and inoculation against influenza', 1, 0, '2023-04-18 10:59:48'),
(26, '25', 'Mechanical Systems Engineer', 'Leukoplakia of penis', 2, 1, '2023-04-20 17:00:59'),
(27, '14', 'Media Manager I', 'Full-thickness skin loss [third degree, not otherwise specified] of genitalia', 6, 0, '2023-04-15 21:28:15'),
(28, '4', 'Quality Engineer', 'Lung replaced by transplant', 5, 0, '2023-04-16 23:14:02'),
(29, '19', 'Software Consultant', 'Deep necrosis of underlying tissues [deep third degree) with loss of a body part, of forearm', 3, 0, '2023-04-18 20:26:23'),
(30, '5', 'Physical Therapy Assistant', 'Drug- induced myotonia', 4, 0, '2023-04-18 11:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 7 COMMENT '1=QAManager,2=QACoordinator (Marketing) , 3= QACoordinator (Purchasing), 4= QACoordinator (Human Resources), 5= QACoordinator (IT), 6=QACoordinator(Manufacturing), 7= QACoordinator(Inventory)',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`, `date_created`) VALUES
(1, 'Admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '2023-04-20 11:26:26'),
(2, 'Candy', 'candy@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 7, '2023-04-20 11:43:33'),
(3, 'Zaid', 'zaid@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 6, '2023-04-20 11:44:13'),
(4, 'Khoo', 'khoo@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 4, '2023-04-20 11:44:29'),
(5, 'Trivikraam', 'trivikraam@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, '2023-04-20 11:45:26'),
(6, 'Sangarayyarao', 'sangarayyarao@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, '2023-04-20 11:45:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
