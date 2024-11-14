import app from '../../api.js';
import utilidades from "../../utilidades.js";
const { asignar_valores_select } = utilidades();
const d = document,
    $empleado = d.querySelector("#empleado"),
    $embalador_asignado = d.querySelector("#embalador_asignado"),
    $embalador_seleccionado = d.querySelector("#embalador_seleccionado"),
    $loader = d.querySelector("#loader"),
    $fragment = d.createDocumentFragment();

let embaladorAsignado;
let embaladorSeleccionado = undefined;
let pp = undefined;
let em = undefined;
let is_loader = false;


const extraer_embalador_asignado = async () => {
    try {
        const data = await app('http://localhost/vitalclinic3/controllers/almacen/rechequeo/rechequear.php?extraer_embalador_asignado=1');
        embaladorAsignado = data[0];
        console.log(embaladorAsignado)
    } catch (error) {
        console.log(error)
    }
};

const mostrar_empleados = (data_empleados) => {
    //Mostramos los datos de los empleados

    const format_data = data_empleados.map(e => {
        const data = {
            id: e.id,
            nombre: `${e.nombre} ${e.apellido} - ${e.cedula}`
        }

        return { ...data }
    })

    asignar_valores_select(
        {
            data: format_data,
            titulo: "Seleccionar Empleado",
            input: $empleado,
            nombre_opciones: {
                id: "id",
                nombre: "nombre"
            }
        }
    );
}

const extraer_data_empleados = async () => {
    try {
        const data_empleados = await app('http://localhost/vitalclinic3/controllers/users/empleados.php?extraer_empleados=1');
        mostrar_empleados(data_empleados)
    } catch (error) {
        console.log(error)
    }
};

const rechequear_pedido = async (form_data) => {
    is_loader = true;
    if (is_loader) $loader.classList.remove("hidden");
    try {
        const res = await app('http://localhost/vitalclinic3/controllers/almacen/rechequeo/rechequear.php?rechequear=1', 'POST', form_data);
        if (res.data.length > 0) {
            is_loader = true;
            if (is_loader) $loader.classList.add("hidden");
            alert('Registro exitoso');
            d.querySelector("#form_parts").innerHTML = "";
            d.querySelector('#container_parts').classList.add('hidden');
            $embalador_seleccionado.value = '';
            $empleado.selectedIndex = 0;
            d.querySelector('#cod_pedido').value = ''
            embaladorSeleccionado = undefined;
            embaladorAsignado = undefined;
        } else {
            is_loader = false;
            $loader.classList.add("hidden");
            alert(`${res.error}`)
        }
    } catch (error) {
        is_loader = false;
        $loader.classList.add("hidden");
        console.log(error)
    }
}

const extraer_partes_pedidos = async (form_data) => {
    is_loader = true;
    if (is_loader) $loader.classList.remove("hidden");

    try {
        const data_partes_pedido = await app('http://localhost/vitalclinic3/controllers/almacen/rechequeo/rechequear.php?extraer_partes_pedido=1', 'POST', form_data);
        is_loader = false;
        $loader.classList.add("hidden");
        return data_partes_pedido;
    } catch (error) {
        is_loader = false;
        $loader.classList.add("hidden");
        console.log(error)
    }
}

const get_info = async () => {
    is_loader = true;

    if (is_loader) $loader.classList.remove("hidden");

    const promises = await Promise.allSettled([extraer_data_empleados(), extraer_embalador_asignado()]);
    let consulta_rejected = false;
    for (let i = 0; i < promises.length; i++) {
        if (promises[i].status != 'fulfilled') {
            consulta_rejected = true;
            alert('Ha ocurrido un error, por favor recargue la pagina');
            break;
        }
    }

    if (consulta_rejected) {
        is_loader = false;
        $loader.classList.add("hidden");
        return
    };

    is_loader = false;

    if (!is_loader) $loader.classList.add("hidden");

    // console.log(is_loader)
}

// const automaticClick = () =>{
//     const checkbox = document.getElementById('checkbox').checked()

//     console.log(checkbox);

//     if(checkbox == true){
        
//         document.getElementById('checkbox').onchange(document.getElementById('enviar').click());
//     }
    
