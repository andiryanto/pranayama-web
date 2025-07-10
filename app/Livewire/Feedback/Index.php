<?php

namespace App\Livewire\Feedback;

use Livewire\Component;
use App\Models\Feedback;
use App\View\Components\Layout;
use App\View\Components\Title;

#[Layout('layouts.app')] // ← gunakan atribut Layout
#[Title('Feedback')] // ← gunakan atribut Title
class Index extends Component
{
    public function render()
    {
        $feedbacks = Feedback::latest()->get();

        return view('livewire.feedback.index', [
            'feedbacks' => $feedbacks ])->layout('layouts.app');
    }
    
    public function delete($id)
    {
        Feedback::findOrFail($id)->delete();
        session()->flash('message', 'Feedback berhasil dihapus.');
    }
}
