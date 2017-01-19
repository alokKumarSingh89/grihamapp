<section class="white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3 class="text-primary text-uppercase">Login</h3>
                <span class="line-sep-blue"></span>
                 <?php 
                    if (isset($_SESSION["Error"])) {
                                echo "<div class=\"alert alert-danger\">".$_SESSION["Error"]."</div>";
                                unset($_SESSION["Error"]);
                    }
                ?>
                <form name="form" action=<?=$_SESSION["domain"]."/?/session/login"?> method="post">
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label" for="email">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" placeholder="Email" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label" for="password">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" placeholder="password" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Login</button>
                            <a href=<?=$_SESSION["domain"]."?/page/registration"?> class="text-primary">Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
