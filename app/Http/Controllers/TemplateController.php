<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TemplateController extends Controller
{
    public function index($templateName){
        $template=View::make("templates.$templateName")->render();
        return response()->json(['template'=>$template]);
        // return view("templates.tableHeader");
    }
    public function info(){
        return view('templates.info');
    }
    
}
