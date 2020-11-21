
eventListeners();

function eventListeners(){
    const formulario = document.querySelector('#formulario');
    formulario.addEventListener('submit',validarFormulario);
}

function validarFormulario(e){
    e.preventDefault();
    const nombre = document.querySelector('#nombre');
    if(nombre.value==""){
        nombre.style.border= '1px solid red'
        showMessage('Error: nombre vacio',nombre.parentNode);
    }else{
        if(nombre.parentNode.childNodes.length > 5)
            nombre.parentNode.childNodes[5].remove(); 
        nombre.style.border= '1px solid gray'    
    }
}

function showMessage(message, element){
    const divTag = document.createElement('div');
    divTag.textContent = message;
    divTag.classList.add('mensaje','error');
    element.appendChild(divTag);
}