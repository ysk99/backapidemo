<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    //
    // public function index()
    // {
    //     return Article::all();
    // }
    public function index()
    {
        return Article::all();
        // return $request->all();
    }

    public function getListPagination(Request $request)
    {
        // return Article::all();
        $limit = $request->input('limit');
        $page = $request->input('page');
        // $data = $request->all()
        return Article::paginate($limit);
        // return $data;
    }


    public function show($id)
    {
        return Article::find($id);
    }

    public function store(Request $request)
    {
        // return Article::create($request->input('exceldata'));
        $exceldatas = $request->input('exceldata');
        // $body = $exceldatas;
        // return array_divide($body);
        // return array_dot($body);
        // return $body['0']['body'];
        // return Article::create($exceldatas['0']);
        foreach($exceldatas as $exceldata){ //组成例子那样的数组
            $artice = new Article;
            $artice->title = $exceldata['title'];
            $artice->body = $exceldata['body'];
            $artice->edit = $exceldata['edit'];
            $artice->save();
        }
        // 此处少一个括号，造成了前端反复得到500错误，该控制器下所有函数均无法正常运行
    }

    // public function update(Request $request, $id)
    // {
    //     $article = Article::findOrFail($id);
    //     $article->update($request->all());
    //
    //     return $article;
    // }

    public function update(Request $request)
    {
        $id = $request->input('newdata.id');
        // $id = $newdata->id;
        // $id = $request->only(['id']);
        // $id = 1;
        $article = Article::findOrFail($id);
        $article->update($request->input('newdata'));

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return 204;
    }
}
