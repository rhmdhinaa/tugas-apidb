<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;

class ProdukController extends Controller
{
    public function create(Request $request){
        $produk=new produk();
        $produk->kode_produk=$request->kode_produk;
        $produk->nama_produk=$request->nama_produk;
        $produk->harga=$request->harga;
        $produk->save();

        if($produk->save()){
            return response()->json([
                'code' => '200',
                    'status' => 'true',
                    'data' => $produk
            ],201);
        }else{
            return response()->json([
                'message' => 'Error Occured'
            ],400);

        }
    }

    public function update(Request $request, $id){

        $produk= produk::find($id);
        $produk->kode_produk=$request->kode_produk;
        $produk->nama_produk=$request->nama_produk;
        $produk->harga=$request->harga;
        $produk->save();

        if($produk->save()){
            return response()->json([
                
                    'code' => '200',
                    'status' => 'true',
                    'data' => $produk
                
            ],201);
        }else{
            return response()->json([
            'messages' => 'something wrong'
        ],401);
        }
    }

    public function delete($id){
        $produk= produk::find($id);

        if($produk->delete()) {
            return response()->json([
                'messages' => "Delete successful",
                'response_code' => 200
            ],200);
        }else{
            return response()->json([
                'messages' => 'Error occured',
                'response_code' => 400
            ]);
        }
    }

    public function detail($id){
        $produk= produk::find($id);
        return $produk;
    }

    public function index(){
        $produk= produk::get();
        return $produk;
    }
}

