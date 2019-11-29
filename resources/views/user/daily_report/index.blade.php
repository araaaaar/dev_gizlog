@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報一覧</h2>
<div class="main-wrap">
  <div class="btn-wrapper daily-report">

    {{-- <form> --}}
    {!! Form::open(['method' => 'GET', 'route' => 'report.index']) !!}
      {{-- <input class="form-control" name="search-month" type="month"> --}}
      {{-- <input> 要素の month 型の値："YYYY-MM" の形式の文字列 --}}
      {!! Form::input('month', 'search-month', null, ['class' => 'form-control']) !!}
      {{-- <button type="submit" class="btn btn-icon" href="{{ route('report.create') }}"><i class="fa fa-search"></i></button> --}}
      {!! Form::button('<i class="fa fa-search"></i>', ['class' => 'btn btn-icon', 'type' => 'submit']) !!}
    {{-- </form> --}}
    {!! Form::close() !!}

    <a class="btn btn-icon" href="{{ route('report.create') }}"><i class="fa fa-plus"></i></a>
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
        @foreach ($daily_reports as $daily_report)
          <tr class="row">
            {{-- <td class="col-xs-2">{{ $daily_report->reporting_time }}</td> --}}
            <td class="col-xs-2">{{ $daily_report->reporting_time->format('m/d (D)') }}</td>
            {{-- {{ var_dump($daily_report->reporting_time) }} --}}
            <td class="col-xs-3">{{ $daily_report->title }}</td>
            <td class="col-xs-5">{{ $daily_report->content }}</td>
            <td class="col-xs-2"><a class="btn" href="{{ route('report.show', $daily_report->id) }}"><i class="fa fa-book"></i></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>

      <div class="text-center">
        {{-- <php echo $daily_reports->links(); ?> --}}
        {{ $daily_reports->links() }}
      </div>

    </div>
</div>

@endsection

