
<!--  belum digunakan untuk view  -->


<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1 class="text-capitalize"><?=$title?></h1>

            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">All Posts</div>
            </div>
          </div>
          <div class="section-body"
          <div class="row">
              <div class="col-12 col-sm-6 col-lg-12" style="padding:0;">
                <div class="card">
                  <div class="card-header">
                    <h2 class="text-primary"><?=$event['title']?></h2>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?=$event['content']?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
