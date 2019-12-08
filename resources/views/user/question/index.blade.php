@extends ('common.user')
@section ('content')

<h2 class="brand-header">質問一覧</h2>
<div class="main-wrap">
  {{-- <form> --}}
  {!! Form::open(['route' => ['question.index'], 'method' => 'GET', 'class' => 'search']) !!}

    <div class="btn-wrapper">
      <div class="search-box">
        {!! Form::input('text', 'search_word', null, ['class' => 'form-control search-form'], ['placeholder' => 'Search words...' ]) !!}
        <button type="submit" class="search-icon" ><i class="fa fa-search" aria-hidden="true"></i></button>
      </div>

      <a class="btn" href="{{ route('question.create') }}"><i class="fa fa-plus" aria-hidden="true"></i></a>
      {{-- <a class="btn" href="{{ route('question.show', $question->id) }}"> --}}
      <a class="btn" href="">
        <i class="fa fa-user" aria-hidden="true"></i>
      </a>
    </div>
    
    <div class="category-wrap">
      <div class="btn all" id="0">all</div>
      @foreach($categories as $category)
        <div class="btn {{ $category->name }}" id="{{ $category->id }}">{{ $category->name }}</div>
      @endforeach
      {!! Form::hidden('tag_category_id', null, ['id' => 'category-val']) !!}
    </div>
  {!! Form::close() !!}

  <div class="content-wrapper table-responsive">
    <table class="table table-striped">
      <thead>
        <tr class="row">
          <th class="col-xs-1">user</th>
          <th class="col-xs-2">category</th>
          <th class="col-xs-6">title</th>
          <th class="col-xs-1">comments</th>
          <th class="col-xs-2"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          @foreach($categories as $category)
            @foreach($questions as $question)

              <tr class="row">
                <td class="col-xs-1"><img src="{{ $user->avatar }}" class="avatar-img"></td>
                <td class="col-xs-2">{{ $category->name }}</td>
                <td class="col-xs-6">{{ $question->title }}</td>
                <td class="col-xs-1"><span class="point-color"></span></td>
                <td class="col-xs-2">
                <a class="btn btn-success" href="{{ route('question.show', $question->id) }}">
                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          @endforeach
        @endforeach
      </tbody>
    </table>

    <div class="text-center">
      {{ $questions->appends(request()->all())->links() }}
    </div>

    <div aria-label="Page navigation example" class="text-center"></div>
  </div>
</div>

@endsection

