# Développement PHP objet, s'abstraire de la génération manuelle de la page Web
##  Créé par Coudrot Axel

### Description
Le but de ce projet est de découvrir le 
développement objet appliqué à la création de
page web.

### Structure du projet
Le dossier public contient les scripts et 
page web crées.  
Le dossier src contient les classes développées
Le dossier test contient les différents tests effectués
Les fichiers autoload.php et phpunit.xml servent aux tests.

### Mise en route
Pour utiliser les fonctionnalités de ce projet, lancez : 
```
php -d display_errors -S localhost:8000
```
Puis, dans votre navigateur, allez sur le site http://localhost:8000/pageweb.php

### Tests
Ce projet contient des fichiers de tests rédigés pour fonctionner avec 
[PHPUnit](https://phpunit.de/). Pour lancer les tests il suffit de lancer la commande
```
phpunit
```