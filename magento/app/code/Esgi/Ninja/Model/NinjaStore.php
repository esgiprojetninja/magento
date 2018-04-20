<?php
namespace Esgi\Ninja\Model;

use Esgi\Ninja\Api\Data\NinjaStoreInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

class NinjaStore extends AbstractModel implements NinjaStoreInterface, IdentityInterface
{
    /**
     * Esgi Ninja ninjastore cache tag
     */
    const CACHE_TAG = 'esgi_ninja_d';

    /**#@-*/
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'esgi_ninja';

    /**
     * Parameter name in event
     *
     * In observe method you can use $observer->getEvent()->getObject() in this case
     *
     * @var string
     */
    protected $_eventObject = 'ninjastore';

    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Esgi\Ninja\Model\ResourceModel\NinjaStore::class);
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Retrieve ninjastore id
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Retrieve ninjastore lat
     *
     * @return int
     */
    public function getLat()
    {
        return $this->getData(self::LAT);
    }

    /**
     * Retrieve ninjastore lng
     *
     * @return int
     */
    public function getLng()
    {
        return $this->getData(self::LNG);
    }

    /**
     * Retrieve ninjastore name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Retrieve ninjastore content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * Retrieve ninjastore link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->getData(self::LINK);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return NinjaStoreInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Set lat
     *
     * @param int $lat
     * @return NinjaStoreInterface
     */
    public function setLat($lat)
    {
        return $this->setData(self::LAT, $lat);
    }

    /**
     * Set lng
     *
     * @param int $lng
     * @return NinjaStoreInterface
     */
    public function setLng($lng)
    {
        return $this->setData(self::LNG, $lng);
    }

    /**
     * Set name
     *
     * @param string $name
     * @return NinjaStoreInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Set content
     *
     * @param string $content
     * @return NinjaStoreInterface
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    /**
     * Set link
     *
     * @param string $link
     * @return NinjaStoreInterface
     */
    public function setLink($link)
    {
        return $this->setData(self::LINK, $link);
    }
}
