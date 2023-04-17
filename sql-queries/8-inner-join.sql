SELECT products.*, categories.name FROM products
INNER JOIN categories
ON products.category_id = categories.id;