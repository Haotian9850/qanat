<?php

  ini_set("display_errors", true);
  date_default_timezone_set("America/New_York");

  define("SERVER", "cs4750.cs.virginia.edu");    //YOUR SQL HOSTNAME
  define("USERNAME_UNAUTHED", "ns9wr_a");   //YOUR SQL USERNAME
  define("PASSWORD_UNAUTHED", "uGhai6oe");   // YOUR SQL PASSWORD
  define("USERNAME_AUTHED", "ns9wr_b");   //YOUR SQL USERNAME
  define("PASSWORD_AUTHED", "uGhai6oe");   // YOUR SQL PASSWORD
  define("DATABASE", "ns9wr_qanat");

  define("TEMPLATE_PATH", "templates/");
  define("SERVICE_PATH", "services/");

  /*

GRANT all on ns9wr_qanat.User to 'ns9wr_a'@'%';
GRANT select on ns9wr_qanat.Station to 'ns9wr_a'@'%'; 
GRANT select on ns9wr_qanat.Hosts to 'ns9wr_a'@'%'; 
GRANT select on ns9wr_qanat.Plug_Model to 'ns9wr_a'@'%'; 
GRANT select on ns9wr_qanat.Plug to 'ns9wr_a'@'%'; 


GRANT all on ns9wr_qanat.User to 'ns9wr_b'@'%';
GRANT select on ns9wr_qanat.Station to 'ns9wr_b'@'%'; 
GRANT select on ns9wr_qanat.Hosts to 'ns9wr_b'@'%'; 
GRANT select on ns9wr_qanat.Plug_Model to 'ns9wr_b'@'%'; 
GRANT select on ns9wr_qanat.Plug to 'ns9wr_b'@'%'; 
GRANT all on ns9wr_qanat.Vehicle to 'ns9wr_b'@'%';
GRANT select on ns9wr_qanat.Supports to 'ns9wr_b'@'%';
GRANT all on ns9wr_qanat.Car_Type to 'ns9wr_b'@'%';
GRANT all on ns9wr_qanat.Owns to 'ns9wr_b'@'%';
GRANT all on ns9wr_qanat.Review to 'ns9wr_b'@'%';
GRANT all on ns9wr_qanat.Makes to 'ns9wr_b'@'%';

GRANT EXECUTE ON PROCEDURE statgen TO 'ns9wr_b'@'%';
GRANT EXECUTE ON PROCEDURE statgen TO 'ns9wr_a'@'%';
*/



?>
