-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour jeuxvascript
CREATE DATABASE IF NOT EXISTS `peyo4811_jeuxvascript` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `peyo4811_jeuxvascript`;

-- Listage de la structure de la table jeuxvascript. admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table jeuxvascript.admin : ~2 rows (environ)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `email`, `pseudo`, `password`) VALUES
	(4, 'yo44prg@icloud.com', 'kirua', '$2y$10$v9Afr.pp6o8O/xCHkV9y9e0nIp8dlNuLHTm5AnnztINSE8TFKPp5O'),
	(5, 'yo44prg@icloud.com', 'kirua', '$2y$10$WXVaqMU0sFDCdWSEuxtJU.2uJ7CJWYgBYc8naLssaqBn/FpWkZErG');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Listage de la structure de la table jeuxvascript. articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `extract` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `images` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Listage des données de la table jeuxvascript.articles : ~8 rows (environ)
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `users_id`, `category_id`, `title`, `extract`, `content`, `images`, `created_date`) VALUES
	(22, 33, 2, 'DWARFHEIM, UN JEU DE STRAT&Eacute;GIE', 'En pleine expansion, le royaume des nains recherche de nouvelles terres pour s\'y implanter. Cependant, les trolls poss&egrave;dent un domaine limitrop', 'En pleine expansion, le royaume des nains recherche de nouvelles terres pour s\'y implanter. Cependant, les trolls poss&egrave;dent un domaine limitrophe aux r&eacute;gions conquises et la confrontation risque d\'&eacute;clater &agrave; tout moment, que ce soit en plein air ou sous-terre.\r\n\r\nDwarfHeim est un jeu de strat&eacute;gie coupl&eacute; &agrave; un city builder dans un univers heroic-fantasy. On devra y construire une ville occup&eacute;e par les nains, mais aussi engranger un maximum de minerais pour se tenir &agrave; la pointe de la technologie militaire. Il est &eacute;galement question d\'&eacute;laborer un plan de d&eacute;fense du territoire tant les attaques de trolls risquent de se multiplier.\r\n\r\nUne partie de DwarfHeim se d&eacute;roule sur plusieurs champs de bataille. En effet, pendant que les villageois b&acirc;tissent leur cit&eacute; et leurs d&eacute;fenses, dans les souterrains, des nains creusent et cr&eacute;ent des galeries pour acheminer les ressources vers la surface. Le jeu poss&eacute;dera ainsi, 4 classes compl&eacute;mentaires, un mode coop&eacute;ratif jouable en ligne, un mode comp&eacute;titif. Il est en d&eacute;veloppement sur Windows et Mac OS. Pour le moment, aucune date de sortie pr&eacute;cise n\'a &eacute;t&eacute; annonc&eacute;e.', 'galerie-dwarfheim_4.jpg', '2020-05-19 15:09:11'),
	(23, 33, 2, 'NIMBATUS, LE JEU DE CR&Eacute;ATION DE VAISSEAUX', 'Arriv&eacute; en acc&egrave;s anticip&eacute; en octobre 2018, Nimbatus est un jeu de construction de vaisseaux spatiaux qu\'il faudra utiliser au mieu', 'Arriv&eacute; en acc&egrave;s anticip&eacute; en octobre 2018, Nimbatus est un jeu de construction de vaisseaux spatiaux qu\'il faudra utiliser au mieux pour explorer l\'univers au travers de toute une s&eacute;rie de missions vari&eacute;es. Son originalit&eacute; est de pouvoir cr&eacute;er int&eacute;gralement son v&eacute;hicule spatial et d\'associer des touches aux divers modules utilis&eacute;s.\r\n\r\nOn trouvera ainsi toute une vari&eacute;t&eacute; de pi&egrave;ces &agrave; inclure dans son vaisseau, allant naturellement des propulsions aux moteurs en passant par des stockages d\'&eacute;nergie, des boucliers ou toute une vari&eacute;t&eacute; d\'armes &agrave; la consommation vari&eacute;e pour se d&eacute;fendre d\'entit&eacute;s hostiles quand on ne devra pas creuser les plan&egrave;tes. Les technologies pourront &eacute;voluer au fil de la progression en offrant de nouvelles pi&egrave;ces &agrave; utiliser. Le jeu sortira d\'acc&egrave;s anticip&eacute; le 14 mai sur Windows, Mac et Linux pour 16,79&euro;.', 'galerie-nmbatus_4_0.jpg', '2020-05-19 15:11:13'),
	(24, 33, 3, 'NEVERSONG, LE SOMBRE JEU D\'AVENTURE', 'Nouveau jeu du cr&eacute;ateur de Pinstripe, Neversong (anciennement Once Upon a Coma) est un jeu d\'aventure dans de sombres environnements dans leque', 'Nouveau jeu du cr&eacute;ateur de Pinstripe, Neversong (anciennement Once Upon a Coma) est un jeu d\'aventure dans de sombres environnements dans lequel on contr&ocirc;lera un enfant se r&eacute;veillant d\'un coma dans un monde ayant bien chang&eacute;. Peupl&eacute; de garnements mal intentionn&eacute;s, d\'insectes carnivores et autres zombies, celui-ci semble vide du moindre adulte.\r\n\r\nDans ce cauchemar, il faudra tenter de retrouver sa s&oelig;ur en &eacute;tant simplement arm&eacute; d\'un rasoir et r&eacute;soudre toute une vari&eacute;t&eacute; de puzzles au fil des &eacute;crans. Certains secrets pourraient par ailleurs se r&eacute;v&eacute;ler tandis qu\'on jouera quelques fragments de m&eacute;lodie au piano. On devra &eacute;galement trouver de nouvelles capacit&eacute;s pour pouvoir progresser dans l\'aventure. Le jeu arrivera le 20 mai 2020 sur Windows et Linux.', 'galerie-once-upon-coma_4.jpg', '2020-05-19 15:12:04'),
	(25, 33, 2, 'SCRAP MECHANIC REVIENT AVEC SON MODE SURVIE', 'Sorti en tout d&eacute;but d\'ann&eacute;e 2016 en acc&egrave;s anticip&eacute;, Scrap Mechanic est un jeu de construction orient&eacute; bac &agrave; ', 'Sorti en tout d&eacute;but d\'ann&eacute;e 2016 en acc&egrave;s anticip&eacute;, Scrap Mechanic est un jeu de construction orient&eacute; bac &agrave; sable qui proposait alors comme de nombreux jeux depuis de cr&eacute;er des v&eacute;hicules et autres structures en assemblant les pi&egrave;ces une &agrave; une. D&eacute;j&agrave; &agrave; l\'&eacute;poque, de nombreux types de m&eacute;canismes &eacute;taient disponibles pour laisser libre cours &agrave; son imagination.\r\n\r\nEn l\'espace de 4 ans, le jeu a (heureusement) profit&eacute; de nombreuses mises &agrave; jour &eacute;toffant le panel de possibilit&eacute;s. Plus de pi&egrave;ces, plus de variations, des am&eacute;lioration des menus et probablement toute une vari&eacute;t&eacute; de choses qu\'il est difficile d\'imaginer sans avoir suivi le jeu &agrave; la trace depuis toutes ses ann&eacute;es (ce qui est un peu notre cas). Pour autant, Scrap Mechanic va bient&ocirc;t passer une &eacute;tape importante &agrave; travers l\'arriv&eacute;e d\'un mode survie.\r\n\r\nCe renouveau du jeu proposera des contenus in&eacute;dits ainsi que des centaines de pi&egrave;ces pour les b&acirc;timents. On y trouvera un monde ouvert avec des ennemis et des lieux &agrave; explorer, une am&eacute;lioration graphique, de l\'optimisation et bien d\'autres choses, incluant notamment de la d&eacute;fense de base, de la nourriture et de l\'agriculture. Bref, le trailer fait on ne peut plus envie et promet de belles heures de jeux. Cette mise &agrave; jour arrivera aujourd\'hui, le 7 mai sur Windows, tandis que le jeu est disponible pour 19,99&euro; en acc&egrave;s anticip&eacute;.', 'galerie-scrap-mechanic_5_0.jpg', '2020-05-19 15:13:27'),
	(26, 33, 2, 'CHILDREN OF MORTA REVIENT', 'En d&eacute;but d\'ann&eacute;e, les cr&eacute;ateurs de Children of Morta annon&ccedil;aient le plan de route des futures mises &agrave; jour qui arri', 'En d&eacute;but d\'ann&eacute;e, les cr&eacute;ateurs de Children of Morta annon&ccedil;aient le plan de route des futures mises &agrave; jour qui arriveraient en 2020. Trois mois apr&egrave;s &quot;Shrine of Challenge&quot; qui ajoutait de nombreux d&eacute;fis comme notamment un mode difficile et de nouveaux monstres, une nouvelle mise &agrave; jour est arriv&eacute;e.\r\n\r\nNomm&eacute;e Setting Sun Inn, on y trouve notamment un New Game + qui permettra de reprendre l\'aventure du d&eacute;but avec ses personnages toujours au m&ecirc;me niveau, une cinquantaine de nouvelles sc&egrave;nes d\'histoire ainsi que de missions principales et secondaires suppl&eacute;mentaires. Pour rappel, Children of Morta est un jeu d\'action dynamique aux &eacute;l&eacute;ments de rogue dans lequel il faudra parcourir des donjons aux commandes diff&eacute;rents membres d\'une famille pour lutter contre une corruption se r&eacute;pandant sur leur montagne. Le jeu est disponible sur Windows, Mac, Switch, PS4 et Xbox One pour 21,99&euro;.', 'galerie-children-morta_3_0.png', '2020-05-19 15:14:17'),
	(27, 33, 2, 'FLY PUNCH BOOM!', 'Tandis qu\'il y a seulement un mois,  Fly Punch Boom nous proposait une d&eacute;mo pour d&eacute;couvrir son gameplay a&eacute;rien, le jeu revient av', 'Tandis qu\'il y a seulement un mois,  Fly Punch Boom nous proposait une d&eacute;mo pour d&eacute;couvrir son gameplay a&eacute;rien, le jeu revient avec une date de sortie prochaine. Ce jeu de combat nous proposera d\'affronter ses ennemis dans les airs dans une ambiance proche du cartoon. \r\n\r\nCompos&eacute;s de dash, de propulsions et de finishers, les affrontements demanderont de faire preuve d\'adresse. On trouverara notamment un syst&egrave;me de shifumi lors de certaines confrontations directes, des priorit&eacute;s d\'action et des tests d\'adresse rendus plus difficiles &agrave; mesure que les d&eacute;g&acirc;ts re&ccedil;us seront &eacute;lev&eacute;s. Le jeu proposera ainsi des combats en local &agrave; 4 ou en ligne &agrave; 2, un mode arcade avec des &eacute;l&eacute;ments &agrave; d&eacute;bloquer et plus d\'une quarantaine de finishers d&eacute;cal&eacute;s. Il arrivera le 28 mai sur Windows et Switch.', 'galerie-fly-punch-boom_1_0.jpg', '2020-05-19 15:15:22'),
	(28, 33, 2, 'SAMUDRA, UN JEU D\'AVENTURE', 'Au fond d\'un plateau oc&eacute;anique, un jeune gar&ccedil;on portant un &eacute;trange scaphandre sur les &eacute;paules se r&eacute;veille. Perdu da', 'Au fond d\'un plateau oc&eacute;anique, un jeune gar&ccedil;on portant un &eacute;trange scaphandre sur les &eacute;paules se r&eacute;veille. Perdu dans un lieu qu\'il ne conna&icirc;t pas, il devra partir &agrave; l\'aventure et explorer les environs pour en d&eacute;voiler les secrets. En cours de route, il fera au passage quelques rencontres inattendues. \r\n\r\nSAMUDRA est un jeu d\'aventure se d&eacute;roulant dans les profondeurs d\'un oc&eacute;an. On y incarnera un gar&ccedil;on se retrouvant dans un endroit sombre et silencieux, sans aucun indice permettant d\'identifier o&ugrave; il se trouve. Marchant &agrave; t&acirc;tons et affubl&eacute; d\'un lourd scaphandre, il se d&eacute;marrera une aventure surr&eacute;aliste.\r\n\r\nSAMUDRA poss&egrave;de une interface relativement discr&egrave;te tandis que les puzzles appara&icirc;tront en identifiant un probl&egrave;me (sous forme d\'une bulle de dialogue), comme un obstacle &agrave; franchir. Le jeu se concentrera sur une atmosph&egrave;re aussi &eacute;nigmatique que fantastique. Il est actuellement en d&eacute;veloppement sur Windows et devrait voir le jour plus tard dans l\'ann&eacute;e et propose une d&eacute;mo.', 'galerie-samudra_2_0.jpg', '2020-05-19 15:17:05'),
	(29, 33, 3, 'DAWNTHORN, UN ZELDA-LIKE', 'Dans un royaume &agrave; la paix relativement durable, une jeune femme d&eacute;cide de se lancer dans une qu&ecirc;te p&eacute;rilleuse. Elle n\'a que', 'Dans un royaume &agrave; la paix relativement durable, une jeune femme d&eacute;cide de se lancer dans une qu&ecirc;te p&eacute;rilleuse. Elle n\'a que tr&egrave;s peu d\'informations sur cette derni&egrave;re, mais souhaitant an&eacute;antir le mal une fois pour toute, elle part &agrave; la recherche d\'une s&eacute;rie de donjons connus pour accueillir des forces mal&eacute;fiques.\r\n\r\nDawnthorn est un jeu d\'action-aventure contant l\'histoire d\'une h&eacute;ro&iuml;ne ent&ecirc;t&eacute;e, mais brave, parcourant le monde pour d&eacute;faire la source du mal. Pendant 15 &agrave; 20 heures, on se verra confier une &eacute;p&eacute;e, une baguette magique et d\'autres puissantes reliques afin de triompher les d&eacute;dales des donjons qu\'on rencontrera lors de sa travers&eacute;e.\r\n\r\nDawnthorn est un prequel d\'Hazelnut Bastille, il s\'inspire de la s&eacute;rie des jeux The Legend of Zelda sortie sur consoles portable. Il sera question d\'explorer diff&eacute;rents environnements &agrave; la recherche de ch&acirc;teaux ou de grottes renfermant des adversaires dangereux dans l\'objectif de leur subtiliser un objet essentiel &agrave; la progression de l\'intrigue et des comp&eacute;tences du protagoniste. Le jeu est actuellement en d&eacute;veloppement sur Windows, Mac et Linux et devrait sortir cette ann&eacute;e.', 'galerie-dawnthorn_3_0.jpg', '2020-05-19 15:18:28');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;

