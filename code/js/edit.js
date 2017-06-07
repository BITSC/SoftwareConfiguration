/**
 * Created by 高凯辉 on 2017-05-26.
 */

$(document).ready(function(){

    //$("#header").load("../pieces/header.php");

    $("#footer").load("../pieces/footer.html");

    $("#confirm-edit-info").click(function () {

        code=$("#code").val();
        namech=$("#namech").val();
        nature=$("#nature").val();
        industrial=$("#industrial").val();
        bus=$("#bus").val();
        contactch=$("#contactch").val();
        contact_addr=$("#contact_addr").val();
        zipcode=$("#zipcode").val();
        tel=$("#tel").val();
        fax=$("#fax").val();
        email=$("#email").val();

        if(
           code=="" || code==null ||
            namech=="" || namech==null ||
            nature=="" || nature==null ||
            industrial=="" || industrial==null ||
            bus=="" || bus==null ||
            contactch=="" || contactch==null ||
            contact_addr=="" || contact_addr==null ||
            zipcode=="" || zipcode==null ||
            tel=="" || tel==null ||
            fax=="" || fax==null ||
            email=="" || email==null ){
            alert("不能有任何一项为空");
            return;
        }

        if(zipcode.length<6){
            RaiseInform("邮政编码为6位数字",3);
            return;
        }

        if(!validateEmail()){

            RaiseInform("邮箱地址非法",2);
            return ;
        }

        if(!validateTel()){

            RaiseInform("手机格式非法",2);
            return ;
        }

        $.post("../inf/company/company_info_edit.php",{
            code:code,namech:namech,nature:nature,
            industrial:industrial,bus:bus,contactch:contactch,
            contact_addr:contact_addr,zipcode:zipcode,
            tel:tel,fax:fax,email:email
        }, function (data) {

            if(data==1){
                alert("修改企业信息成功");
                window.location.reload();
            }

        })

    })
});

function validateInt(o) {
    var pice = o.value.replace(/^[1-9][0-9]{0,5}|[0-9]$/, '');
    if (pice.length > 0) {
        o.value = o.value.substring(0, o.value.length - 1);
        validateInt(o);
    }
}

function validateEmail(){
    var email = document.getElementById("email").value;
    var reg = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/;
    if (reg.test(email)) {
        return true;
    }
    else {
        return false;
    }
}

function validateTel() {
    var tel = document.getElementById("tel").value;
    var reg = /^1\d{10}$/;
    if (reg.test(tel)) {
        return true;
    }
    else{
        return false;
    }
}