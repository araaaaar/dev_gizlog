@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">


    {{-- <form> --}}
    {!! Form::open(['methos' => 'GET', 'route' => 'report.store']) !!}

      
      {{-- <input class="form-control" name="user_id" type="hidden" value="4"> --}}
      {{-- {!! Form::input('') !!} --}}

      <div class="form-group form-size-small">
        {{-- <input class="form-control" name="reporting_time" type="date"> --}}
        {{-- {!! Form::input('date', 'reporting_time', $daily_report->reporting_time->format('Y/m/d'), ['class' => 'form-control']) !!} --}}
          {!! Form::date('reporting_time', $daily_report->reporting_time, ['class' => 'form-control']) !!}
          {{-- {!! var_dump($daily_report) !!} --}}
      <span class="help-block"></span>
      </div>

      <div class="form-group">
        {{-- <input class="form-control" placeholder="Title" name="title" type="text"> --}}
        {!! Form::input('text', 'title', $daily_report->title, ['class' => 'form-control']) !!}
      <span class="help-block"></span>
      </div>

      <div class="form-group">
        {{-- <textarea class="form-control" placeholder="本文" name="contents" cols="50" rows="10">本文</textarea> --}}
        {{-- {!! Form::input('textarea', 'contents', $daily_report->content, ['class' => 'form-control', 'placeholder' => '本文', 'size' => '50x10']) !!} --}}
        {!! Form::textarea('contents', $daily_report->content, ['required', 'class' => 'form-control', 'placeholder' => '本文', 'size' => '50x10']) !!}
      <span class="help-block"></span>
      </div>


      {{-- <button type="submit" class="btn btn-success pull-right">Update</button> --}}
      {!! Form::button('Update', ['class' => 'btn btn-success pull-right', 'type' => 'submit']) !!}
    
    
    </form>


  </div>
</div>

@endsection

