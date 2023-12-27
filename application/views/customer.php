<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>" ></script>

<?php echo form_open('Customer/insert_customer'); ?>

Customer ID:<input type="text" name="cusid"/><br><br>
Customer Name:<input type="text" name="name"/><br><br>
Contact:<input type="text" name="contact"/><br><br>
Address line:<input type="text" name="adrs"/><br><br>
city:<input type="text" name="city"/><br><br>
Street:<input type="text" name="street"/><br><br>
Postal Code:<input type="text" name="postalcode"/><br><br>
Credit Limit:<input type="text" name="credlimit"/><br><br>
<input type="button" value="submit" id="sub">

<?php echo form_close(); ?>

<script>
    
$("#sub").click(function () 
{

    $.post("<?php echo base_url(); ?>index.php/" + "Customer/insert_customer", 
    {
        "cusid": $("input[name='cusid']").val(),
        "name": $("input[name='name']").val(),
        "contact": $("input[name='contact']").val(),
        "adrs": $("input[name='adrs']").val(),
        "city": $("input[name='city']").val(),
        "street": $("input[name='street']").val(),
        "postalcode": $("input[name='postalcode']").val(),
        "credlimit": $("input[name='credlimit']").val()
    }, 
    function (responce) 
    {
        alert(responce);
    });


});
</script>





