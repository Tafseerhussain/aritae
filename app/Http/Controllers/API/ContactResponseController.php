<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactResponse;
use App\Models\User;
use App\Events\ContactFormSubmission;
use App\Traits\CreateNotification;
use Validator;

class ContactResponseController extends Controller
{
    use CreateNotification;

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'min:2'],
            'last_name' => ['required', 'min:2'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'min:5'],
            'phone' => ['nullable'],
            'user_type' => ['nullable', 'in:coach,parent,player'],
            'message' => ['required']
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $response = ContactResponse::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        if($request->phone)
            $response->phone = $request->phone;
        if($request->user_type)
            $response->user_type = $request->user_type;

        $response->save();

        $admin = User::where('user_type_id', 1)->first();

        //Send pusher notification
        broadcast(new ContactFormSubmission(
            $response,
            $admin,
            'contact-form-response'
        ));

        $this->pushAdminNotification('contact-form', 'Contact form response', 'New contact form response received from ' . $request->first_name . ' ' . $request->last_name );

        return response()->json([
            'status' => 'success',
            'message' => 'Your message recorded successfully',
        ]);

    }
}
