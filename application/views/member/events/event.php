      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?=$title?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Article</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">All Events</h2>
            <div class="row">
              <?php foreach($event as $row) : ?>
                <?php if($row['status']==1): ?>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-b">
                  <div class="article-header">
                   <img src="<?=base_url('assets/img/event-thumbnail/').$row['image']?>" width="100%" height="100%" >
                  </div>
                  <div class="article-details">
                    <div class="article-title">
                      <h2><a href="#"><?=$row['title']?></a></h2>
                    </div>
                    <p style="overflow:hidden; white-space:unset; height:100px"><?=$row['Description']?> </p>
                    <div class="article-cta">
                      <a href="<?=base_url('Member/viewEvent/').$row['id']?>">Read More <i class="fas fa-chevron-right"></i></a>
                    </div>
                  </div>
                </article>
              </div>
              <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div>
        </section>
      </div>