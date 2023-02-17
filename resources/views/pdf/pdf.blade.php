<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        /* background-color: #FAFAFA; */
        font-family: 'Roboto', sans-serif;
        font-size: 12pt;
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        /* padding: 20mm; */
        margin: 10mm auto;
        margin-top: 0px !important;
        /* border: 1px #D3D3D3 solid; */
        border-radius: 5px;
        /* background: white; */
        /* box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); */
    }
    .subpage {
        padding: 1cm;
        /* border: 5px red solid; */
        min-height: 257mm;
        /* outline: 2cm #FFEAEA solid; */
    }

    /* content  */

    .hr{
      margin-top: 10px;
      margin-bottom: 10px;
    }

    img{
        width: 100px;
        height: 80px;
        object-fit: contain;
        display: inline-block;
        
    }
    .img1, .img2{
        display: inline-block;
    }

    .img1{
        /* margin-right: 10px; */
        float: left;
    }

    /* .img2{
      float: right;
    } */
    
    .title{
        margin-top: 20px;
        text-align: center;
        margin-left: 100px;
        width: 500px;
        height: 50px;
        font-size: 20px;
    }

    .clear{
        clear: both;
    }

    .head span{
        display: block;
        font-size: 14px;
        margin-top: 5px;
    }

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  margin-top: 10px;
  
}

th, td {
  text-align: left;
  padding: 10px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

.float-left{
    float: right;
}

    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>
<body>
    <div class="book">
        <div class="page">
            <div class="subpage">
                <div class="header">
                    <div class="img1">
                        <img src="{{ public_path('assets/images/harris_logo.jpg') }}" alt="">
                      </div>
        
                      <div class="title">
                            Hasil Perhitungan Penilaian Kinerja Karyawan <br> Priode <?php echo date("Y");?> & <?php $nextYears = date("Y",strtotime("+1 year")); echo $nextYears;?>
                      </div>
                      <!-- <div class="img2">
                        <img src="harris_logo.png" alt="">
                      </div> -->
                      <div class="clear"></div>
                      <hr border="10" class="hr">
                </div>

                <div class="content">
                    <div class="head">
                        <div class="float-left">
                            <span>Tahun : <?php echo date("Y");?></span>
                        </div>
                        <span>Kode Hotel : HSMY </span>
                        <span>Nama Hotel : Harris Hotel Seminyak </span>
                    </div>
                   <div class="table">
                    <table>
                        <thead>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Departemen</th>
                            <th>Hasil</th>
                        </thead>
                       <tbody>
                       <?php $rank=[];?>
                        @foreach ( $nilai as $datas => $value)
                        <?php 
                            $rank[]=[
                                "name"=> $value->karyawan->nama_karyawan,
                                "value"=>$data[$datas],
                                "departemen"=> $value->karyawan->departemen->nama_departemen,
                            ]
                        ?>
                        @endforeach
                        <?php 
                        
                        usort($rank,function($a,$b){
                            return $b['value'] - $a['value'];
                        })
                        ?>
                    @foreach ( $rank as $datas => $value)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$value['name']}}</td>
                        <td>{{$value['departemen']}}</td>
                        <td>{{$value['value']}}</td>
                    </tr>
                    @endforeach

                       </tbody>
                        
                      </table>
                   </div>
                </div>
             
                   
            </div>    
        </div>
</body>
</html>