<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class WishlistController extends Controller
{
    //Get all Wishlist
    public function index(){
        $wishlist = Wishlist::all();
        return $wishlist;
    }

    //Create a new Wishlist
    public function create()
    {
        $wishlist = new Wishlist();
        $wishlist->id_user = 1;
        $wishlist->name = 'Drilon';
        $wishlist->save();
        return $wishlist;
    }

    //Save a new Wishlist
    public function store()
    {
        $wishlist = new Wishlist();
        $wishlist->id_user = Input::get('id_user');
        $wishlist->name = Input::get('name');
        $wishlist->save();
        return $wishlist;
    }

    public function show($id)
    {
        $wishlist = Wishlist::find($id);
        return $wishlist;
    }

    //Update an existing Wishlist
    public function update($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->id_user = Input::get('id_user');
        $wishlist->name = Input::get('name');
        $wishlist->save();
        return $wishlist;
    }

    //Remove a Wishlist
    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
    }
}
