<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Cao_fatura extends Model
{
    protected $table = 'cao_fatura';

    public function yearList()
    {
        return  DB::select(" SELECT DISTINCT(YEAR(data_emissao)) as year FROM cao_fatura ");
    }
}
