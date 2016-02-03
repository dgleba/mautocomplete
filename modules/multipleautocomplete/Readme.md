**multipleautocomplete widget Readme.md**
-
---
2016-02-03 Rev.10

---
Introduction
-

This module adds the multiple auto-complete widget to a module, allowing you to use it in whichever field you specify. It fetches data from a table and allows you to easily add a list of them to another table's records.

---

**Installation:**

---

 1. Copy the multipleautocomplete directory into your application's modules directory.

 2.  the following to the *[_modules]* section of your *conf.ini* file:

		  modules_multipleautocomplete=modules/multipleautocomplete/multipleautocomplete.php
		

 3. In the appropriate table folder in /tables (ie yourapp/tables/table1) if you wish to use multipleautocomplete for a field do the following:

   3a. Within *fields.ini*, add the following to the field(s) you wish to make autocomplete.


			widget:type=multipleautocomplete


  3b. Create the file *valuelists.ini* in this folder and add the following:

	
		[fields_name]
			  __sql__ = "SELECT column_name FROM table_name"
	

Replace fields_name with the name of the field from *fields.ini* which you have specified as multipleautocomplete. Replace table_name with the name of the table which will store the data for autocompletion. Replace column_name with the name of the column within that table. See below for more details.

4. This module reads the file  ```config.dbc``` in the root folder of your app. Create the file by following the example provided in  ```\config.dbc.example```

Put the following in the ```conf.ini``` in the root folder of your app.

		;put your database credentials in this file. see the example provided.
		__include__=config.dbc





---

**Scope and Limitations**

---

1. If the autocomplete is case-sensitive, that is a problem with the collation of your autocomplete tables. In PHPMyAdmin, navigate to your database, then the table which contains the autocomplete data, and change the collation of your columns to ```utf8_general_ci``` (it's the one I use so I know it works). Or you can use the collation_converter app to convert an entire database to the urtf8 collation.

2. Item 4 above is a limitation 'of sorts' since it imposes that requirement on your app.


---

By: David Gleba and Oliver Clarke