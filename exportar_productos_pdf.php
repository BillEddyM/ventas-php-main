<?php
include_once "funciones.php";

require_once('C:\xampp\htdocs\ventas-php-main\tcpdf.php');

// Crear un nuevo documento PDF
// Crear un nuevo documento PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Comercial "Los Riscos" ');
$pdf->SetTitle('Inventario de productos');


// Establecer las márgenes del documento
$pdf->SetMargins(20, 20, 20);

// Agregar una página
$pdf->AddPage();

// Contenido del PDF
$html = '
<style>
    h1 {
        text-align: center;
        color: #303030;
        font-size: 13px;
        margin-bottom: 15px;
    }

    h2 {
      font-family: Arial, sans-serif;
      font-size: 14px;
      font-weight: bold;
      text-align: center;
      color: #b91a1a;
      text-transform: uppercase;
      margin-top: 50px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 10px;
        width: 100%;
    }

    th {
        background-color: #c70738;
        color: white;
        padding: 20px 5px;
        font-size: 10px;
    }

    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #f7f7f7;
    }
</style>

<h2>Comercial "Los Riscos"</h2>
<h1>Inventario de productos</h1>

<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Talla</th>
            <th>Precio compra</th>
            <th>Precio venta</th>
            <th>Ganancia</th>
            <th>Existencia</th>
        </tr>
    </thead>
    <tbody>';

$productos = obtenerProductos();

foreach($productos as $producto){
    $html .= '<tr>
                <td>'. $producto->codigo .'</td>
                <td>'. $producto->nombre .'</td>
                <td>'. $producto->marca .'</td>
                <td>'. $producto->talla .'</td>
                <td>'. '$'.$producto->compra .'</td>
                <td>'. '$'.$producto->venta .'</td>
                <td>'. '$'. floatval($producto->venta - $producto->compra) .'</td>
                <td>'. $producto->existencia .'</td>
              </tr>';
}

$html .= '</tbody></table>';

// Escribir el HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Salida del PDF
$pdf->Output('Lista_de_Productos.pdf', 'I');