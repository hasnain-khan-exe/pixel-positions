<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

use function Psy\sh;

class TagController extends Controller
{
    public function __invoke($name)
    {
        $tag = Tag::where('name', 'LIKE', "%$name%")->firstOrFail();

        $jobs = $tag->jobs()
            ->with(['employer', 'tags'])
            ->inRandomOrder()
            ->paginate(10);

        return view('results', ['jobs' => $jobs]);
    }
}
