<?php
namespace App\Library; class Response { public static function json($spcb019a = array(), $spc3ee59 = 200, array $spdf7b97 = array(), $sp389e74 = 0) { return response()->json($spcb019a, $spc3ee59, $spdf7b97, $sp389e74); } public static function success($spcb019a = array()) { return self::json(array('message' => 'success', 'data' => $spcb019a)); } public static function fail($sp2af324 = 'fail', $spcb019a = array()) { return self::json(array('message' => $sp2af324, 'data' => $spcb019a), 500); } public static function forbidden($sp2af324 = 'forbidden', $spcb019a = array()) { return self::json(array('message' => $sp2af324, 'data' => $spcb019a), 403); } }