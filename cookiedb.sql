CREATE DATABASE IF NOT EXISTS cookiedb;

CREATE TABLE `Cookie` (
  `CookieID` INT,
  `name` VARCHAR(40),
  `ingredient` VARCHAR(40),
  `creatine` VARCHAR(40),
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
  `LocationPhone` BIGINT,
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
VALUES (1, 'ChocolateSwoll', 'Chocolate', 'yes', 2, 'chocolate', 'A Dude with a Barbell'),
       (2, 'OnTheCut', 'Whole Wheat', 'no', 1, NULL, NULL),
       (3, 'DirtyBulk', 'Chocolate and Vanilla', 'yes', 5, 'All', 'Picture of Eddie Hall'),
       (4, 'Powerlifter', 'Vanilla', 'no', 3, 'vanilla', 'Powerlifter'),
       (5, 'HeavyCircles', 'Chocolate', 'yes', 17.75, 'blue', 'Standard Barbell');

INSERT INTO Locations (LocationID, LocationName, Street1, Street2, City, State, Zip, LocationPhone)
VALUES (1, 'Planet Fitness', '8010 S 84th St', NULL, 'LaVista', 'NE', 68128, 4026148215),
       (2, 'Build-A-Bear', '60 E Broadway', NULL, 'Bloomington', 'MN', 55425, 9528838800),
       (3, 'BuildBigCookies', '832 6th St', NULL, 'Charleston', 'WV', 25302, 3042056076),
       (4, 'Crumble', '214 Sigurdson Ave', NULL, 'Blaine', 'WA', 98230, 1112223456),
       (5, 'Milking Cookies', '43 Milk St', NULL, 'Nantucket', 'MA', 02554, 5082288816);

INSERT INTO Orders (OrderID, OrderDatetime, OrderStatus, LocationID)
VALUES (1, '2053-05-08 06:35:26', 'crushed', 5),
       (2, '1992-12-09 05:25:29', 'lost', 1),
       (3, '2001-08-03 11:38:29', 'delivered', 4),
       (4, '2023-10-05 10:54:01', 'in progress', 1),
       (5, '2016-06-02 07:59:36', 'in progress', 3);

INSERT INTO CookieLocation (CookieID, LocationID, CoLoID)
VALUES (1, 1, 1),
       (1, 2, 2),
       (1, 3, 3),
       (1, 4, 4),
       (1, 5, 5),
       (2, 1, 6),
       (2, 2, 7),
       (2, 3, 8),
       (2, 4, 9),
       (2, 5, 10),
       (3, 1, 11),
       (3, 2, 12),
       (3, 3, 13),
       (3, 4, 14),
       (3, 5, 15),
       (4, 1, 16),
       (4, 2, 17),
       (4, 3, 18),
       (4, 4, 19),
       (4, 5, 20),
       (5, 1, 21),
       (5, 2, 22),
       (5, 3, 23),
       (5, 4, 24),
       (5, 5, 25);

INSERT INTO CookieOrder (CookieID, OrderID, CoOrID)
VALUES (3, 1, 1),
       (1, 5, 2),
       (3, 4, 3),
       (2, 3, 4),
       (4, 2, 5);

GRANT SELECT
ON cookiedb.*
TO cookie@localhost IDENTIFIED BY 'good';