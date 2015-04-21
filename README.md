# BidBay

Ce readme est découpé en plusieurs parties. Dans la première se trouvent les explication quant à l'organisation du repository. Prière de les lire avant de prévoir une quelconque modification sur les fichiers. Si vous ne l'avez pas déjà fait, il pourrait être utile de consulter la documentation Git (http://git-scm.com/doc en anglais) pour comprendre la manière dont les fichiers sont stockés par Git, et donc par extension, par GitHub.

Dans une seconde partie, nous détaillerons la répartition des tâches dans le projets, autant pout la conception que pour le développement.

## Convention pour le nommage des fichiers
### Ressources
Les ressources (images, vidéos, sons, ...) qui seront insérées dans le projet doivent être nommées de la manière suivante : **nomPage-role.extension**. Le champ nomPage est optionnel si la ressource est employée dans plusieurs pages (comme par exemple pour le logo). Ainsi, l'avatar par défaut des utilisateurs sera nommé **profilUtilisateur-avatar_par_defaut.png** s'il s'agit d'une image au format png.

Au niveau des extensions, il n'y a pas de spécification particulière, si ce n'est que le format doit être supporté par les principaux navigateurs : Chrome, Firefox, Internet Explorer, Safari.

### Code source
Chaque page aura *obligatoirement* un fichier avec l'extension .php. Les fonctions supplémentaires seront situées dans des fichiers dont le nom sera le nom de la fonction. Une seule fonction par fichier.

## Organisation du repository
### Documents
Dans cette partie se trouvent regroupés tout les documents ayant trait à la conception du projet BidBay. Ainsi seront regroupés à la fin du projet le cahier des charges et le cahier de conception.

### Sources
Ici seront placées tous les fichiers de code du projet (HTML, CSS, PHP, MySQL).

### Ressources
Dans cet onglet nous trouverons les ressources employées par le site (images, vidéos, sons, ...).

## Répartition des tâches
### Conception
Pour finir le cahier des charges, les tâches suivantes ont été identifiées :
* Croquis des pages "Profil utilisateur" et "Profil objet"
* Rédaction et mise en page des éléments déjà écrits dans le document .docx du cdc
* Création du diagramme d'activité avec couloirs
* Insertion des diagrammes et croquis dans le document .docx du cdc

### Développement
Les étapes du développement devront être plus amplement détaillées. Pour le moment se dessinent les tâches suivantes :
* Création de la base de données SQL
* Création d'un template HTML et du code CSS associé
* Partie plus nébuleuse autour du PHP (quantité de travail à évaluer)
