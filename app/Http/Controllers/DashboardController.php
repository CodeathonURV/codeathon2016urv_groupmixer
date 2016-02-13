<?php

namespace App\Http\Controllers;


use App\Commands\Step2Command;
use App\User;
use Input;
use Redirect;
use Request;
use Validator;
use View;

class DashboardController extends Controller
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Step2Command
     */
    private $step2Command;

    /**
     * DashboardController constructor.
     * @param Step2Command $step2Command
     */
    public function __construct(Step2Command $step2Command)
    {
        $this->step2Command = $step2Command;
    }

    public function createStep1()
    {
        return View::make('dashboard.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveStep1()
    {

        $validator = Validator::make(Input::all(), [
            'file' => 'mimes:xls,xlms,xlsx'
        ], [
            'file.mimes'=>'Por favor, introduzca un archivo con los formatos :values.'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors());
        }

        /* Excel::load(base_path() . '/public/files/test.xls', function ($reader) {


             foreach ($reader->toArray() as $sheet) {
                 // get sheet title
                 dd($sheet);
             }

         });*/

        return Redirect::route('create_step_2');
    }


    public function createStep2()
    {
        $teachers = $this->step2Command->getListTeacherAndCoordinators();
        return View::make('dashboard.step2', compact('teachers'));
    }


    public function saveStep2()
    {
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
