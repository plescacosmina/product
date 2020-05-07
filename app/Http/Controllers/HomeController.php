<?php

namespace App\Http\Controllers;

use App\Image;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $products = Product::all();
        $products = DB::select('CALL getProducts()');
        return view('pages.home')->with('products', $products);
    }

//    public function login()
//    {
//        return view('pages.login');
//    }

    public function startLogin()
    {
        $validator = Validator::make(Input::all(), ['email' => 'required|email', 'password' => 'required|alphaNum|min:3']);

        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));

        } else {
            $data = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            if (Auth::attempt($data)) {
                return Redirect::to('/');
            } else {
                return Redirect::to('login');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        session(['numberOfHitsPerSession' => null]);
        return Redirect::to('/');
    }

    public function add()
    {
        return view('pages.add');
    }

    public function addProduct()
    {
        $rules = array(
            'name' => 'required',
            'description' => '',
            'price' => '',
            'units' => ''
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('add')
                ->withErrors($validator);
        } else {
            $product = new Product;
            $product->name = Input::get('name');
            $product->description = Input::get('description');
            $product->price = Input::get('price');
            $product->units = Input::get('units');

            $product->save();

            return Redirect::to('/');
        }
    }
	
	public function edit($id)
    {
        $product = DB::select('CALL getProduct(?)', array($id));

        return view('pages.edit')->with('product', $product);
    }
	
	public function editProduct(Request $request, $id)
    {
        $rules = array(
            'name' => 'required',
            'description' => '',
            'price' => '',
            'units' => ''
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('add')
                ->withErrors($validator);
        } else {
            $product = Product::where('id', $id)->firstOrFail();
            $product->name = Input::get('name');
            $product->description = Input::get('description');
            $product->price = Input::get('price');
            $product->units = Input::get('units');

            $product->save();

            return Redirect::to('/');
        }
    }

    public function deleteProductUsingProcedure($id)
    {
        $status = DB::select('CALL deleteProduct(?)', array($id));
        if($status) {
            Session::flash('mesaj', 'Deleted!');
            return Redirect::to('/');
        } else {
            Session::flash('mesaj', 'Error!');
            return Redirect::to('/');
        }
    }

    public function getProduct($id)
    {
        // $product = Product::where('id', '=', $id)->first();
        $product = DB::select('CALL getProduct(?)', array($id));

        return view('pages.view')->with('product', $product);
    }

    public function account()
    {
        session(['numberOfHitsPerSession' => session('numberOfHitsPerSession') + 1]);
        $id = \Auth::user()->id;
        $user = DB::select('CALL getUser(?)', array($id));
		$image = Image::where('user_id', $id)
			->orderBy('created_at', 'desc')
			->firstOrFail();
        return view('pages.account')
			->with('user', $user)
			->with('numberOfHitsPerSession', session('numberOfHitsPerSession'))
			->with('image', $image);
    }

    public function addImage(Request $request)
    {
		$file = Input::file('image')->path();
        $rules = array(
           'image' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
			return Redirect::to('account')
				->withErrors($validator);
		} else {
			$image = new Image();
			$image->user_id = \Auth::user()->id;
			$image->image = $imagedata = base64_encode(file_get_contents($file));

			$image->save();

			return Redirect::to('/account');
		}
	}
}
