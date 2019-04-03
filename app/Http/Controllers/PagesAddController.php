<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesAddController extends Controller
{
    public function execute(Request $request){

        if($request->isMethod('post')){
            $input = $request->except('_token');
            $messages = [
                'required' => 'field :attribute is neccesary',
                'unique' => 'field :attribute must be unique'
            ];
            $validator = Validator::make($input,
                [
                    'name'=>'required|max:255',
                    'alias'=>'required|unique:pages|max:255',
                    'text' => 'required'
                    ], $messages);
            if ($validator->fails()){
                return redirect()->route('PagesAdd')->withErrors($validator)->withInput();
            }
            if($request->hasFile('images')){
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path().'/img/', $input['images']);
            }
//            $page = new Page($input); one possibility to add
            $page = new Page();
            $page->fill($input);
            if($page->save()){
return redirect('admin')->with('status', 'Page is added');
            }


        }
        if(view()->exists('admin.pagesAdd')){
            $data=[
              'title' => 'new page'
            ];
            return view('admin.pagesAdd', $data);
        }
        return abort(404);
    }
}
