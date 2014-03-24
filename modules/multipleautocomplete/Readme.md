**multipleautocomplete widget Readme.md**
-
---
3/24/2014 Rev.8

---
Introduction
-

This module adds the multiple auto-complete widget to a module, allowing you to use it in whichever field you specify. It fetches data from a table and allows you to easily add a list of them to another table's records.

---

**Installation:**

---

1.Copy the multipleautocomplete directory into your application's modules directory.

2.Add the following to the *[_modules]* section of your *conf.ini* file:

```
  modules_multipleautocomplete=modules/multipleautocomplete/multipleautocomplete.php
```

3.Create a *paths.ini* in the root of your app folder and add the following:

```
;Relative path to multipleautocomplete actions folder	.. to go up a level
action_path = "../xataface/modules/multipleautocomplete/actions"
```

This path is always relative to your app. It starts in the root of your app and you must navigate it to wherever you have the modules action folder

4.In the appropriate table folder in /tables (ie yourapp/tables/table1) if you wish to use multipleautocomplete for a field do the following:

4a.Within *fields.ini*, add the following to the field(s) you wish to make autocomplete.

```
widget:type=multipleautocomplete
```

4b.Create the file *valuelists.ini* in this folder and add the following:

```
[fields_name]
  __sql__ = "SELECT column_name FROM table_name"
```

Replace fields_name with the name of the field from *fields.ini* which you have specified as multipleautocomplete. Replace table_name with the name of the table which will store the data for autocompletion. Replace column_name with the name of the column within that table. See below for more details.

---

**Scope and Limitations**

---

If the autocomplete is case-sensitive, that is a problem with the collation of your autocomplete tables. In PHPMyAdmin, navigate to your database, then the table which contains the autocomplete data, and change the collation of your columns to ```utf8_general_ci``` (it's the one I use so I know it works). Or you can use the collation_converter app to convert an entire database to the urtf8 collation.

---

By: David Gleba and Oliver Clarke