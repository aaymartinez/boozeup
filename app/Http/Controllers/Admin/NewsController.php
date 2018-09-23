<?php

namespace App\Http\Controllers\Admin;

use App\BoozeTypes;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $news = News::all();

        return view('admin.news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$booze = BoozeTypes::all();

        return view('admin.add-news', compact('booze'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $dir = 'news';

        $rules = [
	        'booze_type_id' => 'required|string',
	        'photo' => 'image|mimes:jpeg,jpg,png,bmp',
	        'title' => 'required|string|max:255',
	        'subject' => 'required|string|max:255',
	        'description' => 'required',
        ];

        $this->validate($request, $rules);

        $news = News::create($request->all());

        if ($request->has('photo')) {
        	$filename = $request->file('photo')->store('public/'.$dir);
        	$news->photo = $filename;
        	$news->save();
        }

	    return redirect('/admin/news')
		    ->with('success', 'News added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function destroy($id)
    {
	    News::find($id)->delete();

	    return redirect('/admin/news')
		    ->with('success', 'News deleted successfully!');
    }
}
