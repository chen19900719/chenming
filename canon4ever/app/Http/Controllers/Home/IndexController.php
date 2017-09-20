<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Cms\Link;
use App\Models\Cms\Category;
use App\Models\Cms\Article;

use App\Models\Casts\Category as EpisodeCategory;


class IndexController extends Controller
{
    public function __construct()
    {
        //友情链接
        $links = Link::orderBy('sort_order')->get();
        view()->share([
            'links' => $links,
            'navigation' => Category::get_navigation(),
        ]);
    }

    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $news = collect();
        //业界 武汉 大牛 程序员生活 php技术 前端开发  php代码库  php前端库 PHP培训
        $news->net = Article::where('category_id', 7)->orderBy('created_at', 'desc')->take(5)->get();
        $news->wh = Article::where('category_id', 8)->orderBy('created_at', 'desc')->take(5)->get();
        $news->genius = Article::where('category_id', 9)->orderBy('created_at', 'desc')->take(5)->get();
        $news->life = Article::where('category_id', 10)->orderBy('created_at', 'desc')->take(5)->get();
        $news->php = Article::where('category_id', 11)->orderBy('created_at', 'desc')->take(4)->get();
        $news->font = Article::where('category_id', 12)->orderBy('created_at', 'desc')->take(6)->get();
        $news->lib_php = Article::where('category_id', 13)->orderBy('created_at', 'desc')->take(5)->get();
//        $news->lib_js = Article::where('category_id', 28)->orderBy('created_at', 'desc')->take(5)->get();
//        $news->school = \DB::table('c_article')->where('cid', '159')->orderBy('date', 'desc')->take(5)->get();


        $news->episode_categories = EpisodeCategory::get_categories();


        $manuals = EpisodeCategory::where('parent_id', 42)->get();

        return view('home.index', compact('manuals', 'news'));
    }

    /**
     * 文章列表
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category($id)
    {
        $category = Category::find($id);
        $siblings = Category::where('parent_id', $category->parent_id)->get();
        $articles = Article::where('category_id', $id)->orderBy('created_at', 'desc')->paginate(4);

        return view('home.category', compact('category', 'siblings', 'articles'));
    }

    /**
     * 文章内页
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function article($id)
    {
        $article = Article::with('category')->find($id);
        return view('home.article', compact('article'));
    }
}
