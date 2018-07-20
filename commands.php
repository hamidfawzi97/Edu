
<?php

php artisan make:model model_name
	// The easiest way to create a model instance

php artisan make:model Flight -m
	// to generate a database migration when it generate the model










##### Retrieving Models
use App\Flight;

//// using query builder

$flights = App\Flight::all();
	// return all of the results in the model's table


$flights = App\Flight::where('active', 1)
               ->orderBy('name', 'desc')
               ->take(10)
               ->get();
    // to add constraints to queries, and then use the "get" method to retrieve the results



// using Collections methods...
$flights = $flights->reject(function ($flight) {
    return $flight->cancelled;
});










##### Retrieving Single Models / Aggregates

// Retrieve a model by its primary key...
$flight = App\Flight::find(1);


// return a collection of the matching records to thus primary keys...
$flights = App\Flight::find([1, 2, 3]);


// Retrieve the first model matching the query constraints...
$flight = App\Flight::where('active', 1)->first();


// aggregate methods (count, sum, max)
$count = App\Flight::where('active', 1)->count();

$max = App\Flight::where('active', 1)->max('price');










##### Inserting & Updating Models

namespace App\Http\Controllers;
use App\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlightController extends Controller
{
	// Inserting
    public function store(Request $request)
    {
        // Validate the request...

        $flight = new Flight;

        $flight->name = $request->name;

        $flight->save();
    }

	// Updating
	public function update(Request $request)
    {
		$flight = App\Flight::find(1);

		$flight->name = 'New Flight Name';

		$flight->save();
	}


	// Updating Mass Updates
	public function massUpdate(Request $request)
    {
		App\Flight::where('active', 1)
          			->where('destination', 'San Diego')
         			->update(['delayed' => 1]);
	}    

	// Update or Create Mass Updates
	public function UpdateOrCreate(Request $request)
    {
		// If there's a flight from Oakland to San Diego, set the price to $99.
		// If no matching model exists, create one.
		$flight = App\Flight::updateOrCreate(
		    ['departure' => 'Oakland', 'destination' => 'San Diego'],
		    ['price' => 99]
		); 			
}
