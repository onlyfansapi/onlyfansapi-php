<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Accounts\AccountListParams;
use Onlyfansapi\Accounts\AccountListResponseItem;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Conversion\ListOf;
use Onlyfansapi\Core\Conversion\MapOf;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\AccountsRawContract;

/**
 * Endpoints for your linked accounts.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class AccountsRawService implements AccountsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all connected OnlyFans accounts.
     *
     * @param array{
     *   onlyfansEmail?: string|null,
     *   onlyfansID?: string|null,
     *   onlyfansUsername?: string|null,
     * }|AccountListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<AccountListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        array|AccountListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AccountListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/accounts',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'onlyfansEmail' => 'onlyfans_email',
                    'onlyfansID' => 'onlyfans_id',
                    'onlyfansUsername' => 'onlyfans_username',
                ],
            ),
            options: $options,
            convert: new ListOf(AccountListResponseItem::class),
        );
    }

    /**
     * @api
     *
     * Disconnect an OnlyFans account.
     *
     * @param string $id the ID of the account
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function disconnect(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/accounts/%1$s', $id],
            options: $requestOptions,
            convert: new MapOf('mixed'),
        );
    }
}
