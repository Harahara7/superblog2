<table class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
								<th>Content</th>
                                <th>Comments</th>
                                <th>Date</th>
								<th>Actions</th>
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
	$post_content = $row['post_content'];
    
    echo "<tr>";
    echo "<td>$post_id</td>";
    echo "<td>$post_author</td>";
    echo "<td>$post_title</td>";
    echo "<td>$post_category_id</td>";
    echo "<td>$post_status</td>";
    echo "<td><img width='100' height='100' src='../images/$post_image' ></td>";
    echo "<td>$post_tags</td>";
	echo "<td>$post_content</td>";
    echo "<td>$post_comment_count</td>";
    echo "<td>$post_date</td>";
	echo "<td>
	<a class='btn btn-danger' 
	href='posts.php?delete={$post_id}'>Delete?</a>
	<hr>
	<a class='btn btn-success'
	href='posts.php?source=edit_posts&get_post_id={$post_id}'>Edit</a>
	</td>";
	echo "";
    echo "</tr>";
}
                            ?>
                        </tbody>   
                    </table>

<?php
if(isset($_GET['delete'])){
	
	$post_id = $_GET['delete'];
	
	$query = "Delete From posts Where post_id ={$post_id}";
	$statement = mysqli_query($connection,$query);
	
}
?>
