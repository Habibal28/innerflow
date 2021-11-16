
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1 class="text-primary"> Administrator</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Google Maps</a></div>
              <div class="breadcrumb-item">Simple Map</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div id="simple-map" data-height="500">
                    <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                    <div class="card-header">
                        <h4>Management Data User</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>image</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                            </tr>
                            <?php $i=1;
                            foreach($user as $row) : ?>
                            <tr>
                            <td><?=$i?></td>
                            <td><?=$row['name']?></td>
                            <td><img src="<?=base_url('assets/img/avatar/')?><?=$row['image']?>" alt="profile" style="width: 3rem; height:3rem;" class="img-thumbnail"></td>
                            <td><?=$row['email']?></td>

                            <?php if($row['role']==1){
                                    $role = 'Administrator';                         
                              }else {
                                $role = 'non active';
                              } ?>

                            <td><?=$role?></td>

                            <?php if($row['is_active']==1){
                                  $status = 'active';
                                  $color = 'success';
                            }else {
                              $status = 'non active';
                              $color = 'danger';
                            } ?>
                            <td><div class="badge badge-<?=$color?>"><?=$status?></div></td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                            </tr>
                            <?php $i++;
                           endforeach;?>
                        </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li class="page-item">
                            <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                        </nav>
                    </div>
                    </div>
                </div>
                </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>
        </div>
