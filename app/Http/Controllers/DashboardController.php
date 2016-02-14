<?php

namespace App\Http\Controllers;


use App\Commands\DashboardCommand;
use App\Commands\Step1Command;
use App\Commands\Step2Command;
use App\Commands\Step3Command;
use App\Http\Requests\Step1Request;
use App\Http\Requests\Step2Request;
use App\User;
use Cache;
use Config;
use Input;
use Redirect;
use Request;
use Session;
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
     * @var Step1Command
     */
    private $step1Command;
    /**
     * @var Step3Command
     */
    private $step3Command;
    /**
     * @var DashboardCommand
     */
    private $dashboardCommand;

    /**
     * DashboardController constructor.
     * @param DashboardCommand $dashboardCommand
     * @param Step1Command $step1Command
     * @param Step2Command $step2Command
     * @param Step3Command $step3Command
     */
    public function __construct(DashboardCommand $dashboardCommand, Step1Command $step1Command, Step2Command $step2Command, Step3Command $step3Command)
    {
        $this->step2Command = $step2Command;
        $this->step1Command = $step1Command;
        $this->step3Command = $step3Command;
        $this->dashboardCommand = $dashboardCommand;
    }

    public function index()
    {
        $assignments = $this->dashboardCommand->getAssignmentPaginated();

        return View::make('dashboard.index', compact('assignments'));
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function createStep1()
    {
        return View::make('dashboard.step1');
    }

    /**
     * @param Step1Request $step1Request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveStep1(Step1Request $step1Request)
    {

        $this->step2Command->saveToCache($step1Request->all());
        return Redirect::route('create_step_2');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function createStep2()
    {
        $teachers = $this->step2Command->getListTeacherAndCoordinators();

        return View::make('dashboard.step2', compact('teachers'));
    }

    /**
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function saveStep2()
    {

        $validator = Validator::make(Input::all(),
            [
                'subject' => 'required|min:3',
                'number_groups' => 'required|numeric|between:' . Config::get('formatter.minGroups') . ',' . Config::get('formatter.maxGroups'),
                'assignment_type' => 'required|in:0,1,2',
                'allow_group_changes' => 'required|in:0,1',
                'change_type' => 'required_if:allow_group_changes,1',
                'max_date' => 'required_if:allow_group_changes,1',
            ]
        );
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors());
        }

        $assignment = $this->step2Command->save(Input::all());
        return Redirect::route('create_step_3', ['id' => $assignment->id]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function createStep3($id)
    {

        $assignment = $this->step3Command->getParameters($id);

        return View::make('dashboard.step3', compact('assignment'));
    }
}
