<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Imports\ProductsImport;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Import Product')
                ->color('danger')
                ->icon('heroicon-s-arrow-down-tray')
                ->form([
                FileUpload::make('attachment')
                    ->label('Upload Template Product')
                ])
                ->action(function (array $data) {
                    $file = public_path('storage/' . $data['attachment']);
                    try {
                        Excel::import(new ProductsImport, $file);
                        Notification::make()
                            ->title('Product Imported')
                            ->success()
                            ->send();
                    } catch (\Exception $err) {
                        Notification::make()
                            ->title('Product failed to import '. $err)
                            ->danger()
                            ->send();
                    }
                }),
            Action::make('Download Template')
                ->color('success')
                ->url(route('download-template')),
            Actions\CreateAction::make(),
        ];
    }
}
