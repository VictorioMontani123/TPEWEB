<form action="insert" method="POST">
<label for="Nombre"> Nombre: </label> <input type="text" class="formato" name="InsertNombre" id="InsertNombre" value="">
<label for="Color"> Color: </label> <input type="text" class="formato" name="InsertColor" id="InsertColor" value="">
<label for="especificaciones"> Especificaciones: </label> <textarea name="InsertEspecificaciones" id="InsertEspecificaciones" cols="30" rows="1"class="formato"></textarea>
<label for="Precio"> Precio: </label><input type="number" name="InsertPrecio" id="InsertPrecio" class="formato">
<label for="categoria"> Categoria: </label> 
<select name="InsertCategoria" id="">

      {foreach from=$descriptos item=descripto}
        <option value="{$descripto->id}"> {$descripto->nombre_categoria} </option>
      {/foreach} 
      </select>
<button type="submit" class="formatoboton" id="boton" >Enviar</button>