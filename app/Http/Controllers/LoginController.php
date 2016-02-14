<?php

namespace App\Http\Controllers;

use App\Commands\LoginCommand;
use App\Commands\RoleCommand;
use Auth;
use Illuminate\Http\Request;
use Redirect;
use Validator;
use View;

class LoginController extends Controller
{
    /**
     * @var LoginCommand
     */
    private $loginCommand;
    /**
     * @var RoleCommand
     */
    private $roleCommand;

    /**
     * LoginController constructor.
     * @param LoginCommand $loginCommand
     * @param RoleCommand $roleCommand
     */
    public function __construct(LoginCommand $loginCommand, RoleCommand $roleCommand)
    {
        $this->loginCommand = $loginCommand;
        $this->roleCommand = $roleCommand;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function createLogin()
    {
        return View::make('login.create');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function saveLogin(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'dni' => 'required',
                'password' => 'required',
            ]
        );

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)
                ->withInput();
        }

        if ($this->loginCommand->checkLogin($request->all())) {
            if (Auth::user()->level() > 1) {
                return Redirect::route('index');
            } else {
                return Redirect::route('index_student');
            }

        } else {
            return Redirect::back();
        }
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function createRegister()
    {
        $roles = $this->roleCommand->listRoles(['id', 'name']);
        return View::make('login.register', compact('roles'));

    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function saveRegister(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'surnames' => 'required',
                'dni' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:3|confirmed',
                'password_confirmation' => 'required|min:3',
                'user_type' => 'required'
            ]
        );

        if ($validator->fails()) {

            return Redirect::back()->withErrors($validator)
                ->withInput();
        }

        $this->loginCommand->save($request->all());

        return Redirect::route('login.create');
    }

}
