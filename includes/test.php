<!-- Breadcrumb start-->
<section class="section second-section">
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

            <?php if ($menuDetail->colums_count != 1) { ?>
                <div class="col-lg-6 d-flex align-items-center  ">
                    <img src="<?php echo $menuDetail->image ?  $get->assets_url.'/'.$menuDetail->image : $get->assets_url.'/'.$get->logo; ?>" class="img-fluid  shadow-sm" alt="<?php echo $menuDetail->title; ?>" />
                </div>
            <?php } ?>
            
            <div class="<?php echo $menuDetail->colums_count == 1 ? 'col-sm-12' : 'col-lg-6 '; ?>">
                <div class="about-txt p-2 ">
                    <?php echo $menuDetail->content; ?>
                </div>
            </div>

        </div>
    </div>
</section>