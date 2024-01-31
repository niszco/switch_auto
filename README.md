# Switch-Auto, Procédure d'installation :

**Prérequis :**
- XAMPP
- Driver MySQL
- Composer

**Installation :**

1. Cloner le projet dans le dossier ***htdocs*** de XAMPP.
2. Lancer le serveur Apache et MySQL à l'aide de XAMPP.
3. Ouvrez votre IDE :
    4. Positionnez vous dans le projet et tapez :
    5. `composer i` --> Installation des dépendances du projet.
    6. `php bin/console d:d:c`  --> Création de la base de données.
    7. `php bin/console doctrine:migrations:diff` --> Mets à jour la base de données.
    8. `php bin/console doctrine:migrations:migrate` --> Migre les tables vers la base de données.
    9. `php bin/console doctrine:fixtures:load` --> Migre les données vers la base de données.

**Logins utilisateurs :**

Login _ADMIN_ :
- pseudo : admin
- pwd : admin

Login _USER_ :
- pseudo : user
- pwd : user