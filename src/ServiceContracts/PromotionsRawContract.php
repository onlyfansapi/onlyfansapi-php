<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Promotions\PromotionCreateParams;
use OnlyFansAPI\Promotions\PromotionDeleteParams;
use OnlyFansAPI\Promotions\PromotionDeleteResponse;
use OnlyFansAPI\Promotions\PromotionListParams;
use OnlyFansAPI\Promotions\PromotionListResponse;
use OnlyFansAPI\Promotions\PromotionNewResponse;
use OnlyFansAPI\Promotions\PromotionStopParams;
use OnlyFansAPI\Promotions\PromotionStopResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface PromotionsRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|PromotionCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|PromotionListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $promotionID the ID of the promotion to delete
     * @param array<string,mixed>|PromotionDeleteParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $promotionID the ID of the promotion to stop
     * @param array<string,mixed>|PromotionStopParams $params
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
    ): BaseResponse;
}
