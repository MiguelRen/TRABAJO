<?php 
    include "controllers/control_privilegios.php";
    $privilegio = "estadisticas";
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
                <div><input type="submit" value="Buscar" class="border-2 border-gray-400 bg-gray-200 px-4 py-2 rounded-md cursor-pointer"></div> 
            </form>
        </div>

        <div class="lg:w-[70%] h-[300px] border-2 border-gray-300 rounded-md bg-gray-100 overflow-y-auto relative mt-8 mx-auto">
            <table class="w-full h-600 table-auto border-separate border border-slate-400 rounded-md">
                <thead class="sticky top-0 z-10">
                    <th class="border-2 border-black-500 text-white bg-gray-400 w-36">Empleado</th>
                    <th class="border-2 border-black-500 text-white bg-gray-400">T. Pedidos</th>
                    <th class="border-2 border-black-500 text-white bg-gray-400">T. Unidades</th>
                    <th class="border-2 border-black-500 text-white bg-gray-400 w-32">Porc. Pedidos</th>
                    <th class="border-2 border-black-500 text-white bg-gray-400 w-32">Porc. Unidades</th>
                </thead>
                <tbody id="body_table"></tbody>
            </table>
        </div>

        <div class="lg:w-[70%] border-2 border-gray-300 rounded-md bg-gray-100 flex justify-center gap-x-4 h-12 mt-4 mx-auto">
            <div class="font-medium text-center border-r-2 border-gray-400 px-4">Cantidad total de pedidos: <p id="total_pedidos">0</p></div>
            <div class="font-medium text-center px-4">Cantidad total de unidades: <p id="total_unidades">0</p></div>
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
        <td class="porc_p border-2 border-black-500 text-black text-center"></td>
        <td class="porc_u border-2 border-black-500 text-black text-center"></td>
    </tr>
</template>

<script src="http://localhost/vitalclinic3/views/assets/js/api.js" type="module"></script>
<script src="http://localhost/vitalclinic3/views/assets/js/almacen/estadisticas/mejor_despachador.js" type="module"></script>