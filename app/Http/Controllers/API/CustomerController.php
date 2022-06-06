<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    // menampilkan semua data
    public function index()
    {
        $product = Customer::all();
        return response()->json([
            'pesan' => 'Data Berhasil Ditemukan',
            'data' => $product
        ], 200);
    }
    // tampil berdasarkan id
    public function show($id)
    {
        $product = Customer::find($id);
        if (empty($product)) {
            return response()->json(['pesan' => 'Data Tidak ditemukan', 'data' => ''], 404);
        }
        return response()->json(['pesan' => 'Data Berhasil Ditemukan', 'data' => $product], 200);
    }
    // tambah data produk
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => 'required|numeric|unique:customer',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json(['pesan' => 'data gagal ditambahkan', 'data' => $validate->errors()->all()], 404);
        }
        $data = Customer::create($request->all());
        return response()->json(['pesan' => 'data berhasil ditambahkan', 'data' => $data], 200);
    }
    // update data produk
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        if (empty($customer)) {
            return response()->json(['pesan' => 'data tidak ditemukan', 'data' => ''], 404);
        } else {
            $validasi = Validator::make($request->all(), [
                'id' => 'required|numeric|unique:customer',
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'address' => 'required'
            ]);
            if ($validasi->fails()) {
                return response()->json(['pesan' => 'Data Gagal diUpdate', 'data' => $validasi->errors()->all()], 404);
            }
            $customer->update($request->all());
            return response()->json(['pesan' => 'Data Berhasil disimpan', 'data' => $customer], 200);
        }
    }
    // Hapus data berdasarkan id
    public function destroy($id)
    {
        $customer = Customer::find($id);
        if (empty($customer)) {
            return response()->json(['pesan' => 'Data Tidak ditemukan', 'data' => ''], 404);
        }
        $customer->delete();
        return response()->json(['pesan' => 'Data Berhasil dihapus', 'data' => $customer]);
    }
   
}