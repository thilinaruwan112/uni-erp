<?php
require_once('../../../include/config.php');
include '../../../include/function-update.php';

$ActiveStatus = 0;
$Departments = GetDepartments($link);
$ArrayCount = count($Departments);

$ActiveCount = $ArrayCount;
$InactiveCount = 0;

$Title = "Department";

$LoggedUser = $_POST['LoggedUser'];
$Sections = GetSections($link);
?>

<div class="row mt-5">
    <div class="col-md-3">
        <div class="card item-card">
            <div class="overlay-box">
                <i class="fa-solid fa-location-dot icon-card"></i>
            </div>
            <div class="card-body">
                <p>No of <?= $Title ?>s</p>
                <h1><?= $ArrayCount ?></h1>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card item-card">
            <div class="overlay-box">
                <i class="fa-solid fa-dna icon-card"></i>
            </div>
            <div class="card-body">
                <p>Active</p>
                <h1><?= $ActiveCount ?></h1>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card item-card">
            <div class="overlay-box">
                <i class="fa-solid fa-star-of-life icon-card"></i>
            </div>
            <div class="card-body">
                <p>Disabled</p>
                <h1><?= $InactiveCount ?></h1>
            </div>
        </div>
    </div>
    <?php
    $pageID = 6;
    $userPrivilege = GetUserPrivileges($link, $LoggedUser,  $pageID);

    if (!empty($userPrivilege)) {
        $readAccess = $userPrivilege[$LoggedUser]['read'];
        $writeAccess = $userPrivilege[$LoggedUser]['write'];
        $AllAccess = $userPrivilege[$LoggedUser]['all'];

        if ($writeAccess == 1) {
    ?>
            <div class="col-md-3 text-end mt-4 mt-md-0">
                <button class="btn btn-dark" type="button" onclick="AddNew(1,0)"><i class="fa-solid fa-plus"></i> Add <?= $Title ?></button>
            </div>
    <?php
        }
    }
    ?>
</div>

<div class="row mt-5">

    <div class="col-12">
        <div class="table-title font-weight-bold mb-4 mt-0"><?= $Title ?>s</div>
    </div>
    <?php
    if (!empty($Departments)) {
        foreach ($Departments as $SelectArray) {
            $active_status = "Disabled";
            $color = "secondary";
            if ($SelectArray['is_active'] == 1) {
                $active_status = "Active";
                $color = "primary";
            }

            $SectionName = $Sections[$SelectArray['section_id']]['section_name']

    ?>
            <div class="col-6 col-md-3 mb-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body p-2 pb-2">
                        <span class="badge mt-2 bg-<?= $color ?>"><?= $active_status ?></span>
                        <span class="badge text-dark mt-2 bg-light"><?= $SectionName ?></span>
                        <h1 class="tutor-name mt-2"><?= $SelectArray['department_name'] ?></h1>
                        <div class="text-end mt-3">
                            <button class="mt-0 mb-1 btn btn-sm btn-dark view-button" type="button" onclick="AddNew (1, '<?= $SelectArray['id'] ?>')"><i class="fa-solid fa-pen-to-square"></i> Update</button>

                            <?php
                            if ($SelectArray['is_active'] == 1) {
                                $active_status = "Active";
                                $color = "primary";
                            ?>
                                <button class="mt-0 mb-1 btn btn-sm btn-secondary view-button" type="button" onclick="ChangeStatus(0, '<?= $SelectArray['id'] ?>')"><i class="fa-solid fa-ban"></i> Disable</button>
                            <?php
                            } else {
                            ?>
                                <button class="mt-0 mb-1 btn btn-sm btn-primary view-button" type="button" onclick="ChangeStatus(1, '<?= $SelectArray['id'] ?>')"><i class="fa-solid fa-check"></i> Active</button>
                            <?php
                            }
                            ?>



                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">No Entires</p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>