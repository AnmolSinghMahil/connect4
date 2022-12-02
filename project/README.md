Connect 4
By Anmol Singh and Mingzan Liu
A simple 2 player connect 4 game to play on the same computer.

Technologies Used
JavaScript
HTML
CSS
PHP
MySQL

Description
This browser application allows users to play connect 4 game with another person
and the result gets stored in the database. User can view the leaderboard to see
wins, losses, games played, and time played of users and can query them depending
on ascending or descending.

When you logged in, simply press the play button to play connect 4.

Setup/Installation Requirements
1. Have XAMPP downloaded on your computer.
2. Download the folder CSCI130CONNECT4 and put it in xampp\htdocs folder.
3. a. Open initDB.php in text editor and change $username and $password variables to
   your own credentials for XAMPP MySQL. For the $dbname variable, change it to
   whatever of your own choosing except that it is a unique name. Then also change
   $username, $password, and $dbname in rdbms.php file to same credentials.
   b. Then go to any browser and in the address bar copy/paste the file path
   http://localhost/csci130connect4/project/initDB.php and press enter, if it went
   smoothly, you will get:
   Connected successfully
   Database $dbname created successfully
   Table games created successfully
   Table users created successfully
4. Then go to brower's address bar and copy/paste the file path
   http://localhost/csci130connect4/project/php/register_mysql.php and register
   after registering it will take you to the login page where you can login and
   play the game.

Known Bugs
.....

License
MIT
Copyright (c) 2022 Anmol Singh and Mingzan Liu
