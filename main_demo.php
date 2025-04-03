<?php
include($_SERVER['DOCUMENT_ROOT'] . 'connect.php');
//include(__DIR__ . '/connect.php');   
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
        <!-- <select name="Cat" id="Cat_Search" class="easyui-combobox" style="width:250px" labelWidth="100px" label="Category:"
            editable="false">
           
        </select> -->
        <b>Article:</b>
        <input name="ArtNo_Search" id="ArtNo_Search" style="width: 150px" class="easyui-textbox" />
        <a href="#" style="color:#2272FF" class="easyui-linkbutton" data-options="iconCls:'icon-search'"
            onClick="do_Search()">Search</a>
    </div>
    <div class="easyui-layout" style="width:99%;height:510px">
        <div id="toolbar1">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true"
                onclick="add_Center()">New</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
                onclick="edit_Center()()">Edit</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
                onclick="del_Center()">Remove</a>
        </div>
        <table id="dg_1" class="easyui-datagrid" style="width:100%; height:450px" toolbar="#toolbar1" rownumbers="true"
            fitcolunm='true' singleSelect="true">
            <thead>
                <tr>
                    <th field="ArtNo" width="85" align="center">Article No</th>
                    <th field="ArtName" width="200" align="center">Article Name</th>
                    <th field="Cat" width="100" align="center">Category</th>
                    <th field="Stage" width="70" align="center">Stage</th>
                    <th field="IssuseComment" width="500" align="center">Inssus & Comments</th>
                    <th field="ResDept" width="150" align="center">Responsibilty Dept</th>
                    <th field="Image" width="200" align="center" formatter="formatLink">Picture</th>
                    <th field="UserID" width="85" align="center">User ID</th>
                    <th field="UserDate" width="200" align="center">User Date</th>
                </tr>
            </thead>
        </table>
        <!-- form insert center -->
        <div id="dlg_1" class="easyui-dialog" style="width:700px;top: 200px"
            data-options="closed:true,modal:true,border:' thin',buttons:'#dlg_1-buttons'">
            <form id="fm_1" method="post" novalidate style="margin:0;padding:10px 20px">
                <div style="margin-bottom:10px">
                    <input name="ArtNo" id="ArtNo" class="easyui-textbox" style="width: 300px" label="Article No"
                        labelWidth="100px" required="true">
                    <span style="margin-left:10px">
                        <input name="ArtName" id="ArtName" class="easyui-textbox" style="width:300px"
                            label="Article Name" labelWidth="100px" required="true">
                    </span>
                </div>
                <div style="margin-bottom:10px">
                    <select name="Cat" id="Cat1" class="easyui-combobox" style="width: 300px" label="Catergory"
                        labelWidth="100px" required="true"
                        data-options="valueField: 'Category',textField: 'Category',url: 'data/data_main_demo/data_main_demo.php?Action=getCategory'">
                    </select>
                    <span style="margin-left:10px">
                        <input name="Stage" id="Stage" class="easyui-textbox" style="width:300px" label="Stage"
                            labelWidth="100px" required="true">
                    </span>
                </div>
                <div style="margin-bottom:10px">
                    <span style="margin-right:10px">
                        <select name="Pic" id="Pic" class="easyui-combobox" panelHeight="auto" style="width:300px"
                            label="Picture" labelWidth="100px" required="true">
                            <option value=''></option>
                            <option value='1'>Yes</option>
                            <option value='0'>No</option>
                        </select>
                    </span>
                    <input name="ResDept" id="ResDept" class="easyui-textbox" style="width: 300px" label="FD"
                        labelWidth="100px" required="true">
                </div>
                <div style="margin-bottom:10px">
                    <input name="IssuseComment" id="IssuseComment" class="easyui-textbox" labelPosition="top"
                        multiline="true" style="width:620px;height:120px" label="Issuse And Comment" labelWidth="200px">

                </div>
                <div id="container-img" style="display: none; overflow-x: scroll;overflow-y: hidden;">
                    <div style="display: flex;margin-bottom: 20px;gap: 40px;">
                        <div class="Img">
                            <div style="width: 300px; height: 200px; display: block; margin: 10px auto;">
                                <img class="display-img" width="100%" height="100%" src="img/no-image.png" />
                            </div>
                            <div style="display: flex; justify-content: center;">
                                <span>
                                    <label for="upload1" class="upload-label">
                                        <span class="glyphicon glyphicon-picture"
                                            style="font-size: 2.5rem; cursor: pointer; margin-right: 10px;">
                                        </span>
                                        <input type="file" class="uploads" id="upload1" style="display: none" />

                                        <input type="hidden" class="image" name="displayImg[]" />
                                    </label>
                                </span>
                            </div>
                        </div>
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
        <!-- form edit center -->
        <div id="dlg_ed_1" class="easyui-dialog" style="width:700px;top: 200px"
            data-options="closed:true,modal:true,border:' thin',buttons:'#dlg_1-buttons'">
            <form id="fm_ed_1" method="post" novalidate style="margin:0;padding:10px 20px">
                <div style="margin-bottom:10px">
                    <input name="ArtNo" id="ArtNo1" class="easyui-textbox" style="width: 300px" label="Article No"
                        labelWidth="100px" required="true">
                    <span style="margin-left:10px">
                        <input name="ArtName" id="ArtName1" class="easyui-textbox" style="width:300px"
                            label="Article Name" labelWidth="100px" required="true">
                    </span>
                </div>
                <div style="margin-bottom:10px">
                    <select name="Cat" id="Cat1" class="easyui-combobox" style="width: 300px" label="Catergory"
                        labelWidth="100px" required="true"
                        data-options="valueField: 'Category',textField: 'Category',url: 'data/data_main_demo/data_main_demo.php?Action=getCategory'">
                    </select>
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
                <div id="container-img_1" style="display: none; overflow-x: scroll;overflow-y: hidden;">
                    <div style="display: flex;margin-bottom: 20px;gap: 40px;">
                        <div class="Img">
                            <div style="width: 300px; height: 200px; display: block; margin: 10px auto;">
                                <img class="display-img_1" width="100%" height="100%" src="img/no-image.png" />
                            </div>
                            <div style="display: flex; justify-content: center;">
                                <span>
                                    <label for="upload_1" class="upload-label_1">
                                        <span class="glyphicon glyphicon-picture"
                                            style="font-size: 2.5rem; cursor: pointer; margin-right: 10px;">
                                        </span>
                                        <input type="file" class="uploads_1" id="upload_1" style="display: none" />

                                        <input type="hidden" class="image_1" name="displayImg[]" />
                                    </label>
                                </span>
                            </div>
                        </div>
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