<?php

declare(strict_types = 1);

namespace Magelearn\ProductColorPicker\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;

class ColorPicker extends AbstractModifier
{
    /**
     * @param array $data
     *
     * @return array
     */
    public function modifyData(array $data): array
    {
        return $data;
    }

    /**
     * @param array $meta
     *
     * @return array
     */
    public function modifyMeta(array $meta): array
    {
        $codes = [
            'product_label_font_color'
        ];

        foreach ($codes as $code) {
            if (!isset($meta['content']['children']['container_' . $code])) {
                continue;
            }

            $meta['content']['children']['container_' . $code]['children'] = array_replace_recursive(
                $meta['content']['children']['container_' . $code]['children'],
                [
                    $code => [
                        'arguments' => [
                            'data' => [
                                'config' => [
                                    'visible' => 0,
                                ],
                            ]
                        ]
                    ]
                ]
            );
        }

        return $meta;
    }
}
