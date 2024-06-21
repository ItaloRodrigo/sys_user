<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\RuleConfirmedPassword;
use App\Rules\RuleEmailValido;
use App\Rules\RuleRequired;
use Illuminate\Http\Request;
use LaravelLegends\PtBrValidator\Rules\FormatoCpf;

class UserController extends Controller
{
    public function show($id){
        try {
            return response()->json([
                "user" => User::findOrFail($id)
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                "erros" => $e->errors(),
            ], 200);
        }
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'name'             => [new RuleRequired],
                'email'            => [new RuleRequired,new RuleEmailValido],
                'cpf'              => [new RuleRequired, new FormatoCpf],
                'password'         => [new RuleConfirmedPassword($request->password_confirm),new RuleRequired,new RuleRequired],
                'password_confirm' => [new RuleRequired,new RuleRequired],
            ]);

            return "ok";
            //---
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'cpf'      => $request->cpf,
                'password' => bcrypt($request->password)
            ]);
            //---
            return response()->json([
                "request" => $request,
                "user"    => $user
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                "erros" => $e->errors(),
            ], 200);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'name'             => [new RuleRequired],
                'email'            => [new RuleRequired,new RuleEmailValido],
                'cpf'              => [new RuleRequired, new FormatoCpf],
                'password'         => [new RuleRequired,new RuleRequired],
            ]);
            //---
            $user = User::where('id','=',$request->id)->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'cpf'      => $request->cpf,
                'password' => bcrypt($request->password)
            ]);
            //---
            return response()->json([
                "request" => $request,
                "user"    => $user
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                "erros" => $e->errors(),
            ], 200);
        }
    }


}
