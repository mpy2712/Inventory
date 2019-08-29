<div class="col-lg-12">
    <h1 class="page-header">Forms </h1>

    <?php echo form_open('userform/saveFormData'); ?>  

    <div class="form-group">
        <label>Module </label>
        <select class="form-control" name="catName" id="catName">
            <option>Select</option>
            <?php foreach ($records as $r) { ?>
                <option value="<?php echo $r->id; ?>"><?php echo $r->moduleName; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Sub Module Name</label>
        <select class="form-control" name="subcatName" id="catName">
            <option>Select</option>

        </select>

    </div>
    <div class="form-group">
        <label>Forn Name</label>
        <input class="form-control" name="frmName" id="frmName" placeholder="Form Name">
    </div>
    <div class="form-group">
        <label>Forn Url</label>
        <input class="form-control" name="frmUrl" id="frmUrl" placeholder="Form Url">
    </div>

    <div class="form-group">
        <label>Status</label>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="optionsRadios1" value="1" checked="">Active
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="optionsRadios2" value="0">InActive
            </label>
        </div>
        
    </div>

    <button type="submit" id="addform" class="btn btn-primary">Add Form</button>
    <?php echo form_close(); ?>


</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="catName"]').on('change', function () {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    url: './myformAjax/' + stateID,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="subcatName"]').empty();
                        $('select[name="subcatName"]').append('<option value="">' + 'Select Sub Module' + '</option>');
                        $.each(data, function (key, value) {
                            $('select[name="subcatName"]').append('<option value="' + value.id + '">' + value.subModuleName + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="subcatName"]').empty();
            }
        });
    });
</script>