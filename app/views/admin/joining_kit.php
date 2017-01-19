<div class="panel panel-yellow">
    <div class="panel-heading">
        JOINING KIT
    </div>
    <div class="panel-body">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Gift For You</th>
                    <th>M.R.P</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="joining_kits">
                <tr>
                    <td></td>
                    <td>
                        <div class="span12  pagination-centered">
                            <input type="text" class="form-control" v-model="joining.gift_for_you">
                        </div>
                    </td>
                    <td>
                        <div class="span12  pagination-centered">
                            <input type="number" class="form-control" v-model="joining.mrp">
                        </div>
                    </td>
                    <td>
                        <span class="btn btn-primary" v-on:click="addJoining">Add</span>
                    </td>
                </tr>
                <tr v-for="(doc,index) in documents">
                    <td>{{index+1}} </td>
                    <td>
                        <div class="span12  pagination-centered">
                            <input type="text" class="form-control" v-show="doc == editDoc" v-model="doc.gift_for_you">
                            <label v-show="!(doc == editDoc)">{{doc.gift_for_you}}</label>
                        </div>
                    </td>
                    <td>
                        <input type="number" class="form-control" v-show="doc == editDoc" v-model="doc.mrp">
                        <label v-show="!(doc == editDoc)">{{doc.mrp}}</label>
                    </td>
                    <td>
                        <span class="btn btn-warning" @click="editKit(doc)" v-show="!(doc == editDoc)">Edit</span>
                        <span class="btn btn-primary" @click="updateKit(doc)" v-show="doc == editDoc">Update</span>
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
            joining:{
                gift_for_you:0,
                mrp:0,
                id:0
            }
        },
        el:"#joining_kits",
        methods: {
            fetchDocument: function() {
               var self =this; 
               $.ajax({
                    url: "<?=$_SESSION["domain"].'/?/admin/document_list/joining_kits'?>",
                    method: 'GET',
                    success: function (data) {
                        self.documents = data;
                    },
                    error: function (error) {
                        console.error(JSON.stringify(error));
                    }
                });
            },
            editKit:function(doc){
                this.editDoc = doc;
            },
            updateKit:function(doc){
                this.editDoc = null;
                $.post("<?=$_SESSION["domain"]."/?/admin/update_document/joining_kits"?>",doc,
                    function(data, status){
                        //self.documents.push(doc);
                    });
            },
            addJoining:function(event){
                var self = this;
                $.post("<?=$_SESSION["domain"]."/?/admin/new_document/joining_kits"?>",this.joining,
                    function(data, status){
                        self.joining["id"]=data;
                        self.documents.push(self.joining);
                        self.resetBonus();
                    });
            },
            resetBonus:function(){
                this.joining = {
                    gift_for_you:0,
                    mrp:0,
                    id:0
                }
            }
        }
    });
    
</script>