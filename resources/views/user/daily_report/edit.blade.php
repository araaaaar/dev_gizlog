@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">

    {!! Form::open(['method' => 'PUT', 'route' => ['report.update', $dailyReport->id]]) !!}
      <div class="form-group form-size-small @if($errors->has('reporting_time')) has-error @endif">
        {!! Form::date('reporting_time', $dailyReport->reporting_time, ['class' => 'form-control']) !!}
        @if($errors->first('reporting_time')) <span class="help-block">{{ $errors->first('reporting_time') }}</span> @endif
      </div>

      <div class="form-group @if($errors->has('title')) has-error @endif">
        {!! Form::text('title', $dailyReport->title, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
        @if($errors->first('title')) <span class="help-block">{{ $errors->first('title') }}</span> @endif
      </div>

      <div class="form-group @if($errors->has('content')) has-error @endif">
        {!! Form::textarea('content', $dailyReport->content, ['class' => 'form-control', 'placeholder' => '本文', 'size' => '50x10']) !!}
        @if($errors->first('content')) <span class="help-block">{{ $errors->first('content') }}</span> @endif
      </div>
      {!! Form::submit('Update', ['class' => 'btn btn-success pull-right']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection

