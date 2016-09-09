$(document).ready(function ()
{
    document.getElementById("login").addEventListener("click", function (event) {
        event.preventDefault();
    });
});
$(document).ready(function ()
{
    document.getElementById("register").addEventListener("click", function (event) {
        event.preventDefault();
    });
});

function provera() {
                var greska = 0;
                var nadimak = document.getElementById('user');
                var logSifra = document.getElementById('pass');
                
                var reSifra = /^[[A-z]{5,}$/;
                
                if (nadimak.value == "")
	{
		document.getElementById('userGreska').innerHTML = "You must enter username! ";
		document.getElementById('userGreska').style.color = 'red';
		greska++;
	} else
	{
		document.getElementById('userGreska').innerHTML = "";              
	}
            
        
        if (!logSifra.value.match(reSifra))
	{
		document.getElementById('pasGreska').innerHTML = "Password must be more then four characters!";
		document.getElementById('pasGreska').style.color = 'red';
		greska++;
	} else
	{
		document.getElementById('pasGreska').innerHTML = "";
	}
        
        
		if (greska == 0){
		document.loginForm.submit();
                }
}

function provera1() {
    
        var greska = 0;
        var full_name = document.getElementById('full_name');
	var nickname = document.getElementById('nickname');
	var email = document.getElementById('email');
	var password = document.getElementById('password');
	var confirm_password = document.getElementById('confirm_password');


	var reEmail = /^[\S]+@[a-z]{3,8}\.[a-z]{2,4}(\.[a-z]{2,4})?$/;

        if (full_name.value == "")
	{
		document.getElementById('error_full_name').innerHTML = "You must enter Full name! ";
		document.getElementById('error_full_name').style.color = 'red';
                document.getElementById('error_full_name').style.border = '0px solid green'
		greska++;
	} else
	{
		document.getElementById('error_full_name').innerHTML = "";
		document.getElementById('error_full_name').style.border = '2px solid green';
	}
	
        if (nickname.value == "")
	{
		document.getElementById('error_nickname').innerHTML = "You must enter Nickname! ";
		document.getElementById('error_nickname').style.color = 'red';
                document.getElementById('error_nickname').style.border = '0px solid green'
		greska++;
	} else
	{
		document.getElementById('error_nickname').innerHTML = "";
		document.getElementById('error_nickname').style.border = '2px solid green';
	}

        
         if (email.value == "")
	{
		document.getElementById('error_email').innerHTML = "You must enter Email! ";
		document.getElementById('error_email').style.color = 'red';
                document.getElementById('error_email').style.border = '0px solid green'
		greska++;
	} else
	{
		document.getElementById('error_email').innerHTML = "";
		document.getElementById('error_email').style.border = '2px solid green';
	}

	if (!email.value.match(reEmail))
	{
		document.getElementById('error_email1').innerHTML = "Email is in worng format! ";
		document.getElementById('error_email1').style.color = 'red';
                document.getElementById('error_email1').style.border = '0px solid green'
		greska++;
	} else
	{
		document.getElementById('error_email1').innerHTML = "";
		document.getElementById('error_email1').style.border = '2px solid green';
	}   
        
         if (password.value == "")
	{
		document.getElementById('error_password').innerHTML = "You must enter Password! ";
		document.getElementById('error_password').style.color = 'red';
                document.getElementById('error_password').style.border = '0px solid green'
		greska++;
	} else
	{
		document.getElementById('error_password').innerHTML = "";
		document.getElementById('error_password').style.border = '2px solid green';
	}

	if (confirm_password.value == password.value)
		{
                document.getElementById('error_confirm_password').innerHTML = "";
		document.getElementById('error_confirm_password').style.border = '2px solid green';
		
	} else
	{
		document.getElementById('error_confirm_password').innerHTML = "passwords don't match  ";
		document.getElementById('error_confirm_password').style.color = 'red';
                document.getElementById('error_confirm_password').style.border = '0px solid green'
		greska++;
	}

	
	if (greska == 0)
	{
		document.reg_form.submit();
	}
           
}