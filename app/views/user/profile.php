<section>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title huge"><?= $data["firstName"]." ".$data["lastName"]?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center">
                        <img alt="User Pic" src=<?=$data["profile_img"]?> class="img-circle img-responsive">
                    </div>
                    <div class=" col-md-9 col-lg-9 ">
                        <table class="table table-user-information">
                            <tbody>
                                <tr>
                                    <td>Join Date:</td>
                                    <td><?= $data["joining_date"] ?></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td><?= $data["gender"] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><a href="mailto:"<?= $data["email"] ?>><?= $data["email"] ?></a></td>
                                </tr>
                                <tr>
                                    <td>Mobile</td>
                                    <td><?= $data["mobile"] ?></td>
                                </tr>
                                <tr>
                                    <td>Home Address</td>
                                    <td><?= $data["address"] ?></td>
                                </tr>
                                <tr>
                                    <td>Total Sales</td>
                                    <td><?= $data["total_sales"] ?></td>
                                </tr>
                                
                                <tr>
                                    <td>Level Incaome</td>
                                    <td><?= $data["level_income"] ?></td>
                                </tr>
                                
                                <tr>
                                    <td>Payment Status</td>
                                    <td><?= $data["pement_status"] ?></td>
                                </tr>
                                <tr>
                                    <td>Payment Amount</td>
                                    <td><?= $data["pement_amount"] ?></td>
                                </tr>
                                <tr>
                                    <td>Document Status</td>
                                    <td><?= $data["status"] ?></td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
