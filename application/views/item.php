<script src="<?php echo base_url('assets/js/jquery.min.js');?>" ></script>

<?php echo form_open('Item/insert_item'); ?>

<label>Item ID</label>
<input type="text" name='itemId'/><br>

<label>Name</label>
<input   type="text" name='name'/><br>  

<label>Category ID</label>
<input  type="text" name='catId'/><br> 

<label>Unit</label>
<input  type="text" name='unit'/><br> 

<label>Remark</label>
<input   type="text" name='remark' /> <br> 

<label>Minimum Quantity</label>
<input  type="text" name='minQty'/><br> 


<input type="button" value="submit" id="submit">


<?php echo form_close(); ?> 

<script>

/* $("#submit").click(function () {

    $.post("<?php echo base_url(); ?>index.php/" + "item/insertItem", {
         "itemId": $("input[name='itemId']").val(),
         "name":$("input[name='name']").val(),
         "catId":$("input[name='catId']").val(),
         "unit":$("input[name='unit']").val(),
         "remark":$("input[name='remark']").val(),
         "minQty":$("input[name='minQty']").val()
     },function(responce){
         console.log(responce["item_id"]);
     },"json");


 });*/
 $("#submit").click(function ()
 {

    $.post("<?php echo base_url(); ?>index.php/" + "Item/insert_item", 
    {
         "itemId": $("input[name='itemId']").val(),
         "name":$("input[name='name']").val(),
         "catId":$("input[name='catId']").val(),
         "unit":$("input[name='unit']").val(),
         "remark":$("input[name='remark']").val(),
         "minQty":$("input[name='minQty']").val()
     },
     function(responce)
     {
         alert(responce);
     });


 });

</script>
