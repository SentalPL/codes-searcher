<?php
namespace App\Http\Controllers\api;

use App\Service\CodesService;

use Illuminate\Http\Request;

class SearchController extends \Controller{

    private $codes;

    public function __construct(CodesService $codes){
        $this->codes = $codes;
    }

    public function searchCodes(Request $request){

        $codes = $this->codes->searchByRequest( $request );

        return response()->json($codes, 200);
    }
}