<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class APIItemsController extends Controller
{
    public function index()
    {
        return Item::all();
    }
}
