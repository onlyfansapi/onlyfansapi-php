<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Users;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Users\RestrictRawContract;
use OnlyFansAPI\Users\Restrict\RestrictCreateParams;
use OnlyFansAPI\Users\Restrict\RestrictDeleteParams;
use OnlyFansAPI\Users\Restrict\RestrictDeleteResponse;
use OnlyFansAPI\Users\Restrict\RestrictNewResponse;

/**
 * APIs for fetching OnlyFans users.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class RestrictRawService implements RestrictRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Restrict a user. You will not see messages or comments from this them.
     *
     * @param string $userID the OnlyFans ID of the user to restrict
     * @param array{account: string}|RestrictCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RestrictNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $userID,
        array|RestrictCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RestrictCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/users/%2$s/restrict', $account, $userID],
            options: $options,
            convert: RestrictNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Unrestrict a previously restricted user. You will start seeing messages and comments from them again.
     *
     * @param string $userID the OnlyFans ID of the user to restrict
     * @param array{account: string}|RestrictDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RestrictDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        array|RestrictDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RestrictDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/users/%2$s/restrict', $account, $userID],
            options: $options,
            convert: RestrictDeleteResponse::class,
        );
    }
}
