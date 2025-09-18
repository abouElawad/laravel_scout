<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Laravel\Scout;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  public function search(Request $request)
  {
    $query = $request->input('query');
    $replica = $request->input('replica');
    $facets = $request->input('facets');
    // dd($query,
    // $replica,
    // $facets);

    if (isset($query)) {

      $builder = Post::search($query);


      if (isset($replica)) {
        $builder->within($replica);
      }

      if (isset($facets)) {
        $builder->with(['facetFilters' => "category:$facets"]);
      }



      $results = $builder->paginate(5);
    }

    return view('search', get_defined_vars());
  }
}
