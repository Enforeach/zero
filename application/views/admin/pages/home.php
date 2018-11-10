
<div class="container text-center" style="margin-top: 80px">    
  <div class="row">
    <div class="col-sm-3 well">
      <div class="well well" style="padding: 15px 10px 10px 10px;">
        <!-- <h4 style="font-family: times"><a href="#">My Profile</a></h4> -->
        <div class="col-sm-12">
          <div class="col-sm-5">
            <img src="<?= site_url('assets2/Images/' .$pict) ?>" style="margin-left: -40px;" class="img-circle" height="60" width="60" alt="Avatar">
          </div>
          <div class="col-sm-2">
            <!-- SPACE -->
          </div>
          <div class="col-sm-4">
            <h4
            style="text-align: left; 
            margin-left: -60px; 
            margin-top: 5px;">
            <a style="text-decoration: none; 
            font-weight: 900;
            cursor: pointer;">
            <?= $nama ?>
          </a>
        </h4>
        <p style="font-family: arial; 
        cursor:pointer; 
        font-size: 11px; 
        text-align: left; 
        margin-left: -60px; 
        margin-top: -10px;">
        Status : Aktif
      </p>
      <p style="font-family: arial; 
      cursor:pointer; 
      font-size: 11px; 
      text-align: left; 
      margin-left: -60px; 
      margin-top: -10px; 
      margin-bottom: 20px;">
      <b>Lihat Profil</b>
    </p>
    <button type="button" style="margin-left: -100px; margin-top: -10px; margin-bottom: 5px;" class="btn btn-default btn-sm">
      <span class="glyphicon glyphicon-thumbs-up"></span> Like
    </button>
  </div>
</div>
<div class="row">

