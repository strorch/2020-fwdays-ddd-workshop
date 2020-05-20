<?php

namespace Beeriously\Domain\Recipe;

use Beeriously\Domain\Generic\ValueObject\Identifier;

class RecipeWasCreated extends RecipeEvent
{
    private RecipeId $recipeId;
    private RecipeName $name;
    private \DateTimeImmutable $occurredOn;

    public function __construct(RecipeId $recipeId, RecipeName $name, \DateTimeImmutable $occurredOn)
    {
        $this->eventId = Identifier::newId(); // for storage
        $this->recipeId = $recipeId;
        $this->name = $name;
        $this->occurredOn = $occurredOn;
        // TODO: add who created the recipe, etc.
    }

    public function getRecipeName(): RecipeName
    {
        return $this->name;
    }

    public function getRecipeId(): RecipeId
    {
        return $this->recipeId;
    }

}