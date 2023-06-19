/*var aktualnosci = document.getElementById('sinol');
var cennik = document.getElementById('cennik');
var galeria = document.getElementById('carousel-wrapper');
var terminarz = document.getElementById('terminarz');
var kontakt = document.getElementById('kontakt');

aktualnosci.style.visibility = 'visible';
cennik.style.visibility = 'hidden';
galeria.style.visibility = 'hidden';
terminarz.style.visibility = 'hidden';
kontakt.style.visibility = 'hidden';

var activeSubPage = 1;

function change(a){
    switch (a){
        case 1:
            aktualnosci.style.visibility = 'visible';
            cennik.style.visibility = 'hidden';
            galeria.style.visibility = 'hidden';
            terminarz.style.visibility = 'hidden';
            kontakt.style.visibility = 'hidden';
            activeSubPage = 1;
            break
        case 2:
            aktualnosci.style.visibility = 'hidden';
            cennik.style.visibility = 'visible';
            galeria.style.visibility = 'hidden';
            terminarz.style.visibility = 'hidden';
            kontakt.style.visibility = 'hidden';
            activeSubPage = 2;
            break
        case 3:
            aktualnosci.style.visibility = 'hidden';
            cennik.style.visibility = 'hidden';
            galeria.style.visibility = 'visible';
            terminarz.style.visibility = 'hidden';
            kontakt.style.visibility = 'hidden';
            activeSubPage = 3;
            break
        case 4:
            aktualnosci.style.visibility = 'hidden';
            cennik.style.visibility = 'hidden';
            galeria.style.visibility = 'hidden';
            terminarz.style.visibility = 'visible';
            kontakt.style.visibility = 'hidden';
            activeSubPage = 4;
            break
        case 5:
            aktualnosci.style.visibility = 'hidden';
            cennik.style.visibility = 'hidden';
            galeria.style.visibility = 'hidden';
            terminarz.style.visibility = 'hidden';
            kontakt.style.visibility = 'visible';
            activeSubPage = 5;
            break
    }
}

var inputValue;

function replaceNode(a){
    let element = document.getElementById(a);
    if(element.innerHTML == ""){
        let input = document.createElement("input");
        input.type = "text";
        input.id = element.id;
        switch(activeSubPage){
            case 2:
                input.id += "priceList";
                break
            case 4:
                input.id += "schedue";
                break
        }
        input.name = element.id;
        input.style.width = "99%"
        input.style.height = "99%"
        element.appendChild(input);
        input.focus();
        document.getElementById(input.id).addEventListener('blur', (event) => {
            unfocus(a);
          }, true);
    }
    else if(element.firstChild.nodeType === 3){
        inputValue = element.firstChild.nodeValue;
        let input = document.createElement("input");
        input.type = "text";
        input.id = element.id;
        switch(activeSubPage){
            case 2:
                input.id += "priceList";
                break
            case 4:
                input.id += "schedue";
                break
        }
        input.value = inputValue;
        input.name = element.id;
        input.style.width = "99%"
        input.style.height = "99%"
        element.replaceChild(input, element.firstChild);
        input.focus();
        document.getElementById(input.id).addEventListener('blur', (event) => {
            unfocus(a);
          }, true);
    }
}

var i = 1;
function unfocus(a){
    let element = document.getElementById(a);
    let nodeValue = element.firstChild.value;
    console.log(a);
    if(nodeValue === undefined){
        element.innerHTML = "";
    }
    else{
        let node = document.createTextNode(nodeValue);
        element.replaceChild(node, element.firstChild);
        document.getElementById(a + "Input").value = nodeValue;
    }
    
}
