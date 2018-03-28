<?php
namespace Esgi\Job\Api\Data;

/**
 * Esgi department interface.
 * @api
 */
interface DepartmentInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID      = 'entity_id';
    const NAME    = 'name';
    const CONTENT = 'content';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Get content
     *
     * @return string|null
     */
    public function getContent();

    /**
     * Set ID
     *
     * @param int $id
     * @return DepartmentInterface
     */
    public function setId($id);

    /**
     * Set name
     *
     * @param string $name
     * @return DepartmentInterface
     */
    public function setName($name);

    /**
     * Set content
     *
     * @param string $content
     * @return DepartmentInterface
     */
    public function setContent($content);
}