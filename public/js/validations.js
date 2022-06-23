
//funçãao para ocultar e desocultar botao de Adicionar no modal de Adicionar Monitor
function dynamicRenderAddButton(){
    var addButtonDiv = document.getElementById("ButtonDiv");

    addButtonDiv.style.display = 'contents';    
}


function dynamicRenderRemoveButton(){
    var removeButtonDiv = document.getElementById("ButtonDiv");
    
    removeButtonDiv.style.display = 'none';    
}
//Esse código possibilita que a tecla enter ative a pesquisa
function submitSearchUserForm(){               
    var input = document.getElementById("monitorEmailInput");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("searchMonitorButton").click();
        }
    });
        
}

function cleanSearchUserForm(){
    var input = document.getElementById("monitorEmailInput");
    var nameID = document.getElementById("nomeUser");
    var emailID = document.getElementById("emailUser");

    input.value = "";
    nameID.innerHTML = "";
    emailID.innerHTML = "";

    dynamicRenderRemoveButton();
}