<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Http\Request;
use App\Visit;
use App\Client;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_client = count(Client::all());
        $total_visit = count(Visit::all());
        $total_td = Visit::sum('td_or_da');
        $paid_td = Visit::where('td_or_da_status',1)->sum('td_or_da');
        $pending_td = Visit::where('td_or_da_status',0)->sum('td_or_da');
        return view('home',compact('total_visit','total_td','total_client','pending_td', 'paid_td'));
    }
}
