<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Authors\AuthorsInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $authorsService;
    public function __construct(AuthorsInterface $authorsInterface)
    {
        $this->authorsService = $authorsInterface;
    }
    public function index()
    {
        $authors = $this->authorsService->getAll();
        return view('dashboard.pages.authors.list', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.authors.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:publishers,name',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable'
        ]);
        
        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');// Lấy tệp từ request
            $pathInfo = pathinfo($file->getClientOriginalName());// Lấy thông tin tệp
            $name_avatar = $pathInfo['filename'];// Tên tệp không có phần mở rộng
            $extension = $pathInfo['extension'];// Phần mở rộng của tệp
            $filename = $name_avatar.time().'.'.$extension;
            $file->move('uploads/authors/', $filename);
            $data['avatar'] = $filename;
        }
        $this->authorsService->create($data);
        return redirect()->route('authors.list')->with('success','Authors added successfully!');
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
        $authors = $this->authorsService->findById($id);
        return view('dashboard.pages.authors.edit', compact('authors'));
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
        $authors = $this->authorsService->findById($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:publishers,name',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable'
        ]);
        
        $data = $request->all();
        if ($request->hasFile('avatar')) {
             // Nếu có tệp mới, kiểm tra và xóa ảnh cũ
            if (!empty($authors->avatar) && file_exists('uploads/authors/' . $authors->avatar)) {
                // Xóa tệp hình ảnh cũ nếu tồn tại
                unlink('uploads/authors/' . $authors->avatar);
            }
            $file = $request->file('avatar');// Lấy tệp từ request
            $pathInfo = pathinfo($file->getClientOriginalName());// Lấy thông tin tệp
            $name_avatar = $pathInfo['filename'];// Tên tệp không có phần mở rộng
            $extension = $pathInfo['extension'];// Phần mở rộng của tệp
            $filename = $name_avatar.time().'.'.$extension;
            $file->move('uploads/authors/', $filename);
            $data['avatar'] = $filename;
        }else
        {
            $data['avatar'] = $authors->avatar;
        }
        $this->authorsService->update($id,$data);
        return redirect()->route('authors.list')->with('success','Authors Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authors = $this->authorsService->findById($id);
        if ($authors->avatar && File::exists(public_path('uploads/authors/' . $authors->avatar))) {
            File::delete(public_path('uploads/authors/' . $authors->avatar));
        }
        
        $this->authorsService->delete($id);
        return redirect()->route('authors.list')->with('success','Publisher Delete successfully!');
    }
}
