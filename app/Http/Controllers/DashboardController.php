<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\User;
use Input;
use View;
use Excel;

class DashboardController extends Controller
{
    /**
     * @var User
     */
    private $user;

    /**
     * DashboardController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return View::make('dashboard.index');
    }


    public function createStep2()
    {

        $users = $this->user->get();
        foreach ($users as $user) {

            dd($user->roles()->get());


        }

        return View::make('dashboard.step2');
    }


    public function saveStep1()
    {
        /* Excel::load(base_path() . '/public/files/test.xls', function ($reader) {


             foreach ($reader->toArray() as $sheet) {
                 // get sheet title
                 dd($sheet);
             }

         });*/

        dd(Input::all());
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
