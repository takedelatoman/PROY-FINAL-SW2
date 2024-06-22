<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SepoliaTransactionsController extends Controller
{
    // Método para manejar la solicitud POST y mostrar las transacciones
    public function fetchTransactions(Request $request)
    {
        // Validar la dirección Ethereum
        $request->validate([
            'address' => 'required|regex:/^(0x)?[a-fA-F0-9]{40}$/'
        ]);

        $address = $request->input('address');

        if (!str_starts_with($address, '0x')) {
            $address = '0x' . $address;
        }

        $apiKey = env('ETHERSCAN_API_KEY');
        $client = new Client();
        $url = "https://api-sepolia.etherscan.io/api";

        try {
            $response = $client->request('GET', $url, [
                'query' => [
                    'module' => 'account',
                    'action' => 'txlist',
                    'address' => $address,
                    'startblock' => 0,
                    'endblock' => 99999999,
                    'sort' => 'asc',
                    'apikey' => $apiKey,
                ]
            ]);

            $transactions = json_decode($response->getBody()->getContents(), true);

            if ($transactions['status'] == '1') {
                return view('sepolia.transactions', [
                    'transactions' => $transactions['result'],
                    'address' => $address, 
                ]);
            } else {
                return view('sepolia.transactions', [
                    'transactions' => [],
                    'address' => $address, 
                    'message' => 'No se encontraron transacciones o ocurrió un error.',
                ]);
            }
        } catch (\Exception $e) {
            return view('sepolia.transactions', [
                'transactions' => [],
                'address' => $address,
                'message' => 'Ocurrió un error: ' . $e->getMessage(),
            ]);
        }
    }
}
