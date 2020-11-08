<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
//    public $news = [
//            1 => [
//                'id' => '1',
//                'title' => 'США заявили о готовности разместить в Европе гиперзвуковые ракеты',
//                'text' => 'ВАШИНГТОН, 28 окт — РИА Новости. США готовы разместить в Европе гиперзвуковые ракеты для сдерживания России, заявил советник американского президента по нацбезопасности Роберт О`Брайен, выступая в Гудзоновском институте.',
//                'author' => 'Валерий Олюнин',
//            ],
//            2 => [
//                'id' => '2',
//                'title' => 'На Титане обнаружили странную органическую молекулу, которой нет на Земле',
//                'text' => 'МОСКВА, 28 окт — РИА Новости. Астрономы обнаружили в атмосфере Титана циклопропенилиден — чрезвычайно редкую молекулу, состоящую из атомов углерода и водорода, которая не встречается ни на одной планете. Результаты исследования опубликованы в журнале The Astronomical Journal.',
//                'author' => 'Валерий Олюнин',
//            ],
//            3 => [
//                'id' => '3',
//                'title' => 'Белорусская оппозиция объявила о создании новой структуры',
//                'text' => 'МОСКВА, 28 окт — РИА Новости. Астрономы обнаружили в атмосфере Титана циклопропенилиден — чрезвычайно редкую молекулу, состоящую из атомов углерода и водорода, которая не встречается ни на одной планете. Результаты исследования опубликованы в журнале The Astronomical Journal.МИНСК, 28 окт — РИА Новости. Белорусская оппозиция объявила о создании Национального антикризисного управления (НАУ), новая структура должна будет решать возникающие перед страной задачи в случае ухода с поста Александра Лукашенко.',
//                'author' => 'Валерий Олюнин',
//            ],
//            4 => [
//                'id' => '4',
//                'title' => 'Кадыров заявил о готовности покинуть пост из-за позиции по Макрону',
//                'text' => 'МОСКВА, 28 окт — РИА Новости. Глава Чечни Рамзан Кадыров объяснил в Telegram-канале обращение к французскому лидеру Эммануэлю Макрону после его заявления о карикатурах на пророка Мухаммада.',
//                'author' => 'Валерий Олюнин',
//            ]
//
//        ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $news = DB::select('SELECT id, title, author, body as text, category_id FROM homestead.news');
        return view('news/index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('news/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = $this->news;
        $newPost['id'] = count($news) + 1;
        $newPost['title'] = $request->input('title');
        $newPost['text'] = $request->input('text');
        $newPost['author'] = $request->input('author');
        array_push($this->news, $newPost);
//        dd($this->news);
        return redirect('news');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $news = DB::select('SELECT id, title, author, body as text, category_id FROM homestead.news WHERE id =' . $id);
        $post = $news[0];
        return view('news/show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
