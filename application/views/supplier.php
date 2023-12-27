 <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>" ></script>

<?php echo form_open('Supplier/insert_supplier'); ?>

<label>  Supplier Id</label>
<input type="text" name="supid"/> <br/>
<label>  Supplier name</label>
<input type="text" name="supname"/><br/>
<label>  Address Line</label>
<input type="text" name="addline"/> <br/>
<label>  Street</label>
<input type="text" name="street"/> <br/>
<label>  City</label>
<input type="text" name="city"/> <br/>
<label>  Postal Code</label>
<input type="text" name="postalcode"/> <br/>
<label>  Contact Person</label>
<input type="text" name="contactperson"/> <br/>
<label>  phone</label>
<input type="text" name="phone"/> <br/>
<input type="button" value="submit" id="submit">

<?php echo form_close(); ?>

<script>
$("#submit").click(function ()
{

    $.post("<?php echo base_url(); ?>index.php/" + "Supplier/insert_supplier",
    {
          "supid": $("input[name='supid']").val(),
           "supname": $("input[name='supname']").val(),
           "addline": $("input[name='addline']").val(),
           "street": $("input[name='street']").val(),
           "city": $("input[name='city']").val(),
           "postalcode": $("input[name='postalcode']").val(),
           "contactperson": $("input[name='contactperson']").val(),
           "phone": $("input[name='phone']").val()
    }, 
    function (responce)
   {
       alert(responce);
   });
});
</script>
