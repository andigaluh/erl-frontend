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
	
<script src="<?php echo assets_url('js/jquery-1.8.3.min.js'); ?>"></script>

</div>