<?php

namespace ML\HydraBundle\Entity;

use ML\HydraBundle\Mapping as Hydra;

/**
 * A generic collection keeping references to a number of resources.
 *
 * @Hydra\Expose(iri="http://www.w3.org/ns/hydra/core#Collection")
 *
 * @author Markus Lanthaler <mail@markus-lanthaler.com>
 */
class Collection
{
    /**
     * @var string The identifier of this collection.
     *
     * @Hydra\Expose(as = "@id")
     */
    private $id;

    /**
     * @var array The members of this collection.
     *
     * @Hydra\Expose(iri="http://www.w3.org/ns/hydra/core#members")
     */
    private $members;

    /**
     * Constructor
     *
     * @var string $id      The IRI identifying this Collection.
     * @var array  $members The members.
     */
    public function __construct($id, $members)
    {
        $this->id = $id;
        $this->setMembers($members);
    }

    /**
     * Set Id
     *
     * @param string $id The IRI identifying this Collection.
     * @return Collection
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get Id
     *
     * @return string The IRI identifying this Collection.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set members
     *
     * @param array $members
     * @return Collection
     */
    public function setMembers($members)
    {
        if (!is_array($members) && !($members instanceof \ArrayAccess) && !($members instanceof \Traversable)) {
            // TODO Improve this
            throw new \Exception("The members of a Collection must be an array or an object implementing ArrayAccess.");
        }

        $this->members = $members;

        return $this;
    }

    /**
     * Get members
     *
     * @return array
     */
    public function getMembers()
    {
        return $this->members;
    }
}
