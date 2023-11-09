<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DivisionMasterController;
use App\Http\Controllers\Admin\LetterReminderMasterController;
use App\Http\Controllers\Admin\MasterFormController;
use App\Http\Controllers\Admin\ProjectMasterController;
use App\Http\Controllers\Admin\ProposalMasterController;
use App\Http\Controllers\Admin\SubDivisionMasterController;
use App\Http\Controllers\Admin\UserMasterController;
use App\Http\Controllers\AuditorAccount\BudgetaryDetailController;
use App\Http\Controllers\AuditorAccount\DlpPeriodController;
use App\Http\Controllers\AuditorAccount\ExcessDetailController;
use App\Http\Controllers\AuditorAccount\ExpenditureDetailController;
use App\Http\Controllers\AuditorAccount\FdrController;
use App\Http\Controllers\AuditorAccount\FmgController;
use App\Http\Controllers\AuditorAccount\TimeExtensionController;
use App\Http\Controllers\AuditorAccount\WorkStatusController;
use App\Http\Controllers\CurrentReapringController;
use App\Http\Controllers\Master\MasterController;
use App\Http\Controllers\PbBranch\AdministrativeApprovalController;
use App\Http\Controllers\PbBranch\BasicBranchController;
use App\Http\Controllers\PbBranch\BlockEstimateSubmitDetailController;
use App\Http\Controllers\PbBranch\ForestClearenceDetailController;
use App\Http\Controllers\PbBranch\LaqApprovalController;
use App\Http\Controllers\PbBranch\PbBranchLoginController;
use App\Http\Controllers\PbBranch\PrincipalApprovalDetailController;
use App\Http\Controllers\PbBranch\ProposalSubmittedDetailController;
use App\Http\Controllers\PbBranch\TechnicalSectionDetailController;
use App\Http\Controllers\PbBranch\UtilityShiftingDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Tender\DepositOrderController;
use App\Http\Controllers\Tender\DtpApprovalController;
use App\Http\Controllers\Tender\NitController;
use App\Http\Controllers\Tender\TpiDetaileController;
use App\Models\PbBranch\PbBranchLogin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');


//admin-login
Route::get('/', [AdminAuthController::class, 'index'])->name('admin_login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin_login_submit');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin_logout');



