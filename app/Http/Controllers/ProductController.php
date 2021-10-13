<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\service_profile;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $planes = DB::table('plans')->get();
        return view('product.product', ['planes' => $planes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request->select2;
        $validate = $this->validate(
            request(),
            [
                'name_product' => 'required|between:3,25',
                // 'perfil_id' => 'required',
                // 'secondlist' => 'required',
                'status' => 'required',
            ]
        );
        try {
            //code...
        if ($validate) {
        # code...
        $product = $request->except('_token'); //toma todos los valores excepto el token
        // estamos haciendo que se almacene todo lo que se envia al metodo store
        product::insert([
            'name_product' => $request->name_product,
            // 'perfil_id' => $request->perfil_id,
            'secondlist' => json_encode($request->select2),
            'status' => $request->status,
            'created_at' => now()->toDateTime(),
            'user_email_created' => Auth::user()->email,
        ]);
        // product::insert($product);
            $respuesta['respuesta'] = array(
                "title" => "Creación de producto",
                "msg" => "Estimado usuario, el producto se ha creado exitosamente",
                "ruta" => "product",
                "otros" => ""
            );
            return view('mensajes.satisfactorio', $respuesta);
    }
        } catch (\Throwable $th) {
            //throw $th;
            $respuesta['respuesta'] = array(
                    "title" => "Creación de producto",
                    "msg" => "Estimado usuario, no se ha podido realizar la creación del producto, intente más tarde.",
                    "ruta" => 'product',
                    "otros" => ""
                );
            return view('mensajes.error', $respuesta);
        }

}

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($idproduct)
    {
        //
        $product = product::findOrFail($idproduct);
        $service_profileactu = service_profile::findOrFail($product->perfil_id);
        $service_profile =   service_profile::all()->except($product->perfil_id);
        // $estatusactu = DB::select('SELECT id, "Estatus", descripcion FROM statuses where "Estatus" = ?', [$product->ID_estatus]);
        // $estatusall = DB::select('SELECT id, "Estatus", descripcion FROM statuses where "Estatus" != ?', [$product->ID_estatus]);
        // $secondlist = DB::select('SELECT secondlist FROM products where id = ?', [$idproduct]);
         return view('product.edit', ['product'=>$product,'service_profileactu'=> $service_profileactu,'service_profile'=> $service_profile]);

        // $secondlist = response()->json($secondlist);
        // $secondlist = json_decode($secondlist,true);
        // $secondlist = explode(',', $secondlist);
        // return        response()->json($secondlist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
    public function mostrar()
    {
        // //
        $datos['product'] = product::paginate(5);
        // return view('service_Profile.index', $datos);
        return view('product.form', $datos);
    }
}
