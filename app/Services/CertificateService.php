<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Dias
 * Date: 17/08/2018
 * Time: 13:57
 */

namespace PMEexport\Services;


use Artesaos\Defender\Facades\Defender;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use PMEexport\Criteria\CertificatesByCompanyCriteria;
use PMEexport\Models\Certificate;
use PMEexport\Repositories\CertificateCategoryRepository;
use PMEexport\Repositories\CertificateRepository;
use PMEexport\Repositories\CompanyCertificateMessageRepository;
use PMEexport\Repositories\CompanyCertificateRepository;

class CertificateService
{
    /**
     * @var ProductCategoryRepository
     */
    private $certificateRepository;
    private $certificateCategoryRepository;
    /**
     * @var DocumentService
     */
    private $documentService;
    /**
     * @var CompanyCertificateRepository
     */
    private $companyCertificateRepository;
    /**
     * @var CompanyCertificateMessageRepository
     */
    private $companyCertificateMessageRepository;


    /**
     * ProductCategoryService constructor.
     */
    public function __construct(CertificateRepository $certificateRepository,
                                CertificateCategoryRepository $certificateCategoryRepository,
                                DocumentService $documentService,
                                CompanyCertificateRepository $companyCertificateRepository,
                                CompanyCertificateMessageRepository $companyCertificateMessageRepository)
    {
        $this->certificateRepository = $certificateRepository;
        $this->certificateCategoryRepository = $certificateCategoryRepository;
        $this->documentService = $documentService;
        $this->companyCertificateRepository = $companyCertificateRepository;
        $this->companyCertificateMessageRepository = $companyCertificateMessageRepository;
    }

    public function getAll()
    {
    }

    public function listCertificateCategoryWebsite()
    {
        return $this->certificateCategoryRepository->paginate();

    }

    public function listCertificateWebsite()
    {
        return $this->certificateRepository->paginate();
    }

    public function showIndexCompany($request)
    {
        //$this->certificateRepository->pushCriteria(new RequestCriteria($request));
        $certificateCategories = $this->certificateCategoryRepository->paginate();

        return view('certificates.company.index')
            ->with('certificateCategories', $certificateCategories);
    }

    public function showRequestCertificate($certificate)
    {
//        $certificate = $this->certificateRepository->findWithoutFail($id);

        if (empty($certificate)) {
            Flash::error('Certificado não encontrado');

            return redirect(route('sysCompany.certificates.index'));
        }

        return view('certificates.company.requestCertificate')
            ->with('certificate', $certificate);
    }

    public function storeRequestCertificate($request)
    {
        $input = $request->all();

        $userId = Auth::user()->id;
        $companyId = Auth::user()->company_id;

        $id = $input['certificate_id'];
        unset($input['certificate_id']);

        $certificate = $this->certificateRepository->findWithoutFail($id);

        if (empty($certificate)) {
            Flash::error('Certificado não encontrado');

            return redirect(route('sysCompany.certificates.index'));
        }

        $createRequest = array(
            'company_id' => $companyId,
            'certificate_id' => $certificate->id,
            'status' => 1,
            'request_date' => Carbon::now()
        );

        $companyCertificate = $this->companyCertificateRepository->create($createRequest);

        foreach ($certificate->certificateRequirements as $certificateRequirement) {
            if ($certificateRequirement->requirement->type == 1) {
                $imageRequest = $request->file($certificateRequirement->requirement->id);

                $path = $imageRequest->storePublicly(
                    '/imagens/documents', 's3'
                );

                $path = env('AWS_URL') . $path;

                $document = array(
                    'company_certificate_id' => $companyCertificate->id,
                    'requirement_id' => $certificateRequirement->requirement->id,
                    'user_id' => $userId,
                    'status' => 1,
                    'type' => $certificateRequirement->requirement->type,
                    'url' => $path
                );

            } else {
                $document = array(
                    'company_certificate_id' => $companyCertificate->id,
                    'requirement_id' => $certificateRequirement->requirement->id,
                    'user_id' => $userId,
                    'status' => 1,
                    'type' => $certificateRequirement->requirement->type,
                    'text' => $input[$certificateRequirement->requirement->id]
                );
            }

            $this->documentService->saveDocument($document);

        }

        Flash::success('Solicitação realizada com sucesso.');

        return redirect(route('sysCompany.certificates.index'));
    }

