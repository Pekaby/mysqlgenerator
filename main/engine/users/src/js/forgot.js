function CreateRequest()
{
    let Request = false

    if (window.XMLHttpRequest)
    {
        Request = new XMLHttpRequest()
    }
    else if (window.ActiveXObject)
    {
        try
        {
             Request = new ActiveXObject("Microsoft.XMLHTTP")
        }    
        catch (CatchException)
        {
             Request = new ActiveXObject("Msxml2.XMLHTTP")
        }
    }
 
    if (!Request)
    {
        alert("Please, enable javascript!")
    }
    
    return Request
} 
document.forms.form_forgot.onsubmit = function(e) {
    e.preventDefault()

    let email = document.forms.form_forgot.email_to_ch.value
    let error = document.getElementById('error')
    let notice = document.getElementById('notice')
    if (email === '') {
        error.innerHTML = 'Enter your email'
        return
    }

    xhr = CreateRequest()
    xhr.open('POST', '/engine/users/authorisation/forgot_server.php')
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

      xhr.onreadystatechange = function(){
            if (xhr.readyState === 4 && xhr.status === 200) {
                  if(xhr.responseText == 'DONE'){
                        notice.innerHTML = '<div class="box"><div class="icon_box"> <img src="/engine/users/src/icons/tick.png" alt="" class="icon"></div><div class="title_box">Email has been sent</div><div class="text_box">Check spam if the message doesn’t arrive in 5 minutes</div></div>';
                  }else{
                    error.innerHTML = xhr.responseText
                  }
            }
      }
      xhr.send('email='+email+'&send_em=true')

}
document.forms.pswd_form.onsubmit = function(e) {
    e.preventDefault()

    let error_pswd = document.getElementById('error_pswd');

    let password = document.forms.pswd_form.password.value
    let password1 = document.forms.pswd_form.password1.value

    if (password1 === '') {
        error_pswd.innerHTML = 'Repeat your password'
        return
    }
    if (password === '') {
        error_pswd.innerHTML = 'Enter your password'
        return
    }
    if (password != password1) {
        error_pswd.innerHTML = 'Password do not match'
        return
    }
    xhr = CreateRequest()
    xhr.open('POST', '/engine/users/authorisation/forgot_server.php')
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

      xhr.onreadystatechange = function(){
            if (xhr.readyState === 4 && xhr.status === 200) {
                  if(xhr.responseText == 'DONE'){
                         document.location.href = "/login"
                  }else{
                    error_pswd.innerHTML = xhr.responseText
                  }
            }
      }
      xhr.send('password='+password+'&recover=true')

}