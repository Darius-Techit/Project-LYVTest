<?php
include($_SERVER['DOCUMENT_ROOT'] . 'connect.php'); 
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
    <script src="js/main_demo.js"></script>
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
                onclick="add_Center()">New</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
                onclick="editUser()">Edit</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
                onclick="destroyUser()">Remove</a>
        </div>
        <table id="dg_1" class="easyui-datagrid" style="width:100%; height:450px" toolbar="#toolbar1" rownumbers="true"
            fitcolunm='true' singleSelect="true">
            <thead>
                <tr>
                    <th field="ArticleNo" width="85" align="center">Article No</th>
                    <th field="ArticleName" width="200" align="center">Article Name</th>
                    <th field="Category" width="80" align="center">Category</th>
                    <th field="Stage" width="50" align="center">Stage</th>
                    <th field="Comment" width="255" align="center">Inssus & Comments</th>
                </tr>
            </thead>
        </table>
        <!-- form insert center -->
        <div id="dlg_1" class="easyui-dialog" style="width:700px;top: 200px"
            data-options="closed:true,modal:true,border:'thin',buttons:'#dlg_1-buttons'">
            <form id="fm_1" method="post" novalidate style="margin:0;padding:10px 20px">
                <div style="margin-bottom:10px">
                    <input name="ArtNo" id="ArtNo1" class="easyui-textbox" style="width: 300px" label="Article No"
                        labelWidth="100px" required="true">
                    <span style="margin-left:10px">
                        <input name="ArtName" id="ArtName1" class="easyui-textbox" style="width:300px"
                            label="Article Name" labelWidth="100px" required="true">
                    </span>
                </div>
                <div style="margin-bottom:10px">
                    <input name="Cat" id="Cat1" class="easyui-combobox" style="width: 300px" label="Catergory"
                        labelWidth="100px" required="true"
                        data-options="valueField: 'alias',textField: 'alias',url: 'data/data_metal_recording/data_MetalRecording.php?Action=getLine'">
                    <span style="margin-left:10px">
                        <input name="Stage" id="Stage1" class="easyui-textbox" style="width:300px" label="Stage"
                            labelWidth="100px" required="true">
                    </span>
                </div>
                <div style="margin-bottom:10px">
                    <span style="margin-right:10px">
                        <select name="Pic" id="Pic1" class="easyui-combobox" panelHeight="auto" style="width:300px"
                            label="Picture" labelWidth="100px" required="true">
                            <option value=''></option>
                            <option value='1'>Yes</option>
                            <option value='0'>No</option>
                        </select>
                    </span>
                    <input name="ResDept" id="ResDept1" class="easyui-textbox" style="width: 300px" label="FD"
                        labelWidth="100px" required="true">
                </div>
                <div style="margin-bottom:10px">
                    <input name="IssuseComment" id="IssuseComment1" class="easyui-textbox" labelPosition="top"
                        multiline="true" style="width:620px;height:120px" label="Issuse And Comment" labelWidth="200px">

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