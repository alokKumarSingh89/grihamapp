<?php 
    /*<div class="form-group">
                        <label class="col-lg-3 control-label">Group:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value=<?= $data["userData"]["group_id"]?> name="group_id" disabled="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value=<?= $data["userData"]["email"]?> name="email" disabled="">
                        </div>
                    </div>
        <div class="form-group">
                        <label class="col-md-3 control-label">Total Sales:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" value=<?= $data["userData"]["total_sales"]?> name="total_sales" disabled="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Mobile No:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" value=<?= $data["userData"]["mobile"]?> name="mobile">
                        </div>
                    </div>
                    */
 ?>
<section class="white">
    <div class="container">
        <h3 class="text-primary text-uppercase">Edit Profile</h3>
        <span class="line-sep-blue"></span>
        <?php 
            //print_r($document_url);
            if (isset($_SESSION["error"])) {
                echo "<div class=\"alert alert-danger\">".$_SESSION["error"]."</div>";
                unset($_SESSION["error"]);
            }
            if (isset($_SESSION["success"])) {
                echo "<div class=\"alert alert-info\">".$_SESSION["success"]."</div>";
                unset($_SESSION["success"]);
            }
        ?>
        <div class="row">
            <div class="col-md-3">
                <div class="text-center">
                    <img src=<?=$data["userData"]["profile_img"]?> class="avatar img-circle" alt="avatar">
                    <h6>Upload a different photo...</h6>
                    <form action=<?=$_SESSION["domain"]."/?/".$data["controller"]."/upload_profile"?> method="post" enctype="multipart/form-data">
                        <span class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Choose File</span>
                            <input type="file" name="fileToUpload" accept="image/*"/>
                        </span>
                        <input type="submit" value="Upload" name="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="col-md-9 personal-info">
                <div class="alert alert-info alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">×</a>
                    <i class="fa fa-coffee"></i> Update your <strong>profile</strong>.
                </div>
                <h3>Personal info</h3>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">First name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value=<?= $data["userData"]["firstName"]?> name="firstName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Last name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value=<?= $data["userData"]["lastName"]?> name="lastName">
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Address:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" row="10" name="address"><?= $data["userData"]["address"]?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Gender:</label>
                        <div class="radio col-md-3">
                            <label>
                            <input type="radio" name="gender"  value="Male" <?=$data["userData"]["gender"] =='Male'?'checked':''?> >Male</label>
                        </div>
                        <div class="radio col-md-3">
                            <label><input type="radio" name="gender" value="Female" <?=$data["userData"]["gender"] =='Female'?'checked':''?>>Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="button" class="btn btn-primary" value="Update">
                            <span></span>
                            <a class="btn btn-default" href=<?=$_SESSION["domain"]."/?/".$data["controller"]?>>Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
