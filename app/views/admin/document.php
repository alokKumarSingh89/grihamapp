<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><strong>Document</strong><h4>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <td>
                            <a href=<?=$_SESSION["domain"]."?/admin/document/bonus_incentive"?>>
                                Bonus & incentives
                            </a>
                            
                        </td>
                    </tr>
                    <tr>
                        <td> 
                        <a href=<?=$_SESSION["domain"]."?/admin/document/direct_income"?>>
                                Direct income & sale incentives
                            </a></td>
                    </tr>
                    <tr>
                        <td>
                        <a href=<?=$_SESSION["domain"]."?/admin/document/joining_kit"?>>
                                Joining kit
                            </a></td>
                    </tr>
                    <tr>
                        <td><a href=<?=$_SESSION["domain"]."?/admin/document/document_list"?>>
                                List of the documents
                            </a></td>
                    </tr>
                    <tr>
                        <td><a href=<?=$_SESSION["domain"]."?/admin/document/joining_fee"?>>
                                Joining fee
                            </a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <?php  

            switch ($data) {
                case 'bonus_incentive':
                    require_once 'app/views/admin/bonus_incentive.php';
                    break;
                case 'direct_income':
                    require_once 'app/views/admin/direct_income.php';
                    break;
                case 'joining_kit':
                    require_once 'app/views/admin/joining_kit.php';
                    break;
                case 'document_list':
                    require_once 'app/views/admin/document_list.php';
                    break;
                case 'joining_fee':
                    require_once 'app/views/admin/joining_fees.php';
                    break;
                default:
                    require_once 'app/views/admin/bonus_incentive.php';
                    break;
            }
        ?>
    </div>
</div>
