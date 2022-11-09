var aktualnosci = document.getElementById('sinol');
var cennik = document.getElementById('cennik');
var galeria = document.getElementById('carousel-wrapper');
var terminarz = document.getElementById('terminarz');
var kontakt = document.getElementById('kontakt');

aktualnosci.style.visibility = 'hidden';
cennik.style.visibility = 'hidden';
galeria.style.visibility = 'hidden';
terminarz.style.visibility = 'hidden';
kontakt.style.visibility = 'hidden';

function change(a){
    switch (a){
        case 1:
            aktualnosci.style.visibility = 'visible';
            cennik.style.visibility = 'hidden';
            galeria.style.visibility = 'hidden';
            terminarz.style.visibility = 'hidden';
            kontakt.style.visibility = 'hidden';
            break
        case 2:
            aktualnosci.style.visibility = 'hidden';
            cennik.style.visibility = 'visible';
            galeria.style.visibility = 'hidden';
            terminarz.style.visibility = 'hidden';
            kontakt.style.visibility = 'hidden';
            break
        case 3:
            aktualnosci.style.visibility = 'hidden';
            cennik.style.visibility = 'hidden';
            galeria.style.visibility = 'visible';
            terminarz.style.visibility = 'hidden';
            kontakt.style.visibility = 'hidden';
            break
        case 4:
            aktualnosci.style.visibility = 'hidden';
            cennik.style.visibility = 'hidden';
            galeria.style.visibility = 'hidden';
            terminarz.style.visibility = 'visible';
            kontakt.style.visibility = 'hidden';
            break
        case 5:
            aktualnosci.style.visibility = 'hidden';
            cennik.style.visibility = 'hidden';
            galeria.style.visibility = 'hidden';
            terminarz.style.visibility = 'hidden';
            kontakt.style.visibility = 'visible';
            break
    }
}
function replaceNode(a){
    let element = document.getElementById(a);
    if(element.innerHTML == ""){
        let input = document.createElement("input");
        input.type = "text";
        input.id = element.id;
        input.name = element.id;
        input.style.width = "99%"
        input.style.height = "99%"
        element.appendChild(input);
        input.focus();
        document.getElementById(input.id).addEventListener('blur', (event) => {
            siema(a);
          }, true);
    }
    else if(element.firstChild.nodeType === 3){
        let inputValue = element.firstChild.nodeValue;
        let input = document.createElement("input");
        input.type = "text";
        input.id = element.id;
        input.value = inputValue;
        input.name = element.id;
        input.style.width = "99%"
        input.style.height = "99%"
        element.replaceChild(input, element.firstChild);
        input.focus();
        document.getElementById(input.id).addEventListener('blur', (event) => {
            siema(a);
          }, true);
    }
}

function siema(a){
    let element = document.getElementById(a);
    let nodeValue = element.firstChild.value;
    let node = document.createTextNode(nodeValue);
    element.replaceChild(node, element.firstChild);
}

