<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DailyReport;
use App\User;
use Auth;
use Post;

class DailyReportController extends Controller
{
    private $daily_report;
    private $user;

    public function __construct(DailyReport $instanceClass, User $userInstanceClass)
    {
        $this->middleware('auth');
        $this->daily_report = $instanceClass;
        $this->user = $userInstanceClass;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $input = $request->all();
        // dd($input);
        $month = $request->input('search-month');
        // dd($month); 
        $daily_reports = $this->daily_report->getByUserId(Auth::id(), $month);
        
        $user = Auth::user();
        return view('user.daily_report.index', compact('daily_reports', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.daily_report.create');
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
        $input = $request->all();
        // dd($input);
        $input['user_id'] = Auth::id();
        $this->daily_report->fill($input)->save();
        return redirect()->route('report.index');
        
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
        return view('user.daily_report.edit');
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
    public function destroy($id)
    {
        //
    }
}
