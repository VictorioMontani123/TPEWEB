{include "headerusuario.tpl"}

<table class="table table-bordered table-dark">
    <thead>
        <tr>
            <th scope="col">{$titulo}</th>
            <th scope="col">{$nombre}</th>
            <th scope="col">{$color}</th>
            <th scope="col"> {$precio}</th>
            <th scope="col"> {$especificacion}</th>
            <th scope="col"> {$TituloCategoria}


                <form action="filtramos" method="POST">
                    <select name="opcion" id="filtrocategoria">
                        <option value="TODOS">TODOS</option>
                        {foreach from=$descriptos item=descripto}
                            <option value="{$descripto->nombre_categoria}"> {$descripto->nombre_categoria} </option>
                        {/foreach}
                    </select> <button type="submit" class="formatoboton" id="boton">Filtrar</button> </th>
            </form>




        </tr>
    </thead>
    {foreach from=$productos item=producto}
    
        <tbody>
            <tr>
    
                <th scope="row"><a href="ver/{$producto->id}"> VER</a> </th>
    
    
                <td> {$producto->nombre}</td>
                <td> {$producto->color}</td>
                <td> {$producto->precio} </td>
                <td> {$producto->especificacion} </td>
    
                {foreach from=$Categorias item=categoria}
                    {if $categoria->id eq $producto->id_categoria}
                        
                        <td> {$categoria->nombre_categoria}</td>
                    {/if}
                {/foreach}
    
            </tr>
        </tbody>
    
    
    
    {/foreach}







</table>