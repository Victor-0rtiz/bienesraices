<?php

?>
<fieldset>
    <legend>Información General</legend>
    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="titulo" placeholder="titulo propiedad" value="<?php echo s($propiedad->titulo);  ?>">

    <label for="precio">Precio</label>
    <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo s($propiedad->precio); ?>">

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">
    <?php if($propiedad->imagen) {   ?>
        <img src="/bienesraices_inicio/imagenes/<?php echo $propiedad->imagen?>" class="imagen-pequeña">
     <?php }?>
    <label for="descripcion">Descripción</label>
    <textarea name="descripcion" id="descripcion"><?php echo s($propiedad->descripcion);  ?></textarea>
</fieldset>

<fieldset>
    <legend>informacion propiedad</legend>

    <label for="habitaciones">habitaciones</label>
    <input type="number" id="habitaciones" name="habitaciones" placeholder="Ejem: 3" min="1" max="9" value="<?php echo s($propiedad->habitaciones);  ?>">

    <label for="baños">baños</label>
    <input type="number" id="baños" name="baños" placeholder="Ejem: 3" min="1" max="9" value="<?php echo s($propiedad->baños);  ?>">

    <label for="estacionamientos">estacionamientos</label>
    <input type="number" id="estacionamientos" name="estacionamientos" placeholder="Ejem: 3" min="1" max="9" value="<?php echo s($propiedad->estacionamientos);  ?>">
</fieldset>

<fieldset>
    <legend>vendedores</legend>

    <select name="vendedores_id">
        <option value=""> --seleccione--</option>
        <?php foreach($vendedores as $vendedor) { ?>
            <option <?php echo $propiedad->vendedores_id == $vendedor->id ? 'selected' : ''; ?> value="<?php echo s($vendedor->id); ?> "> <?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></option>

        <?php } ?>
    </select>
</fieldset>