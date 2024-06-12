<?php

namespace App\Services;

use App\Http\Resources\TransactionResource;
use App\Models\Client;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class TransactionServices
{
    public function transaction($validatedData, $id)
    {   
        $client = Client::find($id);
        $amount = $validatedData['amount'];
        $balance = $client -> balance;
        $limit = $client -> limit;
        $type = $validatedData['type'];
        DB::beginTransaction(); // 
        try 
        {
            if($type == 'c') {
                if($amount<=$limit+$balance){
                    $balance -=$amount;
                    $client->update(['balance' => $balance]);
                } else 
                {
                    return response()->json(['message' => 'you dont have enough credit!']);
                }
            }
            $transaction = Transaction::create([
            'amount' => $validatedData['amount'],
            'type' => $validatedData['type'],
            'description' => $validatedData['description'],
            'user_id' => 2,
            ]);
            DB::commit(); // DB::commit(); // Commit the transaction to ensure all data changes are saved to the database at once.
            return $client;
        } 
        catch (\Exception $e)
        {
            DB::rollBack();
            return response()->json([
                'message' => 'Error on transaction, please try again!'
            ]);;
        }
    }

    public function statement($validatedData)
    {   
       
    }
}
