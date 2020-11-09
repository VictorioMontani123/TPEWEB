<form action="modificarcategoria" method="POST">
<label for="Nombre"> Nombre: </label> <input type="text" class="formato" name="editarnombre" id="editarnombre" value="">
<select name="id" id="borrarcat">

      {foreach from=$descriptos item=descripto}
        <option value="{$descripto->id}"> {$descripto->nombre_categoria} </option>
      {/foreach} 
      </select>
<button type="submit" class="formatoboton" id="boton" name="" >Modificar</button>