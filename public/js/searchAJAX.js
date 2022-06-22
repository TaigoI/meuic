function search() {
    var input = document.getElementById("monitorEmailInput").value;
    var nameID = document.getElementById("nomeUser");
    var emailID = document.getElementById("emailUser");

    var req = new XMLHttpRequest();
    req.responseType = "json";
    req.open("GET", '/disciplinas/find/' + input, true);

    req.onload = function () {
        var monitores = req.response;

        nameID.innerHTML = "<h7 id='alo'>" + monitores.name + "</h7>";
        emailID.innerHTML = "<p id='returnedEmail'>" + monitores.email + "</p>";
    };

    req.send(null); 
}

function add(idDisc){
    var emailID = document.getElementById("returnedEmail").innerText;
    
    var req = new XMLHttpRequest();
    req.responseType = "json";
    req.open("GET", '/disciplinas/insert/' + emailID +'/'+ idDisc, true);
    req.onload = function () {
        alert("show de bola");
    };
    req.send(null); 
}