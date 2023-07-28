CREATE TABLE Category (
  Category_ID INT(9) NOT NULL Auto_Increment,
  Category_Name VARCHAR(255) NOT NULL,
  Category_Description LONGTEXT,
  CONSTRAINT Category_PK PRIMARY KEY (Category_ID)
) Auto_Increment = 1;

INSERT INTO
  Category (
    `Category_Name`,
    `Category_Description`
  )
VALUES
  ('Wine', null);