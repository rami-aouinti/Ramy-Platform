# Ramy Platform
=====================

---------------------

Pré-requis :
* PHP 7.4
* MySQL

Installation
------------

First, clone the repository : `git clone https://github.com/rami-aouinti/Ramy-Platform.git`

Consider creating your file for your development environment `.env.dev.local` :
```dotenv
DATABASE_URL=mysql://USER:PASSWORD@127.0.0.1:3306/DBNAME
```

Then run the script `composer prepare` to create the database and integrate the fixtures.

Part 1
---------

* Installation of Symfony
* Implementation of `Post` and` Comment` entities
* Creation of our first page
* Implementation of fixtures
* Creation of a `composer` script to reload our database
* Listing of articles on home pages
* Item detail page
* Listing of comments
* Form for adding a comment

Part 2
---------

* CRUD of articles
* Upload an image
* Implementation of a service to facilitate upload

Part 3
---------

* Implementation of the `User` entity
* Configuration of `security.yaml`
* Implementation of the `WebAuthenticator`
* Creation of the login page
* Addition of fixtures
* Modification of the `Post` and` Comment` entities (addition of the relationship with the user)

Part 4
---------

* Pagination refactoring

Part 5
---------

* Handler implementation
* Implementation of `Responder` and` Presenter`
* Implementation of `DataTransferObject`
* Implementation of `EventSubscriber`
* Split the application into `Application`,` Infrastructure` and `Domain`
Part 6
---------

* Documentation
Dokumentation ist [hier](docs/index.md) verfügbar.

## À propos
My Platform is developed by Mohamed Rami Aouinti. If you have any questions, please contact [Mohamed Rami Aouinti](mailto:rami.aouinti@gmail.com)
