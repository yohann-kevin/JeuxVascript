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
CREATE DATABASE IF NOT EXISTS `jeuxvascript` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `jeuxvascript`;

-- Listage de la structure de la table jeuxvascript. admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table jeuxvascript.admin : ~1 rows (environ)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `email`, `pseudo`, `password`) VALUES
	(4, 'yo44prg@icloud.com', 'kirua', '$2y$10$v9Afr.pp6o8O/xCHkV9y9e0nIp8dlNuLHTm5AnnztINSE8TFKPp5O');
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Listage des données de la table jeuxvascript.articles : ~6 rows (environ)
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `users_id`, `category_id`, `title`, `extract`, `content`, `images`, `created_date`) VALUES
	(15, 14, 4, 'WILDFIRE, LE JEU D\'INFILTRATION ', 'financ&eacute; en 2015 et particuli&egrave;rement discret depuis 2017, Wildfire est un jeu d\'infiltration dans lequel notre personnage sera capable de', 'financ&eacute; en 2015 et particuli&egrave;rement discret depuis 2017, Wildfire est un jeu d\'infiltration dans lequel notre personnage sera capable de manipuler le feu &agrave; son avantage. En effet, apr&egrave;s la chute d\'un m&eacute;t&eacute;ore, il aura gagn&eacute; la capacit&eacute; de manipuler des boules de feu avec ses mains, lui permettant d\'enflammer l\'environnement.\r\n\r\nAvec pour objectif de sauver les membres de son village captur&eacute;s, le h&eacute;ros devra parcourir des environnements 2D, niveau apr&egrave;s niveau, qui seront farouchement gard&eacute;s par quelques soldats de l\'arm&eacute;e ennemie. Il faudra alors se faufiler jusqu\'&agrave; ses camarades en ayant &eacute;ventuellement nettoy&eacute; la route jusqu\'&agrave; la sortie pour pouvoir les sauver.\r\n\r\nLa principale m&eacute;canique du jeu consistera &agrave; obtenir des charges de feu depuis des feux de camp ou des torches pour enflammer les herbes et effrayer (ou tuer) ses ennemis. Le jeu poss&egrave;de &agrave; pr&eacute;sent une date de sortie : ce sera le 26 mai sur Windows ! Si vous souhaitez en apprendre davantage, n\'h&eacute;sitez pas &agrave; retourner sur l\'article de preview du jeu proposant &eacute;galement une vid&eacute;o !', 'wildfire.jpg', '2020-04-24 12:17:51'),
	(16, 14, 3, 'DORDOGNE, UN JEU D\'AVENTURE ', 'DORDOGNE, UN JEU D\'AVENTURE EN PLEINE NOSTALGIE DANS LE D&Eacute;PARTEMENT DE LA DORDOGNE !!! \r\n\r\nMimi est une jeune femme de 32 ans explorant la mais', 'DORDOGNE, UN JEU D\'AVENTURE EN PLEINE NOSTALGIE DANS LE D&Eacute;PARTEMENT DE LA DORDOGNE !!! \r\n\r\nMimi est une jeune femme de 32 ans explorant la maison de sa grand-m&egrave;re r&eacute;cemment d&eacute;c&eacute;d&eacute;e. Cette derni&egrave;re lui a &eacute;crit une lettre permettant &agrave; sa petite fille de se rem&eacute;morer l\'&eacute;poque de son enfance, entre insouciance et jeu de piste en Dordogne. \r\n\r\nDordogne est un jeu d\'aventure se d&eacute;roulant dans le pr&eacute;sent de Mimi, mais &eacute;galement dans son pass&eacute;. Arriv&eacute;e dans la demeure de sa grand-m&egrave;re malheureusement d&eacute;c&eacute;d&eacute;e, elle va revivre son enfance &agrave; travers une lettre l\'enivrant de nostalgie. Il sera question de parcourir la nature, de r&eacute;pertorier des objets et des sons, mais &eacute;galement de prendre des photos &agrave; placer dans un album.\r\n\r\nDordogne nous emm&egrave;nera dans une aventure narrative contant les souvenirs de familles de deux personnes proches tout en proposant puzzles, &eacute;nigmes, et autres activit&eacute;s dont l\'enregistrement de sons &agrave; glisser dans le journal de Mimi. Le jeu est actuellement en d&eacute;veloppement sur Windows, Mac et Nintendo Switch et devrait sortir l\'ann&eacute;e prochaine. \r\n\r\n\r\n\r\n', 'dordogne.jpg', '2020-04-24 12:19:56'),
	(17, 14, 3, 'MECHS V KAIJUS', 'Inspir&eacute; de la culture japonaise, les Kaijus sont d\'immenses cr&eacute;atures venant d\'on ne sait o&ugrave; qui ravagent du jour au lendemain de', 'Inspir&eacute; de la culture japonaise, les Kaijus sont d\'immenses cr&eacute;atures venant d\'on ne sait o&ugrave; qui ravagent du jour au lendemain des villes enti&egrave;res. Son plus c&eacute;l&egrave;bre repr&eacute;sentant n\'est autre que Godzilla, mais il existe une v&eacute;ritable pl&eacute;thore de monstres ayant inspir&eacute; toute une vari&eacute;t&eacute; d&rsquo;&oelig;uvres.\r\n\r\nMechs V Kaijus est un jeu orient&eacute; tower defense en 2D dans lequel il faudra r&eacute;sister &agrave; une invasion de monstres g&eacute;ants s\'attaquant aux villes. Pour faire face &agrave; la menace, ce sont toutes une vari&eacute;t&eacute; d\'unit&eacute;s militaires dont on pourra se servir, des tanks aux h&eacute;licopt&egrave;res, en passant par quelques armes fantasm&eacute;es que sont les m&eacute;chas g&eacute;ants, &agrave; la fa&ccedil;on du film Pacific Rim ou d\'Evangelion.\r\n\r\nConcr&egrave;tement, c&ocirc;t&eacute; gameplay, ce sont plusieurs m&eacute;chas g&eacute;ants que l\'on pourra engager et qui tiendront une ligne de d&eacute;fense face aux hordes de monstres s\'abattant sur les murailles. Au fil des ennemis vaincus et de l\'argent engrang&eacute;, de nouvelles d&eacute;fenses ou unit&eacute;s basiques pourront &ecirc;tre ajout&eacute;es, tout comme des murailles suppl&eacute;mentaires.\r\n\r\nEntre les missions, les m&eacute;chas des mercenaires pourront &ecirc;tre am&eacute;lior&eacute;s &agrave; travers diff&eacute;rents aspects tandis que des cr&eacute;dits technologiques sera &agrave; d&eacute;penser pour offrir toute une vari&eacute;t&eacute; de nouvelles unit&eacute;s &agrave; utiliser au mieux dans sa strat&eacute;gie, ou des am&eacute;liorations de base. Le jeu est actuellement en acc&egrave;s anticip&eacute; sur Windows pour 8,99&euro;.', 'mechs.png', '2020-04-24 12:23:15'),
	(18, 14, 3, 'CURSE OF THE DEAD GODS', 'LE JEU D\'ACTION ROGUE ANNONCE SON ARRIVE PROCHAINE\r\n\r\nNouveau projet du studio Passtech Games, que l\'on connait pour le tower defense spatial Space Ru', 'LE JEU D\'ACTION ROGUE ANNONCE SON ARRIVE PROCHAINE\r\n\r\nNouveau projet du studio Passtech Games, que l\'on connait pour le tower defense spatial Space Run Galaxy et le pikmin-like Masters of Anima, Curse of the Dead Gods est jeu d\'action-aventure aux &eacute;l&eacute;ments de rogue dont on peut rapprocher le syst&egrave;me d\'Had&egrave;s, le dernier jeu de Supergiant Games (Bastion, Transistor, Pyre).\r\n\r\n\r\nL\'aventure se d&eacute;roulera dans un temple et nous proposera d\'incarner un personnage devant &eacute;liminer de nombreux monstres pour progresser. Avec un syst&egrave;me d\'embranchement dans le choix des futures salles, fa&ccedil;on Slay the Spire ou FTL, il sera possible &agrave; chaque partie de r&eacute;cup&eacute;rer des armes de corps &agrave; corps ou &agrave; distance pour personnaliser le h&eacute;ros. Diverses am&eacute;liorations pourront &eacute;galement &ecirc;tre obtenue, notamment en sacrifiant de sa vie ou en prenant davantage de mal&eacute;diction apportant des malus au fil des salles et venant contrebalancer l\'am&eacute;lioration du h&eacute;ros. Le studio a annonc&eacute; la date d\'arriv&eacute;e du jeu en acc&egrave;s anticip&eacute; : ce sera le 3 mars sur Windows. Et pour la peine, un trailer a &eacute;t&eacute; d&eacute;voil&eacute;.', 'galerie-curse-dead-gods.jpg', '2020-04-24 12:24:42'),
	(19, 14, 2, 'DES PERSONNAGES EN KIT, PAR L\'ATELIER SENT&Ocirc;', 'La pause syndicale est obligatoire, m&ecirc;me pour les h&eacute;ros de jeu vid&eacute;o ! Pourtant, ils n\'ont pas de machine &agrave; caf&eacute; o&u', 'La pause syndicale est obligatoire, m&ecirc;me pour les h&eacute;ros de jeu vid&eacute;o ! Pourtant, ils n\'ont pas de machine &agrave; caf&eacute; o&ugrave; se retrouver... Comment meublent-ils le temps entre deux clics ? Une enqu&ecirc;te exclusive de l\'Atelier Sent&ocirc;.\r\n\r\n\r\nCe sont les animations de base, susceptibles d\'&ecirc;tre utilis&eacute;es dans toutes les sc&egrave;nes qui composent le jeu. Elles seront lanc&eacute;es automatiquement : par exemple, quand le joueur clique sur un point du d&eacute;cor, le jeu lancera l\'animation walk. Et s\'il y a dialogue, le jeu lancera l\'animation talk. Tout cela sans que le d&eacute;veloppeur n\'ait &agrave; s\'en pr&eacute;occuper, ce qui &eacute;conomise beaucoup de temps.\r\n\r\nSur ces 4 animations de base, 2 sont optionnelles : run et talk. Dans The Coral Cave, Mizuka ne court pas et il existe des jeux sans dialogue (comme Machinarium). Donc pour cr&eacute;er un point-and-click, seuls sont indispensables, idle et walk. Le second est &eacute;vident et on commence souvent par cr&eacute;er une belle animation de marche pour son personnage. Le r&ocirc;le de idle peut sembler un peu flou mais il n\'est pas moins important : c\'est ce que fait le personnage... quand il ne fait rien ! Par d&eacute;faut, c\'est une simple image fixe en position debout, dans les diff&eacute;rentes directions (face, profil, 3/4, &hellip;) :\r\n\r\nUn point-and-click demande de la r&eacute;flexion et le joueur laisse souvent le personnage dans un coin, le temps de trouver comment r&eacute;soudre telle ou telle &eacute;nigme. L\'animation idle joue alors un r&ocirc;le capital pour donner vie au personnage dans ces p&eacute;riodes d\'attente.\r\n\r\nLa mani&egrave;re la plus discr&egrave;te consiste &agrave; le faire respirer. C\'est une animation qui fonctionne bien quand elle est subtile et qui est donc plus simple &agrave; r&eacute;aliser sur le principe de l\'animation Flash comme par exemple dans Broken Age :\r\n\r\n\r\nAvec cette technique, plut&ocirc;t que de redessiner plusieurs fois le personnage pour l\'animer, on dessine s&eacute;par&eacute;ment ses membres puis on les assemble &agrave; la mani&egrave;re d\'une marionnette en papier d&eacute;coup&eacute;. On peut alors cr&eacute;er toutes sortes d\'animations : par exemple, la marche en faisant pivoter les jambes. C\'est donc la technique id&eacute;ale pour cr&eacute;er une animation idle subtile : on dilate le torse, on balance les bras et voil&agrave;, on a l\'impression que le personnage respire, qu\'il est vivant.\r\n\r\nMais quand, comme nous, on dessine chaque pose s&eacute;par&eacute;ment, ce genre d\'animation subtile est difficile &agrave; r&eacute;aliser. C\'est pourquoi, dans The Coral Cave, on a cherch&eacute; une autre solution pour Mizuka, notre h&eacute;ro&iuml;ne. Apr&egrave;s plusieurs tests, nous avons choisi une animation en 2 temps : elle cligne des yeux &agrave; intervalles plus ou moins r&eacute;gulier. Et de temps en temps, elle tourne la t&ecirc;te pour regarder autour d\'elle.\r\n\r\nIl faut se rappeler que Mizuka est dessin&eacute;e sous 8 directions (face, dos, deux profils et quatre 3/4), cela fait un grand nombre d\'animations et il faut se montrer &eacute;conomes aussi bien en travail qu\'en utilisation de la m&eacute;moire de l\'ordinateur : on ne va pas redessiner tout le corps si ce n\'est pas n&eacute;cessaire. C\'est donc avant tout par &eacute;conomie (et non par cruaut&eacute;) qu\'on a d&eacute;cid&eacute; de lui couper la t&ecirc;te et de lui enlever les yeux.\r\n\r\nUne fois recompos&eacute;e dans le logiciel, Frankenzuka peut cligner des yeux et tourner la t&ecirc;te ind&eacute;pendamment du reste de son corps. Et comme on a r&eacute;utilis&eacute; autant que possible les t&ecirc;tes des autres directions, on obtient une animation l&eacute;g&egrave;re et discr&egrave;te qui suffit &agrave; donner de la vie au personnage dans les moments d\'inaction\r\n\r\nReste un dernier cas de figure, la super animation idle : une sorte d\'animation bonus qui ne se lance que quand le personnage reste immobile sur une longue p&eacute;riode. Les point-and-click s\'amusent souvent &agrave; briser le 4&egrave;me mur et cette animation est l\'occasion pour le personnage de faire sentir qu\'il commence &agrave; s\'ennuyer et que ce serait bien de se remettre &agrave; jouer.\r\n\r\nImaginez par exemple : vous faites une pause pipi et, pendant ce temps, Mizuka s\'occupe en faisant des ricochets dans l\'eau avec les items les plus pr&eacute;cieux de votre inventaire, vous condamnant &agrave; ne jamais pouvoir finir le jeu ! Pas mal comme id&eacute;e, vous ne trouvez pas ?', 'article_img06_anim.gif', '2020-04-24 12:27:10'),
	(20, 14, 2, 'LES COLLISIONS DANS UN JEU EN 2D', 'Nous avons vu comment les collisions fonctionnent dans un jeu bas&eacute; sur la grille. Apr&egrave;s avoir jet&eacute; un &oelig;il au gameplay d&rsq', 'Nous avons vu comment les collisions fonctionnent dans un jeu bas&eacute; sur la grille. Apr&egrave;s avoir jet&eacute; un &oelig;il au gameplay d&rsquo;Ori and the Blind Forest, nous allons nous int&eacute;resser aujourd&rsquo;hui au comportement des collisions dans les jeux en 2d.\r\n\r\nIl existe un certain nombre d&rsquo;outils et de syst&egrave;mes plus ou moins complexes pour g&eacute;rer les collisions dans les jeux vid&eacute;o. Ici, ce qui nous int&eacute;resse, ce sont les 2 algorithmes les plus simples et les plus utilis&eacute;s: les collisions par superposition de bo&icirc;tes englobantes, et le lancer de rayons. Ils sont non seulement flexibles et puissants, mais ils sont aussi utilis&eacute;s en combinaison avec des algorithmes plus pouss&eacute;s pour maximiser les performances d&rsquo;un moteur physique par exemple.\r\n\r\nPour mieux situer les choses, le AABB et le Ray Casting, ce sont les 2 principaux outils dont disposaient les d&eacute;veloppeurs &agrave; l&rsquo;&eacute;poque de la Super Nintendo. Ils couvraient les besoins d&rsquo;&eacute;norm&eacute;ment de types de jeux, de Zelda &agrave; Mario en passant par Chrono Trigger.', 'collision2d.png', '2020-04-24 12:40:46');
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

