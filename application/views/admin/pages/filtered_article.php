<div class="container text-center" style="margin-top: 80px">    
  <div class="row">

    <div class="col-sm-9">

      <div class="row">
        <div class="col-sm-12" style="border-radius: 10px;">
          <h1 class="sempel-1"> <?= $article->judul ?> </h1>
        </div>
      </div>

      <div class="row" style="margin-top: 10px;">
        <div class="col-sm-3" style="margin-top: 10px;">
          <ul class="gallery">
            <li>
              <a href="">
                <img src="<?= site_url('assets2/Images/' . $article->pict) ?>" height="70" width="70" alt="Avatar">
                <a href="#">
                  <p><?= $article->nama ?></p>
                </a>
              </a>
            </li>
          </ul>
          <i style="margin-left: 20px;" class="fa fa-user"> Senior</i>
        </div>
        <div class="col-sm-9">
          <div class="wellchat">
            <a href="#" style="text-decoration: none;">

            </a>
            <p class=""> 
              <img src="<?= site_url('assets2/Images/article/' . $article->cover) ?>" style="width: 100%">
              <br>
              <?= $article->isi ?></p>
              <div class="pull-left">
                <i class="fa fa-calendar"> <?= $article->date ?></i>
              </div>
              <div class="pull-right">
                <a class="like" style="text-decoration: none;" href="">
                  <i class="glyphicon glyphicon-thumbs-up"></i> Like
                </a>&nbsp;&nbsp;&nbsp;
                <a class="komen" style="text-decoration: none;" href="">
                  <i class="glyphicon glyphicon-comment"></i> Comment
                </a>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-sm-12">
            <p class="sret"></p>
            <p class="sret"></p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3" style="margin-top: 10px;">
            <ul class="gallery">
              <li>
                <a href="">
                  <img src="<?= site_url('assets2/Images/' . $pict) ?>" height="70" width="70" alt="Avatar">
                  <a href="#">
                    <p><?= $nama ?></p>
                  </a>
                </a>
              </li>
            </ul>
            <i style="margin-left: 20px;" class="fa fa-user"> Senior</i>

          </div>

          <div class="col-md-9">
            <form class="form-horizontal form-label-left">

              <div class="form-group">

                <div class="col-md-12 col-sm-6 col-xs-12">
                  <input type="hidden" name="idarticle" id="idarticle" value="<?= $id ?>">
                  <input type="hidden" name="username" id="username" value="<?= $username ?>">
                  <textarea style="width: 100%; height: 150px;" id="chat" name="chat" placeholder="Tulis Komentar...."></textarea>
                </div>
              </div>

              <div class="row">

                <div class="col-md-12 col-sm-6 col-xs-12">
                  <button type="button" type="submit" id="save" class="btn btn-primary">Save</button>
                </div>

              </div>
            </form>
          </div>
        </div>
        <br>


        <div id="show_data">




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
          <div class="well"><h4>Artikel Terkait</h4></div>
          <ul>
            <li><a href="">Cara Berubah Menjadi Super Saiya!!!</a></li>
            <li><a href="">Top 10 karakter ter-KAWAII</a></li>
            <li><a href="">10 Provinsi di Planet Lain</a></li>
          </ul>
        </div>

      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo site_url('assets/js/jquery-3.2.1.js') ?>"></script>
  <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.dataTables.js') ?>"></script>
  <script type="text/javascript">

    $(document).ready(function(){


    show_product(); //call function show all product


    function show_product(){

      $.ajax({
        type  : 'ajax',
        url   : '<?php echo site_url('article/comment/'.$id); ?>',
        async : false,
        dataType : 'json',
        success : function(data){
          var html = '';
          var i;
          for(i=0; i<data.lala.length; i++){
            
            html += '<div class="row"><div class="col-sm-12"><p class="sret"></p><p class="sret"></p></div></div>'+
            '<div class="row"><div class="col-sm-3" style="margin-top: 10px;"><ul class="gallery"><li><a href=""><img src="<?= base_url().'assets2/Images/'. ""?>'+data.lala[i].pict+'" height="70" width="70" alt="Avatar"><a href="#"><p>'+data.lala[i].nama+'</p></a></a></li></ul><i style="margin-left: 20px;" class="fa fa-user">'+data.lala[i].status+'</i></div><div class="col-sm-9"><div class="well">'+data.lala[i].chat+'<br><div class="pull-left"><i class="fa fa-calendar">'+data.lala[i].date+'</i></div><div class="pull-right"><a class="like" style="text-decoration: none;" href=""><i class="glyphicon glyphicon-thumbs-up"></i> Like</a>&nbsp;&nbsp;&nbsp;<a class="komen" style="text-decoration: none;" href=""><i class="glyphicon glyphicon-comment"></i> Comment</a></div></div></div></div>';
          }
          html += ''+data.pagination+'';
          $('#show_data').html(html);
        }

      });
    }

    $('#save').on('click',function(){
      var idarticle = $('#idarticle').val();
      var username = $('#username').val();
      var chat        = $('#chat').val();
      $.ajax({
        type : "POST",
        url  : "<?php echo site_url('article/save')?>",
        dataType : "JSON",
        data : {idarticle:idarticle , username:username, chat:chat},
        error: function(data){
          $('[name="chat"]').val("");
          show_product();
        }
      });
      return false;
    });

  });
</script>