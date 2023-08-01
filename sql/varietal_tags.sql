CREATE TABLE Varietal_Tags (
  Product_ID INT(9) NOT NULL,
  Varietal_ID INT(9) NOT NULL,
  Varietal_Percentage INT(3),
  CONSTRAINT Varietal_Tags_PK PRIMARY KEY (Product_ID, Varietal_ID),
  CONSTRAINT Varietal_Tags_FK1 FOREIGN KEY (Product_ID) REFERENCES Product(Product_ID),
  CONSTRAINT Varietal_Tags_FK2 FOREIGN KEY (Varietal_ID) REFERENCES Varietal(Varietal_ID)
);

INSERT INTO
  Varietal_Tags (
    `Product_ID`,
    `Varietal_ID`,
    `Varietal_Percentage`
  )
VALUES
  (1, 1, null),
  (1, 2, null),
  (1, 3, null),
  (2, 4, 100);