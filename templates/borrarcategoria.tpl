<form action="borrarcategoria" method="POST">
<select name="borrarcat" id="borrarcat">

      {foreach from=$descriptos item=descripto}
        <option value="{$descripto->id}"> {$descripto->nombre_categoria} </option>
      {/foreach} 
      </select>
<button type="submit" class="formatoboton" id="boton" ><a href="borrarcategoria/{$descripto->id}">BORRAR </a></button>