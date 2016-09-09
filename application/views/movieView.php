<!-- Page Content -->
<div class="container">

    <!-- Marketing Icons Section -->
    <div class="row" >
        <div class="col-xs-5 col-sm-3 b5">
            <div id="down">
                <?php foreach ($film_info as $f) { ?>
                    <img src="<?php echo base_url();
                echo $f['slika']; ?>" alt="" class=" img-responsive center-block bor" target="_blank" /> 

                </div>  
            </div>
            <!-- /.row -->
            <div id="movie-info" class="col-xs-10 col-sm-14 col-md-7 col-lg-5  b5">
                <div class="hidden-xs ">

                    <h1><?php echo $f['naziv'] ?></h1>
                    <h2><?php echo $f['godina_nastanka'] ?></h2>
                    <?php foreach ($zanrovi as $z) { ?>
                        <h2 class="inline" ><?php echo $z['naziv_zanra'] ?> </h2> &nbsp;    
    <?php } ?>  

                    <br/><br/>
                    <p class="hidden-xs hidden-sm">
                        <em class="pull-left ">Available in: &nbsp;</em>
                        <a class="resolution" href="<?php echo $f['tor_link_720p']; ?>" rel="nofollow" title="Download The Conjuring 2 720p Torrent">720p</a>

                        <?php $d = $f['tor_link_1080p'];
                        if (!empty($d)) {
                            ?>
                            <a class="resolution" href="<?php echo $f['tor_link_720p']; ?>" rel="nofollow" title="Download The Conjuring 2 720p Torrent">1080p</a>
    <?php }
    ?>

                    </p>

                </div>

                <div class="bottom-info">
                    <div class="rating-row">
                        <a class="icon" href="<?php echo $f['imdb_link']; ?>" title="IMDb Rating" target="_blank"> <img src="<?php echo base_url(); ?>Images/logo-imdb.svg" alt="IMDb Rating"> </a>
                        <span itemprop="ratingValue"><?php echo $f['imdb_rejting'] ?></span>
                        <span class="hidden-xs icon-star"></span>
                    </div>
                    <a class="button-green-download2-big1 "  href="<?php echo $f['tor_link_720p'] ?>"><span class="icon-in"></span>Download </a>
                </div>
            </div>
<?php } ?> 
        <div id="crew" class="col-sm-10 col-md-7 col-lg-4 b3">
            <div class="actors">
                <h2>Cast</h2>
<?php foreach ($glumci as $glumac) { ?>      
                    <div class="list-cast ">
                        <div class="tableCell ">
                            <a class="avatar-thumb" href="<?php echo $glumac['link_imdb'] ?>" target="_blank" title="IMDb Profile"> <img src="<?php echo $glumac['slika_glumca'] ?>" alt="Patrick Wilson Picture"> </a>
                        </div>
                        <div class="list-cast-info tableCell">
                            <a target="_blank" class="name-cast" href="<?php echo $glumac['link_imdb'] ?>"><span itemprop="actor" ><span><?php echo $glumac['ime'] ?></span></span></a> 
                        </div>
                    </div>
<?php } ?>  
            </div>
        </div>
    </div>
    <hr/>
    <div class="row c2">
        <div id="synopsis" class="col-lg-5 ">
            <h3>Synopsis</h3>
            <?php
            foreach ($film_info as $film) {
                echo $film['opis'];
            }
            ?>
        </div>
        <!-- Blog Post Content Column -->
        <div class="col-lg-6 marg ">
            <!-- Blog Comments -->

            <!-- Comments Form -->
            <?php if (isset($session['uloga'])) { ?>
            <div class="well ">
                <h4>Leave a Comment:</h4>
                <form form method="POST" action="<?php echo base_url() ?>movie/komentari" name="kom_form" >
                    <div class="form-group">
                        <textarea class="form-control" id="textarea" name="textarea" rows="3"></textarea>
                    </div>
                    <?php foreach ($film_info as $fid) { ?>
                    <input type="hidden" name="filmid" id="filmid" value="<?php echo $fid['id']  ?>"/>
                    <?php }?>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <?php } ?>
            <div id="okvir"> 
            <!-- Posted Comments -->
<?php foreach ($komentari as $komentar) { ?>
                <div  class="media ">
                    <div id="kom" class="media-object pull-left">
                        <img class=" img-responsive krug " src="<?php echo base_url();
    echo $komentar['slika']; ?>" alt="">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading s"><?php echo $komentar['nadimak']; ?>
                            <small > <?php echo date('F d,Y \a\t h:i a', $komentar['vreme_unosa']); ?></small>
                        </h4>
    <?php echo $komentar['tekst'] ?>
                    </div>
                </div>
           
<?php } ?>
           </div>
            <!-- Comment -->        
        </div>   
    </div>


    <hr/>


