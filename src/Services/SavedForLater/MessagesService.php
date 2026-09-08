<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\SavedForLater;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SavedForLater\Messages\MessageListResponse;
use OnlyFansAPI\ServiceContracts\SavedForLater\MessagesContract;
use OnlyFansAPI\Services\SavedForLater\Messages\SettingsService;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class MessagesService implements MessagesContract
{
    /**
     * @api
     */
    public MessagesRawService $raw;

    /**
     * @api
     */
    public SettingsService $settings;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagesRawService($client);
        $this->settings = new SettingsService($client);
    }

    /**
     * @api
     *
     * List all messages that are marked as "Save For Later".
     *
     * @param string $account The Account ID
     * @param int $limit Maximum number of messages to return (default = 10)
     * @param int $offset Offset for pagination (default = 0)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        int $limit,
        int $offset,
        RequestOptions|array|null $requestOptions = null,
    ): MessageListResponse {
        $params = Util::removeNulls(['limit' => $limit, 'offset' => $offset]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
