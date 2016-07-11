# Fleet Server

This repo contains the super simple app that is built to `amp343/fleet-server`
and lives in the `server{{1-5}}` containers.
by the `resalloc` cli tool.

## Requirements

Running the ACL app and server fleet requires `docker` and `docker-compose`.

## Start the fleet

- `docker-compose up -d` To start the ACL app and server fleet
- `docker ps` To see that the resources are running

## Stopping the fleet

- `docker-compose stop` To stop the ACL app and server fleet

## Caveats

There is no persistent state for server leasing beyond the lifecycle of a container.
Therefore, if you were to:
  - start the fleet, `docker-compose up -d`
  - use the `resalloc` cli tool to lease a server, `resalloc lease {{serverName}}`
  - restart the fleet, `docker-compose stop` `docker-compose up -d`
  - use the `resalloc` cli tool to check leased servers, `resalloc leased`

... you would not see that you have any leased servers.
