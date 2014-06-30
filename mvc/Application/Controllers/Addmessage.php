<?php
  class Application_Controllers_Addmessage
  extends Base_Controller 
  {
      function __construct()
    {
        $this->model = new Application_Models_Usermodel();
        $this->view = new Base_View();
    }
      function callController() 
	  {
		
		$usermessage = mysql_real_escape_string($_POST['message']);
		
		
		if ($this->isEmpty($usermessage))
		{
			$_SESSION['er_umessage']="Введите текст сообщения.";
			$arr = $this->model->getMessage();
                        $arr2=$this->model->extractInfo($_SESSION['uID']);
                        
	
				if ($arr == 0)
				{
					
					$this->view->generate("Home.php",false,false);
				}
				else
				{
					
					$this->view->generate("Home.php",$arr,$arr2);
					
				}
		}
		else 
		{
			$result=$this->model->addMessage($usermessage, $_SESSION['uID']);
			if ($result)
			{
				$arr = $this->model->getMessage();
                                $arr2=$this->model->extractInfo($_SESSION['uID']);
                               			
				
				if ($arr == 0)
				{
					
					$this->view->generate("Home.php",false,false);
				}
				else
				{
					
					$this->view->generate("Home.php",$arr,$arr2);
				}
			}
		}
		unset($_SESSION['er_umessage']);
	
	  }
	
  } 
?>	