-- Listage de la structure de la table jeuxvascript. category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table jeuxvascript.category : ~6 rows (environ)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`) VALUES
	(1, 'pixel-art'),
	(2, 'monde de l\'indé'),
	(3, 'nouveaux jeux'),
	(4, 'c\'etait mieux avant (rétro)'),
	(5, 'au secours'),
	(6, 'divers');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Listage de la structure de la table jeuxvascript. comment
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(250) NOT NULL,
  `users_id` int(11) unsigned NOT NULL,
  `article_id` int(11) unsigned NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `pseudo_users` (`users_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Listage des données de la table jeuxvascript.comment : ~1 rows (environ)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`id`, `content`, `users_id`, `article_id`, `created_date`) VALUES
	(11, 'G&eacute;nial', 33, 22, '2020-05-19 15:36:16');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Listage de la structure de la table jeuxvascript. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Listage des données de la table jeuxvascript.users : ~2 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `pseudo`, `password`) VALUES
	(33, 'yo44prg@icloud.com', 'kirua', '$2y$10$HVqJUc43q6FkuqNSTZxpxODtHD1pwlMxU.HA4InaQC6wKG8U5nHs6'),
	(34, 'yo44prg@icloud.com', 'plop', '$2y$10$edK2zgp7N3oOoafY0WHFBu8P3wtBsXQzI/QYA/4DaVjx2zPmVh3qq');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
