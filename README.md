
# Projet client : On ne passe pas.

Il s'agit d'une PWA (Progressive Web App) développée pour l'Office du Tourisme de Couvin, plus précisément pour le site historique de Brûly-de-Pesches.



## Table des matières :

- [Le client](https://bdp1940.be/fr/)
- [L'objectif de l'app](#l-objectif-de-l-app)
- [Les langages utilisés](#les-langages-utilises)
    - [Backend](#backend)
    - [Frontend](#frontend)
    - [Pourquoi ces choix ?](#pourquoi-ces-choix)
- [Que reste-t'il à faire ?](#que-reste-t-il-a-faire)
- [Crédits](#crédits)

## L'objectif de l'app

La demande du client est une application utilisable hors connexion (car très faible couverture réseau sur le site historique), ludique et accessible. Il faut également que l'application soit en trois langues (anglais, néerlandais et français).

L'application doit contenir des textes explicatifs sur les différents points clés du parcours ainsi qu'un quizz à chaque fin de texte, lors de ces quizz, il se peut qu'une couleur spécifique apparaisse. Les utilisateurs devront alors chercher après cette couleur autour d'eux car avec cette couleur viendront des chiffres. Ces chiffres devront être retenus jusqu'à la fin des quizz pour une surprise.

En accompagnement des textes se trouveront des images d'époque. 

Les couleurs de l'application devront être assez ternes pour représenter la guerre et que ce ne soit pas une app "joyeuse".
## Les langages utilisés

Nous avons utilisés React.js, React Router, axios, materialUI, swiper et PHP.
 
Plus d'infos ci-dessous.
## Backend

Intégralement fait en PHP, vous trouverez les différents points API (pour l'accueil, l'intro et les slides) dans `backend/api`. 

La DB est faite via PHPMyAdmin et trouvable à la racine du projet, il vous suffira de l'inclure dans votre PHPMyAdmin.
Pour accèder au panel administrateur utilisez le lien suivant : `http://localhost/client-project-on-ne-passe-pas/backend/`.
## Frontend
## Pourquoi ces choix ?
## Que reste-t'il à faire ?
## Crédits
