<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

use function Psy\sh;

class TagController extends Controller
{
     public function __invoke($name)
    {
        $tag = Tag::where('name','LIKE', "%$name%")->firstOrFail();
        return view('results', ['jobs' => $tag->jobs->shuffle()]);
    }
}
