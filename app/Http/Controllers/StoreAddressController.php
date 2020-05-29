<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StoreAddress;
use App\Province;
class StoreAddressController extends Controller
{
    public function index()
    {
    	$provinces = Province::all();
    	$address = StoreAddress::first();
    	return view('admin.setting.store_address', compact('address', 'provinces'));
    }

    public function add(Request $request)
    {
    	//data kecamatan harus ada di database
    	$request->validate([
    		'subdistrict_id' => 'required|integer|exists:subdistricts,id'
    	]);

    	$address = StoreAddress::create([
    		'subdistricts_id' => $request->subdistrict_id,
    		'detail'		  => $request->detail
    	]);

    	return redirect()->back();
    }

    public function edit($id)
    {
    	$provinces  = Province::all();
    	$address_id = $id;
    	return view('admin.setting.edit_store_address', compact('address_id', 'provinces')); 
    }

    public function update(Request $request, $id)
    {
    	//data kecamatan harus ada di database
    	$request->validate([
    		'subdistrict_id' => 'required|integer|exists:subdistricts,id'
    	]);

    	$address = StoreAddress::where('id', $id)->update([
    		'subdistricts_id' => $request->subdistrict_id,
    		'detail'		  => $request->detail
    	]);

    	return redirect()->route('store.address');
    }
}
