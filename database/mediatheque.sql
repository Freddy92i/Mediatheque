-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 26 août 2022 à 14:21
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mediatheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `RefCat` int(10) UNSIGNED NOT NULL,
  `categorie` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`RefCat`, `categorie`) VALUES
(1, 'Drame'),
(2, 'Comédie'),
(3, 'Thriller'),
(4, 'Action'),
(5, 'Horreur'),
(6, 'Fantastique'),
(7, 'Polar'),
(8, 'Western'),
(9, 'Conte'),
(10, 'Blockbuster');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(40) COLLATE utf8_bin NOT NULL,
  `duree` int(10) NOT NULL,
  `resume` varchar(500) COLLATE utf8_bin NOT NULL,
  `realisateur` varchar(40) COLLATE utf8_bin NOT NULL,
  `RefCat` int(10) UNSIGNED NOT NULL,
  `img` varchar(500) COLLATE utf8_bin NOT NULL,
  `img_alt` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `nom`, `duree`, `resume`, `realisateur`, `RefCat`, `img`, `img_alt`) VALUES
(1, 'Fight Club', 151, 'Le narrateur, sans identité précise, vit seul, travaille seul, dort seul, mange seul ses plateaux-repas pour une personne comme beaucoup d`autres personnes seules qui connaissent la misère humaine, morale et sexuelle.', 'David Fincher', 1, 'https://m.media-amazon.com/images/M/MV5BMjJmYTNkNmItYjYyZC00MGUxLWJhNWMtZDY4Nzc1MDAwMzU5XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg', 'https://fr.web.img6.acsta.net/newsv7/19/11/08/16/08/5224089.jpg'),
(2, 'Intouchable', 107, 'A la suite d\'un accident de parapente, Philippe, riche aristocrate, engage comme aide à domicile Driss, un jeune de banlieue tout juste sorti de prison! ', 'Eric Toledano', 2, 'http://fr.web.img6.acsta.net/r_1280_720/medias/nmedia/18/82/69/17/19806656.jpg', 'https://img-4.linternaute.com/Dy4dkW0Rx1TsNouefRK4fBwu_iQ=/1240x/smart/ab776450d63d40f2bc8be58abf7bd918/ccmcms-linternaute/11588577.jpg'),
(3, 'Gravity', 91, 'En mission à bord de la navette Explorer, l\'astronaute Matt Kowalski et la docteure Ryan Stone, experte en ingénierie médicale, sortent de l\'appareil afin d\'effectuer des réparations sur le télescope Hubble. Bientôt, l\'un et l\'autre sont pris dans une gigantesque tempête de débris provenant de la destruction d\'un satellite. Seuls survivants de leur équipage, les deux astronautes doivent à tout prix rejoindre la station spatiale internationale pour revenir sains et saufs sur Terre.', 'Alfonso Cuaràn', 1, 'http://fr.web.img2.acsta.net/c_215_290/pictures/210/232/21023233_20130729173134181.jpg', 'https://www.premiere.fr/sites/default/files/styles/scale_crop_1280x720/public/2020-01/gg.jpg'),
(4, 'Gladiator', 171, 'Le général romain Maximus est le plus fidèle soutien de l\'empereur Marc Aurèle, qu`il a conduit de victoire en victoire avec une bravoure et un dévouement exemplaires.', 'Ridley Scott', 4, 'https://is1-ssl.mzstatic.com/image/thumb/Video71/v4/85/1c/82/851c823f-271e-877f-21ef-766b29f3a3a6/mzm.gjakfclu.lsr/268x0w.png', 'https://images.rtl.fr/~c/2000v2000/rtl/www/1327175-gladiator-avait-ete-recompense-de-5-oscars-lors-de-sa-sortie.jpg'),
(5, 'Django Unchained', 165, 'Le parcours d\'un chasseur de prime allemand et d`un homme noir pour retrouver la femme de ce dernier retenue en esclavage par le propriétaire d`une plantation...', 'Quentin Tarantino', 4, 'https://cdn-s-www.republicain-lorrain.fr/images/36776e02-4297-454f-a6da-0a27f3e1144c/BES_06/illustration-django-unchained_1-1531087962.jpg', 'https://media.gqmagazine.fr/photos/5dea6130061f7b00082f3405/master/pass/Djangounchained.jpg'),
(6, 'Old Boy', 120, 'A la fin des années 80, Oh Dae-Soo, père de famille sans histoire, est enlevé un jour devant chez lui.', 'Park Chan-wook', 5, 'http://fr.web.img6.acsta.net/c_215_290/medias/nmedia/18/35/24/25/18383433.jpg', 'https://www.critikat.com/wp-content/uploads/fly-images/32152/arton173-1450x800-c.jpg'),
(7, 'Dracula', 155, 'En 1492, le prince Vlad Dracul, revenant de combattre les armées turques, trouve sa fiancée suicidée.', 'Francis Ford Coppola', 5, 'http://fr.web.img6.acsta.net/c_215_290/medias/nmedia/18/64/49/73/18857494.jpg', 'https://www.ecranlarge.com/uploads/image/001/156/dracula-photo-claes-bang-dracula-1156688.jpg'),
(8, 'Retour vers le futur', 154, '1985. Le jeune Marty McFly mène une existence anonyme auprès de sa petite amie Jennifer, seulement troublée par sa famille en crise et un proviseur qui serait ravi de l\'expulser du lycée.', 'Robert Zemeckis', 6, 'http://fr.web.img3.acsta.net/c_215_290/medias/nmedia/18/35/91/26/18686482.jpg', 'https://cdn-europe1.lanmedia.fr/var/europe1/storage/images/europe1/medias-tele/retour-vers-le-futur-que-sont-devenus-les-heros-du-film-2906756/29921987-1-fre-FR/Retour-vers-le-futur-que-sont-devenus-les-heros-du-film.jpg'),
(9, 'Inception', 148, 'Dom Cobb est un voleur expérimenté à le meilleur qui soit dans l\'art périlleux de l\'extraction : sa spécialité consiste à s\'approprier les secrets les plus précieux d`un individu', 'Christopher Nolan', 6, 'https://m.media-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_UX182_CR0,0,182,268_AL_.jpg', 'https://www.lyoncapitale.fr/wp-content/uploads/2018/08/inception-770x433.jpg'),
(10, 'Spider-Man 2', 135, '2 ans après avoir choisi sa vie de super-héros, Peter Parker ne parvient plus à gérer sa double vie. Il perd son boulot, Mary-Jane sait qu\'elle ne peut plus compter sur lui, et ses études prennent le même chemin.', 'Sam Raimi', 6, 'https://aws.vdkimg.com/film/6/4/5/4/64543_poster_scale_188x250.jpg', 'https://pic.clubic.com/v1/images/2006343/raw'),
(11, '300', 117, 'Adapté du roman graphique de Frank Miller, 300 est un récit épique de la Bataille des Thermopyles, qui opposa en l\'an - 480 le roi Léonidas et 300 soldats spartiates à Xerxes et l\'immense armée perse.', 'Zack Snyder', 7, 'https://aws.vdkimg.com/film/4/1/0/4/4104_poster_scale_188x250.jpg', 'http://img.over-blog-kiwi.com/1/07/73/44/20180605/ob_05d4ce_300.jpg'),
(12, 'WALL-E', 98, 'Faites la connaissance de WALL-E (prononcez \"Walli\") : WALL-E est le dernier être sur Terre et s\'avère être un... petit robot ! 700 ans plus tôt, l\'humanité a déserté notre planète laissant à cette incroyable petite machine le soin de nettoyer la Terre.', 'Andrew Stanton', 9, 'https://aws.vdkimg.com/film/5/0/8/7/50876_poster_scale_188x250.jpg', 'https://fr.web.img5.acsta.net/newsv7/20/08/04/11/47/3624091.jpg'),
(13, 'Le Château ambulant', 119, 'La jeune Sophie, âgée  de 18 ans, travaille sans relâche dans la boutique de chapelier que tenait son père avant de mourir. Lors de l\'une de ses rares sorties en ville, elle fait la connaissance de Hauru le Magicien. Celui-ci est extrêmement séduisant, mais n\'a pas beaucoup de caractères...', 'Hayao Miyazaki', 9, 'https://aws.vdkimg.com/film/7/6/2/6/76265_poster_scale_188x250.jpg', 'https://fr.web.img6.acsta.net/newsv7/20/04/20/14/57/1927772.jpg'),
(14, 'Il était une fois dans l\'Ouest', 175, 'Alors qu\'il prépare une fête pour sa femme, Bet McBain est tué avec ses trois enfants. Jill McBain hérite alors des terres de son mari, terres que convoite Morton, le commanditaire du crime (celles-ci ont de la valeur maintenant que le chemin de fer doit y passer). Mais les soupçons se portent sur un aventurier, Cheyenne...', 'Sergio Leone', 8, 'https://aws.vdkimg.com/film/7/2/3/3/7233_poster_scale_188x250.jpg', 'https://www.telerama.fr/sites/tr_master/files/styles/simplecrop1000/public/medias/2016/09/media_148066/revoir-l-ouverture-magistrale-de-il-etait-une-fois-dans-l-ouest%2CM376275.jpg?itok=A4OUbek-'),
(15, 'Les Huit salopards', 187, 'Après la Guerre de Sécession, huit voyageurs se retrouvent coincés dans un refuge au milieu des montagnes. Alors que la tempête s\'abat au-dessus du massif, ils réalisent qu\'ils n\'arriveront peut-être pas à rallier Red Rock comme prévu...', 'Quentin Tarantino', 8, 'https://aws2.vdkimg.com/film/1/1/9/6/1196585_poster_scale_188x250.jpg', 'https://www.premiere.fr/sites/default/files/styles/scale_crop_1280x720/public/2019-11/Les%208%20salopards.jpg'),
(16, 'Bienvenue chez les Ch\'tis', 106, 'Philippe Abrams est directeur de la poste de Salon-de-Provence. Il est marié à Julie, dont le caractère dépressif lui rend la vie impossible. Pour lui faire plaisir, Philippe fraude afin d\'obtenir une mutation sur la Côte d\'Azur.', 'Dany Boon', 2, 'https://aws.vdkimg.com/film/4/9/6/0/4960_poster_scale_188x250.jpg', 'https://external-images.premiere.fr/sites/default/files/styles/scale_crop_1280x720/public/2019-05/Chtis.jpg'),
(17, 'Shining', 146, 'Jack Torrance, gardien d\'un hôtel fermé l\'hiver, sa femme et son fils Danny s\'apprêtent à vivre de longs mois de solitude. Danny, qui possède un don de médium, le Shining, est effrayé à l\'idée d\'habiter ce lieu, théâtre marqué par de terribles évènements passés...', 'Stanley Kubrick', 3, 'https://aws3.vdkimg.com/film/6/3/7/5/63755_poster_scale_188x250.jpg', 'https://www.critikat.com/wp-content/uploads/fly-images/35049/arton1312-1450x800-c.jpg'),
(18, 'The Dark Knight : Le Chevalier Noir', 152, 'Batman est plus que jamais déterminé à éradiquer le crime organisé qui sème la terreur en ville. Epaulé par le lieutenant Jim Gordon et par le procureur de Gotham City, Harvey Dent, Batman voit son champ d\'action s\'élargir. La collaboration des trois hommes s\'avère très efficace et ne tarde pas à porter ses fruits jusqu\'à ce qu\'un criminel redoutable vienne plonger la ville de Gotham City dans le chaos.', 'Christopher Nolan', 3, 'https://aws.vdkimg.com/film/5/1/9/4/51946_poster_scale_188x250.jpg', 'http://img.over-blog-kiwi.com/0/92/63/65/20150822/ob_8d26bb_the-dark-knight-00.png'),
(19, 'Pulp Fiction', 178, 'L\'odyssée sanglante et burlesque de petits malfrats dans la jungle de Hollywood à travers trois histoires qui s\'entremêlent. Dans un restaurant, un couple de jeunes braqueurs, Pumpkin et Yolanda, discutent des risques que comporte leur activité. Deux truands, Jules Winnfield et son ami Vincent Vega, qui revient d\'Amsterdam, ont pour mission de récupérer une mallette au contenu mystérieux et de la rapporter à Marsellus Wallace.', 'Quentin Tarantino', 7, 'https://aws.vdkimg.com/film/6/1/3/3/61333_poster_scale_188x250.jpg', 'https://www.rts.ch/2022/04/04/10/56/9962004.image?w=0&h=NaN'),
(20, 'Jurassic Park', 127, 'Ne pas réveiller le chat qui dort -- c\'est ce que le milliardaire John Hammond aurait dû se rappeler avant de se lancer dans le clonage de dinosaures. C\'est à partir d\'une goutte de sang absorbée par un moustique fossilisé que John Hammond et son équipe ont réussi à faire renaître une dizaine d\'espèces de dinosaures. Il s\'apprête maintenant avec la complicité du docteur Alan Grant, paléontologue de renom, et de son amie Ellie, à ouvrir le plus grand parc à thème du monde.', 'Steven Spielberg', 10, 'https://aws.vdkimg.com/film/7/6/3/7/7637_poster_scale_188x250.jpg', 'https://media.vanityfair.fr/photos/60d372542a21839d00a02fed/16:9/w_1280,c_limit/vf_jurassic_park_7587.jpeg'),
(22, 'Les Dents De La Mer', 130, 'À quelques jours du début de la saison estivale, les habitants de la petite station balnéaire d\'Amity sont en émoi face à la découverte, sur le littoral, du corps atrocement mutilé d\'une jeune vacancière. Pour Martin Brody, le chef de la police, il ne fait aucun doute que la jeune fille a été victime d\'un requin. Il décide alors d\'interdire l\'accès des plages mais se heurte à l\'hostilité du maire, uniquement intéressé par l\'afflux des touristes.', 'Steven Spielberg', 10, 'https://aws.vdkimg.com/film/1/0/7/0/10709_poster_scale_188x250.jpg', 'https://imgsrc.cineserie.com/2020/06/les-dents-de-la-mer-a-45-ans-decouvrez-des-anecdotes-de-tournage.jpg?ver=1');

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(100) COLLATE utf8_bin NOT NULL,
  `mail` varchar(100) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(255) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(255) COLLATE utf8_bin NOT NULL,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`id`, `role`, `mail`, `mdp`, `prenom`, `nom`) VALUES
(14, 'admin', 'freddypeltier21@outlook.fr', '$2y$10$..i20Cp1kG8chlcZ7kqgHOa.H58E2NuxM7SsjQ/xFSXvtPJDq8sqe', 'freddy', 'peltier');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD KEY `RefCat` (`RefCat`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefCat` (`RefCat`),
  ADD KEY `RefCat_2` (`RefCat`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `RefCat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `fk_categorie_refcat` FOREIGN KEY (`RefCat`) REFERENCES `categorie` (`RefCat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
