<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeDddLightCommand extends Command
{
    protected $signature = 'make:ddd-light {domain}';

    protected $description = 'Cria estrutura DDD Light completa para um domínio em app/Domains/{Domain}/';

    protected array $folders = [
        'Actions',
        'DTOs',
        'Events',
        'Models',
        'Repositories',
        'Resources',
        'Services',
    ];

    public function handle()
    {
        $domainInput = $this->argument('domain');
        $domainStudly = Str::studly($domainInput);
        $basePath = app_path("Domains/{$domainStudly}");

        // Cria diretórios
        foreach ($this->folders as $folder) {
            File::ensureDirectoryExists("{$basePath}/{$folder}");
        }

        // Arquivos principais
        $this->generateFile("Actions/{$domainStudly}Action.php", 'Actions', $domainStudly);
        $this->generateFile("DTOs/{$domainStudly}DTO.php", 'DTOs', $domainStudly);
        $this->generateFile("Events/{$domainStudly}Created.php", 'Events', $domainStudly, suffix: 'Created');
        $this->generateFile("Models/{$domainStudly}.php", 'Models', $domainStudly);
        $this->generateFile("Repositories/{$domainStudly}Repository.php", 'Repositories', $domainStudly);
        $this->generateFile("Resources/{$domainStudly}Resource.php", 'Resources', $domainStudly);
        $this->generateFile("Services/{$domainStudly}Service.php", 'Services', $domainStudly);

        $this->info("✅ Estrutura DDD Light criada com sucesso para o domínio '{$domainStudly}' em app/Domains/{$domainStudly}/");

        return Command::SUCCESS;
    }

    protected function generateFile(string $fileName, string $type, string $domainStudly, ?string $suffix = null): void
    {
        $namespace = "Domains\\{$domainStudly}\\{$type}";
        $class = pathinfo($fileName, PATHINFO_FILENAME);

        $content = <<<PHP
<?php

namespace {$namespace};

class {$class}
{
    //
}
PHP;

        File::put(app_path("Domains/{$domainStudly}/{$fileName}"), $content);
    }
}
