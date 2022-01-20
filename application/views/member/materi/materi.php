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

                  <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Title</th>
                              <th>Category</th>
                              <th>Created At</th>
                              <th>Status</th>
                          </tr>
                      </thead>
                      <tbody> 
                      <?php $i=1; foreach($materi as $row) : ?>
                      <tr>
                        <td><?=$i?></td>
                        <td class="text-dark text-capitalize" ><?=$row['title']?></td>
                        <td>
                          <a href="#"><?=$row['category']?></a>
                        </td>
                        <td><?=date('d F Y',$row['date_created'])?></td>
                        <td>
                          <a href="<?=base_url('Member/viewMateri/').$row['id']?>" class="btn btn-primary">View</a>
                          <a href="#" class="btn btn-warning">Download</a>
                        </td>
                      </tr>
                      <?php $i++; endforeach;?>
                      </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>