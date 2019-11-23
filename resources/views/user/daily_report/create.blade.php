@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => 'report.store']) !!}

      {{-- <input class="form-control" name="user_id" type="hidden"> --}}
      {{-- {!! Form::input('user_id', ['class' => 'form-control']) !!} --}}

      <div class="form-group form-size-small">
        {{-- <input class="form-control" name="reporting_time" type="date" value="{{ date('Y-m-d') }}"> --}}
        {!! Form::date('reporting_time', date('Y-m-d'), ['required', 'class' => 'form-control']) !!}
        <span class="help-block"></span>
      </div>

      <div class="form-group">
        {{-- <input class="form-control" placeholder="Title" name="title" type="text"> --}}
        {!! Form::input('text', 'title', null, ['required', 'class' => 'form-control', 'placeholder' => 'Title']) !!}
        <span class="help-block"></span>
      </div>

      <div class="form-group">
        {{-- <textarea class="form-control" placeholder="Content" name="contents" cols="50" rows="10"></textarea> --}}
        {!! Form::textarea('content', null, ['required', 'class' => 'form-control', 'placeholder' => 'Content', 'size' => '50x10']) !!}
        <span class="help-block"></span>
      </div>

      {{-- <button type="submit" class="btn btn-success pull-right" href="{{ route('report.store') }}">Add</button> --}}
      {!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection

