<?php

namespace App\Http\Livewire\Coach\Profile;

use Livewire\Component;
use App\Models\CoachCertification;
use Auth;
use Livewire\WithFileUploads;

class Certification extends Component
{
    use WithFileUploads;

    public $certificateName;
    public $clubName;
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
                'clubName' => 'required',
                'certificateYear' => 'required',
                'certificate' => 'required|mimes:jpeg,jpg,png|max:2048',
            ]);
            $certificate = new CoachCertification;
            $certificate->coach_id = Auth::user()->coach->id;
            $certificate->certificate_name = $this->certificateName;
            $certificate->club_college = $this->clubName;
            $certificate->certification_year = $this->certificateYear;

            $certificateFile = $this->certificate->store('coaches/certificates', 'public');
            $certificateFileSave = 'storage/'.$certificateFile;
            $certificate->certificate = $certificateFileSave;

            $certificate->save();
            session()->flash('success_message', 'Certificate Added.');

        } else {

            if ($this->certificate != '') {
                $this->validate([
                    'certificateName' => 'required',
                    'clubName' => 'required',
                    'certificateYear' => 'required',
                    'certificate' => 'required|mimes:jpeg,jpg,png|max:2048',
                ]);
            } else {
                $this->validate([
                    'certificateName' => 'required',
                    'clubName' => 'required',
                    'certificateYear' => 'required',
                ]);
            }
            

            $certificate = CoachCertification::find($this->editRecord);
            $certificate->certificate_name = $this->certificateName;
            $certificate->club_college = $this->clubName;
            $certificate->certification_year = $this->certificateYear;

            if ($this->certificate != '') {
                if (\File::exists($certificate->certificate)) {
                    \File::delete($certificate->certificate);
                }
                $certificateFile = $this->certificate->store('coaches/certificates', 'public');
                $certificateFileSave = 'storage/'.$certificateFile;
                $certificate->certificate = $certificateFileSave;
            }

            $certificate->save();
            session()->flash('success_message', 'Certificate Updated.');
            
        }
        $this->reset();
        
    }

    public function editCertificate($id)
    {
        $coach = CoachCertification::find($id);
        $this->certificateName = $coach->certificate_name ;
        $this->clubName = $coach->club_college ;
        $this->certificateYear = $coach->certification_year ;
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
        $certificate = CoachCertification::find($this->deleteRecord);
        if (\File::exists($certificate->certificate)) {
            \File::delete($certificate->certificate);
        }
        $certificate->delete();
        session()->flash('success_message', 'Certificate Deleted.');
    }

    public function hideMessage()
    {
        session()->forget('success_message');
    }

    public function render()
    {
        return view('livewire.coach.profile.certification', [
            'certificates' => CoachCertification::where('coach_id', Auth::user()->coach->id)->get(),
        ]);
    }
}
