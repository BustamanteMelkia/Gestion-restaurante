const url = "inc/modelos/server.php";
const formulario = document.querySelector('#formulario');

eventListeners();

function eventListeners(){
    formulario.addEventListener('submit',validarFormulario);
}

async function validarFormulario(e){
    e.preventDefault();
    const data = new FormData(e.currentTarget);    
    const regExpresion = "/^[0-9]*(\.?)[0-9]+$/";
    if( data.get('nombre') === "" ||
        data.get('tipo') === "" ||
        data.get('descripcion') ==="" || 
        data.get('precio') ==="" ||
        data.get('stock') ==="" ||
        data.get('imagen').name === undefined){
        mostrarNotificacion('Todos los campos deben contener datos', 'error');
    }else{
        try {
            const response = await enviarDatos(data, url);
            mostrarNotificacion(response.mensaje, 'success');
        } catch (error) {
            mostrarNotificacion(error.mensaje, 'error');
        }        
    }
}
function mostrarNotificacion(mensaje, clase){
    const div = document.createElement('div');
    div.textContent = mensaje;
    div.classList.add('notificacion','shadow',clase);
    formulario.insertBefore(div, document.querySelector('h2'));
    setTimeout(()=>{
        div.remove();
    }, 4000);
}

function showMessage(message, element){
    const divTag = document.createElement('div');
    divTag.textContent = message;
    divTag.classList.add('mensaje','error');
    element.appendChild(divTag);
}

function enviarDatos(data, url){
    return new Promise((resolve,reject)=>{
        const xhr = new XMLHttpRequest();
        xhr.open('POST',url);
        xhr.onload = function(){
            if(this.status==200){
                const response = JSON.parse(xhr.responseText);
                if(response.respuesta==='correcto')
                    resolve(response);
                else
                    reject(response)
            }
        }
        xhr.send(data);
    })

}