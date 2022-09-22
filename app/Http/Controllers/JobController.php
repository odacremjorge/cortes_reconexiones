<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Operator;
use App\Models\Remesa;
use Illuminate\Http\Request;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $operators = Operator::all();
        $remesas = Remesa::orderBy('id', 'desc')->get();
        $cortes = Job::select(
            'jobs.id',
            'operators.name',
            'remesas.name_remesa',
            'remesas.month',
            'amount_job',
            'date_job',
            'c',
            'cnp',
            'cc',
            'md',
            'mbll',
            'imp',
            'ie',
            'operator_id',
            'remesa_id'
        )
        ->join('operators','jobs.operator_id','=','operators.id')
        ->join('remesas','jobs.remesa_id','=','remesas.id')
        ->get();
        
       
        
        return view('job.index', compact('operators','remesas','cortes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Job::create([
            'amount_job'=> $request->Amount,
            'date_job'=> $request->Date,
            'c'=> $request->C,
            'cnp'=> $request->Cnp,
            'cc'=> $request->Cc,
            'md'=> $request->Md,
            'mbll'=> $request->Mbll,
            'imp'=> $request->Imp,
            'ie'=> $request->Ie,
            'operator_id'=> $request->Operator,
            'remesa_id'=> $request->Remesa,  

        ]);
        return redirect('/job')->with('Mensaje', 'HEY, Cortes ingresados satisfactoriamente!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $operators = Operator::all();
        $remesas = Remesa::orderBy('id', 'desc')->get();
        $job = Job::findOrFail($id);
        return view('job.edit', ['job' => $job,'operators' => $operators,'remesas' => $remesas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $job = Job::findOrFail($id);
        $job->amount_job = $request->Amount;
        $job->c = $request->C;
        $job->cnp = $request->Cnp;
        $job->cc = $request->Cc;
        $job->md = $request->Md;
        $job->mbll = $request->Mbll;
        $job->imp = $request->Imp;
        $job->ie = $request->Ie;
        $job->operator_id = $request->Operator;
        $job->remesa_id = $request->Remesa;
        $job->save();
        return redirect('/job')->with('Mensaje', 'HEY, Trabajo actualizado satisfactoriamente!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
        $job->delete();
        return redirect()->back()->with('Mensaje', 'HEY, Registro de cortes eliminado satisfactoriamente!!!');
    }
}
