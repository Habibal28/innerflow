<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Posts</h1>
            <div class="section-header-button">
              <a href="<?=base_url('Administrator/addEvent')?>" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">All Posts</div>
            </div>
          </div>
          <div class="section-body">
          <div class="flashdata" data-halaman="Event" data-flashdata="<?=$this->session->flashdata('message')?>"></div>
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
                                <th>No</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Last Changes At</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;
                        foreach($event as $row) : ?>
                        <tr>
                          <td><?=$i?></td>
                          <td class="text-primary"><?=$row['title']?>
                            <div class="table-links">
                              <a href="<?=base_url('Member/viewEvent/').$row['id']?>">View</a>
                              <div class="bullet"></div>
                              <a href="<?=base_url('Administrator/editEvent/').$row['id'] ?>">Edit</a>
                              <div class="bullet"></div>
                              <a href="<?=base_url('Administrator/deleteEvent/').$row['id'] ?>" class="text-danger btn-hapus">Trash</a>
                            </div>
                          </td>
                          <td>
                            <a href="#"><?=$row['category']?></a>
                          </td>
                          <td>
                            <a href="#">
                              <img alt="image" src="<?=base_url('assets/img/foto-profile/').$row['image']?>" class="rounded-circle" height="40" width="40" data-toggle="title" title=""> 
                              <div class="d-inline-block ml-1"><?=$row['name']?></div>
                            </a>
                          </td>
                          <td><?=date('d F Y',$row['date_created'])?></td>
                          <?php $status = ( $row['status'] == 1 ) ? 'publish':'draft' ?>
                          <?php $color = ( $row['status'] == 1 ) ? 'primary':'danger' ?>
                          <td><div class="badge badge-<?=$color?>"><?=$status?></div></td>
                        </tr>
                        <?php $i++;
                      endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>