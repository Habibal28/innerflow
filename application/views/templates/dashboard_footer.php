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
  <script src="<?=base_url('assets/js/stisla.js')?>"></script>


  <!-- Template JS File -->
  <script src="<?=base_url('assets/js/scripts.js')?>"></script>
  <script src="<?=base_url('assets/js/custom.js')?>"></script>

  <!-- Page Specific JS File -->
  
  <!-- sweet alert -->
  <script src="<?=base_url('assets/js/sweetalert/')?>sweetalert2.all.min.js"></script>
  <script src="<?=base_url('assets/js/myalert.js')?>"></script>
  <!-- chart -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- data tables -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
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

  <!-- data tables -->
<script>
 $(document).ready(function() {
     $('#example').DataTable();
  } );
</script>

  <!-- chart -->
<script>
const ctx = document.getElementById('myChart').getContext('2d');
var temp=[];
  $.post("<?=base_url('Administrator/chart/pie')?>", function(data){
      var obj = JSON.parse(data);
      $.each(obj,function(x,items){
        temp.push(items[x]);
      });
const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Member', 'Vip'],
        datasets: [{
          label: 'My First Dataset',
          data: [temp[0], temp[1]],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
          ],
          hoverOffset: 5
        }]
    }
  });
});

const ctx1 = document.getElementById('myChart1').getContext('2d');
var temp1=[];
var tes;
$.post("<?=base_url('Administrator/chart/bar')?>", function(data){
      var obj = JSON.parse(data);
      // console.log(obj);
      $.each(obj,function(x,items){
        // console.log(x);
        temp1[x] = items;
      });
  const myChart1 = new Chart(ctx1, {
      type: 'bar',
      data: {
          labels: ['januari', 'februari', 'maret','april','mei','juni','juli','agustus','september','oktober','november','desember'],
          datasets: [{
            label: 'Join',
            data: [temp1[0]['bulan1'],temp1[1]['bulan2'],temp1[2]['bulan3'],temp1[3]['bulan4'],temp1[4]['bulan5'],temp1[5]['bulan6'],
                  temp1[6]['bulan7'],temp1[7]['bulan8'],temp1[8]['bulan9'],temp1[9]['bulan10'],temp1[10]['bulan11'],temp1[11]['bulan12']],
            backgroundColor: [
              'rgba(255, 99, 132, 0.8)',
                  'rgba(54, 162, 235, 0.8)',
                  'rgba(255, 206, 86, 0.8)',
                  'rgba(75, 192, 192, 0.8)',
                  'rgba(153, 102, 255, 0.8)',
                  'rgba(255, 159, 64, 0.8)'
            ],
            borderColor:[
              'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
            ],
            borderWidht:1,
            hoverOffset: 5
          }],
          options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
      }
  });
});
</script>

</body>
</html>
