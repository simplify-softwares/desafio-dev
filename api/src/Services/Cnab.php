<?php

namespace App\Services;

use Generator;
use Psr\Container\ContainerInterface;
use App\Core\Settings\SettingsInterface;

class Cnab
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function handle(array $data): array
    {
        $settings = $this->container->get(SettingsInterface::class);
        $positions = $settings->get('cnab');
        
        $file = $data['upload'];
        $fileName = $file['file']->getFilePath();
        $result = [];

        foreach ($this->openFile($fileName) as $i => $row) {
            foreach ($positions as $chave => $valor) {
                $result[$i][$chave] = trim(substr($row, $valor['start'] - 1, $valor['length']));
            }
        }
        return $result;
    }

    private function openFile(string $tmpFileName): Generator
    {
        $file = fopen($tmpFileName, 'r');
        $data = fread($file, filesize($tmpFileName));
        $rows = explode("\n", $data);

        yield from $rows;

        // foreach($rows as $row) {
        //     if (!empty($row)) {
        //         yield $row;
        //     }
        // }
    }

}