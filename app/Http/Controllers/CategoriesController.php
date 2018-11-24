<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use App\Models\Link;
class CategoriesController extends Controller
{
    public function show(Category $category,Request $request, Topic $topic, User $user, Link $link) {
        // 讀取分類 ID 關聯的話題，並按照每 20 調分頁
        $topics = $topic->withOrder($request->order)->where('category_id',$category->id)->paginate(20);

        $active_users = $user->getActiveUsers();
        $links = $link->getAllCached();
        return view('topics.index',compact('topics','category','active_users', 'links'));

    }
}
