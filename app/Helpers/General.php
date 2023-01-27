<?php

if (! function_exists('show_message')) {
    function show_message($th, $message = '')
    {
        if (env("APP_DEBUG")) {
            return $th->getMessage();
        }
        return response()->json($message ? [$message] : [__('message.unexpected_error')], 500);
    }
}