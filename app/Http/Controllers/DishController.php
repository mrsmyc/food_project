<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Product;

class DishController extends Controller
{
    
    public function index() {
        $dishes = Dish::orderBy('name')->paginate(16);
        $totalWeight = 0;
        $costPrice = 0;
        $totalCalorieContent = 0;
        $totalProtein = 0;
        $totalFat = 0;
        $totalCarb = 0;
        foreach($dishes as $dish) {
            foreach($dish->products as $product) {
                $costPrice = $costPrice + $product->price;
                $totalCalorieContent = $totalCalorieContent + $product->calorie_content;
                $totalProtein = $totalProtein + $product->protein;
                $totalFat = $totalFat + $product->fat;
                $totalCarb = $totalCarb + $product->carb;
                $totalWeight = $totalWeight + $product->pivot->weight;
            }
            $dish['totalWeight'] = $totalWeight;
            $dish['costPrice'] = $costPrice;
            $dish['totalProtein'] = $totalProtein;
            $dish['totalFat'] = $totalFat;
            $dish['totalCarb'] = $totalCarb;
            $dish['totalCalorieContent'] = $totalCalorieContent;
        }

        return view('pages.dishes.index', [
            'dishes' => $dishes,
        ]);
    }

    public function create() {
        $products = Product::orderBy('name')->get();
        return view('pages.dishes.create', [
            'products' => $products,
        ]);
    }

    public function edit(Dish $dish) {
        $products = Product::orderBy('name')->get();
        $dishProducts = $dish->products->toArray();
        // dd($dish->photo);
        return view('pages.dishes.edit', [
            'dish' => $dish,
            'products' => $products,
            'dishProducts' => $dishProducts,
        ]);
    }

    public function update(Request $request) {
        $dish = Dish::where('id', $request->id)->first();
        $dish->name = $request->name;
        if($request->has('photo')) {
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('photos'), $photoName);
            $dish->photo = $photoName;
        }        
        $dish->weight = $request->weight;
        $dish->comment = $request->comment;
        $dish->expiration_time = $request->expiration_time;
        $dish->save();        
        $dish->products()->sync($this->mapProducts($request['products']));
        return redirect('/dishes');
    }

    public function destroy(Dish $dish) {
        $dish->delete();
        return redirect('/dishes');
    }

    public function store(Request $request) {
        $dish = new Dish();
        $dish->name = $request->name;
        $photoName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('photos'), $photoName);
        $dish->photo = $photoName;
        $dish->weight = $request->weight;
        $dish->comment = $request->comment;
        $dish->expiration_time = $request->expiration_time;
        $dish->save();        
        $dish->products()->sync($this->mapProducts($request['products']));
        return redirect('/dishes');
    }

    private function mapProducts($products) {
        return collect($products)->map(function ($i) {
            return ['weight' => $i];
        });
    }

}
