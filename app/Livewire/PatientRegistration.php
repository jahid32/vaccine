<?php

namespace App\Livewire;

use App\Models\Patient;
use Livewire\Component;
use Filament\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Concerns\InteractsWithActions;

class PatientRegistration extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;


    public function registration(): Action
    {
        return Action::make('registration')
            ->label('Registration')
            ->color('primary')
            ->icon('heroicon-s-check-circle')
            ->slideOver()
            ->form([
              Section::make('Patient Registration')
                ->schema(Patient::getForm())
            ])
            ->action(function($data) {
                Patient::create($data);
                // Optionally redirect or display a success message

            })
            ->after(function () {
                Notification::make()
                    ->success()
                    ->title('Success')
                    ->body('Patient Registered Successfully')
                    ->send();
            })
            ;
    }
    //  public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }
    public function render()
    {
        return view('livewire.patient-registration');
    }
}
