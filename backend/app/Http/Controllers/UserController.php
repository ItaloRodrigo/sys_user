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

    public function all(){
        try {
            return response()->json([
                "user" => User::all()
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                "erros" => $e->errors(),
            ], 200);
        }
    }

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
                'password'         => [new RuleConfirmedPassword($request->password_confirm),new RuleRequired],
                'password_confirm' => [new RuleRequired],
            ]);
            //---
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'cpf'      => $request->cpf,
                'password' => bcrypt($request->password)
            ]);
            //---
            return response()->json([
                "mensagem" => 'Usuário criado com sucesso!',
                "user"     => $user
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
                'password'         => [new RuleRequired],
            ]);
            //---
            $existe = User::where("id",$request->id)->get();

            if (count($existe) > 0){
                $user = User::where('id','=',$request->id)->update([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'cpf'      => $request->cpf,
                    'password' => bcrypt($request->password)
                ]);
                //---
                return response()->json([
                    "mensagem" => "Usuário deletado com sucesso!",
                    "user"     => $user
                ], 200);
            }else{
                return response()->json([
                    "mensagem" => "Usuário não existe na base de dados!",
                ], 200);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                "erros" => $e->errors(),
            ], 200);
        }
    }

    public function delete(Request $request){
        try {
            $existe = User::where("id",$request->id)->get();

            if (count($existe) > 0){
                $deleted = User::where('active', 1)
                                ->where('id',$request->id)->delete();
                //---
                if($deleted){
                    return response()->json([
                        "deleted"    => $deleted
                    ], 200);
                }else{
                    return response()->json([
                        "erros" => [
                            "mensagem" => "Não foi possível realizar o delete."
                        ],
                    ], 200);
                }
            }else{
                return response()->json([
                    "mensagem" => "Usuário não existe na base de dados!",
                ], 200);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                "erros" => $e->errors(),
            ], 200);
        }
    }

}
