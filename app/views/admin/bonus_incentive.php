<div class="panel panel-primary">
	<div class="panel-heading">Bonus & Incentives</div>
	<div class="panel-body">
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>S.No</th>
					<th>Bonus & Incentives(%)</th>
					<th>Other Rewards</th>
					<th>Action</th>
				</tr>
                
			</thead>
            <tbody id="bonus_list">
            	<tr>
                    <td>
                        <div class="span12  pagination-centered">
                            <label>1</label>
                        </div>
                    </td>
                    <td>
                        <div class="span12  pagination-centered">
                            <input type="number" v-model="incentive.bonus" class="form-control">
                        </div>
                    </td>
                    <td>
                        <input type="text" v-model="incentive.reward" class="form-control">
                    </td>
                    <td>
                        <span class="span6 span-a btn btn-primary" v-on:click="addIncentive">Add</span>
                    </td>
                </tr>
                <tr v-for="(doc,index) in documents">
                    <td>FLE-{{index+1}} </td>
                    <td>
                        <input type="number" v-show="doc == editDoc" v-model="doc.bonus" class="form-control">
                        <label v-show="!(doc == editDoc)">{{doc.bonus}}</label>
                    </td>
                    <td>
                        <input type="text" v-model="doc.reward" v-show="doc == editDoc" class="form-control">
                        <label v-show="!(doc == editDoc)">{{doc.reward}}</label>
                    </td>
                    <td>
                        <span class="text-muted btn btn-warning" @click="editBonus(doc,index)" v-show="!(doc == editDoc)">Edit</span>
                        <span class="btn btn-primary" @click="updateBonus(doc)" v-show="doc == editDoc">Update</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>
<script type="text/javascript">
    var bonus = new Vue({
        created: function() {
            this.fetchDocument();
        },
        data:{
            documents: [],
            editDoc:null,
            incentive:{
                bonus:0,
                reward:0,
                id:0
            }
        },
        el:"#bonus_list",
        methods: {
            fetchDocument: function() {
               var self =this; 
               $.ajax({
                    url: "<?= $_SESSION["domain"]."?/admin/document_list/bonus_incentive"?>",
                    method: 'GET',
                    success: function (data) {
                        self.documents = data;
                    },
                    error: function (error) {
                        console.error(JSON.stringify(error));
                    }
                });
            },
            editBonus:function(doc){
                this.editDoc = doc;
            },
            updateBonus:function(doc){
                this.editDoc = null;
                //var self = this;
                $.post("<?=$_SESSION["domain"]."?/admin/update_document/bonus_incentive"?>",doc,
                    function(data, status){
                        //self.documents.push(doc);
                    });
            },
            addIncentive:function(event){
                var self = this;
                $.post("<?=$_SESSION["domain"]."?/admin/new_document/bonus_incentive"?>",this.incentive,
                    function(data, status){
                        self.incentive["id"]=data;
                        self.documents.push(self.incentive);
                        self.resetBonus();
                    });
            },
            resetBonus:function(){
                this.incentive = {
                    bonus:0,
                    reward:0,
                    id:0
                }
            }
        }
    });
    
</script>