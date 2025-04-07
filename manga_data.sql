-- Script d'insertion de 20 mangas avec des images
-- Utilisez ce script après avoir créé la base de données avec recreate_database.sql

USE pdw2022;

-- Nettoyage de la table mangas (optionnel - décommentez si nécessaire)
-- DELETE FROM mangas;
-- ALTER TABLE mangas AUTO_INCREMENT = 1;

-- Insertion des mangas
INSERT INTO mangas (titre, auteur, image, nb_tomes, id_genres, id_edition, publication, description) VALUES 
('One Piece', 'Eiichiro Oda', 'https://m.media-amazon.com/images/I/51TJbw0PADL._SY291_BO1,204,203,200_QL40_ML2_.jpg', 104, 1, 1, '1997-07-22', 'L''histoire de Monkey D. Luffy qui devient un pirate pour trouver le trésor légendaire, le One Piece.'),

('Naruto', 'Masashi Kishimoto', 'https://m.media-amazon.com/images/I/51RgRqvfwBL._SY291_BO1,204,203,200_QL40_ML2_.jpg', 72, 1, 1, '1999-09-21', 'L''histoire de Naruto Uzumaki, un jeune ninja qui cherche à obtenir la reconnaissance de ses pairs et rêve de devenir le leader de son village.'),

('Dragon Ball', 'Akira Toriyama', 'https://m.media-amazon.com/images/I/51YjIZ8bKsL._SX338_BO1,204,203,200_.jpg', 42, 1, 2, '1984-11-20', 'Les aventures de Son Goku depuis l''enfance jusqu''à l''âge adulte, tandis qu''il s''entraîne aux arts martiaux et explore le monde à la recherche des sept boules de cristal.'),

('Demon Slayer', 'Koyoharu Gotouge', 'https://m.media-amazon.com/images/I/51VYlk-JU4L._SY291_BO1,204,203,200_QL40_ML2_.jpg', 23, 1, 1, '2016-02-15', 'L''histoire de Tanjiro Kamado qui devient un chasseur de démons après que sa famille a été massacrée et sa sœur transformée en démon.'),

('My Hero Academia', 'Kohei Horikoshi', 'https://m.media-amazon.com/images/I/51FufP5cXzL._SY291_BO1,204,203,200_QL40_ML2_.jpg', 36, 1, 2, '2014-07-07', 'Dans un monde où 80% de la population possède un super-pouvoir, Izuku Midoriya, né sans don, rêve pourtant de devenir un héros.'),

('Death Note', 'Tsugumi Ohba', 'https://m.media-amazon.com/images/I/51SkSDhUidL._SY291_BO1,204,203,200_QL40_ML2_.jpg', 12, 3, 1, '2003-12-01', 'Light Yagami, un étudiant surdoué, découvre un carnet qui tue toute personne dont le nom y est inscrit. Il décide de s''en servir pour éliminer les criminels.'),

('Attack on Titan', 'Hajime Isayama', 'https://m.media-amazon.com/images/I/51Q8L5j5D8L._SY291_BO1,204,203,200_QL40_ML2_.jpg', 34, 3, 2, '2009-09-09', 'Dans un monde où l''humanité vit retranchée derrière d''immenses murs pour se protéger de titans mangeurs d''hommes, Eren Yeager jure de se venger après une terrible tragédie.'),

('Fullmetal Alchemist', 'Hiromu Arakawa', 'https://m.media-amazon.com/images/I/51grRNVG72L._SY291_BO1,204,203,200_QL40_ML2_.jpg', 27, 1, 3, '2001-07-12', 'Deux frères, Edward et Alphonse Elric, pratiquent l''alchimie pour tenter de ressusciter leur mère, mais l''opération tourne mal. Ils partent en quête de la pierre philosophale pour réparer leurs erreurs.'),

('Jujutsu Kaisen', 'Gege Akutami', 'https://m.media-amazon.com/images/I/51UJqHOgmHL._SY291_BO1,204,203,200_QL40_ML2_.jpg', 22, 1, 1, '2018-03-05', 'Yuji Itadori, un lycéen, rejoint une école d''exorcisme après avoir ingéré le doigt d''un démon pour protéger ses amis.'),

