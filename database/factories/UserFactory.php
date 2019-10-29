<?php

namespace App\Http\Controllers\APIs;

use App\ClinicsDoctorsPivot;
use App\Doctor;
use App\Clinic;
use App\Schedule;
use App\Events\Appointments\AppointmentAccepted;
use App\Events\Appointments\AppointmentBooked;
use App\Events\Appointments\AppointmentCanceled;
use App\Events\Appointments\AppointmentLocked;
use App\Events\Appointments\AppointmentUnLocked;
use App\Exceptions\APIs\NotSavedException;
use App\Exceptions\APIs\UnAuthorizedException;
use App\Exceptions\APIs\UnavailableException;
use App\Exceptions\APIs\ValidationException;
use App\Exceptions\APIs\IntegrationValidationCodeException;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\ReservationRequest;
use App\Patient;
use App\Reason;
use App\Services\APIAuthTrait;
use App\Services\APIResponseTrait;
use App\Services\FamilyMember;
use App\TimeSlot;
use App\Transformers\CancelReasonsTransformer;
use App\Transformers\ReservationTransformer;
use App\Transformers\Reservation\SchedulesTransformer;
use App\Transformers\Reservation\WorkplacesTransformer;
use App\UserPatient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Spatie\Fractal\Fractal;
use Spatie\Fractalistic\ArraySerializer;
use App\Services\Integration\IntegrationWebServerGuzzleTrait;
use App\Jobs\Integration\BookTimes;
use App\User;

class ReservationController extends Controller
{
    use APIResponseTrait, APIAuthTrait, IntegrationWebServerGuzzleTrait;

    /**
     * @SWG\Get(
     *   path="/v1/doctor/{Id}/reservation",
     *   summary="get all avialable time slot ",
     *   tags={"Reservation"},
     *   operationId="doctorReservation",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *     name="Id",
     *     in="path",
     *     description="ID of Doctor",
     *     required=true,
     *     type="integer",
     *     format="int64",
     *     minimum=1.0,
     *   ),
     *   @SWG\Parameter(
     *      name="token",
     *      in="query",
     *      description="Get User Object",
     *      required=false,
     *      default="",
     *      type="string"
     *    ),
     *   @SWG\Parameter(
     *      name="lang",
     *      in="query",
     *      description="Get arabic or english.",
     *      required=false,
     *      enum={"ar", "en"},
     *      type="string"
     *    ),
     *   @SWG\Response(
     *         response=200,
     *          description="successful operation",
     *              @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={true},
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          ),
     *  ),
     * )
     *
     */
    public function doctorReservation(Request $request, $id)
    {
        try {
            $user = $this->APIAuthenticate();
        } catch (\Exception $e) { }
        $doctor = Doctor::findOrFail($id);
        $data = fractal($doctor, new ReservationTransformer())
            ->serializeWith(new ArraySerializer())
            ->toArray();
        return $this->sendResponse($data);
    }

    /**
     * @SWG\Get(
     *   path="/v1/doctor/{Id}/reservation/workplaces",
     *   summary="get all workplaces",
     *   tags={"Reservation"},
     *   operationId="doctorworkplaces",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *     name="Id",
     *     in="path",
     *     description="ID of Doctor",
     *     required=true,
     *     type="integer",
     *     format="int64",
     *     minimum=1.0,
     *   ),
     *   @SWG\Parameter(
     *      name="token",
     *      in="query",
     *      description="Get User Object",
     *      required=false,
     *      default="",
     *      type="string"
     *    ),
     *   @SWG\Parameter(
     *      name="lang",
     *      in="query",
     *      description="Get arabic or english.",
     *      required=false,
     *      enum={"ar", "en"},
     *      type="string"
     *    ),
     *   @SWG\Response(
     *         response=200,
     *          description="successful operation",
     *              @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={true},
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          ),
     *  ),
     * )
     *
     */
    public function doctorWorkplaces(Request $request, $id)
    {
        try {
            $user = $this->APIAuthenticate();
        } catch (\Exception $e) { }
        $pivots = Doctor::findOrFail($id)->clinicsPivot;
        $data = fractal($pivots, new WorkplacesTransformer())
            ->serializeWith(new ArraySerializer())
            ->toArray();
        return $this->sendResponse($data);
    }

