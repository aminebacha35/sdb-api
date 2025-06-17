
#  Backend - Garage Carrosserie Sens de Bretagne

Bienvenue sur le backend du projet de prise de rendez-vous pour le garage de carrosserie situé à Sens-de-Bretagne.

Ce backend utilise :

- **Laravel 10** pour la logique serveur et l’API
- **Sanctum** pour l’authentification
- **MySQL** pour la base de données
- **Mailhog** pour les tests d’envoi d’e-mails
- **Seeder** pour injecter un utilisateur admin et des types de services
- Une API REST pour gérer les rendez-vous, les utilisateurs et les services

##  Prérequis

Assure-toi d’avoir installé :

- PHP >= 8.1
- Composer
- MySQL
- Node.js (si Laravel Mix est utilisé)
- Mailhog

##  Cloner le projet

```bash
git https://github.com/aminebacha35/sdb-api.git
cd sdb-api
git checkout main
```

##  Installation

### 1. Installer les dépendances PHP

```bash
composer install
```

### 2. Copier le fichier d’environnement

```bash
cp .env.example .env
```

### 3. Générer la clé d’application Laravel

```bash
php artisan key:generate
```

##  Configurer `.env`

Voici une configuration de base :

```env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=... (ta key que tu as generé)
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=garage_calendar
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=test@example.com
MAIL_FROM_NAME="Garage"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

SANCTUM_STATEFUL_DOMAINS=localhost:5173
SESSION_DOMAIN=localhost

```


## Lancer la base de données

### 1. Migrations

```bash
php artisan migrate
```

### 2. Seeders (admin + services)

```bash
php artisan db:seed
```

Ou tout réinitialiser :

```bash
php artisan migrate:fresh --seed
```

## Identifiants d’admin

Un administrateur est créé automatiquement par le seeder :

```
Email : admin@garage.com
Mot de passe : password
```

## Lancer le serveur Laravel

```bash
php artisan serve
```

Accessible à : [http://localhost:8000](http://localhost:8000)

## Mettre à jour le projet

Avant toute modification :

```bash
git pull origin main
```

## Structure du projet

```
app/
├── Http/Controllers/        → Logique des routes API
├── Models/                  → Modèles Laravel
routes/
├── api.php                  → Déclaration des routes API
database/
├── seeders/                 → Données par défaut (admin, services)
resources/views/emails/     → Contenu des mails (ex: confirmation)
```
Consulte ces sites si tu as besoin d'info :

- [https://laravel.com/docs](https://laravel.com/docs)
- [https://chatgpt.com](https://chatgpt.com)

**Bonne prise en main !**
