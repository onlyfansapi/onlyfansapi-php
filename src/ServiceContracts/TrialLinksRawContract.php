<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\TrialLinks\TrialLinkCreateParams;
use Onlyfansapi\TrialLinks\TrialLinkDeleteParams;
use Onlyfansapi\TrialLinks\TrialLinkDeleteResponse;
use Onlyfansapi\TrialLinks\TrialLinkListParams;
use Onlyfansapi\TrialLinks\TrialLinkListResponse;
use Onlyfansapi\TrialLinks\TrialLinkListSpendersParams;
use Onlyfansapi\TrialLinks\TrialLinkListSpendersResponse;
use Onlyfansapi\TrialLinks\TrialLinkListSubscribersParams;
use Onlyfansapi\TrialLinks\TrialLinkListSubscribersResponse;
use Onlyfansapi\TrialLinks\TrialLinkNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface TrialLinksRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|TrialLinkCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrialLinkNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $account,
        array|TrialLinkCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|TrialLinkListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrialLinkListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|TrialLinkListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $trialLinkID The ID of the trial link to delete
     * @param array<string,mixed>|TrialLinkDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrialLinkDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        int $trialLinkID,
        array|TrialLinkDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $trialLinkID Path param: The ID of the free trial link to get spenders for
     * @param array<string,mixed>|TrialLinkListSpendersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrialLinkListSpendersResponse>
     *
     * @throws APIException
     */
    public function listSpenders(
        string $trialLinkID,
        array|TrialLinkListSpendersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $trialLinkID path param: The ID of the trial link
     * @param array<string,mixed>|TrialLinkListSubscribersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrialLinkListSubscribersResponse>
     *
     * @throws APIException
     */
    public function listSubscribers(
        string $trialLinkID,
        array|TrialLinkListSubscribersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
