<main>
    <div class="container">
        <h3>Hitung</h3><br>
        <div class="row">
            <div class="col s12">
                <input type="text" id="kode" placeholder="masukkan kode">
            </div>  
        </div>
        <div class="row">       
            <div class="col s12">
                <h4 class="right" id="total">Total: Rp. 6500,-</h4>
            </div>
        </div>
        <table id="article" class="responsive-table striped" >
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga/pcs</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($x = 0; $x <= 3; $x++) { ?>
                <tr class="databrg">
                    <td>SEREAL & SUSU BERGIZI (RASA COKELAT)</td>
                    <td><input type="text" value="1500" class="price"/></td> 
                    <td><input type="text" value="1" class="quantity" /></td> 
                    <td class="subtotal" >1500</td> 
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>
<div class="fixed-action-btn">
    <a class="btn-floating btn-large teal">
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
                    }
                });
                return false;
            }
            event.stopPropagation();
        });

        // $('#detail_cart').load("<?php echo base_url();?>/data/loadcart");

    });
</script> 
<script>
    $(function() {
        CalculateTotal();
        $('.quantity , .price').on('change', function() {
            UpdateTotals(this);
        });
    });

    function UpdateTotals(elem) {
        var $container = $(elem).parent().parent();
        var quantity = $container.find('.quantity').val();
        var price = $container.find('.price').val();
        var subtotal = parseInt(quantity) * parseFloat(price);
        $container.find('.subtotal').text(subtotal);
        CalculateTotal();
    }

    function CalculateTotal(){ 
        var summ = 0;
        $("td.subtotal").each(function() {
            summ += Number($(this).text());
        });
        $('#total').text('Total: Rp. '+summ+',-')
    }

</script>
<style>
input.price,input.quantity{
    border-bottom: none!important;
    box-shadow: none!important;
}
</style>
