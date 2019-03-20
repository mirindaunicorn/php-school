SELECT p1.id, p1.name, p1.price, p1.description, p2.name AS related_name, p2.price AS related_price
FROM products AS p1
LEFT JOIN products AS p2 ON (p1.related_id = p2.id);
