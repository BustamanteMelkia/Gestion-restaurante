const url = "inc/modelos/server.php";

eventListeners();

function eventListeners(){
    if(window.location.pathname.split('/')[2]==='form.php'){
        var formulario = document.querySelector('#formulario');
        formulario.addEventListener('submit',validarFormulario);
    }else if(window.location.pathname.split('/')[2]==='opciones.php'){
        const tableBody = document.getElementById('table-body');
        tableBody.addEventListener('click', onClickEliminar);
    }else if(window.location.pathname.split('/')[2]==='platillo.php'){
        const pedido = document.getElementById('pedido');
        pedido.addEventListener('click', onClickPedido);
    }
}
function onClickPedido(){
    const stock = document.querySelector('.platillo-detalles_stock span');
    if(stock.textContent>0){
        const cancelar = document.getElementById('cancelar');
        const pagar = document.getElementById('pagar');
        const cantidad = document.getElementById('cantidad');
        cantidad.value = '';
    
        document.querySelector('.pedido-contenedor').style.display= 'flex';
        cantidad.addEventListener('input', validarCantidad);
        cancelar.addEventListener('click', onClickCancelar);
        pagar.addEventListener('click', onClickPagar);
    }else
        mostrarNotificacion('Platillo no disponible','error')

}

function onClickCancelar(){
    document.querySelector('.pedido-contenedor').style.display='none';
}

async function onClickPagar(){
    const data = new FormData();
    const fecha = new Date().getFullYear()+'-'+(new Date().getMonth()+1)+'-'+new Date().getDate();
    const precio = document.getElementById('precio').value; 
    const stock = document.querySelector('.platillo-detalles_stock span');
    const numPlatillos = document.getElementById('cantidad').value;
    if(numPlatillos <= stock.textContent){
        data.append('id_platillo',this.getAttribute('data-id'));
        data.append('total', precio*numPlatillos);
        data.append('numPlatillos',numPlatillos);
        data.append('pedido','true');
        data.append('fecha',fecha);
        try {
            const response = await enviarDatos(data, url);
            mostrarNotificacion(response.mensaje, 'success');
            actualizarStock(numPlatillos)
        } catch (error) {
            mostrarNotificacion(response.mensaje, 'error');
        }
    }else
        mostrarNotificacion('No es posible entregar todos los platillos','error');
    document.querySelector('.pedido-contenedor').style.display='none';
}
// Funcion que decrementa el número de platillos disponibles.
function actualizarStock(numPlatillos){
    const stock = document.querySelector('.platillo-detalles_stock span');
    stock.innerHTML = stock.textContent - numPlatillos;
    if(stock < 1)
        document.getElementById('pedido').style.visibility="hidden";
}

function validarCantidad(){
    const importe = document.querySelector('.importe span');
    const precio = document.getElementById('precio').value; 
    if(this.value == ""){
        importe.innerHTML = `$0.0`
        mostrarNotificacion('Campo vacio', 'error');
    }else{
        importe.innerHTML = `$${this.value * precio}`
    }
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
            console.log(response);
            mostrarNotificacion(response.mensaje, 'success');
            formulario.reset();
            if(response.accion === 'editar')
                setTimeout(()=>{
                    window.location.href = 'index.php';
                },2000);

        } catch (error) {
            mostrarNotificacion(error.mensaje, 'error');
        }        
    }
}
function mostrarNotificacion(mensaje, clase){
    const div = document.createElement('div');
    div.textContent = mensaje;
    div.classList.add('notificacion','shadow',clase);
    const navbar = document.querySelector('.nav-bar');
    navbar.insertBefore(div, document.querySelector('.nav-bar a'));
    // formulario.insertBefore(div, document.querySelector('h2'));
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
                console.log(xhr.responseText);
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

// La eliminación de un platillo se realiza mediante la delegación de eventos
async function onClickEliminar(e){
    // Click sobre el icono
    if(e.target.classList.contains('icon-delete')){
        const id=e.target.parentNode.getAttribute('data-id');
        const confirmacion = confirm('¿Estás seguro de eliminar el platillo?');
        if(confirmacion){
            try {
                const response = await eliminarPlatillo(url, id);
                e.target.parentNode.parentNode.parentNode.remove();
                mostrarNotificacion(response.mensaje,'success');   
            } catch (error) {
                mostrarNotificacion(error.mensaje,'error');   
            }
        }
    }
}
function eliminarPlatillo(url, id){
    return new Promise((resolve, reject)=>{
        const xhr = new XMLHttpRequest();
        url= url+'?id='+id+'&accion=eliminar';
        xhr.open('GET',url);
        xhr.onload = function(){
            if(this.status === 200){
                const respuesta = JSON.parse(xhr.responseText);
                if(respuesta.respuesta ==='correcto'){
                    resolve(respuesta);
                }else{
                    reject(respuesta)
                }
            }
        }
        xhr.send();
    })
}