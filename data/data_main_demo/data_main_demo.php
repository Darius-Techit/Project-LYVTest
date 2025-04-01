<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . 'connect.php');

$Action = $_REQUEST['Action'];


if ($Action == 'getCategory') {
    $sql = "SELECT DISTINCT Category FROM LIY_ERP.dbo.kfxxzl
            WHERE ISNULL(Category,'')<>'' ";
    $rs = odbc_exec($conn_eip, $sql);

    $items = array();
    while ($row = odbc_fetch_object($rs)) {
        array_push($items, $row);
    }
    echo json_encode($items);
};


if ($Action == 'getArtName') {
    $ArtNo = $_POST['ArtNo'];

    $qry_ArticleName = "SELECT XieMing FROM LIY_ERP.dbo.kfxxzl
                        WHERE ARTICLE<>'' AND ARTICLE='$ArtNo' ";
    $rs_ArtName = odbc_exec($conn_eip, $qry_ArticleName);
    $ArtName = odbc_result($rs_ArtName, 1);
    echo $ArtName;
}
;

if ($Action == 'addCenter') {
    die("Hello");
}



?>