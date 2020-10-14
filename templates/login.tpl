 {include "header.tpl"}
 
 <form  class="form-group" action="verificado" method="POST">
 
 
 
 <label for="exampleInputEmail1">{$nombre} </label>
 <input type="text" class="form-control" name="usuario" id="" placeholder="Ingresa usuario">
 {$contrasenia} <input type="password" class="form-control" name="contrasenia" id="" placeholder="Ingresa contraseña">
 <button type="submit" class="formatoboton btn btn-primary" id="boton" >Enviar</button>


 </form>