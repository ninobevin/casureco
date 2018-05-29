<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    //

	public function open_ticket(){


		return view('page.customer_service.open_ticket');

	}

}
