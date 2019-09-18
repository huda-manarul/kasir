<main>
	<div class="container">
		<h3>Daftar Barang</h3><br>

		<table id="article" class="responsive-table " >
			<thead>
				<tr>
					<th>Nama Barang</th>
					<th class="center">Jumlah</th>
					<th class="center">Harga/pcs</th>
					<th class="center">Aksi</th>
				</tr>
			</thead>
			<tbody id="detail_cart">
			</tbody>
		</table>
	</div>
</main>
<script type="text/javascript">
	$(document).ready(function(){
		$('#detail_cart').load("<?php echo base_url();?>/data/loadproduct");

		$(document).on('change', '.harga', function(){
			var harga = $(this).val();
			var id_brg = $(this).data("rowid");
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url("data/updateproduct") ?>",
				dataType : "JSON",
				data : {id_brg:id_brg, harga:harga},
				success: function(data){
					$('#detail_cart').load("<?php echo base_url();?>/data/loadproduct");
					alert('harga telah diupdate')
				}
			});
			return false;
		});

		$(document).on('click','.hapus_cart',function(){
            var id_brg=$(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
            	url : "<?php echo base_url();?>data/deleteproduct",
            	method : "POST",
            	data : {id_brg : id_brg},
            	success :function(data){
            		$('#detail_cart').load("<?php echo base_url();?>/data/loadproduct");
            	}
            });
        });
	});
</script> 
<style>
input.price,input.harga{
	border-bottom: none!important;
	box-shadow: none!important;
	/*max-width: 60px;*/
}
#total{
	border: none;
}
tr{
	height: 10px;
}
</style>
