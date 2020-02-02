<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo htmlentities('<input name="data[1][quantity]" class="">')?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>



<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>

<table id="order-table" class="table table-striped table-bordered table-hover">
<thead>
<th><span id="add_item_button" class="btn mini green addbutton" onclick="addToObj=false">
											<i class="icon-plus"></i></span></th>
<th>Description</th>
<th>Quantity</th>
<th>Unit Price</th>
</thead>

<tbody>
	<tr>
	    <td></td>
        <td><p name="description_1'"></p></td>
        <td><p name="quantity_'1"></p></td>
        <td><p name="unit_price_1"></p></td>
	
</tr>

</tbody>

</table>


<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%"   controls>
  <source src="/dewtouch/video/q3_2.mov">
Your browser does not support the video tag.
</video>
</p>





<?php $this->start('script_own');?>
<script>
$(document).ready(function(){
    $('#order-table').on('click', 'td', function(){
        var trIndex = ($(this).closest('tr').index()+1);
        var tdIndex = ($(this).index()+1);

        var $td = $(this);
        if (tdIndex === 2) {
            var val = $td.children().html();
            $td.html('<textarea name="data['+trIndex+'][description]" class="m-wrap description required" rows="2" >'+ val+'</textarea>');
            var $newE = $td.find('textarea');
            $newE.focus();
        }
        if (tdIndex === 3) {
            var val = $td.children().html();
            $td.html('<input name="data['+trIndex+'][quantity]" value="'+val+'">');
            var $newE = $td.find('input');
            $newE.focus();
        }
        if (tdIndex === 4) {
            var val = $td.children().html();
            $td.html('<input name="data['+trIndex+'][unit_price]" value="'+val+'">');
            var $newE = $td.find('input');
            $newE.focus();
        }
        if (tdIndex !== 1) {
            $newE.on('blur', function() {
                $(this).parent().html('<p>'+$(this).val()+'</p>');
            });
        }
    });

	$("#add_item_button").click(function(){
        var rowCount = $("#order-table tr").length;
        $("#order-table tr:last").after('' +
            '<tr>' +
            '<td></td>' +
            '<td><p name="description_'+rowCount+'"></p></td>' +
            '<td><p name="quantity_'+rowCount+'"></p></td>' +
            '<td><p name="unit_price_'+rowCount+'"></p></td>' +
            '</tr>');
	});
});
</script>
<?php $this->end();?>

