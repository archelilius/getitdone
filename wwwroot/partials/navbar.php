<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">357 Limited</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/index.php">Home</a>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Catagories<b class="caret"></b></a>
                    <ul class="dropdown-menu multi-column columns-3">
                        <div class="row">
                            <?php $products->getCategories(); ?>
                        </div>
                    </ul>
                </li>
                <li>
                    <a href="#">Browse</a>
                </li>
                <li>
                    <a href="/about.php">About</a>
                </li>
            </ul>
            <form class="navbar-form navbar-right" action="/action_page.php">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <div class="navbar-right" style="padding-right: 25px">
                <?php
                    if(isset($_SESSION['username'])){
                        echo '<li style=color:#EAEAEA> you logged in as <a href="#" ><strong>TestUser2', $_SESSION['username'],'</strong></a></li>',
                             '<li><a href="logout.php">logout</a></li>';
                    }else{
                        echo '<li id="reg"> <a href="#" style="font-size: 10px">Register</a> </li>',
                             '<li id="signin"> <a href="#" style="font-size: 10px">Login</a> </li>';
                    }
                ?>
            </div>
        </div>
    </nav>
    <!-- Registration Modal  -->
    <div class='container'>
        <div id="modal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">

                <!-- login modal content -->
                <div class="modal-content" id="login-modal-content">
        
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Login Now!</h4>
                    </div>
        
                    <div class="modal-body">
                        <form method="post" id="Login-Form" role="form">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                    <input name="email" id="email" type="email" class="form-control input-lg" placeholder="Enter Email" required data-parsley-type="email" >
                                </div>                      
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                    <input name="password" id="login-password" type="password" class="form-control input-lg" placeholder="Enter Password" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup">
                                </div>                      
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="" checked>Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-success btn-block btn-lg">LOGIN</button>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <p>
                            <a id="FPModal" href="javascript:void(0)">Forgot Password?</a> | 
                            <a id="signupModal" href="javascript:void(0)">Register Here!</a>
                        </p>
                    </div>
                </div>

                <div class="modal-content" id="signup-modal-content">
        
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Signup Now!</h4>
                    </div>
                
                    <div class="modal-body">
                        <form method="post" id="Signin-Form" role="form">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                    <input name="email" id="email" type="email" class="form-control input-lg" placeholder="Enter Email" required data-parsley-type="email">
                                </div>                     
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                    <input name="password" id="passwd" type="password" class="form-control input-lg" placeholder="Enter Password" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup">
                                </div>                      
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                    <input name="password" id="confirm-passwd" type="password" class="form-control input-lg" placeholder="Retype Password" required data-parsley-equalto="#passwd" data-parsley-trigger="keyup">
                                </div>                      
                            </div>
                            <button type="submit" class="btn btn-success btn-block btn-lg">CREATE ACCOUNT!</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <p>Already a Member ? <a id="loginModal" href="javascript:void(0)">Login Here!</a></p>
                    </div>
                </div>

                <div class="modal-content" id="forgot-password-modal-content">
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Recover Password!</h4>
                    </div>
                    
                    <div class="modal-body">
                        <form method="post" id="Forgot-Password-Form" role="form">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                    <input name="email" id="email" type="email" class="form-control input-lg" placeholder="Enter Email" required data-parsley-type="email">
                                </div>                     
                            </div>         
                            <button type="submit" class="btn btn-success btn-block btn-lg">
                                <span class="glyphicon glyphicon-send"></span> SUBMIT
                            </button>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <p>Remember Password ? <a id="loginModal1" href="javascript:void(0)">Login Here!</a></p>
                    </div>
        
                </div>        
                <!-- forgot password content -->
            </div>
        </div> 
    </div>
    <script>
        $('#signupModal').click(function(){         
            $('#login-modal-content').fadeOut('fast', function(){
                $('#signup-modal-content').fadeIn('fast');
            });
        });
            
        $('#loginModal').click(function(){          
            $('#signup-modal-content').fadeOut('fast', function(){
                $('#login-modal-content').fadeIn('fast');
            });
        });
        
        $('#FPModal').click(function(){         
            $('#login-modal-content').fadeOut('fast', function(){
                $('#forgot-password-modal-content').fadeIn('fast');
            });
        });
        
        $('#loginModal1').click(function(){          
            $('#forgot-password-modal-content').fadeOut('fast', function(){
                $('#login-modal-content').fadeIn('fast');
            });
        });

        $(document).ready(function(){
            $("#reg a").click(function(){
                $('#login-modal-content').fadeOut('fast');
                $('#forgot-password-modal-content').fadeOut('fast');
                $('#signup-modal-content').fadeIn('fast');
                $('#modal').modal();
            });
        });
        $(document).ready(function(){
            $("#signin a").click(function(){
                $('#login-modal-content').fadeIn('fast');
                $('#forgot-password-modal-content').fadeOut('fast');
                $('#signup-modal-content').fadeOut('fast');
                $('#modal').modal();
            });
        });
    </script>
</div>