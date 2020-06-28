<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Report;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'acl']);
    }

    public function index()
    {
    	$reports = Report::paginate(25);	
        return view('admin/report/index', ['reports' => $reports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/report/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$validatedData = $request->validate([
            'name' => 'required|string',
        ]);
        Report::create($validatedData);

        return Redirect::back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currentReport = Report::find($id);

        return view(
            'admin.report.update', ['currentReport' => $currentReport,]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$validatedData = $request->validate([
            'name' => 'required|string',
        ]);
        $report = Report::find($id);
        $report->name = $validatedData['name'];
        $report->save();

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Report::find($id)->delete();
        return Redirect::back();
    }
}