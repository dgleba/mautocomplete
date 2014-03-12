**multipleautocomplete widget Readme.md**
-
---
3/12/2014 Rev.4

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

3.In the appropriate table folder in /tables (ie yourapp/tables/table1) if you wish to use multipleautocomplete for a field do the following:

3a.Within *fields.ini*, add the following to the field(s) you wish to make autocomplete.

```
widget:type=multipleautocomplete
```

3b.Create the file *valuelists.ini* in this folder and add the following:

```
[fields_name]
  __sql__ = "SELECT column_name FROM table_name"
```

Replace fields_name with the name of the field from *fields.ini* which you have specified as multipleautocomplete. Replace table_name with the name of the table which will store the data for autocompletion. Replace column_name with the name of the column within that table. See below for more details.

---

**Autocomplete Tables:**

---

By default the widget will look for a table with the name of *table-you-have-open_tags*. For example if I have a table named *test1*, autocomplete will look for data in the table *test1_tags*.

if you wish, you can create this table in PHPmyadmin and add as many columns as you need (make an autoincrementing primary field called 'id' first!). The widget will be able to intelligently differentiate between the multiple entries in one record (ie if a table has names, numbers etc stored in it, you can enter them all in one record, but they will be used individually later).

Alternatively you can specify in the *multipleautocomplete.txt* file if you wish to have separate tables (again these tables **MUST** have an AI, primary field called 'id')

---

**Issues**

---

If the autocomplete is case-sensitive, that is a problem with the collation of your autocomplete tables. In PHPMyAdmin, navigate to your database, then the table which contains the autocomplete data, and changethe collation of your columns to 'latin1_swedish_ci' (it's the one I use so I know it works)

---

By: David Gleba and Oliver Clarke