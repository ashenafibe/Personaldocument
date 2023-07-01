<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PrevModel;

class PrevController extends BaseController
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
    // Create New Prev
    public function Create()
    {
        echo view ('Admin\Add_New_Prev');
    }
// Strore Prev
    public function Store()
    {
       
          
            $rules = [
                'Desc' => 'required|min_length[3]|max_length[50]|is_unique[adm_privilegestbl.Description]',
                'routename'=>'required|min_length[3]|max_length[50]|is_unique[adm_privilegestbl.Route]',
                
            ];
            if (!$this->validate($rules)) {
                echo view ('Admin\Add_New_Prev');
            }
            else 
            {
    
            $data=['Description'=>$this->request->getvar('Desc'),
                   'Route'=>$this->request->getvar('routename'),
            

                    //'Created_At'=>date('Y/mm/dd'),
                    'Created_by'=>'Abekele'
        
                  ];
              $prev= new PrevModel();
              $sql= $prev->save($data);
           if(!$sql)
           {
    
            return redirect()->back()->withInput();
           }
           else {
    
            return redirect()->route('Create-Prev');
           }
    
            }

    }
    // Display all prev
 public function List()
{

    $prev= new PrevModel();
    $data['Listprev']=$prev->ListofPrev();
    echo view ('Admin\Prev_mgt',$data);


}
// Edit all prev
    public function Edit($Id=null)
    {
        $prev= new PrevModel();
        $data['ListPrev']=$prev->Edit($Id);
        echo view ('Admin\Edit_Prev',$data);
    }
// update all prev
    public function update()
    {

        $rules = [
            'routename' => 'required|min_length[3]|max_length[50]',
            'Desc'=>'required|min_length[3]|max_length[50]'
            
        ];
        $Id= $this->request->getvar('Id');
        if (!$this->validate($rules)) 
        {
            $prev= new PrevModel();
            $data['ListPrev']= $prev->Edit($Id);
            return view('Admin\Edit_Prev',$data);
        }
        else 
        {
    
           
             $data=['Description'=>$this->request->getvar('Desc'),
                   'Route'=>$this->request->getvar('routename'),

                //'Created_At'=>date('Y/mm/dd'),
                'Created_by'=>'Abekele'
    
              ];
              $prev= new PrevModel();
          $sql= $prev->Updates($data,$Id);
       if(!$sql)
       {
    
        return redirect()->back()->withInput();
       }
       else {
    
        return redirect()->route('Display-Prev');
       }
    
        }
    
    

    }
}
