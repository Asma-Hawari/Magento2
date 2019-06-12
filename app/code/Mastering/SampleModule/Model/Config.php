<?php
/**
 * Created by PhpStorm.
 * User: asma
 * Date: 6/11/19
 * Time: 3:08 PM
 */

namespace  Mastering\SampleModule\Model;


use Magento\Framework\App\Config\ScopeConfigInterface;

class  Config
{
    const XML_PATH_ENABLED = 'matering/general/enabled';

    private $config ;

    /**
     * @return mixed
     */
    public function __construct( ScopeConfigInterface $config )
    {
        $this->config = $config ;
    }

    public function isEnabled (){
        return $this->config->getValue(self::XML_PATH_ENABLED);
    }

}