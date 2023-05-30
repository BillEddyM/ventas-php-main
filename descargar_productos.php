<?php
// Añade el botón de descarga de PDF
echo '<div class="container mt-3"><a class="btn btn-success btn-lg" href="descargar_productos.php">Descargar PDF</a></div>';

// Crea un nuevo archivo PHP, descargar_productos.php
// Este archivo generará y enviará el archivo PDF al navegador
// Cuando se visite la página, se descargará automáticamente el archivo PDF
// Asegúrate de colocar este archivo en la misma carpeta que el script principal

include_once "encabezado.php";
include_once "navbar.php";
include_once "funciones.php";
session_start();

if(empty($_SESSION['usuario'])) header("location: login.php");
$nombreProducto = (isset($_POST['nombreProducto'])) ? $_POST['nombreProducto'] : null;

$productos = obtenerProductos($nombreProducto);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establecer información de documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Su Nombre');
$pdf->SetTitle('Lista de Productos');
$pdf->SetSubject('Lista de Productos');

// Añadir una página
$pdf->AddPage();

// Crear el contenido HTML
$html = '
<table border="1">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Precio compra</th>
            <th>Precio venta</th>
            <th>Ganancia</th>
            <th>Existencia</th>
        </tr>
    </thead>
    <tbody>';
foreach ($productos as $producto) {
    $html .= '
        <tr>
            <td>' . $producto->codigo . '</td>
            <td>' . $producto->nombre . '</td>
            <td>' . $producto->compra . '</td>
            <td>' . $producto->venta . '</td>
            <td>' . ($producto->venta - $producto->compra) . '</td>
            <td>' . $producto->existencia . '</td>
        </tr>';
}
$html .= '
    </tbody>
</table>';

// Escribir el HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Generar el PDF y enviarlo al navegador
$pdf->Output('Lista_de_Productos.pdf', 'I');
?>
