<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;

class ItemController extends Controller
{
	public function updateVisibility(Item $item, Request $request)
	{
        abort_if_no_access($item->company_id);

		$item->update([
			'is_active' => !$item->is_active,
		]);

		if ($item->is_active) {
			$jquery = [
	            ['element' => '#item_' . $item->id . '_visibility_badge', 'method' => 'removeClass', 'args' => ['bg-secondary']],
	            ['element' => '#item_' . $item->id . '_visibility_badge', 'method' => 'addClass', 'args' => ['bg-success']],
	            ['element' => '#item_' . $item->id . '_visibility_badge', 'method' => 'text', 'args' => ['Active']],
	            ['element' => '#item_' . $item->id . '_visibility_btn', 'method' => 'text', 'args' => ['Hide']],
	        ];
		}else{
			$jquery = [
	            ['element' => '#item_' . $item->id . '_visibility_badge', 'method' => 'removeClass', 'args' => ['bg-success']],
	            ['element' => '#item_' . $item->id . '_visibility_badge', 'method' => 'addClass', 'args' => ['bg-secondary']],
	            ['element' => '#item_' . $item->id . '_visibility_badge', 'method' => 'text', 'args' => ['Hidden']],
	            ['element' => '#item_' . $item->id . '_visibility_btn', 'method' => 'text', 'args' => ['Show']],
	        ];
	    }

		return [
			// 'message' => 'Success',
            'jquery' => $jquery,
		];
	}

	public function loadCreateModal(Request $request)
	{
		$categories = Category::where('company_id', auth()->user()->company_id)->orderBy('sorting')->get(['id', 'name']);

		return [
			'modal_content' => view('admin.items.create-modal', [
				'categories' => $categories,
				'selectedCategory' => $request->category,
			])->render(),
		];
	}

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
		$items = \App\Models\Item::where('company_id', auth()->user()->company_id)->paginate(50);

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

		$redirect = ($request->go_to_category_edit &&  $item->category_id) ?
					route('categories.edit', $item->category_id) :
					route('items.edit', $item);

		return [
			'item' => $item,
			'$item->category_id' => $item->category_id,
			'redirect' => $redirect,
			'message' => _t('admin.success'),
			'jquery' => [
				['element' => '#universalModal', 'method' => 'modal', 'args' => ['hide']],
			] 
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
        abort_if_no_access($item->company_id);

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
        abort_if_no_access($item->company_id);

		$data = $request->validated();

		$data['is_active'] = $request->has('is_active');

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
        abort_if_no_access($item->company_id);

        // удалять изображения

        $item->delete();

        return [
            'message' => 'Deleted',
            'redirect' => request()->header('referer'),
        ];
	}
}
