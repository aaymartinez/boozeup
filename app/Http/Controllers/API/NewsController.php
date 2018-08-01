<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\NewsResource;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
	public function index()
	{
		return NewsResource::collection(News::all());

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 *
	 * @return NewsResource
	 */
	public function store(Request $request)
	{
		$news = News::create([
			'booze_type_id' => $request->booze_type_id,
			'title' => $request->title,
			'subject' => $request->subject,
			'description' => $request->description,
			'photo' => $request->photo,
		]);

		return new NewsResource($news);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\News  $news
	 *
	 * @return NewsResource
	 */
	public function show(News $news)
	{
		NewsResource::withoutWrapping();

		return new NewsResource($news);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\News  $news
	 *
	 * @return NewsResource
	 */
	public function update(Request $request, News $news)
	{
		$news->update($request->all());

		return new NewsResource($news);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param News $news
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy(News $news)
	{
		$news->delete();

		return response()->json(null, 204);
	}
}
