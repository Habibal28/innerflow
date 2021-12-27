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
                      <table class="table table-striped">
                        <tr>
                          <th>thumbnail</th>
                          <th>Title</th>
                          <th>Created At</th>
                          <th>Action</th>
                        </tr>
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
                    <div class="float-right">
                      <nav>
                        <ul class="pagination">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                              <span class="sr-only">Previous</span>
                            </a>
                          </li>
                          <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#">2</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#">3</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                              <span class="sr-only">Next</span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>