<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create(FeedbackRequest $request) {
        $data = $request->validated();

        Feedback::create($data);

        return response()->json(['data' => [], 'message' => 'Данные успешно отправлены'], 200);
    } 
}
