# 🎉 Eventora - Plateforme de Gestion d'Événements

![Laravel](https://img.shields.io/badge/Laravel-12-red?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2-blue?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-orange?style=for-the-badge&logo=mysql)
![Tailwind](https://img.shields.io/badge/Tailwind_CSS-3.0-06B6D4?style=for-the-badge&logo=tailwindcss)

## 📖 Description

**Eventora** est une plateforme web de gestion d'événements développée avec **Laravel 12** et **Laravel Breeze**. Elle permet aux organisateurs de créer et gérer des événements, et aux utilisateurs de s'inscrire et participer à ces événements.

## 🎯 Fonctionnalités

### 👑 Admin
- Tableau de bord avec statistiques globales
- Gestion des catégories (CRUD)
- Gestion des organisateurs (CRUD)
- Gestion de tous les événements
- Gestion de toutes les inscriptions (confirmer/annuler)

### 📋 Organisateur
- Tableau de bord personnalisé
- Création et gestion de ses événements (CRUD)
- Gestion des inscriptions de ses événements
- Confirmation/annulation des inscriptions

### 👤 Utilisateur
- Tableau de bord personnel
- Consultation des événements publiés
- Inscription aux événements
- Consultation de ses inscriptions et tickets
- Annulation de ses inscriptions

### 🌐 Public (non connecté)
- Page d'accueil attractive
- Consultation de tous les événements publiés
- Détail des événements
- Inscription/Connexion pour participer

## 🛠️ Technologies Utilisées

| Technologie | Version | Utilisation |
|-------------|---------|-------------|
| **Laravel** | 12.x | Framework PHP backend |
| **Laravel Breeze** | 2.x | Authentification |
| **PHP** | 8.2+ | Langage serveur |
| **MySQL** | 8.0+ | Base de données |
| **Tailwind CSS** | 3.x | Style du dashboard |
| **Bootstrap** | 5.3 | Style des pages publiques |
| **Font Awesome** | 6.4 | Icônes |
| **Google Fonts** | Poppins | Typographie |

## 📊 Base de Données

### Tables

| Table | Description |
|-------|-------------|
| `users` | Utilisateurs (admin, organizer, user) |
| `categories` | Catégories d'événements |
| `events` | Événements créés par les organisateurs |
| `registrations` | Inscriptions des utilisateurs aux événements |

### Relations

- **User (1) → (N) Event** : Un organisateur crée plusieurs événements
- **Category (1) → (N) Event** : Une catégorie contient plusieurs événements
- **User (1) → (N) Registration** : Un utilisateur a plusieurs inscriptions
- **Event (1) → (N) Registration** : Un événement a plusieurs inscriptions

## 🚀 Installation

### Prérequis

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL

### Étapes

1. Cloner le projet
```bash
git clone https://github.com/Baay-Faal/Eventora.git
cd Eventora