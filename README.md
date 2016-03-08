Mautocomplete-module
====================

Sample app with a multiple-autocomplete xataface module inside.


## The module

 See the readme in the folder modules/multipleautocomplete


## Purpose

See the screenshots in the screenshots folder.  

-This module allows suggestions to pop up when the user starts typing in the field.   
-When a user selects one of the choices the text of that choice is populated into the target field.  
-It puts in a comma, and the user can type again and select another suggestion to be populated into the target field.  
-The suggestions come from another column/field in another table in the database.  





##Installation of this Sample App

- Download this whole repo, including the contained module.  
- This app assumes that you have xataface installed in another folder.  
- The xataface code is expected to be in a folder beside mautocomplete-module the main folder you put this repo in.
	- Otherwise edit the index.php to suit  
- mkdir templates_c  
- Copy config.dbc.example to config.dbc and edit the credentials  
- Import the database by running the .sql file in the sql folder  
- Start the app by visiting localhost/mautocomplete or localhost/[folder you put it in]  
- login with user: admin passw: a  
- Create a contact. The name, phone, and tags will autocomplete. See the screenshots.  


## Reference

Xataface: http://xataface.com/

This repo: https://github.com/dgleba/mautocomplete-module

