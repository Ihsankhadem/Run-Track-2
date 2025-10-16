
-- une requête permettant de récupérer le nom des salles et le nom de leur étage.
SELECT salle.nom, etage.Nom FROM salle INNER Join etage ON salle.id = etage.id;