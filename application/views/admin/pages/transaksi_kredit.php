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
                    <h2>List Rumah</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <?php if($level == 1){ ?>
                        <a href="<?= site_url('admin/rumah_add'); ?>" class="btn btn-primary">Add <i class="fa fa-fw fa-plus"></i></a>
                      <?php } ?>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <div class="table-responsive">
                      <table class="table table-striped datatable-ku" data-func="transaksi" data-meth="transaksi_kredit_datatable">
                        <thead>
                          <tr>
                            <th>Bukti Jual</th><img src="">
                            <th>Id Rumah</th>
                            <th>Blok</th>
                            <th>Rumah</th>
                            <th>Pembayaran</th>
                            <th>Pembeli</th>
                            <th>Identitas</th>
                            <th>Status</th>
                            <th>Total Bayarr</th>                       
                            <?php if($level == 1){ ?>
                              <th width="80">Action</th>
                            <?php } ?>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <script>delete_sweet_dtt(".btn-deleterumah", "allhousing");</script>
