<div class="container text-center" style="margin-top: 80px">    
  <div class="row">

    <div class="col-sm-12">
      <div class="well">
        <div class="row">
          <div class="well">
            <h1>Buat Artikel</h1>
          </div>
        </div>
        <div class="row">
          <div class="well">
            <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title">Title <span class="required">*</span></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" name="title" required="required" class="form-control col-md-7 col-xs-12" placeholder="Judul" maxlength="255" autofocus>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="cover">Category</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text"  name="category" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="cover">Cover Artikel</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="file" accept="image/*" name="cover" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="content">Content <span class="required">*</span></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <textarea name="content" required class="form-control" id="mytextarea" rows="8" cols="40"></textarea>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                  <a href="<?= site_url('admin'); ?>" name="cancel" class="btn btn-primary" role="button">Cancel</a>
                  <button type="submit" name="save" class="btn btn-success">Post</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<script src="<?= site_url('assets2/js/ckeditor/ckeditor.js'); ?>"></script>
<script type="text/javascript">

  CKEDITOR.replace( 'mytextarea' );
  CKEDITOR.config.height = 700;

  

</script>