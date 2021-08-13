# LBCRest
Short API REST

## Installation de l'application

- 1: Se positionner sur le dossier souhaité.
- 2: Récupération du dépot GIT
    - `$ git init`
    - `$ git remote add origin https://github.com/Jiinn/LBCRest.git`
    - `$ git pull origin master`
- 3: Build de l'environnement Docker
    - `$ docker-compose up -d --build`


## Environnement
- Docker
    - database : 
        - Image : mysql:8.0
        - Ports : 4306:3306
    - nginx : 
        - Image : nginx:stable-alpine
        - Ports : 8080:80
    - php : 
        - Ports : 9000:9000
    - phpmyadmin : 
        - Image : phpmyadmin
        - Ports : 8090:80

## Utilisation de l'api

- Via les requetes CURL ci-dessous
- Via la collection PostMan à la racine du Master

## Routes existante de l'api

Type | Nom | Curl
:---:|:---:|:----
GET | productById | ```curl --location --request GET 'http://127.0.0.1:8080/api/v1/product/4'```
GET | product | ```curl --location --request GET 'http://127.0.0.1:8080/api/v1/product/'```
GET | productSearch | ```curl curl --location --request GET 'http://127.0.0.1:8080/api/v1/product/search/audi A7'```
GET | category | ```curl --location --request GET 'http://127.0.0.1:8080/api/v1/category/'```
GET | options | ```curl --location --request GET 'http://127.0.0.1:8080/api/v1/options/'```
POST | product | ```curl -L -X POST 'http://127.0.0.1:8080/api/v1/product/' -F 'title="BMW 650i COUPE PACK M V8 407 CH 1ÈRE MAIN ENTRETIEN BMW COMPLET FULL / ECHANGE REPRISE P"' -F 'content="BMW SÉRIE 6 650 i COUPE PACK M INNOVATION SURÉQUIPÉ 5.0 L V8 407CH Bi-TURBO. ANNÉE : 08/2012 KILOMETRAGE : 174000 KMS PUISSANCE FISCALE : 31 CV CATÉGORIE : VÉHICULE DE TOURISME COUPE SPORT BOÎTE DE VITESSE AUTOMATIQUE À 8 RAPPORTS SÉQUENTIELS ET PALETTES AU VOLANT ET SPORT MODE DE CONDUITE : CONFORT + CONFORT SPORT ET SPORT +."' -F 'product_category="1"' -F 'model="BMW M650i"'```
PUT | product | ```curl -L -X PUT 'http://127.0.0.1:8080/api/v1/product/9' -H 'Content-Type: application/json' --data-raw '[{"title": "Audi Q7 2018 10 000 km", "product_category": 1, "model": "Audi Q7", "content": "Audi Q7 Sportback noire Avus 9676 km protection peinture Gtechniq amélioration puissance moteur par Audi a 310 ch permance garage état parfait vente d'\''un particulier a la retraite"}]'```
DELETE | product | ```curl -L -X DELETE 'http://127.0.0.1:8080/api/v1/product/40' -H 'Content-Type: application/json' ```


# Point d'amélioration

En restant dans le cadre de la demande 

- Entité Product
    - Options1 & 2, deviendraient Options avec un ManyToMany.
    - Non fait par manque de compétence sur la gestion des formulaires par collection
- Pagination
    - Certaines routes GET mériterait une pagination afin de ne pas surcharger la BDD
- Test unitaire
    - Par manque de compétence et de temps, cette fonctionnalité n'a pas été livré, je suis conscient qu'il me faut évoluer sur ce point.
- Sécurité
    - Je ne me suis pas préocupé de cette notion dans le cadre de cette REST, mais naturellement c'est un point à prendre en compte pour certaine route.
- 404
    - Gestion des routes en erreur.
- Services
    - Mise en place de services afin de libérer les controllers.    
