<?php

namespace PMEexport\Http\Controllers;

use Response;

/**
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json(['success' => true, 'data' => $result, 'message' => $message]);
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(['success' => false, 'error' => $error], $code);
    }
}
