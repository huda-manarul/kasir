<main>
	<div class="container">
		<h3>Hitung</h3><br>
		<div class="row">
			<div class="col s12">
				<input type="text"  id="kode" placeholder="masukkan kode">
			</div>  
		</div>
		<table id="article" class="responsive-table " >
			<thead>
				<tr>
					<th>Nama Barang</th>
					<th class="center">Harga/pcs</th>
					<th class="center">Jumlah</th>
					<th class="center">Harga</th>
					<th class="center">Aksi</th>
				</tr>
			</thead>
			<tbody id="detail_cart">
			</tbody>
		</table>
	</div>
</main>
<div class="fixed-action-btn">
	<a class="btn-floating btn-large teal" id="send" type="submit">
		<i class="large material-icons">print</i>
	</a>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#kode').keypress(function(event){
			var kode=$('#kode').val();
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
				$.ajax({
					type : "POST",
					url  : "<?php echo base_url("data/add") ?>",
					dataType : "JSON",
					data : {kode:kode},
					success: function(data){
						$('#kode').val("");
						$('#detail_cart').load("<?php echo base_url();?>/data/loadcart");
					}
				});
				return false;
			}
			event.stopPropagation();
		});

		$('#detail_cart').load("<?php echo base_url();?>/data/loadcart");

		$(document).on('change', '.quantity', function(){
			var quantity = $(this).val();
			var row_id = $(this).data("rowid");
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url("data/update") ?>",
				dataType : "JSON",
				data : {row_id:row_id, qty:quantity},
				success: function(data){
					// $('#kode').val("");
					$('#detail_cart').load("<?php echo base_url();?>/data/loadcart");
				}
			});
			return false;
		});

		$(document).on('click','.hapus_cart',function(){
            var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
            	url : "<?php echo base_url();?>data/delete",
            	method : "POST",
            	data : {row_id : row_id},
            	success :function(data){
            		$('#detail_cart').load("<?php echo base_url();?>/data/loadcart");
            	}
            });
        });

		$('#send').on('click',function(){
			// alert('ok');
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url("data/save") ?>",
				dataType : "JSON",
				data : {},
				success: function(data){
					alert('data tersimpan');
					$('#detail_cart').load("<?php echo base_url();?>/data/loadcart");
				}
			});
			return false;
		});
	});
</script> 
<style>
input.price,input.quantity{
	border-bottom: none!important;
	box-shadow: none!important;
}
#total{
	border: none;
}
</style>
