<?php

if(isset($_GET['get_post_id'])){
	
$get_post_id = $_GET['get_post_id'];
	
$query = "Select * From posts where post_id = $get_post_id";
$statement = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($statement)){
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
	$post_content = $row['post_content'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
	}//while
	
	if(isset($_POST['update_post'])){
		
	$post_title = $_POST['title'];
	$post_author = $_POST['author'];
	$post_category_id = $_POST['post_category_id'];
	$post_status = $_POST['status'];
	$post_image = $_FILES['image']['name'];
	$post_image_tmp = $_FILES['image']['tmp_name'];
	$post_tags = $_POST['post_tags'];
	$post_content = $_POST['post_content'];
	
	move_uploaded_file($post_image_tmp, "../images/$post_image");
		
	if(empty($post_image)){
		//this fixes the img null after update!
		//if the img is empty, recover its name
		//and overwrite $post_image
	$query = "SELECT * FROM posts WHERE post_id = {$get_post_id}";
	$img_statement = mysqli_query($connection,$query);
		
		while($row = mysqli_fetch_array($img_statement)){
			
		$post_image = $row['post_image'];
			
		}//while
		
	}//if
		
	$query = "UPDATE posts SET
	post_title = '{$post_title}',
	post_category_id = '{$post_category_id}',
	post_date = now(),
	post_author = '{$post_author}',
	post_status = '{$post_status}',
	post_tags = '{$post_tags}',
	post_content = '{$post_content}',
	post_image = '{$post_image}'
	WHERE post_id = {$post_id}
	";
		
	$statement = mysqli_query($connection,$query);
	confirm_query($statement);
		
	}//if
	
}//if
?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title" value="<?php echo $post_title ?>"/>
	</div>
	
	<div class="form-group">
		<select name="post_category_id" id="">
			<?php
			$query = "SELECT * FROM categories";
            $statement = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($statement)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
			
			confirm_query($statement);
				
			echo "<option value='$cat_id'>{$cat_title}</option>";
				
			}
			?>
		</select>
	</div>
	
	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input type="text" class="form-control" name="author" value="<?php echo $post_author ?>"/>
	</div>
	
	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input type="text" class="form-control" name="status" value="<?php echo $post_status ?>"/>
	</div>
	<label for="post_image">Post Image</label>
	<div class="form-group">
		<img 
		src="../images/<?php echo $post_image ?>" 
		width="225" height="225"
		/>
		<input type="file" name="image" />
	</div>
	
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags ?>"/>
	</div>
	
	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea  class="form-control" name="post_content" id="" cols="10" rows="15">
			<?php echo $post_content?>
		</textarea>
	</div>
	
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
	</div>
	
</form>