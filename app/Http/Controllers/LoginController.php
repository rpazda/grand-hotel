<?php

    class LoginController extends BaseController{

        public function showLogin(){
            return View::make('login');
        }
        
	public function username(){
		return 'username';
	}
    }
