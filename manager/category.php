<?php $title = 'Category';include('headercategory.php');?>

<?php

if(isset($_GET['dt'])){

   $query = mysqli_query($conn,"DELETE FROM category WHERE category_id='".$_GET['dt']."'");
   
}
?>
<html>
<body>
	<div class="container">
     <button style="margin-top:50px; margin-bottom: 10px" class="btn btn-primary" onclick="popup_box('','Add Category');"> ADD NEW </button>
	 <table  class="table table-bordered table-hover">
       <thead>
		   <tr style="font-size: 17px">
       	 <td style="width:10px;"><b>NO.</b></td>
       	 <td ><b><center>NAME</b></td>
       	 <td><b><center>DESCRIPTION</b></td>
       	 <td><center><b>ACTION</b></center></td>
			   </tr>
       </thead>
       <tbody>
         <?php $category = mysqli_query($conn,"SELECT * FROM category "); ?>
	        <?php  if ($category->num_rows > 0){ 
                ?>
	        <?php $no = 1; while($category_row = mysqli_fetch_assoc($category)){?>
            <tr  style="font-size: 17px">
            	<td><?php echo $no;?></td>
            	<td><?php echo $category_row['categoryName'];?> </td>
            	<td><?php echo $category_row['description'];?> </td>
            	<td><a href="javascript:void(0);" onclick="popup_box('','Edit Category');edit_category('<?php echo $category_row['category_id'];?>','<?php echo $category_row['categoryName'];?>','<?php echo $category_row['description'];?>');"><img src="../images/edit.gif" style="width: 20px;" /></a>
                    <a href="<?php echo $_SERVER['PHP_SELF'];?>?dt=<?php echo $category_row['category_id'];?>" onclick="return confirm('Are you sure you want to delete this record?')"><img src="../images/delete.gif" style="width: 20px;" /></a>
                </td>
            </tr>
            <?php $no++; }?>
	        <?php }else {?>
	        <tr>
	        	<td colspan="5"><div class='empty'>No product added</div></td>

	        </tr>
	        <?php }?>
       </tbody> 
	 </table>
    </div>
<div id="blockUI" class="translucent" onclick="return false" onmousedown="return false" onmousemove="return false" onmouseup="return false" ondblclick="return false">
</div>

<div id="addbox" style="position:fixed; top:15%; left:33.5%; border: #333333 5px solid; background-color:#ffffff; z-index: 60000;display:none; width:33%;">
	<table width="100%" border="0" cellpadding="5" cellspacing="0">
		<tr>
	            <td bgcolor="#333333"><div id="box_title" style="color:#cccccc"></div></td>
	            <td align="right" bgcolor="#333333">
			<a href="javascript: void(0);" onclick="popup_box('close')"><font color="#CCCCCC">Close <img src="../images/close.gif" 
				style="width: 10px;"/></font></a>
		    </td>
		</tr>
	</table>
    <form name="create_category"  method="post" autocomplete="off" >
      <table cellpadding="5" style="border:1px #999 solid;" width="100%" id="profile">
    	<tr>
        <td style="padding: 20px;">Name</td>
            <td><input type="hidden" name="category_id" id="category_id" value="" />
                <input type="text" name="categoryName" id="categoryName" value="" />
            </td>
        </tr>
        <tr >
		   <td style="padding: 20px;" valign="top">Description</td>
		   <td><textarea name="description" id="description"></textarea></td>
		</tr>
		<tr>
        <td>&nbsp;</td>
        <td><input type="button" name="sm" id="button-save" value="Submit" /> </td>
        </tr>
       </table>
    </form>

    <script type="text/javascript">
    	$(document).delegate('#button-save', 'click', function() {
    		 var category_id =  document.getElementById('category_id').value;
             var categoryName = document.getElementById('categoryName').value;
             var description =  document.getElementById('description').value;
             var sm = document.getElementById('button-save').value;

             $.ajax({
                 url: '/wksp2/manager/category_save.php',
                 type: 'post',
                 data: { category_id:category_id, categoryName: categoryName, description: description,sm:sm},
                 dataType: 'json',
                 beforeSend: function() {
		         },
		          complete: function() {
		         },
		         success: function(json) {
		         	 if(json['success']){
		                popup_box('close');
		                location.reload();
		             }
		         },

             });
    	});

    </script>
</div>

<script type="text/javascript">
 
        function popup_box(action, title){
            if(action!='close'){
                document.getElementById('box_title').innerHTML = title;
                document.getElementById('addbox').style.display = 'block';
                document.getElementById('blockUI').style.display = 'block';
            } else {
                document.getElementById('addbox').style.display = 'none';
                document.getElementById('blockUI').style.display = 'none';
            }
            
        }

        function edit_category(category_id,categoryName,description){
            document.getElementById('category_id').value = category_id;
            document.getElementById('categoryName').value = categoryName;
            document.getElementById('description').value = description;
        }


</script>

</body>
	</html>
	