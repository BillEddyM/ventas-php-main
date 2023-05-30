<?php
include_once "encabezado.php";
include_once "navbar.php";
session_start();

if(empty($_SESSION['usuario'])) header("location: login.php");

?>
<div class="container">
    <h3>Agregar usuario</h3>
    <form method="post">
        <div class="mb-3">
            <label for="usuario" class="form-label">Nombre de usuario</label>
            <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Escribe el nombre de usuario. Ej. Paco">
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo</label>
            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Escribe el nombre completo del usuario">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Ej. 2111568974">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Ej. Av Collar 1005 Col Las Cruces">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="********">
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirme la Contraseña</label>
            <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="********">
        </div>

        <div class="text-center mt-3">
            <input type="submit" name="registrar" value="Registrar" class="btn btn-primary btn-lg">
            
            </input>
            <a href="usuarios.php" class="btn btn-danger btn-lg">
                <i class="fa fa-times"></i> 
                Cancelar
            </a>
        </div>
    </form>
</div>
<?php
if(isset($_POST['registrar'])){
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if(empty($usuario)
    ||empty($nombre) 
    || empty($telefono) 
    || empty($direccion)
    || empty($confirm_password)
    || empty($password)){
        echo'
        <div class="alert alert-danger mt-3" role="alert">
            Debes completar todos los datos.
        </div>';
        return;
    } 
    include_once "funciones.php";
    $resultado = registrarUsuario($usuario, $nombre, $telefono, $direccion, $password);
    if($resultado){
        // Validar que las contraseñas coincidan
    if ($password === $confirm_password) {
        // Se manda a la funcion registrar Usuario

        echo'
        <div class="alert alert-success mt-3" role="alert">
            Usuario registrado con éxito.
        </div>';
    } else {
        // Mostrar un mensaje de error si las contraseñas no coinciden
        echo "Las contraseñas no coinciden";
    }
}
        
    }
?>