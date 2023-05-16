CREATE TABLE `Cookie` (
  `CookieID` INT,
  `name` VARCHAR(40),
  `ingredient` VARCHAR(40),
  `creatine` BOOLEAN,
  `size` INT,
  `Frosting` VARCHAR(40),
  `FrostingStyle` VARCHAR(40),
  PRIMARY KEY (`CookieID`)
);

CREATE TABLE `Locations` (
  `LocationID` INT,
  `LocationName` VARCHAR(40),
  `Street1` VARCHAR(40),
  `Street2` VARCHAR(40),
  `City` VARCHAR(40),
  `State` VARCHAR(40),
  `Zip` INT,
  `LocationPhone` INT,
  PRIMARY KEY (`LocationID`)
);

CREATE TABLE `Orders` (
  `OrderID` INT,
  `OrderDatetime` DATE,
  `OrderStatus` VARCHAR(40),
  `LocationID` INT,
  PRIMARY KEY (`OrderID`)
);

CREATE TABLE `CookieLocation` (
  `CookieID` INT,
  `LocationID` INT,
  `CoLoID` INT,
  PRIMARY KEY (`CoLoID`),
  FOREIGN KEY (`CookieID`) REFERENCES `Cookie`(`CookieID`),
  FOREIGN KEY (`LocationID`) REFERENCES `Locations`(`LocationID`)
);

CREATE TABLE `CookieOrder` (
  `CookieID` INT,
  `OrderID` INT,
  `CoOrID` INT,
  PRIMARY KEY (`CoOrID`),
  FOREIGN KEY (`CookieID`) REFERENCES `Cookie`(`CookieID`)
);

INSERT INTO Cookie (CookieID, name, ingredient, creatine, size, Frosting, FrostingStyle)
VALUES ();

INSERT INTO Locations (LocationID, LocationName, Street1, Street2, City, State, Zip, LocationPhone)\
VALUES ();

INSERT INTO Orders (OrderID, OrderDatetime, OrderStatus, LocationID)
VALUES ();

select * from Orders;
select * from Cookie;
select * from Locations;