    /**
     * @SWG\Get(
     *   path="/v1/doctor/{doctor_id}/reservation/workplace/{workplace_id}",
     *   summary="get all days for this doctor in this clinic",
     *   tags={"Reservation"},
     *   operationId="doctorworkplaces",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *     name="doctor_id",
     *     in="path",
     *     description="ID of Doctor",
     *     required=true,
     *     type="integer",
     *     format="int64",
     *     minimum=1.0,
     *   ),
     *   @SWG\Parameter(
     *     name="workplace_id",
     *     in="path",
     *     description="ID of workplace",
     *     required=true,
     *     type="integer",
     *     format="int64",
     *     minimum=1.0,
     *   ),
     *   @SWG\Parameter(
     *     name="mode",
     *     in="query",
     *     description="mode of the request, (1) is booking for the first time, (2) is editing existing timeslot",
     *     required=true,
     *     type="integer",
     *     format="int64",
     *     minimum=1.0,
     *   ),
     *   @SWG\Parameter(
     *      name="token",
     *      in="query",
     *      description="Get User Object",
     *      required=false,
     *      default="",
     *      type="string"
     *    ),
     *   @SWG\Parameter(
     *      name="lang",
     *      in="query",
     *      description="Get arabic or english.",
     *      required=false,
     *      enum={"ar", "en"},
     *      type="string"
     *    ),
     *   @SWG\Response(
     *         response=200,
     *          description="successful operation",
     *              @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={true},
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          ),
     *  ),
     * )
     *
     */

    public function doctorWorkplaceTimeSlots(Request $request, $doctor_id, $clinic_id)
    {
        $pivot = ClinicsDoctorsPivot::where('clinic_id', $clinic_id)->where('doctor_id', $doctor_id)->first();
        $per_page = $request->input('per_page', 5);

        // mode is 1 for booking for the first time
        // mode is 2 for editing an exisitng appointment
        // if the clinic is not visible we will include schedules only if the mode is 2

        // edit : 07/11/2018
        // we need to show the schedule all the time for any visible clinic
        // also, we need to show the schedule if the mode == 2 and the clinic is invisible
        // the clinic will be inivisble if it's subscription has ended, but for users who need to change
        // thier appointment time, we will send the available schedule for
        $mode = $request->get('mode', 1);
        $clinic = Clinic::find($clinic_id);
        if ($mode == 1 && $clinic->visible == 0) {

            // dummy collection to handle length aware paginator exception
            // because the clinic shouldn't appear
            $schedules = Schedule::where('id', 0)->paginate($per_page);
        } else {

            $schedules = $pivot->schedules()->isActive()->upcomming()->orderBy('day')->paginate($per_page);
        }

        try {
            $user = $this->APIAuthenticate();
        } catch (\Exception $e) { }

        $data = Fractal::create()
            ->collection($schedules, new SchedulesTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($schedules))
            ->serializeWith(new ArraySerializer())
            ->toArray();

        $available_timeslots_today_count = $pivot->schedules()->availableTimeslotsTodayCount();
        $workplace = [
            'id' => $pivot->clinic->id,
            'name' => $pivot->clinic->name,
            'image' => $pivot->clinic->image_full_url,
            'rating' => $pivot->clinic->vote_stars,
            'address' => $pivot->clinic->address,
            'longitude'   => $pivot->clinic->longitude,
            'latitude'   => $pivot->clinic->latitude,
            'available_timeslots_count' => (is_int($available_timeslots_today_count)) ? $available_timeslots_today_count : 0
        ];
        $meta = $data['meta'];
        unset($data['meta']);
        return $this->sendResponse($data, null, ['meta' => $meta, 'workplace' => $workplace]);
    }

