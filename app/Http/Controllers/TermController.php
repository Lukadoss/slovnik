<?php

namespace App\Http\Controllers;

use App\Meaning;
use App\Noun;
use App\Part_of_speech;
use App\Term;
use App\Verb;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addTerm(){
        $this->validate(request(), [
            'term' => 'required',
            'pronunciation' => 'required',
            'meaning' => 'required',
            'district' => 'required',
            'pos' => 'required'
        ]);

        $pos = Part_of_speech::create([
            'part_of_speech' => request('pos')
        ]);

        if(request('pos') === 'Podstatné jméno'){
            Noun::create([
                'noun_gender' => request('noun_gender'),
                'noun_sufix' => request('noun_sufix'),
                'part_of_speech_id' => $pos->id
            ]);
        }elseif (request('pos') === 'Sloveso') {
            Verb::create([
                'verb_aspect' => request('verb_aspect'),
                'verb_valence' => request('verb_valence'),
                'part_of_speech_id' => $pos->id
            ]);
        }


        $term = Term::create([
            'term' => request('term'),
            'pronunciation' => request('pronunciation'),
            'origin' => request('origin'),
            'part_of_speech_id' => $pos->id
        ]);

        Meaning::create([
            'meaning' => request('meaning'),
            'symptom' => request('symptom'),
            'context' => request('context'),
            'exemplification' => request('exemplification'),
            'examples' => request('example'),
            'synonym' => request('synonym'),
            'thesaurus' => request('thesaurus'),
            'audio_path' => request('fileUp'),
            'term_id' => $term->id,
            'user_id' => auth()->user()->id,
            'district_id' => request('district')
        ]);

        return redirect()->back()->with('success', 'Heslo úspěšně přidáno.');

    }


}
