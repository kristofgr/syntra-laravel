<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    public function index() {
        return BlogPost::all();
    }

    public function detail(BlogPost $blogpost) {
        return $blogpost;
    }

    public function destroy(BlogPost $blogpost) {
        $status = $blogpost->delete();
        
        return [
            'status' => $status
        ];
    }

    public function update(BlogPost $blogpost, Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'string|required|max:255',
            'body' => 'nullable|string',
        ]);
        
        if ($validator->fails()) {
            return $validator->errors()->toJson();
        }

        $status = $blogpost->update([
            'title' => request('title'),
            'body'=> request('body')
        ]);

        return [
            'success' => $status
        ];

    }

    public function patch(BlogPost $blogpost, Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'body' => 'nullable|string',
        ]);
        
        if ($validator->fails()) {
            return $validator->errors()->toJson();
        }

        // return $request;

        $status = $blogpost->update($request->only(['title', 'body']));

        return [
            'success' => $status
        ];

    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => 'string|required|max:255',
            'body' => 'nullable|string',
        ]);
        
        if ($validator->fails()) {
            return $validator->errors()->toJson();
        }

        $status = BlogPost::create([
            'title' => request('title'),
            'body'=> request('body')
        ]);

        return [
            'success' => $status
        ];

    }
}
