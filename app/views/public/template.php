<div>
        
        <header class="fallone-navbar" data-id="default-navbar">
            <nav class="navbar navbar-default" style="min-height: 59px;">
                <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">
                            <img src="public/images/logo.png" alt="Fallone logo" class="img-responsive" style="width: 40%;margin: 0;height: 70px;margin-top: -7px;">
                        </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href=<?=$_SESSION["domain"]."?/pages/login"?> >Login<!-- <span class="caret"></span> --></a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href=<?=$_SESSION["domain"].""?>>Home</a></li>
                        <li><a href=<?=$_SESSION["domain"]."?/pages/howitwork"?>>How It Works</a></li>
                        <li><a href=<?=$_SESSION["domain"]."?/pages/about-us"?>>About Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    </header>
    <div class="main-content">
        <?php  
            require_once 'app/init.php';
            $app = new App;
        ?>
    </div>
    <!-- Footer Parts -->
    <header class="fallone-navbar" data-id="default-navbar">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="row">
                    <!-- .col-md-12 -->
                    <div class="col-md-12">
                        <!-- .row -->
                        <div class="row">
                            <aside class="col-md-3 col-sm-6 col-xs-12 text-left">
                                <h3 class="uppercase">About Us</h3>
                                <span class="line-sep-gray"></span>
                                <a href="mailto:#" class="ac-colore">
                    GRIHAM, a Multi Service Provider Company, established in 2006 with the basic idea of educating and training the common people to cope-up with the ever changing Technology world and to create. 
                  </a>
                            </aside>
                            <aside class="col-md-3 col-sm-6 col-xs-12 text-left">
                                <h3 class="uppercase">Help&amp;Support</h3>
                                <span class="line-sep-gray"></span>
                                <a href="mailto:#" class="ac-colore">
                        Ask any question and we will give brief details about the topics</a>
                                <a href="mailto:#" class="ac-colore">Call for any query at the number given in the site.</a>
                                <a href="mailto:#" class="ac-colore">We will happy to assist you
                  </a>
                            </aside>
                            <aside class="col-md-3 col-sm-6 col-xs-12 text-left">
                                <!-- Copyright Informations -->
                                <h3 class="uppercase">Credits</h3>
                                <span class="line-sep-gray"></span>
                                <p>
                                    The entire Griham Team
                                </p>
                            </aside>
                            <aside class="col-md-3 col-sm-6 col-xs-12">
                                <h3 class="uppercase">Contact Us</h3>
                                <span class="line-sep-gray"></span>
                                <!-- address -->
                                <address>
                                    <a href="mailto:#" class="ac-colore"> 1st Flor, Anand Plaza, Beside Indira Palace
P.O Hinoo, Ranchi-834002
Jharkhand</a>
                                    <br>
                                    <a href="mailto:#" class="ac-colore">Phone:+91-9334450444,+91-8271492707&#8203;
g-network@griham.in</a>
                                    <br>
                                </address>
                                <!-- /address -->
                            </aside>
                        </div>
                        <!-- /.row -->
                        <!-- /.row -->
                    </div>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    </header>
</div>