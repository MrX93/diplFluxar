<!-- Page Content -->
<div class="container">

    <!-- Marketing Icons Section -->
    <div class="row" >
        <div class="col-lg-12 slova" >
            <h1 class="page-header center-block">
                Download movies on Fluxar
            </h1>
        </div>  
               <?php foreach ($film as $info) { ?>
            <div class="col-xs-5 col-sm-3">
                <div class="panel-body paneli">
                    <a href="<?php echo base_url() ?>movie/film_info/<?php echo $info['id'] ?>">
                        <figure class="figure">    <img src="<?php echo base_url().$info['slika'] ?>" alt="" class=" img-responsive center-block" /> </figure>
                        <figcaption class="figcaption hidden-xs hidden-sm"> 		
                            <span class="icon-star"><p class="star"> <i class="fa fa-star fa-2x" aria-hidden="true"></i> </p>
                                <h4 class="rating"><?php echo $info['imdb_rejting'] ?></h4>
                                <h4><?php echo $info['glavni_zanr'] ?></h4> 
                                <span class="button-green-download2-big">View Details</span>
                        </figcaption>
                    </a>
                </div>  
            </div>
        <?php } ?> 
   
   
    </div>
    <!-- /.row -->
    <hr>


