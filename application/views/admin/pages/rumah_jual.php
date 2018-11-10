        <?php
          if($rumah == null){ redirect('rumah/allhousing'); }
          $pemilik = $rumah->pemilik;
          if($pemilik == ""){ $pemilik = "-"; }
                if (strlen($rumah->harga_jual) == 10) {
              $lala = substr($rumah->harga_jual, 0, 1);
              $lolo = substr($rumah->harga_jual, 1, 1);
              if ($lolo == 0) {
                $harga = $lala." M";
              }else {
                $harga = $lala.",".$lolo." M";
              }
            }else {
              $lala = substr($rumah->harga_jual, 0, 1);
              $harga = $lala." Ratus Juta";
            }
          if (strlen($rumah->idrumah) == 1) {
            $haha = "00".$rumah->idrumah;
          }else if(strlen($rumah->idrumah) == 2) {
            $haha = "0".$rumah->idrumah;
          }else {
            $haha = $rumah->idrumah;
          }
          $hoho = date("Ymd");
          $buktijual = "EF/".$hoho."-".$haha;

          $tanggal = date("Y-m-d");
        ?>
        <!-- page content -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row" style="min-height: 1500px;">
            <div class="page-title">
              <div class="title_left">
                <h3>Rumah</h3>
              </div>
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link pull-right"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel">
                          <img src="<?= site_url('images/Rumah/'.$rumah->pictures) ?>" style="width: 100%;" >
                        </div>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-12" style="color: black;">
                        <table class="table">
                          <tr>
                            <td><strong>Blok</strong></td>
                            <td><strong>:</strong></td>
                            <td><?= $rumah->blok; ?></td>
                          </tr>
                          <tr>
                            <td><strong>Luas</strong></td>
                            <td><strong>:</strong></td>
                            <td><?= $rumah->luas; ?> M²</td>
                          </tr>
                          <tr>
                            <td><strong>Kamar</strong></td>
                            <td><strong>:</strong></td>
                            <td><?= $rumah->kamar ?> kamar</td>
                          </tr>
                          <tr>
                            <td><strong>Pemilik</strong></td>
                            <td><strong>:</strong></td>
                            <td><?= $pemilik ?></td>
                          </tr>
                          <tr>
                            <td><strong>Harga Rumah</strong></td>
                            <td><strong>:</strong></td>
                            <td><?= $rumah->harga_jual ?> ATAU <?= $harga ?></td>
                          </tr>
                            <?php 
                            if ($rumah->status == "kosong") {?>
                            <tr bgcolor="#579e5794">
                            <td><strong>Status</strong></td>
                            <td><strong>:</strong></td>
                            <td><strong style="color: green;"> Tersedia </strong>
                            </td>
                          </tr>
                            <?php }else {?>
                            <tr bgcolor="#e24b43d4">
                            <td><strong>Status</strong></td>
                            <td><strong>:</strong></td>
                            <td><strong style="color: red;"> Terjual </strong>
                            </td>

                            <?php }?>
                              
                                             
                        </table>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-12" style="color: black;">
                          <div class="x_panel">

                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="x_panel">
                                <h1 style="font-family: Times New Roman;"><center> Transaksi  </center></h1>
                                </div>
                              </div>
                            </div><br>
                            <div class="form-group">
                              <div class="col-md-3">
                                <input type="text" id="buktijual" name="buktijual" style="text-align: center;" required="required" class="form-control col-md-7 col-xs-12" value="<?= $buktijual ?>" maxlength="100" readonly>
                                <input type="hidden" id="idrumah" name="idrumah" style="text-align: center;" required="required" class="form-control col-md-7 col-xs-12" value="<?= $rumah->idrumah ?>" maxlength="100" readonly>
                              </div>
                              <div class="col-md-3" style="float: right;">
                                <input type="text" id="tanggal" name="tanggal" style="text-align: center;" required="required" class="form-control col-md-7 col-xs-12" value="<?= $tanggal ?>" maxlength="100" readonly>
                              </div>
                            </div><br><br>
                            <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="category"> Harga Bayar <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="hrg_bayar" name="hrg_bayar" required="required" class="form-control  col-md-7 col-xs-12" value="<?= $rumah->harga_jual ?>" maxlength="100" readonly>
                         
                              </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="category"> Nama Pembeli <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nama_pem" name="nama_pem" required="required" class="form-control    col-md-7 col-xs-12" value="" maxlength="100">
                         
                              </div>

                            </div>
                        <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="file">Ktp <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <img class="avatar-view" id="cphoto" src="<?= site_url('images/No-image-available.jpg'); ?>" alt="profil-img" width="226" height="226">
                          <input type="file" id="photo" onchange="loadFile(event)" accept="image/*" name="photo" class="form-control col-md-7 col-xs-12" value="<?= $photo ?>">
                        </div>
                      </div>
                            <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="category"> Jenis Pembayaran <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="level" id="level" required>
                            <option value="">-Jenis Pembayaran-</option>
                            <?php
                              $lvl = array('Pembayaran Tunai','Pembayaran Kredit');
                              for ($l=0; $l < sizeof($lvl); $l++) {

                                  echo "<option value='$lvl[$l]'>$lvl[$l]</option>";
                                
                              }
                            ?>
                            </select>
                              </div>

                            </div>
                         <div class="form-group" id="haha" style="display: none;">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="category"> Status <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="stats" name="stats" class="form-control  col-md-7 col-xs-12" value="Lunas" maxlength="100" readonly>
                         
                              </div>

                            </div>
                          <div class="form-group" id="hehe" style="display: none;">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="category"> Uang Muka <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="dp" name="dp" class="form-control  col-md-7 col-xs-12" maxlength="100" onchange="lala()">
                         
                              </div>

                            </div>
                          <div class="form-group" id="hehe1" style="display: none;">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="category"> Lama Angsuran (bulan) <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="jarak" name="jarak" class="form-control  col-md-7 col-xs-12" maxlength="2" onchange="lala()">
                         
                              </div>

                            </div>
                            <div class="form-group" id="hehe2" style="display: none;">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="category"> Banyak Angsuran <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="lamaangsuran" name="lamaangsuran" class="form-control  col-md-7 col-xs-12" maxlength="100" onchange="lala()">
                         
                              </div>

                            </div>
                            <div class="form-group" id="hehe3" style="display: none;">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="category"> Total per Angsuran <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="perangsuran" name="perangsuran" class="form-control  col-md-7 col-xs-12" maxlength="100" onchange="lala()" readonly>
                         
                              </div>

                            </div>
                          
                          <a class="btn btn-primary" href="<?= site_url('rumah/allhousing'); ?>"><i class="fa fa-fw fa-arrow-left"></i> Back</a>
                          <button type="submit" name="save" class="btn btn-success"> Save </button>
                          </form>
                          </div>
                      </div>
                    </div>
                  </div>
        <?php
          if($alert == "success"){
            echo "<script>success_sweet('Data is saved.','allhousing');</script>";
          }
          if($alert == "exist"){
            echo "<script>failed_sweet('The file is already exist.');</script>";
          }
          if($alert == "success_edit"){
            echo "<script>success_sweet('Data is updated.','allhousing');</script>";
          }
          if($alert == "too large"){
            echo "<script>failed_sweet('The file you are trying to upload is too large.');</script>";
          }
        ?>
  <script type="text/javascript">
    $(document).ready(function(){
    $("#level").change(function(){
    var value = $(this).val();
    if(value == "Pembayaran Tunai"){
      document.getElementById('dp').value = "";
      document.getElementById('jarak').value = "";
      document.getElementById('lamaangsuran').value = "";
      document.getElementById('perangsuran').value = "";
        $("#haha").fadeIn();
        $("#hehe1").fadeOut();
        $("#hehe2").fadeOut();
        $("#hehe3").fadeOut();
        $("#hehe").fadeOut();
    }else{

      document.getElementById('stats').value = "";
        $("#haha").fadeOut();
        $("#hehe1").fadeIn();
        $("#hehe2").fadeIn();
        $("#hehe3").fadeIn();
        $("#hehe").fadeIn();
    }
    });

    });
            var loadFile = function(event){
          var reader = new FileReader();
          reader.onload = function(){
            var output = document.getElementById('cphoto');
            var photo = document.getElementById('photo');
            var p = document.getElementById('p');
            output.src = reader.result;
            p.value = photo.value;
          };
          reader.readAsDataURL(event.target.files[0]);
        };
        function lala() {
          var pecel = document.getElementById('hrg_bayar').value;
          var martabak = document.getElementById('dp').value;
          var nasgor = document.getElementById('jarak').value;
          var telo = parseInt(pecel) - parseInt(martabak);
          var pindang = parseInt(nasgor) / 3;
          var pepes = parseInt(telo) / parseInt(pindang);
          if (!isNaN(pindang) && !isNaN(pepes)) {

          document.getElementById('lamaangsuran').value = pindang;
          document.getElementById('perangsuran').value = pepes;
          }
        }
  </script>
        <!-- /page content -->
