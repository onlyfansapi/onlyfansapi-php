<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\StoryNewResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Stories\StoryNewResponse\Data\Question\Entity;
use OnlyFansAPI\Stories\StoryNewResponse\Data\Question\Positions;

/**
 * @phpstan-import-type EntityShape from \OnlyFansAPI\Stories\StoryNewResponse\Data\Question\Entity
 * @phpstan-import-type PositionsShape from \OnlyFansAPI\Stories\StoryNewResponse\Data\Question\Positions
 *
 * @phpstan-type QuestionShape = array{
 *   entity?: null|Entity|EntityShape,
 *   positions?: null|Positions|PositionsShape,
 *   type?: string|null,
 * }
 */
final class Question implements BaseModel
{
    /** @use SdkModel<QuestionShape> */
    use SdkModel;

    #[Optional]
    public ?Entity $entity;

    #[Optional]
    public ?Positions $positions;

    #[Optional]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Entity|EntityShape|null $entity
     * @param Positions|PositionsShape|null $positions
     */
    public static function with(
        Entity|array|null $entity = null,
        Positions|array|null $positions = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $entity && $self['entity'] = $entity;
        null !== $positions && $self['positions'] = $positions;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * @param Entity|EntityShape $entity
     */
    public function withEntity(Entity|array $entity): self
    {
        $self = clone $this;
        $self['entity'] = $entity;

        return $self;
    }

    /**
     * @param Positions|PositionsShape $positions
     */
    public function withPositions(Positions|array $positions): self
    {
        $self = clone $this;
        $self['positions'] = $positions;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
