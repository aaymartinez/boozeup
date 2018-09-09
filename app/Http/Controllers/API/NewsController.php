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
		try {

			return NewsResource::collection(News::all());

		} catch (\Exception $e) {
			return response()->json( [
				'errors'  => $e->getMessage(),
				'message' => 'Please try again',
				'status'  => false
			], 200 );
		}
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
		try {

			$news = News::create([
				'booze_type_id' => $request->booze_type_id,
				'title' => $request->title,
				'subject' => $request->subject,
				'description' => $request->description,
				'photo' => $request->photo,
			]);

			return new NewsResource($news);

		} catch (\Exception $e) {
			return response()->json( [
				'errors'  => $e->getMessage(),
				'message' => 'Please try again',
				'status'  => false
			], 200 );
		}
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
		try {

			NewsResource::withoutWrapping();

			return new NewsResource($news);

		} catch (\Exception $e) {
			return response()->json( [
				'errors'  => $e->getMessage(),
				'message' => 'Please try again',
				'status'  => false
			], 200 );
		}
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
		try {

			$news->update($request->all());

			return new NewsResource($news);

		} catch (\Exception $e) {
			return response()->json( [
				'errors'  => $e->getMessage(),
				'message' => 'Please try again',
				'status'  => false
			], 200 );
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param News id $news
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy($news)
	{
		try {

			$record = News::find($news);
			if (!$record) {
				return json_encode('No records found!');
			}

			if ($record->delete()) {
				return json_encode('success');
			} else {
				return json_encode('failed');
			}

		} catch (\Exception $e) {
			return response()->json( [
				'errors'  => $e->getMessage(),
				'message' => 'Please try again',
				'status'  => false
			], 200 );
		}
	}
}
