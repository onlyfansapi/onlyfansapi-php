<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Promotions\PromotionCreateParams\Type;
use Onlyfansapi\Promotions\PromotionDeleteResponse;
use Onlyfansapi\Promotions\PromotionListResponse;
use Onlyfansapi\Promotions\PromotionNewResponse;
use Onlyfansapi\Promotions\PromotionStopResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface PromotionsContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param int $discount The discount percentage for the promotion's first month. Set to 100 to make this promotion a Free Trial.
     * @param int $expirationDays In how many days this offer will expire. Set to 0 to make this promotion infinite.
     * @param int $offerLimit Limit how many people can claim this offer. Set to 0 for no limits.
     * @param Type|value-of<Type> $type Whether this promotion should apply to new subscribers, expired subscribers, or both. **IMPORTANT: when set to new_and_expired, the OF will create two separate promotions.**
     * @param int $freeTrialDays Required only when discount is 100. Sets the duration (in days) of the free trial. Accepted 1-30
     * @param string $message optionally, provide a message for this promotion
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $account,
        int $discount,
        int $expirationDays,
        int $offerLimit,
        Type|string $type,
        ?int $freeTrialDays = null,
        ?string $message = null,
        RequestOptions|array|null $requestOptions = null,
    ): PromotionNewResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param int $limit The number of promotions to return. Default `10`
     * @param int $offset The offset used for pagination. Default `0`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?int $limit = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): PromotionListResponse;

    /**
     * @api
     *
     * @param string $promotionID the ID of the promotion to delete
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $promotionID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): PromotionDeleteResponse;

    /**
     * @api
     *
     * @param string $promotionID the ID of the promotion to stop
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function stop(
        string $promotionID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): PromotionStopResponse;
}
