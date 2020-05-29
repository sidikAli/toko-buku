<?php

namespace App\Http\Controllers\Eccomerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use App\Address;
use App\Province;
use App\City;
use App\Subdistrict;
use Auth;

class AddressController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	$provinces  = Province::all();
    	$address = Address::where('user_id', Auth::user()->id)->first();
    	return view('eccomerce.address', compact('address', 'categories', 'provinces')); 
    }

    public function getCity()
    {
        //data kota
        $city = City::where('province_id', request()->province_id)->get();
        return response()->json($city); 
    }

    public function getSubdistrict()
    {
        //data kecamatan
        $subdistrict = Subdistrict::where('city_id', request()->city_id)->get();
        return response()->json($subdistrict); 
    }

    public function store(Request $request)
    {
    	//data kecamatan harus ada di database
    	$request->validate([
    		'subdistrict_id' => 'required|integer|exists:subdistricts,id'
    	]);

    	$address = Address::create([
    		'user_id'	 	  => Auth::user()->id,
    		'subdistricts_id' => $request->subdistrict_id,
    		'detail'		  => $request->detail
    	]);

    	return redirect()->back();
    }

    public function edit($id)
    {
    	$categories = Category::all();
    	$provinces  = Province::all();
    	$address_id = $id;
    	return view('eccomerce.edit_address', compact('address_id', 'categories', 'provinces')); 
    }

    public function update(Request $request, $id)
    {
    	//data kecamatan harus ada di database
    	$request->validate([
    		'subdistrict_id' => 'required|integer|exists:subdistricts,id'
    	]);

    	$address = Address::where('id', $id)->update([
    		'user_id'	 	  => Auth::user()->id,
    		'subdistricts_id' => $request->subdistrict_id,
    		'detail'		  => $request->detail
    	]);

    	return redirect()->route('user.address');
    }
}
