$(document).ready(function () {
    $("#Pic").combobox({
        onChange: function (newValue) {
            if (newValue == '1') {
                $("#container-img").css('display', 'block');
            }
            if (newValue == '0' || newValue == '') {
                $('#container-img').css('display', 'none');
            }
        }
    });
    $("#Pic1").combobox({
        onChange: function (newValue) {
            if (newValue == '1') {
                $("#container-img").css('display', 'block');
            }
            if (newValue == '0' || newValue == '') {
                $('#container-img').css('display', 'none');
            }
        }
    });

    $("#ArtNo").textbox('textbox').bind('keyup', function (e) {
        $.ajax({
            type: 'POST',
            url: 'data/data_main_demo/data_main_demo.php?Action=getArtName',
            data: {
                ArtNo: e.target.value
            },
            success: function (res) {
                $("#ArtName").textbox('setValue', res);
            }
        })
    });
    $("#ArtNo1").textbox('textbox').bind('keyup', function (e) {
        $.ajax({
            type: 'POST',
            url: 'data/data_main_demo/data_main_demo.php?Action=getArtName',
            data: {
                ArtNo: e.target.value
            },
            success: function (res) {
                $("#ArtName1").textbox('setValue', res);
            }
        })
    });
    $('.upload-label').change(function (e) {
        var index = $(this).index('.upload-label');
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.onload = function (event) {
            $($(".display-img")[index]).attr('src', event.target.result);
            $($(".image")[index]).val(event.target.result);
        };
        reader.readAsDataURL(file);
    });
    $('.upload-label_1').change(function (e) {
        var index = $(this).index('.upload-label_1');
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.onload = function (event) {
            $($(".display-img_1")[index]).attr('src', event.target.result);
            $($(".image_1")[index]).val(event.target.result);
        };
        reader.readAsDataURL(file);
    });

    // $("#dg_1").datagrid({
    //     onDblclickCell: function (index, filed, value) {
    //         var row = $('#dg_1').datagrid("getSelected");
    //         if (row.Image) {

    //         }
    //     },
    // });

})

var url;
function add_Center() {
    $("#dlg_1").dialog("open").dialog("setTitle", "Thêm mới");
    $("#fm_1").form("clear");
    url = "data/data_main_demo/data_main_demo.php?Action=addCenter";
    $(".display-img").attr("src", "img/no-image.png");
}

function save_Center() {
    $("#fm_1").form("submit", {
        url: url,
        onSubmit: function () {
            return $(this).form("validate");
        },
        success: function (result) {
            var result = JSON.parse(result)  //eval("(" + result + ")"); có thể dùng này
            if (result.Info) {
                $.messager.show({
                    title: "Info",
                    msg: result.Info,
                });
                $("#dlg_1").dialog("close");
                $("#dg_1").datagrid("reload");
            } else {
                $("#dlg_1").dialog("close");
                $("#dg_1").datagrid("reload");
            }
        },
    });
}

function edit_Center() {
    var row = $("#dg_1").datagrid("getSelected");
    if (row) {
        $("#dlg_ed_1").dialog('open').dialog("setTitle", "Edit");
        $("#fm_ed_1").form("load", row);
        let images = row.Image.split(',');
        let displayImage = $(".display-img_1");
        for (let i = 0; i < displayImage.length; i++) {
            if (images[i] === undefined) {
                $($(".display-img_1")[i]).attr('src', "img/no-image.png");
            } else {
                if (row.Pic == 0) {
                    $($(".display-img_1")[i]).attr('src', "img/no-image.png");
                } else {
                    $($(".display-img_1")[i]).attr('src', 'data/data_main_demo/img/' + images[i]);
                }
            }
        }
        url =
            "data/data_main_demo/data_main_demo.php?Action=editCenter&ArtNo=" +
            row.ArtNo +
            "&ArtName=" +
            row.ArtName +
            "&Cat=" +
            row.Cat +
            "&Stage=" +
            row.Stage +
            "&IssuseComment=" +
            row.IssuseComment +
            "&Pic=" +
            row.Pic +
            "&ResDept=" +
            row.ResDept +
            "&Image=" +
            row.Image;

    }
}
function save_Center_ed() {
    $("#fm_ed_1").form("submit", {
        url: url,
        onSubmit: function () {
            return $(this).form("validate");
        },
        success: function (res) {
            var res = eval("(" + res + ")");
            if (res.Info) {
                $.messager.show({
                    title: "Info",
                    msg: res.Info,
                });
                $("#dlg_ed_1").dialog("close");
                $("#dg_1").datagrid("reload");
            } else {
                $("#dlg_ed_1").dialog("close");
                $("#dg_1").datagrid("reload");
            }
        }
    });
}

function del_Center() {
    var row = $("#dg_1").datagrid("getSelected");
    if (row) {
        $.messager.confirm(
            "Confirm",
            "Bạn có muốn xóa dòng này không?",
            function (r) {
                if (r) {
                    $.post(
                        "data/data_main_demo/data_main_demo.php?Action=deleteCenter&ArtNo="
                        + row.ArtNo + "&Image=" + row.Image,
                        function (result) {
                            $("#dg_1").datagrid("reload");
                            $.messager.show({
                                title: "Info",
                                msg: result.Info,
                            });
                        },
                        "Json"
                    );
                };
            }
        );
    };
}
function do_Search() {
    $("#dg_1").datagrid({
        url: "data/data_main_demo/data_main_demo.php?Action=showCenter&ArtNo=" +
            $("#ArtNo_Search").val()
    });
}

function formatLink(val) {
    let array = val.split(",");
    let imagesArray = [];
    for (var i = 0; i <= array.length - 1; i++) {
        if (val) {
            imagesArray.push(
                "<img width='90px' height='50px' src='./data/data_main_demo/img/" +
                array[i] +
                "'>"
            )
        }
    }
    if (val) {
        return imagesArray.join(" ");
    } else {
        return "No";
    }
}