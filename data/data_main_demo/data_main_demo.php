<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'connect.php');

$Action = $_REQUEST['Action'];

if ($Action == 'getArtName'){
    $ArtNo = $_POST['ArtNo'];
    
    $qry_ArticleName = "SELECT XieMing FROM LIY_ERP.dbo.kfxxzl
                        WHERE ARTICLE<>'' AND ARTICLE='$ArtNo'  ";
    
   
    $rs_ArtName = odbc_exec($conn_eip, $qry_ArticleName);
    $ArtName = odbc_result($rs_ArtName,1);
    echo $ArtName;
};

if ($Action == 'addCenter'){
    die("Hello");
}



?>