===== FONCTIONNALITES DU SITE EN PHASE 1 =====

## GENERALES ##

+  Authentification pour accès au site

+ Consultation profil coureurs (page simple)

+ Consultation liste courses passées et à venir (calendrier)

+ Consultation des résultats de tous les coureurs du groupe


## POUR LE COUREUR ##

+ Mise à jour de son profil (Formulaire pré-rempli modifiable)

+ Enregistrement résultat
	Course pré-existante :
	--> Select avec liste des courses déjà présentes dans la bdd
	--> formulaire pour enregistrer son résultat
	
	Course non existante :
	--> renvoi vers page d'enregistrement de nouvelle course
	--> formulaire pour enregistrer son résultat

+ Enregistrer une nouvelle course
	A venir
	Passée
	--> mise à jour du calendrier

+ Modifier un résultat déjà enregistré (formulaire pré-rempli modifiable)


## POUR LE COACH UNIQUEMENT ***

+ Ajouter un nouveau coureur dans la bdd

=================================================

## LISTE DES FORMULAIRES ##

+ Enregistrement nouveau coureur
+ Enregistrement nouvelle course
+ Enregistrement résultat coureur



## LISTE DES TABLES ##

 ____________                                                    ______________ 
|            |					                |              |
|  COUREUR   |                                                  |    COURSE    |
|____________|                                                  |______________|
|            |                     ____________                 |              |
|   #id      |                    /            \                |    #id       |
|   nom      |                   /  Participer  \               |    nom       |
|  prénom    | 0, N              |______________|         0, N  |    distance  | 
|   age      |===================|              |===============|    date      |
|   vma      |                   |  chrono      |               |    lieu      |
|  ville     |                   |  clssmt      |               |    denivelé  |
|   rp10     |                   |  comment     |               |    comment   |
|   rp21     |                    \____________/                |              |
|   rp42     |                                                  |              |
|____________|                                                  |______________|

Schéma du modèle E/A 

**Tables **

+ COUREUR
PK : id (a.i)
NN :nom, prénom, age, ville 
Oth: vma, rp10, rp21, rp42

+ COURSE
PK : id (a.i)
NN :
	


