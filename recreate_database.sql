-- Script de recréation de la base de données Mangathèque
-- Création de la base de données
CREATE DATABASE IF NOT EXISTS pdw2022;
USE pdw2022;

-- Table des rôles utilisateurs
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    comment TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Création des rôles par défaut
INSERT INTO roles (id, name, comment) VALUES 
(1, 'user', 'Utilisateur normal'),
(2, 'admin', 'Administrateur');

-- Table des utilisateurs
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(100) NOT NULL,
    firstname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    avatar VARCHAR(255) DEFAULT NULL,
    id_role INT NOT NULL DEFAULT 1,
    password VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_role) REFERENCES roles(id) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table des genres de manga
CREATE TABLE genres (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    nom_genre VARCHAR(50) NOT NULL,
    description TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table des maisons d'édition
CREATE TABLE edition (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    nom_edition VARCHAR(100) NOT NULL,
    pays VARCHAR(50),
    annee_creation INT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table des mangas
CREATE TABLE mangas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    auteur VARCHAR(100) NOT NULL,
    image VARCHAR(255),
    nb_tomes INT,
    id_genres INT,
    id_edition INT,
    publication DATE,
    description TEXT,
    FOREIGN KEY (id_genres) REFERENCES genres(ID) ON DELETE SET NULL,
    FOREIGN KEY (id_edition) REFERENCES edition(ID) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table de la collection de mangas des utilisateurs
CREATE TABLE collection (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    id_users INT NOT NULL,
    id_mangas INT NOT NULL,
    FOREIGN KEY (id_users) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (id_mangas) REFERENCES mangas(id) ON DELETE CASCADE,
    UNIQUE KEY unique_collection (id_users, id_mangas)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table des envies de mangas des utilisateurs
CREATE TABLE envies (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    id_users INT NOT NULL,
    id_mangas INT NOT NULL,
    FOREIGN KEY (id_users) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (id_mangas) REFERENCES mangas(id) ON DELETE CASCADE,
    UNIQUE KEY unique_envie (id_users, id_mangas)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table pour les demandes d'aide
CREATE TABLE helppage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    sujet VARCHAR(255) NOT NULL,
    requete TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insertion de données d'exemple pour les genres
INSERT INTO genres (nom_genre, description) VALUES
('Shonen', 'Manga destiné principalement aux adolescents masculins'),
('Shojo', 'Manga destiné principalement aux adolescentes'),
('Seinen', 'Manga destiné aux jeunes adultes masculins'),
('Josei', 'Manga destiné aux jeunes adultes féminins'),
('Kodomo', 'Manga destiné aux enfants'),
('Ecchi', 'Manga comportant des scènes suggestives'),
('Hentai', 'Manga pornographique'),
('Yaoi', 'Manga centré sur les relations homosexuelles masculines'),
('Yuri', 'Manga centré sur les relations homosexuelles féminines'),
('Mecha', 'Manga mettant en scène des robots géants'),
('Magical Girl', 'Manga où une jeune fille reçoit des pouvoirs magiques'),
('Isekai', 'Manga où le protagoniste est transporté dans un autre monde');

-- Insertion de données d'exemple pour les maisons d'édition
INSERT INTO edition (nom_edition, pays, annee_creation) VALUES
('Shueisha', 'Japon', 1925),
('Kodansha', 'Japon', 1909),
('Shogakukan', 'Japon', 1922),
('Hakusensha', 'Japon', 1973),
('Square Enix', 'Japon', 2003),
('Glénat', 'France', 1969),
('Kana', 'France', 1996),
('Pika', 'France', 2000),
('Ki-oon', 'France', 2003),
('Delcourt/Tonkam', 'France', 1995),
('Viz Media', 'États-Unis', 1986),
('Yen Press', 'États-Unis', 2006);
