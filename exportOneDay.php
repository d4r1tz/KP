<?php
  function tgl_indo($tanggal){
    $bulan = array (
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>LOGBOOK PELAYARAN</title>
  </head>
  <body>
    <style type="text/css">
    body{
      font-family: sans-serif;
    }
    table{
      margin: 200px auto;
      border-collapse: collapse;
    }
    table th,
    table td{
      border: 1px solid #3c3c3c;
      padding: 3px 8px;
  
    }
    a{
      background: blue;
      color: #fff;
      padding: 8px 10px;
      text-decoration: none;
      border-radius: 2px;
    }
    </style>
  
    <center>
      <h1>DATA LOGBOOK PELAYARAN</h1>
      <h2><?php echo tgl_indo((date("Y-m-d")));?></h2>
    </center>
  
    <table border="1">
      <tr>
        <th>MMSI</th>
        <th>Nama Kapal</th>
        <th>Call Sign</th>
        <th>IMO</th>
        <th>Length</th>
        <th>Beam</th>
        <th>Last Port</th>
        <th>Next Port</th>
        <th>ETD</th>
        <th>ETA</th>
        <th>Draught</th>
      </tr>

      <tr>
        <?php
          $con = mysqli_connect('localhost','root','','kp_projek');
          $result = mysqli_query($con, "SELECT k.MMSI, k.Nama_kapal, k.Call_sign, k.IMO, k.Length, k.Width, t.Last_port, t.Next_port, t.ETD, t.ETA, t.Draught, t.Traffic_ID FROM kapal k inner join traffic t on k.MMSI=t.MMSI where t.input_date < CURRENT_DATE+1 AND t.input_date >= CURRENT_DATE;");
          while($traffic = mysqli_fetch_array($result))  
          {
              echo '<td>'.$traffic['MMSI'].'</td>';
              echo'<td>'.$traffic['Nama_kapal'].'</td>';
              if($traffic['Call_sign'] == NULL) {echo '<td>-</td>';} else {echo '<td>'.$traffic['Call_sign'].'</td>';}
              if($traffic['IMO'] == NULL) {echo '<td>-</td>';} else {echo '<td>'.$traffic['IMO'].'</td>';}
              if($traffic['Length'] == NULL) {echo '<td>-</td>';} else {echo '<td>'.$traffic['Length'].'</td>';}
              if($traffic['Width'] == NULL) {echo '<td>-</td>';} else {echo'<td>'.$traffic['Width'].'</td>';}
              echo '<td>'.$traffic['Last_port'].'</td>';
              echo '<td>'.$traffic['Next_port'].'</td>';
              echo'<td>'.$traffic['ETD'].'</td>';
              echo '<td>'.$traffic['ETA'].'</td>';
              echo'<td>'.$traffic['Draught'].'</td>';
              echo '</tr>';
          } 
        ?>
      </tr>
    </table>
  </body>
</html>

<?php 
  header('Content-Type:application/vnd-ms-excel');  
  header('Content-Disposition: attachment; filename=logbook.xls');
  exit();
?>