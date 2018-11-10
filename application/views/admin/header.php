<p id="back-top">
  <a href="#top"><span style=" background: #ddd url('../assets2/arrow_up.png') no-repeat center center;"></span></a>
</p>
<body>
  <!-- <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-angle-up"></i></button>  -->
  
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand navbar-default" href="#" ><center>FAP</center></a>
      </div>

      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="<?= site_url('admin'); ?>" class="button"><span><i class="glyphicon glyphicon-home"></i> Home</span></a></li>
          <li><a href="message.html" class="button"><span><i class="glyphicon glyphicon-envelope"></i> Message</span></a></li>

        </ul>

        <form class="navbar-form navbar-right" role="search">
          <div class="form-group input-group">
            <input type="text" class="form-control" placeholder="Search..">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>        
          </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" class="btn btn-demo" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
          <li><a href="<?= site_url('post/add'); ?>" class="btn btn-demo"><span class="glyphicon glyphicon-user"></span> Buat Post</a></li>
          <li><a href="<?= site_url('admin/logout'); ?>" class="btn btn-demo"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>

      <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title" id="myModalLabel2" style="font-family: Algerian"><center>PROFILE</center></h3>
            </div>

            <div class="container-fluid">
              <div class="row profile">
                <div class="col-lg-13">
                  <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                      <img src="Images/IMG_20171105_083225.jpg" class="img-responsive" alt="Avatar">

                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                      <div class="profile-usertitle-name">
                        Alf
                      </div>
                      <div class="profile-usertitle-job">
                        Developer
                      </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                      <button type="button" class="btn btn-success btn-sm">Follow</button>
                      <button type="button" class="btn btn-danger btn-sm">Message</button>
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                      <ul class="nav">
                        <li class="active">
                          <a href="#">
                            <i class="glyphicon glyphicon-home"></i>
                          Overview </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="glyphicon glyphicon-user"></i>
                          Account Settings </a>
                        </li>
                        <li>
                          <a href="#" target="_blank">
                            <i class="glyphicon glyphicon-ok"></i>
                          Tasks </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="glyphicon glyphicon-flag"></i>
                          Help </a>
                        </li>
                      </ul>
                    </div>
                    <!-- END MENU -->
                  </div>
                </div>

              </div>
            </div>

          </div><!-- modal-content -->
        </div><!-- modal-dialog -->
      </div><!-- modal -->
    </div><!-- /.container-fluid -->

  </div>
</nav>
