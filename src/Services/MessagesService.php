<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Messages\MessageAttachTagsResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\MessagesContract;

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
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagesRawService($client);
    }

    /**
     * @api
     *
     * Attach Tags (Release Forms) to a message that has already been sent. Please note, that this is a "sync" operation - for example, if you provide empty `rfTag` it will remove all existing tags already attached to the message.
     *
     * @param string $messageID Path param: The ID of the message to attach the release forms to. This can be ONLY a message sent by the creator.
     * @param string $account Path param: The Account ID
     * @param string $rfGuest Body param: Array of OnlyFans Release Form Guest IDs to tag in your message
     * @param string $rfPartner Body param: Array of OnlyFans Release Form Partners IDs to tag in your message
     * @param string $rfTag Body param: Array of OnlyFans Creator User IDs to tag in your message
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function attachTags(
        string $messageID,
        string $account,
        ?string $rfGuest = null,
        ?string $rfPartner = null,
        ?string $rfTag = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageAttachTagsResponse {
        $params = Util::removeNulls(
            [
                'account' => $account,
                'rfGuest' => $rfGuest,
                'rfPartner' => $rfPartner,
                'rfTag' => $rfTag,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->attachTags($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
