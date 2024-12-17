<?php

namespace App\Repositories ;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    protected $model;
    // protected: Biến $model chỉ có thể được truy cập từ bên trong lớp BaseRepository và các lớp con kế thừa nó.
    // $model được sử dụng để lưu trữ một instance của model (ví dụ: User, Post, v.v.).
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Constructor: Hàm khởi tạo này sẽ tự động chạy khi một đối tượng của lớp BaseRepository được khởi tạo.
    // Tham số Model $model:
    // Model là một kiểu dữ liệu (type hinting), yêu cầu tham số $model phải là một instance của class Model hoặc một class con của Model.
    // Trong Laravel, Model thường là lớp cơ sở mà tất cả các model kế thừa từ nó.
    // Gán giá trị:
    // $this->model = $model; gán đối tượng model được truyền vào cho thuộc tính $model của class.

    // Các hàm dùng chung cho Repository
    public function getAll()
    {
        return $this->model->all();
    }
    public function findById($id)
    {
        return $this->model->findOrfail($id);
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function update($id, array $data)
    {
        $item = $this->findById($id);
        $item->update($data);
        return $item;
    }
    public function delete($id)
    {
        $item = $this->findById($id);
        return $item->delete();

    }
}

