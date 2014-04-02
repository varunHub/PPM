<?php namespace module\Message\Model;

use platform\core as Core;
use module\Message\Model as Base;
use platform\core\control as Ctl;
use Validator;

class messageService
{
	public function setup()
	{
		$this->Mod_TopicBase		= "module\Message\Model\mesTopicBase";
		$this->Mod_TopicUser		= "module\Message\Model\mesTopicUser";
	}
	public function getTopicList($id)
	{
		$this->setup();
		$topicUser 	= 	$this->Mod_TopicUser;
		$use_model 	=	$topicUser::where('user_id',$id)->get();

		$userarray 	= 	array();
		$index		=	0;
		
		foreach($use_model as $topUsr)
		{
			if($topUsr->status = 1)
			{
				$userarray[$index]	=	$topUsr->topic_id;
				$index				=	$index +1;
			}
			
		}


		$topicBase 	= 	$this->Mod_TopicBase;
		$tpc_model 	=	$topicBase::whereIn('topic_id',$userarray)->get();

		return $tpc_model;
	}
}