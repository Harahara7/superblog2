<?php 
include "includes/View/header.php"
?>
<div id="wrapper">

    <!-- Navigation -->

    <div id="page-wrapper">

        <div class="container-fluid">
            <?php 
                include "includes/View/navigation.php"
                ?>
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Admin Dashboard
                        <small>Author</small>
                    </h1>
                    <!--TABLE POST-->
                    <table class="table table-bordered table-hover table-responsive-lg">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
<?php 
$query = "Select * From posts";
$statement = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($statement)){
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    
    echo "<tr>";
    echo "<td>{$post_id}</td>";
    echo "<td>{$post_author}</td>";
    echo "<td>{$post_title}</td>";
    echo "<td>{$post_category_id}</td>";
    echo "<td>{$post_status}</td>";
    echo "<td><img width='100' height='100' src='images/{$post_image} alt='image'></td>";
    echo "<td>{$post_tags}</td>";
    echo "<td>{$post_comment_count}</td>";
    echo "<td>{$post_date}</td>";
    echo "</tr>";
}
                            ?>
                        </tbody>   
                    </table>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/View/footer.php" ?>