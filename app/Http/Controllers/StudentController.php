<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dataSantri.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dataSantri.create');
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
            'name' => ['required', 'string', 'max:255'],
            'room' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
        ]);

        Student::create([
            'name' => $request->name,
            'room' => $request->room,
            'phone' => $request->phone,
        ]);

        return redirect(route("students.index"));
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect(route("students.index"));
    }

    public function exportExcel()
    {
        if(auth()->user()->level==="ADMIN"){
            return Excel::download(new StudentsExport, 'students.xlsx');
        }else {
            return redirect(route('dashboard'));
        }
    }

    public function exportPDF()
    {
        if(auth()->user()->level==="ADMIN"){
            return Excel::download(new StudentsExport, 'students.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        }else {
            return redirect(route('dashboard'));
        }
    }

    public function import(Request $request)
    {
        Excel::import(new StudentsImport, $request->file('file'));
        return redirect(route("students.index"));
    }
}
