<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'adm_companytbl';
    protected $primaryKey       = 'Id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Description', 'Created_At', 'Created_by'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

// select all company 
    public function ListofCompanys()
    {

        $db =\Config\Database::connect();
        $builder=$this->db->table('adm_companytbl');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function ListofCompany()
    {
        $sql = "CALL Getcompany()";
		$result = $this->db->query($sql);
        return $result->getResultArray();


    }
// select specific company
public function Edit ($Id)
{
    $db =\Config\Database::connect();
    $builder=$this->db->table('adm_companytbl');
    $builder->select('*');
    $builder->where('Id',$Id);
    $query = $builder->get();
    return $query->getResultArray();

}
// update function

public function updates($data,$Id) 
{

    $db =\Config\Database::connect();
    $builder=$this->db->table('adm_companytbl');
    $builder->where('Id',$Id);
    $builder->update($data);
   // $query = $builder->get();
    return $this->db->affectedRows();

}

}
