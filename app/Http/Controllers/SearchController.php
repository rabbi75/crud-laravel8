<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;

class SearchController extends Controller
{
    /**
     * Search a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->search;

        $information = Information::orWhere('name', 'like', '%'.$search.'%')
            ->orWhere('description', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%')
            ->paginate(4);

        return view('search', compact('search', 'information'));
    }


}
