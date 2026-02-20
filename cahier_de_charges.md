
---

Maintenant crée le fichier **`CAHIER_DE_CHARGES.md`** à la racine et colle :

```markdown
# 📋 Cahier de Charges - Eventora

## 1. Présentation du Projet

### 1.1 Contexte

Dans un monde où les événements sont de plus en plus nombreux et variés, la gestion efficace de ces événements devient une nécessité. Eventora est une plateforme web qui permet de centraliser la création, la gestion et la participation aux événements.

### 1.2 Objectif

Développer une application web de gestion d'événements permettant :
- Aux administrateurs de gérer l'ensemble du système
- Aux organisateurs de créer et gérer leurs événements
- Aux utilisateurs de découvrir et s'inscrire aux événements

### 1.3 Public Cible

- Organisateurs d'événements (concerts, conférences, festivals, etc.)
- Participants souhaitant découvrir et participer aux événements
- Administrateurs de la plateforme

## 2. Spécifications Fonctionnelles

### 2.1 Gestion des Utilisateurs

#### 2.1.1 Rôles

| Rôle | Description |
|------|-------------|
| Admin | Administrateur principal. Gère les catégories, les organisateurs, et supervise le système. |
| Organizer | Organisateur d'événements. Créé par l'admin. Crée et gère ses propres événements. |
| User | Utilisateur simple. S'inscrit via le formulaire public. Participe aux événements. |

#### 2.1.2 Authentification

- Inscription publique (rôle User par défaut)
- Connexion par email et mot de passe
- Déconnexion sécurisée
- Redirection vers la page de connexion après inscription

#### 2.1.3 Gestion des Organisateurs (Admin)

- Créer un compte organisateur
- Modifier les informations d'un organisateur
- Supprimer un organisateur
- Lister tous les organisateurs

### 2.2 Gestion des Catégories (Admin)

#### 2.2.1 Fonctionnalités

- Créer une catégorie (nom, description, image)
- Modifier une catégorie
- Supprimer une catégorie
- Lister toutes les catégories avec le nombre d'événements

#### 2.2.2 Exemples de Catégories

- Concert
- Conférence
- Sport
- Festival
- Mariage
- Atelier
- Networking

### 2.3 Gestion des Événements

#### 2.3.1 Création (Organizer + Admin)

Un événement contient :

| Champ | Type | Description |
|-------|------|-------------|
| Titre | Texte | Nom de l'événement |
| Catégorie | Sélection | Type d'événement |
| Description | Texte long | Détails de l'événement |
| Image | Fichier | Affiche de l'événement |
| Lieu | Texte | Adresse de l'événement |
| Date de début | Date | Quand commence l'événement |
| Date de fin | Date | Quand se termine l'événement |
| Heure de début | Heure | À quelle heure |
| Heure de fin | Heure | Jusqu'à quelle heure |
| Nombre max de participants | Nombre | Capacité maximale |
| Prix | Nombre | Prix en FCFA (0 = gratuit) |
| Statut | Sélection | Brouillon / Publié / Annulé |

#### 2.3.2 Statuts des Événements

| Statut | Description |
|--------|-------------|
| Brouillon (draft) | En cours de préparation, non visible publiquement |
| Publié (published) | Visible et ouvert aux inscriptions |
| Annulé (cancelled) | Événement annulé |

#### 2.3.3 Affichage Public

- Liste de tous les événements publiés
- Page de détail d'un événement
- Informations : date, lieu, prix, places restantes
- Bouton d'inscription pour les utilisateurs connectés

### 2.4 Gestion des Inscriptions

#### 2.4.1 Processus d'Inscription

1. L'utilisateur consulte un événement publié
2. Il clique sur S'inscrire
3. Un ticket unique est généré (EVT-2026-XXXXXX)
4. L'inscription est en statut En attente
5. L'organisateur confirme l'inscription
6. Le statut passe à Confirmé

#### 2.4.2 Statuts des Inscriptions

| Statut | Description |
|--------|-------------|
| En attente (pending) | Inscription soumise, en attente de validation |
| Confirmé (confirmed) | Inscription validée par l'organisateur |
| Annulé (cancelled) | Inscription annulée |

#### 2.4.3 Règles Métier

- Un utilisateur ne peut s'inscrire qu'une seule fois à un événement
- L'inscription n'est possible que si l'événement est publié
- L'inscription n'est possible que si l'événement n'est pas complet
- L'utilisateur peut annuler sa propre inscription
- L'organisateur peut confirmer/annuler les inscriptions de ses événements
- L'admin peut confirmer/annuler toutes les inscriptions

#### 2.4.4 Numéro de Ticket

- Format : EVT-ANNÉE-XXXXXX
- Exemple : EVT-2026-A1B2C3
- Unique pour chaque inscription

### 2.5 Tableaux de Bord

#### 2.5.1 Dashboard Admin

- Nombre total d'événements
- Nombre total de catégories
- Nombre total d'utilisateurs
- Nombre total d'inscriptions
- Liste des derniers événements
- Liste des dernières inscriptions
- Raccourcis vers les pages de gestion

#### 2.5.2 Dashboard Organisateur

- Nombre de ses événements
- Nombre d'événements publiés
- Nombre de brouillons
- Nombre d'inscriptions à ses événements
- Liste de ses derniers événements
- Raccourcis vers création et gestion

#### 2.5.3 Dashboard Utilisateur

- Nombre total de ses inscriptions
- Nombre d'inscriptions confirmées
- Nombre d'inscriptions en attente
- Liste de ses dernières inscriptions
- Raccourci vers les événements

## 3. Spécifications Techniques

### 3.1 Architecture

Architecture MVC (Model-View-Controller) avec Laravel

### 3.2 Technologies

| Composant | Technologie |
|-----------|-------------|
| Backend | Laravel 12 (PHP 8.2) |
| Frontend Dashboard | Tailwind CSS (via Breeze) |
| Frontend Public | Bootstrap 5 + CSS personnalisé |
| Base de données | MySQL 8.0 |
| Authentification | Laravel Breeze |
| Icônes | Font Awesome 6.4 |
| Typographie | Google Fonts (Poppins) |

### 3.3 Base de Données

#### Table users

| Colonne | Type | Description |
|---------|------|-------------|
| id | BigInt (PK) | Identifiant unique |
| name | String | Nom complet |
| email | String (unique) | Adresse email |
| password | String | Mot de passe hashé |
| role | Enum | admin, organizer, user |
| phone | String (nullable) | Numéro de téléphone |
| avatar | String (nullable) | Photo de profil |
| timestamps | DateTime | Dates de création/modification |

#### Table categories

| Colonne | Type | Description |
|---------|------|-------------|
| id | BigInt (PK) | Identifiant unique |
| name | String | Nom de la catégorie |
| slug | String (unique) | URL-friendly du nom |
| description | Text (nullable) | Description |
| image | String (nullable) | Image de la catégorie |
| timestamps | DateTime | Dates de création/modification |

#### Table events

| Colonne | Type | Description |
|---------|------|-------------|
| id | BigInt (PK) | Identifiant unique |
| user_id | BigInt (FK) | Organisateur |
| category_id | BigInt (FK) | Catégorie |
| title | String | Titre de l'événement |
| slug | String (unique) | URL-friendly du titre |
| description | Text | Description détaillée |
| image | String (nullable) | Affiche de l'événement |
| location | String | Lieu |
| date_start | Date | Date de début |
| date_end | Date | Date de fin |
| time_start | Time | Heure de début |
| time_end | Time | Heure de fin |
| max_participants | Integer | Capacité maximale |
| price | Decimal(10,2) | Prix (0 = gratuit) |
| status | Enum | draft, published, cancelled |
| timestamps | DateTime | Dates de création/modification |

#### Table registrations

| Colonne | Type | Description |
|---------|------|-------------|
| id | BigInt (PK) | Identifiant unique |
| user_id | BigInt (FK) | Participant |
| event_id | BigInt (FK) | Événement |
| status | Enum | pending, confirmed, cancelled |
| ticket_number | String (unique) | Numéro de ticket |
| timestamps | DateTime | Dates de création/modification |

### 3.4 Sécurité

| Mesure | Description |
|--------|-------------|
| Authentification | Laravel Breeze (session-based) |
| Middleware Admin | Protège les routes administrateur |
| Middleware Organizer | Protège les routes organisateur |
| CSRF Protection | Token CSRF sur tous les formulaires |
| Validation | Validation côté serveur sur tous les formulaires |
| Hashage | Mots de passe hashés avec Bcrypt |
| Autorisation | Vérification du propriétaire avant modification/suppression |

### 3.5 Routes de l'Application

| Méthode | URL | Contrôleur | Accès |
|---------|-----|------------|-------|
| GET | / | welcome | Public |
| GET | /events | EventController@index | Public |
| GET | /events/{event} | EventController@show | Public |
| GET | /dashboard | DashboardController@index | Auth |
| GET | /categories | CategoryController@index | Admin |
| GET | /categories/create | CategoryController@create | Admin |
| POST | /categories | CategoryController@store | Admin |
| GET | /categories/{id}/edit | CategoryController@edit | Admin |
| PUT | /categories/{id} | CategoryController@update | Admin |
| DELETE | /categories/{id} | CategoryController@destroy | Admin |
| GET | /users | UserController@index | Admin |
| GET | /users/create | UserController@create | Admin |
| POST | /users | UserController@store | Admin |
| GET | /users/{id}/edit | UserController@edit | Admin |
| PUT | /users/{id} | UserController@update | Admin |
| DELETE | /users/{id} | UserController@destroy | Admin |
| GET | /my-events | EventController@myEvents | Organizer |
| GET | /events-create | EventController@create | Organizer |
| POST | /events-store | EventController@store | Organizer |
| GET | /events/{id}/edit | EventController@edit | Organizer |
| PUT | /events/{id} | EventController@update | Organizer |
| DELETE | /events/{id} | EventController@destroy | Organizer |
| GET | /registrations | RegistrationController@index | Organizer |
| PATCH | /registrations/{id}/confirm | RegistrationController@confirm | Organizer |
| POST | /events/{id}/register | RegistrationController@store | User |
| GET | /my-registrations | RegistrationController@myRegistrations | User |
| PATCH | /registrations/{id}/cancel | RegistrationController@cancel | User |

## 4. Spécifications de l'Interface

### 4.1 Pages Publiques

- Design sombre inspiré du template ManUp
- Couleur principale : Violet (#6c5ce7)
- Couleur secondaire : Turquoise (#00cec9)
- Typographie : Poppins (Google Fonts)
- Framework CSS : Bootstrap 5
- Responsive (mobile, tablette, desktop)

### 4.2 Dashboard

- Design clair (Tailwind CSS via Breeze)
- Navigation avec liens selon le rôle
- Badge du rôle affiché
- Tableaux pour les listes
- Cards pour les statistiques
- Formulaires avec validation visuelle

### 4.3 Pages d'Erreur

- 403 : Page d'accès interdit personnalisée
- Design cohérent avec le thème sombre

## 5. Livrables

| Livrable | Description |
|----------|-------------|
| Code source | Projet Laravel complet sur GitHub |
| Base de données | Migrations + Seeder (compte admin) |
| Documentation | README.md avec instructions d'installation |
| Cahier de charges | Ce document |

## 6. Informations du Projet

| Information | Détail |
|-------------|--------|
| Nom du projet | Eventora |
| Type | Application Web |
| Framework | Laravel 12 |
| Développeur | Baay Faal |
| Repository | https://github.com/Baay-Faal/Eventora |
| Date de début | Février 2026 |