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
                        <!--Add Category Form-->
                        <div class="col-xs-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title" /> 
                                </div>
                                <?php 
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
                        ?>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category"/> 
                                </div>
                            </form>
                        </div> 
                        <div class="col-xs-6">
                            <?php

                            $query = "Select * From categories";
                            $statement = mysqli_query($connection,$query);

                            ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                    while($row = mysqli_fetch_assoc($statement)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "</tr>";
                                    }
                                    ?>    
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/View/footer.php" ?>