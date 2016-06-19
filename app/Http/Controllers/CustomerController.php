<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CustomerRequest;
use App\Customer;
use Validator;
use Illuminate\Foundation\Validation\ValidationException;

class CustomerController extends Controller
{   
    private $c;
    function __construct(Customer $c) {
        $this->c = $c;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->c->all();
        return view ('customer', compact('customers'));
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

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|unique:tbl_customer,first_name',
            'last_name' => 'required',
            'phone' => 'required'
        ]);

        if ($validator->fails()) {
            
            return redirect('/customer')->withErrors($validator)->withInput();
        }
        else
        {
            $this->c->first_name= $request->first_name;
            $this->c->last_name= $request->last_name;
            $this->c->phone= $request->phone;
            $this->c->save();
            return redirect('customer');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id) {
        $my_id = preg_replace ('#[^0-9]#', '', $id );
        if (!empty ($my_id)) {
            $customers = $this->c->where ('id', $id)->first();
            return view ('customerdetail', compact('customers'));
        } 
        else {
            return redirect ('customer');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $my_id = preg_replace ('#[^0-9]#', '', $request->id);
        if (! empty ($my_id)) {
            $this->c->where ('id', $my_id )->update ( [ 
                    'first_name' => $request->get ( 'first_name' ),
                    'last_name' => $request->get ( 'last_name' ) ,
                    'phone' => $request->get ( 'phone' ) 
            ] );
            \Session::flash ('message', 'Update Successful');
            return redirect ('customer');
        }
        $this->edit ();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $my_id = preg_replace ( '#[^0-9]#', '', $id );
        if (! empty ( $my_id )) {
            $this->c->where ( 'id', $my_id )->delete ();
            return redirect ( 'customer' );
        } 
        else {
            return redirect ( 'customer' );
        }
    }
}
