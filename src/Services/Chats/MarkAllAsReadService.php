<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Chats;

use Onlyfansapi\Chats\MarkAllAsRead\MarkAllAsReadAllResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Chats\MarkAllAsReadContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
