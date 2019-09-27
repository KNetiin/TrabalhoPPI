<div class="container-fluid p-1 p-sm-2 py-md-3 px-md-5">
    <div id="employeesListDiv">
        <button type="button" id="button-employees-list" class="btn btn-success btn-block btn-lg mb-2">
            <i class="fas fa-plus-circle d-inline"></i>
            <div class="d-inline">Novo</div>
        </button>
    
        <div class="card-deck">
            <?php include __DIR__ . "/../../../components/employeeCard.php"; ?>
            <?php include __DIR__ . "/../../../components/employeeCard.php"; ?>
            <?php include __DIR__ . "/../../../components/employeeCard.php"; ?>
            <?php include __DIR__ . "/../../../components/employeeCard.php"; ?>
            <?php include __DIR__ . "/../../../components/employeeCard.php"; ?>
            <?php include __DIR__ . "/../../../components/employeeCard.php"; ?>
            <?php include __DIR__ . "/../../../components/employeeCard.php"; ?>
            <?php include __DIR__ . "/../../../components/employeeCard.php"; ?>
            <?php include __DIR__ . "/../../../components/employeeCard.php"; ?>
            <?php include __DIR__ . "/../../../components/employeeCard.php"; ?>
            <?php include __DIR__ . "/../../../components/employeeCard.php"; ?>
            <?php include __DIR__ . "/../../../components/employeeCard.php"; ?>
        </div>
    </div>

    <div id="employeeFormDiv" class="myDisplayNone">
        <?php include __DIR__ . "/employeeForm.php"; ?>
    </div>
</div>

<script src="/script/employees.js"></script>
