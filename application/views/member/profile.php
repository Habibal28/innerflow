        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Profile</h1>
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                  <a href="#">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Profile</div>
              </div>
            </div>
            <div class="section-body">
             
              <h2 class="section-title">Hi, <?=$profile['name']?>!</h2>
              <p class="section-lead">
                Change information about yourself on this page.
              </p>

              <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                  <div class="card profile-widget">
                    <div class="profile-widget-header">
                      <img
                        alt="image"
                        src="../assets/img/avatar/<?=$profile['image']?>"
                        class="rounded-circle profile-widget-picture"
                      />
                    </div>
                    <div class="profile-widget-description">
                      <div class="profile-widget-name">
                      <?=$profile['name']?>
                        <div class="text-muted d-inline font-weight-normal">
                          <div class="slash"></div>
                          Web Developer
                        </div>
                      </div>
                      <p><?=$profile['description']?></p>
                    </div>
                    <div class="card-footer text-center">
                      <div class="font-weight-bold mb-2">Follow <?=$profile['name']?> On</div>
                      <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                        <i class="fab fa-facebook-f text-primary"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                        <i class="fab fa-twitter text-info"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon btn-github mr-1 ">
                        <i class="fab fa-github text-dark"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon btn-instagram ">
                        <i class="fab fa-instagram text-danger"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                  <div class="card">
                    <form method="post" action="<?=base_url('Member/profile/'.$profile['id'])?>" class="needs-validation" novalidate="">
                      <div class="card-header">
                        <h4>Edit Profile</h4>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Full Name</label>
                            <input
                              type="text"
                              class="form-control"
                              value="<?=$profile['name']?>"
                              name="name"
                              required=""
                            />
                            <div class="invalid-feedback">
                              Please fill in the full name
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input
                              type="email"
                              class="form-control"
                              value="<?=$profile['email']?>"
                              name="email"
                              required=""
                            />
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Phone</label>
                            <input type="tel" class="form-control" name="phone" value="<?=$profile['phone']?>" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Bio</label>
                         
                          </div>
                        </div>
                      </div>
                      <div class="card-footer text-right">
                        <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>