<fieldset>
    <legend>Información Del Vendedor </legend>
    <label for="nombre">Nombre del Vendedor </label>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre vendedor" value="<?php echo s($vendedor->nombre);  ?>">

    <label for="apellido">Apellido del Vendedor</label>
    <input type="text" id="apellido" name="apellido" placeholder="Apellido del vendedor " value="<?php echo s($vendedor->apellido); ?>">
    
    <label for="telefono">Telefono del Vendedor</label>    
    <input type="number" id="telefono" name="telefono" placeholder="Telefono del vendedor " value="<?php echo s($vendedor->telefono); ?>">

</fieldset>