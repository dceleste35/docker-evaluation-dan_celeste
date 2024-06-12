# Question 1 
### Qu’est ce qu’un conteneur ?

Docker est une plateforme open-source qui permet de créer, déployer et exécuter des applications dans des conteneurs.

Elle permet plusieurs choses:
- Isoler : Chaque conteneur fonctionne de manière indépendante avec ses propres ressources système. Cela permet d'éviter des conflits entre différentes versions d'une même application

- La légèreté : Les conteneurs se base sur le système de l'hôte directement et ne sont pas volumineux, ce qui permet de moins consommer ou encore de se démarrer plus rapidement

- La portabilité : Les conteneurs peuvent être éxécuter sur n'importe quelle machine qui à Docker d'installer. Cela facilite donc le déplacement de l'application dans différents environnements de développement.

- Construit à partir d'Image :  Un conteneur est créé à partir d'une image Docker, qui est un package léger et autonome contenant tout le nécessaire pour exécuter un morceau de logiciel, y compris le code, les bibliothèques et les outils de configuration.

Les conteneurs Docker permettent aux développeurs et aux administrateurs système de créer, tester et déployer des applications de manière plus efficace.

# Question 2 
### Est-ce que Docker a inventé les conteneurs Linux ? Qu’a apporté Docker à cette technologie ?

Non, Docker n'a pas inventé les conteneurs Linux. 
Il a rendu les conteneurs plus accessibles et plus faciles à utiliser.  Docker permet de séparer vos applications de votre infrastructure afin que vous puissiez livrer des logiciels rapidement.

# Question 3 
### Pourquoi est-ce que Docker est particulièrement pensé et adapté pour la conteneurisation deprocessus sans états (fichiers, base de données, etc.) ?

- Éphémère : Les conteneurs Docker sont conçus pour être temporaires. Ils peuvent être arrêtés, supprimés, puis recréés et remplacés avec très peu de configuration. Cela est particulièrement utile pour les applications sans état, car elles n'ont pas besoin de conserver des informations entre les sessions.

- Isolation : Chaque conteneur Docker fonctionne dans un environnement isolé, ce qui signifie qu'il ne peut pas affecter l'hôte ou d'autres conteneurs. Cette isolation permet d'éviter les conflits entre applications et renforce la sécurité.

- Portabilité : Les conteneurs Docker peuvent fonctionner sur n'importe quel système, ce qui signifie que vous pouvez développer une application sur votre machine locale et la déployer ensuite dans un centre de données ou dans le cloud sans aucune modification.

# Question 4 
### Quel artefact distribue-t-on et déploie-t-on dans le workflow de Docker ? Quelles propriétés désirables doit-il avoir ?

Dans le worklow de Docker l'artefact qui est distribué et déployé est l'image Docker.

Les propriétés désirables sont : 
- Leur légèreté comment mentionné précédemment
- Leur portabilité mentionné également précédemment
- Leur versionnage ce qui permet de suivre l'évolution d'une image
- Leur réutilisabilité car elles peuvent être utilisées pour créer plusieurs conteneurs 

# Question 5
### Quelle est la différence entre les commandes docker run et docker exec ?

`docker run`
Permet de démarrer un conteneur alors que 

`docker exec`
Permet de d'exécuter une commande qui dans un conteneur donné

# Question 6 
###  Peut-on lancer des processus supplémentaires dans un même conteneur docker en cours d’execution ?

Oui nous le pouvons grâçe à `docker exec`, il permet de lancer d'autre processus que le processus principal se trouvant dans le DockerFile

# Question 7
### Pourquoi est il fortement recommandé d’utiliser un tag précis d’une image et de ne pas utiliser letag latest dans un projet Docker ?

Il fortement recommandé d'utiliser un tag précis d'une image pour plusieurs raisons : 
- Garantir de toujours utiliser la même versions de l'image
- Garantir que les nouvelles versions de l'image ne peuvent pas impacter l'environnement sans le savoir
- Etre sur d'être sur une version stable sans nouveau bug 

# Question 8
### Décrire le résultat de cette commande : docker run -d -p 9001:80 --name my-php -v"$PWD":/var/www/html php:7.2-apache.

- `docker run` lancer un nouveau conteneur 
- `-d` c'est un flag qui permet de le lancer en détaché ( arrière plan )
- `-p 9001:80` fait un tunel du port 80 du conteneur vers le port 9001 de l'hôte 
- `--name my-php` donne le nom my-php au conteneur
- `-v "$PWD":/var/www/html` monte le répertoire courant de l'hôte dans le conteneur à l'emplacement /var/www/html
- `php:7.2-apache` l'image à partir de laquelle le conteneur est crée 

# Question 9
### Avec quelle commande docker peut-on arrêter tous les conteneurs ?

```sh
docker stop $(docker ps -q)
```

# Question 10
### Quelles précautions doit-on prendre pour construire une image afin de la garder de petite taille etfaciliter sa reconstruction ?

- Pour commencer nous devons partir de l'image la plus petite possible par exemple avec les versions Alpine. 
- Faire attention à ne pas installer de packages inutiles
- Minimiser le nombre de couche c'est à dire faire un minimum de ligne dans le DockerFile penser à utiliser `&&` pour les optimisers

# Question 11 
### Lorsqu’un conteneur s’arrête, tout ce qu’il a pu écrire sur le disque ou en mémoire est perdu. Vrai ou faux ? Pourquoi ?

Vrai, un conteneur est fait pour être ephémère et sans état, ça veut donc dire que les modifications en cours d'éxécution ne sont pas persistées.
Cepedant faux à la fois car il est possible de faire persister les données en utilisant des volumes

# Question 12 
### Lorsqu’une image est crée, elle ne peut plus être modifiée. Vrai ou faux ?

Vrai, une fois qu'une image est crée elle est figée.

# Question 13
### Comment peut-on publier et obtenir facilement des images ?

Pour publier et obtenir facilement des images nous pouvons utiliser DockerHub 
- Publier -> `docker push`
- Obtenir -> `docker pull``

# Question 14
### Comment s’appelle l’image de plus petite taille possible ? Que contient-elle ?

L'image la plus petite est l'image nommée `scratch`.
Elle ne contient absolument rien.

# Question 15
### Par quel moyen le client docker communique avec le serveur dockerd ? Est-il possible de communiquer avec le serveur via le protocole HTTP ? Pourquoi ?
Le client docker communique via L'API de docker directement. Il est possible de communiquer avec le serveur via le protocole car API passe directement par les protocoles http.

# Question 16
### Un conteneur doit lancer un processus par défaut que l’on pourra override à l’execution. Quelle commande faut-il utiliser pour lancer ce processus : CMD ou ENTRYPOINT ?
- ENTRYPOINT : Définit le programme à exécuter lorsqu'un conteneur est lancé. Les arguments passés à l'exécution du conteneur seront ajoutés à la fin de cette commande.
- CMD : Fournit les arguments par défaut à passer à l'ENTRYPOINT. Si des arguments sont passés lors de l'exécution du conteneur, ils remplacent ceux définis par CMD.

La réponse est donc ENTRYPOINT
