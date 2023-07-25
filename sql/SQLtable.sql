CREATE TABLE Product_t (
    ProductID INT(9) NOT NULL Auto_Increment,
    ProductName VARCHAR(255) NOT NULL,
    ProductQuantity INT(3) NOT NULL,
    ProductType VARCHAR(255) NOT NULL,
    ProductSubType VARCHAR(255) NOT NULL,
    ProductDescription LONGTEXT,
    ProductAcquireLocation VARCHAR(255) NOT NULL,
    ProductAcquireDate DATE,
    ProductVintage VARCHAR(255),
    ProductVarietal VARCHAR(255),
    ProductImagePath VARCHAR(255),
    CONSTRAINT Product_PK PRIMARY KEY (ProductID)
) Auto_Increment = 1;