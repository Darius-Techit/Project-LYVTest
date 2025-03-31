var url;
function add_Center() {
    $("#dlg_1").dialog("open").dialog("setTitle", "Thêm mới");
    $("#fm_1").form("clear");
    url = "data/data_main_demo/data_main_demo.php?Action=addCenter";
    $(".display-img").attr("src", "img/no-image.png");
};

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
                $("#dg_1").datagrid("reload");
            } else {
                $("#dlg_1").dialog("close");
                $("#dg_1").datagrid("reload");
            }
        },
    });

};