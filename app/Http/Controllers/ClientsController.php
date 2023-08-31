<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trainer;
use App\Models\Gym;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    //

   
    public function index()
    {
        $currentUser = Auth::user();
        $clients = [];
        if($currentUser->is_admin === 1) {
            $clients = Client::all();
        } else {
            $trainer = Trainer::where('user_id', $currentUser->id)->first();
            $clients = Client::where('gym_id', $trainer->gym_id)->get();
        }

        return view('clients.index')->with([
            'currentUser' => $currentUser,
            'clients' => $clients,
            ]);
    }

    public function edit($idClient) {
        $currentUser = Auth::user();
        $client = Client::find($idClient);
        $gyms = Gym::all();
        $name = isset($client->user->name) ? $client->user->name : "";
        $phone_prefix = isset($client->country_phone_prefix) ? $client->country_phone_prefix : 0;
        $phone = isset($client->phone) ? $client->phone : 0;
        $height = isset($client->height) ? $client->height : 0;
        $weight = isset($client->weight) ? $client->weight : 0;
        $training_type = isset($client->training_type) ? $client->training_type : "";
        $require_checkups = isset($client->require_checkups) ? $client->require_checkups : 0;
        $checkup_frequency = isset($client->checkups_frequency) ? $client->checkups_frequency : "";
        $require_questionnaire = isset($client->require_questionnaire) ? $client->require_questionnaire : 0;
        $questionnaire_link = isset($client->questionnaire_link) ? $client->questionnaire_link : "";
        $payment_status = isset($client->payment_status) ? $client->payment_status : 0;
        $payment_method = isset($client->payment_method) ? $client->payment_method : "";
        $installment_currency = isset($client->installment_currency) ? $client->installment_currency : "";
        $installment_price = isset($client->installment_price) ? $client->installment_price : 0;
        $clientSex = isset($client->sex) ? $client->sex : "";
        $client->last_payment_date = isset($client->last_payment_date) ? $client->last_payment_date : null;
        $client->next_expiring_date = isset($client->next_expiring_date) ? $client->next_expiring_date : null;

        return view('clients.edit')->with([
            'currentUser' => $currentUser,
            'name' => $name,
            'client' => $client,
            'phone_prefix' => $phone_prefix,
            'phone' => $phone,
            'height' => $height/100,
            'weight' => $weight,
            'training_type' => $training_type,
            'require_checkups' => $require_checkups,
            'checkup_frequency' => $checkup_frequency,
            'require_questionnaire' => $require_questionnaire,
            'questionnaire_link' => $questionnaire_link,
            'payment_status' => $payment_status,
            'payment_method' => $payment_method,
            'installment_currency' => $installment_currency,
            'installment_price' => $installment_price,
            'clientSex' => $clientSex,
            'last_payment_date' => $client->last_payment_date,
            'next_expiring_date' => $client->next_expiring_date,
            'gyms' => $gyms,
            ]);
    }


    public function update(Request $request, $id)
    {
    // Retrieve the user by ID
    $client = Client::where('id', $id)->first();
    $user = User::where('id', $client->user_id)->first();

    // Update user attributes based on the form input
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    
    //update the client attributes
    $client->country_phone_prefix = $request->input('phone_prefix');
    $client->phone = $request->input('phone');
    $client->height = $request->input('height');
    $client->weight = $request->input('weight');
    $client->training_type = $request->input('training_type');
    $client->require_checkups = $request->input('require_checkups');
    $client->checkups_frequency = $request->input('checkups_frequency');
    $client->require_questionnaire = $request->input('require_questionnaire');
    $client->questionnaire_link = $request->input('questionnaire_link');
    $client->payment_status = $request->input('payment_status');
    $client->payment_method = $request->input('payment_method');
    $client->installment_currency = $request->input('installment_currency');
    $client->installment_price = $request->input('installment_price');
    $client->sex = $request->input("gender");
    $client->last_payment_date = $request->input("last_payment_date");
    $client->next_expiring_date = $request->input("next_expiring_date");

    // Save the changes
    if ($user->save() && $client->save()) {
        // Redirect back to the edit page with a success message
        return redirect()->route('clients.edit', $client->id)->with('success', 'Usuario actualizado con éxito');
    } else {
        // Redirect back to the edit page with an error message
        return redirect()->route('clients.edit', $client->id)->with('errors', 'Hubo un error al actualizar el usuario');
    }
    }

}
