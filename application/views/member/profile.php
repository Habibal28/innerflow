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
                        src="../assets/img/foto-profile/<?=$profile['image']?>"
                        class="rounded-circle profile-widget-picture"
                        style="width:150px;height:150px"
                      />
                    </div>
                    <div class="profile-widget-description">
                      <div class="profile-widget-name">
                      <?=$profile['name']?>
                        <!-- <div class="text-muted d-inline font-weight-normal"> -->
                          <!-- <div class="slash"></div> -->
                          <!-- Web Developer -->
                        <!-- </div> -->
                      </div>
                      <p><?=$profile['description']?></p>
                    </div>
                    <div class="card-footer text-center">
                      <div class="font-weight-bold mb-2">Follow <?=$profile['name']?> On</div>
                      <a href="https://www.facebook.com/<?=$profile['facebook']?>" target="_blank" class="btn btn-social-icon btn-facebook mr-1">
                        <i class="fab fa-facebook-f text-primary"></i>
                      </a>
                      <a href="https://twitter.com/<?php echo $profile['twitter']?>" target="_blank" class="btn btn-social-icon btn-twitter mr-1">
                        <i class="fab fa-twitter text-info"></i>
                      </a>
                      <a href="https://github.com/<?=$profile['github']?>" target="_blank" class="btn btn-social-icon btn-github mr-1 ">
                        <i class="fab fa-github text-dark"></i>
                      </a>
                      <a href="https://www.instagram.com/<?=$profile['instagram']?>" target="_blank" class="btn btn-social-icon btn-instagram ">
                        <i class="fab fa-instagram text-danger"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                  <div class="card">
                    <?php echo form_open_multipart(base_url('Member/profile/'.$profile['id']), 'class="form-horizontal"');  ?>
                      <div class="card-header">
                        <h4>Change Profile</h4>
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
                          <div class="form-group col-md-6 col-12">
                            <label>Foto Profile</label>
                            <input
                              type="file"
                              class="form-control"
                              name="image"
                              accept="image/*"
                            />
                            <div class="invalid-feedback">
                              Please select the foto
                            </div>
                            <small class="text-danger">* just leave it blank if it's not changed</small>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
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
                          <div class="form-group col-md-6 col-12">
                            <label>Phone</label>
                            <input type="tel" class="form-control" name="phone" value="<?=$profile['phone']?>" />
                          </div>
                         <div class="form-group col-md-6 col-12">
                           <label>facebook</label>
                           <input
                             type="text"
                             class="form-control"
                             value="<?=$profile['facebook']?>"
                             name="facebook"
                           />
                           <div class="invalid-feedback">
                             Please fill in the facebook
                           </div>
                           <small class="text-danger">* just leave it blank if it's not changed</small>
                         </div>
                         <div class="form-group col-md-6 col-12">
                           <label>twitter</label>
                           <input
                              type="text"
                              class="form-control"
                              value="<?=$profile['twitter']?>"
                              name="twitter"
                            />
                            <div class="invalid-feedback">
                              Please fill in the twitter
                            </div>
                           <small class="text-danger">* just leave it blank if it's not changed</small>
                         </div>
                         <div class="form-group col-md-6 col-12">
                           <label>github</label>
                           <input
                              type="text"
                              class="form-control"
                              value="<?=$profile['github']?>"
                              name="github"
                            />
                            <div class="invalid-feedback">
                              Please fill in the github
                            </div>
                           <small class="text-danger">* just leave it blank if it's not changed</small>
                         </div>
                         <div class="form-group col-md-6 col-12">
                           <label>instagram</label>
                           <input
                              type="text"
                              class="form-control"
                              value="<?=$profile['instagram']?>"
                              name="instagram"
                            />
                            <div class="invalid-feedback">
                              Please fill in the instagram
                            </div>
                           <small class="text-danger">* just leave it blank if it's not changed</small>
                         </div>
                       </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Bio</label>
                             <textarea name="content" id="content" class="summernote-simple w-100" style="height: 150px;" ><?=$profile['description']?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer text-right">
                        <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>