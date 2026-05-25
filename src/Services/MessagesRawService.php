<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Messages\MessageAttachTagsParams;
use OnlyFansAPI\Messages\MessageAttachTagsResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\MessagesRawContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class MessagesRawService implements MessagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Attach Tags (Release Forms) to a message that has already been sent. Please note, that this is a "sync" operation - for example, if you provide empty `rfTag` it will remove all existing tags already attached to the message.
     *
     * @param string $messageID Path param: The ID of the message to attach the release forms to. This can be ONLY a message sent by the creator.
     * @param array{
     *   account: string, rfGuest?: string, rfPartner?: string, rfTag?: string
     * }|MessageAttachTagsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageAttachTagsResponse>
     *
     * @throws APIException
     */
    public function attachTags(
        string $messageID,
        array|MessageAttachTagsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageAttachTagsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/messages/%2$s/attach-tags', $account, $messageID],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: MessageAttachTagsResponse::class,
        );
    }
}
