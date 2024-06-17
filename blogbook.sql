-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2024 at 04:11 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogbook`
--
CREATE DATABASE IF NOT EXISTS `blogbook` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `blogbook`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`user_id`),
  KEY `fk_post_id` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `body`) VALUES
(1, 1, 1, 'Great insights on the Composition API!'),
(2, 2, 1, 'Thanks for the detailed explanation.'),
(3, 1, 1, 'This really helped me understand the concept better.'),
(4, 2, 1, 'Can you provide more examples?'),
(5, 1, 1, 'Looking forward to more articles like this.'),
(6, 1, 2, 'Reactivity in Vue 3 is fascinating.'),
(7, 2, 2, 'Very informative post, thanks!'),
(8, 1, 2, 'I love how Vue 3 handles reactivity.'),
(9, 2, 2, 'This was exactly what I needed.'),
(10, 1, 2, 'Great write-up on reactivity.'),
(11, 1, 3, 'The todo app tutorial was very helpful.'),
(12, 2, 3, 'Simple and easy to follow, thanks!'),
(13, 1, 3, 'I built my first Vue app using this guide.'),
(14, 2, 3, 'Can you add more advanced features?'),
(15, 1, 3, 'Thank you for this step-by-step guide.'),
(16, 1, 4, 'Vue Router basics explained well.'),
(17, 2, 4, 'This post made Vue Router clear to me.'),
(18, 1, 4, 'Thanks for the examples on routing.'),
(19, 2, 4, 'Can you cover nested routes next?'),
(20, 1, 4, 'Great resource for learning Vue Router.'),
(21, 1, 5, 'Pinia looks promising for state management.'),
(22, 2, 5, 'I\'ll definitely try out Pinia now.'),
(23, 1, 5, 'Thanks for introducing Pinia!'),
(24, 2, 5, 'This helped me understand state management better.'),
(25, 1, 5, 'Great alternative to Vuex.'),
(26, 1, 6, 'Testing Vue components made easy.'),
(27, 2, 6, 'I learned a lot about testing from this post.'),
(28, 1, 6, 'Thanks for the testing tips.'),
(29, 2, 6, 'Very helpful for my project.'),
(30, 1, 6, 'I appreciate the detailed examples.'),
(31, 1, 7, 'Deploying to Netlify was a breeze.'),
(32, 2, 7, 'Thanks for the deployment guide.'),
(33, 1, 7, 'Netlify deployment explained perfectly.'),
(34, 2, 7, 'This saved me a lot of time.'),
(35, 1, 7, 'Clear and concise instructions.'),
(36, 1, 8, 'Great tips on optimizing performance.'),
(37, 2, 8, 'This post boosted my app\'s speed.'),
(38, 1, 8, 'Thanks for the performance tips!'),
(39, 2, 8, 'I implemented lazy loading thanks to this.'),
(40, 1, 8, 'Very useful optimization techniques.'),
(41, 1, 9, 'TypeScript with Vue is amazing.'),
(42, 2, 9, 'This guide was very helpful, thanks!'),
(43, 1, 9, 'I\'m starting to use TypeScript now.'),
(44, 2, 9, 'Thanks for the TypeScript tips.'),
(45, 1, 9, 'TypeScript really improves my code quality.'),
(46, 1, 10, 'Reusable components are a game changer.'),
(47, 2, 10, 'Thanks for the best practices!'),
(48, 1, 10, 'My code is more maintainable now.'),
(49, 2, 10, 'Great strategies for component reuse.'),
(50, 1, 10, 'This was very helpful, thanks!'),
(51, 1, 11, 'Transition effects look great in Vue 3.'),
(52, 2, 11, 'Thanks for the transition tips.'),
(53, 1, 11, 'I added transitions to my app thanks to this.'),
(54, 2, 11, 'This post made transitions easy to understand.'),
(55, 1, 11, 'Great examples on using transitions.'),
(56, 1, 12, 'Managing forms in Vue is easier now.'),
(57, 2, 12, 'Thanks for the form management tips.'),
(58, 1, 12, 'I learned a lot about form validation.'),
(59, 2, 12, 'This was very helpful for my project.'),
(60, 1, 12, 'Great overview on form handling.'),
(61, 1, 13, 'Integrating with REST APIs was straightforward.'),
(62, 2, 13, 'Thanks for the API integration guide.'),
(63, 1, 13, 'This post helped me with API requests.'),
(64, 2, 13, 'Very clear and concise, thanks!'),
(65, 1, 13, 'Great resource for API integration.'),
(66, 1, 14, 'VuePress made blogging easy.'),
(67, 2, 14, 'Thanks for the VuePress guide.'),
(68, 1, 14, 'I created my blog using this post.'),
(69, 2, 14, 'This was very helpful, thanks!'),
(70, 1, 14, 'Great introduction to VuePress.'),
(71, 1, 15, 'Advanced Vuex patterns were insightful.'),
(72, 2, 15, 'Thanks for the advanced Vuex tips.'),
(73, 1, 15, 'I\'ll use these patterns in my project.'),
(74, 2, 15, 'Very informative post on Vuex.'),
(75, 1, 15, 'Great advanced techniques for Vuex.');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `friend_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`user_id`),
  KEY `fk_friend_id` (`friend_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`) VALUES
