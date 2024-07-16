<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Post;
use App\Models\PostMeta;
use App\Models\TermRelationship;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function View($item, Request $request)
    {
        if ($request->isMethod('post')) {
            $post = $this->Store($request);
            return back();
        }
        return view('admin.settings.index', ['item' => $item]);
    }


    public function Store(Request $request)
    {
        if ($request->isMethod('post')) {
            if (isset($request->option) && is_array($request->option)) {
                foreach ($request->option as $option_key => $option_value) {
                    Option::set($option_key, is_array($option_value) ? json_encode($option_value) : $option_value);
                }
            }
        }
        return;
    }
}
