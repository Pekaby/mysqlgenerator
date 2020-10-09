let response = document.getElementById("response")
let errors = document.getElementById("error")
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
function download(id) {
    xhr = CreateRequest()

    xhr.open('POST', '/engine/users/server/download_user_file.php')
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

      xhr.onreadystatechange = function(){
            if (xhr.readyState === 4 && xhr.status === 200) {
                  document.location.href = "/direct?fileid="+xhr.responseText
            }
      }

    xhr.send('file_id='+id)
}
function man_delete(id) {
    xhr = CreateRequest()
    xhr.open('POST', '/engine/users/server/manual_delete.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
          xhr.onreadystatechange = function(){
            if (xhr.readyState === 4 && xhr.status === 200) {
                  document.location.href = "/account"
            }
      }
      xhr.send('file_id='+id)
}
function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}

document.forms.gen.onsubmit = function(e) {
      e.preventDefault()
      let f = document.gen.theme
      let table_name = document.forms.gen.name_table.value;
      let theme = f.options[f.selectedIndex].value
      let how_man = document.forms.gen.how_many.value;
      let how_many = parseInt(how_man)

      if (theme == 'Users') {
        let seed = document.forms.gen.seed.value;
        if (seed === '') {
          getRandomInt(9999)
        }
      }else{
        let seed = 1;
      }
      if (isNaN(how_many)) {
        errors.innerHTML = 'Enter the number in field "How many records do you need?"'
        return
      }
      if (how_many === '') {
        errors.innerHTML = "How many records do you need?"
        return
      }
      if (how_many >= 15000) {
        errors.innerHTML = "Too many records"
      }
      if (table_name === '') {
        table_name = theme
      }
    xhr = CreateRequest()
    xhr.open('POST', '/engine/users/server/generating.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
          xhr.onreadystatechange = function(){
            if (xhr.readyState === 4 && xhr.status === 200) {
                  document.location.href = "/account"
            }
      }
      
      if (typeof seed !== 'undefined') {
        xhr.send('filename='+table_name+'&theme='+theme+'&how_many='+how_many+'&seed='+seed+'&start=')
      }else{
        xhr.send('filename='+table_name+'&theme='+theme+'&how_many='+how_many+'&start=')
      }


}
