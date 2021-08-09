<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Requests\StoreRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $listCustomer = Customer::where('name', 'like', "%$search%")->orwhere('phone', 'like', "%$search%")->paginate(3);
        return view(
            'customers.index',compact('search', 'listCustomer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $listCustomer = Customer::all();
        return view('customers.create',[
            'listCustomer' => $listCustomer
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // $avt = $request->file('avt');
        $avt = $request->file('avt');
        $customer = new Customer();
       
        $customer -> avt = $request->get('avt');
        $customer -> name = $request->get('name');
        $customer -> gender = $request->get('gender');
        $customer -> phone = $request->get('phone');
        $customer -> email = $request->get('email');
        $new_image = time() . '.' . $avt->getClientOriginalExtension();
        $request->avt->move(public_path('images'), $new_image);
        
        $customer->avt = $new_image;
        $customer->save();

        return redirect(route('customers.index'))->with('success','Add new customer success!');;
        // if($request->has('file_upload')){
        //     $file = $request->file_upload;
        //     $ext = $request->file_upload->extension();
        //     $file_name = time().'-'.'product.'.$ext ;
        //     $file -> move(public_path('uploads'), $file_name);
        // }
        // $request->merge(['avt' => $file_name]);
        // if(Customer::create($request->all())){
        //     return redirect()->route('customer.index')->with('success','Thêm mới khách hàng thành công!');
        // }
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
    public function edit($id)
    {
        //
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
      
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