-- Listage des données de la table jeuxvascript.comment : ~7 rows (environ)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`id`, `content`, `users_id`, `article_id`, `created_date`) VALUES
	(4, 'test', 17, 13, '2020-04-10 17:09:02'),
	(5, 'cette article est vraiment g&eacute;nial', 17, 10, '2020-04-10 17:30:02'),
	(7, 'super !', 14, 13, '2020-04-16 16:06:02'),
	(8, 'plop test', 14, 0, '2020-04-25 18:53:07'),
	(9, 'plop', 14, 0, '2020-04-25 18:53:42'),
	(10, 'plop', 14, 0, '2020-04-25 18:55:08'),
	(11, 'plop test', 14, 15, '2020-04-25 18:56:03');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Listage de la structure de la table jeuxvascript. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Listage des données de la table jeuxvascript.users : ~14 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `pseudo`, `password`) VALUES
	(14, 'plop@plop.plop', 'plop', '$2y$10$hBkCJ1kWxhdblexnCCo8MumFUL96IjWHA7tCimHUGTxIIsJDi4bHq'),
	(15, 'jsp@jsp.com', 'jsp', '$2y$10$r/4SNcuubc3wD0NwvrUGseRQ9BODSLHRiyKpgS6KLK3tDd/9eg18.'),
	(16, 'plop@plop.plop', 'michel', '$2y$10$vqiPo4FuQmNctqu626dQYuTo8A6PtwGiPJxkQ3xsK8A0tmIg5EvIu'),
	(17, 'plop@plop.plop', 'toto', '$2y$10$r/4SNcuubc3wD0NwvrUGseRQ9BODSLHRiyKpgS6KLK3tDd/9eg18.'),
	(18, 'yo44prg@icloud.com', 'tutu', '$2y$10$r/4SNcuubc3wD0NwvrUGseRQ9BODSLHRiyKpgS6KLK3tDd/9eg18.'),
	(19, 'plop@plop.plop', 'titi', '$2y$10$r/4SNcuubc3wD0NwvrUGseRQ9BODSLHRiyKpgS6KLK3tDd/9eg18.'),
	(20, 'yo44prg@icloud.com', 'zozo', '$2y$10$r/4SNcuubc3wD0NwvrUGseRQ9BODSLHRiyKpgS6KLK3tDd/9eg18.'),
	(21, 'jectjrpas@jsp.jsp', 'albert', '$2y$10$bKqHKrhaBwsve88VjYcwPed6zi6taCEHCxJBBwNmPxlwhMN4y92AS'),
	(23, 'plop@plop.plopi', 'plopi', '$2y$10$2iJr1biO0Q6FcWAmQJgG7uBTBS.bllE7EaR37eibCU2Oi9Irma2o.'),
	(28, 'xaja@xaja.xaja', 'xaja', '$2y$10$l7uxU17Qwf3xh04NfxrL.O1etzX7DVP9Byqns1343nvIbV1nS.ImO'),
	(29, 'yo44prg@icloud.com', 'jesaispas', '$2y$10$erp6Pi0mbyazmh29KOAANOBo835gx197tcHQIynlgWT2DrAHqPfcu'),
	(30, 'newTest@test.test', 'test', '$2y$10$F.lMjmd2ksIn1vJs/y8jnutS9m37dpSXnnlHPCZ/jmO/Xw9.lhQDS'),
	(31, 'toto@toto.com', 'letoto', '$2y$10$3DzjkHTxeSHE0rJ00HbUOuUpkaZ8z3Ae9n0egEt8XvMzDahRHhqtW'),
	(32, 'plop@plop.plop', 'waja', '$2y$10$wAAjAqpbAHGftcFvB.RlkeCgHbJmcx8Lm0uCeiv91W2fi8lStB7CS');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
