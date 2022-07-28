@extends('layouts.master')

@section('content')
 
    <div class="pt-3 pb-5">
        <div class="card">
            <div class="card-header">
                Relatorio por Clientes
            </div>
            <div class="card-body">
                <h5 class="card-title" style="font-size: 12px">Selecione o cliente/s para obter o relatorio:</h5> <hr>
                <form class="g-3" id="reportForm" method="POST">
                    @csrf
                     
                    <div class="row">
                        <div class="col-md-4">
                            <label for="consultor" class="form-label">Consultor</label>
                            <select id="consultor" required name="consultor" class="form-select">
                                @foreach ($client_list as $data)
                                    <option value="{{ $data->co_cliente }}">{{ $data->no_contato }}</option>
                                @endforeach
                            </select>
                        </div>
      
                    </div>

                    <h5 class="card-title  pt-5" style="font-size: 12px">Periodo:</h5> <hr>
                    <div class="row">
                        
                        <div class="col-md-3">
                            <label for="inputPassword4" class="form-label">De:</label> 
                            <select required name="start_mth" id="start_mth" class="form-control">
                                <option {{ ($start_mth == 1) ? 'selected' : '' }} value="1">Janeiro</option>
                                <option {{ ($start_mth == 2) ? 'selected' : '' }} value="2">Fevereiro</option>
                                <option {{ ($start_mth == 3) ? 'selected' : '' }} value="3">Marco</option>
                                <option {{ ($start_mth == 4) ? 'selected' : '' }} value="4">Abril</option>
                                <option {{ ($start_mth == 5) ? 'selected' : '' }} value="5">Maio</option>
                                <option {{ ($start_mth == 6) ? 'selected' : '' }} value="6">Junho</option>
                                <option {{ ($start_mth == 7) ? 'selected' : '' }} value="7">Julho</option>
                                <option {{ ($start_mth == 8) ? 'selected' : '' }} value="8">Agosto</option>
                                <option {{ ($start_mth == 9) ? 'selected' : '' }} value="9">Setembro</option>
                                <option {{ ($start_mth == 10) ? 'selected' : '' }} value="10">Outubro</option>
                                <option {{ ($start_mth == 11) ? 'selected' : '' }} value="11">Novembro</option>
                                <option {{ ($start_mth == 12) ? 'selected' : '' }} value="12">Dezembro</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select required name="start_year" id="start_year" class="form-control" style="margin-top: 30px !important;"> 
                                @foreach ($yearList as $row)
                                    <option {{ ($start_year == $row->year) ? 'selected' : '' }} value="{{ $row->year }}">{{ $row->year }}</option>
                                @endforeach
                            </select>
                        </div>

                        
                        <div class="col-md-3">
                            <label for="inputPassword4" class="form-label">Ate:</label> 
                            <select required name="end_mth" id="end_mth" class="form-control">
                                <option {{ ($end_mth == 1) ? 'selected' : '' }} value="1">Janeiro</option>
                                <option {{ ($end_mth == 2) ? 'selected' : '' }} value="2">Fevereiro</option>
                                <option {{ ($end_mth == 3) ? 'selected' : '' }} value="3">Marco</option>
                                <option {{ ($end_mth == 4) ? 'selected' : '' }} value="4">Abril</option>
                                <option {{ ($end_mth == 5) ? 'selected' : '' }} value="5">Maio</option>
                                <option {{ ($end_mth == 6) ? 'selected' : '' }} value="6">Junho</option>
                                <option {{ ($end_mth == 7) ? 'selected' : '' }} value="7">Julho</option>
                                <option {{ ($end_mth == 8) ? 'selected' : '' }} value="8">Agosto</option>
                                <option {{ ($end_mth == 9) ? 'selected' : '' }} value="9">Setembro</option>
                                <option {{ ($end_mth == 10) ? 'selected' : '' }} value="10">Outubro</option>
                                <option {{ ($end_mth == 11) ? 'selected' : '' }} value="11">Novembro</option>
                                <option {{ ($end_mth == 12) ? 'selected' : '' }} value="12">Dezembro</option>
                            </select>
                        </div>

                        <div class="col-md-3"> 
                            <select name="end_year" id="end_year" class="form-control" style="margin-top: 30px !important;">
                                @foreach ($yearList as $row)
                                    <option {{ ($end_year == $row->year) ? 'selected' : '' }} value="{{ $row->year }}">{{ $row->year }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
  

                    <div class="col-12 pt-4">
                        <a class="btn btn-info btn-sm" id="listBtn">
                            Gerar Relatorio <i class="fa fa-plus"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" href="">
                            Gerar Grafico <i class="fa fa-plus"></i>
                        </a>
                        <a class="btn btn-success btn-sm" href="">
                            Pizza <i class="fa fa-plus"></i>
                        </a>
                    </div>

                </form>
            </div>
        </div> 
    </div>

@endsection
