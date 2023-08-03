CREATE TABLE Sub_Category (
  Sub_Category_ID INT(9) NOT NULL Auto_Increment,
  Category_ID INT(9) NOT NULL,
  Sub_Category_Name VARCHAR(255) NOT NULL,
  Sub_Category_Description LONGTEXT,
  CONSTRAINT Sub_Category_PK PRIMARY KEY (Sub_Category_ID),
  CONSTRAINT Sub_Category_FK1 FOREIGN KEY (Category_ID) REFERENCES Category(Category_ID)
) Auto_Increment = 1;

INSERT INTO
  Sub_Category (
    `Category_ID`,
    `Sub_Category_Name`,
    `Sub_Category_Description`
  )
VALUES
  (1, 'White', null),
  (1, 'Red', null),
  (1, 'Blush', null);