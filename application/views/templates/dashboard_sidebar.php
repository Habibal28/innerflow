<div class="main-sidebar">
  <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Innerflow</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">INR</a>
          </div>

          <?php 
            $role = $this->session->userdata['role'];
            $query = " SELECT lm.menu, lm.id
                        FROM access_menu as am 
                        JOIN list_menu as lm 
                        ON  lm.id = am.list_menu_id
                        WHERE am.role_id = $role
                        ";
            $menu = $this->db->query($query)->result_array();
          
            ?>
             <!-- Heading -->
             <hr class="sidebar-divider">
             
             <?php foreach($menu as $row) : ?>
              <p class="text-capitalize ml-2 text-dark"><?=$row['menu']?></p>
                    
                    <?php
                        $menuid = $row['id'];
                        $query = "SELECT * FROM sub_menu
                                  WHERE sub_menu.list_menu_id = $menuid";
                        $subMenu = $this->db->query($query)->result_array();
                    ?>

                    <?php foreach ($subMenu as $row1) : ?>
                        
                        <div class="nav-item">
                            <a class="nav-link" href="<?=base_url($row1['url'])?>">
                                <i class="<?=$row1['icon']?>"></i>
                                <span ><?=$row1['sub_menu']?></span></a>
                        </div>
                    <?php endforeach;?>
                    <hr class="sidebar-divider">

                <?php endforeach; ?>

        </aside>
      </div>