<?php

/**
 * posts actions.
 *
 * @package    china_blog_test
 * @subpackage posts
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	// exit('here');
    $this->test = 'hellow LYC';
	exit('here');
	//thi' test1
	
	// $date = time();
	// exit();
	
	/* 
		建议：
			-后台：创建：$day 包含所有天（day）的帖子（posts）
			-前台：创建新的循环，把每一天的帖子全部打印
		数组的语法：
			$day = array();
			$day[] = 'e1';
			$day[] = 'e2';
			$day[] = 'e3';
		循环的语法：
			for($i=0;$i<$m;$i++){
				//代码
			}
	*/
	// exit(print_r($day));
	// func：定义日期字符串
	//$today_str = date('Y-n-j');
	//$tomo_str = date('Y-n-j', time()+3600*24);

	// func: 根据日期字符串，从数据库（model）得到帖子
	//$today_posts = TianPostTable::getInstance()->getByDate($today_str);
	//$tomo_posts = TianPostTable::getInstance()->getByDate($tomo_str);
	
	// func:把后台变量传到前台（indexSuccess.php)
	// $this->today_posts = $today_posts;
	// $this->tomo_posts = $tomo_posts;
	// $this->day = $day;
	
	$day = array();
	for($i=0;$i<5;$i++)
	{
		$date_str = date('Y-n-j', time()+3600*24*$i);
		$posts = TianPostTable::getInstance()->getByDate($date_str);
		$day[] = $posts;
		// exit($posts[0]->getContent());
	}
	// exit('count:'.count($day));
	$this->day = $day;
  } //executeIndex()

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new tianPostForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new tianPostForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($tian_post = Doctrine_Core::getTable('tianPost')->find(array($request->getParameter('id'))), sprintf('Object tian_post does not exist (%s).', $request->getParameter('id')));
    $this->form = new tianPostForm($tian_post);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($tian_post = Doctrine_Core::getTable('tianPost')->find(array($request->getParameter('id'))), sprintf('Object tian_post does not exist (%s).', $request->getParameter('id')));
    $this->form = new tianPostForm($tian_post);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($tian_post = Doctrine_Core::getTable('tianPost')->find(array($request->getParameter('id'))), sprintf('Object tian_post does not exist (%s).', $request->getParameter('id')));
    $tian_post->delete();

    $this->redirect('posts/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tian_post = $form->save();

      $this->redirect('posts/edit?id='.$tian_post->getId());
    }
  }
}
