<script type="text/javascript">
    $(document).ready(function() {
        $('#registerForm').validate({
            rules: {
                firstName: { 
                    required: true,
                },
                lastName: {
                    required: true
                },
                mobile:{
                    required:true,
                    number:true,
                    minlength: 10,
                    maxlength:10
                },
                email:{
                    required:true
                },
                gender:{
                    required:true
                },
                password:{
                    required:true,
                    minlength: 4,
                    maxlength:8
                },
                address:{
                    required:true
                }
            },
            messages: {
                firstName: { // message declared
                    required: "First name is required"
                },
                lastName: { // message declared
                    required: "Last Name is required"
                },
                mobile:{
                    required: "Mobile is required",
                    number:"Only number allowed",
                    minlength:"minmum 10 number required",
                    maxlength:"maximum 10 number required"
                },
                email:{
                    required: "email is required"
                },
                gender:{
                    required: "Gender is required"
                },
                password:{
                    required: "Password is required",
                    minlength:"minmum 4 character required",
                    maxlength:"maxmum 8 character only",
                },
                address:{
                    required: "Address is required"
                }
            },
            submitHandler: function(form) { // for demo
                return true;
            }
        });
    });
</script>
<section class="white">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <h3 class="text-primary text-uppercase">Register</h3>
                <span class="line-sep-blue"></span>
                <div>
                    <form name="form" role="form" action=<?=$_SESSION["domain"]."/?/session/create"?> method="post" id="registerForm">
                        <div class="form-group row">
                        <?php  
                            if (isset($_SESSION["Error"])) {
                                echo "<div class=\"alert alert-danger\">".$_SESSION["Error"]."</div>";
                                unset($_SESSION["Error"]);
                            }
                        ?>
                        </div>
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-2 form-control-label">First name</label>
                            <div class="col-sm-10">
                                <input type="text" name="firstName" class="form-control" onblur="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastName" class="col-sm-2 form-control-label">Last name</label>
                            <div class="col-sm-10">
                                <input type="text" name="lastName" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label" for="mobile">Mobile</label>
                            <div class="col-sm-10">
                                <input type="number" name="mobile" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label" for="email">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label" for="gender">Gender</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" value="Male" checked />Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" value="Female" />Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 form-control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password"  class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 form-control-label">Permanent Address</label>
                            <div class="col-sm-10">
                                <textarea rows="10" class="form-control" style="resize: none;" name="address"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Register</button>
                                <a href=<?=$_SESSION["domain"]."?/pages/login"?> class="text-primary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
