<?php  
    session_start();
    $session = $_SESSION;
    $user = isset($session['user'])?$session['user']:array("role"=>"-1");
    $authorized = isset($session['user'])?"Yes":"No";
    $ajaxCall = isset($_SERVER['HTTP_X_REQUESTED_WITH'])?$_SERVER['HTTP_X_REQUESTED_WITH']:"";
    if ($ajaxCall == 'XMLHttpRequest') {
        require_once 'app/init.php';
        header('Content-type: application/json',true);
        $app = new App;
    }else{
    $_SESSION["domain"] = "/fleSale";
?>
    <!DOCTYPE html>
<html>
<head>
    <title>Griham FLE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/important.css">
    <link rel="stylesheet" href="public/css/validation.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/vue.resource/1.0.3/vue-resource.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        if ($authorized == "No") {
            require_once 'app/views/public/template.php';
        } else {

            if ($user["role"] == "1") {
                require_once 'app/views/admin/template.php';
            } else if($user["role"] == "0") {
                require_once 'app/views/user/template.php';
            }else{
                require_once 'app/views/public/template.php';
            }
            
        }
        
    ?>

</body>
</html>
<?php      
    }
?>
