
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
                        <h4><?=$title?></h4>
                    </div>
                         <div class="card-body p-0">
                             <div class="table-responsive">
                             <table class="table table-striped table-md">
                               <tr>
                                 <th>No</th>
                                 <th>Role Access</th>
                                 <th>Action</th>
                                 </tr>
                                 <?php $i = 1;
                                 foreach($menu as $row) : ?>
                                 
                                 <tr>
                                 <td><?=$i?></td>
                                 <td class=" text-capitalize"><?=$row['menu']?></td>
                                 <td> <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  id="defaultCheck1" 
                                     data-menu="<?=$row['id']?>" data-role="<?=$role_id?>" <?=checked($role_id,$row['id'])?> 
                                    >
                                      Ceklist to activate
                                    </label>
                                  </div> </td>
                                 </tr>
                                 <?php $i++;
                               endforeach; ?>
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
      </section>
    </div>
