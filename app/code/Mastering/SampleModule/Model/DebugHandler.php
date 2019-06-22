<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Mastering\SampleModule\Model;

use Magento\Framework\Logger\Handler\Base;
use Monolog\Logger;

class DebugHandler extends Base
{
    /**
     * @var string
     */
    protected $fileName = '/var/log/debug_custom.log';

    /**
     * @var int
     */
    protected $loggerType = Logger::DEBUG;
}
