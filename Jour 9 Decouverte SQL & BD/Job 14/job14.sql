
-- une requête permettant de sélectionner le prenom, le nom et la date de naissance des étudiants qui sont nés entre 1998 et 2018.
SELECT Prenom, Nom, Naissance FROM etudiants WHERE Naissance BETWEEN '1998-01-01' AND '2018-12-31';