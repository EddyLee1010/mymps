<?php if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps������Ϣϵͳ
�ٷ���վ��http://zhideyao.cn*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>�����ɹ�!</title>
<link rel="shortcut icon" href="<?=$mymps_global['SiteUrl']?>/favicon.ico" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/global.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/style.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/post.css" />
<link href="<?=$mymps_global['SiteUrl']?>/template/global/button.css" type="text/css" rel="stylesheet" />
<script src="<?=$mymps_global['SiteUrl']?>/template/global/noerr.js" type="text/javascript"></script>
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/global.js" type="text/javascript"></script>
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/jquery.min.js" type="text/javascript"></script>
<script language="javascript">var current_domain = '<?=$mymps_global['SiteUrl']?>';</script>
<script language="javascript" src="<?=$mymps_global['SiteUrl']?>/template/global/messagebox.js"></script>
<script type="text/javascript">
window.history.go(1);
</script>
</head>
<body class="<?=$mymps_global['cfg_tpl_dir']?> bodybg<?=$mymps_global['cfg_tpl_dir']?><?=$mymps_global['bodybg']?>"><div class="bartop">
<div class="barcenter">
<div class="barleft">
<ul class="barcity"><span><? if($city['cityname']) { ?><?=$city['cityname']?><?php } else { ?>��վ<?php } ?></span> [<a href="<?=$mymps_global['SiteUrl']?>/changecity.php">�л���վ</a>]</ul> 
<ul class="line"><u></u></ul>
<ul class="barcang"><a href="<?=$mymps_global['SiteUrl']?>/desktop.php" target="_blank" title="����Ҽ���ѡ��Ŀ�����Ϊ�������˿�ݷ�ʽ���浽���漴��">���浽����</a></ul>
<ul class="line"><u></u></ul>
<ul class="barpost"><a href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_postfile']?>?cityid=<?=$cityid?>">���ٷ�����Ϣ</a></ul>
<ul class="line"><u></u></ul>
<ul class="bardel"><a href="<?=$mymps_global['SiteUrl']?>/delinfo.php" rel="nofollow">�޸�/ɾ����Ϣ</a></ul>
<ul class="line"><u></u></ul>
<ul class="barwap"><a href="<?=$mymps_global['SiteUrl']?>/mobile.php">�ֻ����</a></ul>
</div>
<div class="barright">
<script type="text/javascript" src="<?=$mymps_global['SiteUrl']?>/javascript.php?part=iflogin&cityid=<?=$city['cityid']?>"></script>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="mhead">
<div class="logo"><a href="<? echo $city['domain']?$city['domain']:$mymps_global['SiteUrl']; ?>" target="_blank"><img src="<?=$mymps_global['SiteUrl']?><?=$mymps_global['SiteLogo']?>" title="<?=$mymps_global['SiteName']?>"/></a></div>
<div class="font">
<span>
        <? if(CURSCRIPT == 'posthistory') { ?>������¼<?php } elseif(CURSCRIPT == 'space') { ?>�û�����<?php } elseif(CURSCRIPT == 'mobile') { ?>�ֻ���<?php } elseif(CURSCRIPT == 'login') { ?>�ʺ�����<?php } elseif(CURSCRIPT == 'delinfo') { ?>�޸�/ɾ����Ϣ<?php } elseif(CURSCRIPT == 'changecity') { ?>�л���վ<?php } else { ?>������Ϣ<?php } ?>
</span>
</div>
</div>
<div class="cleafix"></div><div class="body1000">
<div class="clear15"></div>
<div class="wrapper" id="main">
<div class="step3">
<span><font class="number">1</font> ѡ����Ϣ����</span>
<span><font class="number">2</font> ��д��Ϣ����</span>
<span class="cur"><font class="number">3</font> �����ɹ�</span>
</div>
        <div class="fbd">
        <div class="c_border">
        <center id="infobox">
        <ul>
        <div id="mr">
<? if(empty($ok['level'])) { ?>
<h2 class="h">��Ϣͨ����˺���ʾ��</h2>
            <p>��������ID��Ϊ <strong><?=$ok['id']?></strong> &nbsp;����Ϣ��ĿǰΪ<b style=color:red>����״̬</b>������Ա���ͨ���󣬾ͻ��ڱ���վ����ʾ��<br /><br /><a href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_postfile']?>?cityid=<?=$city['cityid']?>">��Ҫ�ٷ���һ����Ϣ&raquo;</a><br /><a href="<?=$city['domain']?>">������վ��ҳ</a></p>
            <?php } else { ?>
<h1 class="h">��Ϣ�����ɹ���</h1>
            <p>������Ϣ  <a target="_blank"  href="<?=$ok['info_uri']?>" class="mrtitle"><b><?=$ok['title']?></b></a> &nbsp;�Ѿ��ɹ�����</p>
            <p><b><font color="#FF0000">��ܰ��ʾ��</font></b> ����Ϣ����3���Ӻ���ʾ��Ƶ���б�ҳ�ϣ� <a href="<?=$city['domain']?>">��˷�����վ��ҳ&raquo;</a></p>
            <p style="padding:15px 0 0;">
            <a class="button a xxl" href="javascript:setbg('�ö�������Ϣ',538,248,'<?=$mymps_global['SiteUrl']?>/box.php?part=upgrade&id=<?=$ok['id']?>');" style="width:190px; margin-left:50px"><span><i></i>�����ö�����Ϣ</span></a>
            <a class="button c xxl" href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_postfile']?>?cityid=<?=$city['cityid']?>"><span><i></i>��Ҫ�ٷ���һ����Ϣ&raquo;</span></a></p>
            <?php } ?>
        </div>
        </ul>
        </center>
        </div>
        
        </div>
</div>
<div class="clear"></div>
    <div class="footer">
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