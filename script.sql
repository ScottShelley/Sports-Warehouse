/* DROP DATABASE IF EXISTS SportsWarehouseDB;

CREATE DATABASE IF NOT EXISTS SportsWarehouseDB; */

CREATE TABLE Categories (
    Id INT NOT NULL AUTO_INCREMENT,
    Name VARCHAR(30) NOT NULL,
    PRIMARY KEY (Id)
);

CREATE TABLE Products (
    Id INT NOT NULL AUTO_INCREMENT,
    Name VARCHAR(30) NOT NULL,
    Photo TEXT NOT NULL,
    Price DECIMAL(13,2) NOT NULL,
    SalePrice DECIMAL(13,2),
    Description VARCHAR(255) NOT NULL,
    Featured BIT,
    CategoryID INT NOT NULL,
    PRIMARY KEY (Id),
    FOREIGN KEY (CategoryID) REFERENCES Categories(Id)
);

CREATE TABLE User (
    UsernameId INT NOT NULL AUTO_INCREMENT,
    Username VARCHAR(50) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    PRIMARY KEY (UsernameId)
);

CREATE TABLE ShoppingOrder (
    Id INT NOT NULL AUTO_INCREMENT,
    LastName VARCHAR(50) NOT NULL,
    FirstName VARCHAR(50) NOT NULL,
    ContactNumber VARCHAR(12) NOT NULL,
    Address VARCHAR(80) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    OrderDate DATE NOT NULL,
    CreditCardNumber VARCHAR(20) NOT NULL,
    NameOnCard VARCHAR(50) NOT NULL,
    ExpiryDate DATE NOT NULL,
    CVC VARCHAR(4) NOT NULL,
    PRIMARY KEY (Id)
);

CREATE TABLE OrderItem (
    Id INT NOT NULL AUTO_INCREMENT,
    ProductId INT NOT NULL,
    ShoppingOrderId INT NOT NULL,
    Price DECIMAL(13,2) NOT NULL,
    Quantity INT NOT NULL,
    PRIMARY KEY (Id),
    FOREIGN KEY (ProductId) REFERENCES Products(Id),
    FOREIGN KEY (ShoppingOrderId) REFERENCES ShoppingOrder(Id)
);


INSERT INTO `Categories`(`Name`) VALUES ('Shoes');
INSERT INTO `Categories`(`Name`) VALUES ('Helmets');
INSERT INTO `Categories`(`Name`) VALUES ('Pants');
INSERT INTO `Categories`(`Name`) VALUES ('Tops');
INSERT INTO `Categories`(`Name`) VALUES ('Balls');
INSERT INTO `Categories`(`Name`) VALUES ('Equipment');
INSERT INTO `Categories`(`Name`) VALUES ('Training Gear');

INSERT INTO `Products`(`Name`, `Photo`, `Price`, `SalePrice`, `Description`, `Featured`, `CategoryID`) VALUES ( 'adidas Euro16 Top Soccer Ball', 'img/soccer-ball.jpg', '46.00', '43.95', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia reprehenderit voluptate laboriosam omnis quisquam fugit deserunt iure error. Nobis, consequuntur. Eaque molestiae tempora rerum. Ullam atque rerum vel eaque corrupti?', true, 5);
INSERT INTO `Products`(`Name`, `Photo`, `Price`, `Description`, `Featured`, `CategoryID`) VALUES ( 'Pro-tec Classic Skate Helmet', 'img/skate-helmet.jpg', '70.00', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia reprehenderit voluptate laboriosam omnis quisquam fugit deserunt iure error. Nobis, consequuntur. Eaque molestiae tempora rerum. Ullam atque rerum vel eaque corrupti?', true, 2);
INSERT INTO `Products`(`Name`, `Photo`, `Price`, `SalePrice`, `Description`, `Featured`, `CategoryID`) VALUES ( 'Nike Sport 600ml Water Bottle', 'img/water-bottle.jpg', '17.50', '15.00', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia reprehenderit voluptate laboriosam omnis quisquam fugit deserunt iure error. Nobis, consequuntur. Eaque molestiae tempora rerum. Ullam atque rerum vel eaque corrupti?', true, 7);
INSERT INTO `Products`(`Name`, `Photo`, `Price`, `Description`, `Featured`, `CategoryID`) VALUES ( 'Sting ArmaPlus Boxing Gloves', 'img/boxing-gloves.jpg', '79.95', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia reprehenderit voluptate laboriosam omnis quisquam fugit deserunt iure error. Nobis, consequuntur. Eaque molestiae tempora rerum. Ullam atque rerum vel eaque corrupti?', true, 7);
INSERT INTO `Products`(`Name`, `Photo`, `Price`, `Description`, `Featured`, `CategoryID`) VALUES ( 'Asics Gel Lethal Tigreor 8 IT Men’s FG Boots', 'img/football-boots.jpg', '160.00', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia reprehenderit voluptate laboriosam omnis quisquam fugit deserunt iure error. Nobis, consequuntur. Eaque molestiae tempora rerum. Ullam atque rerum vel eaque corrupti?', true, 1);

INSERT INTO `User`(`Username`, `Password`, `FirstName`, `LastName`) VALUES ('ss100103@gmail.com','$2y$10$GG5AlaUA5R4MYyCq//pna./HHXSqV62I15kjMxKh2ybik1a61mDM.','Scott','Shelley')