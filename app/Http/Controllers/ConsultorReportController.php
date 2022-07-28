<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cao_fatura as Fatura;
use App\Models\Cao_salario as Salario;
use App\Models\Cao_os as Os;
use App\Models\Consultor;
use App\Models\SystemPermition as Permition;
use DB;

class ConsultorReportController extends Controller
{

    public function __construct(Fatura $fatura)
    {
        $this->fatura = $fatura;
    }


    public function index()
    {
        
        $data['start_mth'] = 01; $data['start_year'] = 2007; $data['end_mth'] = 01; $data['end_year'] = date('Y');

        $data['consultor_list'] = $this->get_consultors();
        $data['yearList'] = $this->fatura->yearList();

        return view('pages.report.consultor.index', $data);
    }

    public function list_report(Request $request)
    { 
 
        if (isset($_POST['start_year'])) { 
            $data['start_mth'] = $_POST['start_mth']; $data['start_year'] = $_POST['start_year']; 
            $data['end_mth'] = $_POST['end_mth']; $data['end_year'] = $_POST['end_year'];
        } else {
            $data['start_mth'] = 01; $data['start_year'] = 2007; $data['end_mth'] = 01; $data['end_year'] = date('Y');
        }


        $data['consultor_controller'] = $this;
        $data['yearList'] = $this->fatura->yearList();

        $data['consultor_filter'] = Consultor::whereIn('co_usuario', [$request->consultor])->get();
         
        $data['consultor_list'] = $this->get_consultors();
        return view('pages.report.consultor.report', $data);
    }

    

    // Metodos auxiliares!
    public function get_consultors()
    {
        return Consultor::leftJoin('permissao_sistema','permissao_sistema.co_usuario','=','cao_usuario.co_usuario')
            ->where(
                [
                    ['permissao_sistema.co_sistema', 1],
                    ['permissao_sistema.in_ativo', 'S']
                ]
            )
            ->whereIn('permissao_sistema.co_tipo_usuario', [0,1,2])
        ->get(); 
    }

    public function get_receita_liquida_clients($co_usuario, $start_mth, $start_year, $end_mth, $end_year)
    {   
        $cao_os = Os::where('co_usuario', $co_usuario)->pluck('co_os');

        return Fatura::groupBy('cao_fatura.co_cliente')
            ->whereRaw('YEAR(`data_emissao`) BETWEEN '.$start_year.' AND '.$end_year.' AND MONTH(`data_emissao`) BETWEEN '.$start_mth.' AND '.$end_mth.'')
            ->whereIn('co_os', $cao_os)
        ->get(); 
        // Fazer join com co_sistema
    }

    public function get_custo_fixo($co_usuario)
    {   
        $cf = Salario::where('co_usuario', $co_usuario)->first(); 
        return ($cf) ? $$cf = $cf['brut_salario'] : $cf = 0 ;
    }
}

