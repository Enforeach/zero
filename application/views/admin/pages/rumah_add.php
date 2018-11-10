        <?php
          if ($edit) {
              $title = 'Rumah Edit';
              $ftitle = 'Form Edit';
              $readonly = 'readonly';
              $required = '';
              $blok = $rumah->blok;
              $kamar = $rumah->kamar;
              $photo = $rumah->pictures;
              $luas = $rumah->luas;
              $pemilik = $rumah->pemilik;
              $status = $rumah->status;
              $hrg_tanah = $rumah->hrg_tanah;
              $hrg_bangunan = $rumah->hrg_bangunan;
              $tot_p = $rumah->total_bangun;
              $tot_j = $rumah->harga_jual;
              $lele = intval($tot_j) - (intval($hrg_bangunan) + intval($hrg_tanah));
              $wader =  ($tot_j - $tot_p) / $tot_p * 100 ;
              $submit = 'Edit';
            
          }else{
            $title = 'Rumah Add';
            $ftitle = 'Form Add';
            $readonly = '';
            $required = 'required';
            $submit = 'Add';
            $blok = '';
            $photo = '';
             $kamar = '';
             $photo = '';
             $luas = '';
             $blok = '';
             $pemilik = '';
             $status = '';
             $hrg_tanah = '';
             $hrg_bangunan = '';
             $tot_p = '';
             $tot_j = '';
             $wader = '';
             $lele ='';
          }
        ?>
        <!-- page content -->
