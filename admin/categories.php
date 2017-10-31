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
                                insertCategories();
                                ?>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category"/> 
                                </div>
                            </form>
                            
                            <?php //Update Form!
                            if(isset($_GET['edit'])){
                                $cat_id_update = $_GET['edit'];
                                include "includes/Model/update_categories.php";
                            }//if
                            ?>
                            
                        </div> 
                        <div class="col-xs-6">
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
                                    selectAllCategories();
                                    ?>
                                    <?php
                                    deleteCategories();
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