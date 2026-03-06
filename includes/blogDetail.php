
<section>
    <div class="container">
        <div class="row pt-5">

            <?php if ($blogDetail->colums_count != 1 && $blogDetail->image) { 
              echo  '<div class="col-lg-6 d-flex align-items-center justify-content-center ">
                    <img src="' .$get->assets_url.'/'.$blogDetail->image .'" class="img-fluid  shadow-md" alt=" '.$blogDetail->title.'" />
                </div>' ;
           } ?>
            
            <div class="<?php echo $blogDetail->colums_count == 1 ? 'col-sm-12' : 'col-lg-6 '; ?>">
            <h3 style="text-align: center;"><?php echo $blogDetail->title; ?></h3>
                <div class="about-txt p-2 ">
                    <?php echo $blogDetail->content; ?>
                </div>
            </div>

        </div>
    </div>
</section>