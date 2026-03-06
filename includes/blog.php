
<section>
    <div class="container">  
            <div class="row my-4">
                <div class="col-sm-9">
                  <div class="row">
                    <?php if(isset($_GET["id"])){ ?>

                        <?php foreach($blog as $blog1): ?>
                            <?php if($blog1->hidden==false && $blog1->category_id == $_GET["id"]) {?>
                            <div class="col-sm-4 mb-4">
                                <div class="card" >
                                    <img src="<?php echo $get->assets_url.'/'.$blog1->image; ?>" class="card-img-top" style="height:15em" >
                                    <div class="card-body">
                                    <h5 class="card-title"><?php echo $blog1->title; ?></h5>
                                        <p class="card-text"><?php echo $blog1->spot; ?></p>
                                        <a <?php if ( isset($_GET["id"]) && $_GET["id"] == $blog1->id){echo 'link-dark';}else{echo 'text-muted';} ?> href="./blogDetail?id=<?php echo $blog1->id; ?>" class="btn btn-primary">Devamını Oku</a>
                                    </div>
                                </div>
                            </div>
                            
                            <?php } ?>
                        <?php endforeach ?>

                    <?php }else{ ?>

                        <?php foreach($blog as $blog1): ?>
                            <?php if($blog1->hidden==false ) {?>
                            <div class="col-sm-4 mb-4">
                                <div class="card" >
                                    <img src="<?php echo $get->assets_url.'/'.$blog1->image; ?>" class="card-img-top" style="height:15em" >
                                    <div class="card-body">
                                    <h5 class="card-title"><?php echo $blog1->title; ?></h5>
                                        <p class="card-text"><?php echo $blog1->spot; ?></p>
                                        <a <?php if ( isset($_GET["id"]) && $_GET["id"] == $blog1->id){echo 'link-dark';}else{echo 'text-muted';} ?> href="./blogDetail?id=<?php echo $blog1->id; ?>" class="btn btn-primary">Devamını Oku</a>
                                    </div>
                                </div>
                            </div>
                            
                            <?php } ?>
                        <?php endforeach ?>

                    <?php } ?>
                  </div>
                </div>
                <div class="col-sm-3 ">
                    <div class="menu shadow rounded pt-2 pb-4">
                        <ul class="list-group list-group-flush text-end">
                            <li class="list-group-item text-center active mb-3" aria-current="true">Categories</li>
                            <?php 
                                foreach($blog_category as $blogCategory):
                            ?>
                                <li class="list-group-item border-bottom "><a class=" text-decoration-none <?php if ( isset($_GET["id"]) && $_GET["id"] == $blogCategory->id){echo 'link-dark';}else{echo 'text-muted';} ?>" href="./blog?id=<?php echo $blogCategory->id; ?>"><?php echo $blogCategory->title; ?></a></li> 
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div> 
    </div>
</section>