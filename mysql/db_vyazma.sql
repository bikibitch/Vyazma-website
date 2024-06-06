/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE IF NOT EXISTS `contacts` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `lname` varchar(50) DEFAULT NULL,
  `link` text,
  `so` int DEFAULT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `contacts` (`ID`, `lname`, `link`, `so`) VALUES
	(1, 'Группа Студгородка', 'https://vk.com/itmohome', 1),
	(2, 'Студсовет', 'https://t.me/vyazma_info', 2),
	(3, 'Важные новости', 'http://t.me/+LY9twRf3W7Q2MjM6', 3),
	(4, 'Флудилка', 'http://t.me/+KuOVaxCG1U8yMzky', 4),
	(5, 'Барахолка', 'http://t.me/+t90z7cgiAoJjMzcy', 5),
	(6, 'Заказ еды', 'http://t.me/joinchat/FMqy9D_IMIn78tmCEHDP7Q', 6);

CREATE TABLE IF NOT EXISTS `faq` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `header` text,
  `text` text,
  `so` int DEFAULT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `faq` (`ID`, `header`, `text`, `so`) VALUES
	(1, 'Правила проживания на этажах', '<ol>\r\n<li>Помните, что шуметь после 23.00 запрещено.</li><br>\r\n<li>Соблюдайте чистоту на кухнях, в умывальниках и туалетах. Не оставляйте в этих помещениях свои личные вещи (например, посуду), иначе в конце рабочего дня они могут быть выброшены, как мусор.</li><br>\r\n<li>Выбрасывать мусорные пакеты из комнат в урны на кухне ЗАПРЕЩЕНО. Выкидывайте мусор в мусоропровод. Крупногабаритный мусор необходимо выносить на улицу к контейнерам.</li><br>\r\n<li>Запрещено выставлять вещи в коридор, в том числе сушилки — для них есть отдельные помещения: возле перехода с 5 на 6 этаж блоков в младший корпус , 2 этаж коридорки старшего корпуса. Если вы переезжаете или проводите генеральную уборку, и вам очень нужно выставить вещи в коридор, повесьте на них записку с указанием комнаты и даты, когда вещи будут убраны.</li>\r\n</ol>', 1),
	(2, 'Как нумеруются дома в студгородке?', 'Номера домов возрастают по мере приближения к набережной (отдалению от поликлиники). Если смотреть на охрану снаружи, то справа будет 5-ый дом, а слева — 7-ой. Центральный корпус новый. В нем находятся команты блочного типа.', 2),
	(3, 'Как нумеруются комнаты?', 'В студгородке есть 2 типа комнат: коридорка и блоки.<br>\r\n				Комнаты коридорного типа находятся в правом и левом корпусах. Номера этих комнат состоят из 3 цифр: первая цифра — этаж, еще две— комната. Причем номер комнат правого корпуса всегда меньше 40, а номер комнат правого всегда больше 40.<br>\r\n				Комнаты блочного типа находятся в новом корпусе. Номера комнат состоят из 5 цифр:<br>\r\n				4 цифры — номер блока (например 1120), где первая (это всегда 1) показывает, что это новый корпус, вторая — этаж, а следующие две — номер блока<br>\r\n				5-ая цифра — комната: двушка (2) или трешка (3).<br>\r\n				По номеру можно легко понять, где искать комнату:<br>\r\n				1120-3 — блок в новом корпусе(много цифр) на 1 этаже, а комната трешка<br>\r\n				575 — комната в коридорке (мало цифр), на 5 этаже левого корпуса (комната больше 40)<br>\r\n				321 — комната в коридорке (мало цифр), на 3 этаже правого корпуса (комната меньше 40)', 3),
	(4, 'Сколько стоит общежитие?', 'Стоимость комнат незначительно меняется в зависимости от корпуса и этажа.<br>\r\nСущественно отличаются цена за комнату в коридорке и в блоке:<br>\r\nв блоке: примерно 1900р за месяц<br> в коридорке: примерно 1000р за месяц', 4),
	(5, 'Как провести в свою комнату интернет?', 'В коридорках у потолка над дверью находится вход для Ethernet-кабеля. Для подключения к локальной сети достаточно роутера и комплектующего кабеля папа-папа Ethernet. Дальше следует обратиться к секретарю Марине Юрьевне в кабинет 1117, где заполнить заявку на подключение к сети (подключается примерно неделю).<br>', 5),
	(6, 'Какую технику можно покупать в комнату?', 'Запрещены обогреватели и плиты с открытым нагревательным элементом, а также удлинители длиной больше 1,5 метра и меньше 16А. Удлинители лучше покупать с сетевым фильтром.<br>', 6),
	(7, 'Где рядом можно вкусно покушать?', 'Столовая студгородка на 1 этаже (большая деревянная дверь налево от поста охраны) – выбор не такой большой, как в университетских столовых, но кормят вкусно и недорого. А самое главное – никуда не нужно выходить.<br>', 7);

CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `message` text,
  `mdate` date DEFAULT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `messages` (`ID`, `uname`, `email`, `message`, `mdate`) VALUES
	(1, 'Алексей Щербаков', 'kidbreaker01@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in purus, sed tellus eget mattis nibh quam. Eu ornare nunc, id est. Erat consectetur etiam a sit diam in imperdiet amet. Diam nisl, ipsum suscipit amet', '2023-01-23'),
	(2, 'Нурлан Сабуров ', 'aaaa@mail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in purus, sed tellus eget mattis nibh quam. ', '2023-01-23'),
	(3, 'Сергей Орлов', 'lala@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in purus, sed tellus eget mattis nibh quam. Eu ornare nunc, id est. Erat consectetur etiam a sit diam in imperdiet amet. ', '2023-01-23');

CREATE TABLE IF NOT EXISTS `pages` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `etitle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rtitle` varchar(50) DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `so` int DEFAULT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `pages` (`ID`, `etitle`, `rtitle`, `content`, `so`) VALUES
	(1, 'main', 'Главная', '<!DOCTYPE html>\r\n<html lang = "ru">\r\n\r\n<head>\r\n	<link rel="stylesheet" type ="text/css"\r\n	href ="style.css">\r\n	<link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@100;200;300;400;500;600;700&family=Inter:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">\r\n	<link rel="preconnect" href="https://fonts.googleapis.com">\r\n	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>\r\n</head>\r\n\r\n<body> \r\n	<div main-content>\r\n\r\n		<div class="mainLogo">\r\n			<h2 class="text">Студенческий городок ITMO</h2>\r\n			<h3 class="text">Вяземский переулок 5-7</h3>\r\n		</div>\r\n		<div class="aboutMain">\r\n\r\n			<div class="h1">\r\n				<div class="lilRect"></div>\r\n				<h1 class="text">Об общежитии</h1>\r\n				<div class="lilRect" id="reverse"></div>\r\n			</div>\r\n\r\n			<div class="aboutBlocks">\r\n				<div class="aboutBlock">\r\n					<div class="aboutInfo">\r\n						<h1>Lorem Ipsum</h1>\r\n						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in purus, sed tellus eget mattis nibh quam. Eu ornare nunc, id est. Erat consectetur etiam a sit diam in imperdiet amet. Diam nisl, ipsum suscipit amet. Eleifend amet habitasse proin quis adipiscing. <br><br>Nisl convallis mauris in consequat. Sit ac vitae posuere maecenas dictumst quam. Felis amet diam, non augue massa. Egestas molestie lobortis rhoncus, elit nulla nisl. Habitant tortor at tempor. </p>\r\n					</div>\r\n					<div class="aboutImg1"></div>\r\n				</div>\r\n				<div class="aboutBlock about2">\r\n					<div class="aboutImg2"></div>\r\n					<div class="aboutInfo">\r\n						<h1>Lorem Ipsum</h1>\r\n						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Arcu cras quis ac a non ut viverra turpis eget. Hendrerit quis pulvinar massa ipsum sem. Donec posuere nulla enim non neque etiam. Eros arcu, pulvinar penatibus luctus ridiculus sagittis vel nunc hac. Nisi, diam tincidunt dui viverra. Eget quis ultricies sem nunc risus senectus luctus ultricies. Enim feugiat pharetra pharetra et.<br><br>Pulvinar arcu at morbi posuere cursus. Fermentum est sit enim velit ornare molestie. Ipsum nisi id sed tempor elementum. Mi nunc eget pellentesque ipsum. Suspendisse risus a id vel massa tincidunt. Hendrerit blandit in augue vel mi quam magna egestas. Fringilla ac lacus viverra ullamcorper leo, enim vitae id aliquam.</p>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</div>	\r\n\r\n		<div class="map">\r\n			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1996.5447039673504!2d30.299376016064294!3d59.972875581888616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46963153fc025b67%3A0xdee7007bb56a7792!2z0JLRj9C30LXQvNGB0LrQuNC5INC_0LXRgC4sIDUvNywg0KHQsNC90LrRgi3Qn9C10YLQtdGA0LHRg9GA0LMsIDE5NzAyMg!5e0!3m2!1sru!2sru!4v1669228314735!5m2!1sru!2sru" id="map" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>\r\n			<div class="mapinfo">\r\n				<h1 class="text">Студенческий городок</h1>\r\n				<div class="mapText">\r\n					<div class="mapRow">\r\n						<div class="mapImg"><img src="../images/geoloc.svg"></div>\r\n						<p>Вяземский переулок 5/7</p>\r\n					</div>\r\n					<div class="mapRow">\r\n						<div class="mapImg"><img src="../images/metro.svg"></div>\r\n						<p>м. Петроградская</p>\r\n					</div>\r\n					<div class="mapRow">\r\n						<div class="mapImg"><img src="../images/calendar.svg"></div>\r\n						<p>Круглосуточно</p>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n\r\n	</div>\r\n</body>\r\n</html>', 0),
	(2, 'services', 'Сервисы', 'services.php', 1),
	(3, 'staff', 'Сотрудники', 'staff.php', 2),
	(4, 'faq', 'FAQ', 'FAQ.php', 3),
	(5, 'contacts', 'Контакты', 'contacts.php', 4);

