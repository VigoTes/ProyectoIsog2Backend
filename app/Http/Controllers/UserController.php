<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $data=$request->validate([
            'name'=>'required',
            'password'=>'required',
        ],
        [
            'name.required'=>'Ingrese Usuario',
            'password.required'=>'Ingrese Contraseña',
        ]);
            $name=$request->get('name');
            $query=User::where('name','=',$name)->get();
            if($query->count()!=0){
                $hashp=$query[0]->password;
                $password=$request->get('password');
                if(password_verify($password,$hashp))
                {
                    return view('bienvenido');
                }
                else{
                    return back()->withErrors(['password'=>'Contraseña no válido'])->withInput([request('password')]);
                }                
            }
            else
            {
                return back()->withErrors(['name'=>'Usuario no válido'])->withInput([request('name')]);
            }
        }
        public function loginAPI(Request $request){
            /* $data=$request->validate([
                'username'=>'required',
                'password'=>'required',
            ],
            [
                'username.required'=>'Ingrese Usuario',
                'password.required'=>'Ingrese Contraseña',
            ]); */

            error_log('XXXXXXXXXX:'.$request);
                $name=$request->get('username');
                $query=User::where('name','=',$name)->get();
                if($query->count()!=0){
                    $hashp=$query[0]->password;
                    $password=$request->get('password');
                    if(password_verify($password,$hashp))
                    {
                        error_log('goooooooooooo CONTRASEÑA CORRECTA');
                        return '1';
                    }
                    else
                    {
                        error_log('CONTRASEÑA INCORRECTA');
                        return '2';
                    }                
                }
                else
                {
                    error_log('USUARIO NO EXISTE');
                    return '3';
                }
            }
            





        

}
