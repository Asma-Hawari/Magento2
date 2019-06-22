<?php
namespace Mastering\SampleModule\Console\Command;

use Magento\Framework\Console\Cli;
use Magento\Framework\Event\ManagerInterface;
use Mastering\SampleModule\Model\ItemFactory;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddItem extends Command
{
    const INPUT_KEY_NAME='name';
    const INPUT_KEY_DESCRIPTION='description';
    //private $eventmanager;

    private $itemFactory;

    public function __construct(ItemFactory $itemFactory
        //, ManagerInterface $eventmanager)
    )
    {
        $this->itemFactory  = $itemFactory;
       // $this->eventmanager = $eventmanager;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('Mastering:item:add')
        ->addArgument(self::INPUT_KEY_NAME, InputArgument::REQUIRED,
            'ItemName')
        ->addArgument(
            self::INPUT_KEY_DESCRIPTION,
                InputArgument::OPTIONAL,
            'Item Description'
        );

        parent::configure();
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /*$output->writeln(get_class($this->itemFactory));
        die();*/
        $item = $this->itemFactory->create();
        $item->setName($input->getArgument(Self::INPUT_KEY_NAME));
        $item->setDescription($input->getArgument(self::INPUT_KEY_DESCRIPTION));
        $item->setIsObjectNew(true);
        $item->save();
        //$this->eventmanager->dispatch('mastering_command' , ['object' => $item]);
        return CLi::RETURN_SUCCESS;
    }
}
