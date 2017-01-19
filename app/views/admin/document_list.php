<div class="panel panel-green">
    <div class="panel-heading">
        List of the documents
    </div>
    <div class="panel-body">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Document</th>
                    <th> Document Type</th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody id="document_list">
                <tr>
                    <td></td>
                    <td>
                        <div class="span12  pagination-centered">
                            <input type="text" class="form-control" v-model="document_list.document">
                        </div>
                    </td>
                    <td>
                        <div class="span12  pagination-centered">
                            <input type="text" class="form-control" v-model="document_list.document_type">
                        </div>
                    </td>
                    <td>
                        <span class="btn btn-primary" @click="addNewDocument">Add</span>
                    </td>
                </tr>
                <tr v-for="(doc,index) in documents">
                    <td>{{index+1}} </td>
                    <td>
                        <div class="span12  pagination-centered">
                            <input type="text" class="form-control" v-model="doc.document" v-show="doc == editDoc">
                            <label v-show="!(doc == editDoc)">{{doc.document}}</label>
                        </div>
                    </td>
                    <td>
                        <input type="text" class="form-control" v-model="doc.document_type" v-show="doc == editDoc">
                        <label v-show="!(doc == editDoc)">{{doc.document_type}}</label>
                    </td>
                    <td>
                        <span class="btn btn-warning" @click="editDocument(doc)" v-show="!(doc == editDoc)">Edit</span>
                        <span class="btn btn-primary" @click="updateDocument(doc)" v-show="doc == editDoc">Update</span>
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
            document_list:{
                document:0,
                document_type:0,
                id:0
            }
        },
        el:"#document_list",
        methods: {
            fetchDocument: function() {
               var self =this; 
               $.ajax({
                    url: "<?=$_SESSION["domain"].'?/admin/document_list/document_list'?>",
                    method: 'GET',
                    success: function (data) {
                        self.documents = data;
                    },
                    error: function (error) {
                        console.error(JSON.stringify(error));
                    }
                });
            },
            editDocument:function(doc){
                this.editDoc = doc;
            },
            updateDocument:function(doc){
                this.editDoc = null;
                //var self = this;
                $.post("<?=$_SESSION["domain"]."?/admin/update_document/document_list"?>",doc,
                    function(data, status){
                        //self.documents.push(doc);
                    });
            },
            addNewDocument:function(event){
                var self = this;
                $.post("<?=$_SESSION["domain"]."?/admin/new_document/document_list"?>",this.document_list,
                    function(data, status){
                        self.document_list["id"]=data;
                        self.documents.push(self.document_list);
                        self.resetBonus();
                    });
            },
            resetBonus:function(){
                this.document_list = {
                    document:0,
                    document_type:0,
                    id:0
                }
            }
        }
    });
    
</script>