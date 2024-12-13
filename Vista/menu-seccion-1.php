<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-menu.css">
    <link rel="stylesheet" href="css/style-menu-seccion-1.css">
    <link rel="shortcut icon" href="img/6.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <title>Menu Principal</title>
</head>

<body>
       <div class="sidebar">
        <ul> 
            <li class="menu-item" data-section="section1">
                <span class="icon">📝</span>
                <span class="tooltip">Sección 1</span>
                <span class="indicator" id="indicator-section1"></span>
            </li>
            <li class="menu-item" data-section="section2">
                <span class="icon">📋</span>
                <span class="tooltip">Sección 2</span>
                <span class="indicator" id="indicator-section2"></span>
            </li>
            <li class="menu-item" data-section="section3">
                <span class="icon">📄</span>
                <span class="tooltip">Sección 3</span>
                <span class="indicator" id="indicator-section3"></span>
            </li>
            <li class="menu-item" data-section="section4">
                <span class="icon">📑</span>
                <span class="tooltip">Sección 4</span>
                <span class="indicator" id="indicator-section4"></span>
            </li>
            <li class="menu-item" data-section="section5">
                <span class="icon">🗂️</span>
                <span class="tooltip">Sección 5</span>
                <span class="indicator" id="indicator-section5"></span>
            </li>
            <li class="menu-item" data-section="section6">
                <span class="icon">📁</span>
                <span class="tooltip">Sección 6</span>
                <span class="indicator" id="indicator-section6"></span>
            </li>
            <li class="menu-item" data-section="section7">
                <span class="icon">📁</span>
                <span class="tooltip">Sección 7</span>
                <span class="indicator" id="indicator-section7"></span>
            </li>
            <li class="menu-item" data-section="section8">
                <span class="icon">📊</span>
                <span class="tooltip">Sección 8</span>
                <span class="indicator" id="indicator-section8"></span>
            </li>
            <li class="menu-item" data-section="section9">
                <span class="icon">📈</span>
                <span class="tooltip">Sección 9</span>
                <span class="indicator" id="indicator-section9"></span>
            </li>
            <li class="menu-item" data-section="section10">
                <span class="icon">📉</span>
                <span class="tooltip">Sección 10</span>
                <span class="indicator" id="indicator-section10"></span>
            </li>
            <li class="menu-item" data-section="section11">
                <span class="icon">📆</span>
                <span class="tooltip">Sección 11</span>
                <span class="indicator" id="indicator-section11"></span>
            </li>
            <li class="menu-item" data-section="section12">
                <span class="icon">🗓️</span>
                <span class="tooltip">Sección 12</span>
                <span class="indicator" id="indicator-section12"></span>
            </li>
            <li class="menu-item" data-section="section13">
                <span class="icon">📅</span>
                <span class="tooltip">Sección 13</span>
                <span class="indicator" id="indicator-section13"></span>
            </li>
            <li class="menu-item" data-section="section14">
                <span class="icon">📇</span>
                <span class="tooltip">Sección 14</span>
                <span class="indicator" id="indicator-section14"></span>
            </li>
            <li class="menu-item" data-section="section15">
                <span class="icon">📋</span>
                <span class="tooltip">Sección 15</span>
                <span class="indicator" id="indicator-section15"></span>
            </li>
            <li class="menu-item" data-section="section16">
                <span class="icon">📜</span>
                <span class="tooltip">Sección 16</span>
                <span class="indicator" id="indicator-section16"></span>
            </li>
            <li class="menu-item" data-section="section17">
                <span class="icon">📃</span>
                <span class="tooltip">Sección 17</span>
                <span class="indicator" id="indicator-section17"></span>
            </li>
            <li class="menu-item" data-section="section18">
                <span class="icon">📄</span>
                <span class="tooltip">Sección 18</span>
                <span class="indicator" id="indicator-section18"></span>
            </li>
            <li class="menu-item" data-section="section19">
                <span class="icon">📑</span>
                <span class="tooltip">Sección 19</span>
                <span class="indicator" id="indicator-section19"></span>
            </li>
            <li class="menu-item" data-section="section20">
                <span class="icon">🗂️</span>
                <span class="tooltip">Sección 20</span>
                <span class="indicator" id="indicator-section20"></span>
            </li>
            <li class="menu-item" data-section="section21">
                <span class="icon">📁</span>
                <span class="tooltip">Sección 21</span>
                <span class="indicator" id="indicator-section21"></span>
            </li>   
            <li class="menu-item" data-section="section22">
                <span class="icon">📂</span>
                <span class="tooltip">Sección 22</span>
                <span class="indicator" id="indicator-section22"></span>
            </li>
            <li class="menu-item" data-section="section23">
                <span class="icon">📁</span>
                <span class="tooltip">Sección 23</span>
                <span class="indicator" id="indicator-section23"></span>
            </li>
            <li class="menu-item" data-section="section24">
                <span class="icon">📁</span>
                <span class="tooltip">Sección 24</span>
                <span class="indicator" id="indicator-section24"></span>
            </li>
            <li>
                <div class="social-media"><a href="inicio.html"><i class='bx bx-exit bx-rotate-180'></i></a></div>
            </li>
        </ul>
    </div>
    <div class="content">
        <div id="section1" class="section visible">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">DATOS DE LA EMPRESA</h1>
                    <div class="login-content">
                        <form id="formulario-empresa" action="../Controlador/controlador.php" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>SECTOR</h5>
                                        <input type="text" id="sector" name="sector" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CAM</h5>
                                        <input type="text" id="cam" name="cam" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>NOMBRE EMPRESA</h5>
                                        <input type="text" id="nombre_empresa" name="nombre_empresa" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>SCIAN</h5>
                                        <input type="text" id="scian" name="scian" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>UBICACION</h5>
                                        <input type="text" id="ubicacion" name="ubicacion" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CODIGO POSTAL</h5>
                                        <input type="text" id="codigo_postal" name="codigo_postal" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>MUNICIPIO</h5>
                                        <input type="text" id="municipio" name="municipio" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">

                                        <select id="entidad_federativa" name="entidad_federativa" class="input">
                                            <option value="">Entidad Federativa</option>
                                            <option value="Aguascalientes">Aguascalientes</option>
                                            <option value="Baja California">Baja California</option>
                                            <option value="Baja California Sur">Baja California Sur</option>
                                            <option value="Campeche">Campeche</option>
                                            <option value="Chiapas">Chiapas</option>
                                            <option value="Chihuahua">Chihuahua</option>
                                            <option value="Coahuila">Coahuila</option>
                                            <option value="Colima">Colima</option>
                                            <option value="Ciudad de México">Ciudad de México</option>
                                            <option value="Durango">Durango</option>
                                            <option value="Guanajuato">Guanajuato</option>
                                            <option value="Guerrero">Guerrero</option>
                                            <option value="Hidalgo">Hidalgo</option>
                                            <option value="Jalisco">Jalisco</option>
                                            <option value="Estado de México">Estado de México</option>
                                            <option value="Michoacán">Michoacán</option>
                                            <option value="Morelos">Morelos</option>
                                            <option value="Nayarit">Nayarit</option>
                                            <option value="Nuevo León">Nuevo León</option>
                                            <option value="Oaxaca">Oaxaca</option>
                                            <option value="Puebla">Puebla</option>
                                            <option value="Querétaro">Querétaro</option>
                                            <option value="Quintana Roo">Quintana Roo</option>
                                            <option value="San Luis Potosí">San Luis Potosí</option>
                                            <option value="Sinaloa">Sinaloa</option>
                                            <option value="Sonora">Sonora</option>
                                            <option value="Tabasco">Tabasco</option>
                                            <option value="Tamaulipas">Tamaulipas</option>
                                            <option value="Tlaxcala">Tlaxcala</option>
                                            <option value="Veracruz">Veracruz</option>
                                            <option value="Yucatán">Yucatán</option>
                                            <option value="Zacatecas">Zacatecas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>LATITUD</h5>
                                        <input type="text" id="latitud" name="latitud" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>LONGUITUD</h5>
                                        <input type="text" id="longitud" name="longitud" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TELEFONO</h5>
                                        <input type="text" id="telefono" name="telefono" required class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-empresa" class="btn">Guardar</button>
                                <button type="button" id="ver-informacion" class="btn">Ver Información</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="section2" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">DATOS DE LAS MATERIAS PRIMAS</h1>
                    <div class="login-content">
                        <form id="formulario-materias-primas" action="../Controlador/controlador-materias-primas.php"
                            method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>MATERIA PRIMA</h5>
                                        <input type="text" id="materia_prima" name="materia_prima" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CONSUMO</h5>
                                        <input type="number" id="consumo" name="consumo" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <select id="unidad" name="unidad" required class="input">
                                            <option value="">Selecciona Unidad</option>
                                            <option value="Kg">Kilogramos (Kg)</option>
                                            <option value="g">Gramos (g)</option>
                                            <option value="L">Litros (L)</option>
                                            <option value="ml">Mililitros (ml)</option>
                                            <option value="m">Metros (m)</option>
                                            <option value="cm">Centímetros (cm)</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-materia" class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>MATERIA PRIMA</th>
                                <th>CONSUMO</th>
                                <th>UNIDAD</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section3" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">DATOS DE LOS PRODUCTOS</h1>
                    <div class="login-content">
                        <form id="formulario-productos" action="../Controlador/controlador-productos.php" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>PRODUCTO</h5>
                                        <input type="text" id="producto" name="producto" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CANTIDAD</h5>
                                        <input type="number" id="cantidad" name="cantidad" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Tonelada</h5>
                                        <input id="unidad" name="unidad" value="TONELADA" readonly class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-producto" class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Unidad</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-productos-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section4" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">DATOS DE LOS COMBUSTIBLES</h1>
                    <div class="login-content">
                        <form id="formulario-combustibles" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Combustible</h5>
                                        <input type="text" id="combustible" name="combustible" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Consumo</h5>
                                        <input type="number" step="0.01" id="consumo" name="consumo" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>UNIDAD</h5>
                                        <input id="unidad" name="unidad" value="m^3" readonly class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-combustible" class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>Combustible</th>
                                <th>Consumo</th>
                                <th>Unidad</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-combustibles-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section5" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">DATOS DE INSUMO EMPRESARIAL</h1>
                    <div class="login-content">
                        <form id="formulario-insumo-empresarial" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>NEC</h5>
                                        <input type="number" id="nec" name="nec" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>NAP</h5>
                                        <input type="number" id="nap" name="nap" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>NCH</h5>
                                        <input type="number" id="nch" name="nch" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>NECONT</h5>
                                        <input type="number" id="necont" name="necont" required class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-insumo-empresarial" class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>NEC</th>
                                <th>NAP</th>
                                <th>NCH</th>
                                <th>NECONT</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-insumo-empresarial-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section6" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">COMPONENTES DE COMBUSTIBLES</h1>
                    <div class="login-content">
                        <form id="formulario-componentes-combustibles" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CO2</h5>
                                        <input type="number" step="0.01" id="co2_comb_sc" name="co2_comb_sc" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CH4</h5>
                                        <input type="number" step="0.01" id="ch4_comb_sc" name="ch4_comb_sc" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>N2O</h5>
                                        <input type="number" step="0.01" id="n2o_comb_sc" name="n2o_comb_sc" required
                                            class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-componente-combustible"
                                    class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-componentes-combustibles" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>CO2</th>
                                <th>CH4</th>
                                <th>N2O</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-componentes-combustibles-body"></tbody>
                    </table>
                </div>

            </div>
        </div>

        <div id="section7" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">COMPONENTES DE PARTÍCULAS DE PROCESOS</h1>
                    <div class="login-content">
                        <form id="formulario-componentes-particulas" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CO2 PROC SC</h5>
                                        <input type="number" step="0.01" id="co2_proc_sc" name="co2_proc_sc" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CH4 PROC SC</h5>
                                        <input type="number" step="0.01" id="ch4_proc_sc" name="ch4_proc_sc" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>N2O PROC SC</h5>
                                        <input type="number" step="0.01" id="n2o_proc_sc" name="n2o_proc_sc" required
                                            class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-componente-particulas"
                                    class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">

                            </div>
                        </form>
                    </div>
                    <table id="tabla-componentes-particulas" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>CO2 PROC SC</th>
                                <th>CH4 PROC SC</th>
                                <th>N2O PROC SC</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-componentes-particulas-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section8" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">SUMA DE PARTÍCULAS</h1>
                    <div class="login-content">
                        <form id="formulario-suma-particulas" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CO2 SUMA SC</h5>
                                        <input type="number" step="0.01" id="co2_suma_sc" name="co2_suma_sc" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CH4 SUMA SC</h5>
                                        <input type="number" step="0.01" id="ch4_suma_sc" name="ch4_suma_sc" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>N2O SUMA SC</h5>
                                        <input type="number" step="0.01" id="n2o_suma_sc" name="n2o_suma_sc" required
                                            class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-suma-particulas" class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-suma-particulas" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>CO2 SUMA SC</th>
                                <th>CH4 SUMA SC</th>
                                <th>N2O SUMA SC</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-suma-particulas-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section9" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">DATOS RESPONSABLE EMPRESA</h1>
                    <div class="login-content">
                        <form id="formulario-datos-responsable-empresa" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Responsable Técnico</h5>
                                        <input type="text" id="responsable_tecnico" name="responsable_tecnico" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Elaborado</h5>
                                        <input type="text" id="elaborado" name="elaborado" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Observaciones</h5>
                                        <input type="text" id="observaciones" name="observaciones" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Zona</h5>
                                        <input type="text" id="zona" name="zona" required class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-datos-responsable" class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-datos-responsable" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>Responsable Técnico</th>
                                <th>Elaborado</th>
                                <th>Observaciones</th>
                                <th>Zona</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-datos-responsable-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section10" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">DATOS DE CHIMENEA</h1>
                    <div class="login-content">
                        <form id="formulario-chimenea" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CVECH</h5>
                                        <input type="text" id="cvech" name="cvech" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Altura</h5>
                                        <input type="number" step="0.01" id="altura" name="altura" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Diámetro</h5>
                                        <input type="number" step="0.01" id="diametro" name="diametro" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Velocidad</h5>
                                        <input type="number" step="0.01" id="velocidad" name="velocidad" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Temperatura</h5>
                                        <input type="number" step="0.01" id="temperatura" name="temperatura" required
                                            class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-chimenea" class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-chimenea" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>CVECH</th>
                                <th>Altura</th>
                                <th>Diámetro</th>
                                <th>Velocidad</th>
                                <th>Temperatura</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-chimenea-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section11" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">COMPUESTOS DE CHIMENEA</h1>
                    <div class="login-content">
                        <form id="formulario-compuestos-chimenea" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CVECH</h5>
                                        <input type="text" id="cvech" name="cvech" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CO2</h5>
                                        <input type="number" step="0.01" id="co2" name="co2" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIP CO2</h5>
                                        <input type="text" id="tip_co2" name="tip_co2" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CH4</h5>
                                        <input type="number" step="0.01" id="ch4" name="ch4" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIP CH4</h5>
                                        <input type="text" id="tip_ch4" name="tip_ch4" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>N2O</h5>
                                        <input type="number" step="0.01" id="n2o" name="n2o" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIP N2O</h5>
                                        <input type="text" id="tip_n2o" name="tip_n2o" required class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-compuestos-chimenea" class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-compuestos-chimenea" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>CVECH</th>
                                <th>CO2</th>
                                <th>TIP CO2</th>
                                <th>CH4</th>
                                <th>TIP CH4</th>
                                <th>N2O</th>
                                <th>TIP N2O</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-compuestos-chimenea-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section12" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">REGISTRO DE ACTIVIDADES DEL PROCESO</h1>
                    <div class="login-content">
                        <form id="formulario-registro-actividades-proceso" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CVEACTP</h5>
                                        <input type="text" id="cveactp" name="cveactp" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIPO DE ACTIVIDAD GENERAL</h5>
                                        <input type="text" id="tipactiv_gral" name="tipactiv_gral" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>PROCESO</h5>
                                        <input type="text" id="proceso" name="proceso" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>UNIDAD FE</h5>
                                        <input type="text" id="unidad_fe" name="unidad_fe" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>HR/AÑO</h5>
                                        <input type="number" step="0.01" id="hr_ano" name="hr_ano" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIPO DE EMISIÓN</h5>
                                        <input type="text" id="tipo_de_emision" name="tipo_de_emision" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>EQUIPO DE CONTROL</h5>
                                        <input type="text" id="equipo_de_control" name="equipo_de_control" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CHIMENEA</h5>
                                        <input type="text" id="chimenea" name="chimenea" required class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-registro-actividades-proceso"
                                    class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-registro-actividades-proceso" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>CVEACTP</th>
                                <th>TIPO DE ACTIVIDAD GENERAL</th>
                                <th>PROCESO</th>
                                <th>UNIDAD FE</th>
                                <th>HR/AÑO</th>
                                <th>TIPO DE EMISIÓN</th>
                                <th>EQUIPO DE CONTROL</th>
                                <th>CHIMENEA</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-registro-actividades-proceso-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section13" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">ACTIVIDAD PARTICULAS PROCESOS</h1>
                    <div class="login-content">
                        <form id="formulario-actividad-particulas-procesos" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CO2 PROC SC</h5>
                                        <input type="number" step="0.01" id="co2_proc_sc" name="co2_proc_sc" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIP CO2</h5>
                                        <input type="text" id="tip_co2" name="tip_co2" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CH4 PROC SC</h5>
                                        <input type="number" step="0.01" id="ch4_proc_sc" name="ch4_proc_sc" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIP CH4</h5>
                                        <input type="text" id="tip_ch4" name="tip_ch4" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>N2O PROC SC</h5>
                                        <input type="number" step="0.01" id="n2o_proc_sc" name="n2o_proc_sc" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIP N2O</h5>
                                        <input type="text" id="tip_n2o" name="tip_n2o" required class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-actividad-particulas-procesos"
                                    class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-actividad-particulas-procesos" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>CO2 PROC SC</th>
                                <th>TIP CO2</th>
                                <th>CH4 PROC SC</th>
                                <th>TIP CH4</th>
                                <th>N2O PROC SC</th>
                                <th>TIP N2O</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-actividad-particulas-procesos-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section14" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">EQUIVALENTE COMBUSTIBLE</h1>
                    <div class="login-content">
                        <form id="formulario-equivalente-combustible" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CVEQPOC</h5>
                                        <input type="text" id="cveqpoc" name="cveqpoc" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIPEQUIA</h5>
                                        <input type="text" id="tipequia" name="tipequia" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>HR ANO</h5>
                                        <input type="number" step="0.01" id="hr_ano" name="hr_ano" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIPO DE EMISION</h5>
                                        <input type="text" id="tipo_de_emision" name="tipo_de_emision" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CAPACIDAD</h5>
                                        <input type="number" step="0.01" id="capacidad" name="capacidad" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>UNIDAD CAPACIDAD</h5>
                                        <input type="text" id="unidad_capacidad" name="unidad_capacidad" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIPOCOMBUST</h5>
                                        <input type="text" id="tipocombust" name="tipocombust" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CANTIDAD</h5>
                                        <input type="number" step="0.01" id="cantidad" name="cantidad" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>UNIDAD CANTIDAD</h5>
                                        <input type="text" id="unidad_cantidad" name="unidad_cantidad" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CHIMENEA</h5>
                                        <input type="text" id="chimenea" name="chimenea" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>EQUIPO DE CONTROL</h5>
                                        <input type="text" id="equipo_de_control" name="equipo_de_control" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>PORC S</h5>
                                        <input type="number" step="0.01" id="porc_s" name="porc_s" required
                                            class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-equivalente-combustible"
                                    class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-equivalente-combustible" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>CVEQPOC</th>
                                <th>TIPEQUIA</th>
                                <th>HR ANO</th>
                                <th>TIPO DE EMISION</th>
                                <th>CAPACIDAD</th>
                                <th>UNIDAD CAPACIDAD</th>
                                <th>TIPOCOMBUST</th>
                                <th>CANTIDAD</th>
                                <th>UNIDAD CANTIDAD</th>
                                <th>CHIMENEA</th>
                                <th>EQUIPO DE CONTROL</th>
                                <th>PORC S</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-equivalente-combustible-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section15" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">EQUIVALENCIA PARTICULAS COMBUSTIBLE</h1>
                    <div class="login-content">
                        <form id="formulario-equivalencia-particulas-combustible" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CO2 COMB SC</h5>
                                        <input type="number" step="0.01" id="co2_comb_sc" name="co2_comb_sc" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIP CO2</h5>
                                        <input type="text" id="tip_co2" name="tip_co2" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CH4 COMB SC</h5>
                                        <input type="number" step="0.01" id="ch4_comb_sc" name="ch4_comb_sc" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIP CH4</h5>
                                        <input type="text" id="tip_ch4" name="tip_ch4" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>N2O COMB SC</h5>
                                        <input type="number" step="0.01" id="n2o_comb_sc" name="n2o_comb_sc" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIP N2O</h5>
                                        <input type="text" id="tip_n2o" name="tip_n2o" required class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-equivalencia-particulas-combustible"
                                    class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-equivalencia-particulas-combustible" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>CO2 COMB SC</th>
                                <th>TIP CO2</th>
                                <th>CH4 COMB SC</th>
                                <th>TIP CH4</th>
                                <th>N2O COMB SC</th>
                                <th>TIP N2O</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-equivalencia-particulas-combustible-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section16" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">Equivalencias Contaminantes de Control</h1>
                    <div class="login-content">
                        <form id="formulario-equivalencias-contaminantes-control" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CVEQPOCON</h5>
                                        <input type="text" id="cveqpocon" name="cveqpocon" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIPO DE EQ CONTROL</h5>
                                        <input type="text" id="tipo_de_eq_control" name="tipo_de_eq_control" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>EFICIENCIA</h5>
                                        <input type="number" step="0.01" id="eficiencia" name="eficiencia" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>MÉTODO DE ESTIMACIÓN</h5>
                                        <input type="text" id="metodo_de_estimacion" name="metodo_de_estimacion"
                                            required class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-equivalencias-contaminantes-control"
                                    class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-equivalencias-contaminantes-control" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>CVEQPOCON</th>
                                <th>TIPO DE EQ CONTROL</th>
                                <th>EFICIENCIA</th>
                                <th>MÉTODO DE ESTIMACIÓN</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-equivalencias-contaminantes-control-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section17" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">Control de Contaminantes</h1>
                    <div class="login-content">
                        <form id="formulario-control-contaminantes" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Contaminante Control 1</h5>
                                        <input type="text" id="contam_control_1" name="contam_control_1" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Contaminante Control 2</h5>
                                        <input type="text" id="contam_control_2" name="contam_control_2" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Contaminante Control 3</h5>
                                        <input type="text" id="contam_control_3" name="contam_control_3" required
                                            class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-control-contaminantes"
                                    class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-control-contaminantes" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>Contaminante Control 1</th>
                                <th>Contaminante Control 2</th>
                                <th>Contaminante Control 3</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-control-contaminantes-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section18" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">ACTIVIDAD DE SUMINISTRO</h1>
                    <div class="login-content">
                        <form id="formulario-actividad-suministro" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Actividad</h5>
                                        <input type="text" id="actividad" name="actividad" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Equipo de Combustión</h5>
                                        <input type="text" id="equipo_combustion" name="equipo_combustion" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Situación</h5>
                                        <input type="text" id="situacion" name="situacion" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>MD</h5>
                                        <input type="text" id="md" name="md" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CT</h5>
                                        <input type="text" id="ct" name="ct" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CI</h5>
                                        <input type="text" id="ci" name="ci" required class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-actividad-suministro" class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-actividad-suministro" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>Actividad</th>
                                <th>Equipo de Combustión</th>
                                <th>Situación</th>
                                <th>MD</th>
                                <th>CT</th>
                                <th>CI</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-actividad-suministro-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section19" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">COMBUSTIBLES PODERES NETOS</h1>
                    <div class="login-content">
                        <form id="formulario-combustibles-poderes-netos" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CVECH</h5>
                                        <input type="text" id="cvech" name="cvech" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIPO DE COMBUSTIBLE</h5>
                                        <input type="text" id="tipo_combustible" name="tipo_combustible" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>HR/AÑO</h5>
                                        <input type="number" step="0.01" id="hr_ano" name="hr_ano" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIPO DE EMISIÓN</h5>
                                        <input type="text" id="tipo_emision" name="tipo_emision" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CAPACIDAD</h5>
                                        <input type="number" step="0.01" id="capacidad" name="capacidad" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>UNIDAD</h5>
                                        <input type="text" id="unidad" name="unidad" required class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-combustibles-poderes-netos"
                                    class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-combustibles-poderes-netos" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>CVECH</th>
                                <th>TIPO DE COMBUSTIBLE</th>
                                <th>HR/AÑO</th>
                                <th>TIPO DE EMISIÓN</th>
                                <th>CAPACIDAD</th>
                                <th>UNIDAD</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-combustibles-poderes-netos-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section20" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">TIPO DE COMBUSTIBLE PODERES NETOS</h1>
                    <div class="login-content">
                        <form id="formulario-tipo-combustible-poderes-netos" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIPO DE COMBUSTIBLE</h5>
                                        <input type="text" id="tipo_combustible" name="tipo_combustible" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>PODER CALORÍFICO NETO</h5>
                                        <input type="number" step="0.01" id="poder_calorifico_neto"
                                            name="poder_calorifico_neto" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>UNIDAD DE MEDIDA KJ/M3</h5>
                                        <input type="number" step="0.01" id="unidad_medida_kj_m3"
                                            name="unidad_medida_kj_m3" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>UNIDAD DE MEDIDA MJ/T</h5>
                                        <input type="number" step="0.01" id="unidad_medida_mj_t"
                                            name="unidad_medida_mj_t" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CANTIDAD DE CONSUMO</h5>
                                        <input type="number" step="0.01" id="cantidad_consumo" name="cantidad_consumo"
                                            required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>FACTOR DE CONVERSIÓN A BEP</h5>
                                        <input type="number" step="0.01" id="factor_conversion_bep"
                                            name="factor_conversion_bep" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>EQUIVALENCIA DE UNIDADES BEP/M3</h5>
                                        <input type="number" step="0.01" id="equivalencia_bep_m3"
                                            name="equivalencia_bep_m3" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>EQUIVALENCIA DE UNIDADES BEP/T</h5>
                                        <input type="number" step="0.01" id="equivalencia_bep_t"
                                            name="equivalencia_bep_t" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CO2 T/MJ</h5>
                                        <input type="number" step="0.01" id="co2_t_mj" name="co2_t_mj" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CH4 KG/MJ</h5>
                                        <input type="number" step="0.01" id="ch4_kg_mj" name="ch4_kg_mj" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>N2O KG/MJ</h5>
                                        <input type="number" step="0.01" id="n2o_kg_mj" name="n2o_kg_mj" required
                                            class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-tipo-combustible-poderes-netos"
                                    class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-tipo-combustible-poderes-netos" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>TIPO DE COMBUSTIBLE</th>
                                <th>PODER CALORÍFICO NETO</th>
                                <th>UNIDAD DE MEDIDA KJ/M3</th>
                                <th>UNIDAD DE MEDIDA MJ/T</th>
                                <th>CANTIDAD DE CONSUMO</th>
                                <th>FACTOR DE CONVERSIÓN A BEP</th>
                                <th>EQUIVALENCIA DE UNIDADES BEP/M3</th>
                                <th>EQUIVALENCIA DE UNIDADES BEP/T</th>
                                <th>CO2 T/MJ</th>
                                <th>CH4 KG/MJ</th>
                                <th>N2O KG/MJ</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-tipo-combustible-poderes-netos-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section21" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">PRODUCCIÓN USO CFCS</h1>
                    <div class="login-content">
                        <form id="formulario-produccion-uso-cfcs" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CVECH</h5>
                                        <input type="text" id="cvech" name="cvech" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>EQUIVALENTES DE ELECTRICIDAD</h5>
                                        <input type="number" step="0.01" id="equivalentes_electricidad"
                                            name="equivalentes_electricidad" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>HR AÑO</h5>
                                        <input type="number" step="0.01" id="hr_ano" name="hr_ano" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIPO DE EMISIÓN</h5>
                                        <input type="text" id="tipo_emision" name="tipo_emision" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CAPACIDAD</h5>
                                        <input type="number" step="0.01" id="capacidad" name="capacidad" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>UNIDAD</h5>
                                        <input type="text" id="unidad" name="unidad" required class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-produccion-uso-cfcs" class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-produccion-uso-cfcs" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>CVECH</th>
                                <th>EQUIVALENTES DE ELECTRICIDAD</th>
                                <th>HR AÑO</th>
                                <th>TIPO DE EMISIÓN</th>
                                <th>CAPACIDAD</th>
                                <th>UNIDAD</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-produccion-uso-cfcs-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section22" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">PRODUCCIÓN DE CFCs/HFCs</h1>
                    <div class="login-content">
                        <form id="formulario-produccion-cfcs-hfcs" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>ACTIVIDAD</h5>
                                        <input type="text" id="actividad" name="actividad" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>NOMBRE DE SUSTANCIA</h5>
                                        <input type="text" id="nombre_sustancia" name="nombre_sustancia" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>MASA SUSTANCIA CONSUMIDA</h5>
                                        <input type="number" step="0.01" id="masa_consumida" name="masa_consumida"
                                            required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>UNIDAD MEDIDA</h5>
                                        <input type="text" id="unidad_medida" name="unidad_medida" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>MASA SUSTANCIA ADICIONADA</h5>
                                        <input type="number" step="0.01" id="masa_adicionada" name="masa_adicionada"
                                            required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CANTIDAD</h5>
                                        <input type="number" step="0.01" id="cantidad" name="cantidad" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>UNIDAD</h5>
                                        <input type="text" id="unidad" name="unidad" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CO2</h5>
                                        <input type="number" step="0.01" id="co2" name="co2" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CH4</h5>
                                        <input type="number" step="0.01" id="ch4" name="ch4" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>N2O</h5>
                                        <input type="number" step="0.01" id="n2o" name="n2o" required class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-produccion-cfcs-hfcs" class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-produccion-cfcs-hfcs" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>ACTIVIDAD</th>
                                <th>NOMBRE DE SUSTANCIA</th>
                                <th>MASA SUSTANCIA CONSUMIDA</th>
                                <th>UNIDAD MEDIDA</th>
                                <th>MASA SUSTANCIA ADICIONADA</th>
                                <th>CANTIDAD</th>
                                <th>UNIDAD</th>
                                <th>CO2</th>
                                <th>CH4</th>
                                <th>N2O</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-produccion-cfcs-hfcs-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section23" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">ENERGÍA ELÉCTRICA</h1>
                    <div class="login-content">
                        <form id="formulario-energia-electrica" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CVECH</h5>
                                        <input type="text" id="cvech" name="cvech" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>HR ANO</h5>
                                        <input type="number" step="0.01" id="hr_ano" name="hr_ano" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIPO DE EMISION</h5>
                                        <input type="text" id="tipo_emision" name="tipo_emision" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CAPACIDAD</h5>
                                        <input type="number" step="0.01" id="capacidad" name="capacidad" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>UNIDAD</h5>
                                        <input type="text" id="unidad" name="unidad" required class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-energia-electrica" class="btn">Agregar</button>
                                <input type="submit" value="Siguiente" class="btn">
                            </div>
                        </form>
                    </div>
                    <table id="tabla-energia-electrica" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>CVECH</th>
                                <th>HR ANO</th>
                                <th>TIPO DE EMISION</th>
                                <th>CAPACIDAD</th>
                                <th>UNIDAD</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-energia-electrica-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="section24" class="section hidden">
            <div class="contenedor-formulario-empresa" id="modal">
                <div class="contenedor-formulario-empresa-animacion" id="modal-content">
                    <h1 class="label-name">PRODUCCIÓN DE ENERGÍA ELÉCTRICA</h1>
                    <div class="login-content">
                        <form id="formulario-produccion-energia-electrica" method="POST">
                            <div class="container-cajas-3">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CLAVE DE IDENTIFICACIÓN AMBIENTAL</h5>
                                        <input type="text" id="cveiden" name="cveiden" readonly
                                            value="<?php echo $_SESSION['cveiden']; ?>" class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CAPACIDAD INSTALADA</h5>
                                        <input type="number" step="0.01" id="capacidad_instalada"
                                            name="capacidad_instalada" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIPO DE PLANTA</h5>
                                        <input type="text" id="tipo_de_planta" name="tipo_de_planta" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>GENERACIÓN ANUAL MWH</h5>
                                        <input type="number" step="0.01" id="generacion_anual_mwh"
                                            name="generacion_anual_mwh" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CONSUMO COMBUSTIBLE</h5>
                                        <input type="text" id="consumo_combustible" name="consumo_combustible" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>TIPO</h5>
                                        <input type="text" id="tipo" name="tipo" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CANTIDAD</h5>
                                        <input type="number" step="0.01" id="cantidad" name="cantidad" required
                                            class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>UNIDAD</h5>
                                        <input type="text" id="unidad" name="unidad" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CO2</h5>
                                        <input type="number" step="0.01" id="co2" name="co2" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>CH4</h5>
                                        <input type="number" step="0.01" id="ch4" name="ch4" required class="input">
                                    </div>
                                </div>
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>N2O</h5>
                                        <input type="number" step="0.01" id="n2o" name="n2o" required class="input">
                                    </div>
                                </div>
                                <button type="button" id="btn-agregar-produccion-energia-electrica"
                                    class="btn">Agregar</button>                               
                            </div>
                        </form>
                    </div>
                    <table id="tabla-produccion-energia-electrica" class="tabla-verde">
                        <thead>
                            <tr>
                                <th>CVEIDEN</th>
                                <th>CAPACIDAD INSTALADA</th>
                                <th>TIPO DE PLANTA</th>
                                <th>GENERACIÓN ANUAL MWH</th>
                                <th>CONSUMO COMBUSTIBLE</th>
                                <th>TIPO</th>
                                <th>CANTIDAD</th>
                                <th>UNIDAD</th>
                                <th>CO2</th>
                                <th>CH4</th>
                                <th>N2O</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-produccion-energia-electrica-body"></tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- NUMERO DE SECCIONES  24 Y 25 TABLAS DE LA BASE DE DATOS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/script-empresa.js"></script>
    <script src="js/script-boton-ver.js"></script>
    <script src="js/script-materias-primas.js"></script>
    <script src="js/script-productos.js"></script>
    <script src="js/script-combustibles.js"></script>
    <script src="js/script-insumo-empresarial.js"></script>
    <script src="js/script-componentes-combustibles.js"></script>
    <script src="js/script-componentes-particulas.js"></script>
    <script src="js/script-suma-particulas.js"></script>
    <script src="js/script-datos-responsable.js"></script>
    <script src="js/script-chimenea.js"></script>
    <script src="js/script-compuestos-chimenea.js"></script>
    <script src="js/script-registro-actividades-proceso.js"></script>
    <script src="js/script-actividad-particulas-procesos.js"></script>
    <script src="js/script-equivalente-combustible.js"></script>
    <script src="js/script-equivalencia-particulas-combustible.js"></script>
    <script src="js/script-equivalencias-contaminantes-control.js"></script>
    <script src="js/script-control-contaminantes.js"></script>
    <script src="js/script-equivalencias-antes-control.js"></script>
    <script src="js/script-combustibles-poderes-netosf.js"></script>
    <script src="js/script-tipo-combustible-poderes-netos.js"></script>
    <script src="js/script-produccion-uso-cfcs.js"></script>
    <script src="js/script-produccion-cfcs-hfcs.js"></script>
    <script src="js/script-energia-electrica.js"></script>
    <script src="js/script-produccion-energia-electrica.js"></script>
    <script src="js/script-menu.js"></script>
    <script src="js/buscador-automatico-entidades.js"></script>
    <script src="js/script-indicadores.js"></script>
    <script src="js/index.js"></script>
</body>

</html>