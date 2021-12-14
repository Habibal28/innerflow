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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>New Event</h4>
              </div>
              <?php echo form_open_multipart(base_url('Administrator/addEvent/'), 'class="form-horizontal"');  ?>
              <div class="card-body float-left">
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Title</label>
                  <div class="col-sm-12 col-md-12">
                    <input type="text" name="title" class="form-control">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Description</label>
                  <div class="col-sm-12 col-md-12">
                    <input type="text" name="Description" class="form-control">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Category</label>
                  <div class="col-sm-12 col-md-12">
                    <select name="category" class="form-control selectric">
                      <option>Trading</option>
                      <option>Cryptocurrency</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Status</label>
                  <div class="col-sm-12 col-md-12">
                    <select name="status" class="form-control selectric">
                      <option value="1">Publish</option>
                      <option value="0">Draft</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Thumbnails</label>
                  <div class="col-sm-12 col-md-12">
                    <input type="file" name="image" class="form-control">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Content</label>
                  <div class="col-sm-12 col-md-12">
                    <textarea name="content" id="content" class="summernote-simple w-100"></textarea>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3"></label>
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
        CKEDITOR.replace( 'content' );
      </script>