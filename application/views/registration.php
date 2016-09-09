<div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2 reg ">
                <form method="POST" action="<?php echo base_url() ?>account/registration_insert" name="reg_form" >

                    <fieldset>
                        <h2>Account Details</h2>

                        <div class="form-group col-md-6 ">
                            <label  for="Full name">Full name</label>
                            <label id="error_full_name"></label>
                            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full name">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="nickname">Nickname</label>
                            <label id="error_nickname"></label>
                            <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Nickname">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">Email</label>
                             <label id="error_email"></label> &nbsp <label id="error_email1"></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <label id="error_password"></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="confirm_password">Confirm Password</label>
                            <label id="error_confirm_password"></label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="confirm Password">
                        </div>


                    </fieldset>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" name="register" id="register" onclick="provera1()" class="btn btn-primary regbut">
                                Register
                            </button>       
                        </div>
                    </div>

                </form>

            </div>

        </div>
  