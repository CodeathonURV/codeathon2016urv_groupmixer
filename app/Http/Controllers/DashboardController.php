<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Input;
use View;
use Excel;

class DashboardController extends Controller
{
    public function index()
    {
        /* Excel::load(base_path() . '/public/files/test.xls', function ($reader) {


             foreach ($reader->toArray() as $sheet) {
                 // get sheet title
                 dd($sheet);
             }

         });*/

        return View::make('dashboard.index');
    }

    /**
     *
     */
    public function upload()
    {

        foreach (Input::all() as $item) {

            $imageName = 'test.' .
                $item->getClientOriginalExtension();

            $item->move(
                base_path() . '/public/files/', $imageName
            );
        }
        dd(Input::all());
    }
}
