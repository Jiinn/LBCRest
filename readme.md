# LBCRest
Short API REST

## Installation de l'aplication

## Routes existante de l'api

Type | Nom | Curl
:---:|:---:|:----
GET | productById | ```curl --location --request GET 'http://127.0.0.1:8080/api/v1/product/40'```
GET | product | ```curl --location --request GET 'http://127.0.0.1:8080/api/v1/product/'```
GET | productSearch | ```curl curl --location --request GET 'http://127.0.0.1:8080/api/v1/product/search/audi A7'```
GET | category | ```curl --location --request GET 'http://127.0.0.1:8080/api/v1/category/'```
GET | options | ```curl --location --request GET 'http://127.0.0.1:8080/api/v1/options/'```
POST | product | ```curl -L -X POST 'http://127.0.0.1:8080/api/v1/product/' -F 'title="Audi A7 Sportback 2018 10 000 km"' -F 'content="Audi Q7 Sportback noire Avus 9676 km protection peinture Gtechniq amélioration puissance moteur par Audi a 310 ch permance garage état parfait vente d'\''un particulier a la retraite"' -F 'product_category="1"' -F 'model="gran turismo serie 5"'```
PUT | product | ```curl -L -X PUT 'http://127.0.0.1:8080/api/v1/product/22' -H 'Content-Type: application/json' --data-raw '[{"title": "Audi A3 Sportback 2018 10 000 km","product_category": 1,"model": "bmw m5","content": "Audi Q7 Sportback noire Avus 9676 km protection peinture Gtechniq amélioration puissance moteur par Audi a 310 ch permance garage état parfait vente d'\''un particulier a la retraite"}]'```
DELETE | product | ```curl -L -X DELETE 'http://127.0.0.1:8080/api/v1/product/40' -H 'Content-Type: application/json' ```

   
  
- POST
    - product
        - curl --location --request POST 'http://127.0.0.1:8080/api/v1/product/' \
        --form 'title="Audi A7 Sportback 2018 10 000 km"' \
        --form 'content="Audi Q7 Sportback noire Avus 9676 km protection peinture Gtechniq amélioration puissance moteur par Audi a 310 ch permance garage état parfait vente d'\''un particulier a la retraite
        "' \
        --form 'product_category="1"' \
        --form 'model="gran turismo serie 5"'
- PUT
    - product
        - curl --location --request PUT 'http://127.0.0.1:8080/api/v1/product/22' \
            --header 'Content-Type: application/json' \
            --data-raw '[{"title": "Audi A3 Sportback 2018 10 000 km",
            "product_category": 1,
            "model": "bmw m5",
            "content": "Audi Q7 Sportback noire Avus 9676 km protection peinture Gtechniq amélioration puissance moteur par Audi a 310 ch permance garage état parfait vente d'\''un particulier a la retraite"}]
            '
- DELETE
    - product
