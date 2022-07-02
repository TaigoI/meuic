
function search() {
    var input = document.getElementById("monitorEmailInput").value;
    var nameID = document.getElementById("nomeUser");
    var emailID = document.getElementById("emailUser");
    var feedbackDiv = document.getElementById("feedbackPartialDiv");
    var feedback = document.getElementById("feedbackPartial");


    var req = new XMLHttpRequest();
    req.responseType = "json";
    req.open("GET", '/disciplinas/find/' + input, true);
    
    req.onload = function () {
		var monitores = req.response;
		console.log(monitores);
        
        if(monitores[0] == 'ME' ||  monitores[0] == 'NE'){
            window.parent.dynamicRenderRemoveButton();
            nameID.innerHTML = "";
            emailID.innerHTML = "";
            feedbackDiv.style.display = 'contents'; 

			if (monitores[0] == 'ME') {
				feedback.innerHTML = "Esse aluno já é monitor de outra disciplina (" + monitores[1].id_disciplina +"). Remova-o desta primeiro.";        
            } else {
                feedback.innerHTML = "Não existe um aluno com este email.";       
            } 
        } else {              
            window.parent.dynamicRenderAddButton();
            nameID.innerHTML = "<h7 id='returnedName'>" + monitores.name + "</h7>";
            emailID.innerHTML = "<p id='returnedEmail'>" + monitores.email + "</p>"; 
        }
    };

    req.send(null); 
}

function add(idDisc){
    var emailID = document.getElementById("returnedEmail").innerText;
    
    var req = new XMLHttpRequest();
    req.responseType = "json";
    req.open("GET", '/disciplinas/insert/' + emailID +'/'+ idDisc, true);
    req.onload = function () {
        window.location.href = "/disciplinas";
    };
    req.send(null); 
}