<!DOCTYPE html>
<html lang="en">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content=""/>

        <title>Fluxar</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>css/modern-business.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url(); ?>css/customise.css" rel="stylesheet" type="text/css"/>
 


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top meni " role="navigation" >
            <div class="container ">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand logo" href="<?php echo base_url(); ?>">Fluxar</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <?php foreach ($meni as $link) { ?>
                            <?php if ($link['naziv'] != 'Login' && $link['naziv'] != 'Sort' && $link['naziv'] != 'Dokumentacija') { ?>
                                <li> <a href="<?php echo base_url() . $link['link']; ?>"><?php echo $link['naziv'] ?></a></li>
                            <?php } ?> 
                            <?php if ($link['naziv'] == 'Dokumentacija') { ?>
                                <li> <a href="<?php echo base_url() . $link['link']; ?>" target="_blank"><?php echo $link['naziv'] ?></a></li>
                            <?php } ?>
                            <?php if (!isset($session['uloga'])) { ?>
                                <?php if ($link['naziv'] == 'Login') { ?>
                                    <li id="lg"> <a  href="#" data-toggle="modal" data-target="#login-modal"><?php echo $link['naziv'] ?></a></li>
                                <?php } ?>  
                            <?php } ?> 

                            <?php if ($link['podmeni'] == 1) { ?>
                                <li class="dropdown" > <a class="dropdown-toggle" data-toggle="dropdown" title="<?php echo base_url() . $link['naziv'] ?>" style="cursor:pointer;"><?php echo $link['naziv']; ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">	
                                        <?php foreach ($zanr as $podlink) { ?>			
                                            <li><a href="<?php echo base_url() ?>pocetna/sort/<?php echo $podlink['naziv_zanra'] ?>" title="<?php echo $podlink['naziv_zanra'] ?>" > <?php echo $podlink['naziv_zanra'] ?> </a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <?php
                            }
                        }
                        ?>   
                        <?php if (isset($session['uloga'])) { ?>   
                            <?php if ($session['korisnik_id'] == 1) { ?>   
                                <li ><a href='<?php echo base_url(); ?>admin/admin_panel'> Admin panel</a>  <li>   
                                <?php } ?>    
                            <?php } ?>

                            <?php if (isset($session['uloga'])) { ?>   
                            <li id="lg"><a href='<?php echo base_url(); ?>account/logout'><?php echo $session['nadimak']; ?> (Logout)</a>  <li>   
                            <?php } ?>
                            </div>
                            <!-- /.navbar-collapse -->
                            </div>
                            <!-- /.container -->
                            </nav>
                            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="loginmodal-container">
                                        <h1>Login to Your Account</h1><br>
                                        <form method="POST" action="<?php echo base_url() ?>account/logIn" name="loginForm">
                                            <div id="userGreska"></div>  
                                            <input type="text" name="user" id="user" placeholder="Username">
                                            <div id="pasGreska"></div>  
                                            <input class="pass" type="password" name="pass" id="pass" placeholder="Password">

                                            <input type="submit" name="login" id="login" class="login loginmodal-submit" value="Login" onclick="provera()">
                                        </form>

                                        <div class="login-help">
                                            You dont have account? &nbsp;<a href="<?php echo base_url(); ?>account/registration"><h5> Register </h5> </a> 
                                        </div>
                                    </div>
                                </div>
                            </div>

