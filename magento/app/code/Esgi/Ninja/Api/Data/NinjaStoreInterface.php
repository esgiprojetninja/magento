<?php
namespace Esgi\Ninja\Api\Data;

/**
 * Esgi ninjastore interface.
 * @api
 */
interface NinjaStoreInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID      = 'entity_id';
    const NAME    = 'name';
    const CONTENT = 'content';
    const LAT = 'lat';
    const LNG = 'lng';
    const LINK = 'link';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get lat
     *
     * @return int|null
     */
    public function getLat();

    /**
     * Get lng
     *
     * @return int|null
     */
    public function getLng();

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
     * Get link
     *
     * @return string|null
     */
    public function getLink();



    /**
     * Set ID
     *
     * @param int $id
     * @return NinjaStoreInterface
     */
    public function setId($id);

    /**
     * Set lat
     *
     * @param int $lat
     * @return NinjaStoreInterface
     */
    public function setLat($lat);

    /**
     * Set lng
     *
     * @param int $lng
     * @return NinjaStoreInterface
     */
    public function setLng($lng);

    /**
     * Set name
     *
     * @param string $name
     * @return NinjaStoreInterface
     */
    public function setName($name);

    /**
     * Set content
     *
     * @param string $content
     * @return NinjaStoreInterface
     */
    public function setContent($content);

    /**
     * Set link
     *
     * @param string $link
     * @return NinjaStoreInterface
     */
    public function setLink($link);
}
