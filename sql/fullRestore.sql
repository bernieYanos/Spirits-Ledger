CREATE TABLE Category (
  Category_ID INT(9) NOT NULL Auto_Increment,
  Category_Name VARCHAR(255) NOT NULL,
  Category_Description LONGTEXT,
  CONSTRAINT Category_PK PRIMARY KEY (Category_ID)
) Auto_Increment = 1;

CREATE TABLE Sub_Category (
  Sub_Category_ID INT(9) NOT NULL Auto_Increment,
  Sub_Category_Name VARCHAR(255) NOT NULL,
  Sub_Category_Description LONGTEXT,
  CONSTRAINT Sub_Category_PK PRIMARY KEY (Sub_Category_ID)
) Auto_Increment = 1;

CREATE TABLE Source (
  Source_ID INT(9) NOT NULL Auto_Increment,
  Source_Name VARCHAR(255) NOT NULL,
  Source_Description LONGTEXT,
  CONSTRAINT Source_PK PRIMARY KEY (Source_ID)
) Auto_Increment = 1;

CREATE TABLE Varietal (
  Varietal_ID INT(9) NOT NULL Auto_Increment,
  Varietal_Name VARCHAR(255) NOT NULL,
  CONSTRAINT Varietal_PK PRIMARY KEY (Varietal_ID)
) Auto_Increment = 1;

CREATE TABLE Product (
  Product_ID INT(9) NOT NULL Auto_Increment,
  Product_Name VARCHAR(255) NOT NULL,
  Product_Quantity INT(3) NOT NULL,
  Category_ID INT(9) NOT NULL,
  Sub_Category_ID INT(9) NOT NULL,
  Product_Description LONGTEXT,
  Source_ID INT(9),
  Vintage VARCHAR(255),
  Product_Image_Path VARCHAR(255),
  CONSTRAINT Product_PK PRIMARY KEY (Product_ID),
  CONSTRAINT Product_FK1 FOREIGN KEY (Category_ID) REFERENCES Category(Category_ID),
  CONSTRAINT Product_FK2 FOREIGN KEY (Sub_Category_ID) REFERENCES Sub_Category(Sub_Category_ID),
  CONSTRAINT Product_FK3 FOREIGN KEY (Source_ID) REFERENCES Source(Source_ID)
) Auto_Increment = 1;

CREATE TABLE Varietal_Tags (
  Product_ID INT(9) NOT NULL,
  Varietal_ID INT(9) NOT NULL,
  Varietal_Percentage INT(3),
  CONSTRAINT Varietal_Tags_PK PRIMARY KEY (Product_ID, Varietal_ID),
  CONSTRAINT Varietal_Tags_FK1 FOREIGN KEY (Product_ID) REFERENCES Product(Product_ID),
  CONSTRAINT Varietal_Tags_FK2 FOREIGN KEY (Varietal_ID) REFERENCES Varietal(Varietal_ID)
);

INSERT INTO
  Category (
    `Category_Name`,
    `Category_Description`
  )
VALUES
  ('Wine', null);

INSERT INTO
  Sub_Category (
    `Sub_Category_Name`,
    `Sub_Category_Description`
  )
VALUES
  ('White', null),
  ('Red', null),
  ('Blush', null);

INSERT INTO
  Source (`Source_Name`, `Source_Description`)
VALUES
  ('Ingleside Vineyards', null);

INSERT INTO
  Varietal (`Varietal_Name`)
VALUES
  ('Chardonnay'),
  ('Pinot Grigio'),
  ('Petit Manseng'),
  ('Albari&ntilde;o');

INSERT INTO
  Product (
    `Product_Name`,
    `Product_Quantity`,
    `Category_ID`,
    `Sub_Category_ID`,
    `Product_Description`,
    `Source_ID`,
    `Vintage`,
    `Product_Image_Path`
  )
VALUES
  (
    'Blue Crab Blanc',
    1,
    1,
    1,
    'Our Blue Crab Blanc is part of our new Chesapeake Series of wines. The label showcases the blue crab, an iconic symbol from our Chesapeake Bay region. These wines are are made to pair with local seafoods or be enjoyed on their own.\r\n\r\nServe with white meats and seafood. With a slightly sweet finish, this wine also makes a great aperitif!',
    1,
    null,
    'blueCrab.jpg'
  ),
  (
    'Albari&ntilde;o',
    1,
    1,
    1,
    'Our 2021 Albari&ntilde;o was produced from just over four acres of vines from three vineyard sites on our property. Our most established Albari&ntilde;o vines are over ten years old, and newer vines have been planted in recent years.\r\n\r\nThis fruit-forward wine has a refreshing acidity and will pair well with local seafoods, especially oysters.',
    1,
    '2021',
    'albarino.jpg'
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