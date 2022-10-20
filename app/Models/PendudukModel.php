<?php

namespace App\Models;

use CodeIgniter\Model;

class PendudukModel extends Model
{
    protected $table = 'penduduk';
    protected $primaryKey   = 'id';
    protected $allowedFields = ['penduduk', 'bulan', 'tahun'];

    public function detailPenduduk($id = null)
    {
        $builder = $this->builder($this->table)->select('id, penduduk, bulan, tahun');
        if (empty($id)) {
            return $builder->get()->getResult();
        } else {
            return $builder->where('id', $id)->get(1)->getRow();
        }
    }
}