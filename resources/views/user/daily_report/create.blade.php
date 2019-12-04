@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">

    {!! Form::open(['route' => 'report.store']) !!}
      <div class="form-group form-size-small @if($errors->has('reporting_time')) has-error @endif">
        {!! Form::date('reporting_time', Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) !!}
        @if($errors->first('reporting_time')) <span class="help-block">{{ $errors->first('reporting_time') }}</span> @endif
      </div>

      <div class="form-group @if($errors->has('title')) has-error @endif">
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
        @if($errors->first('title')) <span class="help-block">{{ $errors->first('title') }}</span> @endif
      </div>

      <div class="form-group @if($errors->has('content')) has-error @endif">
        {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Content', 'size' => '50x10']) !!}
        @if($errors->first('content')) <span class="help-block">{{ $errors->first('content') }}</span> @endif
      </div>
      {!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}
    {!! Form::close() !!}

  </div>
</div>

@endsection

