<?php

namespace App\Http\Controllers;

use App\Jobs\RabbitSendEmailJob;
use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Tag(
 *     name="Email",
 *     description="",
 * )
 */
class SendEmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @OA\Post(
     *      path="/api/module/email/send",
     *      summary="Send email with job Laravel ",
     *      tags={"Email"},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Input data format",
     *          @OA\JsonContent(
     *              required={"to", "name", "subject"},
     *              @OA\Property(property="to", type="array", @OA\Items(type="string")),
     *              @OA\Property(property="subject", type="string"),
     *              @OA\Property(property="name", type="string"),
     *              @OA\Property(property="cc", type="array", @OA\Items(type="string")),
     *              @OA\Property(property="bcc", type="array", @OA\Items(type="string")),
     *              @OA\Property(property="content", type="string"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *             @OA\Property(property="message", type="array", @OA\Items(type="string")),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid data",
     *      ),
     * )
     */
    public function send(Request $request)
    {
        try {
            $data = $request->json()->all();
            dispatch(new SendEmailJob($data));
            return response()->json(['message' => 'Send email success!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error while processing the request', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/module/email/send-by-rabbitmq",
     *      summary="Send email with RabbitMq ",
     *      tags={"Email"},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Input data format",
     *          @OA\JsonContent(
     *              required={"to", "name", "subject"},
     *              @OA\Property(property="to", type="array", @OA\Items(type="string")),
     *              @OA\Property(property="subject", type="string"),
     *              @OA\Property(property="name", type="string"),
     *              @OA\Property(property="cc", type="array", @OA\Items(type="string")),
     *              @OA\Property(property="bcc", type="array", @OA\Items(type="string")),
     *              @OA\Property(property="content", type="string"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *             @OA\Property(property="message", type="array", @OA\Items(type="string")),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid data",
     *      ),
     * )
     */
    public function sendByRabbitMq(Request $request)
    {
        try {
            $data = $request->json()->all();
            dispatch(new RabbitSendEmailJob($data));
            return response()->json(['message' => 'Send email success!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error while processing the request', 'error' => $e->getMessage()], 500);
        }
    }
}
