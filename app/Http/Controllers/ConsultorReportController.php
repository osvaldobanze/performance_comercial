<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cao_fatura as Fatura;
use App\Models\Cao_salario as Salario;
use App\Models\Cao_os as Os;
use App\Models\Consultor;
use App\Models\SystemPermition as Permition;
use DB;
use Carbon\Carbon;

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

        $data['consultor_filter'] = Consultor::whereIn('co_usuario', $request->consultor)->orderBy('no_usuario')->get();
         
        $data['consultor_list'] = $this->get_consultors();
        return view('pages.report.consultor.report', $data);
    }

    public function chart_report(Request $request)
    { 
         
        $data['consultor_filter'] = Consultor::whereIn('co_usuario', $request->consultor)->orderBy('no_usuario')->get();

        $cao_os = Os::whereIn('co_usuario', $request->consultor)->pluck('co_os');

        // return Fatura::select('*')->groupBy('cao_os.co_usuario')
        //     ->whereRaw('YEAR(`data_emissao`) BETWEEN '.$request->start_year.' AND '.$request->end_year.' AND MONTH(`data_emissao`) BETWEEN '.$request->start_mth.' AND '.$request->end_mth.'')
        //     ->whereIn('cao_fatura.co_os', $cao_os)
        //     ->leftJoin('cao_os', 'cao_fatura.co_os', 'cao_os.co_os')
        // ->get(); 

        
        // return Fatura::select('co_usuario', DB::raw('SUM(total) as totals'))
        // return Fatura::select('co_usuario', 'data_emissao',
        //     DB::raw(' 
        //     (CASE WHEN cao_fatura.total_imp_inc = 0 THEN 0 WHEN cao_fatura.total_imp_inc != SUM(total) - 0 THEN (  SUM(total) - ( SUM(total) * cao_fatura.total_imp_inc)/100 ) END) AS totals '
        //     )) 
        //     ->groupBy('cao_fatura.co_cliente')
        //     ->whereRaw('YEAR(`data_emissao`) BETWEEN '.$request->start_year.' AND '.$request->end_year.' AND MONTH(`data_emissao`) BETWEEN '.$request->start_mth.' AND '.$request->end_mth.'')
        //     ->whereIn('cao_fatura.co_os', $cao_os)
        //     ->leftJoin('cao_os', 'cao_fatura.co_os', 'cao_os.co_os')
        // ->get(); 

      return  Fatura::select('cao_fatura.data_emissao', 'total', 'co_usuario', 'total_imp_inc')
            ->groupBy('cao_fatura.co_cliente')
            ->whereRaw('YEAR(`data_emissao`) BETWEEN '.$request->start_year.' AND '.$request->end_year.' AND MONTH(`data_emissao`) BETWEEN '.$request->start_mth.' AND '.$request->end_mth.' ')
            ->whereIn('cao_fatura.co_os', $cao_os) 
            ->leftJoin('cao_os', 'cao_fatura.co_os', 'cao_os.co_os')

        ->get(); 


          
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

    public function get_receita_liquida_client_list($co_usuario, $start_mth, $start_year, $end_mth, $end_year)
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

    public function get_receita_liquida($total_ft, $total_imp_inc)
    {   
        $imposto = ($total_imp_inc == 0) ? 0 : ($total_ft * $total_imp_inc)/100;
        return  $total_liquido = $total_ft - $imposto; 
    }

    public function get_comissao($total_liquido, $total_imp_inc, $comissao_cn)
    {   
        return ($comissao_cn == 0) ? 0 : (($total_liquido * $total_imp_inc)/100) * ($comissao_cn /100);
    }

 
}

