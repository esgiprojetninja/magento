<?php
namespace Esgi\Ninja\Api\Data;

/**
 * Esgi ninja interface.
 * @api
 */
interface NinjaInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID            = 'entity_id';
    const TITLE         = 'title';
    const TYPE          = 'type';
    const LOCATION      = 'location';
    const DATE          = 'date';
    const IS_ACTIVE     = 'is_active';
    const DESCRIPTION   = 'description';
    const DEPARTMENT_ID = 'ninjastore_id';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get title
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Get type
     *
     * @return string|null
     */
    public function getType();

    /**
     * Get location
     *
     * @return string|null
     */
    public function getLocation();

    /**
     * Get date
     *
     * @return string|null
     */
    public function getDate();

    /**
     * Is active
     *
     * @return bool|null
     */
    public function isActive();

    /**
     * Get description
     *
     * @return string|null
     */
    public function getDescription();

    /**
     * Get ninjastore id
     *
     * @return int|null
     */
    public function getNinjaStoreId();

    /**
     * Set ID
     *
     * @param int $id
     * @return NinjaInterface
     */
    public function setId($id);

    /**
     * Set title
     *
     * @param string $title
     * @return NinjaInterface
     */
    public function setTitle($title);

    /**
     * Set type
     *
     * @param string $type
     * @return NinjaInterface
     */
    public function setType($type);

    /**
     * Set location
     *
     * @param string $location
     * @return NinjaInterface
     */
    public function setLocation($location);

    /**
     * Set date
     *
     * @param string $date
     * @return NinjaInterface
     */
    public function setDate($date);

    /**
     * Set is active
     *
     * @param bool|int $isActive
     * @return NinjaInterface
     */
    public function setIsActive($isActive);

    /**
     * Set description
     *
     * @param string $description
     * @return NinjaInterface
     */
    public function setDescription($description);

    /**
     * Set ninjastore id
     *
     * @param string $ninjastoreId
     * @return NinjaInterface
     */
    public function setNinjaStoreId($ninjastoreId);
}
