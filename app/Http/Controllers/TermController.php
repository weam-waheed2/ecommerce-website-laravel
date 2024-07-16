<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function List($taxonomy, Request $request)
    {
        if ($request->isMethod('post')) {
            $this->store($request);
        }
        return view('admin.terms.list', [
            'taxonomy'  => $taxonomy,
            'edit'      => false
        ]);
    }

    public function Edit($ID, Request $request)
    {
        if ($request->isMethod('post')) {
            $this->store($request);
        }
        $term = Term::find($ID);
        return view('admin.terms.list', [
            'taxonomy'  => $term->taxonomy,
            'term'      => $term,
            'edit'      => true
        ]);
    }

    public function Delete($ID)
    {
        Term::find($ID)->delete();
        return back()->withInput();
    }





    public function Store(Request $request)
    {
        if ($request->isMethod('post')) {
            if(isset($request->term['ID'])){
                $term           = Term::find($request->term['ID']);
            }else{
                $term           = new Term();
            }
            $term->name         = $request->term['name'];
            $term->slug         = $request->term['slug'];
            $term->post_ID      = $request->term['post_ID'];
            $term->taxonomy     = $request->term['taxonomy'];
            $term->parent       = $request->term['parent'];
            // $term->image        = $request->term['image'];

            $term->save();
            return $term;
        }

        return view('admin.terms.list');
    }
}
