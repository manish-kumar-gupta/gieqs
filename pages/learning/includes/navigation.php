

    <?php

//error_reporting(E_ALL);


      //define user access level

      
      ?>

<div class="d-flex align-items-end">
        <?php

        $requiredTagCategories = ['39', '40', '41', '42'];

        ?>
        <div class="container mt-4 pt-0 bg-dark text-white" style="border: 1px solid #1b385d;">
        <div class="d-flex">
            <span class='mr-auto p-2'>Navigator</span>

            <span class='p-2 bd-highlight text-muted'>xx items shown</span>
            <span class='p-2 bd-highlight' data-toggle="tooltip" data-placement="bottom" title="search"><i class="cursor-pointer fas fa-search"></i></span>
            
                    <span class='p-2 bd-highlight'><i id="navigatorCollapseButton" class="cursor-pointer fas fa-chevron-down"
                    data-toggle="collapse" data-target="#navigatorCollapse"></i></span>

        </div>
        <div id="navigatorCollapse" class="collapse show">
            <div class="d-flex flex-wrap justify-content-start mt-1 pt-0 bg-dark text-white">

        <?php

        foreach ($requiredTagCategories as $key=>$value){

           //echo $value;

           $tagCategory = $value;

            $data = $navigator->generateNavigationSingle($value);

            
            ?>

            <div class="d-flex m-2 pt-0 bg-dark-light text-white flex-fill">
            
            <a class='p-2 bd-highlight' data-toggle="dropdown" data-flip="false"><i class="cursor-pointer fas fa-chevron-down"></i></a>

            <div class="dropdown-menu bg-dark-light text-white" aria-labelledby="dropdownMenuButton">
            <?php

            foreach ($data as $key=>$value){

                //generate HTML

                ?>

                   
                    
                        <a class="dropdown-item text-white">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input tag" id="tag<?php echo $value['id'];?>" data="<?php echo $value['id'];?>">
                                <label class="custom-control-label" for="tag<?php echo $value['id'];?>"><?php echo $value['name'];?></label>
                            </div>
                        </a>


            <?php 
                    }

            ?>
                    </div>
                    <span class='mr-auto p-2'><?php echo $general->getCategoryName($tagCategory);?></span>
                    <!--<span class='p-2 bd-highlight'>x</span>-->

                </div>

                <?php

            

            

        }
        
       

        ?>
            </div>


        </div>
    </div>
</div>