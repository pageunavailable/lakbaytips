$(document).ready(function(){
    $("#namereq").css("display", "none");
    $("#usrcharerror").css("display", "none");
    $("#valeml").css("display", "none");
    $("#pswcharerror").css("display", "none");
    $("#pswnumreq").css("display", "none");
    $("#pswnmtch").css("display", "none");
    $("#pswmtch").css("display", "none");
    $("#usrnullerror").css("display", "none");
    $("#pswnullerror").css("display", "none");
    function AutoChecker(e) {
        if($('#sgnconfpsw').val() != ""){
            if($('#sgnpsw').val() == $('#sgnconfpsw').val()){
                $("#pswmtch").css("display", "block");
                $("#pswnmtch").css("display", "none");
            }
            else{
                $("#pswnmtch").css("display", "block");
                $("#pswmtch").css("display", "none");
            }
        }
        else{
            $("#pswnmtch").css("display", "none");
            $("#pswmtch").css("display", "none");
        }
        
    }
    document.getElementById('sgnconfpsw').addEventListener('input', AutoChecker);
    document.getElementById("sgnconfpsw").addEventListener("keyup", AutoChecker);

});


condmet = 0;
function onSubmit(){
    condmet = 0;
    clear = false;
    sgn_usr = document.getElementById('sgnusr').value;
    sgn_psw = document.getElementById('sgnpsw').value;
    sgn_conf_psw = document.getElementById('sgnconfpsw').value;
    sgn_fname = document.getElementById('sgnfname').value;
    sgn_lname = document.getElementById('sgnlname').value
    if(sgn_fname == "" || sgn_lname == ""){
        $("#namereq").css("display", "block");
    }
    else{
        $("#namereq").css("display", "none");
        condmet++;
    }
    if(sgn_usr.length == 0){
        $("#usrnullerror").css("display", "block");
    }
    else if(sgn_usr.length > 7){
        $("#usrcharerror").css("display", "none");
        $("#usrnullerror").css("display", "none");
        condmet++;
        
    }
    else{
        $("#usrnullerror").css("display", "none");
        $("#usrcharerror").css("display", "block");
    }

    var validEmailRegEx = /^[A-Z0-9_'%=+!`#~$*?^{}&|-]+([\.][A-Z0-9_'%=+!`#~$*?^{}&|-]+)*@[A-Z0-9-]+(\.[A-Z0-9-]+)+$/i
    var isEmailValid = validEmailRegEx.test($('#sgneml').val());
    if($('#sgneml').val()==""){
        $('#valeml').attr("style", "display:block");
    }
    else{
        if(isEmailValid){
            condmet++;
            $('#valeml').attr("style", "display:none");
        }
        else{
            $('#valeml').attr("style", "display:block");
        }
    }

    if($('#sgnpsw').val() == ""){
        $("#pswnullerror").css("display", "block");
        $("#pswcharerror").css("display", "none");
    }
    else if($('#sgnpsw').val().length < 8 && $('#sgnpsw').val().length > 0){
        $("#pswcharerror").css("display", "block");
        $("#pswnullerror").css("display", "none");
    }
    else if($('#sgnpsw').val() == $('#sgnconfpsw').val() && ($('#sgnconfpsw').val().length > 7)){
        condmet++;
    }

    else{
        $("#pswcharerror").css("display", "none");
    }
    if(condmet < 4){
        event.preventDefault();
    }

}
