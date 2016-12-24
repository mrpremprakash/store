<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div>Store</div>
                    <div class="pull-right" style="margin-top: -15px;">
                        <?php echo $shop;?>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="flash-message">
                        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <?php if(Session::has('alert-' . $msg)): ?>

                          <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div> <!-- end .flash-message -->
                    <form class="form-horizontal" role="form" method="POST" id="add_store_form" action="<?php echo e(url('/store_utility')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="city_name" id="city_name">
                        <div class="form-group<?php echo e($errors->has('store_name') ? ' has-error' : ''); ?>">
                            <label for="store_name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="store_name" type="text" class="form-control" name="store_name" value="<?php echo e(old('store_name')); ?>" autofocus>

                                <?php if($errors->has('store_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('store_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('store_city') ? ' has-error' : ''); ?>">
                            <label for="store_city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <select class="form-control chosen-select" name="store_city" id="store_city">
                                    <?php if($Cities){ ?>
                                        <?php foreach ($Cities as $val){ ?>
                                    <option value="<?php echo $val->city_id;?>" <?php if($val->city_id=='325'){echo "selected";}?>>
										<?php echo ucwords($val->city_name);?>
									</option>
                                        <?php }?>
                                    <?php }?>
                                </select>

                                <?php if($errors->has('store_city')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('store_city')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('store_address') ? ' has-error' : ''); ?>">
                            <label for="store_address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                
                                <textarea class="form-control" name="store_address" value="<?php echo e(old('store_address')); ?>" id="store_address"></textarea>
                                <?php if($errors->has('store_address')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('store_address')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('store_zip') ? ' has-error' : ''); ?>">
                            <label for="store_city" class="col-md-4 control-label">Zip Code</label>

                            <div class="col-md-6">
                                <input id="store_zip" type="text" class="form-control" name="store_zip" value="<?php echo e(old('store_zip')); ?>">

                                <?php if($errors->has('store_zip')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('store_zip')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        
                        <div class="form-group<?php echo e($errors->has('lat_long') ? ' has-error' : ''); ?>">
                            <label for="latitude" class="col-md-4 control-label">Latitude & Longitude</label>

                            <div class="col-md-6">
                                <input id="lat_long" type="text" class="form-control" name="lat_long" value="<?php echo e(old('lat_long')); ?>">

                                <?php if($errors->has('lat_long')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('lat_long')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('keywords') ? ' has-error' : ''); ?>">
                            <label for="keywords" class="col-md-4 control-label">Keywords</label>

                            <div class="col-md-6">
                                <input id="keywords" type="text" class="form-control" name="keywords" value="<?php echo e(old('keywords')); ?>">
                                <!--<small style="color:red;font-weight:bold;">(e.g:- keyword1,keyword2)</small>-->

                                <?php if($errors->has('keywords')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('keywords')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if($keywords){?>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Available Keywords</label>
                            <div class="col-md-6">
                                <?php foreach ($keywords as $keyword_val){?>
                                <input value="<?php echo ucfirst($keyword_val->name)?>" id="<?php echo ucfirst($keyword_val->name)?>" type="button" class="addItKeyword">   
                                <?php }?>
                            </div>
                        </div>
                        <?php }?>
                        
                        <div class="form-group<?php echo e($errors->has('shop_type') ? ' has-error' : ''); ?>">
                            <label for="keywords" class="col-md-4 control-label">Shop Type</label>

                            <div class="col-md-6">
                                <input id="shop_type" type="text" class="form-control" name="shop_type" value="<?php echo e(old('shop_type')); ?>">
                                <!--<small style="color:red;font-weight:bold;">(e.g:- keyword1,keyword2)</small>-->

                                <?php if($errors->has('shop_type')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('shop_type')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                            
                        </div>
                        
                        <?php if($keywords){?>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Available Shop Type</label>
                            <div class="col-md-6">
                                <?php foreach ($keywords as $keyword_val){?>
                                <input value="<?php echo ucfirst($keyword_val->name)?>" id="<?php echo ucfirst($keyword_val->name)?>" type="button" class="addIt">   
                                <?php }?>
                            </div>
                        </div>
                        <?php }?>
                        
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      $(function(){
         initMap(); 
      });
      function initMap() {
        
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            //alert(position.coords.latitude+" "+position.coords.longitude);
            $("#lat_long").val(position.coords.latitude+","+position.coords.longitude);
            //$("#longitude").val(position.coords.longitude);
          });
        } else {
          alert("Browser doesn't support Geolocation");
        }
      }
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
            $(".addIt").click(function () {
                $('#shop_type').tagit('createTag', this.id);
                return false;
            });
            
            $(".addItKeyword").click(function () {
                $('#keywords').tagit('createTag', this.id);
                return false;
            });
        }); 

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>