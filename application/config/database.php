<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'saintek';
$active_record = TRUE;

$db['kkn']['hostname'] = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=127.0.0.1)(PORT=1521))(CONNECT_DATA=(SID=XE)))";
$db['kkn']['username'] = "KKN";
$db['kkn']['password'] = "kkn";
$db['kkn']['database'] = "";
$db['kkn']['dbdriver'] = "oci8";
$db['kkn']['dbprefix'] = '';
$db['kkn']['pconnect'] = TRUE;
$db['kkn']['db_debug'] = TRUE;
$db['kkn']['cache_on'] = FALSE;
$db['kkn']['cachedir'] = '';
$db['kkn']['char_set'] = 'utf8';
$db['kkn']['dbcollat'] = 'utf8_general_ci';
$db['kkn']['swap_pre'] = '';
$db['kkn']['autoinit'] = TRUE;
$db['kkn']['stricton'] = FALSE;

$db['saintek']['hostname'] = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=127.0.0.1)(PORT=1521))(CONNECT_DATA=(SID=XE)))";
$db['saintek']['username'] = "sia";
$db['saintek']['password'] = "sia";
$db['saintek']['database'] = "";
$db['saintek']['dbdriver'] = "oci8";
$db['saintek']['dbprefix'] = '';
$db['saintek']['pconnect'] = TRUE;
$db['saintek']['db_debug'] = TRUE;
$db['saintek']['cache_on'] = FALSE;
$db['saintek']['cachedir'] = '';
$db['saintek']['char_set'] = 'utf8';
$db['saintek']['dbcollat'] = 'utf8_general_ci';
$db['saintek']['swap_pre'] = '';
$db['saintek']['autoinit'] = TRUE;
$db['saintek']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */