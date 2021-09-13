function check(form, password)
{
    var p = document.createElement("input");
    form.appendChild(p);
    p.name = "id";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
    password.value = "";
    form.submit();
}

function user()
{
    loginForm.user.focus();
}
