<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <?php 
            if (isset($_GET['delcat'])) {
              $delid=$_GET['delcat'];
              $delquery="DELETE FROM tbl_catagory WHERE id='$delid'";
              $deldata=$db->delete($delquery);
              if ($deldata) {
                 echo "<span class='success'>Data Deleted   Successfully!!</span>";
              }
              else{
                  echo "<span class='error'>Data not Deleted Successfully!!</span>";
              }

            }
         ?>
        <div class="block">        
            <table class="data display datatable" id="example">
               <thead>
                  <tr>
                     <th>Serial No.</th>
                     <th>Category Name</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                <?php 
                    $query="SELECT * FROM tbl_catagory order by id desc";
                   $catagory= $db->select($query);
                   if ($catagory) {
                    $i=0;
                       while ($result=$catagory->fetch_assoc()) {
                         $i++;  
                    
                 ?>
              <tr class="odd gradeX">
                 <td><?php echo $i; ?></td>
                 <td><?php echo $result['name']; ?></td>
                 <td><a href="editcat.php?catid=<?php echo $result['id']; ?>">Edit</a> || <a onclick="return confirm('Are you Sure to Delete');" href="?delcat=<?php echo $result['id']; ?>">Delete</a> </td>
             </tr>
             <?php    }
                   } ?>
            
         </tbody>
     </table>
 </div>
</div>
</div>
<?php include'inc/footer.php';?>