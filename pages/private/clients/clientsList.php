<div class="container-fluid p-1 p-sm-2 py-md-3 px-md-5">
    <div id="clientsListDiv">
        <button type="button" id="button-clients-list" class="btn btn-success btn-block btn-lg mb-2">
            <i class="fas fa-plus-circle d-inline"></i>
            <div class="d-inline">Novo</div>
        </button>
    
        <div class="card-deck">
            <?php include __DIR__ . "/../../../components/clientCard.php"; ?>
            <?php include __DIR__ . "/../../../components/clientCard.php"; ?>
            <?php include __DIR__ . "/../../../components/clientCard.php"; ?>
            <?php include __DIR__ . "/../../../components/clientCard.php"; ?>
            <?php include __DIR__ . "/../../../components/clientCard.php"; ?>
            <?php include __DIR__ . "/../../../components/clientCard.php"; ?>
            <?php include __DIR__ . "/../../../components/clientCard.php"; ?>
            <?php include __DIR__ . "/../../../components/clientCard.php"; ?>
            <?php include __DIR__ . "/../../../components/clientCard.php"; ?>
            <?php include __DIR__ . "/../../../components/clientCard.php"; ?>
            <?php include __DIR__ . "/../../../components/clientCard.php"; ?>
            <?php include __DIR__ . "/../../../components/clientCard.php"; ?>
        </div>
    </div>

    <div id="clientFormDiv" class="myDisplayNone">
        <?php include __DIR__ . "/clientForm.php"; ?>
    </div>
</div>

<script src="/script/clients.js"></script>
