<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PrevModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'adm_privilegestbl';
    protected $primaryKey       = 'Id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Id', 'Route', 'Description', 'Groups', 'Created_by', 'Creared_At'];

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
// select all Previleges
public function ListofPrev()
{

    $db =\Config\Database::connect();
    $builder=$this->db->table('adm_privilegestbl');
    $builder->select('*');
    $query = $builder->get();
    return $query->getResultArray();
}
// Edit prev
public function Edit ($Id)
{
$db =\Config\Database::connect();
$builder=$this->db->table('adm_privilegestbl');
$builder->select('*');
$builder->where('Id',$Id);
$query = $builder->get();
return $query->getResultArray();

}
// update prev

public function updates($data,$Id) 
{

$db =\Config\Database::connect();
$builder=$this->db->table('adm_privilegestbl');
$builder->where('Id',$Id);
$builder->update($data);
// $query = $builder->get();
return $this->db->affectedRows();

}

}




