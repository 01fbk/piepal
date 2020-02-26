create table pizza(
   id INT NOT NULL AUTO_INCREMENT,
   pizzaID INT NOT NULL,
   pizzaName VARCHAR(255),
   pizzaInternalName VARCHAR(255),
   pizzaFullName VARCHAR(255),  
   pizzaDescription VARCHAR(255),
   pizzaIMG VARCHAR(255),
   pizzaPrice VARCHAR(255), 
   date_added DATE NOT NULL,
   PRIMARY KEY ( id )
);
