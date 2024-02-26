<?php declare(strict_types=1);

it('calls the module:init command', function () {
    $this->artisan('module:init')->assertExitCode(0);
});
