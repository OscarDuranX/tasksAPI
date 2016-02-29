<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 11/01/16
 * Time: 18:26
 */

namespace App\Transformers;


class TagTransformer extends Transformer
{

    public function transform($item)
    {
        return [
            'title' => $item['name'],
            //'Done' => (boolean)$item['onoff']
        ];
    }

}