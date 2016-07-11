<?php

namespace Fleet;

class Server
{
    protected $name;
    protected $os;
    protected $isAvailable;
    protected $leasedAt;
    protected $leasedUntil;
    protected $leaseTimeRemaining;
    protected $leasedToUser;

    public function __construct(
        string $name,
        string $os,
        bool $isAvailable,
        string $leaseTimeRemaining,
        string $leasedAt = null,
        string $leasedUntil = null,
        string $leasedToUser = null
    ) {
        $this->name = $name;
        $this->os = $os;
        $this->isAvailable = $isAvailable;
        $this->leaseTimeRemaining = $leaseTimeRemaining;
        $this->leasedAt = $leasedAt;
        $this->leasedUntil = $leasedUntil;
        $this->leasedToUser = $leasedToUser;
    }

    public function report()
    {
        echo "Server <code>{$this->name}</code> ({$this->os})";

        if ($this->isAvailable) {
            echo " is unleased and available.";
        } else {
            echo " is leased to user {$this->leasedToUser} for the next {$this->leaseTimeRemaining}";
        }
    }

    #
    # ACCESSOR
    #

    public function getName()
    {
        return $this->name;
    }

    public function getOs()
    {
        return $this->os;
    }

    public function getIsAvailable()
    {
        return $this->isAvailable;
    }

    public function getLeasedAt()
    {
        return $this->leasedAt;
    }

    public function getLeasedUntil()
    {
        return $this->leasedUntil;
    }

    public function getLeaseTimeRemaining()
    {
        return $this->leaseTimeRemaining;
    }

    public function getLeasedToUser()
    {
        return $this->leasedToUser;
    }
}
