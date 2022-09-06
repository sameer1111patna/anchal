<?php
include "../functions/functions.php";
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'contactus_tb';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array(
        'db' => 'id',
        'dt' => 'DT_RowId',
        'formatter' => function( $d, $row ) {
            // Technically a DOM id cannot start with an integer, so we prefix
            // a string. This can also be useful if you have multiple tables
            // to ensure that the id is unique with a different prefix
            return 'row_'.$d;
        }
    ),
    array('db' => 'id', 'dt' =>0),
    array( 'db' => 'name', 'dt' => 1 ),
    array( 'db' => 'email', 'dt' => 2 ),
    array( 'db' => 'phone', 'dt' => 3 ),
    array( 'db' => 'subject', 'dt' => 4 ),
    array( 'db' => 'message', 'dt' => 5 ),
   
    
    array(
        'db'        => 'date',
        'dt'        => 6,
        'formatter' => function( $d, $row ) {
            
            return date( 'jS M y', strtotime($d));
        }
    )
   
  
    
);


 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

 // SQL server connection information
 $query="Order By id Desc";




 $querywhere="";




$blob_column_name='';

 





echo $classhelper->fetchdata($_GET,$primaryKey,$query,$table,$columns,$_GET['draw'],$querywhere,$blob_column_name);

?>