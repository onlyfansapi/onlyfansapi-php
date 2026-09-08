<?php

namespace Tests\Services\Fans;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Fans\Notes\NoteClearNotesResponse;
use OnlyFansAPI\Fans\Notes\NoteGetNotesResponse;
use OnlyFansAPI\Fans\Notes\NoteNewEditNotesResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class NotesTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testClearNotes(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->notes->clearNotes(
            'fan_id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NoteClearNotesResponse::class, $result);
    }

    #[Test]
    public function testClearNotesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->notes->clearNotes(
            'fan_id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NoteClearNotesResponse::class, $result);
    }

    #[Test]
    public function testCreateEditNotes(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->notes->createEditNotes(
            'fan_id',
            account: 'acct_XXXXXXXXXXXXXXX',
            notes: 'Example note'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NoteNewEditNotesResponse::class, $result);
    }

    #[Test]
    public function testCreateEditNotesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->notes->createEditNotes(
            'fan_id',
            account: 'acct_XXXXXXXXXXXXXXX',
            notes: 'Example note'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NoteNewEditNotesResponse::class, $result);
    }

    #[Test]
    public function testGetNotes(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->notes->getNotes(
            'fan_id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NoteGetNotesResponse::class, $result);
    }

    #[Test]
    public function testGetNotesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->notes->getNotes(
            'fan_id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NoteGetNotesResponse::class, $result);
    }
}
