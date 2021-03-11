# Millhouse's blog system
This project is intended as a school assignment for students of Web development in e-commerce at Medieinstitutet and is an exercise to create a CMS, in GIT collaboration, and development in general.
## About the project
The purpose of this project has been to develop a blog system at the request of a fictitious company called ‘Millhouse’ that they wish to use to communicate with their customers.
The essential features of the blog site should be that:
- Users can ***register*** and ***log in*** to gain rights to ***comment*** on blog posts.
- Users with the ***role of admin*** have also the rights to ***create***, ***edit*** and ***delete*** blog posts
## How to use the project
The project uses PHP with MySQL DB connection, runs on localhost server, and therefore needs an AMP software stack such as XAMPP installed to work. Once installed, start Apache and MySQL then proceed to the following steps:
1.	Clone the repository to the default Apache root directory (e.g. C:\xampp\htdocs). Alternatively, download ZIP of the project and unzip the project folder there. Check so that the folder name is CMS_Projekt_Grupp8 and not CMS_Projekt_Grupp8-main, otherwise change it to the former.
2.	To create the database needed, execute the SQL-code of CreateBlog.sql inside your database management tool (like phpMyAdmin or MySQL Workbench).
3.	Now you can access the blog site project by entering the URL localhost/CMS_Projekt-Grupp8/ in your browser.
4.	Enjoy testing the functionalities of the blog system. To log in with either of our two existing users of different roles, the login details are the following:
    ID|Username     | Password     | Role
    --|------------ | -------------|-------------
    1 |admin        | admin        | admin
    2 |user         | user         | user
## Developers of the project
The developers who have participated in this project are [jyoti-nambiar](https://github.com/jyoti-nambiar), [Rasmuskrogh](https://github.com/Rasmuskrogh), and [th-olsson](https://github.com/th-olsson).
