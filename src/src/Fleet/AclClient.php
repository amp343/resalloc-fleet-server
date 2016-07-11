<?php

namespace Fleet;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Fleet\Server;

class AclClient
{
    protected $resourceName;
    protected $aclUri;
    protected $client;

    public function __construct(
        string $resourceName,
        string $aclUri
    ) {
        $this->resourceName = $resourceName;
        $this->aclUri = $aclUri;
        $this->client = new Client;
    }

    public function getServer(): Server
    {
        $res = $this->client->request('GET', $this->buildUrl());
        $json = json_decode($res->getBody());

        return new Server(
            $json->name,
            $json->os,
            $json->is_available,
            $json->lease_time_remaining,
            $json->leased_at,
            $json->leased_until,
            $json->leased_to_user
        );
    }

    public function buildUrl(): string
    {
        return $this->aclUri . $this->resourceName;
    }

    public static function factory(): AclClient
    {
        return new self(
            $_ENV['RESOURCE_NAME'],
            $_ENV['ACL_URI']
        );
    }

    // ACCESSORS

    public function getResourceId()
    {
        return $this->resourceId;
    }

    public function getAclUri()
    {
        return $this->aclUri;
    }

    public function getClient()
    {
        return $this->client;
    }
}
