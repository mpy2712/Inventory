<div class="col-lg-12">
    <h1 class="page-header">Opening Stock </h1>

    <?php echo form_open('openingStock/openingStockAdd'); ?>  

    <?php if (validation_errors()) { ?>
        <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
        </div>
    <?php } ?>
    <div class="form-group">
        <label>Items </label>
        <select class="form-control" name="item" id="item">
            <option value="">Select</option>
            <?php foreach ($records as $r) { ?>
                <option value="<?php echo $r->id; ?>"><?php echo $r->itemName; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Opening Stock Qty</label>
        <input class="form-control" name="openingStockQty" id="openingStockQty" placeholder="Opening Stock Qty Name">

    </div>
    <div class="form-group">
        <label>Opening Stock Date</label>
        <input type="date" class="form-control" name="openingStockDate"  id="openingStockDate" placeholder="mm/dd/yyyy">
    </div>

    <button type="submit" id="addCategory" class="btn btn-primary">Add Opening Stock</button>
    <?php echo form_close(); ?>


</div>