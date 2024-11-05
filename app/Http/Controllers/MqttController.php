<?php

namespace App\Http\Controllers;
use PhpMqtt\Client\Facades\MQTT;
use Illuminate\Http\Request;

class MqttController extends Controller
{
    public function publishoff($contractID)
    {
        $topic = $contractID;
        $message = 'off';
        $mqtt = MQTT::connection();
        $mqtt->publish($topic, $message);
        $mqtt->disconnect();
        \Log::info('Published to topic: ' . $topic);
        return response()->json(['status' => 'Message published']);
        
    }
}
