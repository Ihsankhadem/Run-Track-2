
-- une requête permettant de récupérer le nom de l'étage ayant la salle avec la plus grande capacité (et afficher aussi le nom de cette salle
-- ainsi que sa capacité).Dans ce résultat, la colonne “nom” de la salle doit être renommée en “Biggest Room”

SELECT salle.Capacite, etage.Nom AS "BIGGEST ROOM" FROM salle INNER Join etage ON salle.id = etage.id;