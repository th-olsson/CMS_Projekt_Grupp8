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
`Image` VARCHAR(200),
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

#Creating two preexisting posts

INSERT INTO `posts`(`Title`, `Date`, `Image`, `Category`, `UserID`, `Content`)
VALUES
("Old Timey Clock", "2021-03-08", "uploads/5568.jpg", "Clocks", 1, "This is an old timey clock we will launch in our new collection in May.
 It's perfect for giving your home a more rustic feeling.

What are your thoughts?
Millhouse"),
("Design your own Wristwatch", "2021-03-11", "uploads/Design your clock.jpg", "Clocks", 1, "We have some exciting news for you for the Spring collection.
We are launching a feature where you, the customer, will be able to design your own personal wristwatch!

Your will be able to chose components like:
 -Size
 -Face
 -Background
 -Topp Ring
 -Bracelet

What are your thoughts on this?
Millhouse");