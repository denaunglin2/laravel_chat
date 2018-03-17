$(function () {
    $("#reg_code").on('keypress', function (e) {
        if(e.keyCode==13){
            $("#btnRegCode").click();
        }
    });
    $("#btnRegCode").on('click', function () {
        var reg_code=$("#reg_code").val();
        var _token=$("#_token").val();
        $.ajax({
            type: 'post',
            url : '../activate/check-code',
            data : {reg_code:reg_code, _token:_token},
            success:function (msg) {
                $("#info").html(msg);
                if(msg==="<div class='alert alert-success'>Your account have been activated, you can login now.</div>"){
                    setTimeout(function () {
                        window.location.replace("/login")
                    }, 2000)
                }
            }
        })

    });

    $("#email").on('keypress', function (e) {
        if(e.keyCode==13){
            $("#btnActEmail").click();
        }
    });

    $("#btnActEmail").on('click', function () {
        var email=$("#email").val();
        var _token=$("#_token").val();

        $.ajax({
            type : 'post',
            url : '../activate/check-email',
            data : {email:email, _token:_token},
            success:function (msg) {
                $("#info").html(msg);
                if(msg==="<div class='alert alert-success'>Email address is valid.</div>"){
                    window.location.replace("../activate/code")
                }
            }
        })


    });

    $("#password").on('keypress', function (e) {
        if(e.keyCode==13){
            $("#loginForm").submit();
        }
    });
    $("#btnLogin").on('click', function () {
        $("#loginForm").submit();
    });

    $("#loginForm").on('submit', function (e) {
        e.preventDefault();
        var name=$("#name").val();
        var password=$("#password").val();
        var _token=$("#_token").val();

        $.ajax({
            type: 'post',
            url : 'login',
            data : {name:name, password:password, _token:_token},
            success:function (msg) {
                $("#info").html(msg);
                if(msg==="<div class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The user account have not been activated.</div>"){
                    setTimeout(function () {
                        window.location.replace("/activate/email");
                    },2000)
                }
                if(msg==="<div class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> The user account authenticate successfully.</div>"){
                    setTimeout(function () {
                        window.location.replace("/");
                    }, 1000)
                }
            }
        })
    });


    $("#btnReg").on('click', function () {
        $("#regForm").submit();
    });

    $("#password_again").on('keypress', function (e) {
        if(e.keyCode==13){
            $("#regForm").submit();
        }
    });

    $("#regForm").on('submit', function (e) {
        e.preventDefault();

        var name=$("#name").val();
        var email=$("#email").val();
        var password=$("#password").val();
        var password_again=$("#password_again").val();
        var _token=$("#_token").val();

        $.ajax({
            type : 'post',
            url : 'register',
            data : {name:name, email:email, password:password, password_again:password_again, _token:_token},
            beforeSend:function () {
              $("#info").html("<div class='alert alert-info'>Your account registration is in progress....</div>");
            },
            success:function (msg) {
                $("#info").html(msg);
                if(msg==="<div class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> The user account have been created, please check your email inbox and activate your account.</div>"){
                    $("#name").val('');
                    $("#email").val('');
                    $("#password").val('');
                    $("#password_again").val('');
                    setTimeout(function () {
                        window.location.replace("/login");
                    }, 2000)
                }
            }
        })

    });

})