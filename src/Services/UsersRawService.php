<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\UsersRawContract;
use Onlyfansapi\Users\UserGetResponse;
use Onlyfansapi\Users\UserRetrieveParams;

/**
 * APIs for fetching OnlyFans users.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class UsersRawService implements UsersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get OnlyFans Profile details for a given username. User details are retrieved using the current current `{account}` so fields like `subscribedOnData` which include potential subscription details will be included.
     *
     * @param array{account: string}|UserRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $username,
        array|UserRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/users/%2$s', $account, $username],
            options: $options,
            convert: UserGetResponse::class,
        );
    }
}
