#Delete le modèle Miura P400 S
DELETE 
FROM cars
WHERE cars.model = "Miura P400 S";

#Delete prouve que cela est fait en cascade.
DELETE
FROM sellers
WHERE sellers.username = "Tigidou";