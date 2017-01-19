<?php 
   // print_r($data["doc_data"][0]);
   $document_url = [];
   $document_type = [];
   foreach ($data["doc_list"] as $key => $value) {
        if (!isset($document_type[trim($value["document_type"])])) {
            $document_type[trim($value["document_type"])] = array($value["document"]);
        }else{
            array_push($document_type[trim($value["document_type"])], $value["document"]);
        }
    }
    foreach ($data["doc_data"] as $key => $value) {
        $document_url[$value["document_name"]] = $value["document_url"];
    }
?>
<section class="white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#doc_list">Show Doc</button>
                    <div id="doc_list" class="collapse">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <ol>
                                    <?php  
                                        foreach ($document_type as $key => $value) {
                                              echo "<li><span>".$key."</span><ol style=\"margin-left: 17px;\">";
                                              foreach ($value as $key2 => $value2) {
                                                  echo "<li><span>".$value2."</span></li>";
                                              }
                                              echo "</ol>";                                          }  
                                    ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-primary text-uppercase">Please only upload PNG,JPG or JPEG(less than 1MB)</h3>
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
                        
                        <span class="line-sep-blue"></span>
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>File Name</th>
                                        <th>Upload File</th>
                                        <th>Status</th>
                                    </tr>

                                    <?php 
                                        foreach ($document_type as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><span><?=$key?></span></td>
                                            <td>
                                                <form action=<?=$_SESSION["domain"]."/?/user/upload"?> method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="doc_name" value=<?=str_replace(" ","_",$key)?>>
                                                    <span class="btn btn-success fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>Choose File</span>
                                                        <input type="file" name="fileToUpload" accept="image/*"/>
                                                    </span>
                                                    <input type="submit" value="Upload" name="submit" class="btn btn-primary">
                                                </form>
                                            </td>
                                            <td>
                                                <div>
                                                    <img src=<?= isset($document_url[str_replace(" ","_",$key)])?$document_url[str_replace(" ","_",$key)]:"" ?> alt="Not Found" class="image-size" />
                                                </div>
                                            </td>
                                        </tr>
                                    <?php        
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
