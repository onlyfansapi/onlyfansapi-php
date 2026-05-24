<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Profiles\ProfileGetResponse;
use Onlyfansapi\Profiles\ProfileRetrieveParams;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\ProfilesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class ProfilesRawService implements ProfilesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get profile details by username.
     *
     * @param string $username The username of the profile to get
     * @param array{fresh?: bool|null}|ProfileRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $username,
        array|ProfileRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ProfileRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/profiles/%1$s', $username],
            query: $parsed,
            options: $options,
            convert: ProfileGetResponse::class,
        );
    }
}
