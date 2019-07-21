<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function createProduct(Request $request)
	{
		$produto = new Product;
		$produto->name = $request->name;
		$produto->provider = $request->provider;
		$produto->description = $request->description;
        $produto->expiration_date = $request->expiration_date;
        $produto->lot = $request->lot;
		$produto->save();
		return response()->json([$produto]);
	}
	public function listProduct()
	{
		return Product::all();
	}
	public function findProduct($id)
	{
		$produto = Product::find($id);
		if($produto){
			return response()->success($produto);
		}else{
			$data = "produto não Encontrado, verifique o id";
			return response()->error($data,400);
		}
	}
	public function updateProduct(Request $request, $id)
	{
		$produto = Product::find($id);
		if($request->name)
		{
			$produto->name = $request->name;
		}
		if($request->provider)
		{
			$produto->provider = $request->provider;
		}
		if($request->description)
		{
			$produto->description = $request->description;
		}
		if($request->expiration_date)
		{
			$produto->expiration_date = $request->expiration_date;
        }
        if($request->lot)
        {
            $produto->lot = $request->lot;
        }
		$produto->save();
		
		if($produto){
			return response()->success($produto);
		}else{
			$data = "produto não Encontrado, verifique o id";
			return response()->error($data,400);
		}
	}
	public function deleteProduct($id)
	{
		if(Product::destroy($id)){
			return response()->json(['produto deletado']);
		}else{
			return response()->json(['produto não encontrado, verifique o id']);
		}
	}
}
