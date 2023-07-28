CREATE TABLE Source (
  Source_ID INT(9) NOT NULL Auto_Increment,
  Source_Name VARCHAR(255) NOT NULL,
  Source_Description LONGTEXT,
  CONSTRAINT Source_PK PRIMARY KEY (Source_ID)
) Auto_Increment = 1;

INSERT INTO
  Source (`Source_Name`, `Source_Description`)
VALUES
  ('Ingleside Vineyards', null);