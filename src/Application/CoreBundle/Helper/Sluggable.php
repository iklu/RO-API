<?php
namespace Application\CoreBundle\Helper;


class Sluggable
{
    const SLUG_DELIMITER = '-';
    
    public static function makeSlug($value)
    {
        $ascii = iconv('UTF-8', 'ASCII//TRANSLIT', $value);
        $slug  = strtolower(trim(preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $ascii), self::SLUG_DELIMITER));
        $slug  = preg_replace("/[\/_|+ -]+/", self::SLUG_DELIMITER, $slug);
        
        return $slug;
    }
}
