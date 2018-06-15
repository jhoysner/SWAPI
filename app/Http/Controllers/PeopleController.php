<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PeopleController extends Controller
{
    
    public function index(Request $request){
    	

    	if ($request->ordenar) {

    		$client = new Client();

			$response = $client->request('GET', 'https://swapi.co/api/people/?page='.$request->uri_sort);

			$respuesta =  $response->getBody()->getContents();
    		
	    	$peoples = json_decode($respuesta, true);

		    $collection = collect($peoples['results']);
		    
		    $sorted = $collection->sortBy('species');
		    
		    $sorts = $sorted->values()->all();  
		   
		    return view('people.index', compact('peoples', 'sorts'));
    	}

    	if ($request->url) {

    		$client = new Client();

			$response = $client->request('GET', $request->url);
    	}

    	else{

			$client = new Client([
			    // Base URI is used with relative requests
			    'base_uri' => 'https://swapi.co/api/',
			    // You can set any number of default request options.
			    'timeout'  => 4.0,
			]);
	
			$response = $client->request('GET', 'people');
    	}

		$respuesta =  $response->getBody()->getContents();

	    $peoples = json_decode($respuesta, true);

		return view('people.index', compact('peoples'));
    }

 
    public function find($id){

		$client = new Client([
		    // Base URI is used with relative requests
		    'base_uri' => 'https://swapi.co/api/',
		    // You can set any number of default request options.
		    'timeout'  => 4.0,
		]);

		$response = $client->request('GET', 'people/'.$id);

		$respuesta =  $response->getBody()->getContents();

	    $people = json_decode($respuesta, true);

	    return view('people.show', compact('people'));

    }

}
