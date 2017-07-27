<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Hoja de registro</title>
    <link rel="stylesheet" type="text/css"><style>
    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }

    a {
      color: #5D6975;
      text-decoration: underline;
    }

    body {
      position: relative;
      width: 16cm;
      height: 29.7cm;
      margin: 0 auto;
      color: #001028;
      background: #FFFFFF;
      font-family: Arial, sans-serif;
      font-size: 12px;
      font-family: Arial;
    }

    header {
      padding: 10px 0;
      margin-bottom: 30px;
    }

    #logo {
      text-align: center;
      margin-bottom: 10px;
    }

    #logo img {
      width: 90px;
    }

    h1 {
      border-top: 1px solid  #5D6975;
      border-bottom: 1px solid  #5D6975;
      color: #5D6975;
      font-size: 2.4em;
      line-height: 1.4em;
      font-weight: normal;
      text-align: center;
      margin: 0 0 20px 0;
      background-image: url("imagenes_menu/dimension.png");
    }

    #project {
      float: left;
    }

    #project span {
      color: #5D6975;
      text-align: right;
      width: 52px;
      margin-right: 10px;
      display: inline-block;
      font-size: 0.8em;
    }

    #company {
      float: right;
      text-align: right;
    }

    #project div,
    #company div {
      white-space: nowrap;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 20px;
    }

    table tr:nth-child(2n-1) td {
      background: #F5F5F5;
    }

    table th,
    table td {
      text-align: center;
    }

    table th {
      padding: 5px 20px;
      color: #5D6975;
      border-bottom: 1px solid #C1CED9;
      white-space: nowrap;
      font-weight: normal;
    }

    table .service,
    table .desc {
      text-align: left;
    }

    table td {
      padding: 20px;
      text-align: right;
    }

    table td.service,
    table td.desc {
      vertical-align: top;
    }

    table td.unit,
    table td.qty,
    table td.total {
      font-size: 1.2em;
    }

    table td.grand {
      border-top: 1px solid #5D6975;;
    }

    #notices .notice {
      color: #5D6975;
      font-size: 1.2em;
    }

    footer {
      color: #5D6975;
      width: 100%;
      height: 30px;
      position: absolute;
      bottom: 0;
      border-top: 1px solid #C1CED9;
      padding: 8px 0;
      text-align: center;
    }
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="img/icono.png">
      </div>
      <h1>Hoja de registro</h1>
      <div id="company" class="clearfix">
        <div>Clínica X</div>
        <div>Teopanzolco 408-102B | Col. Reforma |<br /> C.P 62260 Cuernavaca</div>
        <div>(01) 777 364 5008</div>
        <div><a href="mailto:clinica@gmail.com">clinica@gmail.com</a></div>
      </div>
    </header>
    <main>
      <table class="table">
        <thead><tr><th>Nombre</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $nombre?></td></tr></tbody>
        <thead><tr><th>Apellido paterno</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $apaterno?></td></tr></tbody>
        <thead><tr><th>Apellido materno</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $amaterno?></td></tr></tbody>
        <thead><tr><th>Sexo</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $sexo?></td></tr></tbody>
        <thead><tr><th>Fecha de nacimiento</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $fecha_nac?></td></tr></tbody>
        <thead><tr><th>CURP</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $curp?></td></tr></tbody>
        <thead><tr><th>Nacionalidad</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $nacionalidad?></td></tr></tbody>
        <thead><tr><th>Calle</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $calle?></td></tr></tbody>
        <thead><tr><th>Número exterior</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $num_ext?></td></tr></tbody>
        <thead><tr><th>Número interior</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $num_int?></td></tr></tbody>
        <thead><tr><th>Colonia</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $colonia?></td></tr></tbody>
        <thead><tr><th>Código postal</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $cp?></td></tr></tbody>
        <thead><tr><th>Localidad</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $localidad?></td></tr></tbody>
        <thead><tr><th>Municipio</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $municipio?></td></tr></tbody>
        <thead><tr><th>Estado</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $estado?></td></tr></tbody>
        <thead><tr><th>Teléfono de casa</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $telefono_casa?></td></tr></tbody>
        <thead><tr><th>Teléfono celular</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $telefono_celular?></td></tr></tbody>
        <thead><tr><th>Teléfono de oficina</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $telefono_oficina?></td></tr></tbody>
        <thead><tr><th>Correo</th></tr></thead>
        <tbody><tr><td class="service"><?php echo $correo?></td></tr></tbody>

  		</table>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Si hay alguna inconsistecia en sus datos, puede modificarlos.</div>
      </div>
    </main>
    <footer>
      Ésta hoja de registro fue creada en computadora y es válida sin firma y sello.
    </footer>
  </body>
</html>
