@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報一覧</h2>
<div class="main-wrap">
  <div class="btn-wrapper daily-report">
    {!! Form::open(['method' => 'GET', 'route' => 'report.index']) !!}
      {!! Form::input('month', 'search-month', null, ['class' => 'form-control']) !!}
      {!! Form::button('<i class="fa fa-search"></i>', ['class' => 'btn btn-icon', 'type' => 'submit']) !!}
    {!! Form::close() !!}
    <a class="btn btn-icon" href="{{ route('report.create') }}"><i class="fa fa-plus"></i></a>
  </div>

  <div class="@if($errors->has('search-month')) has-error @endif">
    <span class="help-block">{{ $errors->first('search-month') }}</span>
  </div>
  
  <div class="content-wrapper table-responsive">
    <table class="table table-striped">
      <thead>
        <tr class="row">
          <th class="col-xs-2">Date</th>
          <th class="col-xs-3">Title</th>
          <th class="col-xs-5">Content</th>
          <th class="col-xs-2"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($dailyReports as $dailyReport)
          <tr class="row">
            <td class="col-xs-2">{{ $dailyReport->reporting_time->format('m/d (D)') }}</td>
            <td class="col-xs-3">{{ str_limit($dailyReport->title, $limit = 30, $end = '...') }}</td>
            <td class="col-xs-5">{{ str_limit($dailyReport->content, $limit = 40, $end = '...') }}</td>
            <td class="col-xs-2"><a class="btn" href="{{ route('report.show', $dailyReport->id) }}"><i class="fa fa-book"></i></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="text-center">
        {{ $dailyReports->appends(request()->all())->links() }}
    </div>
  </div>
</div>

@endsection