// }
const mostrar_partes_pedidos = (data_parts) => {
    d.querySelector('#container_parts').classList.remove('hidden');

    //Enlazamos el template creado en el HTML
    const $template_item_form = d.querySelector('#template-item_form').content;

    if (data_parts.length > 0) {

        let isOneElement = false;
        let counter = 0;

        data_parts.forEach((element, i) => {
          
            

            if (element.id_rechequeador === null) {
                //Insertamos los datos en el template
                counter = counter + 1 ;
                
                $template_item_form.querySelector('.part').textContent = `Parte ${i + 1}`;
                $template_item_form.querySelector('.name').textContent = `${element.nombre} ${element.apellido}`;
                $template_item_form.querySelector('.check').value = `${element.id}`;
                $template_item_form.querySelector('.check').dataset.id = `${element.id}`;
                

                // if(i === 0){
                  
                //     $template_item_form.querySelector('.check').click();


                  
                //     isOneElement = true
                // }
                   
                
                
                //guardamos una copia de la estrutura actual del template en la variable $node
                let $clone = $template_item_form.cloneNode(true);
                // console.log($clone('#document-fragment'));
                
                //Guardamos el nodo en el fragment
                $fragment.append($clone);

                // if(i === 0 && isOneElement ){
                //     console.log(i,isOneElement);
                    
                //     automaticClick();
                // }

                
            }
            
            
        });
        
        
        //       // //Limpiamos la lista
        d.querySelector("#form_parts").innerHTML = "";
        //       //Insertamos el fragment en la lista
        d.querySelector("#form_parts").append($fragment);
        //       console.log(data_parts.length);
        if (counter == 1) {
            alert("buajajaj");
            document.querySelector('.check').checked;
            document.querySelector('.check').dataset.checked = true;
        }
              
              
        //     if (data_parts.length == 1) {
            
         
        
        
    //     // $template_item_form.querySelector('check').value = true;
        
    //     //guardamos una copia de la estrutura actual del template en la variable $node
    //     let $clone = $template_item_form.cloneNode(true);
    //     //Guardamos el nodo en el fragment
    //     $fragment.append($clone);
    // }


}

}

const getDataForm = async (e) => {
    const embalador = embaladorSeleccionado;
    const numero_pedido = e.target.cod_pedido.value;

    if (embalador === undefined) {
        alert('Por favor seleccionar un embalador');
        return;
    }

    if (numero_pedido === "") {
        alert('Por favor ingresar el numero de pedido');
        return;
    }

    const formData = new FormData();
    formData.append('num_pedido', numero_pedido);

    const partes_pedido = await extraer_partes_pedidos(formData);
   
 
    
    if (partes_pedido.length === 0) {
        alert('Pedido no registrado')
        return;
    }

    try {

        Object.entries(partes_pedido)
            .forEach(((key, value) => {
                // console.log(key,value);

            }))


        // partes_pedido.forEach((parte) => 
        //     console.log(parte)

        // );





    } catch (error) {
        console.log(error);

    }

    // console.log(partes_pedido)
    mostrar_partes_pedidos(partes_pedido);
 
    return { partes_pedido, embalador, numero_pedido };
}


$embalador_asignado.addEventListener('click', e => {
    if (embaladorAsignado === undefined) {
        alert('No tiene embalador asignado')
    } else {
        embaladorSeleccionado = embaladorAsignado;
        $embalador_seleccionado.value = `${embaladorSeleccionado.nombre} ${embaladorSeleccionado.apellido}`;
        $empleado.selectedIndex = 0;
    }
})

$empleado.addEventListener('change', e => {
    if ($empleado.value !== "") {
        const object = {
            id_embalador: $empleado.value,
            nombre: $empleado.options[$empleado.selectedIndex].text
        }
        embaladorSeleccionado = object;
        $embalador_seleccionado.value = embaladorSeleccionado.nombre;
    }
})

d.addEventListener('DOMContentLoaded', async e => {
    await get_info();
})

d.addEventListener('submit', async e => {
    e.preventDefault()

    if (e.target.classList.contains('registrar_pedido')) {
        const { partes_pedido, embalador } = await getDataForm(e);

        em = embalador.id_embalador;

        if (partes_pedido.length === 1) {
            const id_pedido_d_r_e = d.querySelector('.check').dataset.id;
            console.log(id_pedido_d_r_e);
            
            const form_data = new FormData();
            form_data.append('embalador', embalador.id_embalador);
            form_data.append('id_pedido_d_r_e[]', id_pedido_d_r_e);
            rechequear_pedido(form_data);
            return;
        }else{
            let counter = 0 ;
            partes_pedido.forEach(partes => {
                if (partes.id_rechequeador == null) {
                    counter= counter+1;
                }

            }

            );
            
            if (counter == 1) {
                
                const id_pedido_d_r_e = d.querySelector('.check').dataset.id;
                console.log(id_pedido_d_r_e);
                
                const form_data = new FormData();
                form_data.append('embalador', embalador.id_embalador);
                form_data.append('id_pedido_d_r_e[]', id_pedido_d_r_e);
                mostrar_partes_pedidos(partes_pedido);
                rechequear_pedido(form_data);
            }
            
            
            
        }
        
    }

    if (e.target.classList.contains('registrar_partes_pedido')) {


        if (em === undefined) {
            return;
        }

        

        
        const id_pedido_d_r_e = Array.from(d.querySelectorAll('.check'));
        const valueCheckbox = id_pedido_d_r_e.filter(e => e.checked).map(e => e.dataset.id)
        const form_data = new FormData();
        form_data.append('embalador', em);
        valueCheckbox.forEach(e => {
            form_data.append('id_pedido_d_r_e[]', e);
        })
        rechequear_pedido(form_data);
    }
})

