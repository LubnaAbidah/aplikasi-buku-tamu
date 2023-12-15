                          
                            <div class="col-md-3">
                                <div class="list-group">
                                    <div class="list-group-item list-group-item-info">
                                            <h5 class="text-muted">Total Pengunjung Tahun Ini</h5>
                                            <h2>
                                               <span class=" glyphicon glyphicon-list-alt"></span>
                                            <?php $result4="select COUNT(id_tamu) as total FROM tamu WHERE YEAR(tanggal_waktu) = YEAR(NOW())";
                                            $sqli4 = mysqli_query($kdb,$result4);
                                            $data4 =mysqli_fetch_assoc($sqli4);
                                         
                                            echo $data4['total'];?> Orang 
                                             
                                            </h2> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                 <div class="list-group">
                                    <div class="list-group-item list-group-item-success">
                                            <h5 class="text-muted">Total Pengunjung Bulan Ini</h5>
                                            <h2 class="mb-0">
                                               <span class=" glyphicon glyphicon-th-list"></span>
                                            <?php $result3="select COUNT(id_tamu) as total FROM tamu WHERE MONTH(tanggal_waktu) = MONTH(NOW()) AND YEAR(tanggal_waktu) = YEAR(NOW())";
                                            $sqli3 = mysqli_query($kdb,$result3);
                                            $data3=mysqli_fetch_assoc($sqli3);
                                         
                                            echo $data3['total'];?>  Orang
                                            </h2> 
                                </div>
                            </div>
                            </div>
                            <div class="col-md-3">
                                <div class="list-group">
                                    <div class="list-group-item list-group-item-warning">
                                            <h5 class="text-muted">Total Pengunjung Hari Ini</h5>
                                            <h2 class="mb-0">
                                               <span class="glyphicon glyphicon-th-large"></span>
                                            <?php $result2="select COUNT(id_tamu) as total FROM tamu WHERE DATE(tanggal_waktu) = DATE(NOW())";
                                            $sqli2 = mysqli_query($kdb,$result2);
                                            $data2=mysqli_fetch_assoc($sqli2);
                                         
                                            echo $data2['total'];?> Orang
                                            </h2>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-3">
                                <div class="list-group">
                                    <div class="list-group-item list-group-item-danger">
                                            <h5 class="text-muted">Total Pengunjung Kemarin</h5>
                                            <h2 class="mb-0"> 
                                               <span class=" glyphicon glyphicon-th"></span>
                                            <?php $result="select COUNT(id_tamu) as total FROM tamu WHERE DATE(tanggal_waktu) >= DATE(NOW()) - INTERVAL 1 DAY and DATE(tanggal_waktu) < DATE(NOW())";
                                            $sqli = mysqli_query($kdb,$result);
                                            $data=mysqli_fetch_assoc($sqli);
                                         
                                            echo $data['total'];?> Orang</h2>
                                </div>
                            </div>
                            </div>
<?php

grafik();
curd_read();

  mysqli_close($kdb);


