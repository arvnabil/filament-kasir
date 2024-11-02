<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Product extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $clusterBreadcrumb = 'Cluster';

    // Dynamic
    // public static function getClusterBreadcrumb(): string
    // {
    //     return __('filament/clusters/cluster.name');
    // }
}