('Tokyo Ghoul', 'Sui Ishida', 'https://m.media-amazon.com/images/I/51QS9DBtQvL._SX352_BO1,204,203,200_.jpg', 14, 3, 4, '2011-09-08', 'Ken Kaneki, un étudiant ordinaire, se retrouve transformé en demi-ghoul après une greffe d''organes. Il doit apprendre à vivre dans le monde des ghouls tout en préservant son humanité.'),

('One Punch Man', 'ONE', 'https://m.media-amazon.com/images/I/51GlmVLP6eL._SY291_BO1,204,203,200_QL40_ML2_.jpg', 26, 1, 2, '2009-06-14', 'L''histoire de Saitama, un super-héros capable de vaincre n''importe quel ennemi d''un seul coup de poing, mais qui s''ennuie à cause de sa trop grande puissance.'),

('Hunter x Hunter', 'Yoshihiro Togashi', 'https://m.media-amazon.com/images/I/51+bwZz-WbL._SY344_BO1,204,203,200_.jpg', 36, 1, 1, '1998-03-03', 'Gon Freecss part à la recherche de son père, un Hunter d''élite. Pour le retrouver, il décide de passer l''examen de Hunter, mais la route sera semée d''embûches.'),

('Made in Abyss', 'Akihito Tsukushi', 'https://m.media-amazon.com/images/I/51FaMPYuKiL._SY291_BO1,204,203,200_QL40_ML2_.jpg', 11, 10, 5, '2012-10-20', 'Riko, une orpheline de 12 ans, rêve de devenir exploratrice de l''Abysse, un trou mystérieux aux profondeurs peuplées de créatures étranges et d''artefacts précieux.'),

('Chainsaw Man', 'Tatsuki Fujimoto', 'https://m.media-amazon.com/images/I/519eF76J2NL._SY291_BO1,204,203,200_QL40_ML2_.jpg', 13, 3, 1, '2018-12-03', 'Denji, un jeune homme pauvre, fusionne avec son chien-démon-tronçonneuse et devient Chainsaw Man pour gagner sa vie en chassant d''autres démons.'),

('Fruits Basket', 'Natsuki Takaya', 'https://m.media-amazon.com/images/I/51Pq8ImsR1L._SY291_BO1,204,203,200_QL40_ML2_.jpg', 23, 2, 6, '1998-07-14', 'Tohru Honda, une orpheline, découvre que la famille Soma est maudite : ses membres se transforment en animaux du zodiaque chinois lorsqu''ils sont enlacés par une personne du sexe opposé.'),

('Monster', 'Naoki Urasawa', 'https://m.media-amazon.com/images/I/51NFK1AhLQL._SY291_BO1,204,203,200_QL40_ML2_.jpg', 18, 3, 7, '1994-12-05', 'Le Dr. Kenzo Tenma sauve la vie d''un jeune garçon, mais découvre plus tard que celui-ci est devenu un tueur en série. Tenma part à sa poursuite pour l''arrêter.'),

('Slam Dunk', 'Takehiko Inoue', 'https://m.media-amazon.com/images/I/51nwC1BQZnL._SY291_BO1,204,203,200_QL40_ML2_.jpg', 31, 1, 1, '1990-10-01', 'Hanamichi Sakuragi, un délinquant, rejoint l''équipe de basket de son lycée pour impressionner une fille, mais finit par développer une véritable passion pour ce sport.'),

('Vagabond', 'Takehiko Inoue', 'https://m.media-amazon.com/images/I/51GbgEMrrGL._SY291_BO1,204,203,200_QL40_ML2_.jpg', 37, 3, 2, '1998-09-03', 'L''histoire romancée de Miyamoto Musashi, le plus célèbre samouraï du Japon, et son parcours pour devenir "l''invincible sous le ciel".'),

('Berserk', 'Kentaro Miura', 'https://m.media-amazon.com/images/I/516+nJqHMfL._SY344_BO1,204,203,200_.jpg', 41, 3, 8, '1989-08-25', 'Guts, un mercenaire solitaire marqué par un passé tragique, poursuit une vengeance implacable contre son ancien compagnon d''armes devenu un démon.'),

('Vinland Saga', 'Makoto Yukimura', 'https://m.media-amazon.com/images/I/51QS9DBtQvL._SY291_BO1,204,203,200_QL40_ML2_.jpg', 26, 3, 2, '2005-04-13', 'L''histoire de Thorfinn, fils d''un grand guerrier tué par des mercenaires, qui rejoint ces derniers pour se venger de leur chef mais finira par découvrir un autre chemin.');
