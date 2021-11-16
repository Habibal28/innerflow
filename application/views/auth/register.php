<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
          <div class="login-brand">
            <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
          </div>
          <div class="card card-primary">
            <div class="card-header"><h4>Register</h4></div>
            <div class="card-body">
              <form method="POST" action="<?=base_url('Auth/verifregister')?>">
                <div class="row">
                  <div class="form-group col-6">
                    <label for="name">Full Name</label>
                    <input id="name" type="text" class="form-control" name="name" autofocus>
                    <?=form_error('name',"<small class='text-danger pl-4'>",'</small>')?> 
                  </div>
                </div>
                <div class="row">
                <div class="form-group col-6">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email">          
                  <?=form_error('email',"<small class='text-danger pl-4'>",'</small>')?> 
                </div>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label for="password" class="d-block">Password</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                    <?=form_error('password',"<small class='text-danger pl-4'>",'</small>')?> 
                  </div>
                  <div class="form-group col-6">
                    <label for="password2" class="d-block">Password Confirmation</label>
                    <input id="password2" type="password" class="form-control" name="password-confirm">
                    <?=form_error('password-confirm',"<small class='text-danger pl-4'>",'</small>')?> 
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Register
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="simple-footer">
            Copyright &copy; Innerflow Trading
          </div>
        </div>
      </div>
    </div>
  </section>
</div>