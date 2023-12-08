<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Tag(
 *     name="Auth",
 *     description="Authentication and Authorization with JWT Token",
 * )
 */
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * @OA\Post(
     *      path="/api/auth/register",
     *      summary="Register",
     *      tags={"Auth"},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Register Form",
     *          @OA\JsonContent(
     *              required={"name", "email", "password"},
     *              @OA\Property(property="name", type="string"),
     *              @OA\Property(property="email", type="string"),
     *              @OA\Property(property="password", type="string"),
     *              @OA\Property(property="password_confirmation", type="string"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="code", type="integer", format="int32", example=200),
     *              @OA\Property(property="message", type="string", example="Register successfull!"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable entity error"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Failed operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="code", type="integer", format="int32", example=500),
     *              @OA\Property(property="message", type="string", example="Register fail!"),
     *          ),
     *      )
     * )
     */
    public function register()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password'=> 'required|confirmed',
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(), 422);
        }

        $user = User::create([
            'name'=> request('name'),
            'email'=> request('email'),
            'password'=> Hash::make(request('password')),
        ]);

        if($user){
            return response()->json([
                'status' => 200,
                'message' => 'Register successfull!'
            ]);
        }else{
            return response()->json([
                'status' => 500,
                'message' => 'Register fail!'
            ]);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/auth/login",
     *      summary="Get a JWT via given credentials.",
     *      tags={"Auth"},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="email", type="string"),
     *              @OA\Property(property="password", type="string"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Get token",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password'=> 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(), 422);
        }

        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * @OA\Post(
     *      path="/api/auth/me",
     *      summary="Get the authenticated User",
     *      tags={"Auth"},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="token", type="string"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * @OA\Post(
     *      path="/api/auth/logout",
     *      summary="Log the user out (Invalidate the token).",
     *      tags={"Auth"},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="token", type="string"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successfully logged out",
     *      ),
     * )
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * @OA\Post(
     *      path="/api/auth/refresh",
     *      summary="Refresh a token.",
     *      tags={"Auth"},
     *      @OA\Response(
     *          response=200,
     *          description="Get token",
     *      ),
     * )
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}