<footer class="main-footer">
        <div class="text-center">
          Copyright &copy; 2021 <div class="bullet"></div> Design By <a href="">Innerflow</a>
        </div>
        <div class="footer-right">
         
        </div>
      </footer>
    </div>
  </div>

  
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="../node_modules/summernote/dist/summernote-bs4.js"></script>

  <!-- Template JS File -->
  <script src="<?=base_url()?>/assets/js/scripts.js"></script>
  <script src="<?=base_url()?>/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?=base_url('assets')?>/js/myscript.js"></script>
  <script>
    // change role access
    $('.form-check-input').on('click', function(){
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');
    $.ajax({
        url : "<?= base_url('Administrator/ajaxchangeaccess'); ?>",
        type: 'post',
        data: {
            menuId: menuId,
            roleId: roleId
        },
        success : function() {
                document.location.href ="<?= base_url('Administrator/changeaccess/');?>" + role
        }
    });
});

// modal user detail just checklist radio
$('.btn-detailUser').on('click',function(){
  
  var status = $(this).data('status');
  var role = $(this).data('role');
  var id = $(this).data('id');
  $('#id').val(id);
  if(status == 1){
    $('#statusActive').attr("checked","checked");
    $('#statusNonactive').removeAttr("checked","checked");
  }else{
    $('#statusNonactive').attr("checked","checked");
    $('#statusActive').removeAttr("checked","checked");
  }

  if(role == 1){
   $('#roleAdministrator').attr("checked","checked");
   $('#roleMember').removeAttr("checked","checked");
  }else{
    $('#roleMember').attr("checked","checked");
    $('#roleAdministrator').removeAttr("checked","checked");
  }
  
});
  </script>
</body>
</html>
