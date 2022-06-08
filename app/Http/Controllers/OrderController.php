<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use App\Mail\Email;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(OrderRequest $request, $id)
    {
        if($id==$request->product_id){

            $product = Product::find($id);
            if(empty($product)){
                return redirect()->route('HOME');
            }
            else{
                if($request->subscribe=='1'){ $subscribe='1'; } else{ $subscribe='0'; }
                if($request->updates=='1'){ $updates='1'; } else{ $updates='0'; }

                $order = new Order([
                    'product_id'=>$request->product_id,
                    'fname'=>$request->fname,
                    'lname'=>$request->lname,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'address'=>$request->address,
                    'qty'=>$request->qty,
                    'updates'=>$updates,
                    'subscribe'=>$subscribe,
                ]);
                $order->save();
                $TrackingId = $order->id;

                //echo $TrackingId;exit();

                // naveed.abad1234@gmail.com Tauqeeranjum.123
                // naveed@silklondonltd.com

                // Mail to admin
                $Ad_SenderEmail = $request->email; $Ad_SenderName = $request->fname.' '.$request->lname;
                $Ad_MailAttach = 'abcd@gmail.com';$Ad_MailAttachName = 'abc';
                $Ad_ToEmail = 'naveed@silklondonltd.com';$Ad_ToName = 'Naveed Abad';
                $Ad_MailSubject = 'Order Placed';
                $MailFor = 'admin';

                $data = [
                    'ToEmail' => $Ad_ToEmail,
                    'ToName' => $Ad_ToName,
                    'SenderEmail' => $Ad_SenderEmail,
                    'SenderName' => $Ad_SenderName,
                    'MailAttach'=>$Ad_MailAttach,
                    'MailAttachName'=>$Ad_MailAttachName,
                    'MailSubject'=>$Ad_MailSubject,
                    'MailFor'=>$MailFor,
                    'QTY'=>$request->qty,
                    'Phone'=>$request->phone,
                    'address'=>$request->address,
                    'TrackingId'=>$TrackingId,
                    'product_id'=>$product->id,
                    'product_name'=>$product->heading
                ];
                Mail::send(new Email($data));

                // Mail to User
                $SenderEmail = 'naveed@silklondonltd.com'; $SenderName = 'silklondonltd.com';
                $MailAttach = 'abcd@gmail.com';$MailAttachName = 'abc';
                $ToEmail = $request->email;$ToName = $request->fname.' '.$request->lname;
                $MailSubject = 'Order Placed';
                $MailFor = 'user';
                // 821227
                $send_data = $data = [
                    'ToEmail' => $ToEmail,
                    'ToName' => $ToName,
                    'SenderEmail' => $SenderEmail,
                    'SenderName' => $SenderName,
                    'MailAttach'=>$MailAttach,
                    'MailAttachName'=>$MailAttachName,
                    'MailSubject'=>$MailSubject,
                    'MailFor'=>$MailFor,
                    'QTY'=>$request->qty,
                    'Phone'=>$request->phone,
                    'address'=>$request->address,
                    'TrackingId'=>$TrackingId,
                    'product_id'=>$product->id,
                    'product_name'=>$product->heading
                ];
                Mail::send(new Email($data));
                return redirect()->route('order_placed')->with(['data'=>$send_data]);
            }
        }
        else{
            return redirect()->route('HOME');
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


    public function order_placed(){
        if(Session::has('data')){
            $data = Session::get('data');
            $params = array('title'=>'Order_Placed', 'page'=>'Order_Placed', 'data'=>$data);
            return view('messages.order_placed',$params);
        }
        else{
            return redirect()->route('HOME');
        }
    }

}
