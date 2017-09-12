<?php

namespace App\Modules\Manage\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Manage\Models\Article;
use Illuminate\Support\Facades\Auth;
class ArticleController extends Controller
{
    //列表
    public function articleList()
    {
        $articles = Article::all();
        return view('manage.article.index')->with('articles', $articles);
    }

    //新增
    public function create(Request $request)
    {
        if ($_POST) {
            $article = Article::create([
                'title' => $request->title,
                'desc' => $request->desc
            ]);
            if ($article) {
                return redirect()->to('/manage/article')->with('message', '新增文章成功');
            }
        }
        return view('manage.article.create');

    }

    //编辑
    public function edit(Request $request, $id)
    {
        if ($_POST) {
            $article = Article::find($id);
            $article->update([
                'title' => $request->title,
                'desc' => $request->desc
            ]);
            if ($article) {
                return redirect()->to('/manage/article')->with('message', '修改成功');
            }
        }
        $article = Article::find($id);
        return view('manage.article.edit')->with('article', $article);
    }

    //删除
    public function delete($id)
    {
        Article::destroy($id);
        return redirect()->to('/manage/article')->with('message', '删除成功');
    }
}
