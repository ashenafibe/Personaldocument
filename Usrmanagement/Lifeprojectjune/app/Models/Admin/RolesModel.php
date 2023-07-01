<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class RolesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'adm_roletbl';
    protected $primaryKey       = 'Id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Id', 'Role', 'company', 'Created_At', 'Created_By'];

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

    public function ListofRoles()
    {

        $db =\Config\Database::connect();
        $builder=$this->db->table('adm_roletbl');
        $builder->select('adm_roletbl.Id, Role,Description ,company, adm_roletbl.Created_At, adm_roletbl.Created_By');
        $builder->join('adm_companytbl','adm_roletbl.company=adm_companytbl.Id','left');
        $query = $builder->get();
        return $query->getResultArray();
    }
// select specific company
public function Edit ($Id)
{
    $db =\Config\Database::connect();
    $builder=$this->db->table('adm_roletbl');
    $builder->select('*');
    $builder->where('Id',$Id);
    $query = $builder->get();
    return $query->getResultArray();

}
// update function

public function updates($data,$Id) 
{

    $db =\Config\Database::connect();
    $builder=$this->db->table('adm_roletbl');
    $builder->where('Id',$Id);
    $builder->update($data);
   // $query = $builder->get();
    return $this->db->affectedRows();

}

}

