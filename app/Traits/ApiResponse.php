<?php

namespace App\Traits;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

trait ApiResponse
{
    protected function success(
        mixed $data = null,
        string $message = 'Success',
        int $status = 200
    ) {

        /*
        |--------------------------------------------------------------------------
        | Paginated Resource Collection
        |--------------------------------------------------------------------------
        */

        if ($data instanceof AnonymousResourceCollection) {

            $response = $data->response()->getData(true);

            return response()->json([
                'status'  => true,
                'message' => $message,
                'data'    => $response,
            ], $status);
        }

        /*
        |--------------------------------------------------------------------------
        | Single Resource
        |--------------------------------------------------------------------------
        */

        if ($data instanceof JsonResource) {

            $response = $data->response()->getData(true);

            return response()->json([
                'status'  => true,
                'message' => $message,
                'data'    => $response['data'],
            ], $status);
        }

        /*
        |--------------------------------------------------------------------------
        | Array / Model / Null
        |--------------------------------------------------------------------------
        */

        return response()->json([
            'status'  => true,
            'message' => $message,
            'data'    => $data,
        ], $status);
    }

    protected function error(
        string $message,
        int $status = 400,
        mixed $errors = null
    ) {
        return response()->json([
            'status'  => false,
            'message' => $message,
            'errors'  => $errors,
        ], $status);
    }
}