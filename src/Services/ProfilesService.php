<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Profiles\ProfileGetResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\ProfilesContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class ProfilesService implements ProfilesContract
{
    /**
     * @api
     */
    public ProfilesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ProfilesRawService($client);
    }

    /**
     * @api
     *
     * Get profile details by username.
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
    ): ProfileGetResponse {
        $params = Util::removeNulls(['fresh' => $fresh]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($username, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
