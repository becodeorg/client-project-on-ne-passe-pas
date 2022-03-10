
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

Intégralement fait en [PHP](https://www.php.net/), vous trouverez les différents points API (pour l'accueil, l'intro et les slides) dans `backend/api`. 

La DB est faite via PHPMyAdmin et trouvable à la racine du projet, il vous suffira de l'inclure dans votre PHPMyAdmin.
Pour accèder au panel administrateur utilisez le lien suivant : `http://localhost/client-project-on-ne-passe-pas/backend/`.
## Frontend

Intégralement fait en [React.js](https://fr.reactjs.org/), comme c'était notre premier projet avec ce framework/librairy le code n'est pas réellement optimisés (i.e : gros composants) mais décomposés un maximum avec nos compétences de première semaine sur React, mais il est clair et facilement compréhensible.

- Pour le routing nous avons utilisés [React Router](https://reactrouter.com/).
- Pour les modals [MaterialUI](https://mui.com/).
- Pour les sliders d'images [Swiper](https://swiperjs.com/react).
- Pour les fetchs du back [axios](https://axios-http.com/docs/intro).
- Pour le QR code [React-qr-scanner](https://www.npmjs.com/package/react-qr-scanner).
## Pourquoi ces choix ?

Pour React.js, le choix était facile. On était deux sur ce projet, et on voulait tous les deux un projet concret sur lequel tester React. Was that simple :)

Pour les libs : 

Comme le dirait un certain coach exceptionnel : *Ca sert à rien de réinventer la roue* .
## Que reste-t'il à faire ?

1. Mettre en forme les textes dans la DB (nl2br).
2. Demander à la cliente qu'elle transmette les **4** couleurs nécessaires à implémenter.
3. Ajouter la possibilités d'ajouter de nouvelles images via le panel admin.
4. Vérifier que le scan du code QR fonctionne correctement.
5. Mise en place de la PWA.
## Crédits

- Backend : @Salukimakingcode
- Frontend: @Freyaln
- Coach référent : Corentin
