<div id="app">
   <section class="section">
     <div class="container mt-5">
       <div class="row">
         <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
           <div class="login-brand">
             <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
           </div>
           <div class="card card-primary">
             <div class="card-header"><h4>New Password</h4></div>
             <div class="card-body">
               <form action="<?=base_url('Auth/newPassword')?>" method="POST">
                 <input type="hidden" name="email" value="<?=$email?>">
                 <input type="hidden" name="token" value="<?=$token?>">
                 <div class="form-group">
                   <label for="password">Password</label>
                   <input id="password" type="password" class="form-control" name="password" tabindex="1" required autofocus>
                 </div>
                 <div class="form-group">
                   <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    New Password
                   </button>
                 </div>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>
 </div>