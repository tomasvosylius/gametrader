# gametrader
My university research & development project from the 1st year.


## Design
This web app is built using PHP programming language in the back end together with MySQL for data management.
The front end is done with plain CSS and HTML, only borrowing icons from bootstrap and fonts from GoogleFonts.
Pages 
All the pages are managed through index.php file. The sequence in index file is this: 
 - include all required functionality files from lib/ directory, including session, MySQL and functions file. These files are included so there is no repetitive code in pages/* files. 
 - include parts/head.php file with <head> HTML tag, stylings, and the meta data. 
 - include parts/header.php file, which renders the header of the page. 
right after the header file, it includes parts/searchbar.php which renders the search bar. 
 - include parts/messages.php, which checks and renders all the success and error messages if there are any. 
 - looks at current post GET method variables and see if there is a variable ‘file’ set to any. If there is, and the given ‘file’ exists it includes files/’file’.php If no variable is set, or the file doesn’t exist — home.php is rendered. ●	finally, include footer.php which renders footer contents. 
 
Every page has HTML and PHP code inside, which is used for selecting data from the database, checking session, and POST or GET variables. 
 
Since all the data is stored in MySQL, it needs to be fetched using an active database connection handler.
There is a function for that, called getDb, which initializes the database connection if there is none, or returns the active one.

This way performance is increased by not initializing new connections each time user opens a page. 

### Ideas for the future

- more options on sorting category views (alphabetically or date) 
- comments on item listings 
- built-in private messages for users 
- ‘Add to favorites’ button 
- profile details editing 
- email activation when registering 
- 2FA implementation 
- Admin control panel

### Side-notes
Application lacks security and input sanitization in some places.


