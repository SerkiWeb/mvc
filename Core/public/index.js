
window.onload = function() {
   document.getElementById('ask-weather').addEventListener('click', getUsers);
}

function getUsers()
{
  var req = new XMLHttpRequest();
  req.onreadystatechange = function() {
     if (this.readyState  == XMLHttpRequest.DONE && this.status == 200) {
       var response = JSON.parse(this.responseText);
       console.log(response);
       document.getElementById('result').innerHTML = response;
     }
  }; 
  req.open('GET', 'http://localhost/index_test.php');
  req.send();
}

