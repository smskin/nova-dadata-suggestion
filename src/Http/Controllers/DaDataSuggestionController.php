<?php

namespace SMSkin\DaDataSuggestion\Http\Controllers;

use Exception;
use \Fomvasss\Dadata\Facades\DadataSuggest;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Laravel\Nova\Http\Requests\NovaRequest;

class DaDataSuggestionController extends Controller
{
    public function query(NovaRequest $request): JsonResponse
    {
        $query = trim($request->input('q'));
        if (!$query)
        {
            return response()->json([]);
        }

        try {
            $response = DadataSuggest::suggest(
                "address",
                [
                    "query"=>$request->input('q'),
                    "count"=>10
                ]
            );
            if (array_key_exists('value', $response)){
                $response = [$response];
            }
        } catch (Exception $exception){
            $response = [];
        }
        return response()->json($response);
    }
}
