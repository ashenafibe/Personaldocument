<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\RolesModel;
use App\Models\Admin\PrevModel;
use App\Models\Admin\RoleRrevModel;

class RolePrevController extends BaseController
{
    
    public function __construct()
    {
        /*if (!session()->get('id')) {
            echo '<script> alert ("Access denied") </script>';
            exit;
        }
        */
        helper(['form','Url']);
    }
    
    public function Create()
    {
        $prev= new PrevModel();
        $roleM= new RolesModel();
        $data['Listprev']=$prev->ListofPrev();
        $data['ListRole']= $roleM->ListofRoles();  
        echo view('Admin\Add_New_RolPrev',$data);
    }
// store before
    public function Stores()
    {
     
      $prev=$this->request->getvar('Prev');
     
      for ($i=0;$i< sizeof($prev); $i++)
      {
        $Role=$this->request->getvar('Role');
       $data=array('prevg'=>$prev[$i],'role'=>$Role);
        $Rprev= new RoleRrevModel();
        $sql=$Rprev->save($data);
      }
    print_r('sucess fully registered!!');
    }

public function Store()
{

    $rules = [
        'Role' => 'required',
        'Prev'=>'required'
        
    ];
    if (!$this->validate($rules)) {
        $prev= new PrevModel();
        $roleM= new RolesModel();
        $data['Listprev']=$prev->ListofPrev();
        $data['ListRole']= $roleM->ListofRoles();  
        echo view('Admin\Add_New_RolPrev',$data);
    }
   else{ 
    $prev=$this->request->getvar('Prev');
    for ($i=0;$i< sizeof($prev); $i++)
    {
      $Role=$this->request->getvar('Role');
      $prevg=$prev[$i];
      $user='SuperAdmin';
      $Rprev= new RoleRrevModel();
      $result=$Rprev->insertinto($Role,$prevg,$user);
    }
  print_r('sucess fully registered!!');
  
   }
}


    public function Edit($Id=null)
    {


    }

    public function Updates()
    {


    }
}
