# 🚗 Backend - Garage Carrosserie Sens de Bretagne

Bienvenue sur le backend du projet de prise de rendez-vous pour le garage.

Ce backend est développé avec **Laravel 10** et utilise :
- MySQL pour la base de données
- Mailhog pour le test des mails
- Laravel Sanctum pour l'authentification
- Seeder pour la création d'un compte admin
- API REST pour la gestion des rendez-vous et services

---

## ✅ Prérequis

Avant de commencer, installe les outils suivants :

- PHP >= 8.1
- Composer
- MySQL
- Node.js (pour Laravel Mix si besoin)
- [Mailhog](https://github.com/mailhog/MailHog)
- Git

---

## 📁 Cloner le projet

```bash
git clone https://github.com/ton-utilisateur/garage-backend.git
cd garage-backend
git checkout main
```

⚙️ Installation

1. Récupérer les dépendances
```bash
composer install
```

2. Copier le fichier .env
```bash
cp .env.example .env
3. Générer la clé d'application
bash
Copier
Modifier
php artisan key:generate
🔧 Configuration .env
Modifie .env pour qu’il ressemble à ceci (ajuste les infos MySQL si nécessaire) :

env
Copier
Modifier
APP_NAME="Garage"
APP_ENV=local
APP_KEY=...
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=garage_calendar
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="garage@example.com"
MAIL_FROM_NAME="Garage Carrosserie"

SANCTUM_STATEFUL_DOMAINS=localhost:5173
SESSION_DOMAIN=localhost
🧪 Lancer Mailhog
Installe Mailhog (si ce n'est pas fait) :
Mac : brew install mailhog

Linux : télécharge le binaire ici : https://github.com/mailhog/MailHog/releases

Windows : WSL ou Git Bash recommandé

Lancer Mailhog :
bash
Copier
Modifier
mailhog
Accède à l’interface : http://localhost:8025

🧠 Lancer les migrations + seeders
bash
Copier
Modifier
php artisan migrate --seed
Cela va :

Créer toutes les tables

Injecter un utilisateur admin

Ajouter des services types de base

👤 Identifiants de test
bash
Copier
Modifier
Email : admin@garage.com
Mot de passe : password
(défini dans le fichier AdminUserSeeder.php)

🚀 Lancer le serveur Laravel
bash
Copier
Modifier
php artisan serve
Par défaut, disponible sur : http://localhost:8000

🔁 Mettre à jour (pull) le code
Avant chaque session de travail :

bash
Copier
Modifier
git pull origin main
📦 Autres commandes utiles
Lancer uniquement les seeders :

bash
Copier
Modifier
php artisan db:seed
Supprimer et recréer toute la base :

bash
Copier
Modifier
php artisan migrate:fresh --seed
📮 Tester l'envoi d'e-mails
Un e-mail est envoyé automatiquement à la création d’un rendez-vous. Tu peux le consulter sur :

➡️ http://localhost:8025

📚 Structure du projet
app/Models → modèles Eloquent (Appointment, ServiceType, User)

app/Http/Controllers → logique API

routes/api.php → routes d'API

database/seeders → fichiers pour créer des données test

resources/views/emails → contenu des e-mails de confirmation

❓ Besoin d’aide ?
Parle directement au développeur principal du projet. Lis aussi la documentation officielle de Laravel : https://laravel.com/docs

🛠️ À faire par le stagiaire
Lire et comprendre la structure du code

Ajouter un système de pagination sur les rendez-vous

Implémenter un filtre par type de service

Participer à l’écriture de tests (facultatif)