</div>
        <!-- <div class="panel-default text-left">
          <div class="panel-body">
            <p> <center> <b>  Status : </b></center></p>
            <center><p contenteditable="true" style="background-color: rgba(200, 200, 200, .2); border-radius: 5px;">Ojo bosen ngelu :v</p></center>
            <center> <button type="button" class="btn btn-default btn-sm">
              <span class="glyphicon glyphicon-thumbs-up"></span> Like
            </button>   </center>   
          </div>
        </div> -->
      </div>


      <div class="well well2">
        <button class="accordion"><b><h5>&nbsp;<i class="glyphicon glyphicon-list-alt"></i> My Article</h5></b></button>
        <div class="panel">
          <p> Tidak Ada Artikel </p>
        </div>

        <button class="accordion"><b><h5>&nbsp;<i class="glyphicon glyphicon-list-alt"></i> Kategori</h5></b></button>
        <div class="panel">
          <ul>
            <li><a href="#">Story and Poems</a></li>
            <li> <a href="#" data-target="#Teknologi">Teknologi</a> </li>
            <li><a href="#">Jokes</a></li>
            <li> <a href="#">Knowledge</a></li>
          </ul>




        </div>

        <button class="accordion"><b><h5>&nbsp;<i class="glyphicon glyphicon-upload"></i> My Post</h5></b></button>
        <div class="panel">
          <p>Lorem ipsum...</p>
        </div>
      </div>
      <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Oi!</strong></p>
        Mau digoleki arek le!!!
      </div>
      <nav class="menu menu--adsila">
       <a class="menu__item" href="#">
        <span class="menu__item-name">FPost</span>
        <span class="menu__item-label">Explore all Friend's New Post</span>
      </a>
      <a class="menu__item" href="#">
        <span class="menu__item-name">Hpost</span>
        <span class="menu__item-label">Discover the Hot Post</span>
      </a>
      <a class="menu__item" href="#">
        <span class="menu__item-name">Schedule</span>
        <span class="menu__item-label">View your event schedule</span>
      </a>
      <a class="menu__item" href="#">
        <span class="menu__item-name">Alert</span>
        <span class="menu__item-label">View Comments or Message</span>
      </a>
    </nav>
  </div>
  <div class="col-sm-6">

    <div class="row">
      <div class="col-sm-12" style="border-radius: 10px;">
        <h1 class="title"><i class="glyphicon glyphicon-fire"></i> New Article </h1>
      </div>
    </div>

    <?php foreach ($data as $art) { ?>

    
    <div class="row" style="margin-top: 10px;">
      <div class="col-sm-12">
        <!-- Article-Content -->
        <div class="article-content">
          <!-- Profile-Picture -->
          <div class="profile-chat">
            <div class="profile-chat-detail">
              <a href="#"><img src="<?= site_url('assets2/Images/' . $art->pict) ?>" height="50" width="50"><p>More</p></a>
            </div>
          </div>
          <!-- Profile-Name -->
          <div>
            <h5 class="profile-name">Cahki Nyapo</h5>
          </div>
          <!-- Profile-Grade -->
          <div>
            <h5 class="profile-grade">Newbie</h5>
          </div>
          <!-- Article-More -->
          <div class="article-more">
            <i class="glyphicon glyphicon-option-horizontal"></i>
          </div>
          <div>
            <img class="article-img" style="width: 100%" src="<?= site_url('assets2/Images/article/'. $art->cover) ?>" alt="Paris">
          </div>
          <!-- Title Chat -->
          <div class="title-chat">
            <h5><b><a style="text-decoration: none; color: black;" href="<?= site_url('article/article_read/'.$art->idarticle.'/1') ?>"><?= $art->judul ?></a></b></h5>
          </div>
          <!-- Line -->
          <div class="line"></div>
          <div class="pull-left">
            <!-- Tanggal -->
            <td>
              <i class="glyphicon glyphicon-calendar"></i> 03-11-2019
            </td>
            <!-- Viewers -->
            <td>
              <i class="glyphicon glyphicon-eye-open"></i> 3.5K
            </td>
          </div>
          <!-- Comment -->
          <div class="pull-right">
            <a class="comment" style="text-decoration: none; color: black;" href="<?= site_url('article/article_read/'.$art->idarticle) ?>">
              <i class="glyphicon glyphicon-comment"></i> Comment
            </a>
          </div>
        </div>
      </div>
    </div>

    <?php } ?>

    <div class="row">
      <div class="col-sm-12" style="border-radius: 10px;">
        <?php echo $pagination; ?>
      </div>
    </div>
  </div>
  <div class="col-sm-3 well">
    <div class="thumbnail" style="background-color: #2f4f4f">
      <p>Upcoming Events:</p>
      <img src="Images/lala.JPEG" alt="Paris" width="400" height="300">
      <p><strong>HALAN HALAN</strong></p>
      <p>Fri. 27 November 2015</p>
      <button class="btn btn-primary">Info</button>
    </div>      
    <div class="well well2">
      <div class="card">
        <img src="Images/Chelsea-Islan-1.jpg" alt="John" style="width:70%">
        <h3>lala</h3>
        <p class="title">CEO & Founder, Example</p>
        <p>Harvard University</p>
        <div style="margin: 24px 0;">
          <a href="#"><i class="fa fa-dribbble" style="color: #8de6c9"></i></a> 
          <a href="#"><i class="fa fa-twitter" style="color: #8de6c9"></i></a>  
          <a href="#"><i class="fa fa-linkedin" style="color: #8de6c9"></i></a>  
          <a href="#"><i class="fa fa-facebook" style="color: #8de6c9"></i></a> 
        </div>
        <p><button class="wkwk" style="color: #8de6c9">Follow</button></p>
      </div>
    </div>
    <div class="well well2">
      <div class="card">
        <img src="Images/Melalui-Sepucuk-Surat-Nabilah-JKT48-Umumkan-Kelulusannya-Dari-Grup-768x512.jpg" alt="John" style="width:70%">
        <h3>lala</h3>
        <p class="title">CEO & Founder, Example</p>
        <p>Harvard University</p>
        <div style="margin: 24px 0;">
          <a href="#"><i class="fa fa-dribbble" style="color: #8de6c9"></i></a> 
          <a href="#"><i class="fa fa-twitter" style="color: #8de6c9"></i></a>  
          <a href="#"><i class="fa fa-linkedin" style="color: #8de6c9"></i></a>  
          <a href="#"><i class="fa fa-facebook" style="color: #8de6c9"></i></a> 
        </div>
        <p><button class="wkwk" style="color: #8de6c9">Follow</button></p>
      </div>
    </div>
  </div>
</div>
</div>