    /**
     * @SWG\Post(
     *   path="/v1/reservation/lock",
     *   summary="locked while fail form",
     *   tags={"Reservation"},
     *   operationId="lock",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *      name="token",
     *      in="query",
     *      description="user token",
     *      required=true,
     *      default="",
     *      type="string"
     *    ),
     *    
     *   @SWG\Parameter(
     *      name="timeslot_id",
     *      in="query",
     *      description="time solt id",
     *      required=true,
     *      default="",
     *      type="string"
     *    ),
     *    
     *   @SWG\Response(
     *         response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={true},
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Successfully add family member"}
     *              )
     *          ),
     *  ),

     *   @SWG\Response(
     *       response=451,
     *       description="Un Available",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={451}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"this time slot is not available"}
     *              )
     *          ),
     *   ),
     *
     *   @SWG\Response(
     *       response=470,
     *       description="Validation error",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={470}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Validation error message"}
     *              )
     *          ),
     *   ),
     *
     *   @SWG\Response(
     *       response=481,
     *       description="Invalid credentials",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={481}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Invalid credentials"}
     *              )
     *          ),
     *   ),
     *
     *   @SWG\Response(
     *       response=482,
     *       description="Inactive User",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={482}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Inactive User"}
     *              )
     *          ),
     *   ),
     *  
     *   
     * )
     *
     */
    public function lock(Request $request)
    {
        $user = $this->APIAuthenticate();

        //validate data 
        $validator = Validator::make($request->all(), [
            'timeslot_id' => 'required|exists:time_slots,id',
        ]);

        // check if vaildate fail.
        if ($validator->fails())
            throw new ValidationException($validator->errors()->first());

        //update Time Slot
        $now = \Carbon\Carbon::now();
        $locked_at =  $now;
       
        $timeslot_locktime = 300;
        $timeslot = TimeSlot::find($request->input('timeslot_id'));
         
        if (!empty($timeslot->clinic->integration->timeslot_locktime)) {
            $timeslot_locktime = $timeslot->clinic->integration->timeslot_locktime;
        }
        if ($timeslot->user_patient_id == $user->patientPivot->id) {
            $locked_at = $timeslot->locked_at;
            $locked_at2= $locked_at;
            $locked_at_after_add_locktime=$locked_at2->addSeconds($timeslot_locktime);
            if($locked_at_after_add_locktime->gt($now)){
                $timeslot_locktime = $locked_at_after_add_locktime->diffInSeconds($now);
            }else{
                $locked_at=$now;
            }
            $timeslot->unlock();

            // $timeslot_locktime_after_diff= $timeslot_locktime - $time_diff;
            // if($timeslot_locktime_after_diff < 0)
            // {
                
            // }
            // else{
            //     $timeslot_locktime=$timeslot_locktime_after_diff;
            // }
            
        }
        
       // gmdate('H:i:s', $totalDuration);
      

         
        if ($timeslot->isAvailable()) {

            $timeslot->status = 7;
            $timeslot->user_patient_id = $user->patientPivot->id;
            $timeslot->locked_at = $locked_at;
            if ($timeslot->update()) {
                event(new AppointmentLocked($timeslot));
                $data['timeslot_locktime'] = $timeslot_locktime;
                $data['locked_at'] = $locked_at->toDateTimeString();
                $data['now'] = $now->toDateTimeString();
                return $this->sendResponse($data, trans('messages.successfully_update'));
            } else
                throw new NotSavedException(trans('messages.error_update'));
        } else {
            throw new UnavailableException('this time slot is not available');
        }
    }

