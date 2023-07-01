<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\CompanyModel;
use App\Models\Admin\RolesModel;
class RolesController extends BaseController
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
    // Create new Role
public function Create()
{
    $cname= new CompanyModel();
    $data['listcomp']=$cname->ListofCompany();
    echo view('Admin\Add_New_Role',$data);
}
    // store role
public function Store()
{
    $rules = [
        'rname' => 'required|min_length[3]|max_length[50]|is_unique[adm_roletbl.Role]',
        'Ctype'=>'required'
        
    ];
    if (!$this->validate($rules)) {

    $cname= new CompanyModel();
    $data['listcomp']=$cname->ListofCompany();
    echo view('Admin\Add_New_Role',$data);
    }
    else 
    {

    $data=['Role'=>$this->request->getvar('rname'),
          'company'=>$this->request->getvar('Ctype'),
            //'Created_At'=>date('Y/mm/dd'),
            'Created_By'=>'Abekele'

          ];
      $roleM= new RolesModel();
      $sql= $roleM->save($data);
   if(!$sql)
   {

    return redirect()->back()->withInput();
   }
   else {

    return redirect()->route('List-Role');
   }

    }

}
// List role
 public function List()
 {
   $roleM= new RolesModel();
   $data['ListRole']= $roleM-> ListofRoles();
    echo view ('Admin\Role_mgt',$data);


 }
// Edit Role
 public function Edit($Id=null)
 {
$cname= new CompanyModel();
$roleM= new RolesModel();
//$data['listcomp']=$cname->ListofCompany();
$data=['listcomp'=>$cname->ListofCompany(),
        'listRole'=>$roleM->Edit($Id)
 ];
echo view('Admin\Edit_role',$data);

 }
// update role records
public function Update()
{


}
// select role 

public function Selectrole()
{
    $cname= new CompanyModel();
    $roleM= new RolesModel();
     $roleM= new RolesModel();
     $role = $roleM->where('company', $this->request->getVar('ctype'))->findAll();
     echo json_encode($role); 
}

}
