<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;
class CategoriesController extends Controller
{
    public function show(Category $category) {
        // 讀取分類 ID 關聯的話題，並按照每 20 調分頁
        $topics = Topic::where('category_id',$category->id)->paginate(20);

        return view('topics.index',compact('topics','category'));

    }
}
