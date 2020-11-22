<?php

namespace Smile\Ratings\Ui\DataProvider\Form;

use Magento\Framework\App\RequestInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Review\Model\ReviewFactory as CustomerRatingsReviewFactory;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var array
     */
    protected $_loadedData = [];

    /**
     * @var CustomerRatingsReviewFactory
     */
    protected $customerRatingsReviewFactory;

    /**
     * @var RequestInterface
     */
    protected $request;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CustomerRatingsReviewFactory $customerRatingsReviewFactory,
        RequestInterface $request,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $customerRatingsReviewFactory->create();
        $this->request = $request;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (!empty($this->_loadedData)) {
            return $this->_loadedData;
        }

        $this->collection->addFieldToFilter($this->getPrimaryFieldName(), $this->request->getParam($this->getRequestFieldName()));

        foreach ($this->getCollection() as $item) {
            $this->_loadedData[$item->getVoteId()] = $item->getData();
        }

        return $this->_loadedData;
    }
}
