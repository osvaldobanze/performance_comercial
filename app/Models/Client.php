<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Client extends Model
{
    protected $table = 'cao_cliente';

    
    public function yearList()
    {
        return  DB::select(" SELECT DISTINCT(YEAR(data_emissao)) as year FROM cao_fatura ");
    }

    
    public function get_clients()
    {
        return $this->where('tp_cliente', 'A')->get();
    }

}
