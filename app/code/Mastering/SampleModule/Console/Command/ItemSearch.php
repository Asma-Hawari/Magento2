<?php
namespace Mastering\SampleModule\Console\Command;

use Magento\Framework\Console\Cli;
use Mastering\SampleModule\Model\ItemFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Mastering\SampleModule\Model\ItemRepository;

class ItemSearch extends Command
{
    const INPUT_KEY_FIELD='field';
    const INPUT_KEY_VALUE='value';
    const INPUT_KEY_CONDITION='Condition Type';

    private $itemRepository ;






    public function __construct(
        ItemRepository $itemRepository

        )
    {
        $this->itemRepository = $itemRepository;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setName(
            'Mastering:item:search')
            ->addArgument(self::INPUT_KEY_FIELD,
                InputArgument::REQUIRED,
                'search field ')
            ->addArgument(
                self::INPUT_KEY_VALUE,
                InputArgument::REQUIRED,
                'search value'
            )->addArgument(
                self::INPUT_KEY_CONDITION,
                InputArgument::REQUIRED ,
                'Search Condition type');

        parent::configure();
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $searchCriteriaBuilder = $objectManager->
        create('Magento\Framework\Api\SearchCriteriaBuilder');

        $searchCriteria = $searchCriteriaBuilder->addFilter(
            $input->getArgument(self::INPUT_KEY_FIELD),
            $input->getArgument(self::INPUT_KEY_VALUE),
           $input->getArgument(self::INPUT_KEY_CONDITION)
        )->create();
        $items = $this->itemRepository->getList($searchCriteria);


        foreach ($items->getItems() as $value) {
            print_r($value->toString());
        }
        return Cli::RETURN_SUCCESS;
    }
}
