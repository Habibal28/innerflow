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
                <h4>Change Event</h4>
              </div>
              <form action="<?=base_url('Administrator/editEvent/').$event[0]['id']?>" method="post">
              <div class="card-body">
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-12 col-lg-12">Title</label>
                  <div class="col-sm-12 col-md-12">
                    <input type="text" name="title" value="<?=$event[0]['title']?>" class="form-control">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-12 col-lg-12">Category</label>
                  <div class="col-sm-12 col-md-12">
                    <select name="category" class="form-control selectric">
                      <?php $category = ($event[0]['category']=='Trading')?'selected':''?>
                      <?php $category = ($event[0]['category']=='Cryptocurrency')?'selected':''?>
                      <option <?=$category?>>Trading</option>
                      <option <?=$category?>>Cryptocurrency</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-12 col-lg-12">Status</label>
                  <div class="col-sm-12 col-md-12">
                    <select name="status" class="form-control selectric">
                      <?php $status = ($event[0]['status']== 1)?'selected':''?>
                      <?php $status = ($event[0]['status']== 0)?'selected':''?>
                      <option <?=$status?> value="1">Publish</option>
                      <option <?=$status?> value="0">Draft</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-12 col-lg-12">Content</label>
                  <div class="col-sm-12 col-md-12">
                    <textarea name="content" id="content" class="summernote-simple w-100"><?=$event[0]['content']?></textarea>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-12 col-lg-12"></label>
                  <div class="col-sm-12 col-md-12">
                    <button type="submit" name="submit" class="btn btn-primary">Done</button>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <script>
        CKEDITOR.replace('content');
      </script>