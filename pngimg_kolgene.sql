-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 07 2017 г., 22:50
-- Версия сервера: 5.6.17
-- Версия PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `pngimg_kolgene`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` text COLLATE utf8_unicode_ci NOT NULL,
  `firebase_user_id` text COLLATE utf8_unicode_ci NOT NULL,
  `firebase_auth_token` text COLLATE utf8_unicode_ci NOT NULL,
  `login_method` text COLLATE utf8_unicode_ci NOT NULL,
  `user_full_name` text CHARACTER SET utf8 NOT NULL,
  `time_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password_hash`, `phone_number`, `firebase_user_id`, `firebase_auth_token`, `login_method`, `user_full_name`, `time_created`) VALUES
(1, 'imonalex@gmail.com', '0800fc577294c34e0b28ad2839435945', '+972528471703', '0', '', 'email', 'Alex', '2017-08-06 00:00:00'),
(4, 'misha@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b', '', '0', '', 'email', 'misha', '2017-08-07 12:45:37'),
(5, 'tosha@mail.ru', 'e10adc3949ba59abbe56e057f20f883e', '', '0', '', 'email', 'tosha', '2017-08-07 12:47:58'),
(6, 'ola@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '0', '', 'email', 'ola', '2017-08-07 13:21:15'),
(10, '', '', '', '1zZ1w4sVaOShcXvzmmzXMKsckAw2', '885471758349979649-sA4wU1IwV2QzFGTVKi5SE7vOb1nq275', 'twitter', 'Pngimg.com', '2017-08-07 19:36:37'),
(11, 'imonalex@gmail.com', '', '', 'Xtwbfmzdgnhh32nUMccGQHkwJNy2', 'EAAWkRHuO9rIBAB0Ap5ciOrMlAmguk6YQbI1MllnACMNC07up4jtTjDxXHHa0Ch0Ag1WH1xQV0PsT1rnIrQpQl7C28BfxLypbYtx4ZAsj8f8yzMSFfae9c36AYuKxWKmeD2MAbXquPqf97sNYI4G5ch0koKP86ydLxCpuWHQZDZD', 'facebook', 'Alex  Monastyrsky', '2017-08-07 20:52:11'),
(12, 'imonalex@gmail.com', '', '', 'Xtwbfmzdgnhh32nUMccGQHkwJNy2', 'EAAWkRHuO9rIBAFLdaKMYYmMgQeru8TJoSgnhGsl26sfd4ZA0q9ZBu9XFZC0lOs2p30DPXZCfZBcYMN70YgjS2gZCcBd7v7u1Ro3ZCji1U3oaAJUgzszkCioRAWlzqFZAtX5MTcUZBiNh2eYsc6pDG4IlSgfzXfn8ERTdHpRqEUD1GsQZDZD', 'Facebook', 'Alex  Monastyrsky', '2017-08-07 21:00:45'),
(16, 'imonalex@gmail.com', '', '', 'Xtwbfmzdgnhh32nUMccGQHkwJNy2', 'EAAWkRHuO9rIBAMEVn1628Oja0gjFjhLZA2VT4tBXxOrZAkueucZALcV0xX0OM31BnQok5bCMRtAFn6QjBLve20QKKGOOqXSgfV7VCrY0WUZBRArvMZCctdFZBF1ZBmb81ywK1cMaWZBohwZAC2oTeyER6e0pm59OHwwJZBlcHgbJMJSQZDZD', 'Facebook', 'Alex  Monastyrsky', '2017-08-07 23:39:02'),
(14, 'imonalex@gmail.com', '', '', 'Xtwbfmzdgnhh32nUMccGQHkwJNy2', 'EAAWkRHuO9rIBAD4ZBFXlXPwtRZAfjpC8vS4Nc2Skqx58pUkL23yNmBP43pZAvCTi72w82J1tALdD772tjUDABRSrFCe3cvOLyK0CS5WbCTkfIGGciZCCv760spwZCPS6VHVnzGaOZBb3svcnhAZAfdxUm3f4nHyiI515rx9PwqggwZDZD', 'Facebook', 'Alex  Monastyrsky', '2017-08-07 21:19:49'),
(15, 'imonalex@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', 'email', 'Alex', '2017-08-07 21:27:51'),
(17, 'imonalex@gmail.com', '', '', 'Xtwbfmzdgnhh32nUMccGQHkwJNy2', 'EAAWkRHuO9rIBAKYHEeZBzjBbrshtCCjZAcdzUKny0SYs2drD6BRN4TWZAE8YIlyfEf39J0WWtnIZAwdpRN9xsZCp1K6Av4PvSnHEu6emUO13sdTrzumkeJa3TkucSsnsO1pGKlopwaRpFS0k5ze2qLnh1mztKfzHFZB5UNtj08aAZDZD', 'Facebook', 'Alex  Monastyrsky', '2017-08-07 23:40:38');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
