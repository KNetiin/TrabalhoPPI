<div class="container-fluid p-1 p-sm-2 py-md-3 px-md-5 myPage" id="page-private-propertiesList">
    <div id="propertiesListDiv">
        <button type="button" id="button-properties-list" class="btn btn-success btn-block btn-lg mb-2">
            <i class="fas fa-plus-circle d-inline"></i>
            <div class="d-inline">Novo</div>
        </button>
    
        <?php include __DIR__ . "/../../../components/propertyCard.php"; ?>
    </div>

    <div id="PropertyFormDiv" class="myDisplayNone">
        <?php include __DIR__ . "/propertyForm.php"; ?>
    </div>
</div>

<script src="/script/properties.js"></script>
