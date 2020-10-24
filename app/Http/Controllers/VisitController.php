<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\User;
use App\Client;
use App\ProjectType;
use App\Visit;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visits = Visit::latest()->get();
        // $infos = DB::table('clients')
        //     ->join('visits', 'clients.id', '=', 'visits.client_id')
        //     ->get();
        return view('clientVisit.client_visit_list',compact('visits'));
    }

    
    public function my_visit($id)
    {
        $visits = User::find($id)->visits()->latest()->get();
        return view('clientVisit.my_visits',compact('visits'));
        // return $visits;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $visits = Visit::all();
        $clients = Client::all();
        $users = User::all();
        $types = ProjectType::all();
        return view('clientVisit.create_client_visit',compact('users','types','visits','clients'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
        ]);

        $visitors = New Visit;
        $clients = New Client;


        $data = $request->input();

        if(auth()->user()->hasRole('admin')){
            $visitors->remarks = $data['remarks'];
            $visitors->response = $data['response'];
        }

        $visitors->comments = $data['comments'];
        $visitors->td_or_da = $data['taOrDa'];
        $visitors->paid_by = $data['paid_by'];
        $visitors->client_id =$data['client_id'];
        $visitors->visit_name = $data['visit_name'];
        $status = $visitors->save();


        if($status){
            $visitors->users()->attach($request->visitor_id);
            $visitors->project_types()->attach($request->project_type);
            
        session()->flash('success',"Created successfully");
            return redirect()->route('visit.mine',auth()->user()->id);
            }
            else{
                return redirect()->back();
            } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_my_visit($id)
    {
        $visit = Visit::find($id);
        $clients = Client::all();
        $users = User::all();
        $types = ProjectType::all();
        
        session()->flash('success',"Updated successfully");
        return view('clientVisit.edit_my_visit',compact('visit','clients', 'users', 'types'));
    }

    public function update_my_visit(Request $request, $id)
    {

        $visitor = Visit::find($id);
        $clients = New Client;


        $data = $request->input();

        if(auth()->user()->hasRole('admin')){
            $visitor->remarks = $data['remarks'];
            $visitor->response = $data['response'];
        }

        $visitor->comments = $data['comments'];
        $visitor->td_or_da = $data['taOrDa'];
        $visitor->paid_by = $data['paid_by'];
        $visitor->client_id =$data['client_id'];
        $visitor->visit_name = $data['visit_name'];
        $status = $visitor->save();


        if($status){
            $visitor->users()->sync($request->visitor_id);
            $visitor->project_types()->sync($request->project_type);
            session()->flash('success',"Updated successfully");
            return redirect()->route('visit.mine',auth()->user()->id);
            }
            else{
                return redirect()->back();
            } 
       
    }

    public function delete_my_visit($id){
        $visit = Visit::find($id);
        $status = $visit->delete();
        if($status){
            
        session()->flash('success',"Deleted successfully");
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        $Visit = Visit::find($id);
        $Visit->td_or_da_status = $request->td_or_da_status;
        $status = $Visit->save();

        if($status){
         
        
            // $visits = Visit::latest()->get();
            
            // session()->flash('success',"Updated successfully"); 
            return redirect()->back();
            }
            else{
            return redirect('')->with('error',"Unable to Update");
            } 
    }

    public function update_reamrks(Request $request, $id)
    {
        // return $request->all();
        $Visit = Visit::find($id);
        $Visit->response = $request->response;
        $Visit->remarks = $request->remarks;
        $status = $Visit->save();

        if($status){
         
        
            // $visits = Visit::latest()->get();
            
            session()->flash('success',"Updated successfully");
            return redirect()->back();
            }
            else{
            return redirect('')->with('error',"Unable to Update");
            } 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    public function invoice($id)
    {
        // $visits = User::find($id)->visits()->get();
        // $visits = Visit::find($id)->users()->get();
        $visits = Visit::find($id);
        // return $visits;
        $date = date("m/d/Y ", time());
        $time = date("h:i:s a", time());
        return view('clientVisit.invoice',compact('visits','date','time'));
    }
}
