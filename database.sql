-- CREATION DE LA BASE DE DONNEES
CREATE DATABASE voyage_management;
USE voyage_management;

-- TABLE UTILISATEURS (USER)
CREATE TABLE utilisateurs (
    id_utilisateur INT AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    email VARCHAR(150) UNIQUE,
    role ENUM('SuperAdmin', 'Admin', 'Client'),
    mot_de_passe VARCHAR(255),
    PRIMARY KEY (id_utilisateur)
);

-- TABLE ACTIVITES
CREATE TABLE activites (
    id_activite INT AUTO_INCREMENT,
    titre VARCHAR(150),
    description TEXT,
    prix DECIMAL(10,2),
    date_debut DATE,
    date_fin DATE,
    type ENUM('Vol','Circuit','Hotel'),
    places_disponibles INT,
    PRIMARY KEY (id_activite)
);



-- TABLE RESERVATIONS
CREATE TABLE reservations (
    id_reservation INT AUTO_INCREMENT,
    id_client INT,
    id_activite INT,
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    nbr_personne INT NOT NULL,
    statut ENUM('En Attente', 'Confirmée', 'Annulée'),
    PRIMARY KEY (id_reservation),
    FOREIGN KEY (id_client) REFERENCES utilisateurs(id_utilisateur) 
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_activite) REFERENCES activites(id_activite) 
        ON UPDATE CASCADE ON DELETE CASCADE
);

