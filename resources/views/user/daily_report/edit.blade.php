@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">

    {!! Form::open(['route' => ['report.update', $daily_report->id], 'method' => 'PUT']) !!}
      <div class="form-group form-size-small">
          {!! Form::date('reporting_time', $daily_report->reporting_time, ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('reporting_time') }}</span>
      </div>
      <div class="form-group">
        {!! Form::input('text', 'title', $daily_report->title, ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('title') }}</span>
      </div>
      <div class="form-group">
        {!! Form::textarea('contents', $daily_report->content, ['class' => 'form-control', 'placeholder' => '本文', 'size' => '50x10']) !!}
      <span class="help-block">{{ $errors->first('content') }}</span>
      </div>
      {!! Form::button('Update', ['class' => 'btn btn-success pull-right', 'type' => 'submit']) !!}
    {!! Form::close() !!}

  </div>
</div>

@endsection

