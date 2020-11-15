<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreate;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsCreate $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(NewsCreate $request)
    {
        $news = new News;
        $news->fill([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'body' => $request->input('body')
        ]);
        if ($news->save()) {
            session()->flash('Новость успешно добавлена');
            return redirect()->route('admin_news.index');
        }
        session()->flash('При добавлении новости произошла ошибка');
        return redirect()->route('admin_news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit(int $id)
    {
        $news = News::find($id);
        return view('admin.news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $news = News::find($id);
        $news->fill([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'body' => $request->input('body')
        ]);
        if ($news->save()) {
            session()->flash('msg', 'Новость успешно изменена');
            return redirect()->route('admin_news.index');
        }
        session()->flash('msg', 'При изменении новости произошла ошибка');
        return redirect()->route('admin_news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $news = News::find($id);
        if ($news->delete()) {
            session()->flash('msg', 'Новость успешно удалена');
            return redirect()->route('admin_news.index');
        }
        session()->flash('msg', 'При удалении новости произошла ошибка');
        return redirect()->route('admin_news.index');
    }
}
