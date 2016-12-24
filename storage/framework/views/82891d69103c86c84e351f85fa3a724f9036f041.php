<?php $__env->startSection('page_content'); ?>
<!-- Page Breadcrumb -->
<div class="page-breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="#">Home</a>
        </li>
        <li class="active">Store</li>
    </ul>
</div>
<!-- /Page Breadcrumb -->
<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Store
        </h1>
    </div>
    <!--Header Buttons-->
    <div class="header-buttons">
        <a class="sidebar-toggler" href="#">
            <i class="fa fa-arrows-h"></i>
        </a>
        <a class="refresh" id="refresh-toggler" href="">
            <i class="glyphicon glyphicon-refresh"></i>
        </a>
        <a class="fullscreen" id="fullscreen-toggler" href="#">
            <i class="glyphicon glyphicon-fullscreen"></i>
        </a>
    </div>
    <!--Header Buttons End-->
</div>
<!-- /Page Header -->
<!-- Page Body -->
<div class="page-body">
    <div class="flash-message">
        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php if(Session::has('alert-' . $msg)): ?>

        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </div> <!-- end .flash-message -->
    <div class="row">
        <div class="col-xs-12">
            <div class="widget">
                <div class="widget-header bordered-top bordered-palegreen">
                    <span class="widget-caption">Add</span>
                    <span class="widget-caption pull-right" style="margin: 0 5px 0 0;">
                        <?php echo $shop;?>
                    </span>
                </div>
                <div class="widget-body">
                    <div class="collapse in">
                        <form role="form" method="POST" id="add_store_form" action="<?php echo e(url('/store')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="city_name" id="city_name">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group <?php echo e($errors->has('store_name') ? ' has-error' : ''); ?>">
                                        <label for="definpu">Name <big class="text-danger">*</big></label>
                                         <input id="store_name" type="text" class="form-control" name="store_name" value="<?php echo e(old('store_name')); ?>" autofocus>

                                <?php if($errors->has('store_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('store_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group <?php echo e($errors->has('store_city') ? ' has-error' : ''); ?>">
                                        <label for="definpu">City <big class="text-danger">*</big></label>
                                        <select class="form-control chosen-select" name="store_city" id="store_city">
                                            <?php if ($Cities) { ?>
                                                <?php foreach ($Cities as $val) { ?>
                                                    <option value="<?php echo $val->city_id; ?>" <?php if ($val->city_id == '325') {
                                                echo "selected";
                                            } ?>>
                                                    <?php echo ucwords($val->city_name); ?>
                                                    </option>
    <?php } ?>
<?php } ?>
                                        </select>

                                        <?php if($errors->has('store_city')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('store_city')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group<?php echo e($errors->has('store_address') ? ' has-error' : ''); ?>">
                                        <label for="definpu">Address</label>
                                        <textarea class="form-control" name="store_address" value="<?php echo e(old('store_address')); ?>" id="store_address"></textarea>
                                        <?php if($errors->has('store_address')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('store_address')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group <?php echo e($errors->has('lat_long') ? ' has-error' : ''); ?>">
                                        <label for="definpu">Latitude & Longitude</label>
                                        <input id="lat_long" type="text" class="form-control" name="lat_long" value="<?php echo e(old('lat_long')); ?>">

                                        <?php if($errors->has('lat_long')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('lat_long')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group<?php echo e($errors->has('address1') ? ' has-error' : ''); ?>">
                                        <label for="definpu">Address 1</label>
                                        <textarea class="form-control" name="address1" id="store_address"></textarea>
                                        <?php if($errors->has('store_address')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('address1')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group<?php echo e($errors->has('address2') ? ' has-error' : ''); ?>">
                                        <label for="definpu">Address 2</label>
                                        <textarea class="form-control" name="address2"></textarea>
                                        <?php if($errors->has('store_address')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('address2')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="definpu">Zip Code</label>
                                        <input id="store_zip" type="text" class="form-control" name="store_zip">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group ">
                                        <label for="definpu">Email</label>
                                        <input id="lat_long" type="email" class="form-control" name="email_id">

                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group ">
                                        <label for="definpu">Primary Phone No</label>
                                        <input id="lat_long" type="text" class="form-control" name="primary_phone_no">

                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group ">
                                        <label for="definpu">Alternate Phone No</label>
                                        <input id="lat_long" type="text" class="form-control" name="alternate_phone_no">

                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="definpu">Keywords</label>
                                        <input id="keywords" type="text" class="form-control" name="keywords" value="<?php echo e(old('keywords')); ?>">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                   <?php if($keywords){?>
                                    <div class="form-group">
                                        <label class="">Available Keywords</label>
                                        <br>
                                            <?php foreach ($keywords as $keyword_val){if($keyword_val->type=='keyword'){?>
                                            <input value="<?php echo ucfirst($keyword_val->name)?>" id="<?php echo ucfirst($keyword_val->name)?>" type="button" class="addItKeyword">   
                                            <?php }}?>
                                    </div>
                                    <?php }?> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="definpu">Categories</label>
                                        <input id="shop_type" type="text" class="form-control" name="shop_type" value="<?php echo e(old('shop_type')); ?>">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <?php if($keywords){?>
                                    <div class="form-group">
                                        <label class="">Available Shop Type</label>
                                        <br>
                                            <?php foreach ($keywords as $keyword_val){if($keyword_val->type=='category'){?>
                                            <input value="<?php echo ucfirst($keyword_val->name)?>" id="<?php echo ucfirst($keyword_val->name)?>" type="button" class="addIt">   
                                            <?php }}?>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="definpu">Payment Mode</label>
                                        <input id="payment_mode" type="text" class="form-control" name="modes_of_payment" value="<?php echo e(old('modes_of_payment')); ?>">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                   <?php if($keywords){?>
                                    <div class="form-group">
                                        <label class="">Available Payment Mode</label>
                                        <br>
                                            <?php foreach ($keywords as $keyword_val){if($keyword_val->type=='payment_mode'){?>
                                            <input value="<?php echo ucfirst($keyword_val->name)?>" id="<?php echo ucfirst($keyword_val->name)?>" type="button" class="addItPM">   
                                            <?php }}?>
                                    </div>
                                    <?php }?> 
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="definpu">Open Hours</label>
                                        <input id="open_hours" type="text" class="form-control" name="open_hours" value="<?php echo e(old('open_hours')); ?>">
                                    </div>
                                </div>
                             </div>
                            
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group <?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                                        <label for="definpu">Status</label>
                                       <div class="radio">
                                            <label>
                                                <input name="status" type="radio" value="1" class="colored-success">
                                                <span class="text"> Active</span>
                                            </label>
                                           <label>
                                               <input name="status" type="radio" value="0" class="colored-danger">
                                                <span class="text"> Pending</span>
                                            </label>
                                        </div>
                                        

                                        <?php if($errors->has('status')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('status')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group <?php echo e($errors->has('is_verified') ? ' has-error' : ''); ?>">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="is_verified" value="1">
                                                <span class="text">Verified</span>
                                            </label>
                                        </div>

                                        <?php if($errors->has('is_verified')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('is_verified')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-flat btn-blue">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- /Page Body -->

<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
    $("#add_store_form").submit(function(){
       var selectedCity = $('.chosen-select option:selected').html();
       $("#city_name").val(selectedCity);
    });
    $(document).ready(function() {
        $("#keywords").tagit({
            allowSpaces: true,
        });
        $("#shop_type").tagit({
            allowSpaces: true,
        });
        $("#payment_mode").tagit({
            allowSpaces: true,
        });
        $(".addIt").click(function () {
            $('#shop_type').tagit('createTag', this.id);
            return false;
        });

        $(".addItKeyword").click(function () {
            $('#keywords').tagit('createTag', this.id);
            return false;
        });
        $(".addItPM").click(function () {
            $('#payment_mode').tagit('createTag', this.id);
            return false;
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>