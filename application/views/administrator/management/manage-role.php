
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
                                 <th>No</th>
                                 <th>Role Access</th>
                                 <th>Action</th>
                                 </tr>
                                 <?php $i = 1;
                                 foreach($role as $row) : ?>
                                 
                                 <tr>
                                 <td><?=$i?></td>
                                 <td class=" text-capitalize"><?=$row['role']?></td>
                                 <td><button  type="button" name="button" id="changeRole" class="btn btn-primary"
                                 data-toggle="modal" data-target="#staticBackdrop" data-id="<?=$row['id']?>"
                                 >Change Role</button></td>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Checklist to Give Access </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

        <?php foreach($menu as $row) : ?>
          <div class="form-check mb-2">
            <input <?=checked(1,$row['id'])?>  class="form-check-input" type="checkbox"  id="defaultCheck1" >
            <?=$row['menu']?>
          </div>
          <?php endforeach;?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Change</button>
      </div>
    </div>
  </div>
</div>