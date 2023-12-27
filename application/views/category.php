<script src="<?php echo base_url('assets/js/jquery.min.js');?>" ></script>

<?php echo form_open('Category/insert_category'); ?>

<!--category form-->
<label>  category ID</label>
<input type="text" name="catid"/><br/>
<label>  category name</label>
<input type="text" name="catname"/><br/>
<label>  category  Description</label>
<input type="text" name="catdesc"/><br/>
<input type="button" value="submit" id="submit"/>

<?php echo form_close(); ?>

<script>

$("#submit").click(function () 
{

    $.post("<?php echo base_url(); ?>index.php/" + "Category/insert_category",
    {
         "catid": $("input[name='catid']").val(),
         "catname":$("input[name='catname']").val(),
         "catdesc":$("input[name='catdesc']").val()

     },
     function(responce)
     {
         alert(responce);
     });

       
});

</script>