    public function storeRequestCertificateFromApp($request)
    {
        if (!Auth::guard('api')->check()) {
            $arrayError = array("data" => array("error" => "Erro na autenticação"));

            return $arrayError;
        }

        $user = Auth::guard('api')->user();

        $input = $request->all();

        $userId = $user->id;
        $companyId = $user->company_id;

        $id = $input['certificate_id'];
        unset($input['certificate_id']);

        $certificate = $this->certificateRepository->findWithoutFail($id);

        if (empty($certificate)) {
            $arrayError = array("data" => array("error" => "Certificado não encontrado"));

            return $arrayError;
        }

        $createRequest = array(
            'company_id' => $companyId,
            'certificate_id' => $certificate->id,
            'status' => 1,
            'request_date' => Carbon::now()
        );

        $companyCertificate = $this->companyCertificateRepository->create($createRequest);

        foreach ($certificate->certificateRequirements as $certificateRequirement) {
            $document = array(
                'company_certificate_id' => $companyCertificate->id,
                'requirement_id' => $certificateRequirement->requirement->id,
                'user_id' => $userId,
                'status' => 1,
                'type' => $certificateRequirement->requirement->type,
                'text' => $input[$certificateRequirement->requirement->id]
            );

            $this->documentService->saveDocument($document);

        }

        $array = array("data" => array("success" => true));

        return $array;
    }

    public function showCertificatesFromCompany($request)
    {
        $this->companyCertificateRepository->pushCriteria(new CertificatesByCompanyCriteria());
        $companyCertificates = $this->companyCertificateRepository->paginate();

        return view('certificates.company.listCertificatesByCompany')
            ->with('companyCertificates', $companyCertificates);
    }

    public function showCertificatesFromCompanyAPI()
    {
        $this->companyCertificateRepository->pushCriteria(new CertificatesByCompanyCriteria());
        $companyCertificates = $this->companyCertificateRepository->all();

        return $companyCertificates;
    }

    public function showCertificateToCompany($id)
    {
        $companyCertificate = $this->companyCertificateRepository->findWithoutFail($id);

        if (Auth::user()->company->id != $companyCertificate->company_id) {
            Flash::error('Certificado não encontrado');

            return redirect(route('sysCompany.certificates.myCertificates'));
        }

        if (empty($companyCertificate)) {
            Flash::error('Certificado não encontrado');

            return redirect(route('sysCompany.certificates.myCertificates'));
        }

        return view('certificates.company.show')->with('companyCertificate', $companyCertificate);
    }

    public function sendMessageRequestCertificate($request)
    {
        $input = $request->all();

        $userId = Auth::user()->id;

        $input['user_id'] = $userId;

        $this->companyCertificateMessageRepository->create($input);

        return redirect()->back();
    }

    public function listOfCertificates()
    {
        $certificateCategories = $this->certificateCategoryRepository->with('certificates')->all();

        return $certificateCategories;
    }

    public function imprimir($id)
    {
        $companyCertificate = $this->companyCertificateRepository->findWhere(['uuid'=>$id])->first();
        if (!$companyCertificate OR $companyCertificate->status != 3) {
            Flash::error('Certificado não encontrado ou não aprovado!');

            if (Defender::is('empresa') OR Defender::is('empresa_estrangeira')) {
                return redirect(route('sysCompany.certificates.myCertificates'));
            } else {
                return redirect(route('companyCertificates.index'));
            }
        }

        return view('certificates.company.imprimir')->with('companyCertificate', $companyCertificate);
    }

    public function listOfCertificatesShow($id)
    {
        $certificate = $this->certificateRepository->with('certificateRequirements', 'certificateRequirements.requirement')->findWithoutFail($id);
        return $certificate;
    }
}