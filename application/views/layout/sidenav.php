<header>
	<ul id="slide-out" class="sidenav sidenav-fixed collapsible">
		<li><div class="user-view">
		</div></li>
		<li><a class="subheader">Kasir</a></li>
		<li><a href="<?php echo base_url();?>"><i class="material-icons">shopping_cart</i>kasir</a></li>
		<li><a class="subheader">Data</a></li>
		<li><a href="<?php echo base_url();?>home/dashboard"><i class="material-icons">assignment</i>Tampil Data</a></li>
		<li><a href="<?php echo base_url();?>home/import"><i class="material-icons">note_add</i>Tambah Data</a></li>
		<li><a class="subheader">Klasifikasi</a></li>
		<li><a href=""><i class="material-icons">label</i>Klasifikasi</a></li>
	</header>
</body>
<script>
	$(document).ready(function(){
		$('.modal').modal();
		$('.sidenav').sidenav();
		$('.tabs').tabs();
	});
</script>
<style>
header, main, footer {
	padding-left: 200px;
	padding-top: 10px;
}
@media only screen and (max-width : 992px) {
	header, main, footer {
		padding-left: 0;
	}
}
.boldi{
	margin-left:16px;
}
.tabs .tab a{
	color:teal;
}
.tabs .tab a:focus, .tabs .tab a:focus.active {
	background-color: #b2dfdb;
	outline: none;
}
.tabs .tab a:hover,tabs .tab a:active,.tabs .tab a.active {
	background-color:#b2dfdb;
	color:teal;
}

.tabs .indicator {
	background-color:#009688;
}
</style>