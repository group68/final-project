## This folder used for seeding the database
Follow these simple steps using command line
Or you can run on phpAdmin DBMS
### 1. create a database
Currently, we are using `root` user and `restaurant` database, you can use whatever you prefer but need to change the command and the config file.

```bash
mysql -u root -p;
CREATE DATABASE restaurant;

```
### 2. import sql file. 
NOTE: change dump file path if needed.
```bash
mysql -u root -p restaurant < database/dump/se-restaurant.sql
```