    /**
     * @SWG\Post(
     *   path="/v1/reservation/unlock",
     *   summary="unlock reservation to be avilable",
     *   tags={"Reservation"},
     *   operationId="lock",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *      name="token",
     *      in="query",
     *      description="user token",
     *      required=true,
     *      default="",
     *      type="string"
     *    ),
     *    
     *   @SWG\Parameter(
     *      name="timeslot_id",
     *      in="query",
     *      description="time solt id",
     *      required=true,
     *      default="",
     *      type="string"
     *    ),
     *    
     *   @SWG\Response(
     *         response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={true},
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Successfully add family member"}
     *              )
     *          ),
     *  ),
     *
     *   @SWG\Response(
     *       response=470,
     *       description="Validation error",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={470}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Validation error message"}
     *              )
     *          ),
     *   ),
     *
     *   @SWG\Response(
     *       response=481,
     *       description="Invalid credentials",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={481}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Invalid credentials"}
     *              )
     *          ),
     *   ),
     *
     *   @SWG\Response(
     *       response=482,
     *       description="Inactive User",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={482}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Inactive User"}
     *              )
     *          ),
     *   ),
     *  
     *   
     * )
     *
     */
    public function unlock(Request $request)
    {
        $user = $this->APIAuthenticate();

        //validate data 
        $validator = Validator::make($request->all(), [
            'timeslot_id' => 'required|exists:time_slots,id',
        ]);

        // check if vaildate fail.
        if ($validator->fails()) {
            throw new ValidationException($validator->errors()->first());
        }

        //update Time Slot
        $timeslot = TimeSlot::find($request->input('timeslot_id'));
        if ($timeslot->isLocked() && $timeslot->user_patient_id == $user->patientPivot->id) {

            // we will call the integration api only if the clinic is part of an integration
            if (!empty($timeslot->clinic->integration)) {

                // false is for unlocking
                $request_params = $this->prepareLockOrUnlockTimeslotRequestParams($timeslot, false);
                // 1 for locking
                $call = $this->callIntegrationWebServer($timeslot->clinic->integration, $request_params, 1);

                if ($call['success'] == false)
                    throw new ValidationException(trans('messages.appointment.not_unlocked'));
            }

            event(new AppointmentUnLocked($timeslot));
            if ($timeslot->reset(true))
                return $this->sendResponse([], trans('messages.successfully_update'));
            else
                throw new NotSavedException(trans('messages.error_update'));
        } else {
            throw new ValidationException('you cant unlock this  time slot');
        }
    }

