<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Event</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Profile</a></div>
        <div class="breadcrumb-item"><a href="#">Materi</a></div>
      </div>
    </div>
    <div class="section-body">
      <div class="row">
        <?php foreach($event as $row) : ?>
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4><?=$row['title']?></h4>
            </div>
            <div class="card-body">
            <?=$row['content']?>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary">view</button>
            </div>
          </div>
        </div>
        <?php endforeach;?>
        </div>
      </div>
  </section>
</div>