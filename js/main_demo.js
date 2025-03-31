let url;
function add_Center() {
    $("#dlg_1").dialog("open").dialog("setTitle", "Thêm mới");
    $("#fm_1").form("clear");
    url = "data/data_main_demo/data_main_demo.php?Action=addCenter";
    $(".display-img").attr("src", "img/no-image.png");
}
function save_Center() {
    $("#fm_1").form("submit", {
        url: url,
        onsubmit: function () {
            return $(this).form("Validate");
        },
        success: function (result) {
            let result = eval("(" + result + ")");
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
        }
    });

}