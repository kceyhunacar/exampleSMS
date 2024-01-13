<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Sms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SmsController extends Controller
{


    /**
     * @OA\Post(
     *     path="/api/sms/sendSms",
     *     summary="Send a new SMS",
     *     tags={"SMS"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="number",
     *         in="query",
     *         description="Number to Send Message",
     *         required=true,
     *         @OA\Schema( type="string" )
     *     ),
     * 
     *     @OA\Parameter(
     *         name="message",
     *         in="query",
     *         description="Message Content",
     *         required=true,
     *         @OA\Schema( type="string" )
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="404", description="Not Found")
     *     @OA\Response(response="401", description="Anauthorized User")
     *     @OA\Response(response="500", description="Server Error")
     * )
     */
    public function sendSms(Request $request)
    {

$id = Auth::user()->id;
        $sms = new Sms();
        $sms->fill([
            'message' => $request->message,
            'number' => $request->number,
            'user_id' => $id,
        ]);

        if (!$sms->save()) {
            App::abort(500, 'Error');
        }

        return response()->json(['status' => 'success', 'sms' => $sms], 200);
    }
    /**
     * @OA\Get(
     *     path="/api/sms/getSmsByFilter",
     *     summary="SMS Filter by Date",
     *     tags={"SMS"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="start_date",
     *         in="path",
     *         description="Start Date",
     *         required=true,
     *         @OA\Schema( type="string" ,example="01/01/2023")
     *     ),
     * 
     *     @OA\Parameter(
     *         name="end_date",
     *         in="path",
     *         description="End Date",
     *         required=true,
     *         @OA\Schema( type="string" ,example="01/01/2024")
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="404", description="Not Found")
     *     @OA\Response(response="401", description="Anauthorized User")
     *     @OA\Response(response="500", description="Server Error")
     * )
     */
    public function getSmsByFilter()
    {



        $start_date = Carbon::parse(request()->get('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse(request()->get('end_date'))->format('Y-m-d');

        $sms = Sms::whereDate('send_time', '>=', $start_date)
            ->whereDate('send_time', '<=', $end_date)
            ->where('user_id', Auth::user()->id)
            ->get();
        return response()->json(['sms' => $sms], 200);
    }
    /**
     * @OA\Get(
     *     path="/api/sms/getSmsById",
     *     summary="Get SMS by ID",
     *     tags={"SMS"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="SMS Id",
     *         required=true,
     *         @OA\Schema( type="number")
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="404", description="Not Found")
     *     @OA\Response(response="401", description="Anauthorized User")
     *     @OA\Response(response="500", description="Server Error")
     * )
     */
    public function getSmsById()
    {

        $id = request()->get('id');
        try {
            $sms = Sms::where('id',  $id)
                ->where('user_id', Auth::user()->id)
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            abort(response()->json($e, 404));
        }
        return response()->json(['sms' => $sms], 200);
    }
}
