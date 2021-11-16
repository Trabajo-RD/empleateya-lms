<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;
use Livewire\WithPagination; // trait
// use Livewire\WithFileUploads; // trait
// use Illuminate\Support\Facades\Storage;

class ContactsMessages extends Component
{
    use WithPagination;
    // use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy']; // Listeners to add SweetAlert event,

    private $pagination = 10;

    public $search, $selected_id, $pageTitle, $componentName;
    public $name, $email, $phone, $message, $created_at;

    public function mount()
    {
        $this->pageTitle = 'Bandeja de entrada';
        $this->componentName = 'Mensajes';
    }

    // public function paginationView()
    // {
    //     return 'vendor.pagination.bootstrap-4';
    // }

    public function render()
    {
        if (strlen($this->search) > 0) {
            $contacts = Contact::where('status', '!=', 0);
            $contacts = $contacts->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                ->orWhere('phone', 'LIKE', '%' . $this->search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate($this->pagination);
        } else {
            $contacts = Contact::where('status', '!=', 0)
                ->orderBy('created_at', 'desc')
                ->paginate($this->pagination);
        }


        return view('livewire.admin.contacts-messages', compact('contacts'));
    }

    public function clear()
    {
        $this->reset('page');
    }

    public function Show($id)
    {
        $contact = Contact::find($id, ['id', 'name', 'email', 'phone', 'message', 'created_at']);

        $this->message = $contact->message;
        $this->selected_id = $contact->id;
        $this->name = $contact->name;
        $this->email = $contact->email;
        $this->phone = $contact->phone;
        $this->created_at = $contact->created_at;

        $contact->status = 2;
        $contact->save();

        $this->emit('show-modal', 'show modal!');
    }

    public function resetUI()
    {
    }

    /**
     * Return delete confirm
     */
    public function deleteMessageConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:deletemessageconfirm', [
            'type' => 'warning',
            'title' => 'Seguro que quieres eliminar este mensaje?',
            'text' => 'Ten en cuenta que el mensaje será eliminado del sistema, pero esto no afectará el buzón capacítate@mt.gob.do',
            'id' => $id,
        ]);
    }

    public function destroy($id)
    {

        $contact = Contact::find($id);

        $contact->status = 0;
        $contact->save();
        //$lesson->delete();

        // Section update
        // $this->section = Section::find( $this->section->id );

    }
}
