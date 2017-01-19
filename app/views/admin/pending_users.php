<div class="row" id="pendingList">
    <div class="col-sm-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
					<i class="fa fa-user-plus fa-fw"></i>
					User List Not Verified
				</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                foreach ($data["pendingList"] as $key => $value) {
                                    echo "<tr>";
                                    echo "<td>".$value["firstName"]." ".$value["lastName"]." </td>";
                                    echo "<td><a href=".$_SESSION["domain"]."/?/admin/pending_users/".$value["id"].">status</a></td></tr>";
                                }
                            ?>
                        	
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php  
        if (count($data["userData"])>0) {
            $userData = $data["userData"][0];

    ?>
        <div class="col-sm-7">
        <section class="white">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title huge"><?=$userData["firstName"]." ".$userData["lastName"] ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center">
                            <img alt="User Pic" src="public/images/default.png" class="img-circle img-responsive">
                        </div>
                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>Join Date:</td>
                                        <td><?= $userData["joining_date"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?=$userData["gender"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Group</td>
                                        <td><?=$userData["group_id"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Sales</td>
                                        <td><?=$userData["total_sales"]?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Email</td>
                                        <td><a href="mailto:email"><?=$userData["email"]?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td><?=$userData["mobile"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Payment Status</td>
                                        <td><?=$userData["pement_status"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Payment Amount</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <span v-show="editPayment == 0">
                                                        {{pement_amount}}
                                                    </span>
                                                <input type="text" name="pement_amount" v-model="pement_amount" class="form-control" v-show="editPayment !=0">
                                                </div>
                                                <div class="col-sm-4">
                                                    <a @click="editPayments" class="btn btn-warning" v-show="editPayment==0">Edit</a>
                                                    <a v-show="editPayment !=0" class="btn btn-primary" @click="updatePayments('<?=$userData["id"]?>')">Update</a> 
                                                </div>    
                                            </div>
                                            
                                               
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td><span><?=$userData["status"]?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Document Status</td>
                                        <td><a @click="showImg('<?=$userData["id"]?>')">See Doc</a></td>
                                    </tr>
                                    <tr>
                                        <td>Home Address</td>
                                        <td><?=$userData["address"]?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php        
        }else{
            echo "<div class=\"alert alert-danger\">Data is availabe</div>";
        }
    ?>
    
    <div class="col-sm-12">
        <div class="row list-group">
            <div class="item col-sm-4 col-xs-4 col-lg-4" v-for="doc in documentsList
                        c">
                <div class="thumbnail">
                    <img class="group list-group-image" v-bind:src="doc['document_url']" alt="" style="width: 180px;height: 180px;" />
                    <div class="caption">
                        <p class="group inner list-group-item-text">
                            {{doc['document_name'].replace(/_/g," ")}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 text-center" v-show="showLink">
                <div class="col-sm-10">
                    <input type="button" value="Activate" class="btn btn-primary" @click="activateUser">
                </div>
            </div>
        </div>
        
    </div>
</div>
<script type="text/javascript">
    <?php 
        $pement_amount = 0;
        if (isset($userData["pement_amount"])) {
           $pement_amount = $userData["pement_amount"];
        }
        
    ?> 
    var pending_user = new Vue({
        data:{
            documentsList:[],
            showLink:false,
            userId:0,
            editPayment:0,
            pement_amount:"<?=$pement_amount ?>"
        },
        el:"#pendingList",
        methods: {
            showImg:function(id){
                this.userId=id;
                var self =this;
                $.ajax({
                    url: "<?=$_SESSION["domain"].'/?/admin/document_img/'?>"+id,
                    method: 'GET',
                    success: function (data) {
                        self.documentsList = data;
                        self.showLink = true;
                    },
                    error: function (error) {
                        console.error(JSON.stringify(error));
                    }
                });
            },
            activateUser:function(){
                $.ajax({
                    url: "<?=$_SESSION["domain"].'/?/admin/activateUser/'?>"+this.userId,
                    method: 'GET',
                    success: function (data) {
                        self.documentsList = data;
                        self.showLink = true;
                        window.location.href = "<?=$_SESSION["domain"]."/?/admin/pending_users"?>";
                    },
                    error: function (error) {
                        console.error(JSON.stringify(error));
                    }
                });
            },
            editPayments:function(){
                this.editPayment = 1;
            },
            updatePayments:function(id){
                this.editPayment = 0;
                var payment = {pement_amount:this.pement_amount};
                $.post("<?=$_SESSION["domain"]."/?/admin/update_payment/"?>"+id, payment,
                    function(data, status){
                        //self.documents.push(doc);
                });

            }
        }
    });
</script>