<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?=$title?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">All Posts</div>
            </div>
          </div>
          <div class="section-body">

            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Posts</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                            <th>thumbnail</th>
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($vidio as $row) : ?>
                          <?php if($row['status']==1): ?>
                        <tr>
                          <td>
                              <img src="<?=base_url('assets/img/vidio-thumbnail/').$row['thumbnail']?>" class="rounded mb-2" width="200px">
                          </td>
                          <td class="text-dark text-capitalize" ><?=$row['judul']?></td>
                          <td><?=date('d F Y',$row['date_created'])?></td>
                          <td>
                            <a href="<?=$row['link']?>" target="_blank" class="btn btn-primary">Go to link</a>
                          </td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>