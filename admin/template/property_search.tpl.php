<? include mymps_tpl('inc_head')?>
<div id="<?=MPS_SOFTNAME?>" style=" padding-bottom:0">
    <div class="mpstopic-category">
        <div class="panel-tab">
            <ul class="clearfix tab-list">
                <li><a href="?part=add">��Ϣ¼��</a></li>
                <li><a href="?part=list" class="current">��Ϣ��ѯ</a></li>
            </ul>
        </div>
    </div>
</div>
<form name="form_mymps" action="?part=list" method="post">
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
    <tr class="firstr">
        <td>����</td>
        <td>��ַ</td>
        <td>���Ѷ�</td>
        <td>������</td>
        <td>�ֻ�</td>
        <td>֧����ʽ</td>
    </tr>
<?php foreach($list as $item) :?>
  <tr>
      <td><?=$item['period']?></td>
      <td><?=get_address($item['room_id'], 'room')?></td>
      <td><?=$item['manage_fee']+$item['electric_fee']+$item['water_fee']+$item['other_fee']?></td>
      <td><?=empty($item['openid'])?$item['userid']:$item['nickname'];?></td>
      <td><?=$item['mobile']?></td>
      <td><?=$map_pay_type[$item['pay_type']]?></td>
</tr>
<?php endforeach;?>
</table>
<div class="pagination"><?php echo page2();?></div>
</div>
</form>
<?=mymps_admin_tpl_global_foot()?>