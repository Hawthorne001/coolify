<?php

namespace App\Providers;

use App\Contracts\CustomJobRepositoryInterface;
use App\Models\ApplicationDeploymentQueue;
use App\Repositories\CustomJobRepository;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Laravel\Horizon\Contracts\JobRepository;
use Laravel\Horizon\Events\JobReserved;

class HorizonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(JobRepository::class, CustomJobRepository::class);
        $this->app->singleton(CustomJobRepositoryInterface::class, CustomJobRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Event::listen(function (JobReserved $event) {
        //     $payload = $event->payload->decoded;
        //     $jobName = $payload['displayName'];
        //     if ($jobName === 'App\Jobs\ApplicationDeploymentJob') {
        //         $tags = $payload['tags'];

        //         $deploymentQueueId = collect($tags)->first(function ($tag) {
        //             return str_contains($tag, 'App\Models\ApplicationDeploymentQueue');
        //         });
        //         $deploymentQueueId = explode(':', $deploymentQueueId)[1];
        //         $deploymentQueue = ApplicationDeploymentQueue::find($deploymentQueueId);
        //         $deploymentQueue->update([
        //             'horizon_job_status' => 'reserved',
        //         ]);
        //     }
        // });

    }
}
