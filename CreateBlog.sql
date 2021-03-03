CREATE DATABASE IF NOT EXISTS `blogdb`;
USE `blogdb`;

DROP TABLE IF EXISTS `comments`;
DROP TABLE IF EXISTS `posts`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`(
`ID` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
`Firstname` VARCHAR(20) NOT NULL,
`Lastname` VARCHAR(40) NOT NULL,
`Username` VARCHAR(20) NOT NULL UNIQUE,
`Email` VARCHAR(200) NOT NULL UNIQUE,
`Password` VARCHAR(32) NOT NULL,
`Role` VARCHAR(5) NOT NULL DEFAULT 'user'
);

CREATE TABLE `posts`(
`ID` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
`Title` VARCHAR(30) NOT NULL,
`Image` VARCHAR(200) NOT NULL,
`Category` VARCHAR(30) NOT NULL DEFAULT 'uncategorized',
`Date` DATE NOT NULL,
`UserID` INT NOT NULL,
`Content` TEXT NOT NULL,
CONSTRAINT FK_user_post FOREIGN KEY(UserID) REFERENCES users(ID)
);

CREATE TABLE `comments`(
`ID` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
`Content` TEXT NOT NULL,
`Date` DATE NOT NULL,
`PostID` INT NOT NULL,
`UserID` INT NOT NULL,
CONSTRAINT FK_post_comment FOREIGN KEY(PostID) REFERENCES posts(ID),
CONSTRAINT FK_user_comment FOREIGN KEY(UserID) REFERENCES users(ID)
);

#Creating 2 test-users: 1.(Username: admin, Password: admin), 2.(Username: user, Password: user). Passwords inserted below are encrypted to match login encryption.
INSERT INTO `users` (`Firstname`, `Lastname`, `Username`, `Email`, `Password`, `Role`)
VALUES 
('John', 'Doe', 'admin', 'john.doe@millhouse.com', 'a73e518bee4f98f5cd112044a8fa60fa', 'admin'),
('Joe', 'Schmoe', 'user', 'joe.schmoe@email.com', 'c9350617c975ea9aebed24958d2f058b', 'user');