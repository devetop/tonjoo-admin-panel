<?php

namespace App\Api\Tools\Repositories;

interface WorkerInterface
{
    public function cron(array $param, $perPage = 15);

    public function historyCron(array $param, $perPage = 15);

    public function job(array $param, $perPage = 15);

    public function failedJob(array $param, $perPage = 15);

    public function recordCommand($name);
}
