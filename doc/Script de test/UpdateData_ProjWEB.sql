#Remplace le modèle dans la table voiture ou le modèle est égale à : Reventon par Sian FKP 37.
UPDATE cars
SET cars.model = "Sian FKP 37"
WHERE cars.model = "Reventon";

#Remplace le nom du vendeur Roulin par Roulin / Ferrari.
UPDATE sellers
SET sellers.lastname = "Roulin / Ferrari"
WHERE sellers.lastname = "Roulin";

#Update l'ID du vendeur nommé Nolan.
UPDATE sellers
SET sellers.id = 1000
WHERE sellers.firstname = "Nolan";