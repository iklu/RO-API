<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 08.12.2016
 * Time: 11:36
 */

namespace Application\AdminBundle\Util;


class Canonicalizer implements CanonicalizerInterface
{
    /**
     * {@inheritdoc}
     */
    public function canonicalize($string)
    {
        if (null === $string) {
            return null;
        }
        $encoding = mb_detect_encoding($string);
        $result = $encoding
            ? mb_convert_case($string, MB_CASE_LOWER, $encoding)
            : mb_convert_case($string, MB_CASE_LOWER);
        return $result;
    }
}