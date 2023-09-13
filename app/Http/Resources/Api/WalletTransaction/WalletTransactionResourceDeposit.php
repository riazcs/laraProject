<?php

namespace App\Http\Resources\Api\WalletTransaction;

use App\Helper\StatusWithdrawalDefineCode;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class WalletTransactionResourceDeposit extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'deposit_money' => $this->deposit_money,
            'account_number' => $this->account_number,
            'bank_account_holder_name' => $this->bank_account_holder_name,
            'bank_name' => $this->bank_name,
            'deposit_trading_code' => $this->deposit_trading_code,
            'deposit_date_time' => $this->deposit_date_time,
            'deposit_content' => $this->deposit_content,
            'status' => StatusWithdrawalDefineCode::getStatusWithdrawalCode($this->status)
        ];
    }
}