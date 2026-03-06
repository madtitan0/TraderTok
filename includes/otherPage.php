<!-- Breadcrumb start-->
<section class="section second-section"  style="background-color: <?php echo $get->bg_color; ?> !important">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-9">
                <h2 class="bdc-head"><?php echo $menuDetail->title; ?></h2>
            </div>
            <div class="col-lg-3">
                <p class="bdc-txt pt-2">Home / <?php echo $menuDetail->title; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Breadcrumb END-->

<section>
    <div class="container">
        <div class="row pt-5">

            <?php if ($menuDetail->colums_count != 1 && $menuDetail->image) { 
              echo  '<div class="col-lg-6 d-flex align-items-center justify-content-center ">
                    <img src="' .$get->assets_url.'/'.$menuDetail->image .'" class="img-fluid  shadow-md" alt=" '.$menuDetail->title.'" />
                </div>' ;
           } ?>
            
            <div class="<?php echo $menuDetail->colums_count == 1 ? 'col-sm-12' : 'col-lg-6 '; ?>">
                <div class="about-txt p-2 ">
                    <?php echo $menuDetail->content; ?>
                </div>
            </div>

        </div>
    </div>
</section>