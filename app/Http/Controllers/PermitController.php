<?php

namespace App\Http\Controllers;

use App\Exports\PermitsExport;
use App\Models\Permit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PermitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dataPulang.index');
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
        $request->validate([
            'student' => ['required', 'exists:students,id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'reason' => ['required', 'string', 'max:255']
        ]);

        Permit::create([
            'user_id' => auth()->user()->id,
            'student_id' => $request->student,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason
        ]);

        return redirect(route("permits.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permit $permit)
    {
        return view('dataPulang.edit', compact('permit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permit $permit)
    {
        $request->validate([
            'end_date' => ['required', 'date'],
            'returned' => ['required', 'in:true,false'],
        ]);

        if($request->returned=="false") {
            $permit->update([
                'end_date' => $request->end_date,
                'returned' => false
            ]);
        }else {
            $permit->update([
                'end_date' => $request->end_date,
                'returned' => true
            ]);
        }

        return redirect(route("permits.index"));
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

    public function exportExcel()
    {
        if(auth()->user()->level==="ADMIN"){
            return Excel::download(new PermitsExport, 'permits.xlsx');
        }else {
            return redirect(route('dashboard'));
        }
    }

    public function exportPDF()
    {
        if(auth()->user()->level==="ADMIN"){
            return Excel::download(new PermitsExport, 'permits.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        }else {
            return redirect(route('dashboard'));
        }
    }
}
