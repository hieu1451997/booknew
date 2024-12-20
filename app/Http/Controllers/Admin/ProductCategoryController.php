<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ProductCategory\ProductCategoryInterface;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    protected $productCategoryService;
    public function __construct(ProductCategoryInterface $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategory = $this->productCategoryService->getAll();
        return view('dashboard.pages.category.list', compact('productCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:product_categories,name'
        ]);
        $this->productCategoryService->create($validated);
        return redirect()->route('productcategory.list')->with('success','Category added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCategory = $this->productCategoryService->findById($id);
        return view('dashboard.pages.category.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:product_categories,name'
        ]);
        $this->productCategoryService->update($id,$validated);
        return redirect()->route('productcategory.list')->with('success','Category Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productCategoryService->delete($id);
        return redirect()->route('productcategory.list')->with('success','Category Delete successfully!');
    }
}
