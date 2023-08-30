<?php

namespace DB\Interfaces;

interface ConnectorInterface
{
    public function connect(): \PDO;
}