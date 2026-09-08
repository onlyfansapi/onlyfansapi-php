<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Engagement;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Engagement\Messages\MessageGetMessageBuyersResponse;
use OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Engagement\MessagesContract;
use OnlyFansAPI\Services\Engagement\Messages\DirectMessagesService;
use OnlyFansAPI\Services\Engagement\Messages\MassMessagesService;

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
    public MassMessagesService $massMessages;

    /**
     * @api
     */
    public DirectMessagesService $directMessages;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagesRawService($client);
        $this->massMessages = new MassMessagesService($client);
        $this->directMessages = new DirectMessagesService($client);
    }

    /**
     * @api
     *
     * List buyers for a specific message.
     *
     * @param string $messageID path param: The ID of the message
     * @param string $account Path param: The Account ID
     * @param int $limit Query param: Number of buyers to return (default = 10)
     * @param int $marker Query param: Marker for pagination
     * @param int $offset Query param: Offset for pagination (default = 0)
     * @param string $skipUsers query param: Optional flag for subsequent pages (example: all)
     * @param int $skipUsersDups Query param: Skip duplicate users in results (0/1). Default = 1
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getMessageBuyers(
        string $messageID,
        string $account,
        ?int $limit = null,
        ?int $marker = null,
        ?int $offset = null,
        ?string $skipUsers = null,
        ?int $skipUsersDups = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageGetMessageBuyersResponse {
        $params = Util::removeNulls(
            [
                'account' => $account,
                'limit' => $limit,
                'marker' => $marker,
                'offset' => $offset,
                'skipUsers' => $skipUsers,
                'skipUsersDups' => $skipUsersDups,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getMessageBuyers($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the top performing message by purchases in the selected timeframe.
     *
     * @param string $account The Account ID
     * @param string $endDate The end date for the period. Keep empty to retrieve until now. It must be after `startDate`.
     * @param string $startDate The start date for the period. Keep empty to retrieve from the model start date.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getTopMessage(
        string $account,
        ?string $endDate = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageGetTopMessageResponse {
        $params = Util::removeNulls(
            ['endDate' => $endDate, 'startDate' => $startDate]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getTopMessage($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
