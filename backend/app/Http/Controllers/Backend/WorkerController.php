<?php

namespace App\Http\Controllers\Backend;

use App\Api\Tools\Repositories\WorkerInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class WorkerController extends Controller
{
    protected $worker;

    public function __construct(WorkerInterface $worker)
    {
        $this->middleware('auth:admin');
        $this->worker = $worker;
    }

    public function cron(Request $request)
    {
        authorize('tool-view-worker');

        $crons = $this->worker->cron($param = [], $request->query('per_page', 15));

        return inertia('Tool/WorkerCron', compact('crons'));
    }

    public function historyCron(Request $request)
    {
        authorize('tool-view-worker');

        $param = [
            'date_start' => $request->query('date_start', null),
            'date_end' => $request->query('date_end', null),
            'cronOption' => $request->query('cronOption'),
        ];

        $historyCrons = $this->worker->historyCron($param = [], $request->query('per_page', 15));
        $crons = $this->worker->cron($arr = [], $request->query('per_page', 15));

        return inertia('Tool/WorkerCronHistory', compact('historyCrons', 'crons'));
    }

    public function job(Request $request)
    {
        authorize('tool-view-worker');

        $columns = $this->worker->job($param = ['column' => true]);

        $param = [
            'sort_by' => $request->query('sort_by', null),
            'order' => $request->query('order', null),
        ];

        $jobs = $this->worker->job($param, $request->query('per_page', 15));
        $idAll = $this->worker->job(['all_id' => true]);

        return inertia('Tool/WorkerCronPending', compact('jobs', 'columns', 'idAll'));
    }

    public function failedJob(Request $request)
    {
        authorize('tool-view-worker');

        $columns = $this->worker->failedJob($param = ['column' => true]);

        $param = [
            'date_start' => $request->query('date_start', null),
            'date_end' => $request->query('date_end', null),
            'sort_by' => $request->query('sort_by', null),
            'order' => $request->query('order', null),
        ];

        $failedJobs = $this->worker->failedJob($param, $request->query('per_page', 15));

        return inertia('Tool/WorkerCronFailed', compact('failedJobs', 'columns'));
    }

    public function bulkAction(Request $request)
    {
        authorize('tool-view-worker');

        if ($request->get('bapply')) {
            if ($request->input('apply')) {
                $apply = $request->input('apply');
                if ($apply == 'destroy') {
                    return $this->destroyJob($request->input('job_type'), $request->input('job_id'));
                } elseif ($apply == 'retry') {
                    return $this->retryJob($request->input('job_type'), $request->input('job_id'));
                }
            }

            return redirect()->back();
        }
    }

    public function destroyJob($job_type, $id)
    {
        authorize('tool-view-worker');

        if ($id === 'all') {
            if ($job_type == 'job') {
                if ($this->worker->job(['delete_all' => true])) {
                    return redirect()->back()
                        ->with('success', 'Semua data pending job berhasil dihapus.');
                } else {
                    return redirect()->back()
                        ->with('warning', 'Tidak ada data pending job yang dihapus.');
                }
            } elseif ($job_type == 'failed-job') {
                if ($this->worker->failedJob(['delete_all' => true])) {
                    return redirect()->back()
                        ->with('success', 'Semua data failed job berhasil dihapus.');
                } else {
                    return redirect()->back()
                        ->with('warning', 'Tidak ada data failed job yang dihapus.');
                }
            }
        }

        if (! $id) {
            return redirect()->back()
                ->with('warning', 'Tidak ada data yang dihapus.');
        }

        if (! is_array($id)) {
            $id = [$id];
        }

        foreach ($id as $jobID) {
            if ($job_type == 'job') {
                $job = $this->worker->job(['id' => $jobID]);
            } elseif ($job_type == 'failed-job') {
                $job = $this->worker->failedJob(['id' => $jobID]);
            }

            if ($job) {
                $job->delete();
            } else {
                return redirect()->back()
                    ->with('warning', 'Tidak ada data yang dihapus.');
            }
        }

        return redirect()->back()
            ->with('success', count($id).' data berhasil dihapus.');
    }

    public function retryJob($job_type, $id)
    {
        authorize('tool-view-worker');

        if ($id === 'all') {
            if ($job_type == 'job') {
                if ($this->worker->job(['retry_all' => true])) {
                    return redirect()->back()
                        ->with('success', 'Semua pending job berhasil diulang.');
                } else {
                    return redirect()->back()
                        ->with('warning', 'Tidak ada pending job yang diulang.');
                }
            } elseif ($job_type == 'failed-job') {
                if ($this->worker->failedJob(['retry_all' => true])) {
                    Artisan::call('queue:retry', ['id' => 'all']);

                    return redirect()->back()
                        ->with('success', 'Semua failed job berhasil diulang.');
                } else {
                    return redirect()->back()
                        ->with('warning', 'Tidak ada failed job yang diulang.');
                }
            }
        }

        if (! $id) {
            return redirect()->back()
                ->with('warning', 'Tidak ada data yang diulang.');
        }

        if (! is_array($id)) {
            $id = [$id];
        }

        foreach ($id as $jobID) {
            if ($job_type == 'job') {
                $job = $this->worker->job(['id' => $jobID]);
                if ($job) {
                    $job->timestamps = false;
                    $job->attempts = 0;
                    $job->save();
                } else {
                    return redirect()->back()
                        ->with('warning', 'Tidak ada job yang diulang');
                }
            } elseif ($job_type == 'failed-job') {
                $job = $this->worker->failedJob(['id' => $jobID]);
                if ($job) {
                    Artisan::call('queue:retry', ['id' => $job->uuid]);
                } else {
                    return redirect()->back()
                        ->with('warning', 'Tidak ada failed job yang diulang');
                }
            }
        }

        return redirect()->back()
            ->with('success', count($id).' job berhasil diulang.');
    }
}