<div class="page-wrapper">
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row" style="min-height: 1500px;">
            <div class="page-title">
              <div class="title_left">
                <h3>Rumah</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= $ftitle; ?> <small>Rumah</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link pull-right"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Blok <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="blok" name="blok" required="required" class="form-control col-md-7 col-xs-12" value="<?= $blok; ?>" maxlength="100">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">Pictures <?php if(!$edit){ echo "<span class='required'>*</span>"; } ?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php if (!$edit) { ?>
                          <img class="avatar-view" id="cphoto" src="<?= site_url('images/No-image-available.jpg'); ?>" alt="profil-img" width="226" height="226">
                          <?php } else { ?>
                          <img class="avatar-view" id="cphoto" src="<?= site_url('images/rumah/'.$photo); ?>" alt="profil-img" width="226" height="226"> 

                          <?php } ?>
                          <input type="file" id="photo" onchange="loadFile(event)" accept="image/*" name="photo" <?= $required; ?> class="form-control col-md-7 col-xs-12" value="<?= $photo ?>">
                        </div>
                      </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Kamar <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="kamar" name="kamar" required="required" class="form-control col-md-7 col-xs-12" value="<?= $kamar; ?>">
                        </div>
                      </div>             
                      <?php if ($edit) { if (!empty($pemilik)) { ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Pemilik <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="pemilik" name="pemilik" required="required" class="form-control col-md-7 col-xs-12" value="<?= $pemilik; ?>">
                        </div>
                      </div>
                      
                        
                      <?php }} ?>

                      <div class="form-group">
                        <?php if ($edit) { ?> 
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="luas">Harga Tanah <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="hrg_tanah" name="hrg_tanah" required="required" class="form-control col-md-7 col-xs-12" value="<?= $hrg_tanah ?>" <?php if($edit) { echo "onchange='hoho()'"; } ?> maxlength="100">
                        </div>

                        <?php }else { ?>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="luas">Harga Tanah <span class="required">*</span></label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                          <input type="text" id="luas" name="luas" required="required" onchange="lala()" class="form-control col-md-7 col-xs-12" value="<?= $luas; ?>" maxlength="100" placeholder="Luas">
                        </div>
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" style="margin-left: -52px; margin-right: 7px;"> X </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="m2" name="m2" required="required" class="form-control col-md-7 col-xs-12" value="" maxlength="100" placeholder="Harga per m²" onchange="lala()">
                        </div>
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" style="margin-left: -50px; margin-right: 5px;"> = </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="hrg_tanah" name="hrg_tanah" required="required" class="form-control col-md-7 col-xs-12" value="<?= $hrg_tanah ?>" maxlength="100" readonly>
                        </div>
                        <?php } ?>

                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Harga Bangunan <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="hrg_bangunan" name="hrg_bangunan" required="required" class="form-control col-md-7 col-xs-12" value="<?= $hrg_bangunan ?>" maxlength="100" <?php if(!$edit) { ?> onchange="lala()" <?php }else { ?> onchange="hoho()" <?php } ?>>
                        </div>
                      </div>
                      <?php if (!$edit) { ?>
                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Total Pengeluaran <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="tot_p" name="tot_p" required="required" class="form-control col-md-7 col-xs-12" value="" maxlength="100" value="<?= $tot_p ?>" readonly>
                        </div>
                      </div> 
                      <?php } ?>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Keuntungan % atau Rupiah <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="untung" name="untung" required="required" <?php if($edit) { ?> value="<?= $wader ?>% atau <?= $lele ?>" <?php } ?> class="form-control col-md-7 col-xs-12" <?php if(!$edit) { echo "onchange='lala()'"; }else { echo "onchange='haha()'"; } ?> >
                        </div>
                      </div>                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Total Jual<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="tot_j" name="tot_j" required="required" class="form-control col-md-7 col-xs-12" value="<?= $tot_j ?>" <?php if($edit) { echo "onchange='popok()'"; } ?>>
                        <input type="hidden" id="pem" name="pem" class="form-control col-md-7 col-xs-12" value="" maxlength="100">
                        </div>
                      </div>
                      <!-- Period -->

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                         <a href="<?= site_url('rumah/allhousing'); ?>" name="cancel" class="btn btn-primary" role="button">Cancel</a>
                      
                          <button type="submit" name="save" class="btn btn-success"><?= $submit; ?></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- /page content -->
        <?php
          if($alert == "success"){
            echo "<script>success_sweet('Data is saved.','rumah_add');</script>";
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
          var haha = document.getElementById('luas').value;
          var hihi = document.getElementById('m2').value;
          var lala = haha*hihi;
          document.getElementById('hrg_tanah').value = lala;
          var lolo = document.getElementById('hrg_bangunan').value;
          var lili = parseInt(lolo) + parseInt(lala);
          if (isNaN(lili)) {
              document.getElementById('tot_p').value="";
          }else {
              document.getElementById('tot_p').value=lili;
          }
          var telo = document.getElementById('untung').value;

          if (telo.length <= 4) {
            if(telo.substr(-1) == "%") {
                telo = telo.slice(0, -1);
            }
            telo = ((parseInt(telo) * parseInt(lili)) / 100) + parseInt(lili);
          }else {
            telo = parseInt(telo) + parseInt(lili);
          }
          document.getElementById('tot_j').value = telo;

          
        }
        function hoho() {
          var haha = document.getElementById('hrg_tanah').value;
          var hihi = document.getElementById('hrg_bangunan').value;
          var pem = parseInt(haha) + parseInt(hihi);
          document.getElementById('pem').value = pem;
          document.getElementById('untung').value = "";
          document.getElementById('tot_j').value = "";
        }
        function haha() {
          var telo = document.getElementById('untung').value;
          var hihi = document.getElementById('hrg_bangunan').value;
          var hehe = document.getElementById('hrg_tanah').value;
          var lili =  parseInt(hihi) + parseInt(hehe);

          if (telo.length <= 4) {
            if(telo.substr(-1) == "%") {
                telo = telo.slice(0, -1);
            }
            telo = ((parseInt(telo) * parseInt(lili)) / 100) + parseInt(lili);
          }else {
            telo = parseInt(telo) + parseInt(lili);
          }
          document.getElementById('tot_j').value = telo;
        }        
        function popok() {
          var haha = document.getElementById('tot_j').value;
          var hihi = document.getElementById('hrg_bangunan').value;
          var hehe = document.getElementById('hrg_tanah').value;
          var lele = parseInt(haha) - (parseInt(hihi) + parseInt(hehe));
          document.getElementById('untung').value = lele;
        }
        </script>