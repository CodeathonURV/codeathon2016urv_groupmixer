<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\User;
use Bican\Roles\Models\Role;
use Input;
use Redirect;
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

        $posts = $this->user->whereHas('roles', function ($query) {
            $query->orWhere('roles.id', '=', '2');
            $query->where('roles.id', '=', '1');
        })->get(['id', 'name']);


        $teachers = [];
        foreach ($posts as $post) {
            $teachers[$post->id] = $post->name;

        }


        return View::make('dashboard.step2', compact('teachers'));
    }


    public function saveStep1()
    {
        /* Excel::load(base_path() . '/public/files/test.xls', function ($reader) {


             foreach ($reader->toArray() as $sheet) {
                 // get sheet title
                 dd($sheet);
             }

         });*/

        return Redirect::route('create_step_2');
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
