
    <div class="form-group">
        <label for="">Nombre de Usuario:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Ejem: Desarrolador_novato" <?php $validador->mostrar_nombre() ?>>
        <?php $validador->mostrtar_error_nombre();?>
    </div>
    <div class="form-group">
        <label for="">email:</label>
        <input type="email" class="form-control" name="email" placeholder="Ejem: novato@hotmail.com" <?php $validador->mostrar_email() ?>>
        <?php $validador->mostrtar_error_email();?>
    </div>
    <div class="form-group">
        <label for="">Contraseña: </label>
        <input type="password" class="form-control" name="password">
        <?php $validador->mostrtar_error_password();?>
    </div>
    <div class="form-group">
        <label for="">Repite la contraseña:</label>
        <input type="password" class="form-control" name="password2">
        <?php $validador->mostrtar_error_password2();?>
    </div>
    <br>
    <button type="reset" class="btn btn-default btn-primary">Limpiar</button>
    <br>
    <br>
    <button type="submit" class="btn btn-default btn-primary" name="enviar">Enviar</button>



