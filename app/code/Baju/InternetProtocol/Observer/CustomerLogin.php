<?php
/**
 * Class CustomerLogin
 */

namespace Baju\InternetProtocol\Observer;

use Magento\Framework\Event\ObserverInterface;
use Baju\InternetProtocol\Api\Ip;

class CustomerLogin implements ObserverInterface
{
	/**
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    private $dataObjectHelper;

    /**
     * @var \Baju\InternetProtocol\Model\DataIpFactory
     */
    private $ipFactory;

    /**
     *
     * @var \Baju\InternetProtocol\Model\ResourceModel\IpRepository
     */
    private $ipRepository;

    /**
     * @var \Magento\Framework\HTTP\PhpEnvironment\RemoteAddressFactory $remoteAddressFactory
     */
    private $remoteAddressFactory;

	/**
     * cunstruct
	 * @param \Magento\Framework\HTTP\PhpEnvironment\RemoteAddressFactory $remoteAddressFactory
     * @param \Baju\InternetProtocol\Api\IpRepositoryInterface $ipRepository,
     * @param \Baju\InternetProtocol\Model\IpFactory $ipFactory,
     * @param \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
	 */
	public function __construct(
        \Magento\Framework\HTTP\PhpEnvironment\RemoteAddressFactory $remoteAddressFactory,
        \Baju\InternetProtocol\Api\IpRepositoryInterface $ipRepository,
        \Baju\InternetProtocol\Model\IpFactory $ipFactory,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
    ) {
        $this->ipFactory = $ipFactory;
        $this->ipRepository = $ipRepository;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->remoteAddressFactory = $remoteAddressFactory;
    }

	/**
	 * Execute
	 *
	 * @param object $observer
	 * @return array
	 */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer['ip'] =  $this->getIpAddress($observer);
        $customer['email_id'] = $this->getCustomerEmail($observer);
       	$ip = $this->ipFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $ip,
            $customer,
            '\Baju\InternetProtocol\Api\Data\IpInterface'
        );

        try {
            $this->ipRepository->save($ip);
        } catch (\Magento\Framework\Exception\AlreadyExistsException $e) {
        	echo $e->getMessage();
        } catch (\Exception $e) {
        	echo $e->getMessage();
        }
    }

    /**
     * Get customer ip address
     *
     * @param object $observer
     * @return string
     */
    private function getIpAddress($observer)
	{
		$ip = $this->remoteAddressFactory->create()->getRemoteAddress();
   		return $ip;
	}

	/**
	 * Get customer email
	 *
	 * @param object $observer
	 * @return string
	 */
	private function getCustomerEmail($observer)
	{
		$customer = $observer->getEvent()->getCustomer();
        $email = $customer->getEmail();
        return $email;
	}
}
