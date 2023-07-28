CREATE TABLE Sub_Category (
  Sub_Category_ID INT(9) NOT NULL Auto_Increment,
  Sub_Category_Name VARCHAR(255) NOT NULL,
  Sub_Category_Description LONGTEXT,
  CONSTRAINT Sub_Category_PK PRIMARY KEY (Sub_Category_ID)
) Auto_Increment = 1;

INSERT INTO
  Sub_Category (
    `Sub_Category_Name`,
    `Sub_Category_Description`
  )
VALUES
  ('White', null),
  ('Red', null),
  ('Blush', null);