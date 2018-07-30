<?php

use Xervice\RabbitMQ\RabbitMQConfig;

// RabbitMQ
$config[RabbitMQConfig::CONNECTION_PASSWORD] = 'guest';

// Redis
$config[RedisConfig::REDIS_PASSWORD] = '';

// Database
$config[DatabaseConfig::PROPEL_CONF_PASSWORD] = 'dockerci';