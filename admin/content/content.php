<?php
require_once '../login/login_check.php';
$css_url="../templates/".$met_skin."/css";
$img_url="../templates/".$met_skin."/images";
if($class1 && $module==1){
	if($met_class[$class1]['isshow'])$contentlistes[]=$met_class[$class1];
	foreach($met_class2[$class1] as $key=>$val2){
		if(!$val2['releclass']&&!$val2['if_in'])$contentlistes[] = $val2;
	}
	foreach($contentlistes as $key=>$val){
		$c2 = count($met_class3[$val['id']]);
		$classname = $c2?"class='lt'":'';
		$classname1 = $c2&&$val['isshow']?"class='rt'":'';
		$val['url']='about/about.php?id='.$val[id].'&lang='.$lang.'&anyid='.$anyid;
		$val['conturl']=$c2?"?anyid={$anyid}&lang={$lang}&module=1&class2={$val['id']}":$val[url];
		$val['set']="<div>";
		if($val['isshow'])$val['set'].="<p {$classname}><a href='{$val[url]}'>{$lang_eidtcont}</a></p>";
		if($val['isshow'] && $c2)$val['set'].='<span>-</span>';
		if($c2)$val['set'].="<p {$classname1}><a href='?anyid={$anyid}&lang={$lang}&module=1&class2={$val['id']}'>{$lang_subpart}</a></p>";
		$val['set'].='</div>';
		$contentlist[] = $val;
	}
}elseif($class2 && $module==1){
	$class1=$met_class[$class2]['bigclass'];
	if($met_class[$class2]['isshow'])$contentlistes[]=$met_class[$class2];
	foreach($met_class3[$class2] as $key=>$val2){
		if(!$val2['releclass']&&!$val2['if_in'])$contentlistes[] = $val2;
	}
	foreach($contentlistes as $key=>$val){
		$val['conturl']='about/about.php?id='.$val[id].'&lang='.$lang.'&anyid='.$anyid;
		$val['set']="<div><p><a href='{$val[conturl]}'>{$lang_eidtcont}</a></p></div>";
		$contentlist[] = $val;
	}
}else{
	foreach ($met_class1 as $key=>$val){
		if($val['module']<9 && !$val['if_in']){
			$contentlistes[] = $val;
			foreach($met_class2[$val['id']] as $key=>$val2){
				if($val2['releclass']&&$val2['module']<9&&!$val2['if_in'])$contentlistes[] = $val2;
			}
		}
	}
	//dump($contentlistes);
	foreach($contentlistes as $key=>$val){
		$purview='admin_pop'.$val['id'];
		$purview=$$purview;
		$metcmspr=$metinfo_admin_pop=="metinfo" || $purview=='metinfo'?1:0;
		$metcmspr1=$val[classtype]==1 || $val[releclass]?1:0;
		$metcmspr=$metcmspr1?$metcmspr:1;
		if($metcmspr){
		switch($val['module']){
			case '1':
				$c2 = count($met_class2[$val['id']]);
				if($val['releclass'])$c2 = count($met_class3[$val['id']]);
				$classname = $c2?"class='lt'":'';
				$classname1 = $c2&&$val['isshow']?"class='rt'":'';
				$val['url']='about/about.php?id='.$val[id].'&lang='.$lang.'&anyid='.$anyid;
				$val['set']="<div>";
				if($val['isshow'])$val['set'].="<p {$classname}><a href='{$val[url]}'>{$lang_eidtcont}</a></p>";
				$classx = 'class1';
				if($val['releclass'] && $c2)$classx = 'class2';
				$val['conturl']=$c2?"?anyid={$anyid}&lang={$lang}&module=1&{$classx}={$val['id']}":$val[url];
				if($val['isshow'] && $c2)$val['set'].='<span>-</span>';
				if($c2)$val['set'].="<p {$classname1}><a href='{$val[conturl]}'>{$lang_subpart}</a></p>";
				$val['set'].='</div>';
			break;
			case '2':
				$val['url']='article/content.php?class1='.$val[id].'&action=add&lang='.$lang.'&anyid='.$anyid;	
				$val['conturl']='article/index.php?class1='.$val[id].'&lang='.$lang.'&anyid='.$anyid;
				$val['set']="<div>
							<p class='lt'><a href='{$val[url]}'>{$lang_addinfo}</a></p><span>-</span><p class='rt'><a href='{$val[conturl]}'>{$lang_manager}</a></p>
							</div>";				
			break;
			case '3':
				$val['url']='product/content.php?class1='.$val[id].'&action=add&lang='.$lang.'&anyid='.$anyid;
				$val['conturl']='product/index.php?class1='.$val[id].'&lang='.$lang.'&anyid='.$anyid;
				$val['set']="<div>
							<p class='lt'><a href='{$val[url]}'>{$lang_addinfo}</a></p><span>-</span><p class='rt'><a href='{$val[conturl]}'>{$lang_manager}</a></p>
							</div>";
			break;
			case '4':
				$val['url']='download/content.php?class1='.$val[id].'&action=add&lang='.$lang.'&anyid='.$anyid;
				$val['conturl']='download/index.php?class1='.$val[id].'&lang='.$lang.'&anyid='.$anyid;
				$val['set']="<div>
							<p class='lt'><a href='{$val[url]}'>{$lang_addinfo}</a></p><span>-</span>
							<p class='rt'><a href='{$val[conturl]}'>{$lang_manager}</a></p>
							</div>";
			break;
			case '5':
				$val['url']='img/content.php?class1='.$val[id].'&action=add&lang='.$lang.'&anyid='.$anyid;
				$val['conturl']='img/index.php?class1='.$val[id].'&lang='.$lang.'&anyid='.$anyid;
				$val['set']="<div>
							<p class='lt'><a href='{$val[url]}'>{$lang_addinfo}</a></p><span>-</span>
							<p class='rt'><a href='{$val[conturl]}'>{$lang_manager}</a></p>
							</div>";
			break;
			case '6':
				$val['url']='job/content.php?class1='.$val[id].'&action=add&lang='.$lang.'&anyid='.$anyid;
				$val['conturl']='job/index.php?class1='.$val[id].'&lang='.$lang.'&anyid='.$anyid;
				$val['incurl']='job/inc.php?lang='.$lang.'&anyid='.$anyid;
				$val['cvurl']='job/cv.php?class1='.$val[id].'&lang='.$lang.'&anyid='.$anyid;
				$val['set']="<div>
							<p class='lt'><a href='{$val[conturl]}'>{$lang_manager}</a></p><span>-</span>
							<p class='rt'><a href='{$val[cvurl]}'>{$lang_cveditorTitle}</a></p>
							</div>
							";
			break;
			case '7':
				$val['incurl']='message/inc.php?class1='.$val[id].'&lang='.$lang.'&anyid='.$anyid;
				$val['conturl']='message/index.php?class1='.$val[id].'&lang='.$lang.'&anyid='.$anyid;
				$val['set']="<div><a href='{$val[conturl]}'>{$lang_eidtmsg}</a></div>";
			break;
			case '8':
				$val['url']='feedback/inc.php?class1='.$val[id].'&lang='.$lang.'&anyid='.$anyid;
				$val['conturl']='feedback/index.php?class1='.$val[id].'&lang='.$lang.'&anyid='.$anyid;
				$val['set']="<div><a href='{$val[conturl]}'>{$lang_eidtfed}</a></div>";
			break;
		}
		$contentlist[] = $val;
		}
	}
}
include template('content/content');
footer();
?>