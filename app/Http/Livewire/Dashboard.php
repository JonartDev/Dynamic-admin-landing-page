<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin;
use App\Models\Links;
use App\Models\User;
use App\Models\Sidebar;

use App\Http\Controllers\SidebarController;

class Dashboard extends Component
{
    public $specs;
    public $admin, $user, $sidebar;
    public function mount()
    {
        $sidebarController = new SidebarController();
        $this->sidebar = $sidebarController->index();
        $linkCount = Links::count(); // Fix the model class name here
        $this->specs = [
            'OS' => $this->getOS(),
            'Processor' => $this->getProcessor(),
            'Memory' => $this->getMemory(),
            'Total_Links' => $linkCount,
            'php_v' => phpversion(),
            'admin' => Admin::count(),
            'server' => $_SERVER['SERVER_SOFTWARE'],
            // Add more specifications as needed
        ];
    }

    protected function getOS()
    {
        return PHP_OS;
    }

    protected function getProcessor()
    {
        // You can use PHP functions or external libraries to gather CPU information
        return php_uname('m');
    }

    protected function getMemory()
    {
        // You can use PHP functions or external libraries to gather memory information
        return round(memory_get_usage(true) / (1024 * 1024), 2) . ' MB';
    }
    protected function getDiskSpace()
    {
        $totalSpace = disk_total_space('/');
        $freeSpace = disk_free_space('/');

        $totalSpaceFormatted = $this->formatBytes($totalSpace);
        $freeSpaceFormatted = $this->formatBytes($freeSpace);

        return "Total: $totalSpaceFormatted, Free: $freeSpaceFormatted";
    }

    protected function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    public function render()
    {
        $this->admin = Admin::where(["id" => 1])->first();
        $this->user = User::where(["id" => 1])->first();

        return view('livewire.dashboard');
    }
}
