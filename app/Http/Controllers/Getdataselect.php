<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class Getdataselect extends Controller
{
    function Index(Request $request): JsonResponse
    {
        $data = [];
        if (!empty($request->id)) {
            if ($request->parent == "regencies") {
                $dataInstance = "regency";
            } else {
                $dataInstance = substr($request->parent, 0, -1);;
            }
            if ($request->has('q')) {
                $search = $request->q;
                $data = DB::table('reg_' . $request->val)->where('name', 'LIKE', "%$search%")->get();
            } else {
                $data = DB::table('reg_' . $request->val)->where($dataInstance . '_id', $request->id)->get();
            }
        } else {
            if ($request->has('q')) {
                $search = $request->q;
                $data = DB::table('reg_' . $request->val)->where('name', 'LIKE', "%$search%")->get();
            } else {
                $data = DB::table('reg_' . $request->val)->get();
            }
        }

        return response()->json($data);
    }

    function subscribe(Request $request)
    {
        if ($request->isMethod('post')) {
            $insertDB = DB::table('subscriptions')->insert([
                'email'        => $request->getContent(),
                'ip'       => $request->ip(),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
                'created_at' => DB::raw('CURRENT_TIMESTAMP')
            ]);
            return response()->json($insertDB);
        } elseif ($request->isMethod('get')) {
            return response()->view("subscribe");
        }
    }
}
