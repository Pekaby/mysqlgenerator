// Get the modal
console.log("TEST");
var modal = document.getElementById("myModal");

// Get the button that opens the modal
let btn = document.getElementById("new");

// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
function placeholder(){
  let f=document.gen.theme

  let a=f.options[f.selectedIndex].value

  let doubleElement = document.getElementById('div1')
  let b_double = document.getElementById('seed_b')

  if(a === 'Users'){
    b_double.innerHTML='Seed:'
    //b_double.setAttribute('style', 'margin-top: 15px; margin-right: 300px;')
    doubleElement.innerHTML='<input type="text" class="input_form" name="seed" placeholder="Leave empty for random">'
    //doubleElement.setAttribute('style', 'margin-top: 15px; margin-bottom: 15px; margin-right: 115px;')
  }else{
    doubleElement.innerHTML = ""
    b_double.innerHTML = ""
    doubleElement.setAttribute('style', '')
    b_double.setAttribute('style', '')
  }

  document.all.name.placeholder = a

};