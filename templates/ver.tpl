{include "headeradmin.tpl"}
<table class="table table-bordered table-dark">
    <tbody>
        <tr>
            <td> {$productos->nombre}</td>
            <td> {$productos->color} </td>
            <td> {$productos->precio}</td>
            <td> {$productos->especificacion} </td>
        </tr>
    </tbody>
</table>
<li>
    
    <div id="contenedor">
        <table id="tabladecomentarios">
            <thead>
                <tr>
                    <th> comentario </th>
                    <th> puntaje </th>
                    <!--
                        <th> Borrar comentario </th>
                    -->

                </tr>


            </thead>

            <tbody id="tablita">





            </tbody>

        </table>





    </div>
</li>

<input type="hidden" name="idproductos" value="{$productos->id}">
<input type="hidden" name="usuario" value="{$usuario}">



{if (isset($usuario)) }
    <form id="formcomentar" class="form-group" action="" method="POST" >
        <input type="text" class="form-control" name="comentario" id="comentario" placeholder="Ingresa comentario">
        <select name="puntaje" class="form-control" id="puntaje">
            <option value="0"> 0 </option>
            <option value="1"> 1 </option>
            <option value="2"> 2 </option>
            <option value="3"> 3 </option>
            <option value="4"> 4 </option>
            <option value="5"> 5 </option>
        </select>
        <button type="submit">Agregar Comentario</button>
    </form>
{/if}
<!-- incluyo el js -->
<script src="../js/comentarios.js"></script>