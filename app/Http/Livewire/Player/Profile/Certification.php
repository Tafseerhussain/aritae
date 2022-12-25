<?php

namespace App\Http\Livewire\Player\Profile;

use Livewire\Component;
use App\Models\Player\PlayerCertification;
use Auth;
use Livewire\WithFileUploads;

class Certification extends Component
{
    use WithFileUploads;

    public $certificateName;
    public $association;
    public $certificateYear = '';
    public $certificate;

    public $editSave = 1;
    public $editRecord;
    public $deleteRecord;

    public function submit()
    {
        if ($this->editSave == 1) {
            $this->validate([
                'certificateName' => 'required',
                'association' => 'required',
                'certificateYear' => 'required',
                'certificate' => 'required|mimes:jpeg,jpg,png|max:2048',
            ]);
            $certificate = new PlayerCertification;
            $certificate->player_id = Auth::user()->player->id;
            $certificate->certificate_name = $this->certificateName;
            $certificate->association = $this->association;
            $certificate->certification_year = $this->certificateYear;

            $certificateFile = $this->certificate->store('players/certificates', 'public');
            $certificateFileSave = 'storage/'.$certificateFile;
            $certificate->certificate = $certificateFileSave;

            $certificate->save();
            session()->flash('success_message', 'Certificate Added.');

        } else {

            if ($this->certificate != '') {
                $this->validate([
                    'certificateName' => 'required',
                    'association' => 'required',
                    'certificateYear' => 'required',
                    'certificate' => 'required|mimes:jpeg,jpg,png|max:2048',
                ]);
            } else {
                $this->validate([
                    'certificateName' => 'required',
                    'association' => 'required',
                    'certificateYear' => 'required',
                ]);
            }
            

            $certificate = PlayerCertification::find($this->editRecord);
            $certificate->certificate_name = $this->certificateName;
            $certificate->association = $this->association;
            $certificate->certification_year = $this->certificateYear;

            if ($this->certificate != '') {
                if (\File::exists($certificate->certificate)) {
                    \File::delete($certificate->certificate);
                }
                $certificateFile = $this->certificate->store('players/certificates', 'public');
                $certificateFileSave = 'storage/'.$certificateFile;
                $certificate->certificate = $certificateFileSave;
            }

            $certificate->save();
            session()->flash('success_message', 'Certificate Updated.');
            
        }

        //Emit score update
        $this->emit('shouldUpdateScore');

        $this->reset();
        
    }

    public function editCertificate($id)
    {
        $certificate = PlayerCertification::find($id);
        $this->certificateName = $certificate->certificate_name ;
        $this->association = $certificate->association ;
        $this->certificateYear = $certificate->certification_year ;
        $this->editRecord = $id;
        $this->editSave = 2;
    }

    public function updateEditSave($id)
    {
        $this->editSave = $id;
        $this->reset();
    }

    public function deleteCertificate($id)
    {
        $this->deleteRecord = $id;   
    }

    public function deleteCertificatePermanent()
    {
        $certificate = PlayerCertification::find($this->deleteRecord);
        if (\File::exists($certificate->certificate)) {
            \File::delete($certificate->certificate);
        }
        $certificate->delete();

        //Emit score update
        $this->emit('shouldUpdateScore');

        session()->flash('success_message', 'Certificate Deleted.');
    }

    public function hideMessage()
    {
        session()->forget('success_message');
    }

    public function render()
    {
        return view('livewire.player.profile.certification', [
            'certificates' => PlayerCertification::where('player_id', Auth::user()->player->id)->get(),
            'crt' => PlayerCertification::find(2),
        ]);
    }
}
