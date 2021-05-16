

<?php

/*requires a page which includes

$bloglink
$blogs

$maxToShow = 6;
$featuredFirst = true;

if maxToShow or featuredfirst are missing all are returned

*/

$blogsToShow = $blogLink->getActiveBlogs($maxToShow, $featuredFirst, FALSE);


//print_r($blogsToShow);

$a=1;
$b=count($blogsToShow);

foreach ($blogsToShow as $key=>$value){

?>




                <?php


  //show the row

  if ($b == 0){

    ?>

                <div class="row">
                    <p>No blogs yet</p>
                </div>


                <?php
    
  }

  if ($a == 1){
?>

                <div class="row">


                    <?php

  }

  $blogs->Load_from_key($value['id']);

  $blog_date = new DateTime($blogs->getcreated());
               $blog_date_readable = date_format($blog_date, "jS F Y");



?>


                    <div class="col-lg-4">
                        <div class="card hover-shadow-lg hover-translate-y-n10"
                            data-blog-id="<?php echo $value['id'];?>">
                            <a href="#">
                                <img alt="Image placeholder" src="../../assets/img/theme/light/img-1-800x600.jpg"
                                    class="card-img-top">
                            </a>
                            <div class="card-body py-5 text-center">
                                <a href="#" class="d-block h5 lh-150"><?php echo $blogs->getname();?></a>
                                <?php $users->Load_from_key($blogs->getauthor());?>


                                <h6 class="text-muted mt-4 mb-0">
                                    <?php echo $users->getfirstname() . ' ' . $users->getsurname();?></h6>

                                <h6 class="text-muted mt-4 mb-0"><?php echo $blog_date_readable;?></h6>
                            </div>
                            <!--  <div class="card-footer delimiter-top">
                <div class="row">
                  <div class="col text-center">
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item pr-4">
                        <a href="#" class="text-muted"><i class="fas fa-share mr-1 text-muted"></i> 131</a>
                      </li>
                      <li class="list-inline-item pr-4">
                        <a href="#" class="text-muted"><i class="fas fa-eye mr-1 text-muted"></i> 255</a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="text-muted"><i class="fas fa-comments mr-1 text-muted"></i> 14</a>
                      </li>
                    </ul>
                  </div>
                </div> -->

                        </div>
</div>





                        <?php



  //end the row

  if (($a % 3 == 0) ){
?>

                    </div>


                    <?php

  }

  $a++;

  



}




?>