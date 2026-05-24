<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Promotions\PromotionCreateParams;
use Onlyfansapi\Promotions\PromotionCreateParams\Type;
use Onlyfansapi\Promotions\PromotionDeleteParams;
use Onlyfansapi\Promotions\PromotionDeleteResponse;
use Onlyfansapi\Promotions\PromotionListParams;
use Onlyfansapi\Promotions\PromotionListResponse;
use Onlyfansapi\Promotions\PromotionNewResponse;
use Onlyfansapi\Promotions\PromotionStopParams;
use Onlyfansapi\Promotions\PromotionStopResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\PromotionsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class PromotionsRawService implements PromotionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new promotion for the account.
     *
     * @param string $account The Account ID
     * @param array{
     *   discount: int,
     *   expirationDays: int,
     *   offerLimit: int,
     *   type: Type|value-of<Type>,
     *   freeTrialDays?: int,
     *   message?: string,
     * }|PromotionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PromotionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $account,
        array|PromotionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PromotionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/promotions', $account],
            body: (object) $parsed,
            options: $options,
            convert: PromotionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * List all promotions for the account.
     *
     * @param string $account The Account ID
     * @param array{limit?: int, offset?: int}|PromotionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PromotionListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|PromotionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PromotionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/promotions', $account],
            query: $parsed,
            options: $options,
            convert: PromotionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a promotion for the account.
     *
     * @param string $promotionID the ID of the promotion to delete
     * @param array{account: string}|PromotionDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PromotionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $promotionID,
        array|PromotionDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PromotionDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/promotions/%2$s', $account, $promotionID],
            options: $options,
            convert: PromotionDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Stop an active promotion for the account.
     *
     * @param string $promotionID the ID of the promotion to stop
     * @param array{account: string}|PromotionStopParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PromotionStopResponse>
     *
     * @throws APIException
     */
    public function stop(
        string $promotionID,
        array|PromotionStopParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PromotionStopParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/promotions/%2$s/stop', $account, $promotionID],
            options: $options,
            convert: PromotionStopResponse::class,
        );
    }
}
