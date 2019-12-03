<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\DailyReportRequest;
use App\Http\Requests\SearchMonthRequest;
use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use Auth;

class DailyReportController extends Controller
{
    private $dailyReport;

    public function __construct(DailyReport $instanceClass)
    {
        $this->middleware('auth');
        $this->dailyReport = $instanceClass;
    }

    /**
     * 日報一覧表示
     *
     * @param $month string
     * @param $dailyReports LengthAwarePaginator object
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */ 
    public function index(SearchMonthRequest $request)
    {
        $month = $request->input('search-month');
        $dailyReports = $this->dailyReport->getByUserId(Auth::id(), $month);
        return view('user.daily_report.index', compact('dailyReports'));
    }

    /**
     * 新規作成
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('user.daily_report.create');
    }

    /**
     * バリデートしDBに保存
     *
     * @param $inputs array
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DailyReportRequest $request)
    {
        $inputs = $request->validated();
        $inputs['user_id'] = Auth::id();
        $this->dailyReport->create($inputs);
        return redirect()->route('report.index');
    }

    /**
     * 詳細表示
     *
     * @param $dailyReport DailyReport object
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show($id)
    {
        $dailyReport = $this->dailyReport->find($id);
        return view('user.daily_report.show', compact('dailyReport'));
    }

    /**
     * 編集
     *
     * @param $dailyReport DailyReport object
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit($id)
    {
        $dailyReport = $this->dailyReport->find($id);
        return view('user.daily_report.edit', compact('dailyReport'));
    }

    /**
     * バリデートし更新
     *
     * @param $inputs array
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DailyReportRequest $request, $id)
    {
        $inputs = $request->validated();
        $this->dailyReport->find($id)->update($inputs);
        return redirect()->route('report.index');
    }

    /**
     * 論理削除
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->dailyReport->find($id)->delete();
        return redirect()->route('report.index');
    }
}
