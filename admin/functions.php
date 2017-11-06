<?php

function insertCategories(){
    
global $connection;
    //A MUST!!
    //if $connection isn`t Global, other .php`s cannot view the connection with DB!
    if(isset($_POST['submit'])){
    $cat_title = $_POST['cat_title'];
    if($cat_title == "" || empty($cat_title)){
    echo "<h5 style='color:red;'>Field Should not be Empty</h5>";
    } else {
    $query = "INSERT INTO categories(cat_title) VALUES ('{$cat_title}')";
    $statement = mysqli_query($connection, $query);
    if(!$statement){
    die('Insert Failed' . mysqli_error($connection));
            }//if
        }//else
    }//if
}//insertCategories

function selectAllCategories(){

global $connection;
    
    $query = "Select * From categories";
    $statement = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($statement)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>Remove</a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
    // ?delete is the $_GET key below at (isset)
    echo "</tr>";
    }
}//selectAllCategories

function deleteCategories(){

global $connection;
    
    if(isset($_GET['delete'])){
    $getCatId = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$getCatId}";
    $statement = mysqli_query($connection, $query);
    header("Location: categories.php");
    }//if
}//deleteCategories

function confirm_query($statement){
	
	global $connection;
	
		if(!$statement){
		
		echo "Query Failed! " . mysqli_error($connection);
		
	}
	
}//confirm_query

?>
