<?php

namespace App\Http\Controllers;

use Log;
use DB;
use Cart;
use Mail;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function send(Request $request)
    {
    	$title = $request->input('title');
    	$content = $request->input('content');

    	Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
    	{
    		
    		$message->from('order@esscentsnaturals.com', 'Essennts Naturals');

    		$message->to('roerjo.personal@gmail.com');
    	
    	});

    	return response()->json(['message' => 'Request completed']);
    }
}
