<?php
    $url = 'http://189.254.18.98:8009/InterfaceAduana/RequestSrvr?txtComando=getObtenerReportePedimentos&iNumeroAduana=61&iIdSession=123&secure=klajd256';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($result);
    //print_r($result);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tabla Reporte de Pedimentos</title>
  <link rel="stylesheet" href="css/_bootstrap.css">
  <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
</head>
<body>

  <section id="reportes-Embarques">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="reporte table-responsive ">
            <table class="table table-bordered table-hover reporte_table">
              <thead class="reporte_table--head text-center">
              <tr>
                <th>Clave Importación</th>
                <th>Clave Pedimento</th>
                <th>F. Pago del Pedimento</th>
                <th>Nro Pedimento Original</th>
                <th>Total ADV</th>
                <th>Total DTA</th>
                <th>Total IVA</th>
              </tr>
              </thead>
              <tbody id="contenido" class="reporte_table--body text-center">
              <?php
              if( !empty($data) && is_array($data) ){
              foreach($data as $value){
              echo "<tr><td><a href='#'>". $value->sClaveImportacion ."</a></td><td>". $value->sClavePedimento ."</td><td>". $value->sFechaPago ."</td><td>". $value->iNumeroPedimento ."</td><td>". $value->fTotalAdv ."</td><td>". $value->fTotalDta ."</td><td><a href='#'>". $value->fTotalIva ."</a></td></tr>";
              }
              }else{
              echo "<tr><td colspan='7'>No existen resultados</td></tr>";
              }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>