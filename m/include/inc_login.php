<?php

if ( CURSCRIPT != "wap" )
{
    exit( "FORBIDDEN" );
}
$returnurl = isset( $_REQUEST['returnurl'] ) ? mhtmlspecialchars( $_REQUEST['returnurl'] ) : "";
$act = isset($_GET['act'])?trim($_GET['act']):'';

if ( $action == "logout" )
{
    if ( PASSPORT_TYPE == "ucenter" )
    {
        require( MYMPS_ROOT."/uc_client/client.php" );
        $ucsynlogout = uc_user_synlogout( );
        echo $ucsynlogout;
    }
    $member_log->out( "noredirect" );
    echo mymps_goto( $url ? $url : $mymps_global['SiteUrl']."/m/index.php?mod=member" );
}
else if ( $action == "login" )
{
    $userid = isset( $userid ) ? trim( $userid ) : "";
    $userpwd = isset( $userpwd ) ? trim( $userpwd ) : "";
    $checkcode = isset( $checkcode ) ? trim( $checkcode ) : "";
    if ( $mobile_settings['authcode'] == 1 && !mymps_chk_randcode( $checkcode ) )
    {
        redirectmsg( "��֤����������뷵����������", "index.php?mod=login&cityid=".$cityid );
    }
    if ( $userid == "" || $userpwd == "" )
    {
        redirectmsg( "�û��ʺŻ����벻��Ϊ��", "index.php?mod=login&cityid=".$cityid );
    }
    $s_uid = $db->getone( "SELECT userid FROM `".$db_mymps."member` WHERE userid='{$userid}' AND userpwd='".md5( $userpwd )."'" );
    if ( PASSPORT_TYPE == "ucenter" )
    {
        require_once( MYMPS_ROOT."/member/include/common.func.php" );
        require( MYMPS_ROOT."/uc_client/client.php" );
        list( $uid, $username, $password, $email ) = uc_user_login( $userid, $userpwd );
        if ( 0 < $uid )
        {
            if ( !$db->getone( "SELECT count(*) FROM ".$db_mymps."member WHERE userid='{$userid}'" ) )
            {
                member_reg( $userid, md5( $userpwd ) );
            }
            else
            {
                $db->query( "UPDATE `".$db_mymps."member` SET userpwd = '".md5( $userpwd ).( "' WHERE userid = '".$userid."'" ) );
            }
            $s_uid = $userid;
        }
        else if ( $uid == -1 )
        {
            errormsg( "�û�������,���߱�ɾ��" );
            exit( );
        }
        else if ( $uid == -2 )
        {
            errormsg( "�����������" );
            exit( );
        }
        else
        {
            errormsg( "δ�������" );
            exit( );
        }
    }
    if ( $s_uid )
    {
        $member_log->in( $s_uid, md5( $userpwd ), "off", "noredirect" );
        redirectmsg( $s_uid." ��ӭ����!", $returnurl ? $returnurl : urlencode( "index.php?mod=member&cityid=".$cityid ) );
    }
    else
    {
        redirectmsg( "��¼ʧ�ܣ��������˴�����ʺŻ�����!", $returnurl ? $returnurl : urlencode( "index.php?mod=login&cityid=".$cityid ) );
    }
}
else if ( $act == 'wx' )
{
    $openid = isset($_POST['openid'])?trim($_POST['openid']):'';
    $nickname = isset($_POST['nickname'])?trim($_POST['nickname']):'';
    $headimg = isset($_POST['headimg'])?trim($_POST['headimg']):'';

    if (empty($openid) || empty($nickname) || empty($headimg) || strlen($openid) != 28) {
        redirectmsg( "��¼ʧ��!", $returnurl ? $returnurl : "index.php?mod=login&cityid=".$cityid );
    }

    include_once MYMPS_MEMBER . '/include/common.func.php';
    $userid = wx_member_reg($openid, $nickname, $headimg);
    if ($userid) {
        $userpwd = md5(substr($user_info['openid'], -8));
        $member_log -> in($userid,$userpwd,'','noredirect');
        redirectmsg( $nickname." ��ӭ����!", $returnurl ? $returnurl : urlencode( "index.php?mod=member&cityid=".$cityid ) );
    }
    redirectmsg( "��¼ʧ��!", $returnurl ? $returnurl : urlencode( "index.php?mod=login&cityid=".$cityid ) );
}else if ( $iflogin == 1 )
{
    redirectmsg( "���ѵ�¼", $returnurl ? $returnurl : "index.php" );
}
else
{
    include( mymps_tpl( "member_login" ) );
}
?>