    /**
     * @SWG\Post(
     *   path="/v1/reservation/{Id}/create",
     *   summary="booking reservation",
     *   tags={"Reservation"},
     *   operationId="create`",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *     name="Id",
     *     in="path",
     *     description="ID of time slot",
     *     required=true,
     *     type="integer",
     *     format="int64",
     *     minimum=1.0,
     *   ),
     *   @SWG\Parameter(
     *      name="token",
     *      in="query",
     *      description="Get User Object",
     *      required=true,
     *      default="",
     *      type="string"
     *    ),
     *    
     *   @SWG\Parameter(
     *          in="body",
     *          name="Request Parameters",
     *          @SWG\Schema(
     *
     *              @SWG\Property(
     *                  property="first_name",
     *                  type="String",
     *                  enum={"abdullah"}
     *              ),
     *
     *              @SWG\Property(
     *                  property="last_name",
     *                  type="String",
     *                  enum={"ghanem"}
     *              ),
     *              type="object",
     *              @SWG\Property(
     *                  property="patient_id",
     *                  type="integer",
     *                  enum={25}
     *              ),  
     * *            @SWG\Property(
     *                  property="national_id",
     *                  type="String",
     *                  enum={"413254321436241623"}
     *              ),
     *
     * *             @SWG\Property(
     *                  property="national_id_type",
     *                  type="intger",
     *                  enum={1}
     *              ),
     *              
     *              @SWG\Property(
     *                  property="mobile_no",
     *                  type="integer",
     *                  enum={0101300132}
     *              ),   
     *              @SWG\Property(
     *                  property="mobile_country_id",
     *                  type="integer",
     *                  enum={1}
     *              ),
     *              @SWG\Property(
     *                  property="code",
     *                  type="integer",
     *                  enum={1234}
     *              ),
     *              
     *               @SWG\Property(
     *                  property="country_id",
     *                  type="integer",
     *                  enum={7}
     *              ),
     *              
     *               @SWG\Property(
     *                  property="old_time_slot_id",
     *                  type="integer",
     *                  enum={1}
     *              ),
     *
     *               @SWG\Property(
     *                  property="payment_type",
     *                  type="integer",
     *                  enum={1}
     *              ),
     *
     *               @SWG\Property(
     *                  property="insurance_company_id",
     *                  type="integer",
     *                  enum={"19"}
     *              ),
     *              @SWG\Property(
     *                  property="policy_number",
     *                  type="Integer",
     *                  enum={67476547346574}
     *              ),
     *
     *              @SWG\Property(
     *                  property="policy_exp_date",
     *                  type="Number",
     *                  enum={4764675778456756}
     *              ),
     *          )  
     *   ),   
     *   
     *   @SWG\Response(
     *         response=200,
     *          description="successful operation",
     *              @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={true},
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          ),
     *  ),
     *
     *  @SWG\Response(
     *       response=401,
     *       description="Unauthenticated",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={401}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Unauthenticated"}
     *              )
     *          ),
     *   ),
     *
     *  @SWG\Response(
     *       response=404,
     *       description="Record not found",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={404}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Record not found"}
     *             )
     *       ),
     *   ),
     *   
     *  *  @SWG\Response(
     *       response=489,
     *       description="Missing Token",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={489}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Missing Token"}
     *              )
     *          ),
     *   ),
     *
     *
     *  @SWG\Response(
     *       response=488,
     *       description="Invalid Token",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={488}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Invalid Token"}
     *              )
     *          ),
     *   ),
     *
     *
     *  @SWG\Response(
     *       response=484,
     *       description="Token Died",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={484}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Token Died"}
     *              )
     *          ),
     *   ),
     *
     *
     *  @SWG\Response(
     *       response=485,
     *       description="Token Expired",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={485}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Token Expired"}
     *              )
     *          ),
     *   ),
     *
     *  @SWG\Response(
     *       response=486,
     *       description="Missing refresh token",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={486}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Missing refresh token"}
     *              )
     *          ),
     *   ),
     *
     *  @SWG\Response(
     *       response=487,
     *       description="Invalid refresh Token",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={487}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Invalid refresh Token"}
     *              )
     *          ),
     *   ),
     * 
     * )
     *
     *
     * )
     *
     */
    public function store(Request $request, $id)
    {
        $user = $this->APIAuthenticate();
        $timeslot = TimeSlot::findOrFail($id);

        //check if found changes in response patient data
        if ($request->get('patient_id')) {
            $family_member = new FamilyMember($user, $request);
            $user_patient = $family_member->update();
        } else {
            $is_baby = ($request->national_id_type == 4);
            if ($is_baby) {
                $family_member = new FamilyMember($user, $request);
                $user_patient = $family_member->createBaby();
                // dd($user_patient);
            } else {
                $family_member = new FamilyMember($user, $request);
                $user_patient = $family_member->create();
            }
        }

        if ($request->input('old_time_slot_id') && $request->input('old_time_slot_id') > 0) {
            $old_time_slot = TimeSlot::findOrFail($request->input('old_time_slot_id'));
            if ($old_time_slot->isRelatedForUser(auth()->user())) {
                if (!empty($old_time_slot->clinic->integration)) {
                    // false is for unlocking
                    $request_params = $this->prepareCancelTimeslotRequestParams(
                        $old_time_slot,
                        $old_time_slot->userPatient,
                        $old_time_slot->userPatient->patient,
                        0
                    );

                    // 3 Cancel
                    $call = $this->callIntegrationWebServer($old_time_slot->clinic->integration, $request_params, 3);

                    if ($call['success'] == false) {
                        // throw new ValidationException(trans('messages.appointment.error_cancel'));
                    }
                }
                $old_time_slot->reset(true);
            }
        }

        // Check if Patient has upcomming appointment for this pivot [ Clinic / Admin ]
        // if ($user_patient->hasUpcommingAppointmentsOn($timeslot->schedule->clinic_doctor_pivot_id)) {
        //     // throw new ValidationException(trans('messages.reserve.patient_already_has_upcoming'));
        // }
        // // Check if Patient has upcomming appointment Intersects With Appointment Time Interval
        // if ($user_patient->hasUpcommingAppointmentsIntersectsWith($timeslot)) {
        //     // throw new ValidationException(trans('messages.reserve.patient_has_intersected_appointment'));
        // }
        // // Check if Patient has upcomming appointment for this pivot [ Clinic / Admin ] (in case of two patient with the same national id and the same id type with diff mobile numbers)
        // if ($user_patient->patient->hasUpcommingAppointmentsOn($timeslot->schedule->clinic_doctor_pivot_id)) {
        //     // throw new ValidationException( trans( 'messages.reserve.patient_already_has_upcoming' )); 
        // }
        // Check if Patient has upcomming appointment Intersects With Appointment Time Interval (in case of two patient with the same national id and the same id type with diff mobile numbers)
        // if ($user_patient->patient->hasUpcommingAppointmentsIntersectsWith($timeslot)) {
        //     // throw new ValidationException( trans('messages.reserve.patient_has_intersected_appointment'));
        // }


        if ($timeslot->user_patient_id == $user->patientPivot->id && $timeslot->islocked()) {
            // if (!$clinic_doctor_pivot->validateGender($user_patient)) {
            // throw new ValidationException(trans('messages.error_validate_gender_'.$user_patient->patient->gender));
            // }
            // if (!$clinic_doctor_pivot->validateAge($user_patient)) {
            // throw new ValidationException($pivot->validateAgeErrorMessage());
            // };
            return $this->bookTimeslot($timeslot, $user_patient, $request);
        } else {
            throw new ValidationException('you cant reserved in this time slot right now');
        }
    }

