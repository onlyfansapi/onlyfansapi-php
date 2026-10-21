<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Users;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Users\BlockRawContract;
use OnlyFansAPI\Users\Block\BlockCreateParams;
use OnlyFansAPI\Users\Block\BlockDeleteParams;
use OnlyFansAPI\Users\Block\BlockDeleteResponse;
use OnlyFansAPI\Users\Block\BlockNewResponse;

/**
 * APIs for fetching OnlyFans users.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class BlockRawService implements BlockRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Block user from accessing your profile.
     *
     * @param string $userID the OnlyFans ID of the user to block
     * @param array{account: string}|BlockCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BlockNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $userID,
        array|BlockCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BlockCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/users/%2$s/block', $account, $userID],
            options: $options,
            convert: BlockNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Unblock a previously blocked user.
     *
     * @param string $userID the OnlyFans ID of the user to block
     * @param array{account: string}|BlockDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BlockDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        array|BlockDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BlockDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/users/%2$s/block', $account, $userID],
            options: $options,
            convert: BlockDeleteResponse::class,
        );
    }
}
