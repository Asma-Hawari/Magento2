<?php

namespace Mastering\SampleModule\Plugin;

use Magento\Checkout\Controller\Cart\Add;
use Mastering\SampleModule\Console\Command\AddItem;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class Logger {
    private  $output;

     public function beforeRun(
         AddItem $item ,
       InputInterface $input ,
        OutputInterface $output

     )
     {
         $output->writeln('BeforeExcution');

     }

    public function aroundRun(
        AddItem $command,
        \Closure $proceed,
        InputInterface $input,
        OutputInterface $output
    )
    {
        $output->writeln('around Excution before call ');
        $proceed->call($command , $input , $output);
        $output->writeln('around Excution after call');
        $this->output = $output;
    }


    public function afterRun(AddItem $item){
         $this->output->writeln('AfterExcution');

    }
}