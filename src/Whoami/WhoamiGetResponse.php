<?php

declare(strict_types=1);

namespace OnlyFansAPI\Whoami;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Whoami\WhoamiGetResponse\APIKey;
use OnlyFansAPI\Whoami\WhoamiGetResponse\Team;

/**
 * @phpstan-import-type APIKeyShape from \OnlyFansAPI\Whoami\WhoamiGetResponse\APIKey
 * @phpstan-import-type TeamShape from \OnlyFansAPI\Whoami\WhoamiGetResponse\Team
 *
 * @phpstan-type WhoamiGetResponseShape = array{
 *   apiKey?: null|APIKey|APIKeyShape, team?: null|Team|TeamShape
 * }
 */
final class WhoamiGetResponse implements BaseModel
{
    /** @use SdkModel<WhoamiGetResponseShape> */
    use SdkModel;

    #[Optional('api_key')]
    public ?APIKey $apiKey;

    #[Optional]
    public ?Team $team;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param APIKey|APIKeyShape|null $apiKey
     * @param Team|TeamShape|null $team
     */
    public static function with(
        APIKey|array|null $apiKey = null,
        Team|array|null $team = null
    ): self {
        $self = new self;

        null !== $apiKey && $self['apiKey'] = $apiKey;
        null !== $team && $self['team'] = $team;

        return $self;
    }

    /**
     * @param APIKey|APIKeyShape $apiKey
     */
    public function withAPIKey(APIKey|array $apiKey): self
    {
        $self = clone $this;
        $self['apiKey'] = $apiKey;

        return $self;
    }

    /**
     * @param Team|TeamShape $team
     */
    public function withTeam(Team|array $team): self
    {
        $self = clone $this;
        $self['team'] = $team;

        return $self;
    }
}
