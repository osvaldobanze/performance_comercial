<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;
use DB;


class ClientReportController extends Controller
{
    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    public function index()
    {
        
        $data['start_mth'] = 01; $data['start_year'] = 2007; $data['end_mth'] = 01; $data['end_year'] = date('Y');

        $data['client_list'] = $this->client->get_clients();

        $data['yearList'] = $this->client->yearList();

        return view('pages.report.client.index', $data);
    }

    
}
