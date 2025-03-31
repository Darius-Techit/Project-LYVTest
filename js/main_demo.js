
$(document).ready(function () {
    // $("#ArtNo").textbox('textbox').bind('keyup', function (e) {
    //     $.ajax({
    //         type: "POST",
    //         url: "data/data_main_demo/data_main_demo.php?Action=getArtName",
    //         data: {
    //             ArtNo: e.target.value
    //         },
    //         success: function (response) {
    //             $("#ArtName").textbox('setValue', response);
    //         }
    //     });
    // });
    $("#ArtNo1").textbox('textbox').bind('keyup', function (e) {
        console.log(e.target.value)

        $.ajax({
            type: 'POST',
            url: 'data/data_main_demo/data_main_demo.php?Action=getArtName',
            data: {
                ArtNo: e.target.value
            },
            success: function (res) {
                console.log(res)
            }
        })
        // $.ajax({
        //     type: "POST",
        //     url: "data/data_main_demo/data_main_demo.php?Action=getArtName",
        //     data: {
        //         ArtNo: e.target.value
        //     },
        //     success: function (response) {
        //         $("#ArtName1").textbox('setValue', response);
        //     }
        // });
    });
})

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
