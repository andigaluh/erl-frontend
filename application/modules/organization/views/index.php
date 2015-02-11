<div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button"></button>
             <h3>Widget Settings</h3>
        </div>
        <div class="modal-body">Widget settings form goes here</div>
    </div>
    <div class="clearfix"></div>
    <div class="content">
        <div class="page-title">
            <i class="icon-custom-left"></i>
            <h3><?php echo lang('list_of_subheading')?>&nbsp;<span class="semi-bold"><?php echo lang('org_class_subheading');?></span></h3> 
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="grid simple ">                            
                    <div class="grid-body no-border">
                        <br/>
						<div id="MsgGood" class="alert alert-success text-center" style="display:none;"></div>
						<div id="tabel">
						<div class="tree">	
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal"><i class="icon-plus"></i>&nbsp;<?php echo lang('add_button');?></button>
	
	<?php
    $str ='';
    $lastListLevel=0;
    $firstRow=true;

    foreach($organization->result() as $row){
        $currentListLevel=$row->parent_organization_id -1 ; // minus one to correct level to Level 0
        $differenceLevel=$currentListLevel-$lastListLevel;
		
        $rootLevel=false;

        if($differenceLevel==0){        // Satu level
            if($firstRow){
                $firstRow=false;
            }else{
                $str .='</li>';
            }
            $str .='<li>';
        }elseif($differenceLevel>0){    // level ke bawah
            for($j=0;$j<$differenceLevel;$j++){
                $str .='<ul><li>';
            }
        }elseif($differenceLevel<0){    // level ke atas
            for($j=$differenceLevel;$j<=0;$j++){
               if($j==0){  // root level reached
                   $rootLevel=true;
                   $str .='</li>';
               }else{
                   $str .='</li></ul>';
               }
            }
            $str .= ($rootLevel) ? '<li>' : '<ul>';
        }
        $str.='<span><i class="icon-minus-sign"></i>'.$currentListLevel.'--'.$row->title.'--'.$row->organization_class.'</span>'.'<button type="button" class="btn btn-info btn-small" data-toggle="modal" data-target="#editorganizationModal'.$row->id.'"><i class="icon-paste"></i></button>';?>
		
        <?php
		$lastListLevel=$currentListLevel;
		
    }echo $str.'<br>Lowest organization level. Please define new lower level to add.<br />';?>
	</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE -->
</div>

<div id="modal"></div>

<script type="text/javascript">
    window.onload = function(){getModal();};  
    function getTable() 
    {
        $('#tabel').load('<?php echo site_url('organization/get_table/'); ?>');
    }
	
	function getModal() 
    {
        $('#modal').load('<?php echo site_url('organization/get_modal/'); ?>');
    }
	
</script>
