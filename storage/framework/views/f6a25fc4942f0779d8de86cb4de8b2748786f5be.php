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
                    <form class="form-horizontal" role="form" method="POST" id="add_store_form" action="<?php echo e(url('/harvest_store')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="city_name" id="city_name">
                        <div class="form-group<?php echo e($errors->has('store_name') ? ' has-error' : ''); ?>">
                            <label for="store_name" class="col-md-4 control-label">Keyword</label>

                            <div class="col-md-6">
                                <input id="store_name" type="text" class="form-control" name="store_name" value="<?php echo e(old('store_name')); ?>" autofocus placeholder="e.g medical stores in pandav nagar new delhi">
                                <?php if($errors->has('store_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('store_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>