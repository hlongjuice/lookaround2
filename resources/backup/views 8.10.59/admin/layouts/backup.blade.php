<?php
foreach(Auth::user()->usergroups as $usergroup)
    $group[]=$usergroup->id;
?>

<?php if(in_array('7',$group) or in_array('8',$group))
{?>
<li>
    <a href={{route('admin.divisions.academic.index')}}>ฝ่ายวิชาการ</a>
</li>
<?php }?>

<?php if(in_array('7',$group) or in_array('9',$group)){?>
<li>
    <a href={{route('admin.divisions.management.index')}}>ฝ่ายบริหารทรัพยากร</a>
</li>
<?php }?>

<?php if(in_array('7',$group) or in_array('10',$group)){?>
<li>
    <a href={{route('admin.divisions.development.index')}}>ฝ่ายพัฒนากิจการนักเรียนนักศึกษา</a>
</li>
<?php }?>

<?php if(in_array('7',$group) or in_array('11',$group)){?>
<li class="left-column">
    <a href={{route('admin.divisions.plans.index')}}>ฝ่ายแผนงานและความร่วมมือ</a>
</li>
<?php }?>