Route::group(['middleware' => ['auth']], function () {

    //master-formproposal-master
    Route::get('/master-form', [MasterFormController::class, 'index'])->name('master_form');


    //master insert
    Route::post('/master-insert', [MasterController::class, 'insert'])->name('master_insert');

    //proposal_master
    Route::get('/proposal-master', [ProposalMasterController::class, 'index'])->name('proposal_master');
    Route::post('/proposal-master-insert', [ProposalMasterController::class, 'insert'])->name('proposal_master_insert');
    Route::post('/get-proposal-master', [ProposalMasterController::class, 'get_proposal_master'])->name('get_proposal_master');
    Route::get('/proposal-master-edit/{id}', [ProposalMasterController::class, 'proposal_master_edit'])->name('edit_proposal_master');
    Route::post('/proposal-delete', [ProposalMasterController::class, 'delete'])->name('proposal_delete');
    Route::get('/show-proposal-master/{id}', [ProposalMasterController::class, 'show_proposal_master'])->name('show_proposal_master');
    //user_master
    Route::get('/user-master', [UserMasterController::class, 'index'])->name('user_master');
    Route::post('/user-insert', [UserMasterController::class, 'insert'])->name('user_master_insert');
    Route::post('/get-user', [UserMasterController::class, 'get_user_list'])->name('get_user_list');
    Route::get('/user-edit/{id}', [UserMasterController::class, 'user_edit'])->name('user_edit');
    Route::post('/user-delete', [UserMasterController::class, 'delete'])->name('user_delete');

    // project_master
    Route::get('/project-master', [ProjectMasterController::class, 'index'])->name('project_master');
    Route::get('/project-master/create', [ProjectMasterController::class, 'create'])->name('project_master.create');
    Route::post('/get-project-master', [ProjectMasterController::class, 'get_project_master'])->name('get_project_master');
    Route::get('/edit-basic/{id}', [ProjectMasterController::class, 'master_edit'])->name('edit_project_master');
    Route::post('/project-master-delete', [ProjectMasterController::class, 'delete'])->name('project_master_delete');
    Route::get('/project-master-export', [ProjectMasterController::class, 'project_export'])->name('project_export');
    Route::get('/project-sheet', [ProjectMasterController::class, 'projectSheet'])->name('project_sheet');
    // Route::get('/get-scheme-name/{roadScheme}', [ProjectMasterController::class, 'name_scheme'])->name('sheme_name');
    Route::get('/get-basic-name-scheme/{selectedBudgetId}', [ProjectMasterController::class, 'getBasicNameScheme']);
    //division_master
    Route::get('/division-master', [DivisionMasterController::class, 'index'])->name('division_master');
    Route::post('/division-insert', [DivisionMasterController::class, 'insert'])->name('division_insert');
    Route::post('/get-division', [DivisionMasterController::class, 'get_division_list'])->name('get_division_list');
    Route::get('/division-edit/{id}', [DivisionMasterController::class, 'division_edit'])->name('division_edit');
    Route::post('/division-delete', [DivisionMasterController::class, 'delete'])->name('division_delete');

    //sub-division_master
    Route::get('/sub-division-master', [SubDivisionMasterController::class, 'index'])->name('sub_division_master');
    Route::post('/sub-division-insert', [SubDivisionMasterController::class, 'insert'])->name('sub_division_insert');
    Route::post('/get-sub-division', [SubDivisionMasterController::class, 'get_sub_division_list'])->name('get_sub_division_list');
    Route::get('/sub-division-edit/{id}', [SubDivisionMasterController::class, 'sub_division_edit'])->name('sub_division_edit');
    Route::post('/sub-division-delete', [SubDivisionMasterController::class, 'delete'])->name('sub_division_delete');

    //letter_reminder_master
    Route::get('/letter-reminder-master', [LetterReminderMasterController::class, 'index'])->name('letter_reminder_master');
    Route::post('/letter-reminder-insert', [LetterReminderMasterController::class, 'insert'])->name('letter_reminder_insert');
    Route::post('/get-letter-reminder', [LetterReminderMasterController::class, 'get_letter_reminder'])->name('get_letter_reminder');
    Route::get('/letter-reminder-edit/{id}', [LetterReminderMasterController::class, 'letter_reminder_edit'])->name('letter_reminder_edit');
    Route::post('/letter-reminder-delete', [LetterReminderMasterController::class, 'delete'])->name('letter_reminder_delete');


    //pb-branch-login
    Route::get('/pb/branch/login', [PbBranchLoginController::class, 'index'])->name('pb_branch_login');
    Route::post('/pb/branch/login/submit', [PbBranchLoginController::class, 'login'])->name('pb_branch_login_submit');
    Route::get('/pb/branch/logout', [PbBranchLoginController::class, 'logout'])->name('pb_branch_logout');

    //basic_branch
    Route::get('/basic-branch', [BasicBranchController::class, 'index'])->name('basic_branch');
    Route::post('/basic-branch-insert', [BasicBranchController::class, 'insert'])->name('basic_branch_insert');


    //proposal_submitted_detail
    Route::get('/proposal-submitted-detail', [ProposalSubmittedDetailController::class, 'index'])->name('proposal_submitted_detail');
    Route::post('/proposal-submitted-insert', [ProposalSubmittedDetailController::class, 'insert'])->name('proposal_submitted_insert');

    //principal_approval_detail
    Route::get('/principal-approval-detail', [PrincipalApprovalDetailController::class, 'index'])->name('principal_approval_detail');
    Route::post('/principal-approval-insert', [PrincipalApprovalDetailController::class, 'insert'])->name('principal_approval_insert');

    //block_estimate_submit_detail
    Route::get('/block-estimate-submit-detail', [BlockEstimateSubmitDetailController::class, 'index'])->name('block_estimate_submit_detail');
    Route::post('/block-estimate-submit-insert', [BlockEstimateSubmitDetailController::class, 'insert'])->name('block_estimate_submit_insert');

    //administrative_approval
    Route::get('/administrative-approval', [AdministrativeApprovalController::class, 'index'])->name('administrative_approval');
    Route::post('/administrative-approval-insert', [AdministrativeApprovalController::class, 'insert'])->name('administrative_approval_insert');


    //technical_section_detail
    Route::get('/technical-section-detail', [TechnicalSectionDetailController::class, 'index'])->name('technical_section_detail');
    Route::post('/technical-section-detail-insert', [TechnicalSectionDetailController::class, 'insert'])->name('technical_section_detail_insert');

    //forest_clearence_detail
    Route::get('/forest-clearence-detail', [ForestClearenceDetailController::class, 'index'])->name('forest_clearence_detail');

    //utility_shifting_detail
    Route::get('/utility-shifting-detail', [UtilityShiftingDetailController::class, 'index'])->name('utility_shifting_detail');

    //laq_approval
    Route::get('/laq-approval', [LaqApprovalController::class, 'index'])->name('laq_approval');



    //budgetary_detail
    Route::get('/budgetary-detail', [BudgetaryDetailController::class, 'index'])->name('budgetary_detail');

    //expenditure_detail
    Route::get('/expenditure-detail', [ExpenditureDetailController::class, 'index'])->name('expenditure_detail');

    //excess_detail
    Route::get('/excess-detail', [ExcessDetailController::class, 'index'])->name('excess_detail');

    //time_extension
    Route::get('/time-extension', [TimeExtensionController::class, 'index'])->name('time_extension');

    //work_status
    Route::get('/work-status', [WorkStatusController::class, 'index'])->name('work_status');

    //dlp_period
    Route::get('/dlp-period', [DlpPeriodController::class, 'index'])->name('dlp_period');

    //dtp_approval
    Route::get('/dtp-approval', [DtpApprovalController::class, 'index'])->name('dtp_approval');

    //nit
    Route::get('/nit', [NitController::class, 'index'])->name('nit');

    //deposit_order
    Route::get('/deposit-order', [DepositOrderController::class, 'index'])->name('deposit_order');

    //tpi_detail
    Route::get('/tpi-detail', [TpiDetaileController::class, 'index'])->name('tpi_detail');

    //fmg
    Route::get('/fmg', [FmgController::class, 'index'])->name('fmg');

    //fdr
    Route::get('/fdr', [FdrController::class, 'index'])->name('fdr');

    //edit
    Route::get('/edit-proposal/{id}', [ProposalMasterController::class, 'proposal_submitted_edit'])->name('edit_proposal_submitted_detail');

    Route::get('/edit-principal-approval/{id}', [ProposalMasterController::class, 'principal_approval_edit'])->name('edit_principal_approval_detail');

    Route::get('/edit-block-estimate-submit-detail/{id}', [ProposalMasterController::class, 'principal_estimate_edit'])->name('edit_block_estimate_submit_detail');

    Route::get('/edit-administrative-approval/{id}', [ProposalMasterController::class, 'edit_administrative_approval'])->name('edit_administrative_approval');

    Route::get('/technical-section-detail/{id}', [ProposalMasterController::class, 'edit_technical_section_detail'])->name('edit_technical_section_detail');

    Route::get('/edit-forest-clearence-detail/{id}', [ProposalMasterController::class, 'edit_forest_clearence_detail'])->name('edit_forest_clearence_detail');

    Route::get('/edit-utility-shifting-detail/{id}', [ProposalMasterController::class, 'edit_utility_shifting_detail'])->name('edit_utility_shifting_detail');

    Route::get('/edit-laq-approval/{id}', [ProposalMasterController::class, 'edit_laq_approval'])->name('edit_laq_approval');


    //edit auditor
    Route::get('/edit-budgetary-detail/{id}', [ProposalMasterController::class, 'edit_budgetary_detail'])->name('edit_budgetary_detail');

    Route::get('/edit-expenditure-detail/{id}', [ProposalMasterController::class, 'edit_expenditure_detail'])->name('edit_expenditure_detail');

    Route::get('/edit-excess-detail/{id}', [ProposalMasterController::class, 'edit_excess_detail'])->name('edit_excess_detail');

    Route::get('/edit-time-extension/{id}', [ProposalMasterController::class, 'edit_time_extension'])->name('edit_time_extension');

    Route::get('/edit-work-status/{id}', [ProposalMasterController::class, 'edit_work_status'])->name('edit_work_status');

    Route::get('/edit-fmg/{id}', [ProposalMasterController::class, 'edit_fmg'])->name('edit_fmg');

    Route::get('/edit-fdr/{id}', [ProposalMasterController::class, 'edit_fdr'])->name('edit_fdr');

    Route::get('/edit-dlp-period/{id}', [ProposalMasterController::class, 'edit_dlp_period'])->name('edit_dlp_period');

    //edit tender
    Route::get('/edit-dtp-approval/{id}', [ProposalMasterController::class, 'edit_dtp_approval'])->name('edit_dtp_approval');

    Route::get('/edit-nit/{id}', [ProposalMasterController::class, 'edit_nit'])->name('edit_nit');

    Route::get('/edit-deposit-order/{id}', [ProposalMasterController::class, 'edit_deposit_order'])->name('edit_deposit_order');

    Route::get('/edit-tpi-detail/{id}', [ProposalMasterController::class, 'edit_tpi_detail'])->name('edit_tpi_detail');

    //insert- Form with+
    Route::post('/name-of-schema-insert', [MasterController::class, 'name_of_schema_insert'])->name('name_of_schema_insert');
    Route::post('/name-of-project-insert', [MasterController::class, 'name_of_project_insert'])->name('name_of_project_insert');
    Route::post('/name-of-tender-insert', [MasterController::class, 'name_of_tender_insert'])->name('name_of_tender_insert');
    Route::post('/name-tpi-of-tender-insert', [MasterController::class, 'tpi_name_of_tender_insert'])->name('tpi_name_of_tender_insert');


    //current repairs
    Route::get('/curent-reaparing-master', [CurrentReapringController::class, 'index'])->name('curent_reaparing_master');
    Route::get('/curent-reaparing', [CurrentReapringController::class, 'current_reparing'])->name('curent_reaparing');
    Route::post('/curent-reaparing-insert', [CurrentReapringController::class, 'insert'])->name('curent_reaparing_insert');
    Route::post('/curent-reaparing-detail-of-work-insert', [CurrentReapringController::class, 'detils_of_work'])->name('detils_of_work_insert');


    Route::post('/curent-reaparing-basic-agency', [CurrentReapringController::class, 'cr_agency_name'])->name('cr_agency_name_insert');

    // Route::get('/curent-reaparing-basic', [CurrentReapringController::class, 'current_reparing_basic'])->name('curent_reaparing_basic');
    Route::post('/curent-master', [CurrentReapringController::class, 'cr_edit'])->name('cr_master');
    Route::post('/curent-delete', [CurrentReapringController::class, 'delete'])->name('cr_delete');

    Route::get('/edit-current-repairs/{id}', [CurrentReapringController::class, 'edit_cr'])->name('edit_current_repairs');
    Route::get('/edit-current-repairs-basic/{id}', [CurrentReapringController::class, 'edit_cr_basic'])->name('curent_reaparing_basic');
    Route::get('/edit-details-of-work/{id}', [CurrentReapringController::class, 'edit_detils_of_work'])->name('edit_detils_of_work');
    Route::get('/get-road-names/{divisionId}', [CurrentReapringController::class, 'getRoadNames'])->name('current_road_name');
    Route::post('/get_name_of_road_data', [CurrentReapringController::class, 'getNameOfRoadData'])->name('get_name_of_road_data');

    Route::get('/get-edit-bill/{id}', [CurrentReapringController::class, 'edit_bill_no'])->name('edit_bill_no');
    Route::post('/delete-repairing-bill', [CurrentReapringController::class, 'delete_repairing_bill'])->name('delete_repairing_bill');

    Route::get('/get-road-info/{roadId}',  [CurrentReapringController::class, 'getRoadInfo'])->name('road_name_id');
});
