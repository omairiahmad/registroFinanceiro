<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use App\Models\Transaction;


class StatementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        $lastTenTransactions = Transaction::where('user_id', $this->id) // 
        ->latest()
        ->take(10)
        ->get();  //Retrieve the last ten transactions for the user with the specified ID.
        return [
            "balance"=>[
                "limit"=> $this->limit,
                "statement_date"=>Carbon::now(),
                "balance" => $this->balance,
            ],
            "recent_transactions"=>
            $lastTenTransactions->toArray()
        ];

        
    }
}
