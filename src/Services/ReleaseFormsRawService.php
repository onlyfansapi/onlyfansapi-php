<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\ReleaseForms\ReleaseFormCreateInvitationLinkParams;
use Onlyfansapi\ReleaseForms\ReleaseFormCreateReleaseFormParams;
use Onlyfansapi\ReleaseForms\ReleaseFormListTaggableUsersParams;
use Onlyfansapi\ReleaseForms\ReleaseFormListTaggableUsersParams\Filter;
use Onlyfansapi\ReleaseForms\ReleaseFormListTaggableUsersParams\Sort;
use Onlyfansapi\ReleaseForms\ReleaseFormListTaggableUsersParams\SortDirection;
use Onlyfansapi\ReleaseForms\ReleaseFormListTaggableUsersResponse;
use Onlyfansapi\ReleaseForms\ReleaseFormNewInvitationLinkResponse;
use Onlyfansapi\ReleaseForms\ReleaseFormNewReleaseFormResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\ReleaseFormsRawContract;

/**
 * APIs for managing OnlyFans release forms.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class ReleaseFormsRawService implements ReleaseFormsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new invitation link for release forms.
     *
     * @param string $account The Account ID
     * @param array{name: string}|ReleaseFormCreateInvitationLinkParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReleaseFormNewInvitationLinkResponse>
     *
     * @throws APIException
     */
    public function createInvitationLink(
        string $account,
        array|ReleaseFormCreateInvitationLinkParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ReleaseFormCreateInvitationLinkParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/release-forms/create-invitation-link', $account],
            body: (object) $parsed,
            options: $options,
            convert: ReleaseFormNewInvitationLinkResponse::class,
        );
    }

    /**
     * @api
     *
     * Create a new release form link.
     *
     * @param string $account The Account ID
     * @param array{name: string}|ReleaseFormCreateReleaseFormParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReleaseFormNewReleaseFormResponse>
     *
     * @throws APIException
     */
    public function createReleaseForm(
        string $account,
        array|ReleaseFormCreateReleaseFormParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ReleaseFormCreateReleaseFormParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/release-forms/create-release-form', $account],
            body: (object) $parsed,
            options: $options,
            convert: ReleaseFormNewReleaseFormResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a paginated list of users that can be tagged in release forms. These are verified creators who have signed release forms to appear in your content. Use `offset` and `limit` for pagination.
     *
     * @param string $account The Account ID
     * @param array{
     *   filter?: Filter|value-of<Filter>|null,
     *   limit?: int,
     *   name?: string|null,
     *   offset?: int,
     *   sort?: Sort|value-of<Sort>|null,
     *   sortDirection?: SortDirection|value-of<SortDirection>|null,
     * }|ReleaseFormListTaggableUsersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReleaseFormListTaggableUsersResponse>
     *
     * @throws APIException
     */
    public function listTaggableUsers(
        string $account,
        array|ReleaseFormListTaggableUsersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ReleaseFormListTaggableUsersParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/release-forms/taggable-users', $account],
            query: $parsed,
            options: $options,
            convert: ReleaseFormListTaggableUsersResponse::class,
        );
    }
}
