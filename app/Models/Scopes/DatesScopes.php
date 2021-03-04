<?php
namespace App\Models\Scopes;

trait DatesScopes{

    public function scopeWhereDateBetween( $query, $field, $dateFrom = null, $dateTo = null){
        if( !$dateFrom && !$dateTo )
            return $query;
        
        if( !$dateTo )
            return $query->whereDate($field, '>=', $dateFrom);

        if( !$dateFrom )
            return $query->whereDate($field, '<=', $dateTo);

        return $query->whereBetween($field, [$dateFrom, $dateTo]);
    }
}