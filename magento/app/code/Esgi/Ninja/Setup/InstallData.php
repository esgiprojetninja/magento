<?php

/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Esgi\Ninja\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * Install messages
         */
        $data = [
            [
                'name'    => 'Poulay',
                'content' => 'Sometime my sister, she show her vazhïn to my brother Bilo and say "You will never get this, you will never get it, la la la la la la!" He behind his cage. He cries, he cries and everybody laughs. She goes "You never get this." But one time he break cage and he "get this" and then we all laugh. High five!',
                'link' => 'http://adrastia.org/',
                'lat' => -100,
                'lng' => 50
            ],
            [
                'name'    => 'Children',
                'content' => 'Kazakhstan is the greatest country in the world. All other countries are run by little girls. Kazakhstan is number-one exporter of potassium. Other Central Asian countries have inferior potassium. Kazakhstan is the greatest country in the world. All other countries is the home of the gays...',
                'link' => 'http://www.perdu.com/',
                'lat' => 100,
                'lng' => 150
            ],
            [
                'name'    => 'Yeah',
                'content' => 'My name a Borat. I come from Kazakhstan. Can I say a first, we support your war of terror! May we show our support to our boys in Iraq! May US and A kill every single terrorist! May your George Bush drink the blood of every single man, women, and child of Iraq! May you destroy their country so that for next thousand years not even a single lizard will survive in their desert!',
                'link' => 'http://adrastia.org/',
                'lat' => 12,
                'lng' => 78
            ]
        ];
        foreach ($data as $bind) {
            $setup->getConnection()
            ->insertForce($setup->getTable('esgi_ninja_ninjastore'), $bind);
        }
    }
}