<?php if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps������Ϣϵͳ
�ٷ���վ��http://zhideyao.cn*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title><?=$page_title?></title>
<link rel="shortcut icon" href="<?=$mymps_global['SiteUrl']?>/favicon.ico" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/global.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/style.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/login.css" />
<script src="<?=$mymps_global['SiteUrl']?>/template/global/noerr.js" type="text/javascript"></script>
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?> bodybg<?=$mymps_global['cfg_tpl_dir']?><?=$mymps_global['bodybg']?>"><div class="bartop">
<div class="barcenter">
<div class="barleft">
<ul class="barcity"><span><? if($city['cityname']) { ?><?=$city['cityname']?><?php } else { ?>��վ<?php } ?></span> [<a href="<?=$mymps_global['SiteUrl']?>/changecity.php">�л���վ</a>]</ul> 
<ul class="line"><u></u></ul>
<ul class="barcang"><a href="<?=$mymps_global['SiteUrl']?>/desktop.php" target="_blank" title="����Ҽ���ѡ��Ŀ�����Ϊ�������˿�ݷ�ʽ���浽���漴��">���浽����</a></ul>
<ul class="line"><u></u></ul>
<ul class="barpost"><a href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_postfile']?>">���ٷ�����Ϣ</a></ul>
<ul class="line"><u></u></ul>
<ul class="bardel"><a href="<?=$mymps_global['SiteUrl']?>/delinfo.php" rel="nofollow">�޸�/ɾ����Ϣ</a></ul>
<ul class="line"><u></u></ul>
<ul class="barwap"><a href="<?=$mymps_global['SiteUrl']?>/mobile.php">�ֻ����</a></ul>
</div>
<div class="barright">
<script type="text/javascript" src="<?=$mymps_global['SiteUrl']?>/javascript.php?part=iflogin"></script>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="mhead">
<div class="logo"><a href="<?=$city['domain']?>" target="_blank"><img src="<?=$mymps_global['SiteUrl']?><?=$mymps_global['SiteLogo']?>" title="<?=$mymps_global['SiteName']?>"/></a></div>
<div class="navigation">
<a href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_member_logfile']?>?cityid=<?=$city['cityid']?>" <? if($mod == 'login' || !$mod) { ?>class="current"<?php } ?>>�û���¼</a>
<a href="<?=$mymps_global['cfg_member_logfile']?>?mod=register&cityid=<?=$city['cityid']?>" <? if($mod == 'register' || $mod == 'validate') { ?>class="current"<?php } ?>>����ע��</a>
<a href="<?=$mymps_global['cfg_member_logfile']?>?mod=forgetpass&cityid=<?=$city['cityid']?>" <? if($mod == 'forgetpass') { ?>class="current"<?php } ?>>�һ�����</a>
</div>
</div><div class="clearfix"></div>
<div class="inner">
<div class="body">
<div class="registerpart">
<div class="step1">
<span class="cur">1. ѡ��ע������</span>
<span>2. ��дע����Ϣ</span>
<span>3. ��¼��Ա����</span>
</div>
<div class="select">
<div class="ico"><span class="ico2"></span></div>
<div class="des">
<div class="tit"><a href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_member_logfile']?>?mod=register&action=person&cityid=<?=$city['cityid']?>">���Ǹ��˻�Ա������ע�� ></a></div>
<div class="intro">��Ϊ���˻�Ա�����Զ��̼�/�����������ּ�����<br />�����̼�/�����ύ������ѯ����ʱ��ûظ�</div>
</div>
<div class="go"><span></span></div>
</div>
            <? if($mymps_global['cfg_if_corp'] == 1) { ?>
<div class="select">
<div class="ico"><span class="ico1"></span></div>
<div class="des">
<div class="tit"><a href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_member_logfile']?>?mod=register&action=store&cityid=<?=$city['cityid']?>">�����̼�/����������ע�� ></a></div>
<div class="intro">��ͨ������վ����ͨ�������̣�����������̬��������Ѷ<br />���������֤�������������������������ǰ��������ø��߹�ע</div>
</div>
<div class="go"><span></span></div>
</div>
<?php } ?>
</div>
</div>
<div class="clear"></div><div class="footer">
&copy; <?=$mymps_global['SiteName']?> <a href="<?=$about['aboutus_uri']?>" target="_blank">��������</a> <a href="http://www.miibeian.gov.cn" target="_blank"><?=$mymps_global['SiteBeian']?></a> <?=$mymps_global['SiteStat']?> 
<span class="none_<?=$mymps_mymps['debuginfo']?>">
<? if($cachetime) { ?>
This page is cached at <? echo GetTime($timestamp,'Y-m-d H:i:s'); ?><?php } else { ?><?php $mtime = explode(' ', microtime());$totaltime = number_format(($mtime['1'] + $mtime['0'] - $mymps_starttime), 6); echo 'Processed in '.$totaltime.' second(s) , '.$db->query_num.' queries'; ?><?php } ?>
</span>
<span class="none">Powered by <strong><a href="http://zhideyao.cn" target="_blank">mymps</a></strong> <em><a href="http://zhideyao.cn" target="_blank"><?=MPS_VERSION?></a></em></span>
</div>
<p id="back-to-top"><a href="#top"><span></span></a></p>
<script type="text/javascript" src="<?=$mymps_global['SiteUrl']?>/template/default/js/scrolltop.js"></script></div>

</body>
</html>