<div class="panel panel-green">
    <div class="panel-heading">DIRECT INCOME & SALE INCENTIVES</div>
    <div class="panel-body">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Service</th>
                    <th>Incentives</th>
                    <th>Service Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="direct_income">
                <tr>
                    <td>1</td>
                    <td>
                        <div class="span12  pagination-centered">
                            <input class="form-control" type="text" name="service" v-model="direct_sale.service">
                        </div>
                    </td>
                    <td>
                        <div class="span12  pagination-centered">
                            <input class="form-control" type="text" name="incentive" v-model="direct_sale.incentive">
                        </div>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="service_type" v-model="direct_sale.service_type">
                    </td>
                    <td>
                        <span class="btn btn-primary" v-on:click="addIncentive">Add</span>
                    </td>
                </tr>
                <tr v-for="(doc,index) in documents">
                    <td>{{index+1}} </td>
                    <td>
                        <div class="span12  pagination-centered">
                            <input class="form-control" type="text" v-model="doc.service" v-show="doc == editDoc">
                            <label v-show="!(doc == editDoc)">{{doc.service}}</label>
                        </div>
                    </td>
                    <td>
                        <input type="text" class="form-control" v-model="doc.incentive" v-show="doc == editDoc">
                        <label v-show="!(doc == editDoc)">{{doc.incentive}}</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" v-model="doc.service_type" v-show="doc == editDoc">
                        <label v-show="!(doc == editDoc)">{{doc.service_type}}</label>
                    </td>
                    <td>
                        <span class="btn btn-warning" @click="editIncentive(doc)" v-show="!(doc == editDoc)">Edit</span>
                        <span class="btn btn-primary" @click="updateIncentive(doc)" v-show="doc == editDoc">Update</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var direct_income = new Vue({
        created: function() {
            this.fetchDocument();
        },
        data:{
            documents: [],
            editDoc:null,
            direct_sale:{
                service:0,
                incentive:0,
                service_type:0,
                id:0
            }
        },
        el:"#direct_income",
        methods: {
            fetchDocument: function() {
               var self =this; 
               $.ajax({
                    url: "<?=$_SESSION["domain"].'?/admin/document_list/direct_sale'?>",
                    method: 'GET',
                    success: function (data) {
                        self.documents = data;
                    },
                    error: function (error) {
                        console.error(JSON.stringify(error));
                    }
                });
            },
            editIncentive:function(doc){
                this.editDoc = doc;
            },
            updateIncentive:function(doc){
                this.editDoc = null;
                //var self = this;
                $.post("<?=$_SESSION["domain"]."?/admin/update_document/direct_sale"?>",doc,
                    function(data, status){
                        //self.documents.push(doc);
                    });
            },
            addIncentive:function(event){
                var self = this;
                $.post("<?=$_SESSION["domain"]."?/admin/new_document/direct_sale"?>",this.direct_sale,
                    function(data, status){
                        self.direct_sale["id"]=data;
                        self.documents.push(self.direct_sale);
                        self.resetData();
                    });
            },
            resetData:function(){
                this.direct_sale = {
                    service:0,
                    incentive:0,
                    service_type:0,
                    id:0
                }
            }
        }
    });
    
</script>