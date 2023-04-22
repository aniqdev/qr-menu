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
            Item::where('id', $itemId)->update([
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
        $items = \App\Models\Item::where('company_id', auth()->user()->company_id)->paginate(6);

        return view('back.items.index', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('company_id', auth()->user()->company_id)->orderBy('sorting')->get(['id', 'name']);

        return view('back.items.create', [
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

        return [
            'request' => $request->all(),
            'item' => $item,
            'redirect' => route('items.edit', $item),
            'message' => 'Success',
            // 'user' => auth()->user(),
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
        $categories = Category::where('company_id', auth()->user()->company_id)->orderBy('sorting')->get(['id', 'name']);

        return view('back.items.edit', [
            'item' => $item,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->update($request->validated());

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
        //
    }
}
