<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
use App\Http\Resources\StatementResource;
use Illuminate\Http\Request;

use App\Services\TransactionServices;

class ClientController extends Controller
{
  
    public function transaction(Request $request, TransactionServices $transactionService, $id)
    {
        $client = Auth::user();

        if ($client->id == $id) { // To verify if the URL parameter id matches the authenticated client's ID
            $validatedData = $request->validate  //Ensure the data sent in the request is valide
            ([
                'amount' => 'required|numeric|min:0',
                'type' => 'required|in:credit,debit',
                'description' => 'required|string|max:10',
            ]);         
            return $transactionService->transaction($validatedData, $id); //Call the transaction function in Services/TransactionServices.

        } else {
            // The ID does not match the authenticated client's ID.
            return response()->json([
                'message' => 'Unauthorized. The ID does not match the authenticated client.'
            ], 403);
        }

    }

    public function statement($id)
    {
        $client = Auth::user();
        if ($client->id == $id) { //To verify if the URL parameter id matches the authenticated client's ID
            return new StatementResource($client) ; // Call the StatementResource to format the data to be displayed in the response.
        } else {
            // The ID does not match the authenticated client's ID.
            return response()->json([
                'message' => 'Unauthorized. The ID does not match the authenticated client.'
            ], 403);
        }
    }
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
