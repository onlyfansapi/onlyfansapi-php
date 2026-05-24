<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Chats;

use Onlyfansapi\Chats\MarkAsRead\MarkAsReadAllResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Chats\MarkAsReadContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class MarkAsReadService implements MarkAsReadContract
{
    /**
     * @api
     */
    public MarkAsReadRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MarkAsReadRawService($client);
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
    ): MarkAsReadAllResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->all($account, requestOptions: $requestOptions);

        return $response->parse();
    }
}
