<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function storyVisitorInvitation (Request $request)
    {
        $visitor = new Visitor();
        $visitor->name = $request->input('name');
        $visitor->email = $request->input('email');
        $visitor->phone = $request->input('phone');

        $visitor->save();

        return redirect()->route('/');

    }
}
