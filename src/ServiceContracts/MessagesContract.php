<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Messages\MessageAttachTagsResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface MessagesContract
{
    /**
     * @api
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
    ): MessageAttachTagsResponse;
}
