const confirmPasswordCheck = () => {

    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirm_password");


    if ((!(password.value == null || confirmPassword.value == null)) && password.value !== confirmPassword.value) {
        password.classList.add('is-invalid');
        confirmPassword.classList.add('is-invalid');
        document.getElementById("usrSubBtn").disabled = true;
    } else {
        password.classList.remove('is-invalid');
        confirmPassword.classList.remove('is-invalid');
        document.getElementById("usrSubBtn").disabled = false;
    }
}

const changeStatus = (id,cn,ref,div,val) =>
{
    $("#"+div+"-"+cn).html(`
        <div class="spinner-border text-dark spinner-border-sm" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    `);
    let xmlhttp;
    if (window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
        {
            document.getElementById(div+"-"+cn).innerHTML=xmlhttp.responseText;
        }
    }
    url='ajax/changeStatus.php?id='+id+'&ref='+ref+'&div='+div+'&val='+val+'&cn='+cn;
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}
