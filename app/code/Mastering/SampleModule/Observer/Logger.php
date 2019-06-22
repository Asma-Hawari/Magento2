<?php

namespace Mastering\SampleModule\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class Logger implements ObserverInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger ;

    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
      $this->logger->debug('from observer ' .$observer->getEvent()->getObject()->getDescription());
    }
}