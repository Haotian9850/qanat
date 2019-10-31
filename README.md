# Qanat: an app for your electric cars

## Deploy and testing
### Download
For Unix / Linux systems, download this project to `/var/www/html/`

### Start apache and SQL server
If not using the LAMP bundle, run the following command to start apache:
```
systemctl start apache2
```
Run the following command to start SQL server (locallly):
```
systemctl start mysql
```

### Load fixture data
SSH into SQL commandline, run the following command to create tables and load fixture data:
```
mysql> SOURCE /var/www/html/init/init.sql;
```
If needed, run the following command to reset database:
```
mysql> SOURCE /var/www/html/init/reset.sql;
```

### Add `config.php` (not included online for privacy reasons)
Add a file named `config.php` in project root folder with the following defined (otherwies, the project will not start):
```
<?php

  ini_set("display_errors", true); 
  date_default_timezone_set("America/New_York");  

  define("SERVER", "");    //YOUR SQL HOSTNAME
  define("USERNAME", "");   //YOUR SQL USERNAME
  define("PASSWORD", "");   // YOUR SQL PASSWORD
  define("DATABASE", "qanat");

  define("TEMPLATE_PATH", "templates/");
  define("SERVICE_PATH", "services/");

?>
```
Then, head to `localhost` to access the project.
