<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\SavedForLater;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SavedForLater\Messages\MessageListParams;
use Onlyfansapi\SavedForLater\Messages\MessageListResponse;
use Onlyfansapi\ServiceContracts\SavedForLater\MessagesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     * List all messages that are marked as "Save For Later".
     *
     * @param string $account The Account ID
     * @param array{limit: int, offset: int}|MessageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|MessageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/saved-for-later/messages', $account],
            query: $parsed,
            options: $options,
            convert: MessageListResponse::class,
        );
    }
}
