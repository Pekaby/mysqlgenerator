let error_log    = document.getElementById('error_login')
let to_response  = document.getElementById('response')
let error_signup = document.getElementById('error_signup')

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
        alert("Please, use another browser!")
    }
    
    return Request
} 

document.forms.login_form.onsubmit = function(e) {
      e.preventDefault()

      let email      =  document.forms.login_form.email.value
      let password   =  document.forms.login_form.password.value

      if (email === '') {
            error_log.innerHTML = "Enter your Email"
            return
      }
      if (password === '') {
            error_log.innerHTML = "Enter your Password"
            return
      }
      error_log.innerHTML = "";
      let xhr = CreateRequest()

      xhr.open('POST', '/engine/users/authorisation/log.php')

      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

      xhr.onreadystatechange = function(){
            if (xhr.readyState === 4 && xhr.status === 200) {
                  if (xhr.responseText == 'This Email already registered') {
                        error_log.innerHTML = xhr.responseText
                        return
                  }
                  if(xhr.responseText == 'DONE'){
                        document.location.href = "/account"
                  }else{
                    error_log.innerHTML = xhr.responseText
                  }
            }
      }

      xhr.send('email='+email+'&password='+password+'&login_start=')

}
document.forms.signup_form.onsubmit = function(e){
      e.preventDefault()

      let email      = document.forms.signup_form.email.value
      let password   = document.forms.signup_form.password.value
      let r_password = document.forms.signup_form.r_password.value
      let checkbox   = document.getElementById('chk')

      if (checkbox.checked != true) {
        error_signup.innerHTML = "You need to read privacy policy"
        return
      }
      if (email === '') {
            error_signup.innerHTML = "Enter your Email"
            return
      }
      if (password === '') {
            error_signup.innerHTML = "Enter your password"
            return
      }
      if (r_password === '') {
            error_signup.innerHTML = "Repeat your password"
            return
      }
      if (password != r_password) {
          error_signup.innerHTML = "Password do not match"
          return
      }

      let xhr = CreateRequest()

      xhr.open('POST', '/engine/users/authorisation/log.php')
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

      xhr.onreadystatechange = function(){
            if (xhr.readyState === 4 && xhr.status === 200) {
                  if(xhr.responseText == 'DONE'){
                        document.location.href = "/account"
                  }else{
                    error_signup.innerHTML = xhr.responseText
                  }
            }
      }

      xhr.send('email='+email+'&password='+password+'&chkbox='+checkbox+'&signup_start')
}