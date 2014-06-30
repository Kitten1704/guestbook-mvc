<?php

  class Application_Controllers_Enter
  extends Base_Controller 
  {
      function __construct()
    {
        $this->model = new Application_Models_Usermodel();
        $this->view = new Base_View();
    }
	
	  function callController() 
	  {
		$errors = 0;
		$userarr = array();
		$userarr['email'] = mysql_real_escape_string($_POST['email']);
		$userarr['password'] = mysql_real_escape_string($_POST['password']);
		if (strlen($userarr['email'])==0 || !preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $userarr['email']))
		{
			$_SESSION['er_emaillenght'] = "Ð’Ð²ÐµÐ´Ð¸Ñ‚Ðµ ÐºÐ¾Ñ€Ñ€ÐµÐºÑ‚Ð½Ñ‹Ð¹ e-mail. ÐÐ°Ð¿Ñ€Ð¸Ð¼ÐµÑ€: mail@mail.ru";
			$errors++;
			
		}
		if ($errors == 0 && strlen($userarr['password'])==0)
		{
			$_SESSION['uemail'] =$userarr['email'];
			$_SESSION['er_passlenght'] = "Ð’Ð²ÐµÐ´Ð¸Ñ‚Ðµ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ.";
			$errors++;
			
		}
		
		if ($errors > 0)
		{
			$this->view->generate("Login.php",false,false);
		
		}
		else {
		
			 $userId = $this->model->checkUser ($userarr['email'] ,$userarr['password']);
			
			 if ($userId > 0) 
			 {
				
                              
               
				
				
				$arr = $this->model->getMessage();
                $arr2=$this->model->extractInfo($userId);

				
				
                if($arr2['upassword']==md5($userarr['password']))
				{
					$_SESSION['uID']=$userId;
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
				
					$this->view->generate("Login.php",false,false);
					$_SESSION['er_passlenght'] = "&#1053;&#1077;&#1074;&#1077;&#1088;&#1085;&#1099;&#1081; &#1087;&#1072;&#1088;&#1086;&#1083;&#1100;.";
				}
				
			 }
			 else
			 {
			   
				$_SESSION['er_noemail'] = "ÐŸÐ¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ Ð½Ðµ Ð·Ð°Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ð½. Ð—Ð°Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€Ð¸Ñ€ÑƒÐ¹Ñ‚ÐµÑÑŒ.";
				$this->view->generate("Login.php",false,false);
			 
			 }
	
		}
		
			unset($_SESSION['er_emaillenght']);
			unset($_SESSION['er_passlenght']);
			unset($_SESSION['uemail']);
	  }
		
  } 
?> 
 
 