# TechNify - Projet Symfony
## 📜 Description du projet

Découvrez Technify : La Marcketplace o$ù ton panier se remplit plus vite que ta RAM!

Ce projet consiste en la création d'un site de e-commerce sous Symfony, centré sur la vente de produits liés à la technologie,   comme des composants électroniques pour la robotique, des équipements pour la modélisation 3D, des ordinateurs, des jeux, etc.    

## 🎯 Fonctionnalités principales :
Les utilisateurs peuvent :
* créer un compte,   
* ajouter des produits à la vente,   
* mettre des articles dans leur panier,   
* augmenter leur solde,  
* gérer leurs informations, 
* consulter leur factures.  
  
### Page inscription `/login`  et connection `/register` :

Pour accéder au site créez vous un compte avec une adresse mail et un mot de passe ainsi qu'un nom d'utilisateur.  
Si vous avez déjà un compte connectez vous grâce à l'adresse mail et mot de passe que vous aviez renseigné.

### Pages home `/` :

retrouvez les produits en vente ainsi que le bouton pour accéder à l'interface de votre profil.

### Page profil utilisateur `/profil`:
menu où vous retrouverez des boutons pour accéder à : 
* vos informations personnelles avec possibilité de les modifiers 
* consultez votre solde avec la possibilité de l'augmenter 
* bouton déconnexion 

### Page de gestion du solde utilisateur `/solde` et `ajout-solde` :

* Suivi du solde 
* Option pour ajouter de l'argent au solde de l'utilisateur.

## Pré-requis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

* PHP 8.1+ (avec les extensions intl, pdo_mysql, mbstring)
* Composer (gestionnaire de dépendances PHP)
* Symfony CLI (optionnel mais recommandé)
* MySQL ou SQLite pour la base de données

## 🚀 Installation et lancement du projet
* 1️⃣ Cloner le projet
```
git clone https://github.com/NepNath/TechNify.git
cd TechNify
```
* 2️⃣ Installer les dépendances PHP
```
composer install
```
* 3️⃣ Configurer l'environnement
Copiez le fichier .env et personnalisez les variables de connexion à la base de données :
```
cp .env .env.local
```
Dans .env.local, ajustez la ligne :

```
DATABASE_URL="mysql://root:root@127.0.0.1:3306/db?serverVersion=8.0"
```
 Remplacez le deuxieme root par votre pseudo  
* 4️⃣ Créer la base de données et exécuter les migrations
```
php bin/console doctrine:database:create
```
```
php bin/console doctrine:migrations:migrate
```
* 5️⃣ Lancer le serveur Symfony
```
php -S 127.0.0.1:8000 -t public
```
Le site est  accessible sur : http://127.0.0.1:8000


## 🗒️Organisation 
### 🛠️ Outils 
- **Trello :** Détail des tâches à accomplir pour finaliser ce projet, avec une répartition des tâches par jour et par priorité.  
_[voir notre trello](https://trello.com/invite/b/67b30ba611c16b09abdf386d/ATTI5b99e52d223c500779749ea505392de3180442E7/projet-php-b2s2)_

- **Serveur Discord :** Organisation de la communication au sein de différents salons pour mieux structurer les discussions, répartir les sujets et offrir une meilleure visibilité.

- **Google docs :**  Rédaction de la structure du projet, détaillant le contenu de chaque page du site, les fonctionnalités à implémenter, ainsi que les éléments à inclure pour chaque page. Le document associe nos idées et les exigences de la consigne afin de ne rien oublier tout en intégrant nos choix de développement.  
_[voir notre doc](https://docs.google.com/document/d/1FaXzBN4YZ_2sjfRfo6XNRWGkjd9NBXn-jPM28cExxmk/edit?usp=sharing)_



_Merci de l'attention que vous porterez à notre projet !_