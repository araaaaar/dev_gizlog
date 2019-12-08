<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\TagCategory;
use App\Models\User;
use App\Http\Requests\User\SearchWordRequest;
use App\Http\Requests\User\QuestionsRequest;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    protected $question;
    protected $category;

    public function __construct(Question $question, TagCategory $category, User $user)
    {
        $this->middleware('auth');
        $this->question = $question;
        $this->category = $category;
        $this->user = $user;
    }

    /**
     * 一覧表示
     * 
     * @param $search_word string
     * @param $searchCategory string
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(SearchWordRequest $request)
    {
        $searchWord = $request->input('search_word');
        $searchCategory = $request->input('tag_category_id');
        $questions = $this->question->searchWord($searchWord)->searchCategory($searchCategory)->paginate(5);
        dd($questions);
        $categories = $this->category->all();

        return view('user.question.index', compact('questions', 'categories'));
    }

    /**
     * 新規作成
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->all();
        $plucked = $categories->pluck('name', 'id')->prepend('Select category', 0);
        $plucked->all();
        return view('user.question.create', compact('categories', 'plucked'));
    }

    /**
     * DBへ保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionsRequest $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();
        // dd($inputs);
        // $inputs['user_id'] = $this->question->find($id);
        // dd($inputs);
        $this->question->fill($inputs)->save();
        return redirect()->route('question.index');
    }

    /**
     * 詳細表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->find($id);
        $question = $this->question->find($id);
        
        // dd($question);
        return view('user.question.show', compact('question', 'user'));
    }

    /**
     * 編集
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 更新
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
     * 論理削除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
