$(function() {
/*var user_name;
var user_email;
var password;
var confirm_password;
var room_number;
var ext;
var file;
var data={};

    $("#save").click(function(e)
    {
       // alert("hi");
        user_name=$("#name").val();
        console.log(user_name);
        user_email=$("#email").val();
        password=$("#password").val();
        //console.log(password);
        confirm_password=$("#confirm_password").val();
        room_number=$("#room option:selected").val();
        ext=$("#ext").val();
        console.log("ext",ext);
        file=$("#file").val();
        //console.log(file);
        if(user_name=="")
        {
            $("#not_name").html("please enter user name");
            console.log($("#not_name").html());

        }
        if(user_email=="")
        {
            $("#not_mail").html("please enter user mail");

        }
        if(password=="")
        {
            $("#not_password").html("please enter user password");

        }
        if(confirm_password=="")
        {
            $("#not_confirm_password").html("you have to confirm password");

        }
        if(room_number=="")
        {
            $("#not_select").html("select room");

        }
        if(ext=="")
        {
            $("#not_ext").html("you have to enter ext");
            console.log("eeeeee",$("#not_ext").html());

        }
        if(file=="")
        {
            $("#not_file").html("you have to choose file");

        }

        else
        {
            if(password!=confirm_password)
            {

                $("#not_confirm_password").html("this password not valid");

            }

            else {

                data = {"user_name": user_name,"password":password,"user_email":user_email,"room_number":room_number,"ext":ext,"file":file};
                console.log("data",data);
                //alert("hi");

                var dataString = JSON.stringify(data);

                $.ajax
                ({
                    url: "ajax-files/add_user_validation_ajax.php",
                    method: 'get',
                    data: {"value": dataString
                    },
                    success: function (response) {
                        $("#not_name").html("");
                        $("#not_mail").html("");
                        $("#not_confirm_password").html("");
                        $("#not_select").html("");
                        $("#not_ext").html("");
                        $("#not_file").html("");

                    }
                });


            }



        }




    });


*/

$('#confirm_password').on("change", function (e) {
    var password = $('#password').val();
    var confirm = $(e.target).val();
    if (password == confirm) {
        $('#save').removeAttr('disabled');
    } else {
        $('#save').attr('disabled',"disabled");
    }
});































});