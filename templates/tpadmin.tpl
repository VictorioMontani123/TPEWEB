{include "headeradmin.tpl"}


<table class="table table-bordered table-dark">
    <thead>
    <tr>
      <th scope="col">{$titulo}</th>
      <th scope="col">{$nombre}</th>
      <th scope="col">{$color}</th>
      <th scope="col"> {$precio}</th>
      <th scope="col"> {$especificacion}</th>
      <th scope="col" >  {$TituloCategoria}   
      </th>
    
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
     
      {foreach from=$Categorias item=categoria}
      
      {if $categoria->id eq $producto->id_categoria}  <!-- este no se tiene que poder editar   !!!-->
      <td> {$categoria->nombre_categoria}</td> 
      {/if}
      {/foreach}

      <td> <input type="numer" name="EditIdCategoria" id="" value="{$producto->id_categoria}"> </td>
         <!-- aca tenemos que agregar un input que nos muestre el id_categoria del producto para poder editarlo -->


       <td> <input type="number" name="EditId" value="{$producto->id}" style="display:none"> </td>
         <!-- Como mostsramos el nombre de la categoria??? -->
      <td>  <button> <a href="delete/{$producto->id}"> BORRAR</a> </button> </td>
      <td> <button type="submit" class="formatoboton" id="boton" >  EDITAR </button> </td>
      </form>
    </tr>
  </tbody>




  {/foreach}


</table>

{include "insert.tpl"}