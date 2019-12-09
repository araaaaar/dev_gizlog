<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\TagCategory;
use App\Models\User;
use App\Http\Requests\User\SearchWordRequest;
use App\Http\Requests\User\QuestionsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
     * @param $questions LengthAwarePaginator object
     * @param $categories Collection object
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(SearchWordRequest $request)
    {
        $searchWord = $request->input('search_word');
        $searchCategory = $request->input('tag_category_id');
        $questions = $this->question->searchWord($searchWord)->searchCategory($searchCategory)->paginate(10);
        $categories = $this->category->all();

        return view('user.question.index', compact('questions', 'categories'));
    }

    /**
     * 新規作成
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $categories = $this->category->all();
        $plucked = $categories->pluck('name', 'id')->prepend('Select category', 0)->all();
        return view('user.question.create', compact('categories', 'plucked'));
    }

    /**
     * 確認
     *
     * @return
     */
    public function confirm(Request $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();
        return view('user.question.confirm', compact('inputs'));
    }

    /**
     * 内容確認しDBへ保存
     *
     * @param  $inputs array
     * @return 
     */
    public function store(QuestionsRequest $request)
    {
        
        // dd($inputs);

        // $question = $this->question->find($id);
        // $this->question->fill($inputs)->save();
        // $categories = $this->category->all();

        

        // return redirect()->route('question.index');
    }

    /**
     * 詳細表示
     *
     * @param  int  $id
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show($id)
    {
        $user = $this->user->find($id);
        $question = $this->question
        
        ->find($id);
        
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
