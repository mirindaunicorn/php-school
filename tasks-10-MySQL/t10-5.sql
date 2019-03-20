SELECT * FROM products p LEFT JOIN product_descriptions pd ON p.id = pd.product_id WHERE pd.product_id IS NULL;
