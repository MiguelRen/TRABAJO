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
                <div><select name="ruta" id="ruta" autocomplete="on"><option value="">Seleccione la ruta</option></select></div>
                <div><input type="submit" value="Buscar" class="border-2 border-gray-200 bg-gray-200 px-4 rounded-md cursor-pointer"></div>
            </form>
        </div>

        <div class="md:[90%] lg:w-[70%] h-[350px] border-2 border-gray-300 rounded-md bg-gray-100 overflow-y-auto relative mt-8 mx-auto">
            <table class="w-full h-600 table-auto border-separate border border-slate-400 rounded-md">
                <thead class="sticky top-0 z-10">
                    <th class="border-2 border-black-500 text-white bg-gray-400 w-36">N° pedido</th>
                    <th class="border-2 border-black-500 text-white bg-gray-400">Ruta</th>
                    <th class="border-2 border-black-500 text-white bg-gray-400">C. unidades</th>
                    <th class="border-2 border-black-500 text-white bg-gray-400 w-32">Fecha</th>
                    <th class="border-2 border-black-500 text-white bg-gray-400 w-32">Distribuidor</th>
                    <th class="border-2 border-black-500 text-white bg-gray-400 w-24">Ver detalles</th>
                </thead>
                <tbody id="body_table"></tbody>
            </table>
        </div>
        <div class="flex justify-center border-2 border-gray-400 bg-gray-200 md:[90%] lg:w-[70%] mx-auto mt-4 py-2 rounded-md">
            <div class="w-[50%] text-center font-medium border-r-2 border-gray-400">Total Pedidos: <p class="block" id="total_pedidos">0</p></div>
            <div class="w-[50%] text-center font-medium">Total Unidades: <p id="total_unidades">0</p></div>
        </div>
    </div>
    <div id="loader" class="w-full h-screen bg-transparent fixed top-0 hidden">
        <div class="w-full h-screen flex flex-col justify-center items-center border-2 border-blue-500">
                <span class="loader"></span>
        </div>        
    </div>
</div>




<!-- Modal toggle -->
<!-- <button 
        data-modal-target="static-modal" 
        data-modal-toggle="static-modal" 
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
        type="button">
  Toggle modal
</button> -->




    <!-- Main modal -->
    <!-- <div 
        id="static-modal" 
        data-modal-backdrop="static" 
        tabindex="-1" 
        aria-hidden="true" 
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 lg:w-[90%]  max-h-full"> -->
            <!-- Modal content -->
            <!-- <div class="relative bg-white rounded-lg shadow dark:bg-gray-700"> -->
                <!-- Modal header -->
                <!-- <div class="flex flex-col items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 gap-y-4">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Detalles del Pedido
                    </h3>

                    <div class="min-h-96 flex flex-col w-full gap-y-4">
                        <div class="w-full bg-gray-100 h-fit mx-auto">
                            <table class="w-full table-auto border-separate border border-slate-400">
                                <thead>
                                    <tr>
                                        <th class="border-2 border-black-500 text-white bg-gray-400">N° Pedido</th>
                                        <th class="border-2 border-black-500 text-white bg-gray-400 w-24">Ruta</th>
                                        <th class="border-2 border-black-500 text-white bg-gray-400 w-24">C. Unidades</th>
                                        <th class="border-2 border-black-500 text-white bg-gray-400">Fecha de entrega</th>
                                        <th class="border-2 border-black-500 text-white bg-gray-400">Entregado por</th>
                                    </tr>
                                </thead>
                                <tbody id="body_table_pedidos"></tbody>
                            </table>
                        </div>

                        <div class="w-full bg-gray-100 h-fit mx-auto">
                            <table class="w-full table-auto border-separate border border-slate-400">
                                <thead>
                                    <tr>
                                        <th class="border-2 border-black-500 text-white bg-gray-400">N° Parte</th>
                                        <th class="border-2 border-black-500 text-white bg-gray-400">Despachador</th>
                                        <th class="border-2 border-black-500 text-white bg-gray-400">Rechequeador</th>
                                        <th class="border-2 border-black-500 text-white bg-gray-400">Embalador</th>
                                        <th class="border-2 border-black-500 text-white bg-gray-400">Fecha Rechequeado</th>
                                        <th class="border-2 border-black-500 text-white bg-gray-400">C. de Fallas</th>
                                    </tr>
                                </thead>
                                <tbody id="body_table_pedidos_d_r_e"></tbody>
                            </table>
                        </div>
                    </div> -->
                    <!-- <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                Modal body 
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                    </p>
                </div>
                Modal footer -->
                <!-- <div class="flex items-center p-4 md:p-5 rounded-b dark:border-gray-600"> -->
                    <!-- <button data-modal-hide="static-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button> -->
                    <!-- <button data-modal-hide="static-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cerrar</button> 
                </div>  -->
                
            </div>
        </div>
    </div>

<template id="template_body_table_pedidos">
    <tr class="tr hover:bg-gray-200">
        <td class="n_pedido border-2 border-black-500 text-black text-center"></td>
        <td class="ruta border-2 border-black-500 text-black text-center w-24"></td>
        <td class="unidades border-2 border-black-500 text-black text-center w-24"></td>
        <td class="fecha border-2 border-black-500 text-black text-center"></td>
        <td class="distribuidor border-2 border-black-500 text-black text-center"></td>
        <td class="action border-2 border-black-500 text-black text-center w-24">
            <button 
               
                class="block text-white bg-blue-700 hover:bg-blue-800 mx-auto focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                type="button">Ver info
            </button>
        </td>
    </tr>
</template>

<script src="http://localhost/vitalclinic3/views/assets/js/api.js" type="module"></script>
<script src="http://localhost/vitalclinic3/views/assets/js/almacen/estadisticas/pedidos_por_fecha.js" type="module"></script>