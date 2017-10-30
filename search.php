<!-- Header -->
<?php
include "includes/View/header.php";
?>
<!-- Navigation -->
<?php
include "includes/View/navigation.php";
?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            if (isset($_POST['submit'])) {

                $search = $_POST['search'];
                $query = "Select * from posts where post_tags LIKE '%$search%'";
                $statement = mysqli_query($connection, $query);

                if (!$statement) {

                    die("Houve uma falha no statement" . mysqli_error($connection));

                }//if

                $count = mysqli_num_rows($statement);
                if ($count == 0) {

                    echo "<h1>Não foi possível encontrar posts relacionados</h1>";

                } else {

                    while ($row = mysqli_fetch_assoc($statement)) {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
            ?>
                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>

                        <!-- First Blog Post -->
                        <h2>
                            <a href=""><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href=""><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        <a class="btn btn-primary" href="#">Read More <span
                                    class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

            <?php   }//while

                }//else

            }//if

            ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->

        <?php
        include "includes/View/sidebar.php";
        ?>

    </div>
    <!-- /.row -->
    <hr>

    <?php
    include "includes/View/footer.php";
    ?>