    public function bookTimeslot(TimeSlot $timeslot, UserPatient $user_patient, $request)
    {
        if ($user_patient->hasUpcommingTimeslotWithDoctor($timeslot->schedule->clinicDoctorPivot, $request->input('old_time_slot_id'))) {
            throw new ValidationException(trans('messages.reserve.patient_already_has_upcoming'));
        }

        if ($user_patient->hasUpcommingTimeslotsOnSameTimeslot($timeslot, $request->input('old_time_slot_id'))) {
            throw new ValidationException(trans('messages.reserve.patient_has_intersected_appointment'));
        }
        // we will call the integration api only if the clinic is part of an integration
        if (!empty($timeslot->clinic->integration)) {

            $request_params = $this->prepareBookTimeslotRequestParams(
                $timeslot,
                $user_patient,
                $user_patient->patient,
                $request->get('payment_type'),
                $request->get('code')
            );

            $call = $this->callIntegrationWebServer($timeslot->clinic->integration, $request_params, 2); # 2 For Booking

            if ($call['success'] == true) {
                logger('success');
            }

            // the request has failed completely
            if ($call['success'] == false) {
                logger('test 1');
                throw new ValidationException(trans('messages.appointment.hospital_error'));
            }

            // the user need to verify himself/herelf
            elseif ($call['success'] == true && $call['message'] == 'verify') {
                // IntegrationValidationCodeException
                logger('test 2');

                throw new IntegrationValidationCodeException(trans('messages.enter_hospital_verfication_code'));
            }
        }

        $timeslot->user_patient_id = $user_patient->id;
        $timeslot->status = ($timeslot->isAutoApprove()) ? TimeSlot::STATUSES['reserved'] : TimeSlot::STATUSES['pending'];
        $timeslot->payment_type = $request->input('payment_type');
        $timeslot->code = $timeslot->codeGenerate();

        if ($request->input('payment_type') ==  2) {
            $timeslot->payment_type = 2;
            $timeslot->medical_insurance_company_id = $request->input('insurance_company_id');
            $timeslot->policy_number = $request->input('policy_number');
            $timeslot->policy_expiration_date = $request->input('policy_exp_date');
        }

        logger('test -3');

        if ($timeslot->update()) {
            logger('test 3');
            ($timeslot->isAutoApprove()) ? event(new AppointmentAccepted($timeslot)) : event(new AppointmentBooked($timeslot));
            return $this->sendResponse([], trans('messages.successfully_update'));
        } else {
            logger('test 4');

            throw new NotSavedException(trans('messages.error_update'));
        }
    }

