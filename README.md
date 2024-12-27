# 🌍 Système de Réservation de Voyages

Le **Système de Réservation de Voyages** vise à moderniser la gestion des réservations pour une agence de voyage. Grâce à une approche orientée objet (OOP), ce projet offre une solution flexible et évolutive pour optimiser l'expérience utilisateur et la gestion des activités disponibles.

---

## 🎯 Contexte du Projet

Ce projet propose une solution efficace pour gérer :

- **Utilisateurs** : Gestion avec des rôles distincts (Client, Administrateur, Visiteur).
- **Activités** : Vols, hôtels, circuits touristiques.
- **Réservations** : Suivi, modification et annulation des réservations.

---

## 🚀 Fonctionnalités Backend Attendues

### 🔐 Authentification et Autorisation
- **Clients** : Inscription et connexion sécurisées.
- **Gestion des rôles** :
  - **Administrateur** : Gestion des utilisateurs et des activités.
  - **Client authentifié** : Réalisation, modification et annulation des réservations.
  - **Visiteur** : Consultation des offres sans inscription.

---

## 👤 User Stories

### 🛠️ En tant qu'Administrateur :
- **Gestion des utilisateurs et des rôles** : 
  - Création de comptes sécurisés.
  - Attribution et modification des rôles.
- **Gestion des activités** : 
  - Ajouter, modifier ou supprimer des activités.
- **Gestion des réservations** : 
  - Visualiser, confirmer ou annuler les réservations.
- **Gestion des utilisateurs** :
  - Archiver ou bannir des utilisateurs.

### 👥 En tant que Client Authentifié :
- **Consultation des offres** : 
  - Recherche et visualisation des activités disponibles (vols, hôtels, circuits, etc.).
- **Personnalisation** : 
  - Sélection et personnalisation des activités.
- **Réservation et modification** :
  - Réalisation d'une réservation en ligne avec possibilité de modification.

### 👀 En tant que Visiteur :
- **Consultation du catalogue** : 
  - Parcourir les activités disponibles sans inscription.
- **Inscription** : 
  - Création d'un compte pour accéder aux fonctionnalités avancées.

---

## 📚 Documentation

### Document PDF V1 :
1. **Introduction à la Programmation Orientée Objet (POO) en PHP** :
   - Présentation des concepts de base : classes, objets, etc.
2. **Encapsulation et Modificateurs d'Accès** :
   - Explication de l'encapsulation et utilisation des modificateurs (`public`, `private`, `protected`).

---

## 📦 Installation et Configuration

### Prérequis
- **Serveur Web** : Apache/Nginx avec PHP ≥ 7.4.
- **Base de données** : MySQL ou MariaDB.
- **Outils** :
  - Composer pour la gestion des dépendances.
  - Git pour la gestion des versions.

### Étapes d'installation
1. Clonez le dépôt :
   ```bash
   git clone https://github.com/ChehAchraf/GDV-v2.git
   cd votre-projet
