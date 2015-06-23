/*perché con var signin = $("#signin") non funge???????*/

$("#signinButton").click(function(){
  var signin = document.getElementById("registrationDialog");
  signin.toggle();
});

$("#loginButton").click(function(){
  var login = document.getElementById("loginDialog");
  login.toggle();
});

function clickHandler(event) {
  Polymer.dom(event).localTarget.parentElement.submit();
}
