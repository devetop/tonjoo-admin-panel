<?php

namespace App\Api\Tools\Repositories\Eloquents;

use App\Api\Tools\Models\Cron;
use App\Api\Tools\Models\FailedJob;
use App\Api\Tools\Models\HistoryCron;
use App\Api\Tools\Models\Job;
use App\Api\Tools\Repositories\WorkerInterface;

class WorkerEloquent implements WorkerInterface
{
    public function cron(array $param, $perPage = 15)
    {
        $query = Cron::query();

        if (! empty($perPage)) {
            return $query->paginate($perPage);
        }

        return $query->get();
    }

    public function historyCron(array $param, $perPage = 15)
    {
        $query = HistoryCron::query();

        if (isset($param['date_start'])) {
            $query->whereRaw("DATE(created_at) >= '".to_mysql_date($param['date_start'])."'");
        }

        if (isset($param['date_end'])) {
            $query->whereRaw("DATE(created_at) <= '".to_mysql_date($param['date_end'])."'");
        }

        if (isset($param['cronOption'])) {
            $query->where('name', $param['cronOption']);
        }

        $query->latest();

        if (! empty($perPage)) {
            return $query->paginate($perPage);
        }

        return $query->get();
    }

    public function job(array $param, $perPage = 15)
    {
        $query = Job::query();

        if(isset($param['delete_all'])){
            if(! $query->count()) {
                return false;
            }

            return Job::truncate();
        }

        if(isset($param['retry_all'])){
            if(! $query->count()) {
                return false;
            }
            $job = new Job;
            $job->timestamps = false;

            return $job->where('attempts', '!=', 0)->update(['attempts' => 0]);
        }

        if(isset($param['id'])) {
            return $query->find($param['id']);
        }

        if(isset($param['column'])) {
            return (new Job)->getConnection()->getSchemaBuilder()->getColumnListing((new Job)->getTable());
        }

        if(isset($param['sort_by']) && isset($param['order'])){
            $query->orderBy($param['sort_by'], $param['order']);
        } else {
            $query->latest();
        }

        return $query->paginate($perPage);
    }

    public function failedJob(array $param, $perPage = 15)
    {
        $query = FailedJob::query();

        if(isset($param['delete_all'])){
            if(! $query->count()) {
                return false;
            }

            return FailedJob::truncate();
        }

        if(isset($param['retry_all'])){
            if(! $query->count()) {
                return false;
            }

            return true;
        }

        if(isset($param['id'])) {
            return $query->find($param['id']);
        }

        if(isset($param['column'])) {
            return (new FailedJob)->getConnection()->getSchemaBuilder()->getColumnListing((new FailedJob)->getTable());
        }

        if (isset($param['date_start'])) {
            $query->whereRaw("DATE(failed_at) >= '".to_mysql_date($param['date_start'])."'");
        }

        if (isset($param['date_end'])) {
            $query->whereRaw("DATE(failed_at) <= '".to_mysql_date($param['date_end'])."'");
        }

        if(isset($param['sort_by']) && $param['order']){
            $query->orderBy($param['sort_by'], $param['order']);
        } else {
            $query->latest('failed_at');
        }

        return $query->paginate($perPage);
    }

    public function recordCommand($name)
    {
        $history = HistoryCron::where('name', $name)->first();

        if ($history) {
            HistoryCron::where('name', $name)->update([
                'updated_at' => now(),
            ]);
        } else {
            HistoryCron::create([
                'name' => $name,
            ]);
        }
    }
}
