CREATE TABLE Varietal (
  Varietal_ID INT(9) NOT NULL Auto_Increment,
  Varietal_Name VARCHAR(255) NOT NULL,
  CONSTRAINT Varietal_PK PRIMARY KEY (Varietal_ID)
) Auto_Increment = 1;

INSERT INTO
  Varietal (`Varietal_Name`)
VALUES
  ('Chardonnay'),
  ('Pinot Grigio'),
  ('Petit Manseng'),
  ('Albari&ntilde;o');