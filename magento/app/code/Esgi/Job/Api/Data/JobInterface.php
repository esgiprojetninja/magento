<?php

namespace Tinwork\Job\Api\Data;

/**
 * Class JobInterface
 *
 * @package     Tinwork\Job\Api\Data
 * @copyright   Copyright (c) 2018 Slabprea
 */
interface JobInterface
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
    const DEPARTMENT_ID = 'department_id';
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
     * Get department id
     *
     * @return int|null
     */
    public function getDepartmentId();

    /**
     * Set ID
     *
     * @param int $id
     * @return JobInterface
     */
    public function setId($id);

    /**
     * Set title
     *
     * @param string $title
     * @return JobInterface
     */
    public function setTitle($title);

    /**
     * Set type
     *
     * @param string $type
     * @return JobInterface
     */
    public function setType($type);

    /**
     * Set location
     *
     * @param string $location
     * @return JobInterface
     */
    public function setLocation($location);

    /**
     * Set date
     *
     * @param string $date
     * @return JobInterface
     */
    public function setDate($date);

    /**
     * Set is active
     *
     * @param bool|int $isActive
     * @return JobInterface
     */
    public function setIsActive($isActive);

    /**
     * Set description
     *
     * @param string $description
     * @return JobInterface
     */
    public function setDescription($description);

    /**
     * Set department id
     *
     * @param string $departmentId
     * @return JobInterface
     */
    public function setDepartmentId($departmentId);
}