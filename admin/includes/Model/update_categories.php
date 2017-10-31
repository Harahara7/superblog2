<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Update Category</label>
                <?php
                if(isset($_GET['edit'])){
                $cat_id = $_GET['edit'];
                $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                $statement = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($statement)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                }//while
                ?>
            <input value="<?php if(isset($cat_title)){
             echo $cat_title;
             } ?>" type="text" class="form-control" name="cat_title">
            <?php }//if ?>
                <?php
                if(isset($_POST['update'])){
                $cat_title = $_POST['cat_title'];
                $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id_update}";
                    //$cat_id_update came from categories.php
                $statement = mysqli_query($connection, $query);
                if(!statement ){
                    die("Update Failed" . mysqli_error($connection));
                    }//if
                }//if
                ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="Update Category" />
    </div>
</form>