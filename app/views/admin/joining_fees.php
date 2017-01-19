<div class="panel panel-primary">
    <div class="panel-heading">
        Joining Fees
    </div>
    <div class="panel-body">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th> Joining Amount</th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody id="fees">
                <tr>
                    <td>
                        <div class="span12  pagination-centered">
                            <input type="text" class="form-control" v-model="fees.joining_amount">
                        </div>
                    </td>
                    <td>
                        <span class="btn btn-primary" @click="addJoiningFee">Add</span>
                    </td>
                </tr>
                <tr v-for="(doc,index) in documents">
                    <td>
                        <div class="span12  pagination-centered">
                            <input type="text" class="form-control" v-model="doc.joining_amount" v-show="doc == editDoc">
                            <label v-show="!(doc == editDoc)">{{doc.joining_amount}}</label>
                        </div>
                    </td>
                    <td>
                        <span class="btn btn-warning" @click="editFees(doc)" v-show="!(doc == editDoc)">Edit</span>
                        <span class="btn btn-primary" @click="updateFees(doc)" v-show="doc == editDoc">Update</span>
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
            fees:{
                joining_amount:0,
                id:0
            }
        },
        el:"#fees",
        methods: {
            fetchDocument: function() {
               var self =this; 
               $.ajax({
                    url: "<?=$_SESSION["domain"].'/?/admin/document_list/fees'?>",
                    method: 'GET',
                    success: function (data) {
                        self.documents = data;
                    },
                    error: function (error) {
                        console.error(JSON.stringify(error));
                    }
                });
            },
            editFees:function(doc){
                this.editDoc = doc;
            },
            updateFees:function(doc){
                this.editDoc = null;
                //var self = this;
                $.post("<?=$_SESSION["domain"]."/?/admin/update_document/fees"?>",doc,
                    function(data, status){
                        //self.documents.push(doc);
                    });
            },
            addJoiningFee:function(event){
                var self = this;
                $.post("<?=$_SESSION["domain"]."/?/admin/new_document/fees"?>",this.fees,
                    function(data, status){
                        self.fees["id"]=data;
                        self.documents.push(self.fees);
                        self.resetBonus();
                    });
            },
            resetBonus:function(){
                this.fees = {
                    joining_amount:0,
                    id:0
                }
            }
        }
    });
    
</script>