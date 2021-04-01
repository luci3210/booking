<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
	public function __construct() {
		$this->middleware('auth:web')
	}

    public function index()
    {
    	
    }
}
