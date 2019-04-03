<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class Pages2Controller extends Controller
{
   public function execute(){
       if(view()->exists('admin.pages')){
           $pages = Page::all();
           $data = [
               'title'=> 'Pages',
               'pages' => $pages
           ];

           return view('admin.pages', $data);
       }
       abort('404');
   }

}
