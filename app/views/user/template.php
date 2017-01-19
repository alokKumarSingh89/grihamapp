<div class="wrapper-box">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"> 
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href=<?=$_SESSION["domain"]."?/user"?>>
                        <img src="public/images/logo.png" alt="Fallone logo" class="img-responsive" style="margin: -13px 0 0 0;max-height: 95px;">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-right top-nav menu-list">
                        <li class="dropdown">
                            <a href="return false;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i> <?= $user["firstName"]." ".$user["lastName"]?> <b class="caret"></b></a>
                            <ul class="dropdown-menu profile-bg" role="menu" aria-labelledby="dLabel" >
                                <li>
                                    <a href=<?=$_SESSION["domain"]."/?/user/profile"?>><i class="fa fa-fw fa-user"></i> Profile</a>
                                </li>
                                <li>
                                    <a href=<?=$_SESSION["domain"]."/?/user/setting"?>><i class="fa fa-fw fa-gear"></i>Settings</a>
                                </li>
                                <li>
                                    <a href=<?=$_SESSION["domain"]."/?/user/history"?>><i class="fa fa-fw fa-history"></i> History</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href=<?=$_SESSION["domain"]."/?/session/log_out"?>><i class="fa fa-fw fa-power-off "></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
        <div class="wrapper">
            <?php  
                require_once 'app/init.php';
                $app = new App;
            ?>
        </div>
        <header class="fallone-navbar" data-id="default-navbar">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="row">
                        <!-- .col-md-12 -->
                        <div class="col-md-12">
                            <div class="row">
                                <aside class="col-md-8 col-sm-8 col-xs-8 text-left">
                                    <p>2016© Copyright www.griham.in/fle. All Rights Reserved.</p>
                                </aside>
                                <aside class="col-md-4 col-sm-4 col-xs-4 text-left">
                                    <p>designed & develope &nbsp;by Alok Kumar Singh</p>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>