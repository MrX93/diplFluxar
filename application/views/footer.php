<!-- Footer -->
<footer>
    <div class="footerica"  >
        <div  class="col-lg-12 footer"></br>
            <div class="col-lg-6 pull-right text-right">


            </div>

            <div class="col-lg-12 text-center">
                <?php foreach ($meni as $link) { ?>
                    <?php if ($link['naziv'] != 'Login' && $link['naziv'] != 'Sort' && $link['naziv'] != 'Dokumentacija') { ?>
                        <a href="<?php echo base_url() . $link['link']; ?>"><?php echo $link['naziv'] ?></a> &nbsp
                    <?php } 
                }
                ?> 
                        <?php if (isset($session['uloga'])) { ?>   
                               <a id="lg"  href='<?php echo base_url(); ?>account/logout'><?php echo $session['nadimak']; ?> (Logout)</a>   
                       <?php } ?>
            </div><br/><br/>
            <div  class="col-lg-12 text-center"> <p> Copyright © 2016, Fluxar,All rights reserved. Nikola Milicevic.</p> </div>
        </div>
    </div>
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->

<script src="<?php echo base_url() ?>js/jquery-2.2.1.min.js" type="text/javascript"></script>



<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>

<script src="<?php echo base_url() ?>js/reg_izrazi.js" type="text/javascript"></script>

<script src="<?php echo base_url() ?>js/admin_panel.js" type="text/javascript"></script>

</body>

</html>