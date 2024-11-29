<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Post;
use Illuminate\Support\Facades\Validator;
class PostController extends Controller
{
    public function index(){
        $data = Post::all();
        dd($data);
        return Post::get();
    }

    public function store(Request $request)
    {
        //  dd(auth()->user()->getRoleNames());
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',

        ]);
        if ($validator->fails()) {
            return responce()->json($validator->error(), 422);
        }
        $user = auth('api')->user();
        // dd($user);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $user->id;
        $post->save();
        return response()->json([
            'message' => 'Posts has been  created successfully',
                'post'=> $post
        ], 200);
    }
    public function update(Request $request, $id)
    {
        
        $post = Post::findorfail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->error(), 422);
        }
        $post->update($request->all());
        return response()->json([
            'message' => 'posts has been updated successfully',
            'post' => $post
        ],200);
    }
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully']);
    }
}
