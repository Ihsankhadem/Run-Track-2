-- une requête permettant de sélectionner l’ensemble des informations des étudiants qui ont moins de 18 ans.

SELECT* FROM etudiants WHERE TIMESTAMPDIFF(YEAR, Naissance, CURDATE()) < 18;

-- DATEDIFF = Renvoie la différence en nombre de jours entre deux dates.

-- | Élément                                     | Ce que ça fait                                                              |
-- | ------------------------------------------- | --------------------------------------------------------------------------- |
-- | `TIMESTAMPDIFF(...)`                        | Fonction MySQL qui calcule une différence entre 2 dates.                    |
-- | `YEAR`                                      | Tu veux la différence en années.                                            |
-- | `naissance`                                 | C’est la date de naissance de l’étudiant (valeur dans la base).             |
-- | `CURDATE()`                                 | La date d’aujourd’hui (la date actuelle).                                   |
-- | `TIMESTAMPDIFF(YEAR, naissance, CURDATE())` | Calcule l’âge en années de l’étudiant.                                      |
-- | `< 18`                                      | Tu ne veux que les étudiants dont l’âge est strictement inférieur à 18 ans. |
