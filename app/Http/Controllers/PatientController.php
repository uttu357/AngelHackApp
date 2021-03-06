<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Medical_log;
use App\Appointment;
use App\Doctor; 


class PatientController extends Controller
{

    public function index($name)
    {
    	$user = self::getCurrentUser();
        $status;

        if($user->is_doctor())
    	{
    		$patient = User::getUserBy('name', $name);
            $status = 0;
            $all_common_logs = Medical_log::getAllUserLogsforDoctor($user, $patient->id);
            $current_appointment = Appointment::getCurrentAppointmentForUser($patient);
            return view('pages/doctor_patient_index',[
                'logs' => $all_common_logs,
                'patient' => $patient,
                'appointment' => $current_appointment,
                'status' => $status
            ]);
            // if($patient->doctor()->email == $user->email){
            //     $status = 0;
            //     $all_common_logs = Medical_log::getAllUserLogsforDoctor($user, $patient->id);
            //     return view('pages/doctor_patient_index',[
            //             'logs' => $all_common_logs,
            //             'patient' => $patient,
            //             'status' => $status
            //         ]);
            // }    
            // elseif($this->checkIfTreatedinThePast($patient, $user)){
            //     $status = 1;
            //     $all_common_logs = Medical_log::getAllUserLogsforDoctor($user, $patient->id);
            //     return view('pages/doctor_patient_index',[
            //             'logs' => $all_common_logs,
            //             'patient' => $patient,
            //             'status' => $status
            //         ]);    
            // }    		
       	}
       	else
       	{
       		// when user clicks anywhere on the family tree
       		// just show person's profile - patients/person

       		
       	}
    }

    public function newAppointment(Request $request)
    {
        $user = self::getCurrentUser();

        $name = $request->input('name');

        $patient = User::getUserBy('name', $name);

        //dd($patient->doctor_id);

        if(is_null($patient->doctor_id) || $patient->doctor_id == '0' || $patient->doctor_id == 0)
        {
            $user->createAppointmentForUser($patient);

            return redirect('/current_patients');
        }
        else
        {
            return redirect('/patient/'.$patient->name);
        }


    }

    public function appendLogs(Request $request, $name)
    {
    	$patient = User::getUserBy('name', $name);
        $user = self::getCurrentUser();
    	if($user->is_doctor())
    	{
    		
            $user->createMedicalLogForUser($patient, $request->all());

            return back();
    	}
    	else
    	{
    		//
    	}
    }
    public function checkIfTreatedinThePast($patient, $user){
        $appointments = $patient->appointments();
        foreach ($appointments as $appointment) {
            if($appointment->doctor() == $user){
                return True;
            }
        }
        return False;
    }

    public function checkIfFamilyMember($member, $user){
        $patients = $user->patients();
        foreach ($patients as $patient) {
            if(in_array($member, $patient->relationsLeftToRight)){
                return True;
            }
        }
        return False;
    }


    public function familyIndex($name)
    {
    	$user = self::getCurrentUser();
        $patient = User::getUserBy('name', $name);

    	$object_array = $patient->relationsLeftToRight;

    	//$object_array[i]->pivot->first_user = PATIENT ENTERED (center one)
    	//$object_array[i]->pivot->second_user = Which is to be drawn on tree
    	//$object_array[i]->pivot->relations = how second_user is related to first (center one)

    	if($user->is_doctor())
    	{
    		return view('pages/doctor_patient_family',[
                'patient' => $patient,
                'nodes' => $object_array
            ]);
    	}
    	else
    	{
    		if($user->name == $name)
    		{
    			
    			// patients - > their family only. /patients/$user->name/family
    			// family view without search box
    			// with option to add family members via email
    		}
    		else
    		{
    			abort(400, "Are you lost");
    		}
    		
    	}
    }

    public function getHistory()
    {
        $user = self::getCurrentUser();

        if($user->is_doctor())
        {
            $all_patients = $user->getAllAppointments();
        }
    }
}
