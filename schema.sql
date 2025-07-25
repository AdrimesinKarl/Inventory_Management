
    CREATE TABLE Inventory (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        product_id VARCHAR(30) NOT NULL,
        product_name VARCHAR(30) NOT NULL,
        quantity VARCHAR(30) NOT NULL,
        status VARCHAR(30) NOT NULL);


    INSERT INTO Inventory( id, product_name, quantity, status)
        VALUES (1, 'PRD001', 15, 'on stock');

    CREATE TABLE user (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
    );


    UPDATE Inventory SET quantity= 15
    WHERE id=1;


