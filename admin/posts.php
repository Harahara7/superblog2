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
                    
                    <?php
	
                    if(isset($_GET['source'])){
                        
                    $source = $_GET['source'];
                            
                    } else {
						
					$source = '';
						
					}//else
            
                    switch($source){
                            
                    case "add_posts";
					include "includes/View/add_posts.php";			
                    echo "";
                    break;
                            
                    default:     
							
					include "includes/View/view_posts.php";
                            
                    }//switch

                    ?>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/View/footer.php" ?>