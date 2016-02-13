<?php

namespace App\Http\Controllers;


use App\Commands\Step2Command;
use App\User;
use Config;
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
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function saveStep1()
    {

        $validator = Validator::make(Input::all(), [
            'file' => 'required_without_all:table_row|mimes:xls,xlms,xlsx',
            'table_row' => 'required_without_all:file'
        ], [
            'file.mimes' => 'Por favor, introduzca un archivo con los formatos :values.',
            'file.required_without_all' => 'Por favor, introduzca un archivo con los formatos.',
            'table_row.required_without_all' => 'Por favor, introduzca un archivo con los formatos.',
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

        $validator = Validator::make(Input::all(),
            [
                'subject' => 'required|min:3',
                'number_groups' => 'required|numeric|digits_between:' . Config::get('formatter.minGroups') . ',' . Config::get('formatter.maxGroups'),
                'assignment_type' => 'required|in:0,1,2',
                'allow_group_changes' => 'required|in:0,1',
                'change_type' => 'required_if:allow_group_changes,1',
                'max_date' => 'required_if:allow_group_changes,1',
            ]
        );
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors());
        }

        //dd(Input::all());
        return Redirect::route('create_step_3');
    }

    public function createStep3()
    {
        $numberRows = 10;
        return View::make('dashboard.step3', compact('numberRows'));
    }
}
