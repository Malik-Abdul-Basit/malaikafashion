<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $params = array('title'=>'CONTACT US','page'=>'CONTACT US');
        return view('public.contact_us',$params);
    }

    public function form_submit(ContactRequest $request)
    {

        $send_data = $contact = new Contact([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>$request->message,
            'token'=>$request->_token,
        ]);
        $contact->save();


        $SiteEmail = 'info@silklondonltd.com'; $SiteName = 'Silklondonltd';

        // Mail to admin naveed@silklondonltd.com
        $Ad_SenderEmail = $request->email; $Ad_SenderName = $request->name;
        $Ad_MailAttach = 'abcd@gmail.com';$Ad_MailAttachName = 'abc';
        $Ad_ToEmail = 'naveed@silklondonltd.com';$Ad_ToName = 'Naveed Abad';
        $Ad_MailSubject = 'Contact Us User Message';
        $MailFor = 'admin';

        $data = [
            'ToEmail' => $Ad_ToEmail,
            'ToName' => $Ad_ToName,
            'SiteEmail' => $SiteEmail,
            'SiteName' => $SiteName,
            'MailAttach'=>$Ad_MailAttach,
            'MailAttachName'=>$Ad_MailAttachName,
            'MailSubject'=>$Ad_MailSubject,
            'MailFor'=>$MailFor,
            'SenderEmail' => $Ad_SenderEmail,
            'SenderName' => $Ad_SenderName,
            'Phone'=>$request->phone,
            'UserMessage'=>$request->message,
        ];
        Mail::send(new ContactEmail($data));

        // Mail to User
        $MailAttach = 'abcd@gmail.com';$MailAttachName = 'abc';
        $ToEmail = $request->email; $ToName = $request->name;
        $MailSubject = 'Request Received';
        $MailFor = 'user';
        // 821227
        $data = [
            'ToEmail' => $ToEmail,
            'ToName' => $ToName,
            'SiteEmail' => $SiteEmail,
            'SiteName' => $SiteName,
            'SenderEmail' => $SiteEmail,
            'SenderName' => $SiteName,
            'MailAttach'=> $MailAttach,
            'MailAttachName'=>$MailAttachName,
            'MailSubject'=>$MailSubject,
            'MailFor'=>$MailFor,
            'Phone'=>$request->phone,
            'UserMessage'=>$request->message,
        ];
        Mail::send(new ContactEmail($data));

        //return redirect()->route('CONTACT US')->with(['error'=>'Record successfully added.','alert_class'=>'success']);
        return redirect()->route('request_received')->with(['data'=>$send_data]);
    }

    public function request_received(){
        if(Session::has('data')){
            $data = Session::get('data');
            $params = array('title'=>'request_received', 'page'=>'request_received', 'data'=>$data);
            return view('messages.request_received',$params);
        }
        else{
            return redirect()->route('HOME');
        }
    }


    public function send_email(){

        // Mail to admin
        $Ad_SenderEmail = 'info@silklondonltd.com'; $Ad_SenderName = 'Silklondonltd';
        $Ad_MailAttach = 'abcd@gmail.com';$Ad_MailAttachName = 'abc';
        $Ad_ToEmail = 'sj845940@gmail.com'; $Ad_ToName = 'Sara';
        $Ad_MailSubject = 'Contact Us User Message';
        $MailFor = 'user';

        $data = [
            'ToEmail' => $Ad_ToEmail,
            'ToName' => $Ad_ToName,
            'SenderEmail' => $Ad_SenderEmail,
            'SenderName' => $Ad_SenderName,
            'MailAttach'=>$Ad_MailAttach,
            'MailAttachName'=>$Ad_MailAttachName,
            'MailSubject'=>$Ad_MailSubject,
            'MailFor'=>$MailFor,
            'Phone'=>'0322 7636399',
            'UserMessage'=>'It is a long established fact that a reader will be
            distracted by the readable content of a page when looking at its layout.
            The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters
            making it look like readable English.',
        ];
        Mail::send(new ContactEmail($data));

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
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
