function search() {
    var input = document.getElementById("monitorEmailInput").value;
    var nameID = document.getElementById("nomeUser");
    var emailID = document.getElementById("emailUser");
    
    var req = new XMLHttpRequest();
    req.responseType = "json";
    req.open("GET", '/disciplinas/find/'+ input, true);
   
    req.onload = function() {
      var monitores = req.response;      

      nameID.innerHTML = "<h7>" + monitores.name+"</h7>";
      emailID.innerHTML = "<p>" + monitores.email+"</p>";
    };

    req.send(null);
    
}