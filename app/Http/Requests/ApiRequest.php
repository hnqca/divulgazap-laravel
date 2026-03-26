<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class ApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $failed  = $validator->failed();
        $message = $validator->errors()->first();

        $status = 422;

        foreach ($failed as $field => $rules) {
            if (isset($rules['Unique'])) {
                $status = 409;
                break;
            }

            if (isset($rules['Exists'])) {
                $status = 404;
                break;
            }
        }

        throw new HttpResponseException(
            response()->json([
                'status'  => 'error',
                'message' => $message
            ], $status)
        );
    }
}
