<div class="row">
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
					<i class="fa fa-user-plus fa-fw"></i>
					Group List
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
                            $group_name="";
                            foreach ($data["group_list"] as $key => $value) {
                                if ($value["id"] == $data["groupData"][0]["group_id"]) {
                                    $group_name = $value["name"];
                                }
                        ?>
                            <tr>
                                <td>
                                    <a href=<?=$_SESSION["domain"]."/?/admin/groups/".$value["id"]?> ><?=$value["name"]?></a> 
                                </td>
                                <td><?=$value["number_of_user"]?> </td>
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
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                            <i class="fa fa-user-plus fa-fw"></i>
                            <?=$group_name?>
                        </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Top Acchiver</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Sales</th>
                                <th>Level Income</th>
                                <th>New Sales</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="group_user">
                            <tr v-for="(user,index) in group_user">
                                <td>{{index+1}}</td>
                                <td>{{user.firstName}} {{user.lastName}} </td>
                                <td>{{user.mobile}}</td>
                                <td>{{user.total_sales}} </td>
                                <td>{{user.level_income}} </td>
                                <td>{{user.new_sale}} </td>
                                <td>
                                    <a :href="url(user.id)">Show/</a>
                                    <span @click="approveSale(user)" class="btn btn-primary" v-show="user.new_sale != 0" title="New Sale Added">Approve</span></td>
                            </tr>
                            <tr>
                                <td colspan="6">Total Sales</td>
                                <td>
                                    {{totalSales()}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <span ng-click="submitGroup()" class="btn btn-primary">Submit</span>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var bonus = new Vue({
        data:{
            group_user: <?=json_encode($data["groupData"])?>,
        },
        el:"#group_user",
        methods:{
            totalSales:function(){
                var sum = _.reduce(this.group_user, function(memo, user){ return memo + parseInt(user["total_sales"]); }, 0);
                return sum;
            },
            url:function(id){
                return "<?=$_SESSION["domain"]."/?/admin/user_profile/"?>"+id;
            },
            approveSale:function(user){
                var data = {
                    "id":user["id"],
                    "total_sales":parseInt(user["total_sales"])+parseInt(user["new_sale"]),
                    "new_sale":0
                }
                $.post("<?=$_SESSION["domain"]."/?/admin/update"?>",data,
                    function(data2, status){
                       window.location.href = "<?=$_SESSION["domain"]."/?/admin/groups"?>"; 
                });
            }
        }
        
    });
</script>
