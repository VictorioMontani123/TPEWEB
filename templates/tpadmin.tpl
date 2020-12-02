{include "headeradmin.tpl"}


<table class="table table-bordered table-dark">
    <thead>
        <tr>
            <th scope="col">{$titulo}</th>
            <th scope="col">{$nombre}</th>
            <th scope="col">{$color}</th>
            <th scope="col"> {$precio}</th>
            <th scope="col"> {$especificacion}</th>
            <th scope="col"> {$TituloCategoria} </th>
            <th scope="col"> {$TituloCategoria} </th>

        </tr>
    </thead>
    {foreach from=$productos item=producto}
    
        <tbody>
            <tr>
                <form action="edit" method="POST">
                    <th scope="row"><a href="ver/{$producto->id}"> VER</a> </th>
                    <td> <input type="text" name="EditNombre" value="{$producto->nombre}" id=""> </td>
                    <td> <input type="text" name="EditColor" id="" value="{$producto->color}"> </td>
                    <td> <input type="number" name="EditPrecio" id="" value="{$producto->precio}"> </td>
                    <td> <input type="text" name="EditEspecificacion" id="" value="{$producto->especificacion}"> </td>
    
    
                    {foreach from=$descriptos item=categoria}
                        {if $categoria->id eq $producto->id_categoria}
                            <!-- este no se tiene que poder editar   !!!-->
                            <td> {$categoria->nombre_categoria}</td>
                        {/if}
                    {/foreach}
    
    
    
    
    
                    <td> <select name="InsertCategoria" id="">
    
                            {foreach from=$descriptos item=descripto}
                                <option value="{$descripto->id}"> {$descripto->nombre_categoria} </option>
                            {/foreach}
                        </select> </td>
    
    
                    <td> <input type="number" name="EditId" value="{$producto->id}" style="display:none"> </td>
                    <!-- Como mostsramos el nombre de la categoria??? -->
    
                    <td> <button type="submit" class="formatoboton" id="boton"> EDITAR </button> </td>
                </form>
                <td> <button> <a href="delete/{$producto->id}"> BORRAR</a> </button> </td>
            </tr>
        </tbody>
    
    
    
    
    {/foreach}


</table>
<button type="button" class="btn btn-primary btn-lg btn-block badge-dark"><a href="insertar"> INSERTAR PRODUCTO</a></button>
<button type="button" class="btn btn-secondary btn-lg btn-block badge-dark"><a href="catinsert"> INSERTAR CATEGORIA </a></button>
<button type="button" class="btn btn-secondary btn-lg btn-block badge-dark"><a href="borrarcat"> BORRAR CATEGORIA </a></button>
<button type="button" class="btn btn-secondary btn-lg btn-block badge-dark"><a href="editarcat"> EDITAR CATEGORIA </a></button>
<button type="button" class="btn btn-secondary btn-lg btn-block badge-dark"><a href="TablaUsuarios"> TABLA DE USUARIOS </a></button>