CREATE TABLE IF NOT EXISTS `reviews` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `mdate` date DEFAULT NULL,
  `service_ID` int DEFAULT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `reviews` (`ID`, `uname`, `message`, `mdate`, `service_ID`) VALUES
	(4, 'Сергей Орлов', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in purus, sed tellus eget mattis nibh quam. Eu ornare nunc, id est. Erat consectetur etiam a sit diam in imperdiet amet. Diam nisl, ipsum suscipit amet', '2022-06-22', 2),
	(5, 'Алексей Щербаков', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in purus, sed tellus eget mattis nibh quam. Eu ornare nunc, id est. Erat consectetur etiam a sit diam in imperdiet amet. Diam nisl, ipsum suscipit amet', '2022-11-24', 2),
	(1, 'Сергей Орлов', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in purus, sed tellus eget mattis nibh quam. Eu ornare nunc, id est. ', '2022-06-22', 1),
	(7, 'Сергей Орлов', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in purus, sed tellus eget mattis nibh quam. Eu ornare nunc, id est. Erat consectetur etiam a sit diam in imperdiet amet. Diam nisl, ipsum suscipit amet', '2022-06-22', 3),
	(8, 'Алексей Щербаков', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in purus, sed tellus eget mattis nibh quam. Eu ornare nunc, id est. Erat consectetur etiam a sit diam in imperdiet amet. Diam nisl, ipsum suscipit amet', '2022-11-24', 3),
	(2, 'Алексей Щербаков', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Diam nisl, ipsum suscipit amet', '2022-11-24', 1),
	(3, 'Нурлан Сабуров ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in purus, sed tellus eget mattis nibh quam. Eu ornare nunc, id est. Erat consectetur etiam a sit diam in imperdiet amet. Diam nisl, ipsum suscipit amet', '2023-04-09', 1),
	(6, 'Нурлан Сабуров', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in purus, sed tellus eget mattis nibh quam. Eu ornare nunc, id est. Erat consectetur etiam a sit diam in imperdiet amet. Diam nisl, ipsum suscipit amet', '2023-01-23', 2),
	(42, 'Анель Бикибаева', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in purus, sed tellus eget mattis nibh quam. Eu ornare nunc, id est. Erat consectetur etiam a sit diam in imperdiet amet.', '2023-01-26', 1);

CREATE TABLE IF NOT EXISTS `services` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `descript` text,
  `timetable` text,
  `so` int DEFAULT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `services` (`ID`, `name`, `photo`, `descript`, `timetable`, `so`) VALUES
	(1, 'Прачечная', '../images/stirka.png', 'Прием вещей на стирку за 40 минут до закрытия<br/>Дверь слева от вахты в фойе ', 'Пн - Пт: 07:30 - 21:30<br/>Сб - Вс: 09:00 - 17:00', 1),
	(2, 'Бельевая', '../images/belie.png', 'Прием грязного белья и выдача чистого<br/>Коридор слева от вахты, каб. 153', 'Ср - Чт: 08:30 - 20:00<br/>Перерыв: 14:00 - 14:30', 2),
	(3, 'Инженерная', '../images/remont.png', 'Услуги сантехника, электрика, плотника<br/><a href="https://forms.yandex.ru/u/6315eb4f89ca517c0142b377/">Подать заявку</a>', 'Пн - Пт: 09:00 - 18:00<br/>Перерыв: 13:00 - 14:00', 3),
	(20, 'fff', '', 'fff', 'ff', 0);

CREATE TABLE IF NOT EXISTS `staff` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `post` varchar(50) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `timetable` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `so` int DEFAULT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `staff` (`ID`, `post`, `name`, `photo`, `timetable`, `so`) VALUES
	(2, 'Заместитель директора', 'Осташова Надежда Владисвовна', '../images/avatar.png', 'Пн - Пт: 09:00 - 17:00<br/>Перерыв: 13:00 - 14:00', 2),
	(1, 'Директор студгородка', 'Татаринов Денис Александрович', '../images/avatar.png', 'Пн - Пт: 09:00 - 18:00<br/>Перерыв: 13:00 - 14:00', 1),
	(4, 'Паспортист студгородка', 'Василенко Елена Викторовна', '../images/avatar.png', 'Пн - Пт: 09:00 - 18:00<br/>Перерыв: 13:00 - 14:00', 4),
	(3, 'Комендант студгородка', 'Ткачева Марина Викторовна', '../images/avatar.png', 'Пн - Пт: 09:00 - 18:00<br/>Перерыв: 13:00 - 14:00', 3),
	(5, 'Психолог студгородка', 'Жердева Янина Викторовна', '../images/avatar.png', 'Пн - Пт: 15:00 - 12:00<br/><a class="text" href="https://vk.com/yaninazherdeva">Записаться</a>', 5);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
