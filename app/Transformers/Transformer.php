<?php

/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 11/01/16
 * Time: 18:20
 */

namespace App\Transformers;

abstract class Transformer
{

    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);

    }

    public abstract function transform($item);

}