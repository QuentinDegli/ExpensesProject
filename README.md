# My Wallet: Gestionnaire de dépenses en PHP

L'application PHP "My Wallet" vise à permettre à l'utilisateur de gérer ses dépenses. Elle offre la possibilité de s'identifier, d'ajouter des dépenses, de sauvegarder des tickets d'achat, et de générer un récapitulatif de toutes les transactions. Il est également possible d'effectuer des recherches par nom ou par montant. À terme, l'objectif est de proposer des fonctionnalités similaires à Tricount. Pour l'instant, il s'agit d'une première expérience dans le développement d'une application PHP.

# Devoir PHP Expenses

## Structure du Projet

L'arborescence du projet est organisée de manière à trouver le rôle de chaque page. Le nommage des pages permetde le déterminer.Maintenant je sais que j'aurais pu plus factoriser des éléments pour une meilleure organisation du code.

## Développement du Projet

### Phase de Création du Projet

Au cours des premières étapes, j'ai travaillé sur un croquis version papier pour imaginer les pages et conceptualiser le projet. 

### Phase de Développement

Pendant le développement, j'ai d'abord travaillé sur le MCD avec les différentes entités. Il est relativement petit car c'est un premier projet.  J'ai réussi à respecter la date limite de remise du projet et c'était un challenge pour moi. 

### Améliorations Futures

Pour les futures versions, voici quelques améliorations que je souhaite apporter :
- A la fin du projet je me suis rendu compte d'un bug. Lorsqu'on s'inscrit, il faut repasser par l'index pour se connecter et ainsi éviter le bug d'affichage. (Je pense qu'il faut actualiser BDD)
- Afficher le montant total des dépenses dans le récapitulatif.
- Intégrer un système de gestion des salaires et afficher les dépenses sous forme de graphique en camembert.

### Commentaires pour la gestion du temps de travail du projet

Lors des cours j'ai pu travailler notamment sur l'arborescence du projet en créant le dossier de zéro. 

Hélas je n'ai pas pu profiter des vacances pour avancer dans mon projet car j'ai réaliser la cérémonie laique d'un mariage. Il s'est déroulé le 2 septembre. Heureusement que tu nous as laissé jusqu'au 10 septembre sinon j'aurais été incapable de rendre un projet. 

## Pour configurer la BDD

Il faut créer une page db.ini et le remplir de cette manière 

DB_HOST="host.docker.internal"
DB_NAME="expenses"
DB_PORT=3306
DB_USER=root
DB_PASSWORD=""
DB_CHARSET=utf8mb4

J'ai égalament créer un fichier db.ini.template qui sera accessible sans passer par le README. 

Je vais tenter d'extraire la BDD afin que tu puisses voir cette applications et avoir des données utilisateurs. 

J'ai majoritairement utilisé les users suivants : 
- elena@gmail.com -- mdp : elena 
- pierre@gmail.com -- mdp : pierre 
- florence@gmail.com -- mdp : florence

Après les autres je me souviens pas forcément des mdp que j'ai fais. 

## Pour le CSS 

Au début tu m'avais conseillé d'utiliser des templates pour le CSS. J'avais intégré Bootstrap, mais hélas je ne parvenais pas à afficher le CSS. Il devait y avoir un conflit avec Docker. J'ai donc fait une partie du CSS et j'ai utiliser ChatGPT pour en générer. 

## Factoriser 

Ranger mes dossiers n'a jamais été mon point fort même sur mon ordinateur. Ici en créant l'arborescence de mon projet j'ai essayé d'être le plus clair possible en prenant exemple sur les projets vus en cours. 

Pour le nomage je sais que c'est pas toujours le plus précis mais on comprend malgré tout le sens. 

Pour factoriser les fichiers et ainsi partager les responsabilités, le temps est un peu court et j'avais également peur de casser des bouts de code que j'avais fait à un autre moment. Je sais qu'il y a un travail à effectuer de ce côté. 

## Utilisation de Github 

Par manque de temps et de confiance avec Git, je n'ai pas utilisé Github pour faire les commits. J'ai créé des sauvegardes en copiant mon dossier avant des tests. 

Au moins je pouvais revenir sur des checkpoints de sécurité. Pendant le cours je parvenais à m'en servir et je pense en être capable, mais encore une fois le temps était assez precieux. 

## Attentes du projet 

J'ai essayé de reprendre le cours et de remettre au maximum de connaissances issue du cours, en y intégrant des classes, des fonctions. 

J'arrive à avoir un résultat fonctionnel, maintenant je peux chercher à l'optimiser. 

Pour la gestion des erreurs, j'ai repris le format vu en cours, mais je ne l'ai pas exploité suffisament, mais j'ai géré la gestion des erreurs avec des echos. D'un point de vue responsabilité c'est pas l'idéal. 

Au début, lorsqu'on a initié le projet, je n'avais pas prévu de faire certains points. Toutefois les ayant fait en cours j'ai décidé de les intégrer. De ce fait il y une authentification, un système d'inscription pour plusieurs utilisateurs. 

Pour travailler le projet, j'ai d'abord fait un schéma papier en imaginant le nombres de pages et en faisant des croquis de ce dont j'avais besoin. Suite à cela j'ai travaillé de manière chronologique dans l'affichage des pages. C'est à dire j'ai fais l'accueil, les inscriptions, puis le formulaire d'ajout de dépense et enfin la page de synthèse et la barre de recherche. 

C'est vrai que j'étais un peu perdu parfois, je ne savais pas par ou commencer. 

Dernier point à améliorer : Je ne t'ai pas solicité car avant le lundi 4 septembre, je n'avais pas suffisemment avancé. Je me sentais pas de demander ainsi de l'aide sur des points que j'aurais surement du faire il y a un moment. 
