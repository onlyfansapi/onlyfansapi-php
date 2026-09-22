<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\SharedTrialLinks;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SharedTrialLinks\Tags\TagAddParams;
use OnlyFansAPI\SharedTrialLinks\Tags\TagAddResponse;
use OnlyFansAPI\SharedTrialLinks\Tags\TagListParams;
use OnlyFansAPI\SharedTrialLinks\Tags\TagListResponse;
use OnlyFansAPI\SharedTrialLinks\Tags\TagRemoveParams;
use OnlyFansAPI\SharedTrialLinks\Tags\TagRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface TagsRawContract
{
    /**
     * @api
     *
     * @param int $sharedTrialLinkID The OnlyFans-side ID of the shared trial link
     * @param array<string,mixed>|TagListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $sharedTrialLinkID,
        array|TagListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $sharedTrialLinkID Path param: The OnlyFans-side ID of the shared trial link
     * @param array<string,mixed>|TagAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagAddResponse>
     *
     * @throws APIException
     */
    public function add(
        int $sharedTrialLinkID,
        array|TagAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $sharedTrialLinkID Path param: The OnlyFans-side ID of the shared trial link
     * @param array<string,mixed>|TagRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        int $sharedTrialLinkID,
        array|TagRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
