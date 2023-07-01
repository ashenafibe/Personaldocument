<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\CompanyModel;
use App\Models\Admin\UsersModel;

class UsersController extends BaseController
{
    protected $helpers = ['url', 'form'];
    public function __construct()
	{
		helper(['url', 'form']);
	}
   Public function Create()
   {
    $cname= new CompanyModel();
    $data['listcomp']=$cname->ListofCompany();
    echo view ('Admin\Add_New_Users.php',$data);
  }

public function store()
{

    helper(['form']);
    $rules = [
        'Role'=>'required',
        'Username'      => 'required|min_length[2]|max_length[50]|is_unique[adm_userstbl.User_Name]',
        'Fname'         => 'required|min_length[4]|max_length[100]',
        'pass'         => 'required|min_length[4]|max_length[100]',
    
        'cpassword'  => 'matches[pass]'
    ];
      
    if(!$this->validate($rules)){
       
        
      
        $data['validation'] = $this->validator;
        $cname= new CompanyModel();
        $data['listcomp']=$cname->ListofCompany();
        echo   view('Admin\Add_New_Users', $data);
    }else{
        $userModel = new UsersModel();
        $data = [
            'User_Name'     => $this->request->getVar('Username'),
            'role'=>$this->request->getVar('Role'),
            'Fname'    => $this->request->getVar('Fname'),
            //'Passwords' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
           'Passwords' => password_hash(123456,PASSWORD_DEFAULT),
            'Created_By'=>'SupperAdmin'
        ];
       $sql= $userModel->save($data);
        if($sql)
        {
         print_r('sucess fully saved');

        }
    else{

        print_r('note saved');
    }
    }
      
}
// 
// List users
public function List()
{
    $userModel = new UsersModel();
  $data['ListUsers']= $userModel->ListofUsers();
  echo view ('Admin\User_mgt',$data);
}
// login page 
Public function login()
{
 echo view ('login');

}

public function loginAuth()
    {
        $session = session();
        $userModel = new UsersModel();
        $usrname = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('User_Name',  $usrname)->first();
        
        if($data){
            $pass = $data['Passwords'];
            $authenticatePassword = password_verify(123456, $pass);
            if($authenticatePassword)
           //if($password== $pass)
            {
                $ses_data = [
                    'id' => $data['Id'],
                    'Username' => $data['User_Name'],
                    'Role' => $data['role'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('Dashboard');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('User-login');
            }
        }else{
            $session->setFlashdata('msg', 'This User does not exist.');
            return redirect()->to('User-login');
        }
    }

    public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('Login');
	}



}

