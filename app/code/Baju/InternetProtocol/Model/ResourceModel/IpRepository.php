<?php
namespace Baju\InternetProtocol\Model\ResourceModel;

use Baju\InternetProtocol\Api\Data;
use Baju\InternetProtocol\Api\IpRepositoryInterface;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Api\DataObjectHelper;
use Baju\InternetProtocol\Model\ResourceModel\Ip\CollectionFactory as IpCollectionFactory;
use Magento\Framework\Api\SortOrder;
use Baju\InternetProtocol\Model\ResourceModel\Ip as IpResource;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Ip repository.
 */
class IpRepository implements IpRepositoryInterface
{
    /**
     * @var Data\IpSearchResultInterfaceFactory
     */
    protected $searchResultFactory;
    
    /**
     * @var DataObjectProcessor
     */
    protected $dataObjectProcessor;
    
    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;
    
    /**
     * @var Data\IpInterfaceFactory
     */
    protected $dataIpFactory;
    
    /**
     * @var IpCollectionFactory
     */
    protected $ipCollectionFactory;

    /**
     * @var IpResource
     */
    protected $resourceModel;

    /**
     * @param Data\IpSearchResultInterfaceFactory $searchResultFactory
     * @param DataObjectProcessor $dataObjectProcessor
     * @param DataObjectHelper $dataObjectHelper
     * @param Data\IpInterfaceFactory $dataIpFactory
     * @param IpCollectionFactory $collectionFactory
     */
    public function __construct(
        DataObjectProcessor $dataObjectProcessor,
        DataObjectHelper $dataObjectHelper,
        Data\IpInterfaceFactory $dataIpFactory,
        IpCollectionFactory $collectionFactory,
        IpResource $resourceModel
    ) {
        //$this->searchResultFactory = $searchResultFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataIpFactory = $dataIpFactory;
        $this->ipCollectionFactory = $collectionFactory;
        $this->resourceModel = $resourceModel;
    }

    /**
     * Create or update a Ip.
     *
     * @param \Baju\InternetProtocol\Api\Data\IpInterface $ip
     * @return \Baju\InternetProtocol\Api\Data\IpInterface
     * @throws \Magento\Framework\Exception\InputException If bad input is provided
     * @throws \Magento\Framework\Exception\State\InputMismatchException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Baju\InternetProtocol\Api\Data\IpInterface $ip)
    {
        try {
            $this->resourceModel->save($ip);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__("Unable to save the data"));
        }
        return $ip;
    }

    /**
     * Retrieve ip by id.
     *
     * @param string $ip
     * @return \Baju\InternetProtocol\Api\Data\IpInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($ipId)
    {
    }

    /**
     * Get Ip by ip ID.
     *
     * @param int $ipId
     * @return \Baju\InternetProtocol\Api\Data\IpInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getByIpId($ipId)
    {
        $ip = $this->dataIpFactory->create();
        $this->resourceModel->load($ip, $ipId);
        if (!$ip->getIpId()) {
            throw new NoSuchEntityException(__('Data with id %1 does not exist', $ipId));
        }
        return $ip;
    }

    /**
     * Delete Ip by ID.
     *
     * @param int $ipId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($ipId)
    {
        $address = $this->getByIpId($ipId);
        $this->resourceModel->delete($address);
        return true;
    }

    /**
     * Retrieve Ip which match a specified criteria.
     *
     * This call returns an array of objects, but detailed information about each object’s attributes might not be
     * included. See IpRepositoryInterface to determine
     * which call to use to get detailed information about all attributes for an object.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Baju\InternetProtocol\Api\Data\IpSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        
    }

    
    /**
     * Get Ip data
     *
     * @param \Baju\InternetProtocol\Model\ResourceModel\Ip\Collection $collection
     * @return array[]
     */
    private function getIpData(
        \Baju\InternetProtocol\Model\ResourceModel\Ip\Collection $collection
    ) {
        $ip = [];
        foreach ($collection as $ipModel) {
            $ipData = $this->dataIpFactory->create();
            $this->dataObjectHelper->populateWithArray(
                $ipData,
                $ipModel->getData(),
                'Baju\InternetProtocol\Api\Data\IpInterface'
            );
            $ip[] = $this->dataObjectProcessor->buildOutputDataArray(
                $ipData,
                'Baju\InternetProtocol\Api\Data\IpInterface'
            );
        }
        return $ip;
    }

    /**
     * Get collection with filter applyed
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return IpCollectionFactory
     */
    private function getCollectionWithFilter(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->ipCollectionFactory->create();
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        return $collection;
    }

    /**
     * Add sort order into collection
     *
     * @param IpCollectionFactory $collection
     * @param array $sortOrders
     * @return void
     */
    private function addSortOrderIntoCollection($collection, $sortOrders)
    {
        foreach ($sortOrders as $sortOrder) {
            $collection->addOrder(
                $sortOrder->getField(),
                ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
            );
        }
    }
}
