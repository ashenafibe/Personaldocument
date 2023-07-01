<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class RoleRrevModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'adm_prevrole';
    protected $primaryKey       = 'Id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Id', 'role', 'prevg', 'Created_At', 'Created_By'];

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
public function insertinto($prev,$role,$Create_by)
{
    //$sql = "CALL InsertIntoRolPrev('$prev','$role','$Create_by')";
    $sql = "CALL InsertIntoRolPrev(?,?,?)";
    $result = $this->db->query($sql,[$prev,$role,$Create_by]);
    //$result = $this->db->query($sql);
    if ($result) {
        return true;
    }
    
    return false;
}

}


