<?php 
$role = $this->session->userdata('role');
if($role == '3'){
	$query = "SELECT * FROM sub_menu WHERE role >= 2";
}else{
	$query = "SELECT * FROM sub_menu WHERE role =$role";
}
$menu = $this->db->query($query)->result_array();
?>
<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="">INNERFLOW TRADING</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">IT</a>
          </div>

            <!-- role Admin -->
            <?php if($role == 1) { ?>
              <ul class="sidebar-menu">
              <?php foreach($menu as $row) : ?>
                <li class="nav-item ">
                  <a href="<?=base_url($row['url'])?>" class="nav-link text-capitalize  mb-1 rounded "><i class="<?=$row['icon']?> text-primary"></i><span><?=$row['sub_menu']?></span></a>
                </li>

              <?php endforeach; ?>
            </ul>
            <!-- role member -->
            <?php }else if($role == 2 ) { ?>  
              <ul class="sidebar-menu">
              <?php foreach($menu as $row) : ?>
                <li class="nav-item ">
                  <?php if($row['sub_menu'] == 'upgrade account') { ?>
                    <div class="mt-3 mb-4 p-3 hide-sidebar-mini">
                     <a href="<?=base_url($row['url'])?>" class="btn btn-primary btn-lg btn-block btn-icon-split text-uppercase text-light pl-5"> <i class="fas fa-fw fa-rocket pl-2"></i> <?=$row['sub_menu']?></a>
                   </div>
                  <?php } else { ?>
                    <a href="<?=base_url($row['url'])?>" class="nav-link text-capitalize  mb-1 rounded "><i class="<?=$row['icon']?> text-primary"></i><span><?=$row['sub_menu']?></span></a>
                  <?php } ?>
                </li>
              <?php endforeach; ?>
            </ul>

            <!-- role Vip -->
            <?php }else if($role == 3 ) { ?>  
              <ul class="sidebar-menu">
              <?php foreach($menu as $row) : ?>
                <?php if($row['sub_menu'] == 'upgrade account') {?>
                  <?php }else if($row['sub_menu']=='join grub VIP') { ?>
                     <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="<?=$row['url']?>" class="btn btn-primary btn-lg btn-block btn-icon-split text-uppercase"><i class="fas fa-fw fa-rocket"></i> <?=$row['sub_menu']?></a>
                      </div>
                    <?php }else{ ?>
                      <li class="nav-item ">
                        <a href="<?=base_url($row['url'])?>" class="nav-link text-capitalize  mb-1 rounded "><i class="<?=$row['icon']?> text-primary"></i><span><?=$row['sub_menu']?></span></a>
                      </li>
                <?php }?>
              <?php endforeach; ?>
            </ul>
            <?php } ?>  
        </aside>
      </div>
