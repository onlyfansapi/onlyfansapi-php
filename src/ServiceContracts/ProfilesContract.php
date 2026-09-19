<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Profiles\ProfileGetResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface ProfilesContract
{
    /**
     * @api
     *
     * @param string $username The username of the profile to get
     * @param bool|null $fresh If `true` then OnlyFansAPI will always return the real time information about profile (eg. when was the profile last online).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $username,
        ?bool $fresh = null,
        RequestOptions|array|null $requestOptions = null,
    ): ProfileGetResponse;
}
