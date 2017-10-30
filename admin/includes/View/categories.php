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
                        <div class="col-xs-6">
                            <form action="">
                                <div class="form-group">
                                    <input type="text" name="cat_title" /> 
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category"/> 
                                </div>
                                
                            </form>
                        </div> 
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/View/footer.php" ?>