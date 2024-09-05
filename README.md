# studi-bootcamp-php

## Application day-12-fetch

### Installation

Se rendre dans le dossier `day-12-fetch` et ici lancer la commande : 
```bash
docker composer up -d
```

Si vous êtes sur xampp par exemple. Créer la config `vhost` apache nécéssaire pour ce projet
Faire pointer le public vers le dossier `day-12-fetch`

Avant d'aller sur le projet lancer la commande suivante dans le dossier `day-12-fetch`
```bash
composer dump-autoload
```

Une fois le projet démarré il est accessible aux url suivantes : 
WEB app : http://127.0.0.1:8742/
phpMyAdmin : http://127.0.0.1:8081/

Dans phpMyAdmin créer la base de données garage et y insérer les fixtures se situant dans /fixture

Vérifier ensuite le bon fonctionnement de l'API en appeler l'url suivante en GET
`http://127.0.0.1:8742/api/homepage/home`

La répnse est le JSON suivant
```JSON
{
  "success": true,
  "message": "l'API est accessible"
}
```

### Appeler l'API voiture

#### Afficher une voiture

Accessible en GET à l'url suivante
`http://127.0.0.1:8742/api/voiture/show/{id}`

La réponse avec l'id 1 est le JSON suivant
```JSON
{
  "success": true,
  "message": "",
  "data": {
    "id": 1,
    "immatriculation": "AA-000-AA",
    "marque": "peugeot",
    "modele": "208",
    "annee": 2011,
    "type_motorisation": "essence",
    "etat": "Bon",
    "km": 150000
  }
}
```

#### Créer une voiture

Accessible en POST à l'url suivante
`http://127.0.0.1:8742/api/voiture/create`

Il faut donner un `form-data` avec les clé suivantes : 
- immatriculation (string)
- marque (string)
- modele (string)
- annee (int)
- km (int)
- etat (string) -> Utiliser [ Mauvais, Bon, Médiocre, Très bon ]
- type_motorisation (string) -> Utiliser [ Essence, Diesel, Electrique ]


La réponse avec les form data ci-dessus est la suivante.
Petit plus le champs `voiture_id_insert` contient l'id de la voiture créée
```JSON
{
  "success": true,
  "message": "La voiture a été créée",
  "data": {
    "immatriculation": "AA-000-66",
    "marque": "peugeot",
    "modele": "208",
    "km": "267000",
    "annee": "2012",
    "etat": "Bon",
    "type_motorisation": "Essence",
    "voiture_id_insert": 2
  }
}
```


#### Modifier une voiture

Accessible en POST à l'url suivante
`http://127.0.0.1:8742/api/voiture/edit/{id}`

Il faut donner un `form-data` avec les clé suivantes :
- immatriculation (string)
- marque (string)
- modele (string)
- annee (int)
- km (int)
- etat (string) -> Utiliser [ Mauvais, Bon, Médiocre, Très bon ]
- type_motorisation (string) -> Utiliser [ Essence, Diesel, Electrique ]


La réponse avec les form data ci-dessus est la suivante.
```JSON
{
  "success": true,
  "message": "La voiture a été modifiée",
  "data": {
    "immatriculation": "AA-000-66",
    "marque": "peugeot",
    "modele": "208",
    "km": "267000",
    "annee": "2013",
    "etat": "Bon",
    "type_motorisation": "Essence"
  }
}
```


#### Supprimer une voiture

Accessible en GET à l'url suivante
`http://127.0.0.1:8742/api/voiture/delete/{id}`

La réponse avec l'id 2 est le JSON suivant
```JSON
{
  "success": true,
  "message": "La voiture a été supprimée",
  "data": null
}
```


#### Information en cas d'erreur

Exemple avec la création et des fields manquants. L'api retournera le JSON suivant
```JSON
{
    "success": false,
    "message": "Paramètre manquant dans le formulaire",
    "data": {
        "immatriculation": "AA-000-66",
        "marque": "peugeot",
        "modele": "208",
        "km": "267000",
        "annee": "2012"
    }
}
```

ici `success` sera false et message contiendra une information sur l'erreur concernée
`data` contiendra les données saisies dans le formulaire
