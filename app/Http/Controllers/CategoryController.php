<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function updateSorting(Request $request)
	{
		foreach ($request->ids as $key => $categoryId) {
			Category::where([
				'id' => $categoryId,
				'company_id' => auth()->user()->company_id,
			])->update([
				'sorting' => $key + 1,
			]);
		}

		return [
			'message' => 'Updated',
			'request' => $request->all(),
		];
	}
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$categories = Category::where('company_id', auth()->user()->company_id)->orderBy('sorting')->get();

		return view('admin.categories.index', [
			'categories' => $categories,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('admin.categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreCategoryRequest $request)
	{
		$data = $request->validated();

		$data['company_id'] = auth()->user()->company_id;

		$category = Category::create($data);

		$category->update(['image' => $category->setImage($request)]);

		return [
			'request' => $request->all(),
			'category' => $category,
			'redirect' => route('categories.edit', $category),
			'message' => 'Success',
			// 'user' => auth()->user(),
		];
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Category $category)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Category $category)
	{
		abort_if_lost($category->company_id);

		return view('admin.categories.edit', [
			'category' => $category,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateCategoryRequest $request, Category $category)
	{
		abort_if_lost($category->company_id);

		$data = $request->validated();

		$data['image'] = $category->setImage($request);

		$category->update($data);

		return [
			'message' => 'Success',
		];
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Category $category)
	{
		abort_if_lost($category->company_id);

		// удалять изображения

		// $category->delete(); // что делать с блюдами из этой категории

		return [
			'message' => 'Deleted',
			'redirect' => request()->header('referer'),
		];
	}
}
