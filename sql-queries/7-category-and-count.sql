SELECT categories.name, COUNT(products.id) as count
FROM categories
LEFT JOIN products
ON categories.id = products.category_id
GROUP BY categories.id