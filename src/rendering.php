<?php

namespace Expose\Common;

use Symfony\Component\Console\Output\OutputInterface;
use function Termwind\render;

function banner(): void
{
    render('<div class="ml-2 text-pink-500 font-bold"><span class="pr-0.5">></span> Expose</div>');
}

function warning(string $message): void
{
    render("<div class='ml-3 px-2 text-orange-600 bg-orange-100'>$message</div>");
}

function info(string $message = '', int $options = OutputInterface::OUTPUT_NORMAL): void
{
    render("<div class='ml-3'>$message</div>", $options);
}

function headline(string $message): void
{
    render("<div class='mt-1 ml-3 font-bold'>$message</div>");
}

function lineTable(array $data): void
{

    $template = <<<HTML
        <div class="flex ml-3 mr-6">
            <span>key</span>
            <span class="flex-1 content-repeat-[.] text-gray-800"></span>
            <span>value</span>
        </div>
HTML;

    foreach ($data as $key => $value) {
        $output = str_replace(
            ['key', 'value'],
            [$key, $value],
            $template
        );

        render($output);
    }

    render("");
}

function lineTableLabel(?string $key): string
{
    return match ($key) {
        'token' => 'Token',
        'default_server' => 'Default Server',
        'default_domain' => 'Default Domain',
        'plan' => 'Plan',
        'version' => 'Version',
        'latency' => 'Latency',
        'free' => 'Expose Free',
        'pro' => 'Expose Pro',
        null => 'None',
        default => $key
    };
}
