<?php
namespace App\Service;

use App\Models\Code;

use Illuminate\Http\Request;

class CodesService{

    private $directSearch = [
        'code'
    ];

    private $likeSearch = [
        'name'
    ];

    private $phraseSearchable = [
        'description'
    ];

    public function searchByRequest( Request $request ){
        $phrase = strtolower($request->phrase);
        $filters = array_filter( $request->all() );
 
        return Code::where(function($query) use($filters){
                
                foreach( $filters as $field => $value){
                    
                    if( $this->isDirectSearch($field) )
                        $query = $query->where($field, $value);
                    elseif( $this->isLikeSearch($field) )
                        $query = $query->where($field, 'LIKE', '%'.$value.'%');
                }

                return $query;
            })
            ->when($phrase, function($query) use($phrase){
                if( in_array($phrase, ['aktywny', 'nieaktywny']) )
                    $query = $query->where('active', $phrase == 'aktywny');

                return $query->orWhere(function($query) use($phrase){
                    foreach($this->phraseSearchable as $field)
                        return $query->orWhere($field, 'LIKE', '%'.$phrase.'%');
                });
            })
            ->WhereDateBetween('created_at', $request->date_from, $request->date_to)
            ->get();
    }

    private function isDirectSearch( $field ){
        return in_array($field, $this->directSearch);
    }

    private function isLikeSearch( $field ){
        return in_array($field, $this->likeSearch);
    }
}