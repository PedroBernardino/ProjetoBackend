<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pucharse;

class PucharseController extends Controller
{
    public function createPucharse(Request $request)
	{
		$compra = new Pucharse;
		$compra->affiliate_code = $request->affiliate_code;
		$compra->total_valor = $request->total_valor;
		$compra->product_quantity = $request->product_quantity;
        $compra->date = $request->date;
        $compra->client_id = $request->client_id;
		$compra->save();
		return response()->json([$compra]);
	}
	public function listPucharse()
	{
		return Pucharse::all();
	}
	public function findPucharse($id)
	{
		$compra = Pucharse::find($id);
		if($compra){
			return response()->success($compra);
		}else{
			$data = "compra não Encontrado, verifique o id";
			return response()->error($data,400);
		}
	}
	public function updatePucharse(Request $request, $id)
	{
		$compra = Pucharse::find($id);
		if($request->affiliate_code)
		{
			$compra->affiliate_code = $request->affiliate_code;
		}
		if($request->total_valor)
		{
			$compra->total_valor = $request->total_valor;
		}
		if($request->product_quantity)
		{
			$compra->product_quantity = $request->product_quantity;
		}
		if($request->date)
		{
			$compra->date = $request->date;
        }
        if($request->client_id)
        {
            $compra->client_id = $request->client_id;
        }
		$compra->save();
		
		if($compra){
			return response()->success($compra);
		}else{
			$data = "compra não Encontrada, verifique o id";
			return response()->error($data,400);
		}
	}
	public function deletePucharse($id)
	{
		if(Pucharse::destroy($id)){
			return response()->json(['compra deletada']);
		}else{
			return response()->json(['compra não encontrada, verifique o id']);
		}
	}
}
