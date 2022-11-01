<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail;

class MailForm extends Controller
{
    private $name;
    private $email;
    private $phone;
    private $visitor;
    private $active;
    private $password;

    public function __construct(Request $request)
    {
        $this->name = $request->name;
        $this->email = $request->email;
        $this->phone = $request->phone;
        $this->visitor = $request->visitor;
        $this->active = $request->active;
        $this->password = $request->password;
    }

    public function sendEmail()
    {
        $data = array([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'visitor' => $this->visitor,
            'active' => $this->active,
            'password' => $this->password
        ]);

        Mail::to($this->email)->send(new sendMail($data));
    }
}
