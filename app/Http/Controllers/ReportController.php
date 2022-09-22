<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\Operator;
use App\Models\Remesa;
use PDF;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function index(Request $request)
    {
        //
       
        $operators = Operator::all();
        $remesas = Remesa::orderBy('id', 'desc')->get();
        $cortes = Job::select(
            'jobs.id',
            'operators.name',
            'remesas.name_remesa',
            'remesas.amount',
            'remesas.month',
            'remesas.annio',
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
        $mes = $request->Month;
        $year = $request->Name;
        
        return view('report.index', compact('operators','remesas','cortes','mes','year'));
        
    }
    public function show(Request $request)
    {
        $operators = Operator::all();
        $remesas = Remesa::orderBy('id', 'desc')->get();
        $cortes = Job::select(
            'jobs.id',
            'operators.name',
            'remesas.name_remesa',
            'remesas.amount',
            'remesas.month',
            'remesas.annio',
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
        $mes = $request->Month;
        $year = $request->Name;
        
        return view('report.show', compact('operators','remesas','cortes','mes','year'));
    }

    public function showPDF()
    {
        $operators = Operator::all();
        $remesas = Remesa::orderBy('id', 'desc')->get();
        $cortes = Job::select(
            'jobs.id',
            'operators.name',
            'remesas.name_remesa',
            'remesas.amount',
            'remesas.month',
            'remesas.annio',
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
        $pdf = PDF::loadView('report.showPDF',['operators'=>$operators, 'remesas' => $remesas, 'cortes' => $cortes]);
        
        return $pdf->stream('report.showPDF',array('Attachment'=>false));
    }

}
