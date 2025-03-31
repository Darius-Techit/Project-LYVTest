<?php
//include($_SERVER['DOCUMENT_ROOT'] . 'conn.php'); 
//include(__DIR__ . '/connect.php');   
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/demo/demo.css">
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="./css/main_demo.css">
    <script src="./js/main_demo.js"></script>
</head>

<body>
    <table class="head-table">
        <tr>
            <td><img src="lyvlogo.png" alt="" height="40" /></td>
            <td>
                <h2> System Input</h2>
            </td>
        </tr>
    </table>
    <div class="search">
        <select name="Lean" id="Lean" class="easyui-combobox" style="width:200px" labelWidth="50px" label="Stage:"
            editable="false">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>
    <div class="easyui-layout" style="width:99%;height:510px">

        <div id="toolbar1">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true"
                onclick="add_Center()">New
                User</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
                onclick="editUser()">Edit User</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
                onclick="destroyUser()">Remove User</a>
        </div>
        <table id="dg_1" class="easyui-datagrid" style="width:100%; height:450px" toolbar="#toolbar1" rownumbers="true"
            fitcolunm='true' singleSelect="true">
            <thead>
                <tr>
                    <th field="ArticleNo" width="85">Article No</th>
                    <th field="ArticleName" width="200">Article Name</th>
                    <th field="Category" width="50">Category</th>
                    <th field="Stage" width="50">Stage</th>
                    <th field="email" width="255">Inssus & Comments</th>
                </tr>
            </thead>
        </table>
        <!-- form insert center -->
        <div id="dlg_1" class="easyui-dialog" style="width:730px;top: 50px"
            data-options="closed:true,modal:true,border:'thin',buttons:'#dlg_1-buttons'">
            <form id="fm_1" method="post" novalidate style="margin:0;padding:10px 20px">
                <h3>User Information</h3>
                <div style="margin-bottom:10px">
                    <input name="firstname" class="easyui-textbox" required="true" label="First Name:"
                        style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="lastname" class="easyui-textbox" required="true" label="Last Name:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="phone" class="easyui-textbox" required="true" label="Phone:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="email" class="easyui-textbox" required="true" validType="email" label="Email:"
                        style="width:100%">
                </div>
                <div>
                    <div>

                    </div>
                </div>
            </form>
        </div>
        <div id="dlg_1-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="save_Center()"
                style="width:90px">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel"
                onclick="javascript:$('#dlg_1').dialog('close')" style="width:90px">Cancel</a>
        </div>
    </div>
</body>

</html>