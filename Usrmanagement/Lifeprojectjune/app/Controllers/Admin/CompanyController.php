<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\CompanyModel;

class CompanyController extends BaseController
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
    // view company Registration form
    public function Create()
    {
        echo view('Admin\Add_New_Comp');
    }

    Public function Store()
    {
      
        $rules = [
            'cname' => 'required|min_length[3]|max_length[50]|is_unique[adm_companytbl.Description]',
            
        ];
        if (!$this->validate($rules)) {
            return view('Admin\Add_New_Comp');
        }
        else 
        {

        $data=['Description'=>$this->request->getvar('cname'),
                //'Created_At'=>date('Y/mm/dd'),
                'Created_by'=>'Abekele'
    
              ];
          $cname= new CompanyModel();
          $sql= $cname->save($data);
       if(!$sql)
       {

        return redirect()->back()->withInput();
       }
       else {

        return redirect()->route('Create_company');
       }

        }

    }
// view all company

Public function List()
{
        $cname= new CompanyModel();
        $data['listcomp']=$cname->ListofCompany();
        echo view ('Admin\Company_mgt',$data); 

}

// Edit Company information
public function Edit($Id=null)
{

    $cname= new CompanyModel();
    $data['listdata']=$cname->Edit($Id);
    echo view('Admin\Edit_Company',$data) ;

}
// update company information

public function Update()
{

    $rules = [
        'cname' => 'required|min_length[3]|max_length[50]|is_unique[adm_companytbl.Description]',
        
    ];
    $Id= $this->request->getvar('Id');
    if (!$this->validate($rules)) {
        $cname= new CompanyModel();
       $data['listdata']=$cname->Edit($Id);
        return view('Admin\Edit_Company',$data);
    }
    else 
    {

       
         $data=['Description'=>$this->request->getvar('cname'),
            //'Created_At'=>date('Y/mm/dd'),
            'Created_by'=>'Abekele'

          ];
      $cname= new CompanyModel();
      $sql= $cname->Updates($data,$Id);
   if(!$sql)
   {

    return redirect()->back()->withInput();
   }
   else {

    return redirect()->route('Display-company');
   }

    }

}

}
