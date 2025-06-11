<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class EmotionDetectionController extends Controller
// {
//     public function launchFusion(Request $request)
//     {
//         $scriptPath = base_path('scripts/fusion.py');
//         $python = 'C:/Program Files/Python312/python.exe';

//         $output = [];
//         $return_var = 0;
//         exec("\"$python\" \"$scriptPath\"", $output, $return_var);

//         $jsonLine = null;
//         foreach ($output as $line) {
//             if (str_contains($line, 'final_emotion')) {
//                 $jsonLine = $line;
//                 break;
//             }
//         }

//         $emotion = "unknown";
//         if ($jsonLine) {
//             $result = json_decode($jsonLine, true);
//             if (isset($result['final_emotion'])) {
//                 $emotion = $result['final_emotion'];
//             }
//         }

//         return response()->json(['emotion' => $emotion]);
//     }


// }


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmotionDetectionController extends Controller
{
    public function launchFusion(Request $request)
    {
        $scriptPath = base_path('scripts/fusion.py');
        $python = 'C:/Program Files/Python312/python.exe';

        $output = [];
        $return_var = 0;
        exec("\"$python\" \"$scriptPath\"", $output, $return_var);

        $jsonLine = null;
        foreach ($output as $line) {
            if (str_contains($line, 'final_emotion')) {
                $jsonLine = $line;
                break;
            }
        }

        $emotion = "unknown";
        if ($jsonLine) {
            $result = json_decode($jsonLine, true);
            if (isset($result['final_emotion'])) {
                $emotion = $result['final_emotion'];
            }
        }

        return response()->json(['emotion' => $emotion]);
    }

    // Nouvelle méthode pour arrêter la détection en créant stop.txt
    public function stopDetection()
    {
        $stopPath = public_path('stop.txt');
        file_put_contents($stopPath, 'stop'); // crée ou écrase le fichier
        return response()->json(['message' => 'Détection arrêtée']);
    }
}