    /**
     * @SWG\Post(
     *   path="/v1/reservation/{Id}/cancel",
     *   summary="cancel reservation",
     *   tags={"Reservation"},
     *   operationId="cancel",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *     name="Id",
     *     in="path",
     *     description="ID of waiting list",
     *     required=true,
     *     type="integer",
     *     format="int64",
     *     minimum=1.0,
     *   ),
     *   @SWG\Parameter(
     *      name="token",
     *      in="query",
     *      description="Get User Object",
     *      required=true,
     *      default="",
     *      type="string"
     *    ),
     *       
     *    @SWG\Parameter(
     *      name="patient_id",
     *      in="query",
     *      description="Id of patient you want cancel his reservation",
     *      required=true,
     *      default="",
     *      type="integer"
     *    ),
     *   @SWG\Response(
     *         response=200,
     *          description="successful operation",
     *              @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={true},
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          ),
     *  ),
     *
     *  @SWG\Response(
     *       response=401,
     *       description="Unauthenticated",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={401}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Unauthenticated"}
     *              )
     *          ),
     *   ),
     *
     *  @SWG\Response(
     *       response=404,
     *       description="Record not found",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={404}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Record not found"}
     *             )
     *       ),
     *   ),
     *   
     *  *  @SWG\Response(
     *       response=489,
     *       description="Missing Token",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={489}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Missing Token"}
     *              )
     *          ),
     *   ),
     *
     *
     *  @SWG\Response(
     *       response=488,
     *       description="Invalid Token",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={488}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Invalid Token"}
     *              )
     *          ),
     *   ),
     *
     *
     *  @SWG\Response(
     *       response=484,
     *       description="Token Died",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={484}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Token Died"}
     *              )
     *          ),
     *   ),
     *
     *
     *  @SWG\Response(
     *       response=485,
     *       description="Token Expired",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={485}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Token Expired"}
     *              )
     *          ),
     *   ),
     *
     *  @SWG\Response(
     *       response=486,
     *       description="Missing refresh token",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={486}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Missing refresh token"}
     *              )
     *          ),
     *   ),
     *
     *  @SWG\Response(
     *       response=487,
     *       description="Invalid refresh Token",
     *           @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={false},
     *              ),
     *              @SWG\Property(
     *                  property="error_code",
     *                  type="Integer",
     *                   enum={487}
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string",
     *                  enum={"Invalid refresh Token"}
     *              )
     *          ),
     *   ),
     * 
     * )
     *
     *
     * )
     *
     */
    public function cancel(Request $request, $id)
    {
        $user = $this->APIAuthenticate();
        $timeslot = TimeSlot::findOrFail($id);

        if (
            in_array($request->input('patient_id'), $user->patientsPivot->pluck('id')->toArray()) ||
            in_array($request->input('patient_id'), $user->relatedPatientsPivot()->pluck('id')->toArray())
        ) {
            if ($timeslot->user_patient_id == $request->input('patient_id')) {

                // we will call the integration api only if the clinic is part of an integration
                if (!empty($timeslot->clinic->integration)) {

                    // false is for unlocking
                    $request_params = $this->prepareCancelTimeslotRequestParams(
                        $timeslot,
                        $timeslot->userPatient,
                        $timeslot->userPatient->patient,
                        $request->get('reason_id')
                    );

                    // 3 for locking
                    $call = $this->callIntegrationWebServer($timeslot->clinic->integration, $request_params, 3);

                    if ($call['success'] == false) {
                        // throw new ValidationException(trans('messages.appointment.error_cancel'));
                    }
                }


                $code = $timeslot->code;
                event(
                    new AppointmentCanceled(
                        $timeslot,
                        UserPatient::find($request->input('patient_id')),
                        $request->input('reason_id'),
                        $code
                    )
                );
            }
            if ($timeslot->reset(true))
                return $this->sendResponse([], trans('messages.successfully_update'));
            else
                throw new NotSavedException(trans('messages.error_update'));
        } else
            throw new ValidationException('you dont reserved in this time slot');
    }

    /**
     * @SWG\Get(
     *   path="/v1/cancel_reasons",
     *   summary="get all Cancel Reasons",
     *   tags={"Reservation"},
     *   operationId="cancelReasons",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *      name="lang",
     *      in="query",
     *      description="Get arabic or english.",
     *      required=false,
     *      enum={"ar", "en"},
     *      type="string"
     *    ),
     *   @SWG\Parameter(
     *      name="type",
     *      in="query",
     *      description="Get patient 1/ doctor 2 resasons",
     *      required=true,
     *      enum={1, 2},
     *      type="string"
     *    ),
     *   @SWG\Response(
     *         response=200,
     *          description="successful operation",
     *              @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean",
     *                  enum={true},
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          ),
     *  ),
     * )
     *
     */
    public function cancelReasons(Request $request)
    {
        $reasons = [];
        if ($request->has('type') && ((int) $request->get('type') < 3) && ((int) $request->get('type') > 0)) {
            $reasons = Reason::where('type', $request->get('type'))->get();
        }

        $output = [];
        foreach ($reasons as $reason) {
            $output[] = [
                'id' => $reason->id,
                'reason' => $reason->text,
            ];
        }

        return $this->sendResponse($output);
    }
}
