     <!-- Main Content -->
     <div class="main-content">
       <section class="section">
         <div class="section-header justify-content-center">
         <h1 class="text-center text-primary text-uppercase font-weight-bold" style="font-size: 30px;"><?=$event['title']?></h1>
         </div>
         <div class="section-body">
            
            <img src="<?=base_url('assets/img/event-thumbnail/'). $event['image']?>" style="background-position:center; background-repeat:no-repeat;" width="100%">
            <p class=""><?=$event['content']?></p>
         </div>
       </section>
     </div>