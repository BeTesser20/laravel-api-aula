<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInterestRequest;
use App\Http\Requests\StorePeopleRequest;
use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    
    public function list(Request $request) {
        return People::with('interests')->paginate(15);
    }

    public function storeInterest(StoreInterestRequest $interest) {
        return $interest;
    }

    public function store(StorePeopleRequest $people) {
        // return $people;
        $newPeople = People::create($people->all());
        
        if($newPeople) {
            return response()->json([
                'message' => 'Nova pessoa criada com sucesso.',
                'people' => $newPeople,
            ]);
        } else {
            return response()->json([
                'message' => 'Deu ruim. Te vira aí pra descobrir o que aconteceu.'
            ], 422);
        }
    }

}