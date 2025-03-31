<?php
$conn_eip=odbc_connect('EIP DB','sa','1234');
if (! $conn_eip){
    die( " connect EIP DB error rr");
}
?>