<?php

namespace Beeriously\Domain\Ingredients\Grains;

use Doctrine\ORM\Mapping as ORM;

/**
 * GrainType
 *
 * @ORM\Table(name="grain_type")
 * @ORM\Entity
 */
class GrainType
{
    /**
     * @ORM\Column(name="id", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private string $id;

    /**
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     */
    private string $description = '';

    public function getId(): GrainTypeId
    {
        return GrainTypeId::fromString($this->id);
    }

    public function getDescription(): GrainTypeDescription
    {
        return new GrainTypeDescription($this->description);
    }



}
