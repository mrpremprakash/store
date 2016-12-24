<?php $__env->startSection('page_content'); ?>
<!-- Page Breadcrumb -->
<div class="page-breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="#">Home</a>
        </li>
        <li class="active">Medicines</li>
    </ul>
</div>
<!-- /Page Breadcrumb -->
<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Medicines
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
   <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="widget">
                                <div class="widget-header ">
                                    <span class="widget-caption">Editable DataTable</span>
                                    <div class="widget-buttons">
                                        <a href="#" data-toggle="maximize">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="#" data-toggle="collapse">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <a href="#" data-toggle="dispose">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div class="table-toolbar">
                                        <a id="editabledatatable_new" href="javascript:void(0);" class="btn btn-default">
                                            Add New Medicine
                                        </a>
                                        <div class="btn-group pull-right">
                                            <a class="btn btn-default" href="javascript:void(0);">Tools</a>
                                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);"><i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown-menu dropdown-default">
                                                <li>
                                                    <a href="javascript:void(0);">Action</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Another action</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Something else here</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="javascript:void(0);">Separated link</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="editabledatatable_wrapper" class="dataTables_wrapper form-inline no-footer"><div class="DTTT btn-group"><a class="btn btn-default DTTT_button_copy" id="ToolTables_editabledatatable_0" tabindex="0" aria-controls="editabledatatable"><span>Copy</span><div style="position: absolute; left: 0px; top: 0px; width: 54px; height: 31px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_5" src="assets/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="54" height="31" name="ZeroClipboard_TableToolsMovie_5" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=5&amp;width=54&amp;height=31" wmode="transparent"></div></a><a class="btn btn-default DTTT_button_print" id="ToolTables_editabledatatable_1" title="View print view" tabindex="0" aria-controls="editabledatatable"><span>Print</span></a><a class="btn btn-default DTTT_button_collection" id="ToolTables_editabledatatable_2" tabindex="0" aria-controls="editabledatatable"><span>Save <i class="fa fa-angle-down"></i></span></a></div><div id="editabledatatable_filter" class="dataTables_filter"><label><input type="search" class="form-control input-sm" placeholder="" aria-controls="editabledatatable"></label></div><div class="dataTables_length" id="editabledatatable_length"><label><select name="editabledatatable_length" aria-controls="editabledatatable" class="form-control input-sm"><option value="5">5</option><option value="15">15</option><option value="20">20</option><option value="100">100</option><option value="-1">All</option></select></label></div><table class="table table-striped table-hover table-bordered dataTable no-footer" id="editabledatatable" role="grid" aria-describedby="editabledatatable_info">
                                        <thead>
                                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="editabledatatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
                                                    Username
                                                : activate to sort column descending" style="width: 162px;">
                                                    Username
                                                </th><th class="sorting" tabindex="0" aria-controls="editabledatatable" rowspan="1" colspan="1" aria-label="
                                                    Full Name
                                                : activate to sort column ascending" style="width: 244px;">
                                                    Full Name
                                                </th><th class="sorting" tabindex="0" aria-controls="editabledatatable" rowspan="1" colspan="1" aria-label="
                                                    Points
                                                : activate to sort column ascending" style="width: 107px;">
                                                    Points
                                                </th><th class="sorting" tabindex="0" aria-controls="editabledatatable" rowspan="1" colspan="1" aria-label="
                                                    Notes
                                                : activate to sort column ascending" style="width: 172px;">
                                                    Notes
                                                </th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="

                                                " style="width: 285px;">

                                                </th></tr>
                                        </thead>

                                        <tbody>
                                            
                                            
                                            
                                            
                                            
                                            
                                        <tr role="row" class="odd">
                                                <td class="sorting_1">alex</td>
                                                <td>Alex Nilson</td>
                                                <td>1234</td>
                                                <td class="center ">power user</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="#" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
                                                </td>
                                            </tr><tr role="row" class="even">
                                                <td class="sorting_1">
                                                    gist124
                                                </td>
                                                <td>
                                                    Nick Roberts
                                                </td>
                                                <td>
                                                    62
                                                </td>
                                                <td class="center ">
                                                    new user
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="#" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
                                                </td>
                                            </tr><tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    goldweb
                                                </td>
                                                <td>
                                                    Sergio Jackson
                                                </td>
                                                <td>
                                                    132
                                                </td>
                                                <td class="center ">
                                                    elite user
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="#" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
                                                </td>
                                            </tr><tr role="row" class="even">
                                                <td class="sorting_1">
                                                    lisa
                                                </td>
                                                <td>
                                                    Lisa Wong
                                                </td>
                                                <td>
                                                    434
                                                </td>
                                                <td class="center ">
                                                    new user
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="#" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
                                                </td>
                                            </tr><tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    nick12
                                                </td>
                                                <td>
                                                    Nick Roberts
                                                </td>
                                                <td>
                                                    232
                                                </td>
                                                <td class="center ">
                                                    power user
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="#" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
                                                </td>
                                            </tr></tbody>
                                    </table><div class="row DTTTFooter"><div class="col-sm-6"><div class="dataTables_info" id="editabledatatable_info" role="status" aria-live="polite">Showing 1 to 5 of 6 entries</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_bootstrap" id="editabledatatable_paginate"><ul class="pagination"><li class="prev disabled"><a href="#">Prev</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li class="next"><a href="#">Next</a></li></ul></div></div></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
<!-- /Page Body -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>