<?php 
    include "controllers/control_privilegios.php";
    $privilegio = "registrar_cuenta_sistema";
    $control_privilegios = new ControlPrivilegios();
    $acceso = $control_privilegios->verificar_privilegios($privilegio);

?> 

<div class="w-full h-screen">
    <?php
        include 'views/modules/header.php';
    ?>

    <div class="lg:w-[90%] mx-auto mt-12">
        
        <div class="w-[90%] flex justify-center items-center gap-x-8">
            <form action="" class="flex gap-x-4">
                <div class="flex gap-x-4">
                    <div><input type="datetime-local" name="" id="fechai"></div>
                    <div><input type="datetime-local" name="" id="fechaf"></div>
                </div>
                <div><select name="empleado" id="empleado" autocomplete="on"><option value="">Seleccione al empleado</option></select></div>
                
            </form>
        </div>

        <div class="lg:w-[70%] h-[500px] border-2 border-gray-300 rounded-md bg-gray-100 overflow-y-auto relative mt-8 mx-auto">
            <table class="w-full h-600 table-auto border-separate border border-slate-400 rounded-md">
                <thead class="sticky top-0 z-10">
                    <th class="border-2 border-black-500 text-white bg-gray-400 w-36">Empleado</th>
                    <th class="border-2 border-black-500 text-white bg-gray-400">C. Pedidos</th>
                    <th class="border-2 border-black-500 text-white bg-gray-400">C. Unidades</th>
                    <th class="border-2 border-black-500 text-white bg-gray-400 w-32">C. Fallas</th>
                </thead>
                <tbody id="body_table"></tbody>
            </table>
        </div>
    </div>
    <div id="loader" class="w-full h-screen bg-transparent fixed top-0 hidden">
        <div class="w-full h-screen flex flex-col justify-center items-center border-2 border-blue-500">
                <span class="loader"></span>
        </div>        
    </div>
</div>

<template id="template_body_table_pedidos">
    <tr class="tr hover:bg-gray-200">
        <td class="empleado border-2 border-black-500 text-black text-center"></td>
        <td class="c_pedidos border-2 border-black-500 text-black text-center w-24"></td>
        <td class="unidades border-2 border-black-500 text-black text-center w-24"></td>
        <td class="c_fallas border-2 border-black-500 text-black text-center"></td>
    </tr>
</template>

<script src="http://localhost/vitalclinic3/views/assets/js/api.js" type="module"></script>
<script src="http://localhost/vitalclinic3/views/assets/js/almacen/estadisticas/pedidos_por_despachador.js" type="module"></script>