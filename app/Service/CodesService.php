<?php
namespace App\Service;

use App\Models\Code;

use Illuminate\Http\Request;

class CodesService{

    public function searchByRequest( Request $request ){
 
        return Code::where('name', 'LIKE', '%'.$request->name.'%')
            ->when($code = $request->code, function($query) use($code){
                return $query->where('code', $code);
            })
            ->WhereDateBetween('created_at', $request->date_from, $request->date_to)
            ->get();
    }
}