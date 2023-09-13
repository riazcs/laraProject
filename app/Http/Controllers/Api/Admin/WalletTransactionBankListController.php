<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\MsgCode;
use App\Models\WalletTransactionBankList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WalletTransactionBankListController extends Controller
{

    public function getUserBankList(Request $request)
    {
        $bankList = WalletTransactionBankList::get()->paginate(20);
        return response()->json([
            'code' => Response::HTTP_OK,
            'success' => true,
            'msg_code' => MsgCode::SUCCESS[0],
            'msg' => MsgCode::SUCCESS[1],
            'data' => $bankList,
        ], 200);
    }
   
}

