
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
                <h4>Edit Vidio</h4>
              </div>
              <?php echo form_open_multipart(base_url('Administrator/editVidio/').$vidio['id_vidio'], 'class="form-horizontal"');  ?>
              <div class="card-body ">
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                  <div class="col-sm-12 col-md-6">
                    <input type="text" name="judul" class="form-control" value="<?=$vidio['judul']?>">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link</label>
                  <div class="col-sm-12 col-md-6">
                    <input type="text" name="link" class="form-control" value="<?=$vidio['link']?>">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                  <div class="col-sm-12 col-md-6">
                    <select name="status" class="form-control selectric" >
                    <?php if($vidio['status'] == '1'){?>
                      <option selected value="1">Publish</option>
                      <option value="0">Draft</option>
                    <?php }else if($vidio['status'] == '0'){ ?>
                      <option value="1">Publish</option>
                      <option selected value="0">Draft</option>
                    <?php }; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                  <div class="col-sm-12 col-md-6">
                    <input type="file" name="thumbnail" class="form-control" accept="image/*">
                    <small class="text-danger">*kosongkan jika tidak diubah</small>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-6">
                    <button type="submit" name="submit" class="btn btn-primary">Done</button>
                  </div>
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
