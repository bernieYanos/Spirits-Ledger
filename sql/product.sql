CREATE TABLE Product (
  Product_ID INT(9) NOT NULL Auto_Increment,
  Product_Name VARCHAR(255) NOT NULL,
  Product_Quantity INT(3) NOT NULL,
  Category_ID INT(9) NOT NULL,
  Sub_Category_ID INT(9) NOT NULL,
  Product_Description LONGTEXT,
  Source_ID INT(9),
  Acquire_Date DATE,
  Vintage VARCHAR(255),
  Product_Image_Path VARCHAR(255),
  CONSTRAINT Product_PK PRIMARY KEY (Product_ID),
  CONSTRAINT Product_FK1 FOREIGN KEY (Category_ID) REFERENCES Category(Category_ID),
  CONSTRAINT Product_FK2 FOREIGN KEY (Sub_Category_ID) REFERENCES Sub_Category(Sub_Category_ID),
  CONSTRAINT Product_FK3 FOREIGN KEY (Source_ID) REFERENCES Source(Source_ID)
) Auto_Increment = 1;

INSERT INTO
  Product (
    `Product_Name`,
    `Product_Quantity`,
    `Category_ID`,
    `Sub_Category_ID`,
    `Product_Description`,
    `Source_ID`,
    `Acquire_Date`,
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
    '2023-01-01',
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
    '2023-01-01',
    '2021',
    'albarino.jpg'
  );