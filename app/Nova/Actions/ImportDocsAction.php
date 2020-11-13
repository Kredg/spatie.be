<?php

namespace App\Nova\Actions;

use App\Console\Commands\ImportGitHubRepositoriesCommand;
use Artisan;
use Brightspot\Nova\Tools\DetachedActions\DetachedAction;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;

class ImportDocsAction extends DetachedAction
{
    use InteractsWithQueue;
    use Queueable;

    public function label()
    {
        return __('Import docs');
    }

    public function handle(ActionFields $fields, Collection $models)
    {
        dispatch(function () {
            Artisan::call(ImportGitHubRepositoriesCommand::class);
        });
    }

    public function fields()
    {
        return [];
    }
}