<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Score;

class MemoryGameController extends Controller
{
    public function index(Request $request)
    {
        $difficulty = $request->input('difficulty', 'easy');
        $cards = Card::all()->shuffle();
        $selectedCards = collect();

        if ($difficulty === 'easy') {
            $uniqueCards = $cards->unique()->take(4); 
            foreach ($uniqueCards as $card) {
                $selectedCards->push($card); 
                $selectedCards->push($card); 
            }
            $cards = $selectedCards->shuffle(); 
        } else if ($difficulty === 'medium') {
            $uniqueCards = $cards->unique()->take(8); 
            foreach ($uniqueCards as $card) {
                $selectedCards->push($card); 
                $selectedCards->push($card); 
            }
            $cards = $selectedCards->shuffle(); 
        }

        return view('memory_game.index', compact('cards', 'difficulty'));
    }

    public function saveScore(Request $request)
    {
        try {
            $lastScore = Score::orderBy('id', 'desc')->first();
            $userId = $lastScore ? $lastScore->user_id + 1 : 1;

            $score = new Score();
            $score->player_name = $request->input('playerName');
            $score->user_id = $userId;
            $score->score = $request->input('score');
            $score->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function showScores()
    {
        $scores = Score::orderBy('score', 'asc')->get();
        return view('memory_game.scores', compact('scores'));
    }
}
