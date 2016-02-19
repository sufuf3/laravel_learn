<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function show ($id) {
	   		return 'Post: '.$id;
		}

	public function create () {
	   		return view('posts.create');
		}
}
