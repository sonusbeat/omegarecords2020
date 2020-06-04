@servers(['web' => ['omega@omegarecords.com.mx']])

@task('deploy', ['on' => 'web'])
    cd omegarecords
    git status
    git pull
@endtask
