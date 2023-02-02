<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Http;
use App\Http\Response\GeneralResponse;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\RegisterUserRequest;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

      /**
     * Create a new UserController instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('jwt.auth');
     }

     /**
     * @OA\Get(
     *  operationId="index",
     *  summary="User index",
     *  description="User index",
     *  security={{ "bearerAuth": {} }},
     *  tags={"Users"},
     *      path="/users",
     *      summary="Get list User",
     *      description="Returns User data",

     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function index()
    {

         //$this->middleware('jwt.auth');
         return (new GeneralResponse)->default_json(
             $success=true,
             $message = "Success",
             $data= response()->json(User::all())->original,
             $code= Response::HTTP_ACCEPTED
         );
    }

    /**
     * @OA\Get(
     *  operationId="show",
     *  summary="User show",
     *  description="User show",
     *  security={{ "bearerAuth": {} }},
     *  tags={"Users"},
     *      path="/users/{id}",
      *      summary="Get detail User",
     *      description="Returns User data",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *       ),
     *  *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return (new GeneralResponse)->default_json(
            $success=true,
            $message= "Succes",
            $data= [response()->json(User::find($id))->original],
            $code= Response::HTTP_ACCEPTED
        );
    }

     /**
     * @OA\Put(
     *  operationId="update",
     *  summary="User update",
     *  description="User update",
     *  security={{ "bearerAuth": {} }},
     *  tags={"Users"},
     *      path="/users/update/{id}",
     *      summary="Update existing User",
     *      description="Returns updated User data",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *  @OA\RequestBody(
     *      description="Book to create",
     *      required=true,
     *        @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *            @OA\Property(
     *            title="data",
     *            property="data",
     *            type="object",
     *            ref="#/components/schemas/User")
     *     )
     *    )
     *  ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->update($request->validated('data'));

        return (new GeneralResponse)->default_json(
            $success=true,
            $message= "Success",
            $data= [response()->json($user)->original],
            $code= Response::HTTP_ACCEPTED
        );
    }

    /**
     * @OA\Post(
     *  operationId="register",
     *  summary="User register",
     *  description="User register",
     *  tags={"Users"},
     *      path="/users/register",
     *      summary="Register new User",
     *      description="Returns register User data",
     *  @OA\RequestBody(
     *      description="User register",
     *      required=true,
     *        @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *            @OA\Property(
     *            title="data",
     *            property="data",
     *            type="object",
     *            ref="#/components/schemas/Register")
     *     )
     *    )
     *  ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Register")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Register")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function register(RegisterUserRequest $request)
    {

        $request_input = $request->input();
        $request_input = $request->all();
                if(User::where("email", $request_input['data']['email'])->count()){
                    return (new GeneralResponse)->default_json(
                        $success=false,
                        $message= "Email is exist",
                        $data= response()->json($request_input['data']),
                        $code=Response::HTTP_INTERNAL_SERVER_ERROR
                    );
                }


        if(array_key_exists('password',  $request_input['data']) && array_key_exists('password2',  $request_input['data'])){
            if ($request_input['data']['password'] != $request_input['data']['password2']){
                return (new GeneralResponse)->default_json(
                    $success=false,
                    $message = "Password and password2 confirmation do not match, please correct.",
                    $data= response()->json($request_input['data']),
                    $code= Response::HTTP_ACCEPTED
                );
            }
        }


        $user = User::create($request_input['data']);

        return (new GeneralResponse)->default_json(
            $success=true,
            $message= "Succes",
            $data= $user,
            $code= Response::HTTP_ACCEPTED
        );
    }


    /**
     * @OA\Delete(
     *  operationId="delete",
     *  summary="User delete",
     *  description="User delete",
     *  security={{ "bearerAuth": {} }},
     *  tags={"Users"},
     *      path="/users/delete/{id}",
     *      summary="Delete existing User",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent({})
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy(User $user, $id)
    {
        $user = User::find($id);
        if(!User::find($id)){
            return (new GeneralResponse)->default_json(
                $success=false,
                $message= "User not deleted",
                $data= [$user],
                $code= Response::HTTP_ACCEPTED
                );
        }
        $user = User::find($id);
        $user->delete();

        return (new GeneralResponse)->default_json(
            $success=true,
            $message= "Succes",
            $data= [$user],
            $code= Response::HTTP_ACCEPTED
        );
    }

    // /**
    //  * @OA\Get(
    //  *  operationId="code",
    //  *  summary="User code",
    //  *  description="code",
    //  *  tags={"Users"},
    //  *      path="/users/code",
    //  *      summary="Code",
    //  *      description="Returns User data",

    //  *      @OA\Response(
    //  *          response=200,
    //  *          description="Successful operation",
    //  *          @OA\JsonContent(ref="#/components/schemas/User")
    //  *       ),
    //  *      @OA\Response(
    //  *          response=400,
    //  *          description="Bad Request"
    //  *      ),
    //  *      @OA\Response(
    //  *          response=401,
    //  *          description="Unauthenticated",
    //  *      ),
    //  *      @OA\Response(
    //  *          response=403,
    //  *          description="Forbidden"
    //  *      )
    //  * )
    //  */
    public function code()
    {
        $test = "TEST";
        return $test;
        // return (new GeneralResponse)->default_json(
        //     $success=true,
        //     $message = "Success",
        //     $data= response()->json($test),
        //     $code= Response::HTTP_ACCEPTED
        // );
    }

}
