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

    /**
     * @OA\Info(
     *     version="1.0",
     *     title="Endpoints do Sys User v1.0",
     *     description="Sys User v1.0",
     * ),
     * Sys User
     * @OA\Get(
     *     path="/api/user/all",
     *     summary="Lista de Usuários",
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * ),
     */

    public function all(){
        try {
            return response()->json([
                "user" => User::orderBy('name')->get()
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                "erros" => $e->errors(),
            ], 200);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/user/show/{id}",
     *     summary="Mostrar usuário",
     *     @OA\Parameter(
     *         description="id",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */

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

    /**
     * @OA\Post(
     *     path="/api/user/create",
     *     summary="Criar usuário",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="cpf",
     *                     oneOf={
     *                     	   @OA\Schema(type="string"),
     *                     	   @OA\Schema(type="integer"),
     *                     }
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password_confirm",
     *                     type="string"
     *                 ),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */

    public function create(Request $request)
    {
        try {
            $request->validate([
                'name'             => [new RuleRequired],
                'email'            => [new RuleRequired,new RuleEmailValido],
                'cpf'              => [new RuleRequired],
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

    /**
     * @OA\Post(
     *     path="/api/user/update",
     *     summary="Atualizar usuário",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="cpf",
     *                     oneOf={
     *                     	   @OA\Schema(type="string"),
     *                     	   @OA\Schema(type="integer"),
     *                     }
     *                 ),
     *                 @OA\Property(
     *                     property="id",
     *                     type="int"
     *                 ),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */

    public function update(Request $request)
    {
        try {
            $request->validate([
                'name'             => [new RuleRequired],
                'email'            => [new RuleRequired,new RuleEmailValido],
                'cpf'              => [new RuleRequired],
            ]);
            //---
            $existe = User::where("id",$request->id)->get();

            if (count($existe) > 0){
                $user = User::where('id','=',$request->id)->update([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'cpf'      => $request->cpf,
                ]);
                //---
                return response()->json([
                    "mensagem" => "Usuário atualizado com sucesso!",
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

        /**
     * @OA\Post(
     *     path="/api/user/delete",
     *     summary="Deletar usuário",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="id",
     *                     type="int"
     *                 ),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */

    public function delete(Request $request){
        try {
            $existe = User::where("id",$request->id)->get();

            if (count($existe) > 0){
                $deleted = User::where('active', 1)
                                ->where('id',$request->id)->delete();
                //---
                if($deleted){
                    return response()->json([
                        "mensagem"    => "Usuário deletado com sucesso"
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
