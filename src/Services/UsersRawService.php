<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\UsersRawContract;
use OnlyFansAPI\Users\UserGetResponse;
use OnlyFansAPI\Users\UserListParams;
use OnlyFansAPI\Users\UserListResponse;
use OnlyFansAPI\Users\UserRetrieveParams;

/**
 * APIs for fetching OnlyFans users.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
     * Get OnlyFans Profile details for a given username. User details are retrieved using the current `{account}` so fields like `subscribedOnData` which include potential subscription details will be included.
     *
     * @param string $username the OnlyFans username of the user to retrieve details for
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

    /**
     * @api
     *
     * Save on credits by getting up to 10 user details with a single request. User details are retrieved using the current `{account}` so fields like `subscribedOnData` which include potential subscription details will be included.
     *
     * @param string $account The Account ID
     * @param array{ids: string}|UserListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|UserListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/users/list', $account],
            query: $parsed,
            options: $options,
            convert: UserListResponse::class,
        );
    }
}
