<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;

class ItemController extends Controller
{
	public function updateSorting(Request $request)
	{
		foreach ($request->ids as $key => $itemId) {
			Item::where([
                'id' => $itemId,
                'company_id' => auth()->user()->company_id,
            ])->update([
				'sorting' => $key + 1,
			]);
		}

		return [
			'message' => 'Updated',
		];
	}
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		// dd(\Illuminate\Support\Facades\Route::getCurrentRoute()->middleware());
		$items = \App\Models\Item::where('company_id', auth()->user()->company_id)->paginate(16);

		return view('admin.items.index', [
			'items' => $items,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$categories = Category::where('company_id', auth()->user()->company_id)->orderBy('sorting')->get(['id', 'name']);

		return view('admin.items.create', [
			'categories' => $categories,
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreItemRequest $request)
	{
		$data = $request->validated();

		$data['company_id'] = auth()->user()->company_id;

		$item = Item::create($data);

		$item->update(['image' => $item->setImage($request)]);

		return [
			'item' => $item,
			'redirect' => route('items.edit', $item),
			'message' => __('admin.success'),
		];
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Item $item)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Item $item)
	{
        abort_if_lost($item->company_id);

		$categories = Category::where('company_id', auth()->user()->company_id)->orderBy('sorting')->get(['id', 'name']);

		return view('admin.items.edit', [
			'item' => $item,
			'categories' => $categories,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateItemRequest $request, Item $item)
	{
        abort_if_lost($item->company_id);

		$data = $request->validated();

		$data['image'] = $item->setImage($request);

		$item->update($data);

		return [
			'request' => $request->all(),
			'message' => 'Success',
		];
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Item $item)
	{
        abort_if_lost($item->company_id);

        // удалять изображения

        $item->delete();

        return [
            'message' => 'Deleted',
            'redirect' => request()->header('referer'),
        ];
	}
}
