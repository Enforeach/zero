        <!-- page content -->
        <div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Profile</h3>
              </div>

              <div class="title_right">
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row" style="min-height: 1500px;">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Profile</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                      <div class="profile_img">

                        <!-- end of image cropping -->
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <?php
                            $pp = $profile->photo;
                            if($pp == null){
                              if($gender == 1){
                                $pp = "malepp3781.jpg";
                              }else{
                                $pp = "femalepp3781.jpg";
                              }
                            }
                          ?>
                          <img class="avatar-view" data-toggle="modal" data-target="#avatar-modal" src="<?= site_url('images/profile/'.$pp); ?>" alt="Avatar" title="click to change profile picture" width="226" height="226">
                        </div>
                        <!-- end of image cropping -->

                      </div>
                      <h3><?= $nmuser; ?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-user user-profile-icon"></i> @ <?= $username; ?>
                        </li>
                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> <?php if($level == 1){ echo "Document Control"; }else{ echo "Administrator"; }?>
                        </li>
                      </ul>
                      <br>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>User Setting</h2>
                        </div>
                        <div class="col-md-6">
                          <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span><?= date("Y-m-d"); ?></span>
                          </div>
                        </div>
                      </div>
                      <br><br>
                      <div class="col-md-12">
                        <div class="row">
                          <table class="table">
                            <tr>
                              <td><strong>Name</strong></td>
                              <td><?= $nmuser; ?></td>
                              <td width="100"><button type="button" data-toggle="modal" data-target="#cname-modal" class="btn-xs btn-success" name="btneditnm"><i class="fa fa-fw fa-edit"></i> Edit</button></td>
                            </tr>
                            <tr>
                              <td><strong>Username</strong></td>
                              <td><?= $username; ?></td>
                              <td width="100"><button type="button" data-toggle="modal" data-target="#cuname-modal" class="btn-xs btn-success" name="btneditunm"><i class="fa fa-fw fa-edit"></i> Edit</button></td>
                            </tr>
                            <tr>
                              <td><strong>Password</strong></td>
                              <td>
                                <?php if($profile->lc != NULL){ ?>
                                  <i>Last modified on <?= $profile->lc; ?></i>
                                <?php }else{ ?>
                                  <i>Never be modified</i>
                                <?php } ?>
                              </td>
                              <td width="100"><button type="button" data-toggle="modal" data-target="#cpass-modal" class="btn-xs btn-success" name="btneditnm"><i class="fa fa-fw fa-edit"></i> Edit</button></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <!-- Modal -->
        <div id="avatar-modal" class="modal fade" role="dialog">
          <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Change Profile Picture</h4>
                </div>
                <div class="modal-body">
                  <center>
                    <img class="avatar-view" id="cphoto" src="<?= site_url('images/profile/'.$pp); ?>" alt="profil-img" width="226" height="226">
                  </center>
                  <br>
                  <div class="form-group">
                    <div class="col-md-12">
                      <input type="hidden" name="p" id="p">
                      <input type="file" id="photo" class="form-control" onchange="loadFile(event)" accept="image/*" name="photo" required>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-group">
                    <div class="pull-right">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
                    </div>
                    <div class="pull-right">
                      <button type="submit" class="btn btn-success">Save Change</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div id="cname-modal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <form class="form-horizontal" role="form" method="post">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Change Name</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label sr-only" for="newnm">New Name</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control" name="newnm" placeholder="Enter New Name" required autofocus>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-group">
                    <div class="pull-right">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
                    </div>
                    <div class="pull-right">
                      <button type="submit" class="btn btn-success">Save Change</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div id="cuname-modal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <form class="form-horizontal" role="form" method="post">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Change Username</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label sr-only" for="newunm">New Username</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control" name="newunm" placeholder="Enter New Username" required autofocus>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-group">
                    <div class="pull-right">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
                    </div>
                    <div class="pull-right">
                      <button type="submit" class="btn btn-success">Save Change</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div id="cpass-modal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <form class="form-horizontal" role="form" method="post">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Change Password</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label sr-only" for="currentpass">Current Password</label>
                    <div class="col-md-12">
                      <input type="password" name="currentpass" class="form-control" placeholder="Enter Current Password" required autofocus/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label sr-only" for="newpass">New Password</label>
                    <div class="col-md-12">
                      <input type="password" id="newpass" name="newpass" class="form-control" placeholder="Enter New Password" required/>
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label class="col-md-3 control-label sr-only" for="confirmpass">Confirm Password</label>
                    <div class="col-md-12">
                      <input type="password" name="confirmpass" class="form-control" placeholder="Enter Confirm Password" required/>
                    </div>
                  </div> -->
                  <div class="form-group has-feedback div-confirmpass">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12 sr-only" for="confirmpass">Confirm Password <span class="required">*</span></label>
                    <div class="col-md-12">
                      <input type="password" class="form-control" id="confirmpass" name="confirmpass" required="required" placeholder="Enter Confirm Password">
                      <span class="glyphicon glyphicon-ok form-control-feedback span-ok" style="display:none;"></span>
                      <span class="glyphicon glyphicon-remove form-control-feedback span-er" style="display:none;"></span>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-group">
                    <div class="pull-right">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
                    </div>
                    <div class="pull-right">
                      <button type="submit" class="btn btn-success">Save Change</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <script>
        $(document).ready(function(){
          $("[data-toggle='tooltip']").mouseover(function(){
            alert('a');
          });
          $("#confirmpass").keyup(function(){
            var newpass = $("#newpass").val();
            var confirmpass = $(this).val();
            if(confirmpass === ""){
              $(".div-confirmpass").removeClass('has-success');
              $(".div-confirmpass").removeClass('has-error');
              $(".span-ok").hide();
              $(".span-er").hide();
            }else if(confirmpass === newpass){
              $(".div-confirmpass").addClass('has-success');
              $(".div-confirmpass").removeClass('has-error');
              $(".span-ok").show();
              $(".span-er").hide();
            }else{
              $(".div-confirmpass").removeClass('has-success');
              $(".div-confirmpass").addClass('has-error');
              $(".span-ok").hide();
              $(".span-er").show();
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
        </script>
        <?php
          if($alert == "success_change_photo"){
            echo "<script>success_sweet('Profile photo change successfully.','$iduser');</script>";
          }
          if($alert == "success_change_name"){
            echo "<script>success_sweet('Name change successfully.','$iduser');</script>";
          }
          if($alert == "success_change_username"){
            echo "<script>success_sweet('Username change successfully.','$iduser');</script>";
          }
          if($alert == "success_change_password"){
            echo "<script>success_sweet('Password change successfully.','$iduser');</script>";
          }
          if($alert == "wrong"){
            echo "<script>failed_sweet('Password wrong!','$iduser');</script>";
          }
          if($alert == "not_match"){
            echo "<script>failed_sweet('Password is not match!','$iduser');</script>";
          }
        ?>
