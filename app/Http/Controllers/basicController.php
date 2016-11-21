<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Redirect;
use Validator;
use Input;
use App\Customer;
use App\Category;
use App\Items;


class basicController extends Controller
{
    //
    public function index(){

		
    	 
    	$categories =  Category::get();
    	// echo $categories[2]->id;die();
    	// $items = Items::take(3)->get();

    	foreach ($categories as  $category) {
    		# code...
    		$items[$category->name] = Items::where('category', '=', $category->id)->take(3)->get();
    	}

    	// print_r($items);
    	// die();
    	
		return view('index',compact('categories','items'));

    }

    public function signup(Request $request){

    	         // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // user
            'password' => 'required|alphaNum|min:3', // password can only be alphanumeric and has to be greater than 3 characters
            'name'  => 'required'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
        	$messages = $validator->errors();
        	return Redirect::back()->withErrors($messages, 'signup');
        }

    	

    	$userExist = Customer::where('email', '=',$request['email'])->get();

    	if(count($userExist) > 0){
    		return Redirect::back()->withErrors(['Email Already Exist'], 'signup');
    	}

    	$id =  Customer::orderBy('id', 'desc')->value('id');
    	// print_r($id);
    	// die();

	    $customer = new Customer;
	    $customer->name            = $request['name'];
	    $customer->email       = $request['email'];
	    $customer->password       = $request['password'];
	    $customer->id      = ++$id;

	    $customer->save();


	    // // $credentials = $request->only('name','password','email');

		   //  $customer = Customer::insertGetId(
					// 	    ['email' => $request['email'], 'name' => $request['name']
					// 	    ,'password' => $request['password'] , 'id' => 1]
					// 	);

		   //  die($customer);

		return Redirect::to('/');

    }

   
    function login(Request $request){
    	        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // user
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
        	$messages = $validator->errors();
        	return Redirect::back()->withErrors($messages, 'login');
        }

		$userExist = Customer::where('email', '=',$request['email'])
								->where('password', '=',$request['password'])->get(); 

		if(count($userExist) <= 0){
    		return Redirect::back()->withErrors(['Wrong Credentials'], 'login');
    	}else
    		return Redirect::to('/');
    }


}
