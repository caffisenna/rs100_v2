<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createcar_registrationRequest;
use App\Http\Requests\Updatecar_registrationRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\car_registration;
use App\Repositories\car_registrationRepository;
use Illuminate\Http\Request;
use Flash;
use Mail;
use App\Mail\CarRegistrationCreated;

class car_registrationController extends AppBaseController
{
    /** @var car_registrationRepository $carRegistrationRepository*/
    private $carRegistrationRepository;

    public function __construct(car_registrationRepository $carRegistrationRepo)
    {
        $this->carRegistrationRepository = $carRegistrationRepo;
    }

    /**
     * Display a listing of the car_registration.
     */
    public function index(Request $request)
    {
        $carRegistrations = $this->carRegistrationRepository->paginate(10);

        return view('car_registrations.index')
            ->with('carRegistrations', $carRegistrations);
    }

    /**
     * Show the form for creating a new car_registration.
     */
    public function create()
    {
        return view('car_registrations.create');
    }

    /**
     * Store a newly created car_registration in storage.
     */
    public function store(Createcar_registrationRequest $request)
    {
        $input = $request->all();

        $carRegistration = $this->carRegistrationRepository->create($input);

        Flash::success('車両情報を登録しました。');

        $name = $input['driver_name'];
        $sendto = $input['email'];
        $uuid = $input['uuid'];
        Mail::to($sendto)->queue(new CarRegistrationCreated($name,$uuid)); // メールをqueueで送信

        // return redirect(route('car_registrations.index'));
        return view('car_registrations.download')->with(compact('name'))->with(compact('uuid'));
    }

    /**
     * Display the specified car_registration.
     */
    public function show($id)
    {
        $carRegistration = $this->carRegistrationRepository->find($id);

        if (empty($carRegistration)) {
            Flash::error('Car Registration not found');

            return redirect(route('car_registrations.index'));
        }

        return view('car_registrations.show')->with('carRegistration', $carRegistration);
    }

    /**
     * Show the form for editing the specified car_registration.
     */
    public function edit($id)
    {
        $carRegistration = $this->carRegistrationRepository->find($id);

        if (empty($carRegistration)) {
            Flash::error('Car Registration not found');

            return redirect(route('car_registrations.index'));
        }

        return view('car_registrations.edit')->with('carRegistration', $carRegistration);
    }

    /**
     * Update the specified car_registration in storage.
     */
    public function update($id, Updatecar_registrationRequest $request)
    {
        $carRegistration = $this->carRegistrationRepository->find($id);

        if (empty($carRegistration)) {
            Flash::error('Car Registration not found');

            return redirect(route('car_registrations.index'));
        }

        $carRegistration = $this->carRegistrationRepository->update($request->all(), $id);

        Flash::success('Car Registration updated successfully.');

        return redirect(route('car_registrations.index'));
    }

    /**
     * Remove the specified car_registration from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $carRegistration = $this->carRegistrationRepository->find($id);

        if (empty($carRegistration)) {
            Flash::error('Car Registration not found');

            return redirect(route('car_registrations.index'));
        }

        $this->carRegistrationRepository->delete($id);

        Flash::success('Car Registration deleted successfully.');

        return redirect(route('car_registrations.index'));
    }

    public function pdf(Request $request)
    {
        // $entryForm = User::where('id', Auth::id())->with('entryform')->first();
        $input = $request->all();
        $car_info = car_registration::where('uuid', $input['uuid'])->first();
        // dd($car_info);

        $pdf = \PDF::loadView('car_registrations.pdf', compact('car_info'));
        $pdf->setPaper('A4', 'landscape');
        // $pdf->setPaper([0, 0, 283, 420], 'landscape'); // 横レイアウト
        return $pdf->download();
        // return $pdf->stream();
    }
}
