<?php

namespace App\Http\Controllers\employee;

use App\employee;
use App\employeeSkill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class employeeController extends Controller {
    public function index() {
        return view( 'employee.index', [ 'employeeList' => employee::all() ] );
    }

    public function createEmployee( Request $request ) {
        $this->validate(
            $request, [
                'firstName'         => 'required|max:255',
                'lastName'          => 'required|max:255',
                'contactNumber'     => 'required|max:20',
                'emailAddress'      => 'required|email|max:255',
                'datepicker'        => 'required|max:10',
                'streetAddress'     => 'required|max:255',
                'cityAddress'       => 'required|max:255',
                'postalCodeAddress' => 'required|max:255',
                'countryAddress'    => 'required|max:255',
            ]
        );

        $insert                      = new employee();
        $insert->first_name          = $request->get( 'firstName' );
        $insert->last_name           = $request->get( 'lastName' );
        $insert->contact             = $request->get( 'contactNumber' );
        $insert->email               = $request->get( 'emailAddress' );
        $insert->dob                 = $request->get( 'datepicker' );
        $insert->street_address      = $request->get( 'streetAddress' );
        $insert->city_address        = $request->get( 'cityAddress' );
        $insert->postal_code_address = $request->get( 'postalCodeAddress' );
        $insert->country_address     = $request->get( 'countryAddress' );
        $insert->save();

        if ( ! $insert->id ) {
            return redirect( 'employee.index' )->with( 'error', 'Something went wrong, please try again.' );
        }

        for ( $k = 0; $k < count( $request->get( 'nameSkill' ) ); ++$k ) {
            employeeSkill::insert( [
                'employee_id' => $insert->id,
                'skill_name'  => $request->get( 'nameSkill' )[ $k ],
                'yrs_exp'     => $request->get( 'yrsExpSkill' )[ $k ],
                'rating'      => $request->get( 'ratingSkill' )[ $k ],
            ] );
        }

        return view( 'employee.index', [ 'employeeList' => employee::all() ] );
    }

    public function updateEmployee( Request $request ) {
        $this->validate(
            $request, [
                'firstName'         => 'required|max:255',
                'lastName'          => 'required|max:255',
                'contactNumber'     => 'required|max:20',
                'emailAddress'      => 'required|email|max:255',
                'datepicker'        => 'required|max:10',
                'streetAddress'     => 'required|max:255',
                'cityAddress'       => 'required|max:255',
                'postalCodeAddress' => 'required|max:255',
                'countryAddress'    => 'required|max:255',
            ]
        );

        $update = employee::where( 'id', "......" )
                          ->update( [
                              'first_name'          => $request->get( 'firstName' ),
                              'last_name'           => $request->get( 'lastName' ),
                              'contact'             => $request->get( 'contactNumber' ),
                              'email'               => $request->get( 'emailAddress' ),
                              'dob'                 => $request->get( 'datepicker' ),
                              'street_address'      => $request->get( 'streetAddress' ),
                              'city_address'        => $request->get( 'cityAddress' ),
                              'postal_code_address' => $request->get( 'postalCodeAddress' ),
                              'country_address'     => $request->get( 'countryAddress' )
                          ] );
        for ( $k = 0; $k < count( $request->get( 'programming_languages' ) ); ++$k ) {
            $insert = employeeSkill::where( 'id', "......" )
                                   ->update( [
                                       'employee_id' => $insert->insertGetId(),
                                       'skill_name'  => $request->get( 'nameSkill' )[ $k ],
                                       'yrs_exp'     => $request->get( 'yrsExpSkill' )[ $k ],
                                       'rating'      => $request->get( 'ratingSkill' )[ $k ],
                                   ] );
        }

        return view( 'employee.index', [ 'employeeList' => employee::all() ] );
    }

    public function deleteEmployee( Request $request ) {
        employee::where( 'id', "......" )->delete();
        employeeSkill::where( 'id', "......" )->delete();
        return view( 'employee.index', [ 'employeeList' => employee::all() ] );
    }

    public function fetchEmployee( $id ) {
        return json_encode(employee::where( 'id', $id )->first());
    }
}
