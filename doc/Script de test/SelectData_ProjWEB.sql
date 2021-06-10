#Select les voiture appartenant a Tigidou.
SELECT sellers.username, sellers.id, cars.users_id, cars.brand, cars.model, cars.chassisnumber
FROM cars
INNER JOIN sellers
ON cars.users_id = sellers.id
WHERE sellers.username = "Tigidou";

#Select les voiture appartenant a Unicorn.
SELECT sellers.lastname, cars.brand, cars.model, cars.chassisnumber
FROM cars
INNER JOIN sellers
ON cars.users_id = sellers.id
WHERE sellers.username = "Unicorn";