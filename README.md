# Application Simple de Liste de Tâches (Todo List)

Une application web basique de liste de tâches construite avec le framework PHP Laravel.

## Fonctionnalités

* Afficher la liste de toutes les tâches.
* Ajouter une nouvelle tâche (avec titre et détails).
* Afficher les détails d'une tâche spécifique.
* Modifier une tâche existante.
* Marquer une tâche comme "à faire" ou "fait".
* Supprimer une tâche.
* Afficher la date de création et de dernière modification de chaque tâche.

## Technologies Utilisées

* Laravel (Framework PHP)
* PHP
* SQLite (Base de données)
* HTML/CSS (pour le front-end simple)

## Prérequis

Assurez-vous d'avoir installé les éléments suivants sur votre machine :

* PHP (version 7.4 ou supérieure recommandée)
* Composer (Gestionnaire de dépendances PHP)
* Node.js et npm ou Yarn (pour les dépendances front-end de Laravel si vous utilisez les assets par défaut)
* Git
* Un serveur web (Apache, Nginx, ou simplement le serveur de développement intégré de PHP/Laravel)

## Installation

Suivez ces étapes pour configurer le projet localement :

1.  **Clonez le dépôt :**

    ```bash
    git clone git@github.com:kakiang/todolist12.git
    cd todolist12
    ```

2.  **Installez les dépendances PHP :**

    ```bash
    composer install
    ```

3.  **Installez les dépendances Node.js :**

    ```bash
    npm install
    ```

4.  **Exécutez les migrations de base de données :**

    ```bash
    php artisan migrate
    ```
    Cela va créer la table `tasks` (et d'autres tables par défaut de Laravel si elles ne l'ont pas déjà été) dans votre fichier `database/database.sqlite`.

5.  **Démarrez les serveurs de développement :**

    ```bash
    composer dev
    ```

## Utilisation

Ouvrez votre navigateur web et accédez à l'adresse http://localhost:8000

Vous devriez voir l'interface de l'application de liste de tâches. Vous pouvez alors commencer à ajouter, visualiser, modifier ou supprimer des tâches, et changer leur état.

