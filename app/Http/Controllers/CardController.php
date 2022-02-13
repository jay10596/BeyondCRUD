<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Http\Resources\Card as CardResource;
use App\Http\Resources\CardCollection;
use App\Http\Requests\CardRequest;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::all();

        return new CardCollection($cards);
    }

    public function create()
    {
        // As we are using Vue for frontend, no need of returning the view to create-card the form 
    }

    public function store(CardRequest $request)
    {
        /*  Different ways to validate
            1)
                $this->validate($request, [
                    'name' => 'required|max:255',
                    'price' => 'required|numeric',
                    'manufacturer' =>'exists:manufacturers,id'
                ]);
            2)
                $data = request()->validate([
                    'body' => 'required'
                ]);
            3)
                store(PostRequest $request) {
                }

            Different ways to store data
            1)
                $product = Auth::user()->products()->create($request->all());
            2)
                $product = Product::create([
                    'name' => $request->name,
                    'price' => $request->price,
                    'user_id' => Auth::user()->id
                ]);
            3)
                Product::create($request->all());
            4)
                $product = new Product();
                $product->name = $request->name;
                $product->price = $request->price;
                $product->user_id = Auth::id();
                $product->save();
        */

        $card = Card::create([
            'number' => Card::set_number_format($request->number),
            'cvv' => $request->cvv,
            'type' => Card::check_card_type($request->number[0]),
            'owner' => $request->owner,
            'expiration_date' => $request->expiration_date,
            'is_valid' => Card::is_valid($request->number)
        ]);

        return response($card, 201);
    }

    public function show(Card $card)
    {
        return new CardResource($card);
    }

    public function edit(Card $card)
    {
        // As we are using Vue for frontend, no need of returning the view to edit-card the form 
    }

    public function update(CardRequest $request, Card $card)
    {
        $card->update([
            'number' => $card->set_number_format($request->number),
            'cvv' => $request->cvv,
            'type' => $card->check_card_type($request->number[0]),
            'owner' => $request->owner,
            'expiration_date' => $request->expiration_date,
            'is_valid' => $card->is_valid($request->number)
        ]);

		return response($card, 202);
    }

    public function destroy(Card $card)
    {
        $card->delete();

		return response('Deleted', 204);
    }

    public function filter($filter)
    {
        $filtered_cards = Card::fetch_filtered_cards($filter);

        return new CardCollection($filtered_cards);
    }
}
