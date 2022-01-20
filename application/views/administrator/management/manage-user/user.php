
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
                    <div id="simple-map" data-height="100%">
                    <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                    <div class="card-header">
                        <h4>Management Data User</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>image</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach($user as $row) : ?>
                        <tr>
                          <td><?=$i?></td>
                          <td><?=$row['name']?></td>
                            <td><img src="<?=base_url('assets/img/foto-profile/')?><?=$row['image']?>" alt="profile" style="width: 3rem; height:3rem;" class="img-thumbnail"></td>
                            <td><?=$row['email']?></td>

                            <?php if($row['role']==1){
                                $role = 'Administrator';                         
                              }else if($row['role']==2){
                                $role = 'Member';
                              }else if($row['role'] == 3){
                                $role = 'Vip';
                              }else{
                                $role = 'no Role';
                              }?>

                            <td><?=$role?></td>

                            <?php if($row['is_active']==1){
                                  $status = 'active';
                                  $color = 'success';
                            }else {
                              $status = 'non active';
                              $color = 'danger';
                            } ?>
                            <td><div class="badge badge-<?=$color?>"><?=$status?></div></td>
                            <td>
                              <button type="button" class="btn btn-warning btn-detailUser" data-toggle="modal" data-target="#staticBackdrop"
                                data-role="<?=$role?>" data-status="<?=$row['is_active']?>" data-id="<?=$row['id']?>"
                              >Detail</button>
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
        <h5 class="modal-title" id="staticBackdropLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('Administrator/manageUser')?>" method="post">
        <input type="hidden" name="id" id="id" value="">
      <div class="modal-body">
        <div class=" form-check">
          <h5>Role</h5>
        </div>
       <div class="form-check 1 pl-5">
          <input class="form-check-input" name="role" type="radio"  value="1" id="roleAdministrator" >
          <label class="form-check-label" for="roleAdministrator">
            Administrator
          </label>
        </div>
        <div class="form-check pl-5">
          <input class="form-check-input" name="role" type="radio" value="3" id="roleVip"  >
           <label class="form-check-label" for="roleVip">
             Vip 
           </label>
         </div>
         <div class="form-check pl-5">
          <input class="form-check-input" name="role" type="radio" value="2" id="roleMember"  >
           <label class="form-check-label" for="roleMember">
             Member 
           </label>
         </div>
         <div class=" form-check mt-3">
          <h5>Status</h5>
        </div>
       <div class="form-check pl-5">
          <input class="form-check-input" name="status" type="radio" value="1" id="statusActive" >
          <label class="form-check-label" for="statusActive">
            Active
          </label>
        </div>
         <div class="form-check pl-5">
          <input class="form-check-input" name="status" type="radio" value="0" id="statusNonactive" >
           <label class="form-check-label" for="statusNonactive" >
             Non active 
           </label>
         </div>

       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">send</button>
      </div>
      </form>
    </div>
  </div>
</div>

