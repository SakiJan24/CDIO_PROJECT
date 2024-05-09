CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    sex VARCHAR(10),
    mac_address VARCHAR(18),
    age INT,
    document_type VARCHAR(50),
    document_number INT,
    INDEX document_number_index (document_number) -- Add an index on document_number
);
CREATE TABLE denuncia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    estacion VARCHAR(255),
    document_number INT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (document_number) REFERENCES users(document_number)
);
