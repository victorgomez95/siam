<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Hoja de enfermería</title>
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
      <h1>Hoja de enfermería</h1>
    </header>
    <main>
      <table class="table">
        <tbody><tr><th>Nombre de paciente</th><th><?php echo $paciente?></th></tr></tbody>
      </table>
      <table>
        <tbody>
          <tr><td colspan="4"  align="center">Somatometría</td></tr>
          <?php foreach ($somatometria_array as $somatometria) { ?>
            <tr><td><strong>Peso:</strong></td><td><?php echo $somatometria["peso"].' kg'; ?></td>
              <td><strong>Altura:</strong></td><td><?php echo $somatometria["altura"].' cm'; ?></td></tr>
            <tr><td><strong>Presión sistólica:</strong></td><td><?php echo $somatometria["psistolica"].' mm'; ?></td>
              <td><strong>Presión diastólica:</strong></td><td><?php echo $somatometria["pdiastolica"].' Hg'; ?></td></tr>
            <tr><td><strong>Frecuencia respiratoria:</strong></td><td><?php echo $somatometria["frespiratoria"].' p/m'; ?></td>
              <td><strong>Pulso:</strong></td><td><?php echo $somatometria["pulso"].' p/m'; ?></td></tr>
            <tr><td><strong>Oximetría:</strong></td><td><?php echo $somatometria["oximetria"].' %'; ?></td>
              <td><strong>Glucometría:</strong></td><td><?php echo $somatometria["glucometria"].' mg/dL'; ?></td></tr>
          <?php } ?>
        </tbody>
  		</table>
    <?php if (count($habitus_array) > 0) { ?>
      <table>
        <tbody>
          <tr><td colspan="4"  align="center">Hábitus exterior</td></tr>
          <?php foreach ($habitus_array as $habitus) { ?>
            <tr><td><strong>Condición:</strong></td><td><?php echo $habitus["condicion"]; ?></td>
              <td><strong>Constitución:</strong></td><td><?php echo $habitus["constitucion"]; ?></td></tr>
            <tr><td><strong>Entereza:</strong></td><td><?php echo $habitus["entereza"]; ?></td>
              <td><strong>Proporción:</strong></td><td><?php echo $habitus["proporcion"]; ?></td></tr>
            <tr><td><strong>Biotiopo:</strong></td><td><?php echo $habitus["biotipo"]; ?></td>
              <td><strong>Actitud:</strong></td><td><?php echo $habitus["actitud"]; ?></td></tr>
            <tr><td><strong>Fascies:</strong></td><td><?php echo $habitus["fascies"]; ?></td>
              <td><strong>Movimientos anormales:</strong></td><td><?php echo $habitus["movanormal"]; ?></td></tr>
            <tr><td><strong>Observaciones de m.anormales:</strong></td><td><?php echo $habitus["movanormal_obs"]; ?></td>
              <td><strong>Marchas anormales:</strong></td><td><?php echo $habitus["marchanormal"]; ?></td></tr>
          <?php } ?>
        </tbody>
  		</table>
    <?php }
      if (count($medicamentos_array) > 0) {
    ?>
      <table>
        <tbody>
          <tr><td colspan="4"  align="center">Medicamentos administrados</td></tr>
          <?php foreach ($medicamentos_array as $medicamento) { ?>
            <tr><td><strong>Medicamento:</strong></td><td><?php echo $medicamento["nombre_med"]; ?></td>
              <td><strong>Cantidad:</strong></td><td><?php echo $medicamento["cantidad"]; ?></td></tr>
            <tr><td><strong>Fecha de administración:</strong></td><td><?php echo $medicamento["fecha_admin"]; ?></td>
              <td><strong>Vía de administración:</strong></td><td><?php echo $medicamento["via"]; ?></td></tr>
          <?php } ?>
        </tbody>
  		</table>
      <?php }
        if (count($medicamentos_actuales_array) > 0) {
      ?>
      <table>
        <tbody>
          <tr><td colspan="4"  align="center">Medicamentos actuales</td></tr>
          <?php foreach ($medicamentos_actuales_array as $medicamento) { ?>
            <tr><td><strong>Medicamento:</strong></td><td><?php echo $medicamento["nombre_med"]; ?></td>
              <td><strong>Vía de administración:</strong></td><td><?php echo $medicamento["via"]; ?></td></tr>
          <?php } ?>
        </tbody>
  		</table>
    <?php } ?>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Si hay alguna inconsistecia en sus datos, puede modificarlos.</div>
      </div>
    </main>
    <footer>
      Ésta hoja de enfermería fue creada en computadora y es válida sin firma y sello.
    </footer>
    <script src="js/jQuery-2.1.4.min.js"></script>
    <script src="js/graficas_nursesheets.js"></script>
  </body>
</html>
