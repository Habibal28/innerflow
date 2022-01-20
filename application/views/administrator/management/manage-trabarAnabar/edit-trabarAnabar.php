<script src="<?=base_url('assets/ckeditor/ckeditor.js')?>"></script>
<!-- Main Content -->
      <div class="main-content">
   <section class="section">
     <div class="section-header">
       <h1><?=$title?></h1>
       <div class="section-header-breadcrumb">
         <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
         <div class="breadcrumb-item"><a href="#">Forms</a></div>
         <div class="breadcrumb-item">Editor</div>
       </div>
     </div
       <div class="section-body">
        <h2 class="section-title">Editor</h2>
        <div class="row">
          <div class="col-12 float-left">
            <div class="card">
              <div class="card-header">
                <h4>Change Trabar & Anabar</h4>
              </div>
              <?php echo form_open_multipart(base_url('Administrator/editTrabarAnabar/').$trabarAnabar['id_trabarAnabar'], 'class="form-horizontal"');?>
              <div class="card-body">
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-12 col-lg-12">Title</label>
                  <div class="col-sm-12 col-md-12">
                    <input type="text" name="title" value="<?=$trabarAnabar['title']?>" class="form-control">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-12 col-lg-12">Description</label>
                  <div class="col-sm-12 col-md-12">
                    <input type="text" name="Description" value="<?=$trabarAnabar['description']?>" class="form-control">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-12 col-lg-12">Status</label>
                  <div class="col-sm-12 col-md-12">
                    <select name="status" class="form-control selectric">
                      <?php $status = ($trabarAnabar['status']== 1)?'selected':''?>
                      <?php $status = ($trabarAnabar['status']== 0)?'selected':''?>
                      <option <?=$status?> value="1">Publish</option>
                      <option <?=$status?> value="0">Draft</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Thumbnails</label>
                  <div class="col-sm-12 col-md-12">
                    <input type="file" name="thumbnail" class="form-control" accept="image/*">
                    <small class="text-danger">*kosongkan jika tidak diganti</small>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-12 col-lg-12">Content</label>
                  <div class="col-sm-12 col-md-12">
                    <textarea name="content" id="content" class="summernote-simple w-100"><?=$trabarAnabar['content']?></textarea>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-12 col-lg-12"></label>
                  <div class="col-sm-12 col-md-12">
                    <button type="submit" name="submit" class="btn btn-primary">Done</button>
                  </div>
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>

      <script>
        CKEDITOR.replace('content');
      </script>