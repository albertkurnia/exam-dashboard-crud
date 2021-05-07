<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use DB;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Question::all()->sortBy('question_no');

        return view('questions.index', ['questions' => $questions]);
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store()
    {
        $answers = array();
        $idx = 0;

        request()->validate([
            'question_no' => 'required',
            'question' => 'required',
            'status' => 'required',
            'first_answer' => 'required',
            'second_answer' => 'required',
            'third_answer' => 'required',
            'fourth_answer' => 'required',
            'true_answer' => 'required'
        ]);

        // store to array
        array_push($answers, request('first_answer'));
        array_push($answers, request('second_answer'));
        array_push($answers, request('third_answer'));
        array_push($answers, request('fourth_answer'));

        if (request('true_answer') == "1") {
            $idx = 0;
        } elseif (request('true_answer') == "2") {
            $idx = 1;
        } elseif (request('true_answer') == "3") {
            $idx = 2;
        } else {
            $idx = 3;
        }

        $question_id = Question::create([
            'question_no' => request('question_no'),
            'question' => request('question'),
            'status' => request('status')
        ])->id;

        $answers = array_values($answers);
        $true_answer = "false";
        for ($x=0; $x<4; $x++) {
            if ($x == $idx) {
                $true_answer = "true";
            } else {
                $true_answer = "false";
            }
            Answer::create([
                'question_id' => $question_id,
                'answer' => $answers[$x],
                'true_answer' => $true_answer
            ]);
        }

        return redirect('/questions');
    }

    public function edit(Question $question)
    {
        $answers = Answer::select('answer', 'true_answer')->where('question_id', '=', $question->id)->get();

        $true_answer = "";
        if (count($answers) == 0) {
            $first_answer = "";
            $second_answer = "";
            $third_answer = "";
            $fourth_answer = "";
        } else {
            $first_answer = $answers[0]->answer ?? "";
            $second_answer = $answers[1]->answer ?? "";
            $third_answer = $answers[2]->answer ?? "";
            $fourth_answer = $answers[3]->answer ?? "";

            for ($x=0; $x<4; $x++) {
                if ($answers[$x]->true_answer=="true") {
                    $true_answer = $x+1;
                }
            }
        }

        return view('questions.edit', ['question' => $question, 
        'first_answer' => $first_answer, 
        'second_answer' => $second_answer, 
        'third_answer' => $third_answer,
        'fourth_answer' => $fourth_answer,
        'true_answer' => $true_answer
        ]);
    }

    public function update(Question $question)
    {

        $answers = array();
        $idx = 0;

        request()->validate([
            'question_no' => 'required',
            'question' => 'required',
            'status' => 'required',
            'first_answer' => 'required',
            'second_answer' => 'required',
            'third_answer' => 'required',
            'fourth_answer' => 'required',
            'true_answer' => 'required'
        ]);

        array_push($answers, request('first_answer'));
        array_push($answers, request('second_answer'));
        array_push($answers, request('third_answer'));
        array_push($answers, request('fourth_answer'));

        if (request('true_answer') == "1") {
            $idx = 0;
        } elseif (request('true_answer') == "2") {
            $idx = 1;
        } elseif (request('true_answer') == "3") {
            $idx = 2;
        } else {
            $idx = 3;
        }

        $question->update([
            'question_no' => request('question_no'),
            'question' => request('question'),
            'status' => request('status')
        ]);

        $answers = array_values($answers);
        $true_answer = "false";
        for ($x=0; $x<4; $x++) {
            if ($x == $idx) {
                $true_answer = "true";
            } else {
                $true_answer = "false";
            }
            
            DB::table('answers')->where('question_id', '=', $question->id)->update([
                'question_id' => $question->id,
                'answer' => $answers[$x],
                'true_answer' => $true_answer
            ]);
        }

        return redirect('/questions');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        DB::table('answers')->where('question_id', '=', $question->id)->delete();

        return redirect('/questions');
    }
}
