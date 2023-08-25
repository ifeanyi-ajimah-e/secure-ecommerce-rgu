<?php 

namespace App\Utils;

final class DealStatus{

    public const NEW_ARRIVAL = 'new-arrivals';
    public const HOT_DEALS = 'hot-sales';
    public const REGULAR = 'regular';
    
    
    public const DEAL_STATUS_LIST = [
        self::NEW_ARRIVAL,
        self::HOT_DEALS,
        self::REGULAR,
    ];
    
    }



