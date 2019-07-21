<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function createClient(Request $request)
	{
		$cliente = new Client;
		$cliente->name = $request->name;
		$cliente->cpf = $request->cpf;
		$cliente->phone = $request->phone;
        $cliente->email = $request->email;
        $cliente->address = $request->address;
		$cliente->save();
		return response()->json([$cliente]);
	}
	public function listClient()
	{
		return Client::all();
	}
	public function findClient($id)
	{
		$cliente = Client::find($id);
		if($cliente){
			return response()->success($cliente);
		}else{
			$data = "cliente não Encontrado, verifique o id";
			return response()->error($data,400);
		}
	}
	public function updateClient(Request $request, $id)
	{
		$cliente = Client::find($id);
		if($request->name)
		{
			$cliente->name = $request->name;
		}
		if($request->cpf)
		{
			$cliente->cpf = $request->cpf;
		}
		if($request->phone)
		{
			$cliente->phone = $request->phone;
		}
		if($request->email)
		{
			$cliente->email = $request->email;
        }
        if($request->address)
        {
            $cliente->address = $request->address;
        }
		$cliente->save();
		
		if($cliente){
			return response()->success($cliente);
		}else{
			$data = "cliente não Encontrado, verifique o id";
			return response()->error($data,400);
		}
	}
	public function deleteClient($id)
	{
		if(Client::destroy($id)){
			return response()->json(['cliente deletado']);
		}else{
			return response()->json(['cliente não encontrado, verifique o id']);
		}
	}
}
