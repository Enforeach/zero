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
              $lala = substr($rumah->harga_jual, 0, 3);
              $harga = $lala." Juta";
            }
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
                            <td><?= $harga ?></td>
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
                        <table class="table">

                        </table>
                      </div>
                    </div>
                  </div>
                  <a class="btn btn-primary" href="<?= site_url('rumah/allhousing'); ?>"><i class="fa fa-fw fa-arrow-left"></i> Back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
        <!-- /page content -->
