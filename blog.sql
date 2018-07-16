-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 29, 2018 lúc 06:03 PM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `blog`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 'Tech', 'tech', '2018-06-27 08:15:40', '2018-06-27 08:15:40'),
(2, 'Culture', 'culture', '2018-06-27 08:15:51', '2018-06-27 08:15:51'),
(3, 'Entertainment', 'entertainment', '2018-06-27 08:16:08', '2018-06-27 08:16:08'),
(4, 'Health', 'health', '2018-06-27 09:05:51', '2018-06-27 09:05:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` blob NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `image`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 0x313533303131333134352e6a7067, 4, 1, '2018-06-27 08:25:45', '2018-06-27 08:25:45'),
(2, 0x313533303131333234362e6a7067, 4, 2, '2018-06-27 08:27:26', '2018-06-27 08:27:26'),
(3, 0x313533303131343735382e6a7067, 2, 3, '2018-06-27 08:52:38', '2018-06-27 08:52:38'),
(4, 0x313533303131353632312e6a7067, 1, 4, '2018-06-27 09:07:01', '2018-06-27 09:07:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_18_095232_laratrust_setup_tables', 1),
(4, '2018_06_18_095413_create_categories_table', 1),
(5, '2018_06_18_095441_create_posts_table', 1),
(6, '2018_06_21_040251_create_comments_table', 1),
(7, '2018_06_21_040357_create_images_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'read-users', 'Read Users', 'Read Users', '2018-06-27 07:53:24', '2018-06-27 07:53:24'),
(2, 'delete-users', 'Delete Users', 'Delete Users', '2018-06-27 07:53:25', '2018-06-27 07:53:25'),
(3, 'read-profile', 'Read Profile', 'Read Profile', '2018-06-27 07:53:25', '2018-06-27 07:53:25'),
(4, 'update-profile', 'Update Profile', 'Update Profile', '2018-06-27 07:53:25', '2018-06-27 07:53:25'),
(5, 'create-post', 'Create Post', 'Create Post', '2018-06-27 07:53:26', '2018-06-27 07:53:26'),
(6, 'read-post', 'Read Post', 'Read Post', '2018-06-27 07:53:26', '2018-06-27 07:53:26'),
(7, 'update-post', 'Update Post', 'Update Post', '2018-06-27 07:53:26', '2018-06-27 07:53:26'),
(8, 'delete-post', 'Delete Post', 'Delete Post', '2018-06-27 07:53:26', '2018-06-27 07:53:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(3, 3, 'App\\User'),
(4, 3, 'App\\User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `slug`, `rate`, `active`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Chinese county bans schoolchildren from mosques', '<p>This picture taken on June 26, 2017 shows men dancing in front of the Id Kah Mosque after the morning prayer on Eid al-Fitr in the old town of Kashgar in China&#39;s Xinjiang Uighur Autonomous Region. (Agence France -Presse/Johannes Esielle)</p>\r\n\r\n<p>Authorities in a Muslim-majority county in northwest China have banned schoolchildren from going to mosques during their winter holidays, a state-run daily reported Friday, the latest tightening of regulations on religious freedoms.</p>\r\n\r\n<p>The decision was outlined in a notice sent to all high schools, primary schools and kindergartens in Gansu province&#39;s Guanghe county, according to the Global Times.</p>\r\n\r\n<p>&quot;Schools should require students to not enter religious venues for activities, nor attend scripture schools or religious venues for reading scripture during winter holiday,&quot; the notice read, according to the Global Times.</p>\r\n\r\n<p>&quot;Schools of all levels and kinds should further strengthen ideological and political work and enhance publicity work in order to inform each student and parent,&quot; it continued.</p>\r\n\r\n<p>The notice was confirmed to the newspaper by the county&#39;s local publicity department. It was not clear why the restrictions were being enforced during the holidays.</p>\r\n\r\n<p>Some 98 percent of Guanghe&#39;s 257,000 residents are ethnic minorities, many from the mostly Muslim Hui and Dongxiang groups, according to the county government&#39;s website.</p>\r\n\r\n<p>An image of what appeared to be the notice circulated online, though AFP was unable to confirm its authenticity.&nbsp;</p>\r\n\r\n<p>Guanghe is located within the Linxia Hui Autonomous Prefecture.</p>\r\n\r\n<p>The Linxia prefecture education bureau told AFP that they had no knowledge of the matter, while the Guanghe county propaganda department hung up the phone.</p>\r\n\r\n<p>In May 2016, Gansu&#39;s education bureau issued a notice stating that religious activities were forbidden in schools after a video of a kindergartener from Linxia reciting the Koran went viral, according to the Global Times.</p>\r\n\r\n<p>China&#39;s officially atheist Communist authorities are wary of any organised movements outside their control, including religious ones.</p>\r\n\r\n<p>Beijing has stepped up its crackdown on civil society since President Xi Jinping took power in 2012, tightening restrictions on freedom of speech and jailing hundreds of activists and lawyers.</p>\r\n\r\n<p>The constitution guarantees freedom of religious belief, a principle that Beijing says it upholds.</p>', 'chinese-county-bans-schoolchildren-from-mosques', 0, 1, 4, 2, '2018-06-27 08:25:45', '2018-06-27 08:25:45'),
(2, 'Black Pink becomes highest-charting K-pop girl group on Billboard’s Hot 100', '<p>Black Pink rewrote history as the highest-charting K-pop girl group ever on the Billboard 100 chart. (YG Entertainment/Straits Times/-)</p>\r\n\r\n<p>South Korean idol group Black Pink is not yet done breaking records.</p>\r\n\r\n<p>On Tuesday, the group rewrote history as the highest-charting K-pop girl group ever on the&nbsp;<em>Billboard&nbsp;</em>100 chart, as its latest single &ldquo;DDU-DU DDU-DU&rdquo; peaked at number 55 on the competitive ranking.</p>\r\n\r\n<p>According to a&nbsp;<em>K-Pop Herald</em>&nbsp;report, the act&rsquo;s single from its &ldquo;Square Up&ldquo; EP arrived with 12.4 million United States streams and 7,000 downloads sold in the tracking week ending June 21, based on stats from Nielsen Music. This prompted a number 39 entry on the Streaming Songs tally, where the act became the first K-pop girl group to chart a title.</p>\r\n\r\n<p>It is the first time a female K-pop act successfully landed on the Hot 100 chart since Wonder Girls&rsquo; English-version of &ldquo;Nobody&rdquo; debuted at number 76 in 2009, even surpassing 2NE1&rsquo;s record, set by its &ldquo;Crush&rdquo; that peaked at number 61.</p>\r\n\r\n<p>The U.S. magazine Billboard also stated that the four-piece group debuts at number 1 on Billboard&lsquo;s Emerging Artists chart, becoming the first all-female K-pop act to reign, and just the second K-pop group overall to lead the list, following SM Entertainment&rsquo;s NCT in May.</p>\r\n\r\n<p>The group&rsquo;s&nbsp;<em>Square Up</em>&nbsp;EP has peaked at no. 40 on Billboard 200, while six of its singles, including &ldquo;Forever Young&rdquo;, &ldquo;As If It&rsquo;s Your Last&rdquo; and &ldquo;Boombayah&rdquo; have also entered the magazine&rsquo;s World Digital Song Sales chart.</p>', 'black-pink-becomes-highest-charting-k-pop-girl-group-on-billboards-hot-100', 0, 1, 4, 3, '2018-06-27 08:27:26', '2018-06-27 08:27:26'),
(3, '5 apps for better mental health', '<p>In today&rsquo;s fast-paced world that always seems to be full of problems, the topic of mental health has never been more important.</p>\r\n\r\n<p>But what exactly is mental health?</p>\r\n\r\n<p>Many people think that true mental health is the absence of any disorders or diseases that affect the mind, and&nbsp;others believe the common myth&nbsp;that working on your mental health is only necessary for people with mental illnesses or issues, such as depression or anxiety.</p>\r\n\r\n<p>However,&nbsp;the true definition&nbsp;actually refers to a person&rsquo;s emotional, psychological and social well-being.&nbsp;This means that your mental health, just like your physical health, can change. Experiences and circumstances can have either a positive or negative effect on it.</p>\r\n\r\n<p>Smartphones and mobile apps have become inseparable from daily life. (Shutterstock/File)</p>\r\n\r\n<p>In today&rsquo;s fast-paced world that always seems to be full of problems, the topic of mental health has never been more important.</p>\r\n\r\n<p>But what exactly is mental health?</p>\r\n\r\n<p>Many people think that true mental health is the absence of any disorders or diseases that affect the mind, and&nbsp;others believe the common myth&nbsp;that working on your mental health is only necessary for people with mental illnesses or issues, such as depression or anxiety.</p>\r\n\r\n<p>However,&nbsp;the true definition&nbsp;actually refers to a person&rsquo;s emotional, psychological and social well-being.&nbsp;This means that your mental health, just like your physical health, can change. Experiences and circumstances can have either a positive or negative effect on it.</p>\r\n\r\n<p>Read also:&nbsp;Good social media experiences don&#39;t outweigh bad ones for young adults</p>\r\n\r\n<p>Everyone needs to take care of their mental well-being, especially as more and more people are being affected by mental illness. According to statistics,&nbsp;83 percent of the population&nbsp;will deal with a mental disorder or issue at one point in their lives.</p>\r\n\r\n<p>Thankfully, there are simple steps that everyone can take to improve their mental well-being and even combat some of the warning signs of illness or disorders. Science has proven that while some&nbsp;gaming apps can cause addictionand negatively impact the players&rsquo; mental health, there are some great apps and websites out there that can support a healthier, stronger mind.</p>\r\n\r\n<p>Here are five good ones to make note of.</p>\r\n\r\n<p><strong>1. Calm &ndash; Learn how to meditate</strong></p>\r\n\r\n<p><img alt=\"Calm is the perfect meditation app for beginners, but also includes hundreds of programs for intermediate and advanced users.\" src=\"http://img.jakpost.net/c/2018/06/21/2018_06_21_47904_1529549891._medium.jpg\" />Calm is the perfect meditation app for beginners, but also includes hundreds of programs for intermediate and advanced users. (iTunes/Calm.com)</p>\r\n\r\n<p>Meditation&nbsp;has been proven&nbsp;to support mental health, decrease anxiety and depression, relieve stress and even boost the immune system. However, many people find it difficult to not only find the time to meditate, but also figure out the best ways to do it.</p>\r\n\r\n<p>The&nbsp;Calm&nbsp;app teaches you to start quieting your mind by guiding you through breathing exercises and meditations that only take a few minutes to complete. The app even has calming music for restful sleep and stress relief to help you make meditation a healthy habit.</p>\r\n\r\n<p>Download Calm on&nbsp;iTunes&nbsp;or&nbsp;Google Play.</p>\r\n\r\n<p><strong>2. Book Writer &ndash; Share your creative writing</strong></p>\r\n\r\n<p><img alt=\"Make your own ebook with Book Writer. Anyone can easily make an ebook.\" src=\"http://img.jakpost.net/c/2018/06/21/2018_06_21_47907_1529549892._medium.jpg\" />Make your own ebook with Book Writer. Anyone can easily make an ebook. (iTunes/Good Effect)</p>\r\n\r\n<p>Finding a creative hobby is a great way to support a strong, healthy mind. Some of the best creative outlets for this are journaling, writing and reading.&nbsp;Psychologists have found&nbsp;that people who write &mdash; specifically about difficulties and personal problems &mdash; are able to cope with stress and trauma far better than those who keep their emotions bottled up. Creative writing&nbsp;can also help&nbsp;to improve thinking skills and lower depression and anxiety.</p>\r\n\r\n<p>If writing is a special gift or talent of yours, or one that you would like to explore further, Book Writer is an excellent program. The app lets you work with images and text to create high-quality ebooks that showcase your thoughts and creative prowess. You can also add audio, video and songs to the pages. Once your masterpiece is complete, it can be read as a PDF or in iBooks. In addition to improving your mental health, writing ebooks is a wonderful hobby to get good at. Once you start to gain some experience, you can think about getting your work published and&nbsp;start selling ebooks online.</p>\r\n\r\n<p>Start writing today and download Book Writer on&nbsp;iTunes.</p>\r\n\r\n<p><strong>3. Happify &ndash; Make happiness a habit</strong></p>\r\n\r\n<p><img alt=\"Happify brings you effective tools and programs to take control of your emotional well-being.\" src=\"http://img.jakpost.net/c/2018/06/21/2018_06_21_47906_1529549891._medium.jpg\" /></p>\r\n\r\n<p>Happify brings you effective tools and programs to take control of your emotional well-being. (iTunes/Happify, Inc.)</p>\r\n\r\n<p>Releasing negative thoughts and looking at the brighter side of things is a way to start living a happier life, but old habits do die hard. Many find it difficult to change their thought patterns, especially if they tend to be naturally pessimistic.</p>\r\n\r\n<p>Read also:&nbsp;Indonesian youths say religion key to happiness, bucking global trend</p>\r\n\r\n<p>The app&nbsp;Happify&nbsp;is seeking to change that. This app was founded by several renowned scientists, psychologists and other experts who found creative ways to combine their evidence-based research with meaningful activities. The online program evaluates each person&rsquo;s positive emotional level through unique assessments every week. It then uses science-backed exercises like mindfulness activities and even fun games to form new habits and help you build a new perspective on things.</p>\r\n\r\n<p>Get started today by downloading Happify on iTunes&nbsp;or&nbsp;Google Play.</p>\r\n\r\n<p><strong>4. Headspace &ndash; Practice mindfulness in an instant</strong></p>\r\n\r\n<p><img alt=\"Headspace is a simple way to reframe stress. \" src=\"http://img.jakpost.net/c/2018/06/21/2018_06_21_47905_1529549891._medium.jpg\" /></p>\r\n\r\n<p>Headspace is a simple way to reframe stress. (iTunes/Headspace meditation limited)</p>\r\n\r\n<p>&ldquo;Living mindfully&rdquo; and &ldquo;practicing mindfulness&rdquo; may sound a little out there, but it&rsquo;s actually a practical way of viewing life that can support better mental health. Mindfulness is essentially continuous meditation throughout the day. This doesn&rsquo;t mean just sitting with your eyes closed all day long. Instead, it is focusing on being present during each moment. A&nbsp;Harvard research team&nbsp;found that people who practiced mindful living had fewer mental health issues and were able to treat problems like post-traumatic stress disorder (PTSD), anxiety, depression and even chronic pain.</p>\r\n\r\n<p>Living more mindfully can be difficult to understand and practice, especially at first.&nbsp;Headspace&nbsp;can help you learn to live in the moment with a short, practical meditation series for every situation imaginable. Whether you are having a stressful moment or you want to relax and unwind, Headspace can help you focus your breathing and attention no matter what&rsquo;s going on in your mind.</p>\r\n\r\n<p>Start learning mindfulness today by downloading the app on&nbsp;iTunes&nbsp;or&nbsp;Google Play.</p>\r\n\r\n<p><strong>5. Lantern &ndash; Find online support for yourself</strong></p>\r\n\r\n<p><img alt=\"Each time you use Lantern, you’ll learn new techniques proven to reduce stress, or practice and strengthen your skills. \" src=\"http://img.jakpost.net/c/2018/06/21/2018_06_21_47908_1529549954._medium.jpg\" />Each time you use Lantern, you&rsquo;ll learn new techniques proven to reduce stress, or practice and strengthen your skills. (iTunes/Thrive Network, Inc.)</p>\r\n\r\n<p>Of course, many people who suffer from mental health issues turn to therapy for help and support. Talking to a licensed psychiatrist, psychologist, therapist or even a wise friend can certainly help people learn to cope or heal with problems. However, not everyone has access to help like this, and many cannot afford to seek professional help.</p>\r\n\r\n<p>Lantern&nbsp;helps to fill this need by providing customized and affordable support plans for every person. The app uses scientifically proved&nbsp;cognitive-behavioral therapy&nbsp;to identify problems and offer effective, actionable solutions. Users participate in a simple assessment to identify their strengths and weaknesses, as well as their desired goals and areas for improvement. From there, Lantern offers suggestions and daily exercises to help reach those goals. You can even connect with coaches and professionals to support your journey and provide assistance along the way.</p>', '5-apps-for-better-mental-health', 0, 1, 2, 1, '2018-06-27 08:52:38', '2018-06-27 20:22:14'),
(4, 'Opioids killed nearly 4,000 in Canada last year: Official', '<p>The opioid crisis claimed nearly 4,000 lives in Canada last year, mainly from overdoses of the powerful painkiller fentanyl, the public health agency said Tuesday, warning of a worsening situation.</p>\r\n\r\n<p>The death toll was 34 percent higher than the previous year, with most of the fatal overdoses involving men aged 30 to 39 who obtained fentanyl illegally from narcotics traffickers on the street.</p>\r\n\r\n<p>Almost 90 percent of the 3,987 deaths in 2017 were concentrated in just three provinces: Alberta, British Columbia and Ontario.</p>\r\n\r\n<p>&quot;Canada continues to experience a serious and growing opioid crisis,&quot; the public health agency said in a report.</p>\r\n\r\n<p>Fentanyl is considered 30 to 50 times more powerful than heroin and 50 to 100 times more potent than morphine.</p>\r\n\r\n<p>Health Minister Ginette Petitpas Taylor said &quot;high rates of opioid prescriptions&quot; are also a &quot;contributing factor in the crisis&quot;.</p>\r\n\r\n<p>&quot;As minister, I am calling on industry to act now and stop their marketing activities associated with these products in Canada,&quot; she said.</p>\r\n\r\n<p>The health ministry explained that while prescription opioids &quot;can help Canadians who need them to manage pain,&quot; marketing the drugs can unduly influence doctors and lead to &quot;over-prescription&quot;.</p>\r\n\r\n<p>According to public health agency figures, opioid prescriptions actually fell last year for the first time since 2012, to 21.3 million.</p>\r\n\r\n<p>In response to the crisis, Ottawa has poured tens of millions of dollars into strengthening emergency services and distributing the overdose antidote naloxone.</p>', 'opioids-killed-nearly-4000-in-canada-last-year-official', 0, 1, 1, 4, '2018-06-27 09:07:01', '2018-06-27 09:07:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2018-06-27 07:53:24', '2018-06-27 07:53:24'),
(2, 'user', 'User', 'User', '2018-06-27 07:53:26', '2018-06-27 07:53:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(2, 4, 'App\\User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` blob,
  `nickname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unknown',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `date_of_birth` date NOT NULL DEFAULT '2018-01-01',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `nickname`, `active`, `date_of_birth`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@app.com', '$2y$10$twiqeIGLfyilT/ch8d9iNerR5w4VjRT7VTapRjH0XJhFojr1cu9kK', NULL, 'Unknown', 1, '2018-01-01', '9W4koJsmWaZcSz8CYyYY8GPqg476LU9epX7C9ZlvcbkY2Btn6Vb4TX2NMVej', '2018-06-27 07:53:25', '2018-06-27 07:53:25'),
(2, 'User', 'user@app.com', '$2y$10$.Me4J6dWwspdn8Giaz.a8uxcyc3HdZ9RYangSdW13vW6JHqi/BUR.', NULL, 'Unknown', 1, '2018-01-01', 'KmuThWpECLoA0mb5JjaAqbjZnoL3HaVzMoiEX9rkYKyF5ibPLZOBbuO4itDu', '2018-06-27 07:53:27', '2018-06-27 07:53:27'),
(3, 'Cru User', 'cru_user@app.com', '$2y$10$zcEJKfeRITnfuGy3Uz12Ju5xLYpL1iA4ANf0Lw49Ww2cZfi63RfvW', NULL, 'Unknown', 1, '2018-01-01', 'vCJUPhrkNh', '2018-06-27 07:53:28', '2018-06-27 07:53:28'),
(4, 'LuongVanKiet', 'luongvankiet@app.com', '$2y$10$TsUK57G/Dcfubbjgx1nOJuO1EU6B7UF5Va0rTwPhUlZTneMeLvjKq', NULL, 'Unknown', 1, '2018-01-01', '2cMqqG93HfpQT52yGUG4mI3F70jv8XUVc5qvf34xoy4RAGAQFJsDgrJNiblY', '2018-06-27 08:14:17', '2018-06-27 08:14:17');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_user_id_foreign` (`user_id`),
  ADD KEY `images_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
