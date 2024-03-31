$(document).ready(function () {
    $(".alert").fadeTo(2000, 500).slideUp(500, function () {
        $(".alert").slideUp(500);
    });
    $(".deleteId").click(function () {
        var deleteId = $(this).attr("data-deleteId");
        $("#deleteId").val(deleteId);
        var deleteName = $(this).attr("data-name");
        $(".deleteName").text(deleteName);
        var deleteBtnVal = $(this).attr("data-deleteBtnVal");
        $("#deleteBtn").val(deleteBtnVal);
    });

    $(".logout").click(function (e) {
        e.preventDefault();
        swal({
            title: "Are you sure want to logout?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "logout.php";
                }
            });
    });

    function matchPass() {
        var Pass = $("#pass").val();
        var cPass = $("#Cpass").val();
        if (Pass === cPass) {
            $("#Cpass").css("border", "1px solid blue");
            $(".notice").css("display", "none");
        } else {
            $("#Cpass").css("border", "1px solid red");
            $(".notice").css("display", "block");
        }
    }
    $("#pass").keyup(function () {
        $("#Cpass").val("");
    });
    $("#Cpass").keyup(function () {
        matchPass();
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
});