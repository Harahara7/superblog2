<!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <?php
                if(isset($_POST['submit'])){

                $search = $_POST['search'];
                $query = "Select * from posts where post_tags LIKE '%$search%'";
                $statement = mysqli_query($connection,$query);

                    if(!$statement){

                        die("Houve uma falha no statement".mysqli_error($connection));

                    }//if

                    $count = mysqli_num_rows($statement);
                    if ($count == 0){

                      //  echo "<h1>Tag nao existe</h1>";

                    }

                }//if
                ?>
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    
                       
                    <?php
                    
                    $query = "Select * From categories";
                    $statement = mysqli_query($connection,$query);
                    
                    ?>
                    
                    
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php

                                while($row = mysqli_fetch_assoc($statement)){
                                $cat_title = $row['cat_title'];

                                echo"<li><a href='#'>{$cat_title}</a></li>";
                                }
                                ?>    
                                
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
               <?php include "widget.php"; ?>
            </div>
