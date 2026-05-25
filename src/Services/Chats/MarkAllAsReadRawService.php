<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Chats;

use OnlyFansAPI\Chats\MarkAllAsRead\MarkAllAsReadAllResponse;
use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Chats\MarkAllAsReadRawContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class MarkAllAsReadRawService implements MarkAllAsReadRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Mark all chats as read.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarkAllAsReadAllResponse>
     *
     * @throws APIException
     */
    public function all(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/chats/mark-as-read', $account],
            options: $requestOptions,
            convert: MarkAllAsReadAllResponse::class,
        );
    }
}
