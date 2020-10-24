<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Http\Request;
use App\Visit;
use App\Client;

class ReportController extends Controller
{

    public function report_by_month(Request $request){

        if($request->date){
            $start=date('Y-m-01',strtotime($request->date));
            $end=date('Y-m-t',strtotime($request->date));
        }else{

            $start=date('Y-m-d',strtotime($request->start));
            $end=date('Y-m-d',strtotime($request->end));
        }
        $visits = Visit::whereBetween('created_at',[$start,$end])->get();
              
        $total_visit = count($visits);

        $paid_td = Visit::where('td_or_da_status',1)->sum('td_or_da');
        $pending_td = Visit::where('td_or_da_status',0)->sum('td_or_da');
        
        // $date = explode('-',$request->date);
       
        // $year  = $date[0];
        // $monthNum  = $date[1];
        // $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        // $monthName = $dateObj->format('F');
        
        
        return view('reports.monthy_report',compact('visits','total_visit','paid_td','pending_td'));
    }
}
