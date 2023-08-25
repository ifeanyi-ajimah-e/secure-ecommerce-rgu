<?php 

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryService{

    public function index()
    {
        $data['categories'] = Category::all();
        return $data;
        
    }

    public function store($array){
        $array['user_id'] = Auth::id();
        $category = Category::create($array);
        return $category;

    }

    public function update($data , $id){

        $category = Category::find($id);
        $category->update($data);
        return $category;
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return '';
    }
}



