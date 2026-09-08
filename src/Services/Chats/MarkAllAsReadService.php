<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Chats;

use OnlyFansAPI\Chats\MarkAllAsRead\MarkAllAsReadAllResponse;
use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Chats\MarkAllAsReadContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class MarkAllAsReadService implements MarkAllAsReadContract
{
    /**
     * @api
     */
    public MarkAllAsReadRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MarkAllAsReadRawService($client);
    }

    /**
     * @api
     *
     * Mark all chats as read.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function all(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): MarkAllAsReadAllResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->all($account, requestOptions: $requestOptions);

        return $response->parse();
    }
}
