<?php

namespace Mastering\SampleModule\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class UpgradeData implements UpgradeDataInterface
{

    /**
     * Upgrades data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
       $setup->startSetup();
       if(version_compare($context->getVersion() , '1.0.1' , '<') )
       {

           $setup->getConnection()->update(

               $setup->getTable('mastering_sample_item'),
               [
                   'description'=> 'Some Text '
               ],
               $setup->getConnection()->quoteInto('id = ?' , 1)
           );

       }

        if(version_compare($context->getVersion() , '1.1.0' , '<') )
        {
            $setup->getConnection()->insert(



                $setup->getTable('mastering_item_images'),
                [

                    'item_id'=> 1,
                    'path'=>'pub/media/asma/image_01.jpg'
                ]
            );

            $setup->getConnection()->insert(

                $setup->getTable('mastering_item_images'),
                [
                    'item_id'=> 1,
                    'path'=>'pub/media/asma/image_02.jpg'
                ]

            );

        }

       $setup->endSetup();
    }
}