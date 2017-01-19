<?php 
    //print_r($data);
 ?>
<section class="white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            	<?php  
            		$user = $_SESSION["user"];
            		if ($user["pement_status"] == "INACTIVE") {
            			echo '<div class="alert alert-danger">Please Pay Your fees to activate your account. <a href="'.$_SESSION["domain"].'/?/user/payment_option">Click Here to pay</a></div>';
            		}
            		if($user["status"] == "INACTIVE"){
            			echo '<div class="alert alert-danger">Please Upload Your Document.<a href="'.$_SESSION["domain"].'/?/user/document">Click Here to upload</a> </div>';
            		}else if($user["status"] == "PROCESSING"){
            			echo '<div class="alert alert-warning">Wait,Its under process</div>';
            		}else if($user["status"] == "ACTIVE"){
            	?>	
            	</div>
                <div class="col-md-12">
                	<div class="panel panel-default" id="user_page">
                        <div class="panel-heading">
                            <h5>Your Group(<?=$data["own_group"][0]["name"]?>)</h5>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Name</td>
                                        <td>Total Sale</td>
                                        <td>New Sale</td>
                                        <td>Level Income</td>
                                        <td>Award</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(user,index) in own_group_list">
                                        <td>{{index+1}}</td>
                                        <td>{{user.firstName}} {{user.lastName}}</td>
                                        <td>{{user.total_sales}}</td>
                                        <td>
                                            <label v-show="user != editMode">{{user.new_sale}}</label>
                                            <input type="text" v-model="user.new_sale" v-show="user == editMode" class="form-control" focus>
                                        </td>
                                        <td>{{user.level_income}}</td>
                                        <td></td>
                                        <td v-if="user.id == currentUser.id">
                                           <span v-show="user != editMode" @click="editShow(user)" class="btn btn-warning">Edit</span>
                                            <span v-show="user == editMode" @click="submitSales(user)" class="btn btn-primary">Update</span>
                                        </td>
                                        <td v-if="user.id != currentUser.id"></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            	<?php
            		}
            	?>
                <div class="col-md-12">
            	<div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
		                    <i class="fa fa-user-plus fa-fw"></i>
		                    Other Group List
		                </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Group Name</th>
                                        <th>Memeber in Group</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        foreach ($data["other_group"] as $key => $value) {
                                           
                                    ?>
                                        <tr>
                                            <td><?=$value["name"]?></td>
                                            <td><?=$value["number_of_user"]?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<script type="text/javascript">
    var bonus = new Vue({
        data:{
            own_group_list:<?=json_encode($data["own_group_list"])?>,
            currentUser:<?=json_encode($_SESSION["user"])?>,
            editMode:0
        },
        el:"#user_page",
        methods: {
            editShow:function(user){
                this.editMode = user;
            },
            submitSales:function(user){
                this.editMode = 0;
                var self = this;
                $.post("<?=$_SESSION["domain"]."/?/user/update_sale"?>",user,
                    function(data, status){
                        
                });
            }
        }
    });
    
</script>