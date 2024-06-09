<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpMqtt\Client\MqttClient;

class MQTTController extends Controller
{
    protected $mqtt;

    public function __construct(MqttClient $mqtt)
    {
        $this->mqtt = $mqtt;
    }

    public function controlRelay(Request $request)
    {
        $command = $request->input('command'); // Expecting 'on' or 'off'

        if (in_array($command, ['on', 'off'])) {
            $this->mqtt->connect(null, true);
            $this->mqtt->publish('esp32/relay', $command, 0);
            $this->mqtt->disconnect();

            return response()->json(['status' => 'success', 'message' => 'Relay command sent.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Invalid command.']);
        }
    }
}
