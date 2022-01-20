
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1 class="text-primary"> Administrator</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Members</h4>
                  </div>
                  <div class="card-body">
                    <?=$result['members']['member']?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Events</h4>
                  </div>
                  <div class="card-body">
                   <?=$result['events']['event']?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Learnings</h4>
                  </div>
                  <div class="card-body">
                  <?=$result['learnings']['learning']?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- main -->
          <div class="section-body" >
            <div class="row" >
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4></h4>
                  </div>
                  <div class="card-body" >
                    <div class="row">
                      <div class="col-5 ">
                        <canvas id="myChart"></canvas>
                      </div>
                    
                      <div class="col-7">
                        <canvas id="myChart1"></canvas>
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
      