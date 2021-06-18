<?php

namespace App\Http\Controllers\Tourismo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SearchService;

class HeaderSearchController extends Controller
{
    //

    public function Search(Request $req)
    {
        $keyWord['search'] = $this->clean_input($req->search);
        $searchService = new SearchService();

        $res =  $searchService->findKeyWord($keyWord);
        
        
        return $res;
    }
}
