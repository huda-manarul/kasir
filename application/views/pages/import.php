<main>
  <div class="container">
    <h3>Hitung</h3><br>
    <form method="post" id="import_form" enctype="multipart/form-data">  
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Lampirkan File</label>
        <div class="col-sm-10">

          <input type="file" name="file" class="form-control" id="file" required accept=".xls, .xlsx" /></p>
        </div>
      </div>
      <div class="form-group">
       <div class="col-sm-10">
        <input type="submit" class="btn btn-block btn-warning" value="Import" name="import">
      </div>
    </div>
  </form>
</div>
</main>
<script>
  $(document).ready(function(){
   $('#import_form').on('submit', function(event){
     event.preventDefault();
     $.ajax({
       url:"<?php echo base_url(); ?>import/add",
       method:"POST",
       data:new FormData(this),
       contentType:false,
       cache:false,
       processData:false,
       success:function(data){
         $('#file').val('');
         alert('ok')
       }
     })
   });
 });
</script>