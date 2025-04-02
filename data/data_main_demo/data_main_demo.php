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
};

if ($Action == 'showCenter') {
    $ArtNo = isset($_GET['ArtNo']) ? ($_GET['ArtNo']) : '';
    $ArtName = isset($_GET['ArtName']) ? ($_GET['ArtName']) : '';
    $Cat = isset($_GET['Cat']) ? ($_GET['Cat']) : '';
    $Stage = isset($_GET['Stage']) ? ($_GET['Stage']) : '';
    $IssuseComment = isset($_GET['IssuseComment']) ? ($_GET['IssuseComment']) : '';
    $Pic = isset($_GET['Pic']) ? ($_GET['Pic']) : '';
    $ResDept = isset($_GET['ResDept']) ? ($_GET['ResDept']) : '';
    $Img = isset($_GET['displayImg']) ? $_GET['displayImg'] : '';


    $sqlDA = '';
    if ($ArtNo != '') {
        $sqlDA .= "AND ArticleNo = '$ArtNo' ";
    }
    if ($Cat != '') {
        $sqlDA .= "AND Category = '$Cat' ";
    }
    $qry_SearhTest = "SELECT ArticleNo ArtNo, ArticleName ArtName, Category Cat, Stage
                            ,Issuse_Comment IssuseComment,Picture Pic, Res_Dept ResDept, UserID, UserDate,Images Image
                      FROM EIP_Test
                      WHERE 1=1";
    // echo $qry_SearhTest;
    $rs = odbc_exec($conn_eip, $qry_SearhTest);

    $item = array();
    while (@$row = odbc_fetch_object($rs)) {
        array_push($item, $row);
    }

    $result["rows"] = $item;

    echo json_encode($result);
}

if ($Action == 'addCenter') {
    $ArtNo = isset($_POST['ArtNo']) ? ($_POST['ArtNo']) : '';
    $ArtName = isset($_POST['ArtName']) ? ($_POST['ArtName']) : '';
    $Cat = isset($_POST['Cat']) ? ($_POST['Cat']) : '';
    $Stage = isset($_POST['Stage']) ? ($_POST['Stage']) : '';
    $IssuseComment = isset($_POST['IssuseComment']) ? ($_POST['IssuseComment']) : '';
    $Pic = isset($_POST['Pic']) ? ($_POST['Pic']) : '';
    $ResDept = isset($_POST['ResDept']) ? ($_POST['ResDept']) : '';
    $Img = isset($_POST['displayImg']) ? $_POST['displayImg'] : '';

    if ($Img != '') {
        $Arry_Image = array();
        foreach ($Img as $item) {
            if ($item != '') {
                $ImgName = rand(100, 10000);
                $Image = str_replace('-', '', $ArtNo) . "_" . $ImgName . ".png";
                array_push($Arry_Image, $Image);
                $path = "img/" . str_replace('-', '', $ArtNo) . "_" . $ImgName . ".png";
                $image_parts = explode(";base64,", $item);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $file = $path;
                file_put_contents($file, $image_base64);
            }
        }
        $Images = implode(",", $Arry_Image);

        $sqlInsert = "INSERT INTO EIP_Test
                  (ArticleNo,ArticleName,Category,Stage,Issuse_Comment,
	                Picture,Res_Dept,UserID,UserDate,Images)
                VALUES
                (
                    '$ArtNo','$ArtName','$Cat','$Stage','$IssuseComment',
                    '$Pic','$ResDept','32729',GetDate(),'$Image'
                )";
        $rs = odbc_exec($conn_eip, $sqlInsert);
        if (odbc_num_rows($rs) > 0) {
            echo json_encode(array('Info' => 'Thêm dữ liệu thành công!. '));
        } else {
            echo json_encode(array('Info' => 'Lỗi dữ liệu!.'));
        }
    } elseif ($Pic == '0') {
        $Image = null;
        $sqlInsert = "INSERT INTO EIP_Test
                  (ArticleNo,ArticleName,Category,Stage,Issuse_Comment,
	                Picture,Res_Dept,UserID,UserDate,Images)
                VALUES
                (
                    '$ArtNo','$ArtName','$Cat','$Stage','$IssuseComment',
                    '$Pic','$ResDept','32729',GetDate(),'$Image'
                )";
        $rs = odbc_exec($conn_eip, $sqlInsert);
        if (odbc_num_rows($rs) > 0) {
            echo json_encode(array('Info' => 'Thêm dữ liệu thành công!. '));
        } else {
            echo json_encode(array('Info' => 'Lỗi dữ liệu!.'));
        }
    } else {
        echo "<script>alert('Vui lòng chọn hình ảnh của bạn!')</script>";
    }
}

if ($Action == 'editCenter') {
}

if ($Action == 'deleteCenter') {
    $ArtNo = isset($_REQUEST['ArtNo']) ? ($_REQUEST['ArtNo']) : '';
    $Image = isset($_REQUEST['Image']) ? ($_REQUEST['Image']) : '';
    //echo $Image;
    if ($Image == '') {
        $sqlDel = "DELETE FROM EIP_Test WHERE ArticleNo = '$ArtNo'";
        $rs = odbc_exec($conn_eip, $sqlDel);

        if (odbc_num_rows($rs) > 0) {
            echo json_encode(array('Info' => 'Success'));
        } else {
            echo json_encode(array('Info' => 'Erorr'));
        }
    } else {
        $del_img = explode(',', $Image);
        $count = 0;
        foreach ($del_img as $item) {
            $createDeletePath = "img/" . $item;
            unlink($createDeletePath);
            $sqlDel = "DELETE FROM EIP_Test WHERE ArticleNo = '$ArtNo'";
            $rs = odbc_exec($conn_eip, $sqlDel);
            $count++;
        }
        if ($count > 0) {
            echo json_encode(array('Info' => 'Success'));
        } else {
            echo json_encode(array('Info' => 'Erorr'));
        }
    }
}
