<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Http\Resources\CertificateResource;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $certificate_number)
    {
        $certificate = Certificate::with([
            'admission.student.gender',
            'admission.course',
            'admission.courseStatus',
            'admission.result',
        ])
        ->where('certificate_number', $certificate_number)
        ->firstOrFail();

        return new CertificateResource($certificate);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCertificateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        //
    }
}
