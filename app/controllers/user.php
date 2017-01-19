<?php 

	/**
	* 
	*/
	
	class User extends Controller
	{
		
		
		public function index($value='')
		{
			$group = new Group;
			$user_group = $group->findGroup($_SESSION["user"]["group_id"]);
			$user = new Users;
			$group_id = $_SESSION["user"]["group_id"] == 0 ? -1:$_SESSION["user"]["group_id"];
			$userList = $user->getUserList(array("group_id"=>$group_id));
			$other_group = $group->findOtherGroup($group_id);
			$this->view('user/index',array("own_group_list"=>$userList,"own_group"=>$user_group,"other_group"=>$other_group));
		}
		public function profile($value='')
		{
			$user = $_SESSION["user"];
			$this->view('user/profile',$user);
		}
		public function document()
		{
			$document = new Document;
			$userDocument = new UserDocumet;
			$result = $document->get_Document("document_list",array("document","document_type"));
			$result2 = $userDocument->getDocument($_SESSION["user"]["id"]);
			$this->view('user/document',array("doc_list"=>$result,"doc_data"=>$result2));
		}
		public function upload_profile($value='')
		{
			$target_dir = "public/images/profile_uploads/".$_SESSION["user"]["mobile"]."/";
			$file_size = $_FILES['fileToUpload']['size'];
			if (!file_exists($target_dir)) {
			    mkdir($target_dir, 0777, true);
			}
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$url = $_SESSION["domain"]."/?/user/setting";
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
		public function setting($value='')
		{
			$this->view('user/setting',array("userData"=>$_SESSION["user"],"controller"=>"user"));
		}
		public function upload($value='')
		{
			$target_dir = "public/images/uploads/".$_SESSION["user"]["firstName"]."/";
			$file_size = $_FILES['fileToUpload']['size'];
			if (!file_exists($target_dir)) {
			    mkdir($target_dir, 0777, true);
			}
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$url = $_SESSION["domain"]."/?/user/document";
			if($file_size==0 || $file_size > 2097152) {
		        $_SESSION["error"]='File size must be less than 1 MB';
		    }else{
		    	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

				$userDocument = new UserDocumet;
				$userDocument->insert(array("document_name"=>$_POST["doc_name"],"document_url"=>$target_file),$_SESSION["user"]["id"]);
				$_SESSION["success"]=$_FILES["fileToUpload"]["name"].' successfully uploded';
		    }
			
			$this->redirect($url);

		}
		public function update_sale($value='')
		{
			$user = new Users;
			$result = $user->update(array("new_sale"=>$_POST["new_sale"]),$_POST["id"]);
			echo json_encode($result);
		}
	}
?>