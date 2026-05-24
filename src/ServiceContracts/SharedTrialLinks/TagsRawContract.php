<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\SharedTrialLinks;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SharedTrialLinks\Tags\TagAddParams;
use Onlyfansapi\SharedTrialLinks\Tags\TagAddResponse;
use Onlyfansapi\SharedTrialLinks\Tags\TagListParams;
use Onlyfansapi\SharedTrialLinks\Tags\TagListResponse;
use Onlyfansapi\SharedTrialLinks\Tags\TagRemoveParams;
use Onlyfansapi\SharedTrialLinks\Tags\TagRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
