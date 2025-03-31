<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'conn.php');

$Action = $_REQUEST['Action'];


echo $Action;

// if ($Action == 'getArtName'){
//     $ArtNo = $_POST['ArtNo'];
//     echo $ArtNo;
    
//     // $qry_ArticleName = `SELECT XieMing FROM LIY_ERP.LIY_ERP.kfxxzl
//     //                     WHERE ARTICLE='$ArtNo' `;
//     // $rs_ArtName = odbc_exec($conn_eip, $qry_ArticleName);
//     // $ArtName = odbc_result($rs_ArtName,1);
// };

// if ($Action == 'addCenter'){
//     die("Hello");
// }



?>