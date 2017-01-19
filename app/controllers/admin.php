<?php  
/**
* 
*/



class Admin extends Controller
{
	
	public function index($value='')
	{
		$user = new Users;
		$user_count = $user->getUserList(array("role"=>"0","status"=>"INACTIVE"));

		$group = new Group;
		$group_count = $group->findAll();
		$this->view('admin/index',array("user_count"=>$user_count,"group_count"=>$group_count));
	}
	public function pending_users($value='')
	{
		$user = new Users;
		$result = $user->getUserList(array("role"=>"0","status"=>"INACTIVE"));
		//print_r($value);
		$result2 = $value == '' ?$user->getUserList(array("id"=>$result[0]["id"])):$user->getUserList(array("id"=>$value));
		$this->view('admin/pending_users',array("pendingList"=>$result,"userData"=>$result2));
	}
	public function user_profile($value='')
	{
		$user = new Users;

		$this->view('user/profile',$user->getUserList(array("id"=>$value))[0]);
	}
	public function groups($value='')
	{
		$group = new Group;
		$user = new Users;
		$group_list = $group->findAll();
		
		$group_id = empty($value)?$group_list[0]["id"]:$value;
		$user_list = $user->getUserList(array("group_id"=>$group_id));
		$this->view('admin/groups',array("group_list"=>$group_list,"groupData"=>$user_list));
	}

	public function profile($value='')
	{
		$this->view('user/profile',$_SESSION["user"]);
	}
	public function setting($value='')
	{
		$this->view('user/setting',array("userData"=>$_SESSION["user"],"controller"=>"admin"));
	}

	public function document($value='')
	{
		$this->view('admin/document',$value);
	}
	public function new_document($type='')
	{
		$document = new Document;
		$status = $document->set_Document($_POST,$type);
		echo json_encode(array("id" => $status));
		
	}
	public function document_list($type='')
	{
		$document = new Document;
		$result = $document->get_Document($type);
		echo json_encode($result);
	}
	public function update_document($type='')
	{
		$document = new Document;
		$result = $document->update_Document($_POST,$type);
		echo json_encode($result);
	}
	public function document_img($type='')
	{
		$userDocument = new UserDocumet;
		$result = $userDocument->getDocument($type);
		echo json_encode($result);
	}
	public function activateUser($id='')
	{
		$group = new Group;
		$record = $group->getAvailableGroup();
		if ($record == FALSE) {
			$group_id = $group->create();
		} else {
			//print_r($record);
			$group->update(array("id"=>$record["id"],"number_of_user"=>$record["number_of_user"]+1));
			$group_id = $record["id"];
		}
		
		$user = new Users;
		$result = $user->update(array("group_id"=>$group_id,"status"=>"ACTIVE"),$id);
		//$result = [];
		echo json_encode($result);
		
	}
	public function update_payment($value='')
	{
		$user = new Users;
		$result = $user->update(array("pement_amount"=>$_POST["pement_amount"],"pement_status"=>"active"),$value);
		echo json_encode($result);
	}
	public function upload_profile($value='')
	{
		$target_dir = "public/images/profile_uploads/".$_SESSION["user"]["mobile"]."/";
		$file_size = $_FILES['fileToUpload']['size'];
		if (!file_exists($target_dir)) {
		    mkdir($target_dir, 0777, true);
		}
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$url = $_SESSION["domain"]."/?/admin/setting";
		if($file_size==0 || $file_size > 2097152) {
	        $_SESSION["error"]='File size must be less than 1 MB';
	    }else{
	    	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
		    $user = new Users;
			$user->update(array("profile_img"=>$target_file),$_SESSION["user"]["id"]);
			$_SESSION["success"]=$_FILES["fileToUpload"]["name"].' successfully uploded';
			$_SESSION["user"] = $user->getMe($_SESSION["user"]["id"]);
	    }
		
		$this->redirect($url);

	}
	public function update($value='')
	{
		$user = new Users;
		$id = $_POST["id"];
		unset($_POST["id"]);

		$result = $user->update($_POST,$id);
		echo json_encode($result);
	}
}
?>