(1, 2, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `user_id`) VALUES
(1, 'Exploring Vue 3 Composition API', 'An introduction to the Composition API in Vue 3, its benefits, and how to use it in your projects.', 1),
(2, 'Understanding Reactivity in Vue 3', 'A deep dive into Vue 3\'s reactivity system, explaining how it works under the hood and how to leverage it effectively.', 2),
(3, 'Building a Todo App with Vue 3', 'Step-by-step guide to building a simple todo application using Vue 3 and the Composition API.', 1),
(4, 'Vue Router Basics', 'An overview of Vue Router, including how to set it up and use it to navigate between different components in a Vue application.', 2),
(5, 'State Management with Pinia', 'Introduction to Pinia, a state management library for Vue 3, and how to use it to manage complex state in your application.', 1),
(6, 'Testing Vue Components', 'Best practices for testing Vue components using popular testing frameworks like Jest and Vue Test Utils.', 2),
(7, 'Deploying Vue Apps to Netlify', 'A guide on how to deploy Vue applications to Netlify, covering the steps from setting up your project to continuous deployment.', 1),
(8, 'Optimizing Vue Performance', 'Tips and techniques for optimizing the performance of your Vue applications, including lazy loading, code splitting, and more.', 2),
(9, 'Using Vue with TypeScript', 'How to set up and use TypeScript in your Vue 3 projects, including type annotations, interfaces, and more.', 1),
(10, 'Creating Reusable Components in Vue', 'Strategies for creating and managing reusable components in your Vue projects to improve code maintainability.', 2),
(11, 'Vue 3 Transition Effects', 'How to add transition effects to your Vue components using Vue 3\'s built-in transition system.', 1),
(12, 'Managing Forms in Vue', 'An overview of form management in Vue, including validation techniques and best practices for handling form data.', 2),
(13, 'Integrating Vue with REST APIs', 'How to integrate Vue applications with REST APIs, including making HTTP requests and handling responses.', 1),
(14, 'Building a Blog with VuePress', 'A guide on how to create a blog using VuePress, a Vue-powered static site generator.', 2),
(15, 'Vue 3 and Vuex: Advanced Patterns', 'Advanced patterns for using Vuex with Vue 3, including module management and dynamic module registration.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `profile_picture`) VALUES
(1, 'smiljanic19a', '$2y$10$oliI2PrvXnvj6U/AJDW2YOHMTA2AAIKHSW.MwrfKogavoOO7LAfLO', 'smiljanic19a'),
(2, 'testuser', '$2y$10$yMDPY4Mx0CGlZk6gzH2vBe6IpNCmB.VglY0ODSbqzqcrqkULP7hUG', 'testuser');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
