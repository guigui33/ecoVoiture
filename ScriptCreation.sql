CREATE TABLE Utilisateurs (
    IdUser INTEGER PRIMARY KEY,
    Mail VARCHAR(320) UNIQUE,
    Login VARCHAR(30) UNIQUE NOT NULL,
    MotDePasse VARCHAR(20) NOT NULL,
    Nom VARCHAR(50),
    Prenom VARCHAR(50),
    Telephone INTEGER,
    DateNaissance DATE,
    APropos VARCHAR(200),
    UrlImage VARCHAR(100),
	IdResidence INTEGER
    );
 
CREATE TABLE Voitures (
    IdVoiture INTEGER PRIMARY KEY,
    Marque VARCHAR(30) NOT NULL,
    Modele VARCHAR(30) NOT NULL,
    Couleur VARCHAR(20),
    Capacite INTEGER NOT NULL,
    Fumeur BOOLEAN,
    Animaux BOOLEAN,
    Musique BOOLEAN,
    Confort VARCHAR(30)
    );

CREATE TABLE Lieux (
   IdLieu INTEGER PRIMARY KEY,
   NumeroRue INTEGER,
   NomRue VARCHAR(100),
   Complement VARCHAR(100),
   CodePostal INTEGER,
   Ville VARCHAR(50) NOT NULL,
   Pays VARCHAR(50)
   );
 
CREATE TABLE Trajets (
    IdTrajet INTEGER PRIMARY KEY,
    DateDepart DATE NOT NULL,
    HeureDepart TIME NOT NULL,
    PlacesDispo INTEGER NOT NULL,
    TailleBagages INTEGER,
    InfosTrajet VARCHAR(500),
    IdVoitureUtilisee INTEGER REFERENCES Voitures (IdVoiture),
    IdDepart INTEGER REFERENCES Lieux (IdLieu),
    IdArrivee INTEGER REFERENCES Lieux (IdLieu)
    );
 
CREATE TABLE Reserver (
    IdUserClient INTEGER REFERENCES Utilisateurs (IdUser),
    IdTrajetReserve INTEGER REFERENCES Trajets (IdTrajet),
    PRIMARY KEY (IdUserClient, IdTrajetReserve)
    );
 
CREATE TABLE Conduire (
    IdConducteur INTEGER REFERENCES Utilisateurs (IdUser),
    IdVoiturePossedee INTEGER REFERENCES Voitures (IdVoiture),
    PRIMARY KEY (IdConducteur, IdVoiturePossedee)
    );
 
CREATE TABLE Noter (
    IdUserNotant INTEGER REFERENCES Utilisateurs (IdUser),
    IdUserNote INTEGER REFERENCES Utilisateurs (IdUser),
    IdTrajetNote INTEGER REFERENCES Trajets (IdTrajet),
    Note INTEGER NOT NULL,
    Commentaire VARCHAR(500),
    PRIMARY KEY (IdUserNotant, IdUserNote, IdTrajetNote)
    );
 
CREATE TABLE Discuter (
    IdEmetteur INTEGER REFERENCES Utilisateurs (IdUser),
    IdRecepteur INTEGER REFERENCES Utilisateurs (IdUser),
    IdTrajetPropose INTEGER REFERENCES Trajets (IdTrajet),
    Message VARCHAR(500) NOT NULL,
    PRIMARY KEY (IdEmetteur, IdRecepteur, IdTrajetPropose)
    );

CREATE TABLE FaireEtape (
   IdParcours INTEGER REFERENCES Trajets (IdTrajet),
   IdEtape INTEGER REFERENCES Lieux (IdLieu),
   PRIMARY KEY (IdParcours, IdEtape)
   );

CREATE TABLE Proposer (
    IdChauffeur INTEGER REFERENCES Utilisateurs (IdUser),
    IdRoute INTEGER REFERENCES Trajets (IdTrajet),
    PRIMARY KEY (IdChauffeur, IdRoute)
    );

CREATE TABLE Habiter (
    IdHabitant INTEGER REFERENCES Utilisateurs (IdUser),
    IdAdresse INTEGER REFERENCES Lieux (IdLieu),
    PRIMARY KEY (IdHabitant, IdAdresse)
    );

CREATE TABLE Partir (
    IdLieuDepart INTEGER REFERENCES Lieux (IdLieu),
    IdDepartTrajet INTEGER REFERENCES Trajets (IdTrajet),
    PRIMARY KEY (IdLieuDepart, IdDepartTrajet)
    );

CREATE TABLE Arriver (
    IdLieuArrivee INTEGER REFERENCES Lieux (IdLieu),
    IdArriveeTrajet INTEGER REFERENCES Trajets (IdTrajet),
    PRIMARY KEY (IdLieuArrivee, IdArriveeTrajet)
    );

ALTER TABLE Utilisateurs
	ADD CONSTRAINT fk_LieuDeResidence FOREIGN KEY (IdResidence) REFERENCES Lieux (IdLieu);

/* Commandes de mise en place de l'auto incrémentation des clés primaires 
    pour les tables Trajets, Utilisateurs, Voitures et Lieux. 
   Les instructions CREATE SEQUENCE et OWNED BY sont propres à PostgreSQL */

CREATE SEQUENCE trajets_idtrajet_seq OWNED BY trajets.idtrajet;
CREATE SEQUENCE utilisateurs_iduser_seq OWNED BY utilisateurs.iduser;
CREATE SEQUENCE voitures_idvoiture_seq OWNED BY voitures.idvoiture;
CREATE SEQUENCE lieux_idlieu_seq OWNED BY trajets.idtrajet;

ALTER TABLE trajets ALTER COLUMN idtrajet SET DEFAULT nextval('trajets_idtrajet_seq'::regclass);
ALTER TABLE utilisateurs ALTER COLUMN iduser SET DEFAULT nextval('utilisateurs_iduser_seq'::regclass);
ALTER TABLE voitures ALTER COLUMN idvoiture SET DEFAULT nextval('voitures_idvoiture_seq'::regclass);
ALTER TABLE lieux ALTER COLUMN idlieu SET DEFAULT nextval('lieux_idlieu_seq'::regclass);