function grafik() 
{
global $kdb;
$kabupaten = sql_select_kabupaten();
$datakab = sql_select_kabupaten();
$kabupaten2 = sql_select_kabupaten2();
$datakab2 = sql_select_kabupaten2();
?>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
<!-- optional -->
    <script src="http://code.highcharts.com/modules/offline-exporting.js"></script>
    <script src="http://code.highcharts.com/modules/export-data.js"></script>
    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
    var myChart = Highcharts.chart('container', {
        colors: ['#eb2d3a'],
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Pengunjung Hari Ini'
        },
        xAxis: {
            categories: [<?php
      while($row = mysqli_fetch_assoc($kabupaten))
      {
         ?>'<?php echo $row['kabupaten']; ?>', <?php         
      } ?> ]
        },
        yAxis: {
            title: {
                text: 'Jumlah Pengunjung'
            },

        },
         tooltip: {
            valueSuffix: ' Orang'
        },
        series: [{
            name: 'Hari Ini',
            data: [ <?php
      while($row = mysqli_fetch_assoc($datakab))
      {
         echo $row['JUMLAH'].', ';  
     } ?>   ]
        }]
    });


        var myChart = Highcharts.chart('container3', {
  
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Pengunjung Kemarin'
        },
        xAxis: {
            categories: [<?php
      while($row = mysqli_fetch_assoc($kabupaten2))
      {
         ?>'<?php echo $row['kabupaten']; ?>', <?php         
      } ?> ]
        },
        yAxis: {
            title: {
                text: 'Jumlah Pengunjung'
            },

        },
         tooltip: {
            valueSuffix: ' Orang'
        },
        series: [{
            name: 'Kemarin',
            data: [ <?php
      while($row = mysqli_fetch_assoc($datakab2))
      {
         echo $row['JUMLAH2'].', ';  
     } ?>   ]
        }]
    });
  
  

   var options = {
   colors: [
'#44008B', 
],

                    chart: {
                        renderTo: 'container2',
                        type: 'column'
                    },
                    title: {
                        text: 'Data Grafik Per Bulan Tahun <?php   print(date("Y")); ?> ',
                       
                    },
                    xAxis: {
                        categories: [],
                        title: {
                            text: 'Bulan'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Jumlah Pengunjung'
                        },
                    },
                    tooltip: {
                        valueSuffix: ' Orang'
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                    },
                    series: []
                };
                $.getJSON("data-basic-bar.php", function(json) {
                    options.xAxis.categories = json[0]['data']; //xAxis: {categories: []}
                    options.series[0] = json[1];
                    chart = new Highcharts.Chart(options);
                });
    
}); 

   
    </script>

    <div class="col-md-6">
        <div id="container" style="min-width: 150px; width: 100%; height: 295px; margin: 0 auto"></div> 
    </div>
    <div class="col-md-6">
        <div id="container3" style="min-width: 150px; width: 100%; height: 295px; margin: 0 auto"></div> 
    </div>
    <div class="col-md-12">
        <div id="container2" style="min-width: 150px; width: 100%; height: 295px; margin: 0 auto"></div>
    </div>      

        <?php
  mysqli_free_result($kabupaten);
}  ?>
<?php
function curd_read()
{
  $hasil = sql_select();
  $i=1;
  ?>
   <div class="col-md-12">
     <div class="panel panel-info">
                        <div class="panel-heading">
                            5 Pengunjung Terakhir
                        </div>
                        <div class="panel-body">
  <div class="table-responsive">
<table id="example2" class="table table-striped table-bordered"  style="width:100%">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kabupaten</th>
                <th>Instansi</th>
                <th>Keperluan</th>
                <th>Yang Ditemui</th>
                <th>No Telepon</th>
                <th>Tanggal Kunjung</th>
                <th>Waktu Kunjung</th>
            </tr>
        </thead>
        <tbody>
                 <?php
      while($baris = mysqli_fetch_array($hasil))
      {
      ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $baris['nama']; ?></td>
                <td><?php echo $baris['alamat']; ?></td>
                <td><?php echo $baris['kabupaten']; ?></td>
                <td><?php echo $baris['instansi']; ?></td>
                <td><?php echo $baris['keperluan']; ?></td>
                <td><?php echo $baris['yang_ditemui']; ?></td>
                <td><?php echo $baris['no_telp']; ?></td>
                <td><?php echo tanggal_indo($baris['tanggal']); ?></td>
                <td><?php echo $baris['waktu']; ?></td>
                
            </tr>
             <?php
       $i++;
      }
      ?>
        </tbody>
        <tfoot>
            <tr>
           <td colspan="10">
            <a href="index.php?menu=4"  class="btn btn-success btn-md">
            <span class="glyphicon glyphicon-book"></span>
             Lihat Semua Daftar Pengunjung</a></td>
            </tr>
        </tfoot>
    </table>
  </div>
</div>
</div>
    <?php
  mysqli_free_result($hasil);
}
 ?>
</div>

    <?php
function sql_select_kabupaten()
{
  global $kdb;
  $sql = " select id_tamu, kabupaten , COUNT( * ) AS JUMLAH FROM tamu WHERE DATE(tanggal_waktu) = DATE(NOW()) GROUP BY kabupaten ORDER by id_tamu "; 
  $res = mysqli_query($kdb, $sql) or die(mysql_error());
  return $res;
}

function sql_select()
{
  global $kdb;
  $sql = " select *, date(tanggal_waktu) as tanggal, time(tanggal_waktu) as waktu FROM tamu ORDER BY tanggal_waktu DESC LIMIT 5 ";
  $hasil = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil;
}
function tanggal_indo($tanggal)
{
  $bulan = array (1 =>   'Januari',
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
  $split = explode('-', $tanggal);
  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
function sql_select_kabupaten2()
{
  global $kdb;
  $sql = " select id_tamu, kabupaten , COUNT( * ) AS JUMLAH2 FROM tamu WHERE DATE(tanggal_waktu) >= DATE(NOW()) - INTERVAL 1 DAY and DATE(tanggal_waktu) < DATE(NOW()) GROUP BY kabupaten ORDER by id_tamu "; 
  $res = mysqli_query($kdb, $sql) or die(mysql_error());
  return $res;
}

?>
    
