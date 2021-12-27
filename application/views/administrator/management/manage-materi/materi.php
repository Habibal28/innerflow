<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Posts</h1>
            <div class="section-header-button">
              <a href="<?=base_url('Administrator/addMateri')?>" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">All Posts</div>
            </div>
          </div>
          <div class="section-body">
          <div class="flashdata" data-halaman="Materi" data-flashdata="<?=$this->session->flashdata('message')?>"></div>
            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Materi</h4>
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
                          <td><?=$row['title']?>
                            <div class="table-links">
                              <a href="<?=base_url('Administrator/viewMateri/').$row['id']?>">View</a>
                              <div class="bullet"></div>
                              <a href="<?=base_url('Administrator/editMateri/').$row['id']?>">Edit</a>
                              <div class="bullet"></div>
                              <a href="<?=base_url('Administrator/deleteMateri/').$row['id']?>" class="text-danger btn-hapus">Trash</a>
                            </div>
                          </td>
                          <td>
                            <a href="#"><?=$row['category']?></a>
                          </td>
                          <td><?= date('d F Y',$row['date_created'])?></td>
                          <td>
                            <?php $status = ($row['status']==1)?'Published' : 'Draft' ?>
                            <?php $color = ($row['status']==1)?'primary' : 'danger' ?>
                            <div class="badge badge-<?=$color?>"><?=$status?></div>
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
        </section>
      </div>