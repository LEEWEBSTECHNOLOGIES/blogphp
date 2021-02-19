<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<h1>Academics</h1>
<?php
$branch = $_GET['branches'];
$branch_string = str_replace("-", " ", $branch);

$academic_page = "SELECT dept_category.name, dept_category_list.section, dept_category_list.name AS dpt_list_name, dept_category_list.description AS dpt_list_description FROM dept_category
INNER JOIN dept_category_list WHERE dept_category.name='$branch_string' ";
$academic_page_run = mysqli_query($connection, $academic_page);

if (mysqli_num_rows($academic_page_run) > 0) {
    ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Department Category Name</th>
                <th>List</th>
                <th>Description</th>
                <th>Section</th>        
            </tr>    
        </thead>
        <tbody>
            <?php
                while ($ada = mysqli_fetch_array($academic_page_run)) {
            ?>
            <tr>
                <td><?php echo $ada['name']; ?></td>
                <td><?php echo $ada['dpt_list_name']; ?></td>
                <td><?php echo $ada['dpt_list_description']; ?></td>
                <td><?php echo $ada['section']; ?></td>
            
            </tr>
            <?php } ?>
        
        </tbody>
    </table>

    
        
        

    <?php
} else {
    echo "No Department Data Available";
}





?>






<?php include('includes/footer.php'); ?>