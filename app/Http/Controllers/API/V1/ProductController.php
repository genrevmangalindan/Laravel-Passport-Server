<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {        
        
        $item = Product::store($request);
        $message = "You have successfully created {$item->name}";

        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $sampleItem
     * @return \Illuminate\Http\Response
     */


    public function show(Request $request)
    {
        $item = Product::find($request->id);

        return response()->json([
            'success' => true,
            'product' => $item,
        ]);        
        // return view('admin.floors.show', [
        //     'item' => $item,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $sampleItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $item = Product::find($request->id);
        $message = "You have successfully updated";
        $action = 1;

        $item = Product::store($request, $item);

        return response()->json([
            'message' => $message,
            'success' => true,
        ]);
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->get('id'));
        $product->delete();

        return response()->json([
            'message' => 'Product successfully deleted.'
        ]);
    }

    public function getProductsJson() {
        $products = Product::all();
        $message = "Successfully Fetch";

        return response()->json([
            'success' => true,
            // 'message' => $message,
            'products' => $products,
        ], Response::HTTP_OK);
    }
}