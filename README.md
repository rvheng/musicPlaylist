# musicPlaylist
A basic database that allows users to create playlists and add music, admins are allowed add, edit, search and remove entries from the database.

##Stack
The project was built using [xampp](https://www.apachefriends.org/index.html)
- Appache
- MariaDB
- PHP
- Pearl

## Install Directions:
1. Install Xammp
2. Navigate to /xampp/htdocs
3. execute terminal command: "mkdir musicPlaylist"
4. clone this repository: 
``` 
$ git clone https://github.com/rvheng/musicPlaylist 
```
5. Start xampp: "xampp start"
6. Set up a password for root
	- [Open phpMyAdmin](http://localhost/phpmyadmin/)
	- "XAMPP Shell" (command prompt).
``` 
$ mysqladmin.exe -u root password secret
```
	- This sets the root password to 'secret'.
7. [Create Tables](http://localhost/musicPlaylist/db/populate_tables.php)
8. Verify that databases has been created and populated:
**For Windows (command prompt)**
```
 	$ mysql -u root -p
 	$ *******
 	$ show databases;
 	$ use music_db;
 	$ show tables;
 	$ select * from <table_name>;
```
**For Mac OSX (terminal)**
```
 	$ /Applications/xampp/xamppfiles/bin/mysql -u root -p
 	$ *******
 	$ show databases;
 	$ use music_db;
 	$ show tables;
 	$ select * from <table_name>;
```

## TODO: 
1: Populate playlists and poplarity table
2: Create admin page/login
