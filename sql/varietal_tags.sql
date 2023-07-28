CREATE TABLE Varietal_Tags (
  Product_ID INT(9) NOT NULL,
  Varietal_ID INT(9) NOT NULL,
  CONSTRAINT Varietal_Tags_PK PRIMARY KEY (Product_ID, Varietal_ID),
  CONSTRAINT Varietal_Tags_FK1 FOREIGN KEY (Product_ID) REFERENCES Product(Product_ID),
  CONSTRAINT Varietal_Tags_FK2 FOREIGN KEY (Varietal_ID) REFERENCES Varietal(Varietal_ID)
) Auto_Increment = 1;

INSERT INTO
  Varietal_Tags (`Product_ID`, `Varietal_ID`)
VALUES
  (1, 1),
  (1, 2),
  (1, 3),
  (2, 4);