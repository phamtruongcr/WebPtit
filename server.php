<?php


function display_name_department($department_id){
    require 'admin/connect.php';
    $sql1 = "SELECT * FROM department WHERE id ='$department_id'";
    $query1 = mysqli_query($conn, $sql1);
    $data = mysqli_fetch_assoc($query1);
    return $data['display_name'];
}

function icon_insert_edit_delete($id){
    return "<a href='read.php?id=".$id."'title='View' data-toggle = 'tooltip'>
            <span class='glyphicon glyphicon-eye-open'></span></a> 
            <a href='update.php?id=".$id."'title='Update' data-toggle = 'tooltip'>
            <span class='glyphicon glyphicon-pencil'></span></a>
            <a href='delete.php?id=".$id."'title='Delete' data-toggle = 'tooltip'>
            <span class='glyphicon glyphicon-trash'></span></a>";
}

$table = 'students';
 
$primaryKey = 'id';
 
$columns = array(
    array( 'db' => 'id_card', 'dt' => 0 ),
    array( 'db' => 'display_name',  'dt' => 1 ),
    array( 'db' => 'class',   'dt' => 2 ),
    array( 'db' => 'department_id','dt' => 3,
        'formatter' => function( $d, $row ) {
            return display_name_department($d);
        }
    ),
    array( 'db' => 'gpa',   'dt' => 4 ),
    array( 'db' => 'id','dt' => 5,
        'formatter' => function( $d, $row ) {
            return icon_insert_edit_delete($d);
        }
    ),
   
);
 
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'ptit',
    'host' => 'localhost'
);
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);

?>