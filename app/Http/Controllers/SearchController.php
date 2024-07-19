<?php

// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\DB;

// use Illuminate\Http\Request;

// class SearchController extends Controller
// {
//     public function search(Request $request)
//     {
       
//         $query = $request->input('query') ?? null;

//         $results = $this->searchInTable($query);
//         // dd( $results);

//         return view('results', compact('results'));
//     }

//     private function searchInTable($type, $query)
//     {
//         $tables = [
//             'db_products' => ['ProductName', 'Description'],
//             // Add more tables and searchable columns as needed
//         ];

//         if (!array_key_exists($tables)) {
//             return [];
//         }

//         $columns = $tables[$type];
//         $results = DB::table($type);

//         foreach ($columns as $column) {
//             $results->orWhere($column, 'like', '%' . $query . '%');
//         }

//         return $results->get();
//     }
// }
