# Instructions pour Exercice 2

Ce README contient les instructions pour configurer et exécuter un environnement Docker pour l'Exercice 2.

ATTENTION : Toutes les requêtes doivent fourni dans le README doivent être lancé à la racine du dépôt ! 

## Executer en dev

Clonez le dépôt Git sur votre machine locale.

    ```sh
    git clone https://github.com/dceleste35/git-evaluation_groupe-dan-celeste/tree/v1.2
    ```
Rendez vous dans le projet

```sh
docker-compose -f ./Exercice2/docker-compose.yml --env-file ./Exercice2/dev.env up -d --build
```
Et pour y acceder http://localhost:8080/index.php

## Questions

### Question 2. Donner les commandes shell à utiliser pour vérifier que la basepar défaut est bien présente ainsi que son contenu initial.

```sh
docker exec -it database bash
mysql -u db_client -p (mdp: password)
> SHOW DATABASES;
> USE docker_doc_dev;
> SHOW TABLES;
```
#
### Question 3. Dump la base de donnée docker_doc_dev sur un fichier de la machine hôte

```sh
docker-compose -f ./Exercice2/docker-compose.yml exec -T database mysqldump -u root -proot docker_doc_dev > ./Exercice\ 2/dump.sql
```
#
### Question 5. Générer l'image php + l'url pour acceder à la page
```sh
docker build -t image_php -f ./Exercice2/client/Dockerfile .
```
Le lien pour y acceder est : http://localhost:8080/index.php
#
### Question 6. la commande pour relancer le projet permettant de recharger les sources dès qu’elles changent

De manière général
```sh
docker-compose up -d --build
``` 
Dans notre context
```sh
docker-compose -f ./Exercice2/docker-compose.yml up -d --build
```
#
### Question 7. 
Commande pour l'environnement de dev
```sh
docker-compose -f ./Exercice2/docker-compose.yml --env-file ./Exercice2/dev.env up -d --build
```
Pour l'environnement de prod
```sh
docker-compose -f ./Exercice2/docker-compose.yml --env-file ./Exercice2/prod.env up -d --build
```
Pour le fichier d'environnement avec les mdps demandés pour la bdd (another-strong-password) ne fonctionne pas, donc j'ai mis comme mdp 'password' pour db_client et 'root' pour 'root'
dans les 2 cas.
#

### Question 8.
