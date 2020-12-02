{include "header.tpl"}


<table class="table table-sm">
    <thead>
        <tr>
            <th scope="col">{$titulo}</th>
            <th scope="col">{$nombre}</th>
            <th scope="col">{$administrador}</th>
            
        </tr>
    </thead>
    <tbody>
        


    </tbody>
    {foreach from=$usuarios item=usuario}
    
        <tbody>
            <tr>
                <form action="editusuario" method="POST">
                    <td> </td>
                    <td>{$usuario->usuario} </td> 
                    <td>
                        {if $usuario->admin eq 1}
                            SI
                        {else}
                            NO
                        {/if}
                    </td>
                    <td> <input type="number" name="id" value="{$usuario->id}" style="display:none"> </td>
                    <td> <select name="admin" id=""> <option value="0"> NO </option> <option value="1"> SI </option> </td>
                    <td> <button> <a href="deleteusuario/{$usuario->id}"> BORRAR</a> </button> </td>
                    <td> <button type="submit" class="formatoboton" id="boton"> EDITAR </button> </td>
                </form>
            </tr>
        </tbody>
    {/foreach}

</table>