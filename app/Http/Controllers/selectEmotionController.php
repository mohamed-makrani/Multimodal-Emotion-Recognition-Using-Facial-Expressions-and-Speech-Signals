<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class selectEmotionController extends Controller
{
    public function selectEmotion(Request $request)
    {
        // On suppose que l'audio et la vidéo sont déjà traités et que tu appelles fusion.py
        $audioPath = storage_path('app/public/audio.wav');
        $videoPath = storage_path('app/public/video.mp4');

        $process = new Process(['python3', base_path('fusion.py'), $audioPath, $videoPath]);
        $process->run();

        // Récupération du résultat
        $emotion = trim($process->getOutput()); // ex: "Happy", "Sad", ...

        // Envoi vers la page résultat avec l’émotion
        return view('result', ['emotion' => $emotion]);
    }
}
