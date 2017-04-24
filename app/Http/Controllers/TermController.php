<?php

namespace App\Http\Controllers;

use App\District;
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
        $this->middleware('auth', ['except' => 'showTerms']);
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

    public function checkTerms(){
        $terms = Term::where('accepted', '0')->get();
        foreach ($terms as $key => $term){
            if(!auth()->user()->isTermViable($term->meaning->first()->district->region)){
                unset($terms[$key]);
            }
        }

        return view('term.termCheck', compact('terms'));
    }

    public function showEdit($id){
        $term = Term::findOrFail($id);
        $towns = District::all();
        $meaning = $term->meaning->first();
        $pos = Part_of_speech::find($term->part_of_speech_id);
        $noun = Noun::where('part_of_speech_id', $pos->id)->first();
        $verb = Verb::where('part_of_speech_id', $pos->id)->first();

        if(!auth()->user()->isTermViable($meaning->district->region))
            return redirect()->to('/list')->with('info', 'K takové operaci nemáte přístup');
        return view('term.editTerm', compact('term', 'towns', 'meaning', 'pos', 'noun', 'verb'));
    }

    public function deleteTerm($id){
        if(!auth()->user()->isTermViable(Meaning::where('term_id', $id)->first()->district->region))
            return redirect()->to('/list')->with('info', 'K takové operaci nemáte přístup');

        $term = Term::find($id);
        $pos = Part_of_speech::find($term->part_of_speech_id);

        if($noun = Noun::where('part_of_speech_id', $pos->id)->first()){
            Noun::destroy($noun->id);
        }elseif ($verb = Verb::where('part_of_speech_id', $pos->id)->first()) {
            Verb::destroy($verb->id);
        }
        Part_of_speech::destroy($pos->id);
        Meaning::where('term_id', $id)->first()->delete();
        Term::destroy($id);

        return redirect()->to('/list')->with('info', 'Heslo úspěšně smazáno');
    }

    public function acceptTerm($id){
        if(!auth()->user()->isTermViable(Meaning::where('term_id', $id)->first()->district->region))
            return redirect()->to('/term/waiting')->with('info', 'K takové operaci nemáte přístup');

        $term = Term::find($id);
        $term->accepted = 1;
        $term->save();

        return redirect()->back()->with('success', 'Heslo bylo schváleno a publikováno.');
    }

    public function editTerm($termId){
        if(!auth()->user()->isTermViable(Meaning::where('term_id', $termId)->first()->district->region))
            return redirect()->to('/list')->with('info', 'K takové operaci nemáte přístup');

        $this->validate(request(), [
            'term' => 'required',
            'pronunciation' => 'required',
            'meaning' => 'required',
            'district' => 'required',
            'pos' => 'required'
        ]);

        $term = Term::find($termId);
        $pos = Part_of_speech::find($term->part_of_speech_id);

        if($noun = Noun::where('part_of_speech_id', $pos->id)->first()){
            Noun::destroy($noun->id);
        }elseif ($verb = Verb::where('part_of_speech_id', $pos->id)->first()) {
            Verb::destroy($verb->id);
        }

        $pos->part_of_speech = request('pos');
        $pos->save();

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

        $term->term = request('term');
        $term->pronunciation = request('pronunciation');
        $term->origin = request('origin');
        $term->part_of_speech_id = $pos->id;
        $term->save();

        $meaning = Meaning::where('term_id', $termId)->first();
        $meaning->meaning = request('meaning');
        $meaning->symptom = request('symptom');
        $meaning->context = request('context');
        $meaning->exemplification = request('exemplification');
        $meaning->examples = request('example');
        $meaning->synonym = request('synonym');
        $meaning->thesaurus = request('thesaurus');
        $meaning->audio_path = request('fileUp');
        $meaning->term_id = $term->id;
        $meaning->user_id = auth()->user()->id;
        $meaning->district_id = request('district');
        $meaning->save();

        return redirect('/list')->with('success', 'Heslo úspěšně upraveno.');
    }

    public function getNonCheckTermNum(){
        $terms = Term::where('accepted', '0')->get();
        foreach ($terms as $key => $term){
            if(!auth()->user()->isTermViable($term->meaning->first()->district->region)){
                unset($terms[$key]);
            }
        }

        return count($terms);
    }

}
