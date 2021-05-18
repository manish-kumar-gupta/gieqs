
            <section class="">
                <?php $users->Load_from_key($blogs->getauthor());?>

                <div class="container pt-6">
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <h1 class="lh-150 mb-3"><?php echo $blogs->getname();?></h1>
                            <p class="lead text-muted mb-0"><?php echo $blogs->getpreheader();?></p>
                            <div class="media align-items-center mt-5">
                                <div>
                                    <a href="#" class="avatar rounded-circle mr-3">
                                        <img alt="Image placeholder"
                                            src="<?php echo BASE_URL;?><?php if ($users->getgender() == 1){echo "/assets/img/icons/people/white-female.png";}?><?php if ($users->getgender() == 2){echo "/assets/img/icons/people/white-male.png";}?>"
                                            class="card-img-top">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <span
                                        class="d-block h6 mb-0"><?php echo $users->getfirstname() . ' ' . $users->getsurname();?></span>
                                    <?php 
                
               //work the date
               $blog_date = new DateTime($blogs->getcreated());
               $blog_date_readable = date_format($blog_date, "l jS F Y");

              
               
               $imagesCovers = [

                1 => [0 => '/assets/img/blog/covers/colonoscopy_1920x600.png', ], //Colon Tutor
                2 => [0 => '/assets/img/blog/covers/polypectomy_1920x600.png', ], //Polyp Tutor
                3 => [0 => '/assets/img/blog/covers/imaging_1920x600.png', ], //Imaging Tutor
                4 => [0 => '/assets/img/blog/covers/gastroscopy_1920x600.png', ], //Gastroscopy Tutor
                5 => '', //GIEQs Topics Tutor
                6 => '', //Nursing Tutor
                7 => '', //ERCP Tutor
                8 => '', //EUS Tutor
                9 => '', //Therapeutic EUS Tutor
                10 => [0 => '/assets/img/blog/covers/complex_polypectomy_1920x600.png', ], //Complex Resection Tutor
                11 => [0 => '/assets/img/blog/covers/submucosal_1920x600.png', ], //Submucosal Endoscopy Tutor
                0 => '', //Video Nav
            
            
              ];

                
                ?>
                                    <span class="text-sm text-muted"><?php echo $blog_date_readable;?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--     <section class="bg-cover bg-size--cover" style="height: 200px; background-image: url('../../assets/img/backgrounds/endoscopy.jpg'); background-position: top center;"></section>
 -->

 

 <?php 
 
 
 //echo $blogs->getsubject();
 
 if (array_key_exists($blogs->getsubject(),$imagesCovers)) {

  $countImagesArray = count($imagesCovers[$blogs->getsubject()]) - 1;
  $random_number = mt_rand(0, $countImagesArray);

   ?>
            <section class="bg-cover mt-5"
                style="height: 250px; background-image: url('<?php echo BASE_URL . $imagesCovers[$blogs->getsubject()][$random_number];?>'); background-position: top center; background-size: contain;">
            </section>

<?php }?> 

            <section class="slice">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <!-- Article body -->
                            <article>

                                <?php

$emailContents = $blogLink->getEmailContents($blogs->getid());

$x = 0;

//var_dump($emailContents);

foreach ($emailContents as $key=>$value){

   





if ($value['img'] != NULL){

    ?>

                                <figure class="figure">
                                    <img alt="Image placeholder" src="<?php echo BASE_URL . $value['img'];?>"
                                        class="img-fluid rounded">
                                    <figcaption class="mt-3 text-muted"><?php echo $value['text'];?></figcaption>
                                </figure>


                                <?php

}elseif ($value['video'] != NULL){

    ?>

                                <div class="row d-flex flex-wrap align-items-lg-stretch py-4 px-0">



                                    <div class="col-lg-12 pt-0 p-4">

                                        <div style="padding:56.25% 0 0 0;position:relative;"><iframe
                                                src="<?php echo 'https://player.vimeo.com/video/' . $value['video'] . '?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479';?>"
                                                frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
                                                allowfullscreen
                                                style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                                        </div>
                                        <figcaption class="mt-3 text-muted"><?php echo $value['text'];?></figcaption>


                                    </div>

                                </div>

                                <?php

    
}else{

    ?>
                                <p class="lead"> <?php echo $value['text'];?></p>

                                <?
    
  }
  
  
  
  ?>






                                <?php 
  
  $x++;
  
  }?>

                                <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <p class="lead">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
              <h5>First thing you need to do</h5>
              <figure class="figure">
                <img alt="Image placeholder" src="../../assets/img/theme/light/img-3-800x600.jpg" class="img-fluid rounded">
                <figcaption class="mt-3 text-muted">Figure one: Type here your description</figcaption>
              </figure>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <h5>Second thing you need to do</h5>
              <figure class="figure">
                <img alt="Image placeholder" src="../../assets/img/theme/light/img-4-800x600.jpg" class="img-fluid rounded">
                <figcaption class="mt-3 text-muted">Figure two: Type here your description</figcaption>
              </figure>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
             -->
                            </article>
                            <!-- <hr>
            <h5 class="mb-4">Comments</h5>
            <div class="mb-3">
              <div class="media media-comment">
                <img alt="Image placeholder" class="rounded-circle shadow mr-4" src="../../assets/img/theme/light/team-2-800x800.jpg" style="width: 64px;">
                <div class="media-body">
                  <div class="media-comment-bubble left-top">
                    <h6 class="mt-0">Alexis Ren</h6>
                    <p class="text-sm lh-160">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                    <div class="icon-actions">
                      <a href="#" class="love active">
                        <i class="fas fa-heart"></i>
                        <span class="text-muted">10 likes</span>
                      </a>
                      <a href="#">
                        <i class="fas fa-comment"></i>
                        <span class="text-muted">1 reply</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="media media-comment">
                <img alt="Image placeholder" class="rounded-circle shadow mr-4" src="../../assets/img/theme/light/team-3-800x800.jpg" style="width: 64px;">
                <div class="media-body">
                  <div class="media-comment-bubble left-top">
                    <h6 class="mt-0">Tom Cruise</h6>
                    <p class="text-sm lh-160">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                    <div class="icon-actions">
                      <a href="#" class="love active">
                        <i class="fas fa-heart"></i>
                        <span class="text-muted">20 likes</span>
                      </a>
                      <a href="#">
                        <i class="fas fa-comment"></i>
                        <span class="text-muted">3 replies</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="media media-comment align-items-center">
                <img alt="Image placeholder" class="avatar rounded-circle shadow mr-4" src="../../assets/img/theme/light/team-1-800x800.jpg">
                <div class="media-body">
                  <form>
                    <div class="form-group mb-0">
                      <div class="input-group input-group-merge border">
                        <textarea class="form-control" data-toggle="autosize" placeholder="Write your comment" rows="1"></textarea>
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button">
                            <span class="fas fa-paper-plane"></span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div> -->
                        </div>
                    </div>
                </div>
        </div>
        </section>

        <section class="slice bg-section-secondary delimiter-top delimiter-bottom">
            <div class="container">

                <div class="mb-5 text-center">
                    <h3 class=" mt-4">Latest from the blog</h3>
                    <div class="fluid-paragraph mt-3">
                        <p class="lead lh-180">Weekly nuggets focussed on Everyday techniques. Monthly evening
                            round-ups.</p>
                    </div>
                </div>

                <?php


$maxToShow = 3;
$featuredFirst = false;

require(BASE_URI. '/pages/learning/scripts/show_blogs.php');

?>





                </div>
        </section>

       