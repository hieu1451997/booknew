<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Publisher\PublisherInterface;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    protected $publisherService;
    public function __construct(PublisherInterface $publisherService)
    {
        $this->publisherService = $publisherService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publisher = $this->publisherService->getAll();
        return view('dashboard.pages.publisher.list', compact('publisher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.publisher.add');
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
            'name' => 'required|string|max:255|unique:publishers,name',
            'description' => 'nullable'
        ]);
        $this->publisherService->create($validated);
        return redirect()->route('publisher.list')->with('success','Publisher added successfully!');
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
        $publisher = $this->publisherService->findById($id);
        return view('dashboard.pages.publisher.edit', compact('publisher'));
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
            'name' => 'required|string|max:255|unique:publishers,name',
            'description' => 'nullable'
        ]);
        $this->publisherService->update($id,$validated);
        return redirect()->route('publisher.list')->with('success','Publisher Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->publisherService->delete($id);
        return redirect()->route('publisher.list')->with('success','Publisher Delete successfully!');
    }
}
